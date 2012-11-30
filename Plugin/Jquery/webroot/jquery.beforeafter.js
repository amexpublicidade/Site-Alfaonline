jQuery(function($){
	
    jQuery.fn.beforeafter=function(opts){
		
        var _this=this;
        var s=$.extend({},{
            border:'none',
        },opts);
		
        $(window).load(function(){
            $(_this).each(function(e){				
                var $this=$(this);
                var _width=$(this).find('img:first-child').width();
                var _height=$(this).find('img:first-child').height();				
                $(this).width(_width).height(_height).css({
                    overflow:'hidden'
                });
                if($(this).css('position')=='static') $(this).css({
                    position:'relative'
                });
                $(this).find('img:first-child').wrap('<div class="wrapper" />');
                                
                var _wrapper=$(this).find('div.wrapper').css({
                    position:'absolute',
                    top:0,
                    left:0,
                    zIndex:2,
                    overflow:'hidden',
                    borderRight:s.border,
                    width:_width,
                    height:_height
                });
				
                var _img=_wrapper.find('img').css({
                    position:'absolute',
                    top:0,
                    left:0,
                    zIndex:3
                });
				
                $(this).append('<nav><a href="#" class="before">&laquo;</a><a href="#" class="after">&raquo;</a></nav>');
                var _nav=$(this).find('nav').css({
                    width:62,
                    position:'absolute',
                    top:0,
                    left:'50%',
                    zIndex:5,
                    background:'#000',
                    marginLeft:-30,
                    opacity:0,
                    borderRadius:'0 0 5px 5px'
                });
				
                var _links=_nav.find('a').css({
                    width:30,
                    padding:'10px 0',
                    textAlign:'center',
                    float:'left',
                    color:'#fff',
                    textDecoration:'none',
                });
				
                _nav.find('a.before').click(function(e){					
                    _wrapper.animate({
                        left:0
                    });
                    _img.animate({
                        left:0
                    });
                    e.stopPropagation();
                    return false;
                });
				
                _nav.find('a.after').click(function(e){
                    _wrapper.animate({
                        left:-_width
                        });
                    _img.animate({
                        left:_width
                    });
                    e.stopPropagation();
                    return false;
                });
				
                $this.hover(function(){
                    _nav.stop().animate({
                        opacity:1
                    });
                },function(){
                    _nav.stop().animate({
                        opacity:0
                    });
                });
				
                $this.click(function(e){
                    var offset=$this.offset().left;
                    var clickx=e.clientX-offset;
                    pos=_width-clickx;
                    _wrapper.animate({
                        left:-pos
                        });
                    _img.animate({
                        left:pos
                    });
                });
				
            });			
        });
					
    };
});