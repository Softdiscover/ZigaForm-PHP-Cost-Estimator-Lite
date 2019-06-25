if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_helper = zgfm_back_helper || null;
if(!$uifm.isFunction(zgfm_back_helper)){
(function($, window) {
 "use strict";  
    
var zgfm_back_helper = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {
        
    }
    
    this.length_obj = function(obj) {
        var count = 0;
            for (var p in obj) {
              obj.hasOwnProperty(p) && count++;
            }
            return count;
    };
     
    this.generateUniqueID = function (nrodec) {
                var number = Math.random(); // 0.9394456857981651
                number.toString(36); // '0.xtis06h6'
                var id = number.toString(36).substr(2, nrodec); // 'xtis06h6'
                return id;
    }; 
     
    this.versionCompare = function(v1, v2, options) {
        
        /*assert(versionCompare("1.7.1", "1.7.10") < 0);
        assert(versionCompare("1.7.2", "1.7.10") < 0);
        assert(versionCompare("1.6.1", "1.7.10") < 0);
        assert(versionCompare("1.6.20", "1.7.10") < 0);
        assert(versionCompare("1.7.1", "1.7.10") < 0);
        assert(versionCompare("1.7", "1.7.0") < 0);
        assert(versionCompare("1.7", "1.8.0") < 0);

        assert(versionCompare("1.7.2", "1.7.10b", {lexicographical: true}) > 0);
        assert(versionCompare("1.7.10", "1.7.1") > 0);
        assert(versionCompare("1.7.10", "1.6.1") > 0);
        assert(versionCompare("1.7.10", "1.6.20") > 0);
        assert(versionCompare("1.7.0", "1.7") > 0);
        assert(versionCompare("1.8.0", "1.7") > 0);

        assert(versionCompare("1.7.10", "1.7.10") === 0);
        assert(versionCompare("1.7", "1.7") === 0);
        assert(versionCompare("1.7", "1.7.0", {zeroExtend: true}) === 0);

        assert(isNaN(versionCompare("1.7", "1..7")));
        assert(isNaN(versionCompare("1.7", "Bad")));
        assert(isNaN(versionCompare("1..7", "1.7")));
        assert(isNaN(versionCompare("Bad", "1.7")));*/
        
        
        var lexicographical = options && options.lexicographical,
        zeroExtend = options && options.zeroExtend,
        v1parts = v1.split('.'),
        v2parts = v2.split('.');

    function isValidPart(x) {
        return (lexicographical ? /^\d+[A-Za-z]*$/ : /^\d+$/).test(x);
    }

    if (!v1parts.every(isValidPart) || !v2parts.every(isValidPart)) {
        return NaN;
    }

    if (zeroExtend) {
        while (v1parts.length < v2parts.length) v1parts.push("0");
        while (v2parts.length < v1parts.length) v2parts.push("0");
    }

    if (!lexicographical) {
        v1parts = v1parts.map(Number);
        v2parts = v2parts.map(Number);
    }

    for (var i = 0; i < v1parts.length; ++i) {
        if (v2parts.length == i) {
            return 1;
        }

        if (v1parts[i] == v2parts[i]) {
            continue;
        }
        else if (v1parts[i] > v2parts[i]) {
            return 1;
        }
        else {
            return -1;
        }
    }

    if (v1parts.length != v2parts.length) {
        return -1;
    }

    return 0;
    }
    
    /*tools for add,subs data*/
    this.getData= function(mainarr, name) {
        return mainarr[name];
    };
    
    this.setData = function(mainarr,name,value) {
         mainarr[name]=value;
    };
    
    
    this.getData2 = function(mainarr,name,index) {
                try{
                return mainarr[name][index];
                    }
                catch(err) {
                    console.log('error getUiData2: '+err.message);
                } 
            };
    this.setData2 = function(mainarr,name,index,value) {
      if (!mainarr.hasOwnProperty(name)){
            mainarr[name]= {};
          }
      if (!mainarr[name].hasOwnProperty(index)){
            mainarr[name][index]= {};
          }
        mainarr[name][index]=value;   
    };
    this.getData3 = function(mainarr,name,index,key) {
                try{
                return mainarr[name][index][key];
                    }
                catch(err) {
                    console.log('error getUiData3: '+err.message);
                } 
            };
    this.delData3 = function(mainarr,name,index,key) {
                delete mainarr[name][index][key];
            };
            
    this.setData3 = function(mainarr,name,index,key,value) {
       if (!mainarr.hasOwnProperty(name)){
            mainarr[name]= {};
          }
       if (!mainarr[name].hasOwnProperty(index)){
           mainarr[name][index]={};
          }
        
       mainarr[name][index][key]=value;   
    };
    this.setData4 = function(mainarr,name,index,key,option,value) {
        
        if (!mainarr.hasOwnProperty(name)){
            mainarr[name]= {};
        }
        if (!mainarr[name].hasOwnProperty(index)){
            mainarr[name][index]={};
        }

        if (!mainarr[name][index].hasOwnProperty(key)){
            mainarr[name][index][key]={};
        }
        
        mainarr[name][index][key][option]=value;
        
           
    };
    this.getData4 = function(mainarr,name,index,key,option) {
        try{
                return mainarr[name][index][key][option];
             }
        catch(err) {
            console.log('error getUiData4: '+err.message);
        }     
    };
    this.getData5 = function(mainarr,name,index,key,section,option) {
        try {
            if(typeof mainarr[name][index] == 'undefined') {
              return '';
            }else{
                return mainarr[name][index][key][section][option];
            } 
        }
        catch(err) {
            console.log('error getUiData5: '+err.message);
            return '';
        } 
       }; 
      this.setData5 = function(mainarr,name,index,key,section,option,value) {
            
            if (!mainarr.hasOwnProperty(name)){
            mainarr[name]= {};
            }
            if (!mainarr[name].hasOwnProperty(index)){
                mainarr[name][index]={};
            }

            if (!mainarr[name][index].hasOwnProperty(key)){
                mainarr[name][index][key]={};
            }
            
            if (!mainarr[name][index][key].hasOwnProperty(section)){
                mainarr[name][index][key][section]={};
            }
            
            mainarr[name][index][key][section][option]=value;
               
    };
    this.addIndexData5 = function(mainarr,name,index,key,section,option,value) {
            if(typeof mainarr[name][index][key][section][option] == 'undefined') {
              
            }else{
                mainarr[name][index][key][section][option][value]={};
            }    
    };
    
    this.getData6 = function(mainarr,name,index,key,section,option,option2) {
        try {
            if(typeof mainarr[name][index][key][section][option][option2] == 'undefined') {
              return '';
            }else{
                return mainarr[name][index][key][section][option][option2];
            } 
        }
        catch(err) {
            console.log('error handled - getUiData6: '+err.message);
            return '';
        } 
       };
      
       
    this.setData6 = function(mainarr,name,index,key,section,option,option2,value) {
            
            if (!mainarr.hasOwnProperty(name)){
                mainarr[name]= {};
            }
            if (!mainarr[name].hasOwnProperty(index)){
                mainarr[name][index]={};
            }

            if (!mainarr[name][index].hasOwnProperty(key)){
                mainarr[name][index][key]={};
            }
            
            if (!mainarr[name][index][key].hasOwnProperty(section)){
                mainarr[name][index][key][section]={};
            }
            
            if (!mainarr[name][index][key][section].hasOwnProperty(option)){
                mainarr[name][index][key][section][option]={};
            }
            
            mainarr[name][index][key][section][option][option2]=value;
             
    };
    
    this.delData6 = function(mainarr,name,index,key,section,option,option2) {
                delete mainarr[name][index][key][section][option][option2];
    };
    
    
    
};
window.zgfm_back_helper = zgfm_back_helper = $.zgfm_back_helper = new zgfm_back_helper();


})($uifm,window);
} 

