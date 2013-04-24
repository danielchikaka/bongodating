<?
if($_REQUEST['btn_delete']=="Delete"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){
	  $sql="delete from tbl_admin where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="User(s) Deleted Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=user_edit&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Activate"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update tbl_admin set is_active='Y' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="User(s) Activated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=user_edit&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Deactivate"){ 
  if(is_array($_REQUEST['chk_id'])){
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update tbl_admin set is_active='N' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="User(s) DeActivated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=user_edit&err=<?=$err?>";</script><? 
}
?>

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
  <form name="frmvincent" method="post" action="user.php?frm=user_edit" enctype="multipart/form-data"> 
  <tr valign="top">
    <td>
	  <table width="100%" align="center" border="0" cellspacing="1" cellpadding="1">
	    <tr valign="middle">
		  <td align="center" class="hdrbtn" width="2%">
		    <input type="checkbox" name="chk_all" onClick="check(document.frmvincent)"></td>
		  <td class="hdrbtn" width="4%" align="center" nowrap="nowrap"><strong>Edit</strong></td>
		  <td class="hdrbtn" align="left" style="padding-left:2px;" nowrap="nowrap"><strong>First Name</strong></td>
		  <td class="hdrbtn" align="left" style="padding-left:2px;" nowrap="nowrap"><strong>Last Name</strong></td>
		  <td class="hdrbtn" align="left" style="padding-left:2px;" nowrap="nowrap"><strong>Email</strong></td>
		  <td class="hdrbtn" align="left" style="padding-left:2px;" nowrap="nowrap"><strong>Password</strong></td>
		  <td class="hdrbtn" align="left" style="padding-left:2px;" nowrap="nowrap"><strong>Phone</strong></td>
		  <td class="hdrbtn" align="center" width="7%" nowrap="nowrap"><strong>Gender</strong></td>
		  <td class="hdrbtn" align="center" width="9%" nowrap="nowrap"><strong>Address Info</strong></td>
		  <td class="hdrbtn" align="center" width="6%" nowrap="nowrap"><strong>Status</strong></td>
	    </tr>
		<?
		$t_rec=15;
		$sql="select * from tbl_admin order by fname";
		$qry_pgs = mysql_query($sql);
		$tot_num_appt = mysql_num_rows($qry_pgs);
		$tot_pgs = (mysql_num_rows($qry_pgs))/$t_rec;
		$tot_pgs = $tot_pgs+1;
		$strt=$_REQUEST['strt'];
		if($strt != ""){$pgs=" limit ".$strt.",$t_rec";} else{$pgs=" limit 0,$t_rec";}
		$sql = $sql.$pgs;
		$rs=mysql_query($sql);
		$cnt=0;
		while($a_row=mysql_fetch_object($rs)){
		  $id=$a_row->id;
		  if($cnt%2==0) $bgcolor=""; else $bgcolor="#F5F5F5"; 
		  if($a_row->is_active == "Y") $c_status="<strong>Active</strong>"; else $c_status="Inactive"; 
		  if($a_row->gender == "M") $gender="Male"; else $gender="Female"; 
		  print "<tr bgcolor='".$bgcolor."' valign='top'><td height='20' align='center'>";
		  print "<input type='checkbox' name='chk_id[]' value='".$id."'></td>";
		  print "<td align='center'>"; ?>
		  <img src="../images/edit.gif" onclick="javascript:location.href='user.php?frm=user_modify&id=<?=$id?>';" border="0" style="cursor:pointer;" />
		   <?php 
		     $pass =stripslashes($a_row->password); 
			 if($_SESSION['admin_type']==2)
			 	$pass = "********";
		  print "</td>";
		  print "<td align='left' style='padding-left:2px;'>".stripslashes($a_row->fname)."</td>";
		  print "<td align='left' style='padding-left:2px;'>".stripslashes($a_row->lname)."</td>";
		  print "<td align='left' style='padding-left:2px;'>".stripslashes($a_row->email)."</td>";
		  print "<td align='left' style='padding-left:2px;'>".$pass."</td>";
		  print "<td align='left' style='padding-left:2px;'>".stripslashes($a_row->phone)."</td>";
		  print "<td align='center'>".$gender."</td>";
		  print "<td align='center''>";
		  ?>
		  <a href="#" onClick="javascript:window.open('userinfo.php?id=<?=$a_row->id?>','','width=300,height=300,scrollbars=yes,resizable=yes')">View Details</a>
		  <?php
		  print "</td>";
		  print "<td align='center'>".$c_status."</td></tr>"; 
		  $cnt++;  
		} 
$sql_c = "select * from tbl_country where iso='".$a_row->bcountry."'";
$qry_c = mysql_query($sql_c);
$row_c = mysql_fetch_object($qry_c);

		print "<tr valign='middle'><td colspan='10' align='center' style='border-top:1px #F5F5F5 solid;'>";
		$chk_pg=0;
		for($pgno=1;$pgno<$tot_pgs;$pgno++){ 
		  if($chk_pg > 0) $strt=$strt+$t_rec; else $strt=$chk_pg;
		  if($_REQUEST['pgn']=="" && $pgno==1) $currpg="lnky";
		  else if($_REQUEST['pgn']==$pgno) $currpg="lnky"; else $currpg="lnkn";
		  print "<a href='user.php?frm=user_edit&strt=".$strt."&pgn=".$pgno."' class='$currpg'>".$pgno."</a> ";
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
  <tr><td align="center" height="40">
  <? if($_SESSION['admin'] != "" && $_SESSION['admin_type']==1){ ?> 
	<input name="btn_delete" type="submit" value="Delete" class="button2">
	<input name="btn_delete" type="submit" value="Activate" class="button2">
	<input name="btn_delete" type="submit" value="Deactivate" class="button2">
  <? } ?></td>
  </tr>
  </form>
</table>
