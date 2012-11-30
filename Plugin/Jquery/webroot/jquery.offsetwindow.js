// JavaScript Document
/*
$("#selector").offsetwindow(2000);
*/
jQuery(function($){
	
	jQuery.fn.offsetwindow=function($arguments){
		
		this.delay=$arguments.delay?$arguments.delay:5000;
		this.autoPlay=$arguments.autoPlay?$arguments.autoPlay:true;
		
		//OPTIONS
		var $selector=$(this.selector).find('img');
		var $delay=arguments[0]?arguments[0]:5000;
		var $current=0;
		var $total=$selector.length;
		var $timer=null;
		$($selector).hide();
		$($selector[0]).show();

		//SETTING THE POSITIONS
		$(this).css({width:"100%",height:"100%",position:'fixed',top:'0px',left:'0px',zIndex:0});
		$(this).find('img').css({position:'absolute',top:'0px',left:'0px',zIndex:0});
		
		//BIND EVENTS TO RESIZE AND RELOAD		
		$(window).bind('resize load',function(){
			var offset={}
			offset.width=$(window).width()/$selector.width();
			offset.height=$(window).height()/$selector.height();
			offset.div=Math.max(offset.width,offset.height);
			offset.px=Math.ceil($selector.width()*offset.div);
			offset.py=Math.ceil($selector.height()*offset.div);
			offset.x=Math.ceil(($(window).width()/2)-(offset.px/2));
			offset.y=Math.ceil(($(window).height()/2)-(offset.py/2));
			$selector.css({top:offset.y+"px",left:offset.x+"px",width:offset.px+"px",height:offset.py+"px"});
		});
		
		this.play=function(){
			$timer=setInterval(this.loop,this.delay);
		}
		
		this.stop=function(){
			clearInterval($timer);
		}
		
		this.next=function(){
			this.stop();
			this.loop();
			this.play();
			
		}
		
		this.prev=function(){
			this.stop();
			$current--;
			if($current<0) $current=$total-1;
			$selector.fadeOut();
			$($selector[$current]).fadeIn();
			this.play();
		}
		
		this.loop=function(){
			$current++;
			if($current>=$total) $current=0;
			$selector.fadeOut();
			$($selector[$current]).fadeIn();
		}
		
		if(this.autoPlay) this.play();		
		return this;
	}
});