<?
 require_once("img_crop2.php");
 $path_thumb  = 'media/';
 
 function mysqlexec()
 {
	   $sql_m="insert into home_img set 
	  status='yes',
	  date1=now()";

	   mysql_query($sql_m);
	   return  mysql_insert_id();
 
 }
if($_POST['btn_save']=="Submit")
{
	if($_FILES['photo1']['name']!="")
	{

	   $insertid = mysqlexec();
	 
	$_FILES['photo1']['name'];
	$name = $_FILES['photo1']['name'];
    $filenameext = pathinfo($name, PATHINFO_EXTENSION);
    $size = getimagesize($_FILES['photo1']['tmp_name']);
    $source_pic=$destination_pic=$_FILES['photo1']['tmp_name'];
	
	   
	  
		if($insertid>0)
		{  
		$newname = $insertid.".".$filenameext;  
		
		   if(copy($_FILES['photo1']['tmp_name'],$path_thumb.$newname))
			  { 
			    $source_pic1=$destination_pic1= $path.$newname;
				//$size1= resize($source_pic1,$destination_pic1,$size,$size_requirement);//Big Image
				 $sq_upd = "update home_img set pname = '$newname' where id = $insertid";
				 mysql_query($sq_upd);

				 
				 move_uploaded_file($_FILES['photo1']['tmp_name'],$path_thumb.$newname);// Thumb Image
				 $source_pic3=$destination_pic3= $path_thumb.$newname;
				 $size3 = resize3($source_pic3,$destination_pic3,$size,array(400, 270));
				
				 $err="Slide Image(s) Added Successfully"; 
			  }
		}
   }
   else 
	{ 
		$err="Please upload at least one image in 1st box."; ?>
		<script>javascript:location.href="user.php?frm=hcatmodify&err=<?=$err?>";</script><? 
	 }
	
  if($_FILES['photo2']['name']!="")
  {
	

	  $insertid2 = mysqlexec();
	 
	$_FILES['photo2']['name'];
	$name = $_FILES['photo2']['name'];
    $filenameext = pathinfo($name, PATHINFO_EXTENSION);
    $size = getimagesize($_FILES['photo2']['tmp_name']);
    $source_pic=$destination_pic=$_FILES['photo2']['tmp_name'];
	
	   
	  
		if($insertid2>0)
		{  
		$newname = $insertid2.".".$filenameext;  
		
		   if(copy($_FILES['photo2']['tmp_name'],$path_thumb.$newname))
			  { 
			     $source_pic1=$destination_pic1= $path.$newname;
				//$size1= resize($source_pic1,$destination_pic1,$size,$size_requirement);//Big Image
				 $sq_upd = "update home_img set pname = '$newname' where id = $insertid2";
				 mysql_query($sq_upd);

				 
				 move_uploaded_file($_FILES['photo2']['tmp_name'],$path_thumb.$newname);// Thumb Image
				 $source_pic3=$destination_pic3= $path_thumb.$newname;
				 $size3 = resize3($source_pic3,$destination_pic3,$size,array(400, 270));
				
				 $err="Slide Image(s) Added Successfully"; 
			  }
		}
	}

	if($_FILES['photo3']['name']!="")
	{


	  $insertid3 = mysqlexec();
	 
	$name = $_FILES['photo3']['name'];
    $filenameext = pathinfo($name, PATHINFO_EXTENSION);
    $size = getimagesize($_FILES['photo3']['tmp_name']);
    $source_pic=$destination_pic=$_FILES['photo3']['tmp_name'];
	
	   
	  
		if($insertid3>0)
		{  
		$newname = $insertid3.".".$filenameext;  
		
		   if(copy($_FILES['photo3']['tmp_name'],$path.$newname))
			  { 
			     $source_pic1=$destination_pic1= $path.$newname;
				//$size1= resize($source_pic1,$destination_pic1,$size,$size_requirement);//Big Image
				 $sq_upd = "update home_img set pname = '$newname' where id = $insertid3";
				 mysql_query($sq_upd);
				   

				 
				 move_uploaded_file($_FILES['photo3']['tmp_name'],$path_thumb.$newname);// Thumb Image
				 $source_pic3=$destination_pic3= $path_thumb.$newname;
				 $size3 = resize3($source_pic3,$destination_pic3,$size,array(400, 270));
				
				 $err="Slide Image(s) Added Successfully"; 
			  }
		}
	}
	
	 ?><script>javascript:location.href="user.php?frm=hcatmodify&err=<?=$err?>";</script><? 
	
}

?>

<table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
  <form action="user.php?frm=hcatmodify" name="frm_email" method="post" enctype="multipart/form-data">
	
	<tr valign="top"><td align="right">Image</td><td align="left"><input name="photo1" type="file" class="txtfield" /></td></tr> 
	<tr valign="top"><td align="right">Image</td><td align="left"><input name="photo2" type="file" class="txtfield" /></td></tr> 
	<tr valign="top"><td align="right">Image</td><td align="left"><input name="photo3" type="file" class="txtfield" /></td></tr> 

  <tr align="center" valign="middle"><td height="40" colspan="2">
	  <input name="btn_save" type="submit" class="button2" value="Submit" />
	  <input type="button" class="button2" value="Cancel" onClick="javascript:location.href='user.php?frm=admin_panel';" /></td>
	</tr>
  </form>
  <SCRIPT language=JavaScript type=text/javascript>
  //You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("frm_email");
  frmvalidator.addValidation("sel_cat","dontselect=0","Please Select Category");  
  </SCRIPT>
</table>
