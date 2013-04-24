	subject_id = '';
	function handleHttpResponse()
	{
	//	alert(http.responseText+" "+subject_id);
		if (http.readyState == 4) 
		{ document.getElementById(subject_id).innerHTML="";
			if (subject_id != '')
			{
				document.getElementById(subject_id).innerHTML = http.responseText;
			}
		}
	}
	function getHTTPObject() {
		var xmlhttp;
		/*@cc_on
		@if (@_jscript_version >= 5)
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (E) {
					xmlhttp = false;
				}
			}
		@else
		xmlhttp = false;
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
			try {
				xmlhttp = new XMLHttpRequest();
			} catch (e) {
				xmlhttp = false;
			}
		}
		return xmlhttp;
	}
	var http = getHTTPObject(); // We create the HTTP Object



function getScriptPage(div_id,catogries)
{
 var  comb2 = '<select name="sel_sub" id="sel_sub_cat" disabled="disabled"  style="width:140px;" ><option value="">Select</option></select>';
	document.getElementById(div_id).innerHTML =comb2;
	
	subject_id = div_id;
	var catid = document.getElementById(catogries).value;
	var url2  ="js/search.php?catid=" + catid+"&chk=subcat";
    if(document.getElementById(catogries).value>0)
	{
	  http.open("GET",url2 , true);
	  http.onreadystatechange = handleHttpResponse;
	  http.send(null);
	}
}	



function valid111111(frm)
{


	if (frm.sel_year.value=="")
	{
		inlineMsg('sel_year','Please select year',5);
				return false;
	}
	else if (frm.sel_make.value=="")
	{
		inlineMsg('sel_make','Please select make',5);
				return false;
	}
	else if (frm.sel_model.value=="")
	{
		inlineMsg('sel_model','Please select model',5);
				return false;
	}
	
	else if (frm.mileage.value=="Mileage")
	{
		inlineMsg('mileage2','Please enter Mileage',5);
				return false;
	}
	
	
}



var MSGTIMER = 5;
var MSGSPEED = 5;
var MSGHIDE = 3;

function inlineMsg1(target,string,autohide)
{
	//alert(string);
	var MSGOFFSET = -80;
  var msg;
  var msgcontent;
  if(!document.getElementById('msg')) 
  {
    msg = document.createElement('div');
    msg.id = 'msg';
    msgcontent = document.createElement('div');
    msgcontent.id = 'msgcontent';
    document.body.appendChild(msg);
    msg.appendChild(msgcontent);
    msg.style.filter = 'alpha(opacity=0)';
    msg.style.opacity = 0;
    msg.alpha = 0;
  }
  else
  {
    msg = document.getElementById('msg');
    msgcontent = document.getElementById('msgcontent');
  }
  msgcontent.innerHTML = string;
 
 
  msg.style.display = 'block';
  var msgheight = msg.offsetHeight;
  var targetdiv = document.getElementById(target);
  targetdiv.focus();
 
  var targetheight = targetdiv.offsetHeight;
  var targetwidth = targetdiv.offsetWidth;
   //alert('targetheight='+targetheight+'  '+targetwidth);
  var topposition = topPosition(targetdiv) - ((msgheight - targetheight) / 2);
  var leftposition = leftPosition(targetdiv) + targetwidth + MSGOFFSET;
  msg.style.top = topposition + 'px';
  msg.style.left = leftposition + 'px';
   clearInterval(msg.timer);
  msg.timer = setInterval("fadeMsg(1)", MSGTIMER);
  if(!autohide)
  {
    autohide = MSGHIDE;  
  }
  window.setTimeout("hideMsg()", (autohide * 1000));
}

//------------------
// build out the divs, set attributes and call the fade function //
function inlineMsg(target,string,autohide)
{
	var MSGOFFSET = 20;
	//alert(string);
  var msg;
  var msgcontent;
  if(!document.getElementById('msg')) 
  {
    msg = document.createElement('div');
    msg.id = 'msg';
    msgcontent = document.createElement('div');
    msgcontent.id = 'msgcontent';
    document.body.appendChild(msg);
    msg.appendChild(msgcontent);
    msg.style.filter = 'alpha(opacity=0)';
    msg.style.opacity = 0;
    msg.alpha = 0;
  }
  else
  {
    msg = document.getElementById('msg');
    msgcontent = document.getElementById('msgcontent');
  }
  msgcontent.innerHTML = string;
 
 
  msg.style.display = 'block';
  var msgheight = msg.offsetHeight;
  var targetdiv = document.getElementById(target);
  targetdiv.focus();
 
  var targetheight = targetdiv.offsetHeight;
  var targetwidth = targetdiv.offsetWidth;
   //alert('targetheight='+targetheight+'  '+targetwidth);
  var topposition = topPosition(targetdiv) - ((msgheight - targetheight) / 2);
  var leftposition = leftPosition(targetdiv) + targetwidth + MSGOFFSET;
  msg.style.top = topposition + 'px';
  msg.style.left = leftposition + 'px';
   clearInterval(msg.timer);
  msg.timer = setInterval("fadeMsg(1)", MSGTIMER);
  if(!autohide)
  {
    autohide = MSGHIDE;  
  }
  window.setTimeout("hideMsg()", (autohide * 1000));
}
// hide the form alert //
function hideMsg(msg) 
{
  var msg = document.getElementById('msg');
 
  if(!msg.timer)
  {
    msg.timer = setInterval("fadeMsg(0)", MSGTIMER);
  }
}

// face the message box //
function fadeMsg(flag) 
{
  if(flag == null) 
  {
    flag = 1;
  }
  var msg = document.getElementById('msg');
  var value;
  if(flag == 1) {
    value = msg.alpha + MSGSPEED;
  } else {
    value = msg.alpha - MSGSPEED;
  }
  msg.alpha = value;
  msg.style.opacity = (value / 100);
 
  msg.style.filter = 'alpha(opacity=' + value + ')';
  if(value >= 99) {
    clearInterval(msg.timer);
    msg.timer = null;
  } else if(value <= 1) {
    msg.style.display = "none";
    clearInterval(msg.timer);
  }
}

// calculate the position of the element in relation to the left of the browser //
function leftPosition(target)
{
  var left = 0;
  if(target.offsetParent)
  {
    while(1)
	{
      left += target.offsetLeft;
      if(!target.offsetParent) 
	  {
        break;
      }
      target = target.offsetParent;
    }
  } else if(target.x) {
    left += target.x;
  }
  return left;
}

// calculate the position of the element in relation to the top of the browser window //
function topPosition(target) 
{
  var top = 0;
  if(target.offsetParent) 
  {
    while(1) 
	{
      top += target.offsetTop;
      if(!target.offsetParent)
	  {
        break;
      }
      target = target.offsetParent;
    }
  } else if(target.y)
  {
    top += target.y;
  }
  return top;
}

// preload the arrow //
if(document.images) 
{
  arrow = new Image(7,80); 
  arrow.src = "../images/msg_arrow.gif"; 
  
}
function validateEmailv2(email)
{
// a very simple email validation checking. 
// you can add more complex email checking if it helps 
    if(email.length <= 0)
	{
	  return true;
	}
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null )
    {
      var regexp_user=/^\"?[\w-_\.]*\"?$/;
      if(splitted[1].match(regexp_user) == null) return false;
    }
    if(splitted[2] != null)
    {
      var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
      if(splitted[2].match(regexp_domain) == null) 
      {
	    var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
	    if(splitted[2].match(regexp_ip) == null) return false;
      }// if
      return true;
    }
return false;
}
function checkphone(val)
{
   var charpos = val.search("[^0-9\-()]"); 
   return charpos;
}
function number(b)
 {var a;var c;if(window.event){a=window.event.keyCode}else{if(b){a=b.which}else{return true}}if((a==8)||(a==0)){return true}c=String.fromCharCode(a);c=c.toLowerCase();if((a>47)&&(a<58)){return true}else{return false}}
	



