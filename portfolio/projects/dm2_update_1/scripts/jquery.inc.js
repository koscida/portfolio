jQuery.fn.inc=function(a,d,e,f,g,c){return this.length?this.each(function(){f=$(this);c=function(b){f.html($.isFunction(d)?d(b):b);e&&e()};$.browser.msie?$("<iframe>").hide().bind("readystatechange",function(){/m/.test(this.readyState)&&(c(this.contentWindow.document.body.innerHTML),$(this).remove())}).attr("src",a).appendTo(document.body):$.ajax({url:a,complete:function(b,a){/c/.test(a)&&c(b.responseText)}})}):this}; $(function(){$('[class*="inc"]').each(function(){$(this).inc(unescape(this.className.replace(/.*inc:([^ $]+)/,"$1")))})});