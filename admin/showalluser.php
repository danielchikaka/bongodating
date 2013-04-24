<?
if($_REQUEST['btn_delete']=="Delete"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){
	
		$sql_img = mysql_query( " select * from user_images where user_id = '".$id."' ");
		while($img_sql = mysql_fetch_array($sql_img))
		{
			$large_image_location = "../images/user_images/".$img_sql['user_image'];
			$thumb_image_location = "../images/user_images/smallthumb/".$img_sql['user_image'];
			$bigthumb_image_location = "../images/user_images/bigthumb/".$img_sql['user_image'];
			if (file_exists($large_image_location)) {
				@unlink($large_image_location);
			}
			if (file_exists($thumb_image_location)) {
				@unlink($thumb_image_location);
			}
			if (file_exists($bigthumb_image_location)) {
				@unlink($bigthumb_image_location);
			}
			
			mysql_query( " delete from user_images where user_id = '".$id."' ");
		}
		
		
		$img_sql_us = mysql_fetch_array(mysql_query( " select * from user where user_id = '".$id."' "));
		$large_image_location_us = "../images/user_images/".$img_sql_us['user_image'];
		$thumb_image_location_us = "../images/user_images/smallthumb/".$img_sql_us['user_image'];
		$bigthumb_image_location_us = "../images/user_images/bigthumb/".$img_sql_us['user_image'];
		if (file_exists($large_image_location_us)) {
			@unlink($large_image_location_us);
		}
		if (file_exists($thumb_image_location_us)) {
			@unlink($thumb_image_location_us);
		}
		if (file_exists($bigthumb_image_location_us)) {
			@unlink($bigthumb_image_location_us);
		}
		
	//echo "delete from user where user_id='$id'"; die;
	 	 $sql1="delete from user where user_id='$id'";
		 $sql2="delete from user_info where user_id='$id'";
	 $rs1=mysql_query($sql1); 
	 $rs12=mysql_query($sql2); 
	  $err="User(s) Deleted Successfully !!"; 
	} 
	
  } ?><script>javascript:location.href="user.php?frm=showalluser&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Activate"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){ 
	 $sql="update user set status='1' where user_id='$id'"; 
	  $rs=mysql_query($sql);
	  $err="User(s) Activated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=showalluser&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Deactivate"){ 
  if(is_array($_REQUEST['chk_id'])){
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update user set status='0' where user_id='$id'"; 
	  $rs=mysql_query($sql); 
 
	  $err="User(s) DeActivated Successfully !!"; 
	} 
	
  } ?><script>javascript:location.href="user.php?frm=showalluser&err=<?=$err?>";</script><? 
}



if($_REQUEST['btn_delete']=="Paid User"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){ 
	 $sql="update user set memtype='1' where user_id='$id'"; 
	  $rs=mysql_query($sql);
	  $err="User(s) Paid Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=showalluser&err=<?=$err?>";</script><? 
}

if($_REQUEST['btn_delete']=="Unpaid User"){ 
  if(is_array($_REQUEST['chk_id'])){
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update user set memtype='0' where user_id='$id'"; 
	  $rs=mysql_query($sql); 
 
	  $err="User(s) Unpaid Successfully !!"; 
	} 
	
  } ?><script>javascript:location.href="user.php?frm=showalluser&err=<?=$err?>";</script><? 
}
?>



