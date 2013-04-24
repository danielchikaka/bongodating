<? 
session_start();
include("../config/db_connect.php");	
require_once("../includes/class.paging.php");
require_once("../classes/functions.php");
if($_SESSION['admin'] == ""){
  ?> <script>javascript:location.href="index.php?err=SignIn";</script> <? 
}
if($_POST['btn_submit'] == "Submit"){
  $sql="insert into users_tbl set 
  u_fname='".addslashes($_POST['t_fname'])."', 
  u_lname='".addslashes($_POST['t_lname'])."', 
  u_email='".addslashes($_POST['t_email'])."',
  u_details='".addslashes($_POST['t_details'])."',
  u_username='".addslashes($_POST['t_username'])."',
  u_password='".addslashes($_POST['t_password'])."',
  is_active='Y'";
  if(mysql_query($sql)){
    ?><script>javascript:location.href="index.php?smsg=<?=$msg_insert?>";</script><? }
}
$pg_title="&nbsp;"; 
$tsela="txtother"; $tselb="txtother"; $tselc="txtother"; $tseld="txtother"; $tsele="txtother"; $tself="txtother"; 
$tselg="txtother"; $tselh="txtother"; $tseli="txtother"; $tselj="txtother"; $tselk="txtother"; $tsell="txtother"; 
$tselm="txtother"; $tseln="txtother"; $tselo="txtother"; $tselp="txtother"; $tsel4="txtother";
if($_REQUEST['frm'] == "admin_settings"){ $pg_title="Change Password"; $fsub=""; }

else if($_REQUEST['frm'] == "pimg_edit"){ $pg_title="Modify  image"; $fsub="sub1"; $tselb="txtsel"; }
else if($_REQUEST['frm'] == "catmodify"){ $pg_title="Add image"; $fsub="sub1"; $tselb="txtsel"; }

else if($_REQUEST['frm'] == "hpimg_edit"){ $pg_title="View Award/event image"; $fsub="sub1"; $tselb="txtsel"; }
else if($_REQUEST['frm'] == "hcatmodify"){ $pg_title="Add Award/event image"; $fsub="sub1"; $tselb="txtsel"; }
else if($_REQUEST['frm'] == "catadd"){ $pg_title="About Suleman khan"; $fsub="sub1"; $tselb="txtsel"; }


else if($_REQUEST['frm'] == "banner_add"){ $pg_title="Add Banner Advertisement"; $fsub="sub16"; $tsela="txtsel"; }
else if($_REQUEST['frm'] == "banner_edit"){ $pg_title="Add Banner Advertisement"; $fsub="sub16"; $tsela="txtsel"; }
else if($_REQUEST['frm'] == "banner_modify"){ $pg_title="Add Banner Advertisement"; $fsub="sub16"; $tsela="txtsel"; }
else if($_REQUEST['frm'] == "banner_code"){ $pg_title="Banner Codes"; $fsub="sub16"; $tsela="txtsel"; }
else if($_REQUEST['frm'] == "banner_tracks"){ $pg_title="Banner Track Reports"; $fsub="sub16"; $tsela="txtsel"; }
else if($_REQUEST['frm'] == "track_list"){ $pg_title="Banner Track Reports"; $fsub="sub16"; $tsela="txtsel"; }

else if($_REQUEST['frm'] == "pcatadd"){ $pg_title="Add Category"; $fsub="sub12"; $tsela="txtsel"; }
else if($_REQUEST['frm'] == "pcatedit"){ $pg_title="Edit Category"; $fsub="sub12"; $tsela="txtsel"; }
else if($_REQUEST['frm'] == "pcatmodify"){ $pg_title="Modify Category"; $fsub="sub12"; $tsela="txtsel"; }
else if($_REQUEST['frm'] == "pimg_add"){ $pg_title="Add Product Image"; $fsub="sub12"; $tsela="txtsel"; }
else if($_REQUEST['frm'] == "pimg_edit"){ $pg_title="Edit Product Image"; $fsub="sub12"; $tsela="txtsel"; }
else if($_REQUEST['frm'] == "pimg_modify"){ $pg_title="Modify Product Image"; $fsub="sub12"; $tsela="txtsel"; }

