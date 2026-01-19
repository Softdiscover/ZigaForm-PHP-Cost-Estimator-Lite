<?php

/**
 * Serialize data, if needed.
 *
 * @since 2.0.5
 *
 * @param string|array|object $data Data that might be serialized.
 * @return mixed A scalar data
 */
function maybe_serialize( $data ) {
	if ( is_array( $data ) || is_object( $data ) ) {
		return serialize( $data );
	}

	// Double serialization is required for backward compatibility.
	// See https://core.trac.wordpress.org/ticket/12930
	// Also the world will end. See WP 3.6.1.
	if ( is_serialized( $data, false ) ) {
		return serialize( $data );
	}

	return $data;
}

/**
 * Check value to find if it was serialized.
 *
 * If $data is not an string, then returned value will always be false.
 * Serialized data is always a string.
 *
 * @since 2.0.5
 *
 * @param string $data   Value to check to see if was serialized.
 * @param bool   $strict Optional. Whether to be strict about the end of the string. Default true.
 * @return bool False if not serialized and true if it was.
 */
function is_serialized( $data, $strict = true ) {
	// if it isn't a string, it isn't serialized.
	if ( ! is_string( $data ) ) {
		return false;
	}
	$data = trim( $data );
	if ( 'N;' == $data ) {
		return true;
	}
	if ( strlen( $data ) < 4 ) {
		return false;
	}
	if ( ':' !== $data[1] ) {
		return false;
	}
	if ( $strict ) {
		$lastc = substr( $data, -1 );
		if ( ';' !== $lastc && '}' !== $lastc ) {
			return false;
		}
	} else {
		$semicolon = strpos( $data, ';' );
		$brace     = strpos( $data, '}' );
		// Either ; or } must exist.
		if ( false === $semicolon && false === $brace ) {
			return false;
		}
		// But neither must be in the first X characters.
		if ( false !== $semicolon && $semicolon < 3 ) {
			return false;
		}
		if ( false !== $brace && $brace < 4 ) {
			return false;
		}
	}
	$token = $data[0];
	switch ( $token ) {
		case 's':
			if ( $strict ) {
				if ( '"' !== substr( $data, -2, 1 ) ) {
					return false;
				}
			} elseif ( false === strpos( $data, '"' ) ) {
				return false;
			}
			// or else fall through
		case 'a':
		case 'O':
			return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
		case 'b':
		case 'i':
		case 'd':
			$end = $strict ? '$' : '';
			return (bool) preg_match( "/^{$token}:[0-9.E-]+;$end/", $data );
	}
	return false;
}

/**
 * Unserialize value only if it was serialized.
 *
 * @since 2.0.0
 *
 * @param string $original Maybe unserialized original, if is needed.
 * @return mixed Unserialized data can be any type.
 */
function maybe_unserialize( $original ) {
	if ( is_serialized( $original ) ) { // don't attempt to unserialize data that wasn't serialized going in
		return @unserialize( $original );
	}
	return $original;
}

/**
 * -----------------------------------------------------------------------------
 * WP-like nonces for CodeIgniter 2 projects
 * -----------------------------------------------------------------------------
 *
 * - Uses CI's encryption_key as the secret by default.
 * - Uses CI session userdata "user_id" if present, otherwise 0.
 * - Uses CI session_id (CI2 session userdata "session_id") as a session token.
 * - Nonce lifetime emulates WordPress: 24h lifetime, 12h ticks.
 *
 * Requirements:
 * - In application/config/config.php set:
 *     $config['encryption_key'] = 'a-long-random-string';
 */

/**
 * Get CI instance safely.
 *
 * @return object|null
 */
function _ci_instance() {
	if ( function_exists( 'get_instance' ) ) {
		return get_instance();
	}
	return null;
}

/**
 * Timing-safe compare (PHP < 5.6 fallback).
 *
 * @param string $a
 * @param string $b
 * @return bool
 */
function _hash_equals_safe( $a, $b ) {
	if ( function_exists( 'hash_equals' ) ) {
		return hash_equals( (string) $a, (string) $b );
	}

	$a = (string) $a;
	$b = (string) $b;

	if ( strlen( $a ) !== strlen( $b ) ) {
		return false;
	}

	$res = 0;
	$len = strlen( $a );
	for ( $i = 0; $i < $len; $i++ ) {
		$res |= ord( $a[ $i ] ) ^ ord( $b[ $i ] );
	}
	return 0 === $res;
}

/**
 * Secret for nonce hashing.
 *
 * Prefers:
 * 1) WP_NONCE_SECRET constant if defined
 * 2) CodeIgniter config item 'encryption_key'
 *
 * @return string
 */