<div id="name_list">
<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">

  <form name="frmvincent" method="post" action="user.php?frm=showalluser" enctype="multipart/form-data"> 
  <tr valign="top">
    <td>
	
	  <table width="97%" border="0" align="center" cellpadding="1" cellspacing="1">
	    <tr valign="middle" bgcolor="#f2f2f2" height="25">
		  <td align="center" class="hdrbtn" width="2%">
		    <input type="checkbox" name="chk_all" onClick="check(document.frmvincent)"></td>
		 <td class="hdrbtn" width="3%" align="center" nowrap="nowrap"><strong>Edit</strong></td>
		  <!--<td class="hdrbtn" width="9%" align="center" nowrap="nowrap"><strong>Facebook Id</strong></td>-->
		  <!--<td width="5%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Name</strong></td>-->
          <td width="8%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Username</strong></td>
          <!--<td width="4%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Class</strong></td>-->
		    <td class="hdrbtn" width="5%"><strong>Email</strong></td>
		    <td class="hdrbtn" width="7%"><strong>password</strong></td>
		    <td class="hdrbtn" width="7%"><strong>DOB</strong></td>
		   
		    <td class="hdrbtn" width="8%"><strong>Gender</strong></td>
		    <td class="hdrbtn" width="5%"><strong>City</strong></td>
		    <td class="hdrbtn" width="4%"><strong>Ethnicity</strong></td>
		    <td class="hdrbtn" width="8%"><strong>Country</strong></td>
            <td class="hdrbtn" width="7%"><strong>Member type</strong></td>
            <td class="hdrbtn" width="7%"><strong>Reg. Date</strong></td>
		    <!--<td class="hdrbtn" align="center" width="7%">Pin</td>-->
            <!--<td class="hdrbtn" align="center" width="7%">Payment from</td>
            <td class="hdrbtn" align="center" width="7%">Event</td>-->
		    <td class="hdrbtn" align="center" width="5%"><strong>Status</strong></td>
	    </tr>
		<?
		$t_rec=25;
		 $sql="select * from user ";
		
		$sql .= " order by user_id";
		//echo $sql; die;
		$qry_pgs = mysql_query($sql);
		$tot_num_appt = mysql_num_rows($qry_pgs);
		$tot_pgs = (mysql_num_rows($qry_pgs))/$t_rec;
		$tot_pgs = $tot_pgs+1;
		$strt=$_REQUEST['strt'];
		if($strt != ""){$pgs=" limit ".$strt.",$t_rec";} else{$pgs=" limit 0,$t_rec";}
		
	 $sql = $sql.$pgs; 
		$rs=mysql_query($sql);
		$cnt=0;
		while($a_row=mysql_fetch_assoc($rs)){
		  $id=$a_row['user_id'];
		  //echo "select countryName from country where rowId='".$a_row['user_country']."'"; die;
		  $con=mysql_fetch_array(mysql_query("select name from country where country_id='".$a_row['user_country']."'"));
		  //echo "select * from user_info where user_id='$id'"; die;
		  $userinfo= mysql_fetch_array(mysql_query("select * from user_info where user_id='$id'"));
		  //echo $eveid; die;
		  // $facebook_id=$a_row['facebook_id'];
		  //$name=$a_row['fname']." ".$a_row['lname'];
		  $uname=$a_row['user_name'];
		  $email_id=$a_row['user_email'];
	      $pass=base64_decode($a_row['user_password']);
		  $dob=$a_row['user_birthdate'];
		  $gender=$a_row['user_gender'];
		  //$class="";
		   //$area=$a_row['address'];
		  $city=$userinfo['city'];
		  $ethnicity=$a_row['user_ethnicity'];
		  $regdate=$a_row['reg_date'];
		  //$login_type=$a_row['pin'];
		  $payment="Paypal";
		  $country=$con[0];
		 $fff77=$a_row['status'];
		 $eveid=$a_row['event_id'];
		// echo $eveid; die;
		// echo "select title from calendar where id='$eveid' and is_active='Y'"; die;
		 //$eve=mysql_fetch_array(mysql_query("select title from calender where id='".$a_row['event_id']."' and is_active='Y'"));
	   
		  if($cnt%2==0) $bgcolor=""; else $bgcolor="#F5F5F5";
		  $memtype=$a_row['memtype'];
		  if($memtype==0) $mtype="Unpaid"; else $mtype="Paid"; 
		 
		  if($fff77== "1") $c_status="<img src='../images/activate_green.gif' />"; else $c_status="<img src='../images/activate_red.gif' />"; 
		  print "<tr bgcolor='".$bgcolor."' valign='top'><td height='20' align='center'>";
		  print "<input type='checkbox' name='chk_id[]' class='smalltxt' value='".$id."'></td>";
		
		
		  print "<td align='center'>"; ?>
		  <img src="../images/edit.gif" onclick="javascript:location.href='user.php?frm=update_sadhak&id=<?=$id?>';" border="0" style="cursor:pointer;" />
		   <? 
		  print "</td>";
		   //print "<td align='left' class='a_txt' style='padding-left:2px;'>".$facebook_id."</td>";
		 // print "<td align='left' class='a_txt' style='padding-left:2px;'>".$name."</td>";
		   print "<td align='left' class='a_txt' style='padding-left:2px;'>".$uname."</td>";
		  //print "<td align='left' class='a_txt' style='padding-left:2px;'>".$class."</td>";
		  ?>
        <td align='left' class='a_txt' style='padding-left:2px;'><?php echo $email_id; ?></td><?php
		  //print "<td align='left' class='a_txt' style='padding-left:2px;'>".$email."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$pass."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$dob."</td>";
		 
		   print "<td align='left' class='a_txt' style='padding-left:2px;'>".$gender."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$city."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$ethnicity."</td>";
		  
		 print "<td align='left' class='a_txt' style='padding-left:2px;'>".$country."</td>";
		 print "<td align='left' class='a_txt' style='padding-left:2px;'>".$mtype."</td>";
		 print "<td align='left' class='a_txt' style='padding-left:2px;'>".$regdate."</td>";
		  //print "<td align='left' class='a_txt' style='padding-left:2px;'>".$login_type."</td>";
		  //print "<td align='left' class='a_txt' style='padding-left:2px;'>".$payment."</td>";
		  //print "<td align='left' class='a_txt' style='padding-left:2px;'>".$eveid."</td>";

		
		  print "<td align='center' class='a_txt'>".$c_status."</td></tr>"; 
		  $cnt++;  
		} 
		//echo $eveid; die;
		print "<tr valign='middle'><td colspan='4' align='center'>";
		$chk_pg=0;
		for($pgno=1;$pgno<$tot_pgs;$pgno++){ 
		  if($chk_pg > 0) $strt=$strt+$t_rec; else $strt=$chk_pg;
		  if($_REQUEST['pgn']=="" && $pgno==1) $currpg="lnky";
		  else if($_REQUEST['pgn']==$pgno) $currpg="lnky"; else $currpg="lnkn";
		  print "<a href='user.php?frm=showalluser&strt=".$strt."&pgn=".$pgno."' class='$currpg'>".$pgno."</a> ";
			$chk_pg=$chk_pg+1;
		}
	    $pgnostop=$_REQUEST['strt']+$t_rec; 
		if($pgnostop > $tot_num_appt){ $newnum=$pgnostop-$tot_num_appt; $pgnostop=($_REQUEST['strt']+$t_rec)-$newnum; }
		print "<br>";
		if($tot_num_appt > 0){ print "Showing ".($_REQUEST['strt']+1)."-".$pgnostop." of total ".$tot_num_appt." Records"; }
		else{ print "<span class='errmsg'>No Records Found !!</span>"; } 
		?>
	  </table>
	   
	</td>
  </tr>
  <tr><td align="center">
  <? if($_SESSION['admin'] != ""){ ?> 
	<input name="btn_delete" type="submit" value="Delete" class="button2">
	<input name="btn_delete" type="submit" value="Activate" class="button2">
	<input name="btn_delete" type="submit" value="Deactivate" class="button2">
	<input name="btn_delete" type="submit" value="Paid User" class="button2">
	<input name="btn_delete" type="submit" value="Unpaid User" class="button2">
  <? } ?></td>
  </tr>
  </form>

</table>
 </div>