else if($_REQUEST['frm'] == "showalluser"){ $pg_title="Show all users"; $fsub="sub2"; $tselc="txtsel"; }
else if($_REQUEST['frm'] == "event_add"){ $pg_title="Add Event"; $fsub="sub3"; $tseld="txtsel"; }
else if($_REQUEST['frm'] == "event_edit"){ $pg_title="Edit/View Event"; $fsub="sub3"; $tsele="txtsel"; }
else if($_REQUEST['frm'] == "orderview"){ $pg_title="View Order"; $fsub="sub2"; $tsele="txtsel"; }
else if($_REQUEST['frm'] == "update_sadhak"){ $pg_title="Modify User"; $fsub="sub2"; $tsele="txtsel"; }
else if($_REQUEST['frm'] == "orderedit"){ $pg_title="Show all Booked"; $fsub="sub30"; $tselc="txtsel"; }
else if($_REQUEST['frm'] == "member"){ $pg_title="View/Edit Member"; $fsub="sub5"; $tself="txtsel"; }
else if($_REQUEST['frm'] == "auction_edit"){ $pg_title="Edit Auction"; $fsub="sub5"; $tselg="txtsel"; }
else if($_REQUEST['frm'] == "event_modify"){ $pg_title="Modify Event"; $fsub="sub3"; $tselg="txtsel"; }

else if($_REQUEST['frm'] == "view_trans"){ $pg_title="All Undelivered Orders"; $fsub="sub4"; $tselh="txtsel"; }
else if($_REQUEST['frm'] == "view_trans_d"){ $pg_title="All Delivered Orders"; $fsub="sub4"; $tseli="txtsel"; }
else if($_REQUEST['frm'] == "exp_trans"){ $pg_title="Export Transactions"; $fsub="sub4"; $tsel4="txtsel"; }

else if($_REQUEST['frm'] == "do_payments"){ $pg_title="Payment for Delivered Orders"; $fsub="sub7"; $tselj="txtsel"; }
else if($_REQUEST['frm'] == "undo_payments"){ $pg_title="Undo Payments Done"; $fsub="sub7"; $tselk="txtsel"; }

else if($_REQUEST['frm'] == "pending_withdraw"){ $pg_title="Pending Withdrawls"; $fsub="sub8"; $tsell="txtsel"; }
else if($_REQUEST['frm'] == "paid_withdraw"){ $pg_title="Paid Withdrawls"; $fsub="sub8"; $tselm="txtsel"; }

else if($_REQUEST['frm'] == "online_support"){ $pg_title="Online Support (Service Requests)"; $fsub="sub9"; $tseln="txtsel"; }
else if($_REQUEST['frm'] == "os_reply"){ $pg_title="Reply Online Support (Service Requests)"; $fsub="sub9"; $tseln="txtsel"; }
else if($_REQUEST['frm'] == "sel_reply"){ $pg_title="All Replies of selected Online Support (Service Requests)"; $fsub="sub9"; $tseln="txtsel"; }

else if($_REQUEST['frm'] == "credit_appl"){ $pg_title="Credit Applications"; $fsub="sub11"; $tselo="txtsel"; }
else if($_REQUEST['frm'] == "credit_appl_view"){ $pg_title="Credit Application Details"; $fsub="sub11"; $tselo="txtsel"; }

else if($_REQUEST['frm'] == "sponser_add"){ $pg_title="Add Sponser"; $fsub="sub6"; $tselp="txtsel"; }
else if($_REQUEST['frm'] == "sponser_edit"){ $pg_title="Edit/View Sponser"; $fsub="sub6"; $tselp="txtsel"; }
else if($_REQUEST['frm'] == "sponser_modify"){ $pg_title="Modify Sponser"; $fsub="sub6"; $tselp="txtsel"; }
else if($_REQUEST['frm'] == "page_modify"){ $pg_title="Modify Page Content"; $fsub="sub15"; $tsel14="txtsel"; }

else if($_REQUEST['frm'] == "classified_cat_add"){ $pg_title="Add  Catogry"; $fsub="sub203"; $tsel14="txtsel"; }
else if($_REQUEST['frm'] == "classified_sub_cat_add"){ $pg_title="Add  Sub-Catogry"; $fsub="sub203"; $tsel14="txtsel"; }
else if($_REQUEST['frm'] == "classified_sub_cat_view"){ $pg_title="View Sub-Catogry"; $fsub="sub203"; $tsel14="txtsel"; }
else if($_REQUEST['frm'] == "classified_cat_edit"){ $pg_title="View/Modify  Catogry"; $fsub="sub203"; $tsel14="txtsel"; }
else if($_REQUEST['frm'] == "classified_cat_modify"){ $pg_title="Modify  Catogry"; $fsub="sub203"; $tsel14="txtsel"; }

else if($_REQUEST['frm'] == "team_add"){ $pg_title="Testominal Add"; $fsub="sub201"; $tsel14="txtsel"; }
else if($_REQUEST['frm'] == "team_edit"){ $pg_title="Modify/Edit Testominal"; $fsub="sub201"; $tsel14="txtsel"; }
else if($_REQUEST['frm'] == "team_modify"){ $pg_title="Modify Testominal"; $fsub="sub201"; $tsel14="txtsel"; }
else if($_REQUEST['frm'] == "global_settings"){ $pg_title="Global Settings"; }
else if($_REQUEST['frm'] == "paypal_settings"){ $pg_title="PayPal Settings"; }