if( typeof zgfm_helper == 'undefined' ) {
  var zgfm_helper = { } ;
}

zgfm_helper.arr = {
         /**
     * Function to sort multidimensional array
     * 
     * <a href="/param">@param</a> {array} [arr] Source array
     * <a href="/param">@param</a> {array} [columns] List of columns to sort
     * <a href="/param">@param</a> {array} [order_by] List of directions (ASC, DESC)
     * @returns {array}
     */
    multisort: function(arr, columns, order_by) {
        if(typeof columns == 'undefined') {
            columns = [];
            for(x=0;x<arr[0].length;x++) {
                columns.push(x);
            }
        }

        if(typeof order_by == 'undefined') {
            order_by = [];
            for(x=0;x<arr[0].length;x++) {
                order_by.push('ASC');
            }
        }

        function multisort_recursive(a,b,columns,order_by,index) {  
            var direction = String(order_by[index]) === 'DESC' ? 1 : 0;
            
            a[columns[index]] = $.isNumeric(parseInt(a[columns[index]]))?parseInt(a[columns[index]]):0;
            b[columns[index]] = $.isNumeric(parseInt(b[columns[index]]))?parseInt(b[columns[index]]):0;
            
            var is_numeric = !isNaN( a[columns[index]] - b[columns[index]] );
            
            var x = is_numeric ? a[columns[index]] : a[columns[index]].toLowerCase();
            var y = is_numeric ? b[columns[index]] : b[columns[index]].toLowerCase();

            if(x < y) {
                    return (direction === 0) ? -1 : 1;
            }

            if(x === y)  {               
                return columns.length-1 > index ? multisort_recursive(a,b,columns,order_by,index+1) : 0;
            }

            return (direction === 0) ? 1 : -1;
        }

        return arr.sort(function (a,b) {
            return multisort_recursive(a,b,columns,order_by,0);
        });
    }
};


 