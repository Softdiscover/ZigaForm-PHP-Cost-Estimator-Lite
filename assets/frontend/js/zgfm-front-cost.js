if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_front_cost = zgfm_front_cost || null;
if(!$uifm.isFunction(zgfm_front_cost)){
(function($, window) {
 "use strict";  
    
var zgfm_front_cost = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
      var accounting;
    
    this.setAccounting = function(obj) {
                //set default vars
                accounting=obj;
            };
    
    this.initialize = function() {
 
        
    }
   
       this.costest_sticky_init = function (obj_form) {
          
          var sm_pos_lbl=obj_form.find('.uiform-sticky-sidebar-box').attr('data-sticky-pos'),
                          sm_box_sd_width='200';
                          
                      obj_form.find('.uiform-sticky-sidebar-box').uiform_stickybox({
                                enable:1,
                                orientation:sm_pos_lbl,
                                form_container: obj_form.find('.uiform-main-form'),
                                main_container:obj_form.closest('.rockfm-form-container'),
                                sticky:{
                                        width:sm_box_sd_width,
                                        height:'200'
                                    },
                                resp_orientation:1,
                                backend:0
                            });
                     if(obj_form.find('.rockfm-costest-field').length){
                        /*get total cost*/
                         zgfm_front_cost.costest_fillSticky(obj_form);
                      }
                     
                      //format all prices inside form
                        if(obj_form.find('.uiform-stickybox-inp-price').length){
                             var rockfm_tmp_price=obj_form.find('.uiform-stickybox-inp-price');

                             rockfm_tmp_price.each(function (i) {
                                 $(this).html(zgfm_front_cost.format_money(obj_form,$(this).html()));
                                 });
                         }     
                    
                        
      };       
             
      this.costest_listenEvents = function (obj_form) {
          
       
          var objsToSearch = obj_form.find(".rockfm-costest-field");
           
          objsToSearch.find('.rockfm-inp2-rdo').on('change', function(e) {
               if(e) {  e.stopPropagation(); e.preventDefault();} 
            var obj_form= $(e.target).closest('.rockfm-form');
              zgfm_front_cost.costest_refresh(obj_form);
            });
          
          objsToSearch.find('.rockfm-inp2-chk').on('change', function(e) {
               if(e) {  e.stopPropagation(); e.preventDefault();} 
            var obj_form= $(e.target).closest('.rockfm-form');
              zgfm_front_cost.costest_refresh(obj_form);
            });  
            
         /*spinner*/
         $(document).on("change keyup",objsToSearch.find('.rockfm-input4-spinner'), function(e) {
            var obj_form= $(e.target).closest('.rockfm-form');
            zgfm_front_cost.costest_refresh(obj_form);
            });
            
         /*slider*/
         objsToSearch.find('.rockfm-input4-slider').on('slideStop', function(slideEvt) {
              if(slideEvt) {  slideEvt.stopPropagation(); slideEvt.preventDefault();} 
             var obj_form= $( this ).closest('.rockfm-form');
            zgfm_front_cost.costest_refresh(obj_form);
         });
         /*switch*/
         objsToSearch.find('.rockfm-input15-switch').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
             if(event) {  event.stopPropagation(); event.preventDefault();} 
            var obj_form= $( this ).closest('.rockfm-form');
            zgfm_front_cost.costest_refresh(obj_form);
            });
            
          /*date*/
                 
        objsToSearch.find('.rockfm-input7-datepic').on('dp.change', function(event) {
             if(event) {  event.stopPropagation(); event.preventDefault();} 
            
             var obj_form= $( this ).closest('.rockfm-form');
                zgfm_front_cost.costest_refresh(obj_form);
            }); 
        objsToSearch.find('.rockfm-input7-datetimepic').on('dp.change', function(event) {
             if(event) {  event.stopPropagation(); event.preventDefault();} 
            
             var obj_form= $( this ).closest('.rockfm-form');
                zgfm_front_cost.costest_refresh(obj_form);
            });   
            
      };     
      this.costest_summbox_linkPopUp = function (element) {
          var el=$(element);
          var main_container=el.closest('.rockfm-form-container');
          
          main_container.find('.uiform_modal_general').sfdc_modal('show');
          
          var result;
          var obj_form= el.closest('.rockfm-form');
          result=zgfm_front_cost.costest_fillSummBox(obj_form,true);
          
          /*fill modal content*/
          var str_content='';
          
          
          var tmp_heading =obj_form.find('.uiform-sticky-sidebar-box-content').clone();
          tmp_heading.find('.uiform-stickybox-summary').after("<div class='space10'></div>");
                tmp_heading.find('.uiform-stickybox-summary').remove();
              tmp_heading.find('.uiform-stickybox-summary-link').remove();
              tmp_heading.find('p:first').css('font-weight','bold');
          str_content+=tmp_heading.html();
          str_content+=result[0];
          main_container.find('.uiform_modal_general').find('.sfdc-modal-body').html('<div id="rockfm_show_summary_link">'+str_content+'</div>');
          /*title*/
          main_container.find('.uiform_modal_general').find('.sfdc-modal-title').html(main_container.find('._rockfm_sticky_cpt_modal_title').val());
          
      };
      
      this.format_money = function (obj_form,amount) {
          
         
          var tmp_amount;
          var obj_form_id=obj_form.find('._rockfm_form_id').val();
          var tmp_cur_format_st,tmp_cur_decimal,tmp_cur_thousand,tmp_cur_precision;
          tmp_cur_format_st=rocketfm.getInnerVariable_byform(obj_form_id,'price_format_st');
           
          tmp_cur_decimal=rocketfm.getInnerVariable_byform(obj_form_id,'price_sep_decimal');
          tmp_cur_thousand=rocketfm.getInnerVariable_byform(obj_form_id,'price_sep_thousand');
          tmp_cur_precision=rocketfm.getInnerVariable_byform(obj_form_id,'price_sep_precision');
          
          
          if(parseInt(tmp_cur_format_st)===1){
             tmp_amount= accounting.formatMoney(amount,"",parseInt(tmp_cur_precision),tmp_cur_thousand,tmp_cur_decimal);
          }else{
              //tmp_amount= accounting.toFixed(amount,parseInt(tmp_cur_precision));
             tmp_amount= parseFloat(amount); 
          }
          
          return tmp_amount;
      };
      
      this.costest_fillSticky = function (obj_form) {
          var result;
          result=zgfm_front_cost.costest_fillSummBox(obj_form,false);
          
          var tmp_total = result[1];
          rocketfm.setInnerVariable('calc_cur_total',tmp_total);
          
          obj_form.find('.uiform-stickybox-summary-list').html(result[0]);
          
           /*check summary link*/
           
           //when summary box exist
           if(obj_form.find('.uiform-stickybox-summary').length){
              if(result[2]>=result[3]){
               obj_form.find('.uiform-stickybox-summary-link').show();
               
            }else{
               obj_form.find('.uiform-stickybox-summary-link').hide(); 
            } 
           }else{
                obj_form.find('.uiform-stickybox-summary-link').show();
           }
           
           //output total
           zgfm_front_calc.costest_calc_math_process(obj_form);
           
      };
      
      this.costest_refresh = function (obj_form) {
          
          //sticky
           if(obj_form.find('.uiform-sticky-sidebar-box').length &&
                       (parseInt(obj_form.find('._rockfm_sticky_st').val())===1)
                        ){
                        zgfm_front_cost.costest_fillSticky(obj_form);
               }else{
                   //output total
                     zgfm_front_calc.costest_calc_math_process(obj_form);
               }
               
          //refresh recfvar
          this.variables_refreshOnFront(obj_form);
          
      };
      
      this.variables_refreshOnFront = function (obj_form) {
          var tmp_f_arr=$('.zgfm-recfvar-obj');
          var tmp_f_obj,tmp_f_obj_type,tmp_f_atr1;
          var tmp_output,tmp_uifm_fld_price;
          if(tmp_f_arr.length){
              $.each( tmp_f_arr, function( key, value ) {
                tmp_f_obj = $('#rockfm_'+$(this).attr('data-zgfm-id'));
                tmp_f_obj_type = parseInt(tmp_f_obj.attr('data-typefield'));
                tmp_f_atr1 = parseInt($(this).attr('data-zgfm-atr'));
                
                switch(tmp_f_obj_type){
                    case 6:
                    case 7:
                    case 28:
                    case 29:
                    case 30:
                        /*textbox*/
                         switch(tmp_f_atr1){
                            case 1:
                                //input
                                  tmp_output = tmp_f_obj.find('.rockfm-txtbox-inp-val').val();
                                break;
                        }
                        break;
                    case 10:
                        /*select*/
                    case 11:
                        /*multiselect*/    
                        switch(tmp_f_atr1){
                            case 0:
                                //label
                                //rockfm-label
                                tmp_output = tmp_f_obj.find('.rockfm-label').html();
                                
                                break;
                            case 1:
                                //input
                                  tmp_uifm_fld_price=[];
                                if(tmp_f_obj.find('select option:selected').length){
                                    tmp_f_obj.find('select option:selected').each(function () { 
                                        
                                    let uifm_fld_price = $(this).attr('data-uifm-inp-val')||0;
                                    /*summ inside field*/
                                    tmp_uifm_fld_price.push(uifm_fld_price);
                                    });
                                }
                                 
                                tmp_output = tmp_uifm_fld_price.join(",");
                                break;
                            case 2:
                                //cost
                                tmp_uifm_fld_price=0;
                                if(tmp_f_obj.find('select option:selected').length){
                                    tmp_f_obj.find('select option:selected').each(function () { 
                                        
                                    let uifm_fld_price = $(this).attr('data-uifm-inp-price')||0;
                                    /*summ inside field*/
                                    tmp_uifm_fld_price+=parseFloat(uifm_fld_price);
                                    });
                                }
                                 
                                tmp_output = zgfm_front_cost.format_money(obj_form,tmp_uifm_fld_price);
                                break;    
                        }
                    break;
                case 8:
                        /*radio button*/
                   
                        switch(tmp_f_atr1){
                            case 0:
                                //label
                                //rockfm-label
                                tmp_output = tmp_f_obj.find('.rockfm-label').html();
                                
                                break;
                            case 1:
                                //input
                                  tmp_uifm_fld_price=[];
                                if(tmp_f_obj.find('input[type=radio]:checked').length){
                                    tmp_f_obj.find('input[type=radio]:checked').each(function () { 
                                        
                                    let uifm_fld_price = $(this).attr('data-uifm-inp-val')||0;
                                    /*summ inside field*/
                                    tmp_uifm_fld_price.push(uifm_fld_price);
                                    });
                                }
                                 
                                tmp_output = tmp_uifm_fld_price.join(",");
                                break;
                            case 2:
                                //cost
                                tmp_uifm_fld_price=0;
                                if(tmp_f_obj.find('input[type=radio]:checked').length){
                                    tmp_f_obj.find('input[type=radio]:checked').each(function () { 
                                        
                                    let uifm_fld_price = $(this).attr('data-uifm-inp-price')||0;
                                    /*summ inside field*/
                                    tmp_uifm_fld_price+=parseFloat(uifm_fld_price);
                                    });
                                }
                                 
                                tmp_output = zgfm_front_cost.format_money(obj_form,tmp_uifm_fld_price);
                                break;    
                        }
                    break;
                 case 9:
                        /*checkbox*/
                   
                        switch(tmp_f_atr1){
                            case 0:
                                //label
                                //rockfm-label
                                tmp_output = tmp_f_obj.find('.rockfm-label').html();
                                
                                break;
                            case 1:
                                //input
                                  tmp_uifm_fld_price=[];
                                if(tmp_f_obj.find('input[type=checkbox]:checked').length){
                                    tmp_f_obj.find('input[type=checkbox]:checked').each(function () { 
                                        
                                    let uifm_fld_price = $(this).attr('data-uifm-inp-val')||0;
                                    /*summ inside field*/
                                    tmp_uifm_fld_price.push(uifm_fld_price);
                                    });
                                }
                                 
                                tmp_output = tmp_uifm_fld_price.join(",");
                                break;
                            case 2:
                                //cost
                                tmp_uifm_fld_price=0;
                                if(tmp_f_obj.find('input[type=checkbox]:checked').length){
                                    tmp_f_obj.find('input[type=checkbox]:checked').each(function () { 
                                        
                                    let uifm_fld_price = $(this).attr('data-uifm-inp-price')||0;
                                    /*summ inside field*/
                                    tmp_uifm_fld_price+=parseFloat(uifm_fld_price);
                                    });
                                }
                                 
                                tmp_output = zgfm_front_cost.format_money(obj_form,tmp_uifm_fld_price);
                                break;    
                        }
                    break;
                    case 16:
                        /*slider*/
                   
                        switch(tmp_f_atr1){
                            case 0:
                                //label
                                //rockfm-label
                                tmp_output = tmp_f_obj.find('.rockfm-label').html();
                                
                                break;
                            case 1:
                                //input
                                 
                                  tmp_output = tmp_f_obj.find('.rockfm-input4-slider').slider('getValue');
                               
                                break;
                            case 2:
                                //cost
                                let uifm_fld_value = tmp_f_obj.find('.rockfm-input4-slider').slider('getValue');
                                let uifm_fld_price = tmp_f_obj.find('.rockfm-input4-slider').attr('data-uifm-inp-price')||0;
                                tmp_output = parseFloat(uifm_fld_value)*parseFloat(uifm_fld_price);
                                 
                                break;    
                        }
                    break;
                    case 18:
                        /*spinner*/
                   
                        switch(tmp_f_atr1){
                            case 0:
                                //label
                                //rockfm-label
                                tmp_output = tmp_f_obj.find('.rockfm-label').html();
                                
                                break;
                            case 1:
                                //input
                                 
                                  tmp_output = tmp_f_obj.find('.rockfm-input4-spinner').val();
                              
                                break;
                            case 2:
                                //cost
                                let uifm_fld_value = tmp_f_obj.find('.rockfm-input4-spinner').val();
                                let uifm_fld_price = tmp_f_obj.find('.rockfm-input4-spinner').attr('data-uifm-inp-price')||0;
                                tmp_output = parseFloat(uifm_fld_value)*parseFloat(uifm_fld_price);
                                 
                                break;    
                        }
                    break;
                    case 40:
                        /*switch*/
                   
                        switch(tmp_f_atr1){
                            case 0:
                                //label
                                //rockfm-label
                                tmp_output = tmp_f_obj.find('.rockfm-label').html();
                                
                                break;
                            case 1:
                                //input
                                 
                                  tmp_output = tmp_f_obj.find('.rockfm-input15-switch').bootstrapSwitchZgpb('state');
                                  if(tmp_output){
                                    tmp_output = 1;
                                 }else{
                                     tmp_output = 0;
                                 }
                                break;
                            case 2:
                                //cost
                                  tmp_output = tmp_f_obj.find('.rockfm-input15-switch').bootstrapSwitchZgpb('state');
                                  if(tmp_output){
                                    tmp_output = tmp_f_obj.find('.rockfm-input15-switch').attr('data-uifm-inp-price')||0;
                                 }else{
                                     tmp_output = 0;
                                 }
                                 
                                break;    
                        }
                    break;
                default:
                     switch(tmp_f_atr1){
                            case 0:
                                //label
                                //rockfm-label
                                tmp_output = tmp_f_obj.find('.rockfm-label').html();
                                
                                break;
                            case 1:
                                //input
                                  
                                if(tmp_f_obj.find('input').length){
                                    tmp_output = tmp_f_obj.find('input').val();
                                }
                                 
                               if(tmp_f_obj.find('textarea').length){
                                    tmp_output = tmp_f_obj.find('textarea').val();
                                }
                               
                                break;
                              
                        }
                    break;
                }
                
                
                $(this).html(tmp_output);
                
              });
          }
          
          
          
      };
      
      
      
      this.costest_removetags = function (obj) {
           var $dictionable = obj.clone();
                $dictionable.find('a').remove();//This will remove all <a> tag
                $dictionable.find('div').remove();//This will remove all <a> tag
                return $dictionable.text();//This will give all text
      };
      
      this.costest_fillSummBox = function (obj_form,show_all_rows) {
          
          var price_sum=0,uifm_fld_price,uifm_fld_type,uifm_summ_list='';
          
          //get data
          
          var zgfm_data_main = rocketfm.getInnerVariable('_data_main');
          
          var uifm_price_symbol=decodeURIComponent(zgfm_data_main['price_currency_symbol'])||'$';
          var uifm_price_code=zgfm_data_main['price_currency']||'USD';
          
          /*html strings*/
          var tmp_uifm_summ_list='';
          var tmp_uifm_summ_list_inner;
          
          /*control row limit*/
          var tmp_uifm_summ_row_count=0;
          var uifm_summ_row_total=parseInt(obj_form.find('._rockfm_shortcode_summ_data').attr('data-zgfm-rows'))||5;
          
          var zgfm_hide_cur_code=parseInt(obj_form.find('._rockfm_shortcode_summ_data').attr('data-zgfm-hidecurcode'))||0;
          if(zgfm_hide_cur_code===1){
              uifm_price_code ='';
          }
          
          var zgfm_hide_cur_symbol=parseInt(obj_form.find('._rockfm_shortcode_summ_data').attr('data-zgfm-hidecursymbol'))||0;
           
          if(zgfm_hide_cur_symbol===1){
              uifm_price_symbol ='';
          }
          
          uifm_price_symbol=uifm_price_symbol+' ';
          uifm_price_code=' '+uifm_price_code;
          
          /*price temp for field*/
         var tmp_uifm_fld_price;
         var uifm_fld_value;
         var uifm_fld_sub_total;
          obj_form.find('.rockfm-costest-field:not(.rockfm-conditional-hidden)').each(function () {
                uifm_fld_type=$(this).attr('data-typefield');
                switch(parseInt(uifm_fld_type)){
                    case 8:
                        /*radio button*/
                        if($(this).find('input[type=radio]:checked').length){
                            
                            tmp_uifm_summ_list='';
                            /*fill summary list*/
                            if($(this).find('.rockfm-label').length && String(zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))).replace(/ /g,'').length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))+': </span>';    
                             } else if(String($(this).find('.rockfm-fld-data-field_name').html()).length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+$(this).find('.rockfm-fld-data-field_name').html()+': </span>';    
                            }
                            /*end fill summary list*/
                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-row">';
                            tmp_uifm_summ_list+='<ul>';
                                tmp_uifm_summ_list_inner=''
                                $(this).find('input[type=radio]:checked').each(function () {
                                    uifm_fld_price = $(this).attr('data-uifm-inp-price')||0;
                                    /*summ price*/
                                    price_sum += parseFloat(uifm_fld_price);
                                    /*fill summary list*/
                                    tmp_uifm_summ_list_inner+='<li>'+$(this).attr('data-uifm-inp-label');
                                    if(parseFloat(uifm_fld_price)>0){
                                        tmp_uifm_summ_list_inner+=' : '+uifm_price_symbol+zgfm_front_cost.format_money(obj_form,uifm_fld_price)+' '+uifm_price_code;
                                    }
                                    tmp_uifm_summ_list_inner+='</li>';
                                    /*end fill summary list*/
                                    });
                            tmp_uifm_summ_list+= tmp_uifm_summ_list_inner;       
                            tmp_uifm_summ_list+='</ul>';
                            tmp_uifm_summ_list+='</span>';
                            
                             if(show_all_rows || (tmp_uifm_summ_row_count<uifm_summ_row_total)){
                                uifm_summ_list+=tmp_uifm_summ_list;
                            }
                            
                            /*update row counter*/
                            if(tmp_uifm_summ_row_count<uifm_summ_row_total){
                                tmp_uifm_summ_row_count++;
                            }
                        }
                    break;
                    case 9:
                        /*checkbox*/
                        if($(this).find('input[type=checkbox]:checked').length){
                            tmp_uifm_summ_list='';
                            /*fill summary list*/
                            if($(this).find('.rockfm-label').length && String(zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))).replace(/ /g,'').length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))+': </span>';    
                             } else if(String($(this).find('.rockfm-fld-data-field_name').html()).length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+$(this).find('.rockfm-fld-data-field_name').html()+': </span>';    
                            }
                            /*end fill summary list*/
                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-row">';
                            tmp_uifm_summ_list+='<ul>';
                                tmp_uifm_summ_list_inner=''
                                $(this).find('input[type=checkbox]:checked').each(function () {
                                    
                                    uifm_fld_price = $(this).attr('data-uifm-inp-price')||0;
                                    /*summ price*/
                                    price_sum += parseFloat(uifm_fld_price);
                                    /*fill summary list*/
                                    tmp_uifm_summ_list_inner+='<li>'+$(this).attr('data-uifm-inp-label');
                                    if(parseFloat(uifm_fld_price)>0){
                                    tmp_uifm_summ_list_inner+=' : '+uifm_price_symbol+zgfm_front_cost.format_money(obj_form,uifm_fld_price)+' '+uifm_price_code;
                                    }
                                    tmp_uifm_summ_list_inner+='</li>';
                                    /*end fill summary list*/
                                    });
                            tmp_uifm_summ_list+= tmp_uifm_summ_list_inner;       
                            tmp_uifm_summ_list+='</ul>';
                            tmp_uifm_summ_list+='</span>';
                            
                             if(show_all_rows || ( tmp_uifm_summ_row_count<uifm_summ_row_total)){
                                uifm_summ_list+=tmp_uifm_summ_list;
                            }
                            
                            /*update row counter*/
                            if(tmp_uifm_summ_row_count<uifm_summ_row_total){
                                tmp_uifm_summ_row_count++;
                            }
                        }
                    break;
                    case 10:
                        /*select*/
                    case 11:
                        /*multiselect*/
                        if($(this).find('select option:selected').length){
                            tmp_uifm_summ_list='';
                            /*fill summary list*/
                            if($(this).find('.rockfm-label').length && String(zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))).replace(/ /g,'').length>0){
                                
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))+': </span>';    
                            } else if(String($(this).find('.rockfm-fld-data-field_name').html()).length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+$(this).find('.rockfm-fld-data-field_name').html()+': </span>';    
                            }
                            /*end fill summary list*/
                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-row">';
                            tmp_uifm_summ_list+='<ul>';
                                tmp_uifm_summ_list_inner='';
                               
                                tmp_uifm_fld_price=0;
                               
                                $(this).find('select option:selected').each(function () {
                                    
                                    uifm_fld_price = $(this).attr('data-uifm-inp-price')||0;
                                    /*summ price*/
                                    price_sum += parseFloat(uifm_fld_price);
                                    /*summ inside field*/
                                    tmp_uifm_fld_price+=parseFloat(uifm_fld_price);
                                    /*fill summary list*/
                                    tmp_uifm_summ_list_inner+='<li>'+$(this).text();
                                    if(parseFloat(uifm_fld_price)>0){
                                        
                                        tmp_uifm_summ_list_inner+=' : '+uifm_price_symbol+zgfm_front_cost.format_money(obj_form,uifm_fld_price)+' '+uifm_price_code;
                                    }
                                    tmp_uifm_summ_list_inner+='</li>';
                                    /*end fill summary list*/
                                    });
                                    
                            tmp_uifm_summ_list+= tmp_uifm_summ_list_inner;       
                            tmp_uifm_summ_list+='</ul>';
                            tmp_uifm_summ_list+='</span>';
                            
                             if(show_all_rows || ( tmp_uifm_summ_row_count<uifm_summ_row_total)){
                                uifm_summ_list+=tmp_uifm_summ_list;
                            }
                            
                            /*update row counter*/
                            if(tmp_uifm_summ_row_count<uifm_summ_row_total){
                                tmp_uifm_summ_row_count++;
                            }
                            
                            /*update preview price*/
                            $(this).find('.rockfm-inp2-opt-price-lbl').show();
                            $(this).find('.rockfm-inp2-opt-price-lbl .uiform-stickybox-inp-price').html(zgfm_front_cost.format_money(obj_form,tmp_uifm_fld_price));
                        }else{
                            $(this).find('.rockfm-inp2-opt-price-lbl').hide();
                        }
                    break;
                    case 16:
                        /*slider*/
                        tmp_uifm_summ_list='';
                            /*end fill summary list*/
                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-row">';
                            
                            
                                tmp_uifm_summ_list_inner='';
                               
                                tmp_uifm_fld_price=0;
                                
                                 uifm_fld_value = $(this).find('.rockfm-input4-slider').slider('getValue');
                                
                                uifm_fld_price = $(this).find('.rockfm-input4-slider').attr('data-uifm-inp-price')||0;
                                 uifm_fld_sub_total=parseFloat(uifm_fld_value)*parseFloat(uifm_fld_price);
                                /*summ price*/
                                    price_sum += parseFloat(uifm_fld_sub_total);
                                    /*summ inside field*/
                                    tmp_uifm_fld_price+=parseFloat(uifm_fld_sub_total);
                                 /*fill summary list*/
                                    if(parseFloat(uifm_fld_sub_total)>0){
                                         /*fill summary list*/
                                        if($(this).find('.rockfm-label').length && String(zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))).replace(/ /g,'').length>0){
                                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title2">'+zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))+': </span>';    
                                         } else if(String($(this).find('.rockfm-fld-data-field_name').html()).length>0){
                                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+$(this).find('.rockfm-fld-data-field_name').html()+': </span>';    
                                        }
                                        
                                        
                                        tmp_uifm_summ_list_inner+=' <span class="uiform-sbox-summ-fld-price"><ul><li>'+uifm_price_symbol+zgfm_front_cost.format_money(obj_form,uifm_fld_sub_total)+uifm_price_code+'</ul></li></span>';
                                    }
                                    /*end fill summary list*/        
                            tmp_uifm_summ_list+= tmp_uifm_summ_list_inner;
                            tmp_uifm_summ_list+='</span>';
                            
                             if(show_all_rows || (parseFloat(uifm_fld_sub_total)>0 && tmp_uifm_summ_row_count<uifm_summ_row_total)){
                                uifm_summ_list+=tmp_uifm_summ_list;
                            }
                            
                            /*update row counter*/
                            if(parseFloat(uifm_fld_sub_total)>0 && tmp_uifm_summ_row_count<uifm_summ_row_total){
                                tmp_uifm_summ_row_count++;
                            }
                            
                            /*update preview price*/
                            $(this).find('.rockfm-inp4-opt-price-lbl').show();
                            $(this).find('.rockfm-inp4-opt-price-lbl .uiform-stickybox-inp-price').html(zgfm_front_cost.format_money(obj_form,tmp_uifm_fld_price));
                        break;
                    case 18:
                        /*spinner*/
                        tmp_uifm_summ_list='';
                            /*end fill summary list*/
                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-row">';
                           
                            
                                tmp_uifm_summ_list_inner='';
                               
                                tmp_uifm_fld_price=0;
                                
                                 uifm_fld_value = $(this).find('.rockfm-input4-spinner').val();
                                uifm_fld_price = $(this).find('.rockfm-input4-spinner').attr('data-uifm-inp-price')||0;
                                 uifm_fld_sub_total=parseFloat(uifm_fld_value)*parseFloat(uifm_fld_price);
                                /*summ price*/
                                    price_sum += parseFloat(uifm_fld_sub_total);
                                    /*summ inside field*/
                                    tmp_uifm_fld_price+=parseFloat(uifm_fld_sub_total);
                                 /*fill summary list*/
                                 if(parseFloat(uifm_fld_sub_total)>0){
                                     
                                       /*fill summary list*/
                                        if($(this).find('.rockfm-label').length && String(zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))).replace(/ /g,'').length>0){
                                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title2">'+zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))+': </span>';    
                                         } else if(String($(this).find('.rockfm-fld-data-field_name').html()).length>0){
                                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+$(this).find('.rockfm-fld-data-field_name').html()+': </span>';    
                                        }
                                        
                                     tmp_uifm_summ_list_inner+=' <span class="uiform-sbox-summ-fld-price"><ul><li>'+uifm_price_symbol+zgfm_front_cost.format_money(obj_form,uifm_fld_sub_total)+uifm_price_code+'</li></ul></span>';
                                 }
                                    
                                    
                                    /*end fill summary list*/        
                            tmp_uifm_summ_list+= tmp_uifm_summ_list_inner;       
                           
                            tmp_uifm_summ_list+='</span>';
                            
                             if(show_all_rows || (parseFloat(uifm_fld_sub_total)>0 && tmp_uifm_summ_row_count<uifm_summ_row_total)){
                                uifm_summ_list+=tmp_uifm_summ_list;
                            }
                            
                            /*update row counter*/
                            if(parseFloat(uifm_fld_sub_total)>0 && tmp_uifm_summ_row_count<uifm_summ_row_total){
                                tmp_uifm_summ_row_count++;
                            }
                            
                            /*update preview price*/
                            $(this).find('.rockfm-inp4-opt-price-lbl').show();
                            $(this).find('.rockfm-inp4-opt-price-lbl .uiform-stickybox-inp-price').html(zgfm_front_cost.format_money(obj_form,tmp_uifm_fld_price));
                        break;
                     case 40:
                        /*switch*/
                        tmp_uifm_summ_list='';
                            /*end fill summary list*/
                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-row">';
                             /*fill summary list*/
                            if($(this).find('.rockfm-label').length && String(zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))).replace(/ /g,'').length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title2">'+zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))+': </span>';    
                             } else if(String($(this).find('.rockfm-fld-data-field_name').html()).length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+$(this).find('.rockfm-fld-data-field_name').html()+': </span>';    
                            }
                            
                                tmp_uifm_summ_list_inner='';
                               
                                tmp_uifm_fld_price=0;
                                
                                 uifm_fld_value = $(this).find('.rockfm-input15-switch').bootstrapSwitchZgpb('state');
                                 if(uifm_fld_value){
                                    uifm_fld_price = $(this).find('.rockfm-input15-switch').attr('data-uifm-inp-price')||0;
                                 }else{
                                     uifm_fld_price =0;
                                 }
                                /*summ price*/
                                    price_sum += parseFloat(uifm_fld_price);
                                    /*summ inside field*/
                                    tmp_uifm_fld_price+=parseFloat(uifm_fld_price);
                                 /*fill summary list*/
                                    if(parseFloat(uifm_fld_price)>0){
                                        tmp_uifm_summ_list_inner+=' <span class="uiform-sbox-summ-fld-price">'+uifm_price_symbol+zgfm_front_cost.format_money(obj_form,uifm_fld_price)+uifm_price_code+'</span>';
                                    }
                                    
                                    /*end fill summary list*/        
                            tmp_uifm_summ_list+= tmp_uifm_summ_list_inner;       
                           
                            tmp_uifm_summ_list+='</span>';
                            
                            
                             if(show_all_rows || (tmp_uifm_summ_row_count<uifm_summ_row_total)){
                                if(uifm_fld_value){
                                   uifm_summ_list+=tmp_uifm_summ_list; 
                               } 
                            }
                            
                            /*update row counter*/
                            if(tmp_uifm_summ_row_count<uifm_summ_row_total){
                                tmp_uifm_summ_row_count++;
                            }
                            
                            /*update preview price*/
                            $(this).find('.rockfm-inp15-opt-price-lbl').show();
                            $(this).find('.rockfm-inp15-opt-price-lbl .uiform-stickybox-inp-price').html(zgfm_front_cost.format_money(obj_form,tmp_uifm_fld_price));
                        break;
                     case 41:
                        /*dyn checkbox*/
                        if($(this).find('input[type=checkbox]:checked').length){
                             
                            
                            tmp_uifm_summ_list='';
                            /*fill summary list*/
                            if($(this).find('.rockfm-label').length && String(zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))).replace(/ /g,'').length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))+': </span>';    
                             } else if(String($(this).find('.rockfm-fld-data-field_name').html()).length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+$(this).find('.rockfm-fld-data-field_name').html()+': </span>';    
                            }
                            /*end fill summary list*/
                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-row">';
                            tmp_uifm_summ_list+='<ul>';
                                tmp_uifm_summ_list_inner=''
                                $(this).find('input[type=checkbox]:checked').each(function () {
                                    
                                    uifm_fld_price = $(this).closest('.uifm-dcheckbox-item').uiformDCheckbox('get_totalCost');
                                    /*summ price*/
                                    price_sum += parseFloat(uifm_fld_price);
                                    /*fill summary list*/
                                    tmp_uifm_summ_list_inner+='<li>'+$(this).closest('.uifm-dcheckbox-item').uiformDCheckbox('get_labelOpt');
                                    if(parseFloat(uifm_fld_price)>0){
                                        tmp_uifm_summ_list_inner+=' : '+uifm_price_symbol+zgfm_front_cost.format_money(obj_form,uifm_fld_price)+' '+uifm_price_code;
                                    }
                                    tmp_uifm_summ_list_inner+='</li>';
                                    /*end fill summary list*/
                                    });
                            tmp_uifm_summ_list+= tmp_uifm_summ_list_inner;       
                            tmp_uifm_summ_list+='</ul>';
                            tmp_uifm_summ_list+='</span>';
                            
                             if(show_all_rows || (tmp_uifm_summ_row_count<uifm_summ_row_total)){
                                uifm_summ_list+=tmp_uifm_summ_list;
                            }
                            
                            /*update row counter*/
                            if(tmp_uifm_summ_row_count<uifm_summ_row_total){
                                tmp_uifm_summ_row_count++;
                            }
                        }
                        break;
                     case 42:
                        /*dyn radiobtn*/
                        if($(this).find('input[type=checkbox]:checked').length){
                            tmp_uifm_summ_list='';
                            /*fill summary list*/
                            if($(this).find('.rockfm-label').length && String(zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))).replace(/ /g,'').length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+zgfm_front_cost.costest_removetags($(this).find('.rockfm-label'))+': </span>';    
                             } else if(String($(this).find('.rockfm-fld-data-field_name').html()).length>0){
                                tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-title">'+$(this).find('.rockfm-fld-data-field_name').html()+': </span>';    
                            }
                            /*end fill summary list*/
                            tmp_uifm_summ_list+='<span class="uiform-sbox-summ-fld-row">';
                            tmp_uifm_summ_list+='<ul>';
                                tmp_uifm_summ_list_inner=''
                                $(this).find('input[type=checkbox]:checked').each(function () {
                                    
                                    uifm_fld_price = $(this).closest('.uifm-dradiobtn-item').uiformDCheckbox('get_totalCost');
                                    /*summ price*/
                                    price_sum += parseFloat(uifm_fld_price);
                                    /*fill summary list*/
                                    tmp_uifm_summ_list_inner+='<li>'+$(this).closest('.uifm-dradiobtn-item').uiformDCheckbox('get_labelOpt');
                                    if(parseFloat(uifm_fld_price)>0){
                                        tmp_uifm_summ_list_inner+=' : '+uifm_price_symbol+zgfm_front_cost.format_money(obj_form,uifm_fld_price)+' '+uifm_price_code;
                                    }
                                    tmp_uifm_summ_list_inner+='</li>';
                                    /*end fill summary list*/
                                    });
                            tmp_uifm_summ_list+= tmp_uifm_summ_list_inner;       
                            tmp_uifm_summ_list+='</ul>';
                            tmp_uifm_summ_list+='</span>';
                            
                             if(show_all_rows || (tmp_uifm_summ_row_count<uifm_summ_row_total)){
                                uifm_summ_list+=tmp_uifm_summ_list;
                            }
                            
                            /*update row counter*/
                            if(tmp_uifm_summ_row_count<uifm_summ_row_total){
                                tmp_uifm_summ_row_count++;
                            }
                        }
                        break;   
                }
            });
         
           var returnVars = [uifm_summ_list,
                             price_sum,
                             tmp_uifm_summ_row_count,
                             uifm_summ_row_total
                            ];
           return returnVars;
          
      };       
      
   
   
};
window.zgfm_front_cost = zgfm_front_cost = $.zgfm_front_cost = new zgfm_front_cost();


})($uifm,window);
} 