else if($_REQUEST['frm'] == "banner_list"){ $pg_title="Manage Home Page Banner"; }
else if($_REQUEST['frm'] == "banner_add"){ $pg_title="Add Home Page Banner"; }
else if($_REQUEST['frm'] == "banner_edit"){ $pg_title="Edit Home Page Banner"; }

else if($_REQUEST['frm'] == "state_list"){ $pg_title="Manage State"; }
else if($_REQUEST['frm'] == "state_add"){ $pg_title="Add State"; }
else if($_REQUEST['frm'] == "state_edit"){ $pg_title="Edit State"; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME; ?></title>
<meta name="description" content="<?php echo SITE_DESCRIPTION; ?>"/>
<meta name="keywords" content="<?php echo SITE_KEYWORD; ?>"/>
<!--main css-->
<link rel="shortcut icon" type="image/x-icon" href="../images/logo/<?php echo SITE_FAVICON; ?>"/>
<link href="templates/default/css/main.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
body { scrollbar-face-color:#C6BAA4; scrollbar-highlight-color:#FFFFFF; scrollbar-3dlight-color:#F3F0EB; scrollbar-darkshadow-color:#FFFFFF; scrollbar-shadow-color: #808080; scrollbar-arrow-color:#FFFFFF; scrollbar-track-color:#FFFFFF
}
-->
</style>

<script type="text/javascript" src="js/ajax.js"></script>
<script language="javascript">
function showme(id,id1) {
  if(id=='all'){
	document.getElementById('shw').style.visibility="none";
	document.getElementById('shw').style.visibility="hidden";
	document.getElementById('detail').style.display="none";
    document.getElementById('detail').style.visibility="hidden";
	document.getElementById('all').style.display="block";
	document.getElementById('all').style.visibility="visible";
  }
}

function submitform() {
	document.myform.submit();
}


var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;
}
checkflag = "true";
}
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false;
}
checkflag = "false";
}
}




</script>
<script language="javascript" type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script language="javascript" type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">

<?
if($_GET['frm']=="page_modify" )
{
?>
tinyMCE.init({
		mode : "exact",
		elements : "pc_TR_body",
		theme : "advanced",
		plugins : "paste",

		theme_advanced_buttons3_add : "fontselect,fontsizeselect",
		theme_advanced_buttons3_add_before: "cut,copy,paste,pastetext,pasteword,separator",
		theme_advanced_buttons1_add : "separator,forecolor,backcolor",

		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		content_css : "example_full.css",
	    plugin_insertdate_dateFormat : "%Y-%m-%d",
	    plugin_insertdate_timeFormat : "%H:%M:%S",
		extended_valid_elements : "hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
		external_link_list_url : "example_link_list.js",
		external_image_list_url : "example_image_list.js",
		flash_external_list_url : "example_flash_list.js",
		file_browser_callback : "fileBrowserCallBack",
		theme_advanced_resize_horizontal : false,
		theme_advanced_resizing : false
});
<?
}
?>

</script>
<script language="javascript" type="text/javascript"  src="js/gen_validatorv2.js"></script>
<script type="text/javascript">
   function doblank(element) {
     if (element.value == element.defaultValue) {
       element.value = '';
     }
   }
   function myBlur(element) {
     if (element.value == '') {
       element.value = element.defaultValue;
     }
   }
</script>
<script language="javascript" type="text/javascript">
function sh(did)
{
	if(document.getElementById(did).style.visibility=="hidden")
		{
		document.getElementById(did).style.visibility="visible";
		document.getElementById(did).style.display="block";
		}
	else
		{
		document.getElementById(did).style.visibility="hidden";
		document.getElementById(did).style.display="none";

		}
}
</script>

</HEAD>
<body class="body" leftMargin=0 topMargin=0 marginheight="0" marginwidth="0" onLoad="SwitchMenu('<?=$fsub?>')">

<table width="100%" height="95%" border="0" cellspacing="1" cellpadding="0" align="center" style="margin-top:15px;"> 
  <tr valign="top"><td>
    <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center"> 
			  <tr valign="top"><td>
			    <table width="90%" height="100%" border="0" cellspacing="0" cellpadding="1" align="center">
		          <tr valign="middle">
				    <td align="left" colspan="2"><div id="header">
  <h1 id="innerlogo" class="fl"><a href="user.php?frm=admin_panel"><img src="../images/logo/<?php echo SITE_LOGO ; ?>"> </a></h1>

