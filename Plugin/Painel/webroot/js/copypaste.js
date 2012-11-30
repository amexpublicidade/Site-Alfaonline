function CopyPaste(){
    var text='';
    var is_onmouseup=false;
    var is_ctrl=false;
    this.Init=Init;
    this.ChangeTextInSelection=ChangeTextInSelection;
    this.EventHandler=EventHandler;
    function Init(init_text){
        text=init_text;
        if(window.addEventListener){
            if(window.navigator.userAgent.match('Firefox')){
                switch(window.navigator.userAgent.match(/Firefox\/\d/).toString()){
                    case'Firefox/1':
                    case'Firefox/2':
                        document.addEventListener('mouseup',this.EventHandler,false);
                        is_onmouseup=true;
                        document.addEventListener('keyup',function(e){
                            if(e.which==17)is_ctrl=false;
                        },false);
                        document.addEventListener('keydown',function(e){
                            if(e.which==17)is_ctrl=true;
                            if(e.which==67&&is_ctrl==true)EventHandler();
                        },false);
                        break;
                    default:
                        document.getElementsByTagName('body')[0].addEventListener('copy',this.EventHandler,false);
                }
            }else{
                document.getElementsByTagName('body')[0].addEventListener('copy',this.EventHandler,false);
            }
        }else{
            document.getElementsByTagName('body')[0].attachEvent('oncopy',this.EventHandler);
        }
    };
    function ChangeTextInSelection(text){
        var body_element=document.getElementsByTagName('body')[0];
        var new_selection_block=document.createElement('div');
        new_selection_block.style.overflow='hidden';
        new_selection_block.style.color='#000000';
        new_selection_block.style.backgroundColor='transparent';
        new_selection_block.style.textAlign='left';
        new_selection_block.style.textDecoration='none';
        new_selection_block.style.border='none';
        new_selection_block.id='new_selection_block'+Math.random().toString();
        if(typeof window.getSelection!='undefined'){
            var current_selection=window.getSelection();
            if(current_selection.toString()){
                if(typeof current_selection.setBaseAndExtent!='undefined'){

                    var copytext = current_selection + text;
                    var newdiv = document.createElement('div');
                    newdiv.style.position='absolute';
                    newdiv.style.left='-99999px';
                    body_element.appendChild(newdiv);
                    newdiv.innerHTML = copytext;
                    current_selection.selectAllChildren(newdiv);					
                    window.setTimeout(function(){
                        body_element.removeChild(newdiv);
                    },0);
                }else{
                    var current_text_lower=text.replace(/<.*?>/gi,'');
                    if(current_selection.toString().indexOf(current_text_lower)==-1){
                        var new_text_block=document.createElement('div');
                        new_text_block.style.position='fixed';
                        body_element.appendChild(new_text_block);
                        new_selection_block.innerHTML=text;
                        new_text_block.appendChild(new_selection_block);
                        var new_range=document.createRange();
                        new_range.selectNode(new_text_block);
                        current_selection.addRange(new_range);
                        window.setTimeout(function(){
                            new_text_block.parentNode.removeChild(new_text_block);
                        },(is_onmouseup)?3000:0);
                    }
                }
            }
        }else{
            var range=document.selection.createRange();
            new_selection_block.style.width=0;
            new_selection_block.style.height=0;
            var current_range_text_lower=range.text.toString().toLowerCase();
            var current_text_lower=text.toLowerCase().replace(/<.*?>/gi,'');
            if(current_range_text_lower.indexOf(current_text_lower)==-1){
                new_selection_block.innerHTML=range.htmlText+text;
            }else{
                new_selection_block.innerHTML=range.htmlText;
            }
            body_element.appendChild(new_selection_block);
            var new_text_range=body_element.createTextRange();
            new_text_range.moveToElementText(new_selection_block);
            new_text_range.select();
            window.setTimeout(function(){
                new_selection_block.parentNode.removeChild(new_selection_block);
                if(range.text!=''){
                    range.select();
                }
            },0);
        }
    };
    function EventHandler(e){
        ChangeTextInSelection(text);
    };
}
if(window.attachEvent){ window.attachEvent('onload',init); }
else if(window.addEventListener){ window.addEventListener('load',init,false); }
else{ window.onload=init; }
function init(){
    var copy_paste=new CopyPaste();
    var share_url=document.location.href;
    //share_url+=(share_url.indexOf('?'>-1)?'&cp':'?cp');
    copy_paste.Init('<br /><br /><a href="'+share_url+'" target="_blank_">'+share_url+'</a>',true);
}