<?php
error_reporting(0);
// or error_reporting(E_ALL & ~E_NOTICE); to show errors but not notices
ini_set("display_errors", 0);
?>
<?
//}
if (isset($_REQUEST['btn_delete'])=="Delete")
{ 
  if(is_array($_REQUEST['chk_id']))
  { 
    foreach($_REQUEST['chk_id'] as $id)
	{
	//echo "delete from messages where id='$id'"; die;
	  $sql="delete from messages where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Message(s) Deleted Successfully !!"; 
	} 
 } ?><script>javascript:location.href="user.php?frm=msg_details&err=<?=$err?>";</script><? 
}
if (isset($_REQUEST['btn_delete'])=="Activate")
{ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id)
	{ 
	//echo "update messages set status='Y' where id='$id'"; die;
	  $sql="update messages set status='1' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Message(s) Activated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=msg_details&err=<?=$err?>";</script><? 
}
if (isset($_REQUEST['btn_delete'])=="Deactivate")
{ 
  if(is_array($_REQUEST['chk_id'])){
    foreach($_REQUEST['chk_id'] as $id)
	{ 
	  $sql="update messages set status='0' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Message(s) DeActivated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=msg_details&err=<?=$err?>";</script><? 
}
?>

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
  <form name="frmvincent" method="post" action="user.php?frm=msg_details" enctype="multipart/form-data"> 
  <tr valign="top">
    <td>
	  <table width="100%" align="center" border="0" cellspacing="1" cellpadding="1">
	    <tr valign="middle" bgcolor="#f2f2f2" height="25">
		  <td align="center" class="hdrbtn" width="5%">
		    <input type="checkbox" name="chk_all" onClick="check(document.frmvincent)"></td>
		  <!--<td class="hdrbtn" width="7%" align="center" nowrap="nowrap"><strong>Edit</strong></td>-->
		 
            <td width="11%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Sender Name</strong></td>
           <td class="hdrbtn" align="center" width="27%" style="padding-left:2px;"><strong>Receiver Name</strong></td>
           <td class="hdrbtn" align="center" width="20%" style="padding-left:2px;"><strong>Date</strong></td>
		  <td class="hdrbtn" align="center" width="14%"><strong>Status</strong></td>
          <td class="hdrbtn" align="center" width="16%"><strong>View</strong></td>
	    </tr>
		<?
		$t_rec=15;
		$sql="select * from messages order by sender_id";
		$qry_pgs = mysql_query($sql);
		$tot_num_appt = mysql_num_rows($qry_pgs);
		$tot_pgs = (mysql_num_rows($qry_pgs))/$t_rec;
		$tot_pgs = $tot_pgs+1;
		$strt= isset($_REQUEST['strt']);
		if($strt != ""){$pgs=" limit ".$strt.",$t_rec";} else{$pgs=" limit 0,$t_rec";}
		$sql = $sql.$pgs;
		$rs=mysql_query($sql);
		$cnt=0;
		while($a_row=mysql_fetch_object($rs)){
		  $id=$a_row->id;
		  //echo $id; die;
		  $senduser= mysql_fetch_object(mysql_query("select user_name from user where user_id='".$a_row->sender_id."'"));
		  $recuser= mysql_fetch_object(mysql_query("select user_name from user where user_id='".$a_row->rece_id."'"));
		  if($cnt%2==0) $bgcolor=""; else $bgcolor="#F5F5F5"; 
		  if($a_row->status == "1") $c_status="<strong>Active</strong>"; else $c_status="Inactive"; 
		  print "<tr bgcolor='".$bgcolor."' valign='top'><td height='20' align='center'>";
		  print "<input type='checkbox' name='chk_id[]' class='smalltxt' value='".$id."'></td>";
		  //print "<td align='center'>"; ?>
		  <!--<img src="../images/edit.gif" onClick="javascript:location.href='user.php?frm=msg_details&id=<?=$id?>';" border="0" style="cursor:pointer;" />-->
		   <? 
		  //print "</td>";
		  
		  print "<td align='center' class='a_txt' style='padding-left:2px;'>".stripslashes($senduser->user_name)."</td>";
		  print "<td align='center' class='a_txt' style='padding-left:2px;'>".stripslashes($recuser->user_name)."</td>";
		  print "<td align='center' class='a_txt' style='padding-left:2px;'>".$a_row->datetime."</td>";
		  print "<td align='center' class='a_txt'>".$c_status."</td>"; 
		  print "<td align='center' class='a_txt' style='padding-left:2px;'><a href='".'user'.'.php?frm=show_msg&id='."$id"."'>".'Details'."</a></td></tr>";
		  //print "<td align='center' class='a_txt' style='padding-left:2px;'>".Details."</td></tr>";
		  $cnt++;  
		} 
		print "<tr valign='middle'><td colspan='4' align='center'>";
		$chk_pg=0;
		for($pgno=1;$pgno<$tot_pgs;$pgno++){ 
		  if($chk_pg > 0) $strt=$strt+$t_rec; else $strt=$chk_pg;
		  if (isset($_REQUEST['pgn'])=="" && $pgno==1) $currpg="lnky";
		  else if (isset($_REQUEST['pgn'])==$pgno) $currpg="lnky"; else $currpg="lnkn";
		  print "<a href='user.php?frm=msg_details&strt=".$strt."&pgn=".$pgno."' class='$currpg'>".$pgno."</a> ";
		  $chk_pg=$chk_pg+1;
		}
	    $pgnostop=($_REQUEST['strt']+$t_rec);
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
  
  <!--<input name="f" type="image" value="Details" class="button2" onClick="javascript:location.href='user.php?frm=show_msg&id=<?=$id?>';">-->
	<input name="btn_delete" type="submit" value="Delete" class="button2">
	<input name="btn_delete" type="submit" value="Activate" class="button2">
	<input name="btn_delete" type="submit" value="Deactivate" class="button2">
  <? } ?></td>
  </tr>
  </form>
</table>