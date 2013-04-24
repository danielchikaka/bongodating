<?
session_start();
include("../includes/config.php");	
require_once("../includes/class.paging.php");
require_once("../classes/functions.php");

?>
<html>
<head>
<LINK href="../css/style.css" rel=stylesheet type=text/css>
<title>Choose Image</title>
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-weight: bold;
}
-->
</style>
<script>
function submitform() {
	document.myform.submit();
}
function insertimg(imgname)
{
	var imgn = imgname;
	opener.window.document.forms['frm_email'].elements['photo'].value = imgn;

	self.close();
}
</script>
</head>
<body>
<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
<tr valign="top"><td>
	    <form name="myform" method="post" action="chooseimages.php">
		  <table width="100%" align="center" cellspacing="1" cellpadding="1" border="0">
		    <tr valign="middle">
			  <td width="22%" align="left"><strong>Select Category</strong></td>
			  <td width="78%" align="left">
			    <select class="txtfield" name="sel_cat" onchange="submitform()">
				<? 
				print "<option value=''>All Categories</option>";
				$sqld="select * from tbl_pcat order by pcat_name";
				$qryd=mysql_query($sqld);
				while($rowd=mysql_fetch_object($qryd)){
				  if($rowd->pcat_id == $_REQUEST['sel_cat']) $sel="selected"; else $sel="";
				  print "<option value='".$rowd->pcat_id."' $sel>".$rowd->pcat_name."</option>";
				}
				?>
				</select>
				<input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
			  </td>
			</tr>
		  </table>
		</form>

</td></tr>

<tr>
  <td height="40" align="left"><span class="hdrbtn">Click on the image to select as default </span></td>
</tr>
  <tr valign="top">
    <td><table width="100%"><tr><td>
		<?
		$sql="select * from tbl_pimg";
		if($_REQUEST['sel_cat'] != ""){
		 $sql .= " where cid = '".$_REQUEST['sel_cat']."'";
		}
		$sql .= " order by pid";
		$qry_pgs = mysql_query($sql);

		while($a_row=mysql_fetch_object($qry_pgs))
		{
		  $id=$a_row->pid;
		  print "<div style='float:left;width:150px;height:150px;'>";
		  ?>
		  <a href="javascript:;;" onclick="javascript:insertimg('<?=$a_row->pname?>');">
		  <?
		  print "<img src='product_view.php?w=120&gen=".$a_row->pname."&pic=".$a_row->pname."' border='0' align='center' vspace='5'>";
		  ?>
		  </a>
		  <?
		  print "</div>";
		} 

		print "<div style='clear:both;'></div>";
		print "<hr>";
		print "<div align=center>";

		$sql2="select * from up_images where prdt = '".$_REQUEST['id']."'";
		$qry_pgs2 = mysql_query($sql2);

		while($a_row2=mysql_fetch_object($qry_pgs2))
		{
		  if($a_row2->pro_image1!="")
		  {
		  print "<div style='float:left;width:150px;height:150px;'>";
		  ?>
		  <a href="javascript:;;" onclick="javascript:insertimg('<?=$a_row2->pro_image1?>');">
		  <?
		  print "<img src='product_view.php?w=120&gen=".$a_row2->pro_image1."&pic=".$a_row2->pro_image1."' border='0' align='center' vspace='5'>";
		  ?>
		  </a>
		  <?
		  print "</div>";
		  }
			if($a_row2->pro_image2!="")
		  {
		  print "<div style='float:left;width:150px;height:150px;'>";
		  ?>
		  <a href="javascript:;;" onclick="javascript:insertimg('<?=$a_row2->pro_image2?>');">
		  <?
		  print "<img src='product_view.php?w=120&gen=".$a_row2->pro_image2."&pic=".$a_row2->pro_image2."' border='0' align='center' vspace='5'>";
		  ?>
		  </a>
		  <?
		  print "</div>";
		  }
		   if($a_row2->pro_image3!="")
		  {
		  print "<div style='float:left;width:150px;height:150px;'>";
		  ?>
		  <a href="javascript:;;" onclick="javascript:insertimg('<?=$a_row2->pro_image3?>');">
		  <?
		  print "<img src='product_view.php?w=120&gen=".$a_row2->pro_image3."&pic=".$a_row2->pro_image3."' border='0' align='center' vspace='5'>";
		  ?>
		  </a>
		  <?
		  print "</div>";
		  }
		   if($a_row2->pro_image4!="")
		  {
		  print "<div style='float:left;width:150px;height:150px;'>";
		  ?>
		  <a href="javascript:;;" onclick="javascript:insertimg('<?=$a_row2->pro_image4?>');">
		  <?
		  print "<img src='product_view.php?w=120&gen=".$a_row2->pro_image4."&pic=".$a_row2->pro_image4."' border='0' align='center' vspace='5'>";
		  ?>
		  </a>
		  <?
		  print "</div>";
		  }
		} 

		
		print "</div>";
		?>
	  </td></tr>
	  </table>
	</td>
  </tr>
  <tr><td align="center">
	<input name="btn_close" type="button" value="Close" class="button2" onclick="javascript:self.close();">
</td>
  </tr>

</table>
</body>
</html>