<div id="login">     <? 
					if($_SESSION['admin'] != ""){ ?>
					  <table width="100%" align="center" cellspacing="0" cellpadding="0" border="0">
					    <tr valign="middle">
                        <td align="left">Welcome, <strong><?=$_SESSION['admin_name']?></strong></td>
						  <td align="right" style="padding-right:2px;">
							<a href="#" onClick="javascript:location.href='user.php?frm=admin_settings';">Change Password</a>
							|
							<a href="#" onClick="javascript:location.href='index.php?err=LogOut';">Logout</a>
						  </td>
						</tr>
					  </table>
					<? }
					else{ print "&nbsp;"; } ?>
     </div>
<!--  <div class="clr"></div>-->


  <div id="globalNav1">
    <ul class="topnav1" id="jsddm">
      <li class="first"><a href="#"  >Manage Pages</a>
      <ul>
          <li><a href="user.php?frm=page_modify&id=1" class="<?=$tsela?>">About us Page </a></li>
          <li><a href="user.php?frm=page_modify&id=2" class="lnksm">Terms & conditions</a></li>
          <li><a href="user.php?frm=page_modify&id=3" class="lnksm">Privacy Policy</a></li>
          <li><a href="user.php?frm=page_modify&id=4" class="lnksm">Advertising</a></li>
          <li><a href="user.php?frm=page_modify&id=5" class="lnksm">Donate</a></li>
          <li><a href="user.php?frm=page_modify&id=6" class="lnksm">Feedback</a></li>
          <li><a href="user.php?frm=page_modify&id=7" class="lnksm">First Footer Area</a></li>
          <li><a href="user.php?frm=page_modify&id=8" class="lnksm">Second Footer Area</a></li>
          <li><a href="user.php?frm=page_modify&id=9" class="lnksm">Third Footer Area</a></li>
        </ul>
        </li>
      <li><a href="#" >Message Management</a>
      <ul>
          <li><a href="user.php?frm=msg_details" class="<?=$tselo?>">Message Details</a></li>
      </ul>
      </li>
      <li><a href="#" >Registration Management</a>
        <ul>
          <li><a href="user.php?frm=showalluser" class="<?=$tselc?>">User details</a></li>
        </ul>
      </li>
      <li><a href="#" >Booked Management</a>
        <ul>
          <li><a href="user.php?frm=orderedit" class="<?=$tself?>">Booked Details</a></li>
        </ul>
      </li>
      <li><a href="#" >Settings</a>
        <ul>	
          <li><a href="#" onClick="javascript:location.href='user.php?frm=state_list';">Manage State</a></li>
          <li><a href="#" onClick="javascript:location.href='user.php?frm=banner_list';">Manage Home Banner</a></li>
          <li><a href="#" onClick="javascript:location.href='user.php?frm=global_settings';">Global Setting</a></li>
          <li><a href="#" onClick="javascript:location.href='user.php?frm=paypal_settings';">PayPal Setting</a></li>
          <li><a href="#" onClick="javascript:location.href='user.php?frm=admin_settings';">Change Password</a></li>
          <li><a href="#" onClick="javascript:location.href='index.php?err=LogOut';">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="clr"></div>
</div></td>
				  </tr>
				  <tr valign="top"><td colspan="2" width="100%">
                    <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0" align="center"> 
  					<tr valign="top">
                   
				    <td width="84%" class="" style="letter-spacing:0.5;">
                    <div style="margin:0px auto;"><table width="100%" align="center" cellspacing="0" cellpadding="0" border="0"  >
                    <tr valign="top"> 
					<td width="84%" align="center" class="cbtn" style="letter-spacing:1"><strong><? print $pg_title; ?></strong></td>
                    </tr>
					<? 
					  if($_REQUEST['err'] != ""){ 
						print "<tr valign='middle'><td align='center' class='errmsg' height='16'>".$_REQUEST['err']."</td></tr>";
					  } ?> 
						<tr valign="top"><td style="margin-top:20px;">
						<? 
						$filename = $_GET[frm].".php";
						require_once($filename); 
						?> </td></tr>
					  </table></div>
                    
                    </td>
                    </tr></table>
                    </td>
				  </tr>
			     
				</table></td>
			  </tr>
			</table></td>
  </tr>
  <tr valign="middle" height="40px;" align="center"><td align="center" ><div id="footerwrap" align="center" >&copy; Copyright <? //echo date("Y")?> <?PHP echo SITE_COPYRIGHT;?>. All rights reserved. &nbsp;&nbsp;&nbsp;&nbsp;Developed by : <a href="http://www.softechproducts.us">Softech Products</a></div></td></tr>
</table>
</body>
</html>
