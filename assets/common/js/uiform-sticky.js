(function($){   
        var uiformStickybox = function(element, options){
            var elem = $(element);
            var defaults = {
                            
                            enable:1,
                            orientation:'bottomout',
                            form_container: $('.uiform-main-form'),
                            main_container:$('.uiform-preview-base'),
                            sticky:{
                                    width:'200',
                                    height:'200'
                                },
                            resp_orientation:1,
                            backend:0
                        };
             var settings = $.extend({}, defaults, options);           
           var data = {
                'tmp_type': 1,
                'sidebar_obj': elem,
                'mainwrap_obj':null,
                'sidebar_obj_minh':50,
                'formc_obj': null,
                'formc_obj_tempwidth':'',
                'formc_obj_width': '',
                'stickyTop_sec': (parseInt(settings.backend)===1)?settings.form_container.find('.uifm-sticky-top-section'):settings.form_container.find('.uiform-sticky-top-section'),
                'stickyBot_sec': (parseInt(settings.backend)===1)?settings.form_container.find('.uifm-sticky-bottom-section'):settings.form_container.find('.uiform-sticky-bottom-section'),
                'stickyTopout_sec': (parseInt(settings.backend)===1)?settings.main_container.find('.uifm-sticky-topout-section'):settings.main_container.find('.uiform-sticky-topout-section'),
                'stickyBotout_sec': (parseInt(settings.backend)===1)?settings.main_container.find('.uifm-sticky-bottomout-section'):settings.main_container.find('.uiform-sticky-bottomout-section'),
                'stickyTop2': null,
                'stickyHeight': elem.outerHeight(true),
                'win': $(window),
                'breakPoint': '',
                'marg': parseInt(elem.css('margin-top'), 10)
            };
      
           
            // Public method - can be called from client code
            this.publicMethod = function(){
            
            };

            // Private method - can only be called from within this object
            var privateMethod = function(){
            
            };
            this.updateData =function(data){
                settings = $.extend({}, defaults, data);
            }
            
            this.destroy = function(){
            data.win.unbind();
            };
            
            this.init =function(){
              data.mainwrap_obj = settings.main_container;                
              data.formc_obj=settings.form_container;
              
              data.formc_obj_width=data.formc_obj.css('width').replace(/[^-\d\.]/g, '');
              //when main container width has zero value
              if(parseFloat(data.formc_obj_width)<1){
                  data.formc_obj_width=data.mainwrap_obj.parent().width();
              }
              
              data.stickyTop2 = data.formc_obj.offset().top;
              data.breakPoint=elem.outerWidth(true) + data.formc_obj.outerWidth(true);
              buildsticky();
            }
            
            var buildsticky=function(){
                
                buildOrientation();
                if(parseInt(settings.backend)===0){
              
                    
                    switch (settings.orientation) {
                                    case 'right':
                                    case 'left':
                                          stick();
                                        if(parseInt(settings.enable)){
                                                data.win.bind({
                                                     'scroll': stick,
                                                    'resize': function() {
                                                    buildOrientation();
                                                     stick();
                                                    }
                                                });
                                            }
                                        break;

                                }
                    
                    
                }
                
            }
            function getBoxWidth(showExt) {
               var tmpwidth;
               switch (parseInt(data.tmp_type)) {
                    case 1:    
                    case 2:
                      if(showExt){
                        tmpwidth=settings.sticky.width+'px';
                      }else{
                        tmpwidth=settings.sticky.width;   
                      }
                      break;
                    case 0:  
                    case 4:
                    case 3:
                    case 5:    
                      
                          if(showExt){
                            tmpwidth='100%';
                          }else{
                            tmpwidth=data.sidebar_obj.css('width','100%').width();
                          }
                      
                      break;
                }
               return tmpwidth; 
            }
            function getBoxHeight() {
                var tmpheight;
                tmpheight=data.sidebar_obj.height();
                return tmpheight;
            }
            
            
           
            
            // Sets sidebar to fixed position
            function setFixedSidebar() {
                
                
                switch (parseInt(data.tmp_type)) {
                    case 1:
                    case 2:
                        //sidebar left
                        if(parseInt(settings.backend)===1){
                            data.sidebar_obj.css({
                            position: 'absolute',
                            top: 0
                            });
                        }else{
                            data.sidebar_obj.css({
                            position: 'fixed',
                            top: 0
                            });
                        }
                      
                        break;
                    case 3:
                    case 5:    
                        //sidebar bottom
                        if(parseInt(settings.backend)===1){
                            data.sidebar_obj.css({
                            position: 'absolute',
                            bottom: 0
                            });
                        }else{
                            /*data.sidebar_obj.css({
                            position: 'fixed',
                            bottom: 0
                            });*/
                        }
                        break;
                    case 4:
                        //sticky on top
                        if(parseInt(settings.backend)===1){
                          data.sidebar_obj.css({
                            position: 'absolute',
                            top: 0
                            });
                        }else{
                         /*  data.sidebar_obj.css({
                            position: 'fixed',
                            top: 0
                            });*/
                        }
                        break;    
                    case 0:
                    default:
                        //sticky on top
                        if(parseInt(settings.backend)===1){
                          data.sidebar_obj.css({
                            position: 'absolute',
                            top: 0
                            });
                        }else{
                          /* data.sidebar_obj.css({
                            position: 'fixed',
                            top: 0
                            });*/
                        }
                        break;
                }
                
            }
            
            function checkSidebarOnDefaultPos() {
                /*check if inside bot out*/
                        if ($(data.stickyBotout_sec).html().length != 0) {
                            data.sidebar_obj.insertBefore(data.formc_obj); 
                        }
            }
            
            // Determines the sidebar orientation and sets margins accordingly
            function checkOrientation() {
                
                data.sidebar_obj.css('display','block');
                
                data.stickyHeight=data.sidebar_obj.outerHeight(true);
                
                switch (parseInt(data.tmp_type)) {
                    case 1:
                        //sidebar right
                        
                        
                        data.sidebar_obj.css('margin-left', data.formc_obj.outerWidth(true));
                        
                        checkSidebarOnDefaultPos();
                    
                        if($(window).width() <= 410){  
                           
                            }else{
                                
                                 if ($(data.stickyTop_sec).html().length != 0) {
                                         data.sidebar_obj.insertBefore(data.formc_obj);
                                         data.stickyTop2 = data.formc_obj.position().top;
                                        }
                                    if ($(data.stickyBot_sec).html().length != 0) {
                                        data.sidebar_obj.insertBefore(data.formc_obj);
                                        data.stickyTop2 = data.formc_obj.position().top;
                                    } 
                                    
                                    data.stickyTop2 = data.formc_obj.offset().top;
                                 
                            }
                        
                        break;
                    case 2:
                        //sidebar left
                      data.formc_obj.css('margin-left', data.sidebar_obj.outerWidth(true));
                      
                      checkSidebarOnDefaultPos();
                      
                      if($(window).width() <= 410){  
                         
                        }else{
                                 if ($(data.stickyTop_sec).html().length != 0) {
                                         data.sidebar_obj.insertBefore(data.formc_obj);
                                         data.stickyTop2 = data.formc_obj.position().top;
                                    }   
                                    if ($(data.stickyBot_sec).html().length != 0) {
                                        data.sidebar_obj.insertBefore(data.formc_obj);
                                        data.stickyTop2 = data.formc_obj.position().top;
                                    } 
                                    
                                    data.stickyTop2 = data.formc_obj.offset().top;
                            }
                        break;
                    case 3:
                        //sidebar bottom
                        /*removing right atributes*/
                        data.formc_obj.removeCss('margin-left');
                        data.sidebar_obj.removeCss('margin-left');
                        data.sidebar_obj.removeCss('float');
                        data.sidebar_obj.removeCss('top');
                        
                         if ($(data.stickyBot_sec).html().length === 0) {
                            data.sidebar_obj.appendTo(data.stickyBot_sec);
                            data.stickyTop2 = data.stickyBot_sec.position().top+data.stickyBot_sec.outerHeight(true);
                            
                        }
                        
                        break;
                    case 4:
                        //sticky on top
                        /*removing right atributes*/
                        data.formc_obj.removeCss('margin-left');
                        data.sidebar_obj.removeCss('margin-left');
                        data.sidebar_obj.removeCss('float');
                        
                       
                        
                        if ($(data.stickyTopout_sec).html().length === 0) {
                            data.sidebar_obj.appendTo(data.stickyTopout_sec);
                        }
                        if ($(data.stickyBotout_sec).html().length != 0) {
                            data.sidebar_obj.insertBefore(data.formc_obj);
                        }
                        break;
                     case 5:
                        //sidebar bottom out
                        /*removing right atributes*/
                        data.formc_obj.removeCss('margin-left');
                        data.sidebar_obj.removeCss('margin-left');
                        data.sidebar_obj.removeCss('float');
                        data.sidebar_obj.removeCss('top');
                        
                         if ($(data.stickyBotout_sec).html().length === 0) {
                            data.sidebar_obj.appendTo(data.stickyBotout_sec);
                            data.stickyTop2 = data.stickyBotout_sec.position().top+data.stickyBotout_sec.outerHeight(true);
                            
                        }
                        
                        break;   
                    case 0:
                    default:
                        //sticky on top
                        /*removing right atributes*/
                        data.formc_obj.removeCss('margin-left');
                        data.sidebar_obj.removeCss('margin-left');
                        data.sidebar_obj.removeCss('float');
                        
                       
                        
                        if ($(data.stickyTop_sec).html().length === 0) {
                            data.sidebar_obj.appendTo(data.stickyTop_sec);
                        }
                        if ($(data.stickyBot_sec).html().length != 0) {
                            data.sidebar_obj.insertBefore(data.formc_obj);
                            
                        }
                        break;
                }
                
            }
            
            
            // sets sidebar to a static positioned element
            function setStaticSidebar() {
               
                switch (parseInt(data.tmp_type)) {
                    case 1:
                        if(parseInt(settings.backend)===1){
                             data.sidebar_obj.css({
                            'position': 'absolute',
                            'float':'right'
                            });
                        }else{
                             data.sidebar_obj.css({
                            'position': 'absolute',
                            'float':'right'
                            });
                        }
                       
                        break;
                    case 2:
                        //sidebar left
                        if(parseInt(settings.backend)===1){
                            data.sidebar_obj.css({
                            'position': 'absolute',
                            'float':'left'
                            });
                        }else{
                            data.sidebar_obj.css({
                            'position': 'static',
                            'float':'left'
                            });
                        }
                        
                        break;
                    case 3:
                        //sidebar bottom
                        if(parseInt(settings.backend)===1){
                            data.sidebar_obj.css({
                            'position': 'static'
                            });
                        }else{
                            data.sidebar_obj.css({
                            'position': 'static'
                            });
                        }
                        
                        break;
                    case 4:
                        //sticky on top
                        if(parseInt(settings.backend)===1){
                           data.sidebar_obj.css({
                            'position': 'static'
                            });
                        }else{
                            data.sidebar_obj.css({
                            'position': 'static'
                            }); 
                        }
                        break;
                    case 5:
                        //sticky on bottom out
                        if(parseInt(settings.backend)===1){
                           data.sidebar_obj.css({
                            'position': 'static'
                            });
                        }else{
                            data.sidebar_obj.css({
                            'position': 'static'
                            }); 
                        }
                        break;    
                    case 0:
                    default:
                        //sticky on top
                        if(parseInt(settings.backend)===1){
                           data.sidebar_obj.css({
                            'position': 'static'
                            });
                        }else{
                            data.sidebar_obj.css({
                            'position': 'static'
                            }); 
                        }
                        break;
                }
                
               
            }
            function checkFormContent(){
                /*removing width from form content*/
                
                //check if function removecss exist
                if ($.fn.removeCss) {
                    
                }else{
                    //implement function
                    $.fn.removeCss = function() {
                    var removedCss = $.makeArray(arguments);
                    return this.each(function() {
                        var e$ = $(this);
                        var style = e$.attr('style');
                        if (typeof style !== 'string') return;
                        style = $.trim(style);
                        var styles = style.split(/;+/);
                        var sl = styles.length;
                        for (var l = removedCss.length, i = 0; i < l; i++) {
                        var r = removedCss[i];
                        if (!r) continue;
                        for (var j = 0; j < sl;) {
                            var sp = $.trim(styles[j]);
                            if (!sp || (sp.indexOf(r) === 0 && $.trim(sp.substring(r.length)).indexOf(':') === 0)) {
                            styles.splice(j, 1);
                            sl--;
                            } else {
                            j++;
                            }
                        }
                        }
                        if (styles.length === 0) {
                        e$.removeAttr('style');
                        } else {
                        e$.attr('style', styles.join(';'));
                        }
                    });
                    };
                }
                
                data.formc_obj.removeCss('width');
                    data.formc_obj.removeCss('margin');
                    data.formc_obj.removeCss('margin-left');
                    data.formc_obj.removeCss('margin-right');
                    /*removing margin from sidebar box*/
                    data.sidebar_obj.removeCss('margin');
                    data.sidebar_obj.removeCss('margin-left');
                    data.sidebar_obj.removeCss('margin-right');
                
                
                 switch (parseInt(data.tmp_type)) {
                    case 1:
                    /*right*/
                    case 2:
                        /*left*/
                        var main_container_width=data.mainwrap_obj.css('width').replace(/[^-\d\.]/g, '');
                        //when main container width has zero value
                        if(parseFloat(main_container_width)<1){
                            main_container_width=data.mainwrap_obj.parent().width();
                        }
                        
                        /*apply new width to form content*/
                        if(parseInt(settings.backend)===1){
                            data.formc_obj_tempwidth=parseFloat(main_container_width)-parseFloat(getBoxWidth(false))-30;
                        }else{
                            data.formc_obj_tempwidth=parseFloat(main_container_width)-parseFloat(getBoxWidth(false));    
                        }
                        
                        
                        data.formc_obj.css('width',data.formc_obj_tempwidth);
                        if(data.formc_obj_tempwidth<450){
                        data.formc_obj_tempwidth=450;
                        }
                        break;
                    case 3:
                        //sidebar bottom
                        
                        break;
                    case 0:
                    default:
                        //sticky on top
                        
                        break;
                }
            }
            
            function checkFormatSidebar(){
                /*removing width from form content*/
                 switch (parseInt(data.tmp_type)) {
                    case 1:
                        /*right*/
                    case 2:
                        /*left*/    
                         //sticky on top or bottom
                         /*removing right top*/
                        data.sidebar_obj.removeCss('min-height');   
                        /*adding dimenssions*/
                        data.sidebar_obj.css('min-height',getBoxHeight()+'px');
                        data.sidebar_obj.css('width',getBoxWidth(true));
                        break;
                    case 3:
                        //sidebar bottom
                       
                        data.sidebar_obj.css({
                        'height': 'auto',
                        'min-height':'50px',
                        'width':getBoxWidth(true)
                        });
                        break;
                    case 4:
                        //sticky on top out
                        data.sidebar_obj.css({
                        'height': 'auto',
                        'min-height':'50px',
                        'width':getBoxWidth(true)
                        });
                        break;
                    case 5:
                        //sidebar bottom out
                       
                        data.sidebar_obj.css({
                        'height': 'auto',
                        'min-height':'50px',
                        'width':getBoxWidth(true)
                        });
                        break;    
                    case 0:
                    default:
                        //sticky on top or bottom
                        data.sidebar_obj.css({
                        'height': 'auto',
                        'min-height':'50px',
                        'width':getBoxWidth(true)
                        });
                        break;
                }
            }
            
            // initiated to stop the sidebar from intersecting the footer
            function setLimitedSidebar(diff) {
                data.sidebar_obj.css({
                    top: diff
                });
            }
           
            //  Calcualtes the limits top and bottom limits for the sidebar
            function calculateLimits() {
                 
                
                 
                switch (parseInt(data.tmp_type)) {
                    case 0:
                    case 1:    
                    case 2:
                      return {
                    limit: $(data.formc_obj).offset().top+$(data.formc_obj).outerHeight() - data.stickyHeight,
                    windowTop: data.win.scrollTop(),
                    stickyTop: data.stickyTop2 - data.marg
                    }
                      break;
                    case 4:
                      
                      return {
                    limit: $(data.mainwrap_obj).offset().top+$(data.mainwrap_obj).outerHeight() - data.stickyHeight,
                    windowTop: data.win.scrollTop(),
                    stickyTop: data.stickyTop2 - data.marg
                    }
                      break;  
                    case 3:
                    case 5:    
                      return {
                    limit: $(data.formc_obj).offset().top+$(data.formc_obj).outerHeight() - data.stickyHeight,
                    windowTop: data.win.scrollTop(),
                    stickyTop: data.stickyTop2 - data.marg
                    }
                      break;
                        
                }
            }
           
           var stick = function (){
               
            switch (settings.orientation) {
                                case 'right':
                                case 'left':
                                    var tops = calculateLimits();
                                    var hitBreakPoint;
                                    switch (parseInt(data.tmp_type)) {
                                        case 0:
                                        case 1:    
                                        case 2:
                                        hitBreakPoint = tops.stickyTop < tops.windowTop;
                                            break;
                                        case 4:
                                        hitBreakPoint = tops.stickyTop < tops.windowTop;
                                            break;  
                                        case 3:
                                        case 5:    
                                        hitBreakPoint = tops.windowTop < tops.stickyTop && (data.stickyTop2-data.win.height())>tops.windowTop; 
                                            break;
                                    }

                                    if (hitBreakPoint) {
                                        setFixedSidebar();
                                        checkOrientation();
                                    } else {
                                        setStaticSidebar();
                                    }
                                    /*restrict last bottom border*/
                                    switch (parseInt(data.tmp_type)) {
                                        case 0:
                                        case 1:   
                                        case 2:
                                        case 4:    
                                        if (tops.limit < tops.windowTop) {
                                                var diff = tops.limit - tops.windowTop;
                                                setLimitedSidebar(diff);
                                            }
                                        break;

                                    }
                                break;
                            }
               
                
            }
            var buildOrientation = function(){
              
                switch (settings.orientation) {
                    case 'right':
                            if($(window).width() <= 410){
                                if(parseInt(settings.resp_orientation)===2){
                                    data.tmp_type = 3;
                                }else{
                                    data.tmp_type = 0;
                                }
                            }else{
                                data.tmp_type = 1;
                            }
                            
                            checkFormatSidebar();
                            checkFormContent();
                            /*sidevar*/
                            checkOrientation();
                            setStaticSidebar();
                        break;
                    case 'left':
                        //sidebar left
                        if($(window).width() <= 410){
                                if(parseInt(settings.resp_orientation)===2){
                                    data.tmp_type = 3;
                                }else{
                                    data.tmp_type = 0;
                                }
                                
                            }else{
                                data.tmp_type = 2;
                            }
                        
                        checkFormatSidebar();
                            checkFormContent();
                            /*sidevar*/
                            checkOrientation();
                            setStaticSidebar();
                        break;
                    case 'bottom':
                        //sideber bottom
                        //sticky on top
                        data.tmp_type = 3;
                        checkFormatSidebar();
                        checkFormContent();
                         /*sidevar*/
                            checkOrientation();
                            setStaticSidebar();
                        break;
                    case 'topout':
                        //sticky on top
                        data.tmp_type = 4;
                        checkFormatSidebar();
                        checkFormContent();
                         /*sidevar*/
                            checkOrientation();
                            setStaticSidebar();
                        break;
                    case 'bottomout':
                        //sideber bottom
                        //sticky on top
                        data.tmp_type = 5;
                        checkFormatSidebar();
                        checkFormContent();
                         /*sidevar*/
                            checkOrientation();
                            setStaticSidebar();
                        break;    
                    case 'top':
                    default:
                        //sticky on top
                        data.tmp_type = 0;
                        checkFormatSidebar();
                        checkFormContent();
                         /*sidevar*/
                            checkOrientation();
                            setStaticSidebar();
                        break;
                }
                
            }
            
            
        };
        
        $.fn.uiform_stickybox = function(options){
            return this.each(function(){
                var element = $(this);

                // Return early if this element already has a plugin instance
                if (element.data('uiform_stickybox')) return;

                // pass options to plugin constructor
                var myplugin = new uiformStickybox(this, options);

                // Store plugin object in this element's data
                element.data('uiform_stickybox', myplugin);

                myplugin.init();
            });
        };
})($uifm);

