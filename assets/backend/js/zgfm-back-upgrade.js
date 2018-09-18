if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_upgrade = zgfm_back_upgrade || null;
if(!$uifm.isFunction(zgfm_back_upgrade)){
(function($, window) {
 "use strict";  
    
var zgfm_back_upgrade = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {

        let cur_core_arr=rocketform.getUiData('app_ver');
        //if version prev to 3.4.1
        
        //only calculators
        
        switch(zgfm_back_helper.versionCompare(String(cur_core_arr),"3.4.1")){
            case 1:
                break;
            case -1:
            case 0:
                    this.upgrade_prev_3_4_1();
                break;
        }
        
    }
    
   this.upgrade_prev_3_4_1 = function(){
       
       var tmp_calc_arr = rocketform.getUiData2('calculation','variables');
       var tmp_new_calc_arr={};
       var tmp_new_index;
       if (typeof tmp_calc_arr == 'object') {
            
           
            for( var i in tmp_calc_arr ) {
             switch(String(i)){
                       case '0':
                           tmp_new_calc_arr[i] = tmp_calc_arr[i];
                           break;
                       default:
                           tmp_new_index= zgfm_back_helper.generateUniqueID(5);
                           tmp_new_calc_arr[tmp_new_index] = tmp_calc_arr[i];
                           break;
                   }
            }
            
            var tmp_count=0;
            for( var i in tmp_new_calc_arr ) {
                    
                       //checking id
                    if (typeof tmp_new_calc_arr[i].id == 'object') {
                    }else{
                        tmp_new_calc_arr[i]['id'] = i;
                        tmp_new_calc_arr[i]['order'] = tmp_count;
                    }
                    tmp_count++;
            }
            
        }
     
       rocketform.setUiData2('calculation','variables',tmp_new_calc_arr); 
   }
    
};
window.zgfm_back_upgrade = zgfm_back_upgrade = $.zgfm_back_upgrade = new zgfm_back_upgrade();


})($uifm,window);
} 