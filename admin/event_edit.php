<?
if($_REQUEST['btn_delete']=="Delete"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){
	  $sql="delete from calendar where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Event(s) Deleted Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=event_edit&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Activate"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update calendar set is_active='Y' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Event(s) Activated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=event_edit&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Deactivate"){ 
  if(is_array($_REQUEST['chk_id'])){
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update calendar set is_active='N' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Event(s) DeActivated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=event_edit&err=<?=$err?>";</script><? 
}
?>

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
  <form name="frmvincent" method="post" action="user.php?frm=event_edit
  " enctype="multipart/form-data"> 
  <tr valign="top">
    <td bgcolor="#FFFFFF">
	  <table width="100%" align="center" border="0" cellspacing="1" cellpadding="1">
	    <tr valign="middle" bgcolor="#F5F5F5">
		  <td align="center" class="hdrbtn" width="3%">
		    <input type="checkbox" name="chk_all" onClick="check(document.frmvincent)"></td>
		  <td class="hdrbtn" width="5%" align="center" nowrap="nowrap"><strong>Edit</strong></td>
		    <td class="hdrbtn" width="8%" align="center" nowrap="nowrap"><strong>Start Date</strong></td>
            <td class="hdrbtn" width="11%" align="center" nowrap="nowrap"><strong>End Date</strong></td>
		  <td width="23%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>title</strong></td>
          <td width="15%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Where</strong></td>
          <td width="14%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>When</strong></td>
          <td width="8%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Time</strong></td>
          <td width="6%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Cost</strong></td>
		  <td class="hdrbtn" align="center" width="7%"><strong>Status</strong></td>
	    </tr>
		<?
		$t_rec=15;
		$sql="select * from calendar order by id";
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
		  $date=stripslashes($a_row->date1);
		   $enddate=stripslashes($a_row->end_date1);
		  $start_date=date('m-d-Y',strtotime($date));
		   $end_date=date('m-d-Y',strtotime($enddate));
		  if($cnt%2==0) $bgcolor=""; else $bgcolor="#F5F5F5"; 
		  if($a_row->is_active == "Y") $c_status="<strong>Active</strong>"; else $c_status="Inactive"; 
		  print "<tr bgcolor='".$bgcolor."' valign='top'><td height='20' align='center'>";
		  print "<input type='checkbox' name='chk_id[]' class='smalltxt' value='".$id."'></td>";
		  print "<td align='center'>"; ?>
		  <img src="../images/edit.gif" onclick="javascript:location.href='user.php?frm=event_modify&id=<?=$id?>';" border="0" style="cursor:pointer;" />
		   <? 
		  print "</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$start_date."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$end_date."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".stripslashes($a_row->title)."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".stripslashes($a_row->where1)."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".stripslashes($a_row->when1)."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".stripslashes($a_row->time)." ".$a_row->ampm."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".stripslashes($a_row->cost)."</td>";
		  
		  print "<td align='center' class='a_txt'>".$c_status."</td></tr>"; 
		  $cnt++;  
		} 
		print "<tr valign='middle'><td colspan='4' align='center'>";
		$chk_pg=0;
		for($pgno=1;$pgno<$tot_pgs;$pgno++){ 
		  if($chk_pg > 0) $strt=$strt+$t_rec; else $strt=$chk_pg;
		  if($_REQUEST['pgn']=="" && $pgno==1) $currpg="lnky";
		  else if($_REQUEST['pgn']==$pgno) $currpg="lnky"; else $currpg="lnkn";
		  print "<a href='user.php?frm=event_edit&strt=".$strt."&pgn=".$pgno."' class='$currpg'>".$pgno."</a> ";
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
  <? } ?></td>
  </tr>
  </form>
</table>
