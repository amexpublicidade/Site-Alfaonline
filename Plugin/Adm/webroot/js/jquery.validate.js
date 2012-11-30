jQuery(function($){
    
    var validationRules={
        notEmpty:function(element){
            return $(element).val()=='';
        },
        email:function(element){
            return !$(element).val().match(/^[\w\d-_.]+@[\w\d-_.]+\.[\w\d]{2,}$/i);
        },
        link:function(element){
            return !$(element).val().match(/^[hH][tT]{2}[pP]:\/\/([wW]{3}\.)?[\w\d-_.]+[\w\d]{2,}(\?[\w\d#$%*&!"/~\[\]\(\)?=]+)?/);
        },
        file:function(element,allowed){
            var value=$(element).attr('data-value');
            if(value=='' || !value) return true;
            value=String(value.split('.').pop()).toLowerCase();
            return $.inArray(value,allowed);
        }
    }
    
    $.fn.validate=function(options){
        $(this).submit(function(){
            var error='';
            
            $.each(options,function(index,value){
                if(value.rule=='file'){
                    if(validationRules.file(index,value.allowed)){
                        error+=value.message;
                        error+="\n";
                    }
                } else {                
                    if(validationRules[value.rule](index)){
                        error+=value.message;
                        error+="\n";
                    }
                }
            });
            
            if(error!=''){
                alert(error);
                return false;
            }
        });        
    }
    
});