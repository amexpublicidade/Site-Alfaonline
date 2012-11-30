jQuery(function($){
	
	jQuery.fn.banner=function(args){
		
		var settings=$.extend({},{
			delay:5000,
			animationDelay:300,
			autoplay:true,
			startAt:0,
			controllers:{},
			rand:false,
		},args);
		
		var $temp=this;
		if(settings.controllers.play) $(settings.controllers.play).bind('click',function(){ $temp.play(); });
		if(settings.controllers.stop) $(settings.controllers.stop).bind('click',function(){ $temp.stop(); });
		if(settings.controllers.next) $(settings.controllers.next).bind('click',function(){ $temp.next(); });
		if(settings.controllers.prev) $(settings.controllers.prev).bind('click',function(){ $temp.prev(); });
		if(settings.controllers.pause) $(settings.controllers.pause).bind('click',function(){ $temp.pause(); });
				
		var timer=null;
		var total=$(this).length;
		var current=(settings.rand)?Math.round(Math.random()*total-1):settings.startAt;
		var stopped=false;
		var $this=$(this);
		var $parent=$this.parent();		
		
		$this.parent().css({position:'relative'});
		$this.css({position:'absolute',top:0,left:0,zIndex:0,display:'none'});
		$($this[current]).css({display:'block'});	
		
		this.pause=function(){
			stopped=!stopped;
			if(stopped) this.stop();
			else this.play();
		}
		
		this.play=function(){
			clearInterval(timer);
			timer=setInterval(this.loop,settings.delay);
			stopped=false;
		}
		
		this.stop=function(){
			clearInterval(timer);
			stopped=true;
		}
		
		this.next=function(){
			clearInterval(timer);
			this.loop();
			if(!stopped) timer=setInterval(this.loop,settings.delay);
		}
		
		this.prev=function(){
			clearInterval(timer);
			current--;
			if(current<0) current=total-1;
			$this.fadeOut(settings.animationDelay);
			$($this[current]).fadeIn(settings.animationDelay);
			if(!stopped) timer=setInterval(this.loop,settings.delay);
		}
		
		this.goto=function(slide){
			if(slide<0 || slide>=total || slide==current) return false;
			clearInterval(timer);
			current=slide;
			$this.fadeOut(settings.animationDelay);
			$($this[current]).fadeIn(settings.animationDelay);
			if(!stopped) timer=setInterval(this.loop,settings.delay);
		}
		
		this.loop=function(){
			current++;
			if(current>=total) current=0;
			$this.fadeOut(settings.animationDelay);
			$($this[current]).fadeIn(settings.animationDelay);
		}
		
		this.links=function(sel){
			for(var i=0;i<total;i++){
				$(sel).append('<li class="link"><a href="#'+i+'">'+eval(i+1)+'</a></li>');
			}
			$(sel).find('li.link>a').click(function(){
				var lnk=$(this).attr('href').split('#')[1];
				$temp.goto(lnk);
				return false;
			});
		}
		
		if(settings.autoplay) this.play();		
		return this;
	}
	
});