function _wp_nonce_secret() {
	if ( defined( 'WP_NONCE_SECRET' ) && is_string( WP_NONCE_SECRET ) && WP_NONCE_SECRET !== '' ) {
		return WP_NONCE_SECRET;
	}

	$ci = _ci_instance();
	if ( $ci && isset( $ci->config ) && method_exists( $ci->config, 'item' ) ) {
		$key = (string) $ci->config->item( 'encryption_key' );
		if ( $key !== '' ) {
			return $key;
		}
	}

	// As a last resort (not recommended), fallback to a process-local secret.
	// Better: define WP_NONCE_SECRET or set CI encryption_key.
	return __FILE__ . '|' . php_uname();
}

/**
 * "User ID" used for nonce salt.
 *
 * In WP this is get_current_user_id(). Here:
 * - CI session userdata 'user_id' if available
 * - otherwise 0
 *
 * @return int
 */
function _wp_nonce_user_id() {
	$ci = _ci_instance();
	if ( $ci && isset( $ci->session ) && method_exists( $ci->session, 'userdata' ) ) {
		$uid = $ci->session->userdata( 'user_id' );
		if ( is_numeric( $uid ) ) {
			return (int) $uid;
		}
	}
	return 0;
}

/**
 * Session token used for nonce salt.
 *
 * In WP this is wp_get_session_token(). Here:
 * - CI session userdata 'session_id' if available
 * - otherwise empty string
 *
 * @return string
 */
function _wp_nonce_session_token() {
	$ci = _ci_instance();
	if ( $ci && isset( $ci->session ) && method_exists( $ci->session, 'userdata' ) ) {
		$sid = $ci->session->userdata( 'session_id' );
		if ( is_string( $sid ) && $sid !== '' ) {
			return $sid;
		}
	}
	return '';
}

/**
 * Emulate wp_nonce_tick().
 *
 * WP default NONCE_LIFE is 86400 seconds; tick changes every 43200 seconds.
 *
 * @param int $nonce_life Seconds. Default 86400.
 * @return int
 */
function _wp_nonce_tick( $nonce_life = 86400 ) {
	$nonce_life = (int) $nonce_life;
	if ( $nonce_life <= 0 ) {
		$nonce_life = 86400;
	}

	$half_life = (int) ceil( $nonce_life / 2 );
	return (int) ceil( time() / $half_life );
}

/**
 * Emulate wp_hash() for nonces.
 *
 * @param string $data
 * @param string $scheme
 * @return string
 */
function _wp_hash( $data, $scheme = 'nonce' ) {
	$secret = _wp_nonce_secret();
	return hash_hmac( 'sha256', (string) $data, $secret . '|' . (string) $scheme );
}

/**
 * Create a WP-like nonce for an action.
 *
 * Emulates wp_create_nonce($action).
 *
 * @param string|int $action
 * @return string 10-char token
 */
function wp_create_nonce( $action = -1 ) {
	$action = (string) $action;

	$uid   = _wp_nonce_user_id();
	$token = _wp_nonce_session_token();
	$tick  = _wp_nonce_tick();

	$data  = $tick . '|' . $action . '|' . $uid . '|' . $token;
	$hash  = _wp_hash( $data, 'nonce' );

	// Like WP: 10 chars derived from the hash.
	return substr( $hash, -12, 10 );
}

/**
 * Verify a WP-like nonce for an action.
 *
 * Emulates wp_verify_nonce($nonce, $action).
 *
 * Return values match WP-style semantics:
 * - 1: valid, generated in current 0-12h tick
 * - 2: valid, generated in previous 12-24h tick
 * - false: invalid
 *
 * @param string $nonce
 * @param string|int $action
 * @return int|false
 */
function wp_verify_nonce( $nonce, $action = -1 ) {
	if ( ! is_string( $nonce ) || $nonce === '' ) {
		return false;
	}

	$action = (string) $action;

	$uid   = _wp_nonce_user_id();
	$token = _wp_nonce_session_token();
	$tick  = _wp_nonce_tick();

	// Current tick.
	$data  = $tick . '|' . $action . '|' . $uid . '|' . $token;
	$hash  = _wp_hash( $data, 'nonce' );
	$good  = substr( $hash, -12, 10 );

	if ( _hash_equals_safe( $good, $nonce ) ) {
		return 1;
	}

	// Previous tick (grace period).
	$data  = ( $tick - 1 ) . '|' . $action . '|' . $uid . '|' . $token;
	$hash  = _wp_hash( $data, 'nonce' );
	$good  = substr( $hash, -12, 10 );

	if ( _hash_equals_safe( $good, $nonce ) ) {
		return 2;
	}

	return false;
}
