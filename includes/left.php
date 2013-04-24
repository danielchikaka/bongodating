<style type="text/css">
.menutitle{
font-family:Arial;
font-size:11px;
cursor:pointer;
margin-bottom: 5px;
background-color:#2c2a38;
color:#F8FFF4;
width:140px;
height:18px;
padding-top:2px;
text-align:center;
font-weight:bold;
border:1px solid #333333;
}
.submenu{
margin-bottom: 0.5em;
font-family:verdana;
font-size:10px;
}
</style>

<script type="text/javascript">

/***********************************************
* Switch Menu script- by Martial B of http://getElementById.com/
* Modified by Dynamic Drive for format & NS4/IE4 compatibility
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var persistmenu="yes" //"yes" or "no". Make sure each SPAN content contains an incrementing ID starting at 1 (id="sub1", id="sub2", etc)
var persisttype="sitewide" //enter "sitewide" for menu to persist across site, "local" for this page only

if (document.getElementById){ //DynamicDrive.com change
document.write('<style type="text/css">\n')
document.write('.submenu{display: none;}\n')
document.write('</style>\n')
}

function SwitchMenu(obj){
	if(document.getElementById){
	var el = document.getElementById(obj);
	var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change
		if(el.style.display != "block"){ //DynamicDrive.com change
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") //DynamicDrive.com change
				ar[i].style.display = "none";
			}
			el.style.display = "block";
		}else{
			el.style.display = "none";
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
if (cookievalue!="")
document.getElementById(cookievalue).style.display="block"
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="left">
    <td valign="middle" colspan="3" class="greyb" style="padding-left:30px;"> <h2>Admin Menu </h2></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><!-- Keep all menus within masterdiv-->
        <div id="masterdiv">
          
		  <div class="menutitle" onclick="SwitchMenu('sub1')">Manage Admin</div>
          <span class="submenu" id="sub1"> 
				<strong>&raquo;</strong> <a href="up_password.php">Modify Password</a> 
		  </span>
			  
		  <div class="menutitle" onclick="SwitchMenu('sub2')">Manage Categories </div>
          <span class="submenu" id="sub2"> 
			  <strong>&raquo;</strong> <a href="addcat.php">Add Category </a> <br>
			  ----------------------------<br>
			  <strong>&raquo;</strong> <a href="up_cat.php">Edit/Delete Category </a>
		  </span>
         
		  <div class="menutitle" onclick="SwitchMenu('sub3')">Manage Products </div>
          <span class="submenu" id="sub3"> 
			  <strong>&raquo;</strong> <a href="addpro.php">Add Product</a> <br>
			  ----------------------------<br>			  
			  <strong>&raquo;</strong> <a href="up_template.php?listing=1">Edit/Delete Product(s)</a> 
		  </span>

          <div class="menutitle" onclick="SwitchMenu('sub4')">Manage Users </div>
          <span class="submenu" id="sub4"> 
			  <strong>&raquo;</strong> <a href="up_users.php">Edit/Delete User(s)</a> 
		  </span>
          
		  <div class="menutitle" onclick="SwitchMenu('sub5')">Manage Transactions </div>
          <span class="submenu" id="sub5"> 
				<strong>&raquo;</strong> <a href="view_trans.php">View Undelivered Orders</a><br>
			  ----------------------------<br>				
				<strong>&raquo;</strong> <a href="view_trans_d.php">View Delivered Orders</a> 
		  </span>
          
       
		
		<div class="menutitle" onclick="SwitchMenu('sub25')">Log Out</div>
        <span class="submenu" id="sub25"> 
			<strong>&raquo;</strong> <a href="login.php?err=LogOut">Logout</a> 
		</span> 
	</div></td>
    <td>&nbsp;</td>
  </tr>
</table>
