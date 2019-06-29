if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_calc = zgfm_back_calc || null;
if(!$uifm.isFunction(zgfm_back_calc)){
(function($, window) {
 "use strict";  
    
var zgfm_back_calc = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {
        
    };
    
    /*
     * update order according to list on view
     * @returns {undefined}
     */
    this.mathCalc_updateCalcOrder = function() {
        var tmp_calc_arr= rocketform.getUiData2('calculation','variables');
        var tmp_ul=$('#zgfm-tab-calc-list-mathvars li');
        
        var tmp_id,tmp_order,tmp_key;
        
        
        
        //update on main array
        $.each(tmp_ul, function(index, value) {
            tmp_id=$(this).find('a').data('zgfm-id');
            
            //update on html
            $(this).find('a').attr('data-zgfm-order',index);
            //get date of var calc
            tmp_key = zgfm_back_calc.search_varId(tmp_calc_arr,tmp_id);
            if(String(tmp_key)!=''){
                rocketform.setUiData4('calculation','variables',tmp_key['key'],'order',index);
            }
            
        });
    };
    
    /*
     * search data math variable by id
     * @returns {undefined}
     */
    this.search_varId = function(obj, search) {
         var returnKey ='';
         var newobj= {};
        $.each(obj, function(key, info) {
          //  console.log(info.id+' - '+search);
            if (String(info.id) === String(search)) {
                newobj['key']=key;
                newobj['data']=info;
               returnKey = newobj;
               return false; 
            };   
        });

        return returnKey; 
    };
    
    /*
     * generate order of variables of math variables, at backend
     * @returns {undefined}
     */
    this.mathCalc_SortOrder = function() {
       try {
      this.mathCalc_updateCalcOrder(); 
      
      var tmp_calc_arr_len = rocketform.getUiData2('calculation','variables');
      //var len = $.map(tmp_calc_arr_len, function(n, i) { return i; }).length;
 
       //object to array
      var array = $.map(tmp_calc_arr_len, function(value, index) {
            return [value];
        });

      // sort this list by points, if points is equal, sort by name.
        var ranking = zgfm_helper.arr.multisort(array, ['order'], ['ASC']);
  
       //conver array to object 
        var result= this.Calcvars_ArrayToObject(ranking);
       //len = $.map(result, function(n, i) { return i; }).length;
        //store to main array
        rocketform.setUiData2('calculation','variables',{});
        rocketform.setUiData2('calculation','variables',result);
        
                }
        catch(error) {
          console.error(error);
          // expected output: ReferenceError: nonExistentFunction is not defined
          // Note - error messages will vary depending on browser
        }

    };
    
    /*
     * convert to array to object
     * @returns {undefined}
     */
    this.Calcvars_ArrayToObject = function(arr){
        var obj = {};
        for (var i = 0;i < arr.length;i++){
            if(!isNaN(arr[i]['order'])){
                obj[arr[i]['order']] = arr[i];
            }
            
        }
        return obj;
    };
    
    this.saveform_processVariables = function() {
           let calc_st=($('#uifm_frm_calc_enable').bootstrapSwitchZgpb('state'))?1:0;
      rocketform.setUiData2('calculation','enable_st',calc_st);
      var tmp_calc_arr_len = rocketform.getUiData2('calculation','variables');
      
     
      /*get total variables*/
    //  tmp_calc_arr_len = parseInt(zgfm_back_helper.length_obj(tmp_calc_arr_len));
      
     /* if(tmp_calc_arr_len>0){
          tmp_calc_arr_len=tmp_calc_arr_len-1;
      }
      */
       var tmp_vars_arr=[];
      var tmp_calc_tab_content;
       for (let index in tmp_calc_arr_len) {
           
           //store index
           tmp_vars_arr.unshift(tmp_calc_arr_len[index]['id']);
          
           
            let tmp_content_val;
            let tmp_txt_value;
            
             tmp_calc_tab_content = $('#zgfm-menu-calc-tab-'+tmp_calc_arr_len[index]['id']);
             
            //store tab title 
                      //save to main array
                      let tmp_tabt_val = tmp_calc_tab_content.find('.uifm_frm_calc_tabtitle').val()||'';
             
                    rocketform.setUiData4('calculation','variables',index,'tab_title',tmp_tabt_val); 
            
            
           if($('#uifm_frm_calc_content'+tmp_calc_arr_len[index]['id']).length){
               
              
               tmp_txt_value=  $('#uifm_frm_calc_content'+tmp_calc_arr_len[index]['id']).data('CodeMirrorInstance').getValue();
            
               tmp_content_val=encodeURIComponent(tmp_txt_value);
               
                let tmp_hash= rocketform.getUiData4('calculation','variables',index,'hash');
                let tmp_new_hash = CryptoJS.MD5(JSON.stringify(tmp_content_val));
               
                if((String(tmp_hash)!=String(tmp_new_hash))){

                    rocketform.setUiData4('calculation','variables',index,'hash',String(tmp_new_hash));
                     
                     //frontend
                     rocketform.setInnerVariable('calculation_cont_front',tmp_txt_value);

                     //generate fields
                     zgfm_back_calc.calculation_genFields(tmp_calc_arr_len[index]['id'],index);
                     
                     //store content front
                     let tmp_content_front = rocketform.getInnerVariable('calculation_cont_front');
                     rocketform.setUiData4('calculation','variables',index,'content_front',encodeURIComponent(tmp_content_front));
                }
                 
           }else{
               tmp_content_val='';
               rocketform.setUiData4('calculation','variables',index,'hash','');
               rocketform.setUiData4('calculation','variables',index,'content_front','');
           }
            
           rocketform.setUiData4('calculation','variables',index,'content',tmp_content_val);
           
           //update vars in string
           rocketform.setUiData2('calculation','vars_str',tmp_vars_arr.join(","));
           
            
           
            
        }
    }
    
    this.preview_genTabContent = function() {
         var tmp_variable = rocketform.getUiData2('calculation','variables');
                        var tmp_tab_cont;
                        
                        //check if array has zero
                        if(parseInt(tmp_variable.length)===0){
                            rocketform.setUiData2('calculation','variables',{
                                0:{
                                    "hash": "",
                                    "tab_title":'Main',
                                    "id":"0",
                                    "is_main":'1',
                                    "order":'0',
                                    "content": "",
                                    "content_front": "",
                                    "fields": []
                                }
                            });
                            
                            tmp_variable = rocketform.getUiData2('calculation','variables');
                        }
                        
                        //clean html
                        
                        $('#zgfm-tab-calc-sourcecode-wrapper').find('.sfdc-tab-content').html('');
                        $('#zgfm-tab-calc-sourcecode-wrapper').find('.tabs-left').html('');
                        
                        
                        $.each(tmp_variable, function(index, value2) {
                                     tmp_tab_cont=$('#zgfm-tab-calc-sourcecode-wrapper');
                                     
                                     if(tmp_tab_cont.find('a[data-zgfm-id='+value2['id']+']').length){
                                             
                                         }else{
                                             //create divs
                                            zgfm_back_calc.calc_addNew_onlyPreview(value2['id'],value2['order']);
                                         
                                         }
                                  
                                         //update title
                                         tmp_tab_cont.find('a[data-zgfm-id='+value2['id']+']').html(value2['tab_title']);
                                         tmp_tab_cont.find('.sfdc-tab-content div[id=zgfm-menu-calc-tab-'+value2['id']+']').find('.uifm_frm_calc_tabtitle').val(value2['tab_title']);
                                  
                                     if( $('#uifm_frm_calc_content'+value2['id']).length ){
                                          zgfm_back_calc.calc_variables_activate(value2['content'],value2['id']);
                                      } 
                                    
                              });
            
       //refresh sortable 
       zgfm_back_calc.calc_tab_refreshSortable();
       
       //refresh order of math variables
       zgfm_back_calc.mathCalc_SortOrder();
       
    };
    
    /*
     * refresh sortable event
     **/
    this.calc_tab_refreshSortable = function() {
         $('#zgfm-tab-calc-list-mathvars').sortable({
            items: '.zgfm-tab-calc-mathvar-item',
            axis: 'y',
            start: function (event, ui) {
                    $(ui.item).data("startindex", ui.item.index());
                    
                },
            stop: function (event, ui)
            {        
                
                var startIndex = ui.item.data("startindex");
                if(parseInt(startIndex)===0){
                    $(this).sortable('cancel'); 
                }
                
                /*if ((startIndex < 1 && $(ui.item).prevAll('.zgfm-tab-calc-mathvar-item-main').length>0) 
                        || (startIndex > 0 && $(ui.item).nextAll('.zgfm-tab-calc-mathvar-item-main').length>0))
                {$(this).sortable('cancel'); }*/
                
                 if ((startIndex > 0 && $(ui.item).nextAll('.zgfm-tab-calc-mathvar-item-main').length>0))
                    {$(this).sortable('cancel'); }
                
                
                //refresh order of math variables
                zgfm_back_calc.mathCalc_SortOrder();
                 
                 
                 //load calc variables
                    zgfm_back_calc.calc_refreshvars_init();
                    zgfm_back_calc.calc_refreshvars_init2(); 
            }

        });
    };
    
    this.calc_tab_changeTitle = function(el) {
       let index= $('#zgfm-tab-calc-sourcecode-wrapper').find('.sfdc-active a').attr('data-zgfm-id');
       
      /* if(String(index)==="0"){
           return;
       }*/
        var tmp_val= $(el).val();
       
        //refresh on backend
        $('#zgfm-tab-calc-sourcecode-wrapper .sfdc-active a[data-zgfm-id='+index+']').html(tmp_val);
        
        //update main core
        rocketform.setUiData4('calculation','variables',index,'tab_title',tmp_val);
        
    };
    
    this.calc_delete_tab= function() {
       let index= $('#zgfm-tab-calc-sourcecode-wrapper').find('.sfdc-active a').attr('data-zgfm-id');
       if(String(index)==="0"){
           return;
       }
       //delete in main array
      
       rocketform.delUiData3('calculation','variables',String(index));
       
       var tmp_arr = rocketform.getUiData2('calculation','variables');
       
                                                var tmp_len = tmp_arr.length, tmp_i;
                                                for(tmp_i = 0; tmp_i < tmp_len; tmp_i++ )
                                                        tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
                                                if($.isArray(tmp_arr)){
                                                    tmp_arr.splice(0 ,tmp_len);
                                                    rocketform.setUiData2('calculation','variables',tmp_arr);
                                                     
                                                }
        //refresh on backend
        $('#zgfm-tab-calc-sourcecode-wrapper  a[data-zgfm-id='+index+']').parent().remove();
        $('#zgfm-menu-calc-tab-'+index).remove();
        /*calc variables*/    
        zgfm_back_calc.calc_table_refreshCodes();
        
    };
    
    this.calc_addNew_CalcVar = function() {
         
        var optindex;
        
        var lenArrs = $("#zgfm-tab-calc-sourcecode-wrapper").find('.sfdc-nav-tabs').find('li').length;
        
        var numorder;
        var is_main;
        if(parseInt(lenArrs)===0){
           optindex='0'; 
           is_main='1';
           numorder=1;
        }else{
           numorder=parseInt(lenArrs)+1; 
           optindex = zgfm_back_helper.generateUniqueID(5);
           is_main='0';
        }
        
        
        rocketform.addIndexUiData2('calculation','variables',parseInt(numorder));
         
      
        //save to main array
        rocketform.setUiData3('calculation','variables',parseInt(numorder),{
            "hash": "",
            "tab_title":'Optional Var '+numorder,
            "id":optindex,
            "is_main":is_main,
            "order":numorder,
            "content": "",
            "content_front": "",
            "fields": []
          }); 
          
         //generate preview
         zgfm_back_calc.calc_addNew_onlyPreview(optindex,numorder);
         
         
         //active code area
         zgfm_back_calc.calc_variables_activate('',optindex);
         
         /*calc variables*/    
         zgfm_back_calc.calc_table_refreshCodes();
         
         /*refresh optional variables*/
         zgfm_back_calc.calc_refreshvars_init2();
         
         //refresh sortable 
         zgfm_back_calc.calc_tab_refreshSortable();
     
    };
    
    this.calc_dev_cleanAll = function() {
        
       var tmp_calc = rocketform.getUiData2('calculation','variables'); 
      
      rocketform.setUiData2('calculation','variables',{});
      
        for (var key in tmp_calc) {
           
           rocketform.addIndexUiData2('calculation','variables',String(key));
           rocketform.setUiData3('calculation','variables',key,{hash:tmp_calc[key]['hash']||'',
                                                            "tab_title":tmp_calc[key]['tab_title'],
                                                            "id":String(key),
                                                            "order":tmp_calc[key]['order']||'',
                                                            "is_main":tmp_calc[key]['is_main']||'',
                                                            "content":tmp_calc[key]['content']||'',
                                                            "content_front":tmp_calc[key]['content_front']||'',
                                                            "fields":tmp_calc[key]['fields']||{}
                                                        });
            
        }                                         
      //generate preview
        this.preview_genTabContent();
    };
    
    
    this.calc_addNew_onlyPreview = function(optindex,numorder) {
        var tmp_tab = $('#zgfm-tab-calc-sourcecode-wrapper');
        var tmp_tab_title="Optional Var "+numorder;
        
        var tmp_li;
         var tmp_class;
        if(String(optindex)==='0'){
            tmp_class='zgfm-tab-calc-mathvar-item zgfm-tab-calc-mathvar-item-main';
        }else{
            tmp_class='zgfm-tab-calc-mathvar-item';
        }
        
        tmp_li='<li class="'+tmp_class+' sfdc-active"><a href="#zgfm-menu-calc-tab-'+optindex+'" data-zgfm-order="'+numorder+'"  data-zgfm-id="'+optindex+'" data-toggle="sfdc-tab">'+tmp_tab_title+'</a></li>';
         
         var tmp_content=$('#zgfm-tab-calc-tmpl-helper-1').find('> .sfdc-tab-pane').clone();
         tmp_content.attr('id','zgfm-menu-calc-tab-'+optindex);
         tmp_content.find('textarea.uifm_frm_calc_content').attr('name','uifm_frm_calc_content'+optindex);
         tmp_content.find('textarea.uifm_frm_calc_content').attr('id','uifm_frm_calc_content'+optindex);
         tmp_content.find('textarea.uifm_frm_calc_content').attr('data-num',optindex);
         tmp_content.find('input.uifm_frm_calc_tabtitle').val(tmp_tab_title);
         
         //update shortcod
         //tmp_content.find('.uifm_txtarea_var').html('[zgfm_fvar opt="calc" atr1="'+optindex+'"]');
         
         tmp_content.find('.uifm_frm_calc_showvars').attr('id','uifm_frm_calc_content'+optindex+'_showvars');
         tmp_tab.find('ul.tabs-left').find('li').removeClass('sfdc-active');
         tmp_tab.find('ul.tabs-left').append(tmp_li);
         tmp_tab.find('.sfdc-tab-content').find('.sfdc-tab-pane').removeClass('sfdc-active');
         tmp_tab.find('.sfdc-tab-content').append(tmp_content);
    }
    
    
    this.calc_refreshEvents = function() {
        $('.uiform-wrap #zgfm-tab-calc-sourcecode-wrapper .tabs-left').on('shown.bs.sfdc-tab', function (e) {
          var tmp_tab_obj = $(e.target).data('zgfm-id'); 
        
         var cminst = $('#uifm_frm_calc_content'+tmp_tab_obj).data('CodeMirrorInstance');  
            
           cminst.refresh();
          //refresh variables in combo
          //load calc variables
           zgfm_back_calc.calc_refreshvars_init();
           zgfm_back_calc.calc_refreshvars_init2();
           
           //show used variables
           zgfm_back_calc.calc_variables_showusedvars(tmp_tab_obj);
           
            
       });
    };
                                                                                                                                                                                    
    this.calc_refreshvars_init = function() {
                try{
                      var arr_types_allowed=[6,7,8,9,10,11,16,18,24,26,28,29,30,40,41,42];
                      var field=$('#uifm_frm_calc_cmbo_field_var');
                       var var_fields=rocketform.getUiData('steps_src');
                       
                       var string_res='';
                       string_res+='<option data-type="" value="">Choose a field</option>';
                      $.each(var_fields, function(index, value) {
                            $.each(value, function(index2, value2) {
                                 if( $.inArray(parseInt(value2.type),arr_types_allowed)>=0
                                        ){
                                        string_res+='<option data-uniqueid="'+value2.id+'" data-type="'+value2.type+'" value="'+value2.id+'">'+value2.field_name+'</option>';
                                    }
                            });
                        });
                       
                      field.children().remove();  
                      field.append(string_res);
                      field.chosen({width: "100%"});
                      field.trigger('chosen:updated');
                      //hide others
                      var tmp_boxs=['#uifm_frm_calc_cmbo_field_var2_wrapper',
                      '#uifm_frm_calc_cmbo_field_var3_wrapper',
                      '#uifm_frm_calc_cmbo_addvar'];
                       $.each(tmp_boxs, function(index, value) {
                            $(value).hide();
                       });
                      
                    }
                catch(err) {
                   
                } 
            }; 
    this.calc_refreshvars_init2 = function() {
                try{
                     var cur_order = $('#zgfm-tab-calc-sourcecode-wrapper').find('li.sfdc-active a').attr('data-zgfm-order')||0;
                     
                      var field=$('#uifm_frm_calc_cmbo_field_var4');
                       var var_fields=rocketform.getUiData2('calculation','variables');
                     
                       var string_res='';
                       string_res+='<option data-type="" value="">Choose a variable</option>';
                    
                     var tmp_title;
                    for( var i in var_fields ) {
                         tmp_title = var_fields[i].tab_title||'unknown var '+var_fields[i].order;      
                            if((parseInt(var_fields[i].order) > parseInt(cur_order)) ){
                                string_res+='<option value="'+var_fields[i].id+'"> '+tmp_title+'</option>';
                            }
                        }
                    
                      field.children().remove(); 
                     
                      field.append(string_res);
                      field.chosen({width: "100%"});
                      field.trigger('chosen:updated');
                      //hide others
                      
                       $.each('#uifm_frm_calc_cmbo_addvar4', function(index, value) {
                            $(value).hide();
                       });
                      
                    }
                catch(err) {
                   
                } 
            };         
    this.calc_variables_getaction = function() {
        
          var rtype = $('#uifm_frm_calc_cmbo_field_var option:selected').data('type');
          if(rtype){
              //get action
            $('#uifm_frm_calc_cmbo_field_var2_wrapper').show();
            var field=$('#uifm_frm_calc_cmbo_field_var2');
            field.children().remove(); 
            
            var string_res='';
            //fill options
            string_res+='<option value="">Select an option</option>';
            
            switch(parseInt(rtype)){
                 case 6:
                 case 7:
                 case 28:
                 case 29:
                 case 30:
                   //textbox
                   string_res+='<option value="value">'+zgfm_back_calc.calc_variables_getActName('value')+'</option>';
                   break;
                 case 8:
                 case 9:
                 case 10:
                 case 11:
                    //radiobutton
                    //checkbox
                    //select
                    //multiselect
                    string_res+='<option value="value">'+zgfm_back_calc.calc_variables_getActName('value')+'</option>';
                 case 41:
                 case 42:
                    //dyn checkbox
                    //dyn radiobutton
                    string_res+='<option value="price">'+zgfm_back_calc.calc_variables_getActName('price')+'</option>';
                    string_res+='<option value="isChecked">'+zgfm_back_calc.calc_variables_getActName('isChecked')+'</option>';
                    string_res+='<option value="isUnchecked">'+zgfm_back_calc.calc_variables_getActName('isUnchecked')+'</option>';
                    string_res+='<option value="optprice">'+zgfm_back_calc.calc_variables_getActName('optprice')+'</option>';
                    string_res+='<option value="optIsChecked">'+zgfm_back_calc.calc_variables_getActName('optIsChecked')+'</option>';
                    string_res+='<option value="optIsUnchecked">'+zgfm_back_calc.calc_variables_getActName('optIsUnchecked')+'</option>';
                    break;
                  
                 case 16:
                 case 18:
                 case 40:    
                    string_res+='<option value="value">'+zgfm_back_calc.calc_variables_getActName('value')+'</option>';
                    string_res+='<option value="price">'+zgfm_back_calc.calc_variables_getActName('price')+'</option>';
                  break;
                  
                 case 24:
                
                 case 26:    
                    string_res+='<option value="value">'+zgfm_back_calc.calc_variables_getActName('value')+'</option>';
                  break; 
                  
            }
            
             field.append(string_res);
             field.chosen({width: "100%"});
              
          }else{
              
               $('#uifm_frm_calc_cmbo_field_var2_wrapper').hide();
               
          }
          
         
          $('#uifm_frm_calc_cmbo_field_var2').val("").trigger('chosen:updated');
          
          //hide last boxes
          $('#uifm_frm_calc_cmbo_field_var3_wrapper').hide();
          $('#uifm_frm_calc_cmbo_addvar').hide();
          
    };
    this.calc_variables2_getshortcode = function() {
      var raction = $('#uifm_frm_calc_cmbo_field_var4 option:selected').val();
      var tmp_gen_code = "fldopt_"+raction;
      
      //show variable box
      $('#uifm_frm_calc_cmbo_addvar4').show();
                    
       //set variable
       $('#uifm_frm_calc_cmbo_addvar4').find('textarea').html(tmp_gen_code);  
        
    }; 
    this.calc_variables_getoption = function() {
        
          var raction = $('#uifm_frm_calc_cmbo_field_var2 option:selected').val();
          if(raction){
              
            var tmp_gen_code;
            var tmp_uniqueid;
              //place code
             tmp_uniqueid = $('#uifm_frm_calc_cmbo_field_var option:selected').data('uniqueid');
                    
            
              switch(String(raction)){
                case 'price':
                case 'isChecked':
                case 'isUnchecked':
                case 'isFilled':
                case 'value':
                case 'quantity':
                    
                    //show variable box
                    $('#uifm_frm_calc_cmbo_addvar').show();
                    $('#uifm_frm_calc_cmbo_field_var3_wrapper').hide();
                    
                   
                    tmp_gen_code = "fld_"+tmp_uniqueid+"_"+raction;
                    //set variable
                    $('#uifm_frm_calc_cmbo_addvar').find('textarea').html(tmp_gen_code);
                    
                    break;
                case 'optprice':
                case 'optIsChecked':
                case 'optIsUnchecked':
                    
                   //show box
                   $('#uifm_frm_calc_cmbo_field_var3_wrapper').show();
                   
                   var option=$('#uifm_frm_calc_cmbo_field_var3');
                    option.children().remove(); 
                   
                   var f_step=$('#'+tmp_uniqueid).closest('.uiform-step-pane').data('uifm-step');
                    
                   var rtype = $('#uifm_frm_calc_cmbo_field_var option:selected').data('type');
                   var tmp_opts;
                   switch(parseInt(rtype)){
                         case 8:
                         case 9:
                         case 10:
                         case 11:
                            //radiobutton
                            //checkbox
                            //select
                            //multiselect
                            
                            tmp_opts = rocketform.getUiData5('steps_src',f_step,tmp_uniqueid,'input2','options');
                            if(tmp_opts){
                                  var str_opts='';
                                   str_opts+='<option value=""> Select Option</option>';
                                  $.each(tmp_opts, function(index2, value2) {
                                        str_opts+='<option value="'+index2+'">'+value2.label+'</option>';
                                    });

                              }
                            
                            break;
                         case 41:
                         case 42:
                            //dyn checkbox
                            //dyn radiobutton
                           tmp_opts = rocketform.getUiData5('steps_src',f_step,tmp_uniqueid,'input17','options');
                           if(tmp_opts){
                                  var str_opts='';
                                   str_opts+='<option value=""> Select Option</option>';
                                  $.each(tmp_opts, function(index2, value2) {
                                        str_opts+='<option value="'+index2+'">'+value2.label+'</option>';
                                    });

                              } 

                          break;
                         case 16:
                         case 18:
                         case 40:    
                             
                          break;

                    }
                     
                    option.append(str_opts);
                    option.chosen({width: "100%"});  
                    option.val("").trigger('chosen:updated');
                   //hide
                   $('#uifm_frm_calc_cmbo_addvar').hide();
                   
                    break;
            }
          }else{
              $('#uifm_frm_calc_cmbo_field_var3_wrapper').hide();
              $('#uifm_frm_calc_cmbo_addvar').hide();
          }
    };
    
   this.calc_variables_chooseOption = function() {
       var rtype = $('#uifm_frm_calc_cmbo_field_var3 option:selected').val();
          if(rtype){
               var tmp_gen_code;
               var tmp_uniqueid;
               var rtype;
               var rindex;
               var tmp_action;
               var tmp_opt_index;
               
               
               $('#uifm_frm_calc_cmbo_addvar').show();
               
                  //place code
                 tmp_uniqueid = $('#uifm_frm_calc_cmbo_field_var option:selected').data('uniqueid');
                 rtype = $('#uifm_frm_calc_cmbo_field_var option:selected').data('type');
                 tmp_action = $('#uifm_frm_calc_cmbo_field_var2 option:selected').val();
                 tmp_opt_index = $('#uifm_frm_calc_cmbo_field_var3 option:selected').val();
                 
               tmp_gen_code = "fld_"+tmp_uniqueid+"_"+tmp_action+"_"+tmp_opt_index;
                    //set variable
                    $('#uifm_frm_calc_cmbo_addvar').find('textarea').html(tmp_gen_code);
          }else{
              $('#uifm_frm_calc_cmbo_addvar').hide();
          }
   };
    
    this.calc_variables_getActName = function(type) {
         var result;
         switch(String(type)){
             case 'price':
                 result='Field price';
                 break;
             case 'isChecked':
                 result='Field is Checked';
                 break;
             case 'isUnchecked':
                 result='Field is Unchecked';
                 break;
             case 'isFilled':
                 result='Field is Filled';
                 break;
             case 'value':
                 result='Field value';
                 break;
             case 'quantity':
                 result='Field quantity';
                 break;
             case 'optprice':
                 result='Option price';
                 break;
             case 'optIsChecked':
                 result='Option is checked';
                 break;
             case 'optIsUnchecked':
                 result='Option is unchecked';
                 break;
         }
         return result;
     };
    this.calc_variables_addVarByButton = function() {
        
        //get index
        var tmp_cur_index = $('#zgfm-tab-calc-sourcecode-wrapper .sfdc-nave .sfdc-active').attr('data-zgfm-id') ||0;
        
        var editor_template = $('#uifm_frm_calc_content'+tmp_cur_index).data('CodeMirrorInstance');
        var str=$('#uifm_frm_calc_cmbo_addvar').find('textarea').val();
        var doc = editor_template.getDoc();
        var cursor = doc.getCursor();

        var pos = {
            line: cursor.line,
            ch: cursor.ch
        }

        doc.replaceRange(str, pos);
        
        //show vars
        
        zgfm_back_calc.calc_variables_showusedvars(tmp_cur_index);
    };
    this.calc_variables_addVar2ByButton = function() {
        
        //get index
        var tmp_cur_index = $('#zgfm-tab-calc-sourcecode-wrapper .sfdc-nave .sfdc-active').attr('data-zgfm-id') ||0;
        
        var editor_template = $('#uifm_frm_calc_content'+tmp_cur_index).data('CodeMirrorInstance');
        var str=$('#uifm_frm_calc_cmbo_addvar4').find('textarea').val();
        var doc = editor_template.getDoc();
        var cursor = doc.getCursor();

        var pos = {
            line: cursor.line,
            ch: cursor.ch
        }

        doc.replaceRange(str, pos);
        
        //show vars
        
        zgfm_back_calc.calc_variables_showusedvars(tmp_cur_index);
    };
    
    this.calc_table_refreshCodes= function() {
        var tmp_obj=$('#zgfm-tbl-calc-variables');
        var tmp_vars = rocketform.getUiData2('calculation','variables');
         
        var tmp_str;
        $.each(tmp_vars, function( key, value ) {
           
            tmp_str+='<tr>';
            tmp_str+='<td> '+value['tab_title']+'</td>';
            tmp_str+='<td><textarea style="width: 284px;" onclick="this.select();">[uifm_var opt="calc" atr1="'+key+'"]</textarea></td>';
            tmp_str+='</tr>';
        });
        
        tmp_obj.find('tbody').html('');
        tmp_obj.find('tbody').append(tmp_str);
        
    };
    this.calc_variables_activate = function(content,index) {
         var field_obj_inp_html;
                        var te_html;
                                          var tmp_codemiror_instance = $('#uifm_frm_calc_content'+index).data('CodeMirrorInstance'); 
                                           
                                          if(tmp_codemiror_instance){
                                              
                                          }else{
                                               
                                                //codemirror
                                                  te_html = document.getElementById("uifm_frm_calc_content"+index);
                                                  field_obj_inp_html =  CodeMirror.fromTextArea(te_html, {
                                                                          lineNumbers: true,
                                                                          lineWrapping: true,
                                                                          mode: "javascript",
                                                                          keyMap: "sublime",
                                                                          autoCloseBrackets: true,
                                                                          matchBrackets: true,
                                                                          showCursorWhenSelecting: true,
                                                                          theme: "monokai",
                                                                          // Whether or not you wish to enable code folding (requires 'lineNumbers' to be set to 'true')
                                                                          enableCodeFolding: true,
                                                                          // Whether or not to enable code formatting
                                                                          enableCodeFormatting: true,
                                                                          // Whether or not to highlight all matches of current word/selection
                                                                          highlightMatches: true,
                                                                          // Whether or not to show the comment button on the toolbar
                                                                          showCommentButton: true,

                                                                          // Whether or not to show the uncomment button on the toolbar
                                                                          showUncommentButton: true,
                                                                          // Whether or not to highlight the currently active line
                                                                          styleActiveLine: true,
                                                                          tabSize: 2 
                                                                         });

                                                 field_obj_inp_html.on("change", function(cm) {
                                                     var f_store='input1-text';
                                                       var f_val=cm.getValue();
                                                       let tmp_obj= cm.getTextArea();
                                                       let tmp_obj_num=$(tmp_obj).attr('data-num');
                                                       zgfm_back_calc.calc_variables_showusedvars(tmp_obj_num); 
                                                       
                                                      // console.log('onchange codemirror : '+f_val);
                                                      // zgpb_core.updateModalFieldCoreAndPreview(f_store,f_val);
                                                 });

                                                 field_obj_inp_html.foldCode(CodeMirror.Pos(0, 0));
                                                 field_obj_inp_html.foldCode(CodeMirror.Pos(21, 0)); 

                                                 field_obj_inp_html.setSize('100%', '100%');
                                                 
                                                   // store it
                                                    $("#uifm_frm_calc_content"+index).data('CodeMirrorInstance', field_obj_inp_html);
                                                    tmp_codemiror_instance = $('#uifm_frm_calc_content'+index).data('CodeMirrorInstance'); 
                                          }
                                         
                                         
                                           
                                           tmp_codemiror_instance.setValue(decodeURIComponent(content));
    };
    
    this.calc_variables_showusedvars = function(index) {
        var tmp_container= $('#uifm_frm_calc_content'+index+'_showvars');
        //clean html
        tmp_container.find('ul').html('');
        // generate html
        
        var tmp_str='';
        
        var tmp_vars=[];
        var tmp_vars2=[];
        var tmp_var_opts=[];
        
        var tmp_var_container=$('#uifm_frm_calc_content'+index).parent().find('.CodeMirror-code');
        $.each(tmp_var_container.find('.cm-variable'), function(index2, value2) {
                if($(this).text().startsWith('fld_')){
                     tmp_vars.push($(this).text());
                } else if ($(this).text().startsWith('fldopt_')) {
                    tmp_var_opts.push($(this).text());
                  } else {
                    if($(this).text().startsWith('Math')){
                        
                    }else if ($(this).text().startsWith('console')){
                        
                    }else{
                        tmp_vars2.push($(this).text());
                    }
                }
         });
                                    
        tmp_vars = tmp_vars.filter(function(item, pos) {
            return tmp_vars.indexOf(item) == pos;
        });
        
        var tmp_parts;
        var tmp_html_output =[];
        var tmp_uid_arr = [];
        var tmp_uid_arr_data = {};
        var tmp_step;
        var tmp_field_name;
        $.each(tmp_vars, function(index2, value2) {
            tmp_parts = value2.split('_');
            if($.inArray(tmp_parts[1],tmp_uid_arr) == -1){
                // the element is not in the array
                tmp_uid_arr.push(tmp_parts[1]);
                
                
                tmp_step= $('#'+tmp_parts[1]).closest('.uiform-step-pane').data('uifm-step');
                
                tmp_field_name = rocketform.getUiData4('steps_src',tmp_step,tmp_parts[1],'field_name');
                tmp_uid_arr_data[tmp_parts[1]] = {'fieldname':tmp_field_name};
                
                tmp_html_output.push("<li><b>"+tmp_parts[0]+'_'+tmp_parts[1]+"_[...]</b>: this variable belong to <b><i>"+tmp_uid_arr_data[tmp_parts[1]]['fieldname']+'</i></b></li>');
            } 
            
         });
         
         //showing form math variables
         var tmp_calc_arr= rocketform.getUiData2('calculation','variables');
         tmp_uid_arr = [];
         var tmp_key;
         $.each(tmp_var_opts, function(index2, value2) {
            tmp_parts = value2.split('_');
            if($.inArray(tmp_parts[1],tmp_uid_arr) == -1){
                // the element is not in the array
                tmp_uid_arr.push(tmp_parts[1]);
                
                tmp_key = zgfm_back_calc.search_varId(tmp_calc_arr,tmp_parts[1]);

                tmp_field_name = rocketform.getUiData4('calculation','variables',tmp_key['key'],'tab_title');
                tmp_uid_arr_data[tmp_parts[1]] = {'fieldname':tmp_field_name};
                
                tmp_html_output.push("<li><b>"+value2+"</b>: this variable belong to <b><i style='color:#CA4A1F;'>"+tmp_uid_arr_data[tmp_parts[1]]['fieldname']+'</i></b></li>');
            } 
            
            
         });
         
         
         //auxiliary variables
         tmp_vars2 = tmp_vars2.filter(function(item, pos) {
            return tmp_vars2.indexOf(item) == pos;
        });
         $.each(tmp_vars2, function(index2, value2) {
             tmp_html_output.push("<li><b>"+value2+"</b>: auxiliary variable</li>");
         });
         
         //fill html
         tmp_container.find('ul').html(tmp_html_output.join(' '));
        
    }
    
    
    this.calculation_genFields = function (id,keyindex) {
        
        var tmp_form_id = $('#uifm_frm_main_id').val()||0;
        var tmp_content=$('#uifm_frm_calc_content'+id);
        if(tmp_content.length){
             let tmp_content_parent = tmp_content.parent();
             var tmp_variables = [];
             var tmp_comments=[];
             var tmp_function;
             var tmp_field_val;
              
             var tmp_content_front=rocketform.getInnerVariable('calculation_cont_front');
             
             //search for comments
             $.each(tmp_content_parent.find('div.CodeMirror-code .cm-comment'), function(i, value) {
                   tmp_comments.push($(this).html());
                });
                
             RegExp.escape = function(s) {
                    return s.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                };   
                
                 //replace all function
            var replaceAll = function (str, find, replace) {
                         return str.replace(new RegExp(RegExp.escape(find), 'g'), replace);
                }
             //remove comments
            
               $.each(tmp_comments, function(i, value) {
                      tmp_content_front = replaceAll(tmp_content_front,value,'');
                });
             //store content front
            rocketform.setInnerVariable('calculation_cont_front',tmp_content_front);
             
             
             //search for variables
             $.each(tmp_content_parent.find('div.CodeMirror-code .cm-variable'), function(i, value) {
                   tmp_variables.push($(this).html());
                });
              
              //remove duplicate
              tmp_variables = tmp_variables.filter(function(elem, index, self) {
                    return index == self.indexOf(elem);
                })
             
              var tmp_field_store={};
              var tmp_field_detail=[];
              //process variable
               $.each(tmp_variables, function(i, value) {
                 
                    if(value.startsWith('fld_')){
                        tmp_field_detail=[];
                       tmp_field_detail=zgfm_back_calc.calculation_getDetailField(value);
                       tmp_field_store[tmp_field_detail['unique_id']]=tmp_field_detail;
                    }
                    if(value.startsWith('fldopt_')){
                        
                       tmp_field_val = value.split("_"); 
                        
                       //function to replace
                       tmp_function = "zgfm_[%formid%]_calculation_cont"+tmp_field_val[1]+"()";
                        tmp_content_front=rocketform.getInnerVariable('calculation_cont_front');
                       tmp_content_front = replaceAll(tmp_content_front,value,tmp_function);
                       //store content front
                        rocketform.setInnerVariable('calculation_cont_front',tmp_content_front);
                    }
                });
              
                rocketform.setUiData4('calculation','variables',keyindex,'fields',tmp_field_store);
                //mainrformb['calculation']['variables'][index]['fields']=JSON.stringify(tmp_field_store);
           }else{
             rocketform.setUiData4('calculation','variables',keyindex,'fields',[]);
           }
         
    };
    
    this.calculation_getDetailField = function (value) {
      
         var tmp_field_detail={};
         tmp_field_detail['field']=value;
        
         var tmp_content_front=rocketform.getInnerVariable('calculation_cont_front');
         
         //replace all function
        var replaceAll = function (str, find, replace) {
                return str.replace(new RegExp(find, 'g'), replace);
            }
         var tmp_field_val = value.split("_");
         tmp_field_detail['unique_id']=tmp_field_val[1];
         
         //action
         var tmp_field_action = tmp_field_detail['action']=tmp_field_val[2];
         
         //function to replace
         var tmp_function = "zgfm_front_calc.calc_field_get(%vars%)";
         var tmp_params = [];
         //$('#uifm_frm_main_id').val()
         tmp_params.push($('#uifm_frm_main_id').val());
         tmp_params.push(tmp_field_detail['unique_id']);
         tmp_params.push(tmp_field_detail['action']);
         var tmp_str;
         var tmp_option="";
      
         if($('#'+tmp_field_detail['unique_id']).length){
             var tmp_field_type=$('#'+tmp_field_detail['unique_id']).attr('data-typefield');
            
             var tmp_step_num=$('#'+tmp_field_detail['unique_id']).closest('.uiform-step-pane').data('uifm-step');
             
             switch(parseInt(tmp_field_type)){
                 case 8:
                    //radio button
                 case 9:
                    //checkbox
                 case 10:
                    //select
                 case 11:
                    //multiple select
                 case 16:
                    //slider
                 case 18:
                    //spinner
                 case 40:
                    //switch
                 case 41:
                     //dyn checkbox
                 case 42:
                     //dyn radio button
                        switch(String(tmp_field_action)){
                            case 'optprice':
                            case 'optIsChecked':
                            case 'optIsUnchecked':     
                                var tmp_field_opt=tmp_field_val[3];
                                tmp_option = tmp_field_opt;
                               
                                break;
                            case 'price':
                            case 'isChecked':
                            case 'isUnchecked':
                            case 'isFilled':
                            case 'date':
                            case 'value':
                            case 'quantity':
                                 //store index
                               
                                break;
                                
                        }
                     
                     
                     break;
             }
              tmp_params.push(tmp_option);
           
                    tmp_str = "'"+tmp_params.join("','")+"'";
                    tmp_function = replaceAll(tmp_function,'%vars%',tmp_str);
                    tmp_content_front = replaceAll(tmp_content_front,tmp_field_detail['field'],tmp_function);
         }
        
        //store content front
        rocketform.setInnerVariable('calculation_cont_front',tmp_content_front);
        return tmp_field_detail;
        
    }
    
 
};
window.zgfm_back_calc = zgfm_back_calc = $.zgfm_back_calc = new zgfm_back_calc();


})($uifm,window);
} 