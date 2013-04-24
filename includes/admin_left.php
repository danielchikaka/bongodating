<?php //echo $_SESSION['admin_type']; ?>
<style type="text/css">

.menutitle{

  font-family:Tahoma, Verdana, Arial; font-size:11px; font-weight:bold; color:#FFFFFF; background:url(../images/topmenu_bkg.gif); width:200; text-decoration:none; text-align:left; cursor:pointer; padding-bottom:5px; padding-top:3px; padding-left:5px; border-left:2px #FFFFFF solid; border-right:2px #FFFFFF solid; border-top:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid; }



.submenu{ 

font-family:Verdana, Arial; font-size:11px; font-weight:bold; color:#FFFFFF; cursor:pointer; text-align:left;

  background:url(../images/bgTd1.gif); padding-bottom:2px; padding-top:2px; text-decoration:none;

  padding-left:5px; margin-bottom:0.15em; width:200; line-height:22px;

  border-left:2px #FFFFFF solid; border-right:2px #FFFFFF solid;

}
.submenu span a{color:#FFFFFF;}


</style>



<script type="text/javascript">

	var persistmenu="yes"

var persisttype="sitewide"

if (document.getElementById){ 

    document.write('<style type="text/css">\n')

    document.write('.submenu{display: none;}\n')

    document.write('</style>\n') 

}

function SwitchMenu(obj){

  if(document.getElementById){

    var el = document.getElementById(obj);

    var ar = document.getElementById("masterdiv").getElementsByTagName("span"); 

    if(el.style.display != "block"){ 

	  for (var i=0; i<ar.length; i++) {

	    if (ar[i].className=="submenu") ar[i].style.display="none";

	  } 

	  el.style.display="block"; 

	}

	else { 

	  el.style.display="none"; 

	}

  }

}

function get_cookie(Name) { 

  var search = Name + "="

  var returnvalue = "";

  if (document.cookie.length > 0) {

	offset = document.cookie.indexOf(search)

	if (offset != -1) { 

	  offset += search.length

	  end = document.cookie.indexOf(";", offset);

	  if (end == -1) end = document.cookie.length;

	  returnvalue=unescape(document.cookie.substring(offset, end))

	}

  }

  return returnvalue;

}

function onloadfunction(){

  if (persistmenu=="yes"){

	var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname

	var cookievalue=get_cookie(cookiename)

	if (cookievalue!="") document.getElementById(cookievalue).style.display="block"

  }

}

function savemenustate(){

  var inc=1, blockid=""

  while (document.getElementById("sub"+inc)){

	if (document.getElementById("sub"+inc).style.display=="block"){

	  blockid="sub"+inc

	  break

	}

	inc++

  }

  var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname

  var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid

  document.cookie=cookiename+"="+cookievalue

}

if (window.addEventListener) 

  window.addEventListener("load", onloadfunction, false) 

else if (window.attachEvent) 

  window.attachEvent("onload", onloadfunction)

else if (document.getElementById) 

  window.onload=onloadfunction

if (persistmenu=="yes" && document.getElementById) 

  window.onunload=savemenustate

</script>





<table width="200" border="0" cellspacing="0" cellpadding="0" align="left">

  <tr><td align="center">

  <div id="masterdiv">

  
	 <!--<div class="menutitle" onclick="SwitchMenu('sub203')">Category Management</div>

	<span class="submenu" id="sub203">

	  &raquo; <a href="user.php?frm=classified_cat_add" class="<?=$tselo?>">Add  Category</a><br />
      <span style=" color:#FF6600; padding-left:20px;"> &raquo;</span> 
      <a href="user.php?frm=classified_sub_cat_add" class="<?=$tselo?>">Add  Sub-Category</a><br />
      <span style=" color:#FF6600; padding-left:20px;"> &raquo;</span> 
      <a href="user.php?frm=classified_sub_cat_view" class="<?=$tselo?>">View  Sub-Category</a><br />

	  &raquo; <a href="user.php?frm=classified_cat_edit" class="<?=$tselo?>">View/Modify Category</a><br />	  
</span>

	<div class="menutitle" onclick="SwitchMenu('sub1')">Portfoliao Management</div>

	<span class="submenu" id="sub1">


	  &raquo; <a href="user.php?frm=catmodify" class="<?=$tsela?>">Add image</a><br />

	  &raquo; <a href="user.php?frm=pimg_edit" class="<?=$tsela?>">View  image</a><br />
      
  <!--  &raquo; <a href="user.php?frm=hcatmodify" class="<?=$tsela?>">Add Award/event image</a><br />

	  &raquo; <a href="user.php?frm=hpimg_edit" class="<?=$tsela?>">View Award/event image</a><br />

         -------------------------<br/>
    &raquo; <a href="user.php?frm=catadd&id=1" class="<?=$tsela?>">About Suleman khan</a><br />
     &raquo; <a href="user.php?frm=catadd&id=2" class="<?=$tsela?>">About unani</a><br />
  &raquo; <a href="user.php?frm=catadd&id=3" class="<?=$tsela?>">About Atiya herbs</a><br /> 
	</span> -->

	<div class="menutitle" onclick="SwitchMenu('sub15')">Manage Pages</div>

	<span class="submenu" id="sub15">

&raquo; <a href="user.php?frm=page_modify&id=1" class="<?=$tsela?>">About us Page </a><br />
    <!--  &nbsp;&nbsp; <img src="../admin/images/arrows.gif" /> <a href="user.php?frm=page_modify&id=abouttie" class="lnksm">About Tie</a><br /> 
	  &raquo; <a href="user.php?frm=page_modify&id=2" class="lnksm">Privacy Policy Page</a><br />--> 
	  &raquo; <a href="user.php?frm=page_modify&id=2" class="lnksm">Terms & conditions</a><br />	
	  &raquo; <a href="user.php?frm=page_modify&id=3" class="lnksm">Privacy Policy</a><br />
       &raquo; <a href="user.php?frm=page_modify&id=4" class="lnksm">Advertising</a><br />
        &raquo; <a href="user.php?frm=page_modify&id=5" class="lnksm">Donate</a><br />
        &raquo; <a href="user.php?frm=page_modify&id=6" class="lnksm">Feedback</a><br />
        &raquo; <a href="user.php?frm=page_modify&id=7" class="lnksm">Connect</a><br />
        &raquo; <a href="user.php?frm=page_modify&id=8" class="lnksm">Have Fun</a><br />
        &raquo; <a href="user.php?frm=page_modify&id=9" class="lnksm">Stay Together</a><br />
	  <!--&raquo; <a href="user.php?frm=page_modify&id=5" class="lnksm">Q &amp;A Page</a><br />-->	 
		  	  	  	  
	</span>
   <!-- <div class="menutitle" onclick="SwitchMenu('sub201')">Testominal Management</div>
      <span class="submenu" id="sub201">
     &raquo; <a href="user.php?frm=team_add" class="<?=$tselo?>">Add Testominal</a><br />
	  &raquo; <a href="user.php?frm=team_edit" class="<?=$tselo?>">View/Modify Testominal</a><br />	  
	</span>-->
     <div class="menutitle" onclick="SwitchMenu('sub201')">Message Management</div>
      <span class="submenu" id="sub201">
     &raquo; <a href="user.php?frm=msg_details" class="<?=$tselo?>">Message Details</a><br />
	  <!--&raquo; <a href="user.php?frm=team_edit" class="<?=$tselo?>">View/Modify Testominal</a><br />	-->  
	</span>

<div class="menutitle" onclick="SwitchMenu('sub2')">Registration Management</div>

	<span class="submenu" id="sub2">
		  
	     &raquo; <a href="user.php?frm=showalluser" class="<?=$tselc?>">User details</a><br />

	</span>  

  <!--<div class="menutitle" onclick="SwitchMenu('sub3')">Event Management</div>

	<span class="submenu" id="sub3">

	  &raquo; <a href="user.php?frm=event_add" class="<?=$tself?>">Add Event</a><br />
      &raquo; <a href="user.php?frm=event_edit" class="<?=$tself?>">Edit/View Event</a><br />
	  </span>-->   

<div class="menutitle" onclick="SwitchMenu('sub30')">Booked Management</div>

	<span class="submenu" id="sub30">

	  &raquo; <a href="user.php?frm=orderedit" class="<?=$tself?>">Booked Details</a><br />

	  </span>  



  </div> 

  </td>

  </tr>

</table>