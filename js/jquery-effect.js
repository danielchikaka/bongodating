// JavaScript Document

// To use any effect just remove the comment &amp; change respective selectors

 jQuery(document).ready(function(){							


//accordian effect 1
 jQuery(".accordian .descdv:first").show();
jQuery(".accordian li").click(function(){
if (jQuery(".descdv", this).is(":hidden")) {					   
jQuery(".descdv").slideUp("slow");
jQuery("a span").removeClass("down");
jQuery("a span", this).addClass("down");
jQuery(".descdv", this).slideDown("slow");
} 
  });
		
 jQuery("ul.topnav li").hover(function(){
	//alert("dfd");
 	jQuery("ul:first", this).css ("display", "block");
 	//$("li", this).hide ();
	jQuery("li", this).slideDown ("slow");
 	jQuery("a:first", this).addClass ("hover");
 	return false;
 },function(){
 jQuery("ul:first", this).css ("display", "none");
 jQuery("a:first", this).removeClass ("hover");
  });


  });		