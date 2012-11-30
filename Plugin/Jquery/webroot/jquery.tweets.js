/*
$.tweets("usuario",{count:5,rt:"true",loop:"true"},function(data){ alert(data); });
*/
jQuery(function($){
	
jQuery.tweets=function(username,config,callback){
	if(!config)config={};
	if(!config.count)config.count=10;
	if(!config.rt)config.rt=true;
	if(!config.loop)config.loop=false;
	config.rt=config.rt?"true":"false";
	var urlz='http://api.twitter.com/1/statuses/user_timeline.json?screen_name='+username+'&count='+config.count+'&include_rts='+config.rt+'';
	$.ajax({url:urlz,crossDomain:true,dataType:'jsonp',success:function(data){
			if(config.loop){
				$.each(data,function(key,value){
					value.text=value.text.replace(/((https?|ftp|file)\:\/\/(w{3})?[\w\d\-\_]+\.[\w\d\_\-]{2,}[\w\d\.\/\?\&\%\@\#\=\~\|]+)/ig,'<a class="tweets_url" href="$1">$1</a>');
					value.text=value.text.replace(/(@)([\w\d\_\-]+)/ig,'<a class="tweets_user" href="http://www.twitter.com/$2">$1$2</a>');
					value.text=value.text.replace(/(#)([\w\d\_\-]+)/ig,'<a class="tweets_search" target="_blank" href="http://twitter.com/#!/search?q=%23$2">$1$2</a>');
					callback(value);
				});
			}else{
				callback(data);
			}
			if(config.success)config.success(data);
		}
	});
}

});