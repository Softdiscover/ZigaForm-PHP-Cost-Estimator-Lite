if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_front_calc = zgfm_front_calc || null;
if(!$uifm.isFunction(zgfm_front_calc)){
(function($, window) {
 "use strict";  
    
var zgfm_front_calc = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {
 
        
    };
   
   this.calc_field_get = function (form_id,field_id,action,option) {
          //define form obj
          rocketfm.setInnerVariable('cur_form_id',form_id);
          rocketfm.setInnerVariable('cur_form_obj',$('#rockfm_form_'+form_id));
           
          //get type
          var tmp_f_obj=$('#rockfm_'+field_id);
          var tmp_f_type=tmp_f_obj.attr('data-typefield');
          var result;
          
          
          //check if field is visible
          if(tmp_f_obj.hasClass('rockfm-conditional-hidden')){
              return 0;
          }
          
          switch(parseInt(tmp_f_type)){
              case 6:
                case 7:
                case 28:
                case 29:
                case 30:
                /*textbox*/
                    switch(String(action)){
                        case 'value':
                            
                            result=tmp_f_obj.find('.rockfm-txtbox-inp-val').val()||'';
                             
                             
                            break;
                    }
                       break;
              case 8:
                  //Radio button
              case 9:
                  //checkbox
              case 10:
                  //select
              case 11:
                  //multi select
                  
                  var tmp_theme_type;
                   //actions
                    switch(String(action)){
                        case 'value':
                            
                            switch(parseInt(tmp_f_type)){
                                    case 10:
                                        //select
                                    case 11:
                                        //multi select
                                        tmp_f_obj.find('select option:selected').each(function () {
                                             result = $(this).attr('data-uifm-inp-val')||'';
                                         });
                                       
                                        break;
                                    case 8:
                                        //radio
                                       tmp_f_obj.find('input[type=radio]:checked').each(function () {
                                                        result = $(this).attr('data-uifm-inp-val')||'';
                                                    });
                                        break;
                                    case 9:
                                        //checkbox
                                        tmp_f_obj.find('input[type=checkbox]:checked').each(function () {
                                            result = $(this).attr('data-uifm-inp-val')||'';
                                        });
                                        
                                        break; 
                                }
                             
                            break;
                        case 'optprice':
                            
                            var tmp_field_inp;
                            
                            switch(parseInt(tmp_f_type)){
                                    case 10:
                                        //select
                                    case 11:
                                        //multi select
                                         
                                          tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                            
                                            switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                     tmp_field_inp = tmp_f_obj.find('.rockfm-input2-sel-styl1');
                                                     result=tmp_field_inp.find('select [data-opt-index="'+option+'"]').attr('data-uifm-inp-price');
                                                    break;
                                                default:
                                                     result=tmp_f_obj.find('.uifm-input2-opt-main [data-opt-index="'+option+'"]').attr('data-uifm-inp-price');
                                                    break;
                                            }
                                            
                                        break;
                                    case 8:
                                        //radio
                                    case 9:
                                        //checkbox
                                        result=tmp_f_obj.find('.rockfm-input2-wrap [data-opt-index="'+option+'"]').find('input').attr('data-uifm-inp-price');
                                        break;
                                }
                            
                            result=parseFloat(result);
                            break;
                        case 'price':
                             tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                          
                            var uifm_fld_price=0;
                            var price_sum=0;
                            switch(parseInt(tmp_f_type)){
                                     case 8:
                                        //radio
                                           tmp_f_obj.find('input[type=radio]:checked').each(function () {
                                                            uifm_fld_price = $(this).attr('data-uifm-inp-price')||0;
                                                            price_sum += parseFloat(uifm_fld_price);
                                                        });
                                        break;
                                    case 9:
                                        //checkbox
                                        tmp_f_obj.find('input[type=checkbox]:checked').each(function () {
                                            uifm_fld_price = $(this).attr('data-uifm-inp-price')||0;
                                            price_sum += parseFloat(uifm_fld_price);
                                        });
                                        
                                        break; 
                                
                                    case 10:
                                        //select
                                    case 11:
                                        //multi select
                                         tmp_f_obj.find('select option:selected').each(function () {
                                             uifm_fld_price = $(this).attr('data-uifm-inp-price')||0;
                                             
                                             price_sum +=parseFloat(uifm_fld_price);
                                         });
                                        break;
                                        
                            }
                            
                            
                            result=parseFloat(price_sum);
                            break;
                            
                        case 'optIsChecked':
                             tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                          var tmp_ischecked = false;
                          
                                switch(parseInt(tmp_f_type)){
                                    case 10:
                                        //select
                                    case 11:
                                        //multi select
                                            tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                            
                                            switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                     tmp_field_inp = tmp_f_obj.find('.rockfm-input2-sel-styl1');
                                                     
                                                        tmp_field_inp.find('select [data-opt-index="'+option+'"]:selected').each(function () {
                                                        tmp_ischecked = true;
                                                    });
                                                   
                                                    break;
                                                default:
                                                     
                                                       tmp_f_obj.find('.rockfm-input2-wrap select [data-opt-index="'+option+'"]:selected').each(function () {
                                                        tmp_ischecked = true;
                                                    });
                                                     
                                                    break;
                                            }
                                        break;
                                    case 8:
                                        //radio
                                          tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                      switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                   tmp_f_obj.find('.rockfm-input-container [data-opt-index="'+option+'"]').find('.checked').each(function () {
                                                        tmp_ischecked = true;
                                                    });
                                                    break;
                                                default:
                                                    tmp_f_obj.find('.rockfm-input-container [data-opt-index="'+option+'"]').find('input[type=radio]:checked').each(function () {
                                                        tmp_ischecked = true;
                                                    });
                                                    break;
                                            }
                                        break;
                                    case 9:
                                        //checkbox
                                      tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                      switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                   tmp_f_obj.find('.rockfm-input-container [data-opt-index="'+option+'"]').find('.checked').each(function () {
                                                        tmp_ischecked = true; 
                                                    });
                                                    break;
                                                default:
                                                    tmp_f_obj.find('.rockfm-input-container [data-opt-index="'+option+'"]').find('input[type=checkbox]:checked').each(function () {
                                                        tmp_ischecked = true;
                                                    });
                                                    break;
                                            }
                                      
                                        break;    
                                }

                                result = tmp_ischecked;
                          
                            break;
                        case 'optIsUnchecked':
                             tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                          
                          var tmp_ischecked = false;
                          
                                switch(parseInt(tmp_f_type)){
                                    case 10:
                                        //select
                                    case 11:
                                        //multi select
                                         tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                            
                                            switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                     tmp_field_inp = tmp_f_obj.find('.rockfm-input2-sel-styl1');
                                                     
                                                        tmp_field_inp.find('select [data-opt-index="'+option+'"]:selected').each(function () {
                                                        tmp_ischecked = true;
                                                    });
                                                   
                                                    break;
                                                default:
                                                     
                                                       tmp_f_obj.find('.rockfm-input2-wrap select [data-opt-index="'+option+'"]:selected').each(function () {
                                                        tmp_ischecked = true;
                                                    });
                                                     
                                                    break;
                                            }
                                            
                                        break;
                                    case 8:
                                        //radio
                                          tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                      switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                   tmp_f_obj.find('.rockfm-input-container [data-opt-index="'+option+'"]').find('.checked').each(function () {
                                                        tmp_ischecked = true;
                                                    });
                                                    break;
                                                default:
                                                    tmp_f_obj.find('.rockfm-input-container [data-opt-index="'+option+'"]').find('input[type=radio]:checked').each(function () {
                                                        tmp_ischecked = true;
                                                    });
                                                    break;
                                            }
                                        break;
                                    case 9:
                                        //checkbox
                                      tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                      switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                   tmp_f_obj.find('.rockfm-input-container [data-opt-index="'+option+'"]').find('.checked').each(function () {
                                                        tmp_ischecked = true; 
                                                    });
                                                    break;
                                                default:
                                                    tmp_f_obj.find('.rockfm-input-container [data-opt-index="'+option+'"]').find('input[type=checkbox]:checked').each(function () {
                                                        tmp_ischecked = true;
                                                    });
                                                    break;
                                            }
                                      
                                        break;    
                                }
                                
                                 if(tmp_ischecked){
                                   result=false;
                                }else{
                                   result=true; 
                                }
                            break;    
                        case 'isChecked':
                            tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                          
                          var tmp_ischecked = false;
                          
                                switch(parseInt(tmp_f_type)){
                                    case 10:
                                        //select
                                    case 11:
                                        //multi select
                                        tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                      switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                   
                                                default:
                                                     tmp_f_obj.find('.rockfm-input2-wrap option:checked').each(function () {
                                                        
                                                            tmp_ischecked = true;
                                                        });
                                                    break;
                                            }
                                        break;
                                    case 8:
                                        //radio
                                          tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                            switch(parseInt(tmp_theme_type)){
                                                      case 1:
                                                             var tempvar=tmp_f_obj.find('.rockfm-inp2-rdo');
                                                             var searchInput = tempvar.map(function(index){
                                                                               if($(this).parent().hasClass('checked')){

                                                                                      return index;
                                                                                  }else{
                                                                                      return null;
                                                                                  }
                                                                  }).toArray();
                                                                
                                                              if(searchInput.length){
                                                                  tmp_ischecked = true;
                                                              }
                                                             
                                                          break;
                                                      default:
                                                           tmp_f_obj.find('.rockfm-inp2-rdo:checked').each(function () {
                                                                  tmp_ischecked = true;
                                                              });
                                                          break;
                                                  }
                                        break;
                                    case 9:
                                        //checkbox
                                      tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                      switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                    var tempvar=tmp_f_obj.find('.rockfm-inp2-chk');
                                                             var searchInput = tempvar.map(function(index){
                                                                               if($(this).parent().hasClass('checked')){

                                                                                      return index;
                                                                                  }else{
                                                                                      return null;
                                                                                  }
                                                                  }).toArray();
                                                                  
                                                              if(searchInput.length){
                                                                  tmp_ischecked = true;
                                                              }
                                                    break;
                                                default:
                                                     tmp_f_obj.find('.rockfm-inp2-chk:checked').each(function () {
                                                            tmp_ischecked = true;
                                                        });
                                                    break;
                                            }
                                      
                                      
                                        break;    
                                }

                                result = tmp_ischecked;
                            
                        
                            break;
                        case 'isUnchecked':
                                tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                          
                          var tmp_ischecked = false;
                          
                                switch(parseInt(tmp_f_type)){
                                    case 10:
                                        //select
                                    case 11:
                                        //multi select
                                      
                                        break;
                                    case 8:
                                        //radio
                                          tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                            switch(parseInt(tmp_theme_type)){
                                                      case 1:
                                                             var tempvar=tmp_f_obj.find('.rockfm-inp2-rdo');
                                                             var searchInput = tempvar.map(function(index){
                                                                               if($(this).parent().hasClass('checked')){

                                                                                      return index;
                                                                                  }else{
                                                                                      return null;
                                                                                  }
                                                                  }).toArray();
                                                                
                                                              if(searchInput.length){
                                                                  tmp_ischecked = true;
                                                              }
                                                             
                                                          break;
                                                      default:
                                                           tmp_f_obj.find('.rockfm-inp2-rdo:checked').each(function () {
                                                                  tmp_ischecked = true;
                                                              });
                                                          break;
                                                  }
                                        break;
                                    case 9:
                                        //checkbox
                                      tmp_theme_type = tmp_f_obj.find('.rockfm-input2-wrap').attr('data-theme-type');
                                      switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                    var tempvar=tmp_f_obj.find('.rockfm-inp2-chk');
                                                             var searchInput = tempvar.map(function(index){
                                                                               if($(this).parent().hasClass('checked')){

                                                                                      return index;
                                                                                  }else{
                                                                                      return null;
                                                                                  }
                                                                  }).toArray();
                                                                  
                                                              if(searchInput.length){
                                                                  tmp_ischecked = true;
                                                              }
                                                    break;
                                                default:
                                                     tmp_f_obj.find('.rockfm-inp2-chk:checked').each(function () {
                                                            tmp_ischecked = true;
                                                        });
                                                    break;
                                            }
                                      
                                      
                                        break;    
                                }
                                   
                                if(tmp_ischecked){
                                   result=false;
                                }else{
                                   result=true; 
                                }
                            break;
                    }
                  break;
              case 41:
                  //dyn checkbox
              case 42:
                  //dyn radio button 
                  
                    //actions
                    switch(String(action)){
                        case 'optprice':
                            result=tmp_f_obj.find('.rockfm-input17-wrap [data-inp17-opt-index="'+option+'"]').attr('data-opt-price');
                            result=parseFloat(result);
                            break;
                        case 'price':
                            var uifm_fld_price=0;
                            var price_sum=0;
                            tmp_f_obj.find('.rockfm-input-container input[type=checkbox]:checked').each(function () {
                                
                                    switch(parseInt(tmp_f_type)){
                                        case 41:
                                            //dyn checkbox
                                            uifm_fld_price = $(this).closest('.uifm-dcheckbox-item').uiformDCheckbox('get_totalCost');
                                            break;
                                        case 42:
                                            //dyn radio button 
                                            uifm_fld_price = $(this).closest('.uifm-dradiobtn-item').uiformDCheckbox('get_totalCost');
                                            break;
                                    }
                                     
                                    /*summ price*/
                                    price_sum += parseFloat(uifm_fld_price);
                                    });
                            result=parseFloat(price_sum);
                            break;
                        case 'optIsChecked':
                            var tmp_ischecked = false;
                                tmp_f_obj.find('.rockfm-input-container [data-inp17-opt-index="'+option+'"]').find('input[type=checkbox]:checked').each(function () {
                                    tmp_ischecked = true;
                                });
                        
                                result = tmp_ischecked;
                                
                            break;
                        case 'optIsUnchecked':
                            var tmp_ischecked = false;
                                tmp_f_obj.find('.rockfm-input-container [data-inp17-opt-index="'+option+'"]').find('input[type=checkbox]:checked').each(function () {
                                    tmp_ischecked = true;
                                    });
                                
                                 if(tmp_ischecked){
                                   result=false;
                                }else{
                                   result=true; 
                                }
                            break;    
                        case 'isChecked':
                            var tmp_ischecked = false;
                                tmp_f_obj.find('.rockfm-input-container input[type=checkbox]:checked').each(function () {
                                    tmp_ischecked = true;
                                    });
                                result = tmp_ischecked;
                            break;
                        case 'isUnchecked':
                            var tmp_ischecked = false;
                                tmp_f_obj.find('.rockfm-input-container input[type=checkbox]:checked').each(function () {
                                    tmp_ischecked = true;
                                    });
                                    
                                if(tmp_ischecked){
                                   result=false;
                                }else{
                                   result=true; 
                                }
                            break;
                    }
                    
                  
                  break;
              case 16:
                  //slider
                   //actions
                    switch(String(action)){
                        case 'value':
                            result=tmp_f_obj.find('.rockfm-input4-slider').bootstrapSlider('getValue')||0;
                            result=parseFloat(result);
                            
                            break;
                        case 'price':
                            var tmp_price=tmp_f_obj.find('.rockfm-input4-slider').attr('data-uifm-inp-price')||0;
                            var tmp_value = tmp_f_obj.find('.rockfm-input4-slider').bootstrapSlider('getValue');
                            result = parseFloat(tmp_value)*parseFloat(tmp_price);
                            result=parseFloat(result);
                            
                            break;
                    }
                  break;
              case 18:
                  //spinner
                  
                    //actions
                    switch(String(action)){
                        case 'value':
                            result=tmp_f_obj.find('.rockfm-input4-spinner').val()||0;
                            result=parseFloat(result);
                            
                            break;
                        case 'price':
                            var tmp_price=tmp_f_obj.find('.rockfm-input4-spinner').attr('data-uifm-inp-price')||0;
                            var tmp_value = tmp_f_obj.find('.rockfm-input4-spinner').val();
                            result = parseFloat(tmp_value)*parseFloat(tmp_price);
                            result=parseFloat(result);
                            
                            break;
                    }
                  
                  break;
              case 24:
              /*date*/
                    //actions
                    switch(String(action)){
                        case 'value':                            
                            try {
                                var result_tmp=tmp_f_obj.find('.rockfm-input7-datepic').data('DateTimePicker').date().toDate();
                                  result = (result_tmp.getMonth()+1)+"/"+result_tmp.getDate()+"/"+result_tmp.getFullYear();
                              }
                            catch(err) {
                                result = '';
                            }
                            break;
                    }
                  break;
          
              case 26: 
                  /*date and time*/
                    //actions
                    switch(String(action)){
                        case 'value':
                            try {
                                var result_tmp=tmp_f_obj.find('.rockfm-input7-datetimepic').data('DateTimePicker').date().toDate();
                                result =  (result_tmp.getMonth()+1)+"/"+result_tmp.getDate()+"/"+result_tmp.getFullYear() + " " +
                                result_tmp.getHours() + ":" + result_tmp.getMinutes() + ":"+result_tmp.getSeconds();
                              }
                            catch(err) {
                                result = '';
                            }
 
                            break;
                    }
                  
                  break;    
              case 40:
                  //switch
                   //actions
                    switch(String(action)){
                        case 'value':
                            if(tmp_f_obj.find('.rockfm-input15-switch').bootstrapSwitchZgpb('state')){
                                result = 1;
                            }else{
                                result = 0;
                            }
                            result=parseFloat(result);
                            
                            break;
                        case 'price':
                            var tmp_price;
                            if(tmp_f_obj.find('.rockfm-input15-switch').bootstrapSwitchZgpb('state')){
                                result =tmp_f_obj.find('.rockfm-input15-switch').attr('data-uifm-inp-price')||0;
                            }else{
                                result = 0;
                            }
                            result=parseFloat(result);
                            
                            break;
                    }
                  break;
              default:
                  result='';
          }
        
          return result;    
      };
      
      this.costest_calc_math_process = function (obj_form) {
         
          //verify and make math calc
          let tmp_mathcalc_enable=obj_form.find('._rockfm_form_calc_math_enable').val();
          if(parseInt(tmp_mathcalc_enable)===1){
             let  tmp_var_0;
              tmp_var_0 = zgfm_front_calc.costest_calc_getTotal(obj_form);
             
              rocketfm.setInnerVariable('calc_cur_total',tmp_var_0);
          }
           
          //output results
          zgfm_front_calc.costest_calc_output(obj_form);
      };
      
      this.costest_calc_getTotal = function (obj_form) {
         
           var tmp_form_id=obj_form.find('._rockfm_form_id').val();
           
           //get number variables
          
           var tmp_vars_str =_zgfm_front_vars.form[tmp_form_id]['calc']['vars_str'];
          /*tmp_vars_total = parseInt(tmp_vars_total);
           if(tmp_vars_total>0){
               tmp_vars_total = tmp_vars_total-1;
           }*/
           
           var tmp_total_cost = 0;
           var function_name;
           var tmp_var_val;
           
           var tmp_vars_arr=tmp_vars_str.split(",");
           
           //for debug
           /*if(parseInt(rockfm_vars._uifmvar['is_dev'])===1){
                   console.log('-------- Calc variables ------------');
               }*/
           
           for (var i in tmp_vars_arr ) {
               function_name = "zgfm_"+String(tmp_form_id)+"_calculation_cont"+tmp_vars_arr[i];
               
                function_name = window[function_name];
               
               tmp_var_val = function_name(); 
               
               /*if(parseInt(rockfm_vars._uifmvar['is_dev'])===1){
                   console.log('variable '+tmp_vars_arr[i]+' : '+tmp_var_val);
               }*/
               
              if(String(tmp_vars_arr[i])==="0"){
                 tmp_total_cost = tmp_var_val;
                 //delete this after two months dec 2 1018
                 //tmp_total_cost = zgfm_front_cost.format_money(obj_form,tmp_total_cost);
                 
              }
               
              //update on variable forms
              obj_form.find('.zgfm-f-calc-var'+tmp_vars_arr[i]+'-lbl').html(zgfm_front_cost.format_money(obj_form,tmp_var_val));
              //delete this after two months dec 2 1018
              //obj_form.find('._zgfm_avars_calc_'+tmp_vars_arr[i]).val(zgfm_front_cost.format_money(obj_form,tmp_var_val));
              obj_form.find('._zgfm_avars_calc_'+tmp_vars_arr[i]).val(tmp_var_val);
           }
           
           //for debug
           /*if(parseInt(rockfm_vars._uifmvar['is_dev'])===1){
                   console.log('------------------------');
               }*/
            return tmp_total_cost;
               
      };
      
      this.costest_calc_output = function (obj_form) {
          
          var tmp_total = rocketfm.getInnerVariable('calc_cur_total');
          
          //check tax
          if(parseInt(obj_form.attr('data-zgfm-price-tax-st'))===1 && obj_form.find('.uiform-stickybox-tax').length){
              
              obj_form.find('.uiform-stickybox-subtotal').html(zgfm_front_cost.format_money(obj_form,tmp_total));
              var tmp_tax=parseFloat(obj_form.attr('data-zgfm-price-tax-val'));
              var tmp_tax_val=(tmp_tax/100)*parseFloat(tmp_total);
              //showing tax
              obj_form.find('.uiform-stickybox-tax').html(zgfm_front_cost.format_money(obj_form,tmp_tax_val));
              //total on sticky box
              obj_form.find('.uiform-stickybox-total').html(zgfm_front_cost.format_money(obj_form,tmp_tax_val+tmp_total));
              
          }else{
              //total on sticky box
              obj_form.find('.uiform-stickybox-total').html(zgfm_front_cost.format_money(obj_form,tmp_total));
          } 
      };
   
   
};
window.zgfm_front_calc = zgfm_front_calc = $.zgfm_front_calc = new zgfm_front_calc();


})($uifm,window);
} 