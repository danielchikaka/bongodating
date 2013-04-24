<?
 require_once("img_crop2.php");
 $path  = 'slide/';
 $path_thumb  = 'slide/thumb/';
 $dim_requirement = array(280, 314);
 $size_requirement = array(280, 314);

 
 function mysqlexec($cat,$subcat,$type,$amount)
 {
	  echo  $sql_m="insert into tbl_pimg set cat='".$cat."',sub_cat='".$subcat."',type='".$type."',amount='".$amount."',
	  status='yes',
	  date1=now()";

	   mysql_query($sql_m);
	   return  mysql_insert_id();
 
 }
if($_POST['btn_save']=="Submit")
{
	if($_FILES['photo1']['name']!="")
	{
$cat=trim($_POST['catogries']);
$subcat=trim($_POST['sel_sub_cat']);
$type=trim($_POST['type']);
$amount=trim($_POST['other_box']);
	   echo $insertid = mysqlexec($cat,$subcat,$type,$amount);exit;
	 
	$_FILES['photo1']['name'];
	$name = $_FILES['photo1']['name'];
    $filenameext = pathinfo($name, PATHINFO_EXTENSION);
    $size = getimagesize($_FILES['photo1']['tmp_name']);
    $source_pic=$destination_pic=$_FILES['photo1']['tmp_name'];
	
	   
	  
		if($insertid>0)
		{  
		$newname = $insertid.".".$filenameext;  
		
		   if(copy($_FILES['photo1']['tmp_name'],$path.$newname))
			  { 
			     $source_pic1=$destination_pic1= $path.$newname;
				$size1= resize($source_pic1,$destination_pic1,$size,$size_requirement);//Big Image
				 $sq_upd = "update tbl_pimg set pname = '$newname' , title='".addslashes($_POST['title1'])."' where id = $insertid";
				 mysql_query($sq_upd);

				 
				 move_uploaded_file($_FILES['photo1']['tmp_name'],$path_thumb.$newname);// Thumb Image
				 $source_pic3=$destination_pic3= $path_thumb.$newname;
				 resize2($source_pic3,$destination_pic3,$size,array(118, 80));
				
				 $err="Slide Image(s) Added Successfully"; 
			  }
		}
   }
   else 
	{ 
		$err="Please upload at least one image in 1st box."; ?>
		<script>javascript:location.href="user.php?frm=catmodify&err=<?=$err?>";</script><? 
	 }
	
 }
 $sql1=mysql_query("select * from classified_cat where status='Y'");
?>
<script type="text/javascript">
function create_box(val)
{  
	//var pay_mdt = document.getElementById('h_d_u_h_abt_m').value;
	//alert(val);
	if(val=='paid')
	{
var box='<br/><input type="text" name="other_box" id="other_box">';
	 document.getElementById('other_box').innerHTML=box;
	// getScriptPage1(display,val);
	}
	else if(val!='paid')
	{
	//getScriptPage1(display,val);
var box='';
	 document.getElementById('other_box').innerHTML=box;
	}
}
</script>
<table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
  <form action="user.php?frm=catmodify" name="frm_email" method="post" enctype="multipart/form-data" onSubmit="return classified_add_validate(this);">
	
	<tr valign="top"><td align="right">Image</td><td align="left"><input name="photo1" type="file" class="txtfield" /></td></tr>
    <tr><td align="right">Category</td>
  <td><select name="catogries" id="catogries"  style="width:140px;"  onchange="getScriptPage('display','catogries');">
<option value="">--Select--</option>
<?php
while($res =mysql_fetch_assoc($sql1))
{
$id=trim($res['id']);
$name=trim($res['name']);
?>
<option value="<?=$id?>"><?=$name?></option>
<?php
}
?>

</select> </td></tr>
<tr><td align="right">Sub-Category</td>
<td><div align="left" id="display" style="width:140px;">
  
      <select name="sel_sub_cat" id="sel_sub_cat" disabled="disabled"  style="width:140px;" >
        <option value="">Select</option>
      </select>
           
    </div>
      </td></tr> 

<tr><td align="right">Type</td>
<td>
  
      <select name="type" id="type"   style="width:140px;" onchange="create_box(this.value)" >
        <option value="">Select</option>
        <option value="paid">Paid</option>
        <option value="free">Free</option>
      </select>
           
    <span id="other_box"></span>
      </td></tr> 
  <tr align="center" valign="middle"><td height="40" colspan="2">
	  <input name="btn_save" type="submit" class="button2" value="Submit" />
	  <input type="button" class="button2" value="Cancel" onClick="javascript:location.href='user.php?frm=admin_panel';" /></td>
	</tr>
  </form>
  <SCRIPT language=JavaScript type=text/javascript >
function classified_add_validate(frm)
{

  if(frm.catogries.value=="")
  {
    alert("Please select category");
	frm.catogries.focus();
	return false;
  }
 else if(frm.type.value=="")
  {
    alert("Please select free or paid");
	frm.type.focus();
	return false;
  }
   
  else if(frm.sel_sub_cat.value=="not")
  {
    alert("Please select another category");
	frm.catogries.focus();
	return false;
  }
 
 
  return true;
}

</SCRIPT>
</table>
