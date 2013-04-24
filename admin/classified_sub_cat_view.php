<?
if($_REQUEST['btn_delete']=="Delete"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){
	  $sql="delete from classified_sub_cat   where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Sub-Category Deleted Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=classified_sub_cat_view&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Activate"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update classified_sub_cat    set status='Y' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Sub-Category Activated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=classified_sub_cat_view&err=<?=$err?>"</script><? 
}
if($_REQUEST['btn_delete']=="Deactivate"){ 
  if(is_array($_REQUEST['chk_id'])){
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update classified_sub_cat   set status='N' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Sub-Category DeActivated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=classified_sub_cat_view&err=<?=$err?>"</script><? 
}

?>

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
  <form name="frmvincent" method="post" action="user.php?frm=classified_sub_cat_view" enctype="multipart/form-data"> 
  <tr valign="top">
    <td>
	  <table width="100%" align="center" border="0" cellspacing="1" cellpadding="1">
	    <tr valign="middle">
		  <td align="center" class="hdrbtn" width="5%">
		    <input type="checkbox" name="chk_all" onClick="check(document.frmvincent)"></td>
           <!-- <td width="4%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Edit</strong></td> -->
		  <td width="17%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Sub-Category</strong></td>

          <td width="20%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Category</strong></td>
         
         
           <td width="12%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Date</strong></td>
		  <td width="12%" align="center" class="hdrbtn" style="padding-left:2px;"><strong>Status</strong></td>
		  
	    </tr>
		
		<?
		$t_rec=15;
		if($_GET['galid']=="")
		{
         $sql="select * from classified_sub_cat order by datetime  desc";
		 }
		 else
		 {
		  $sql="select * from classified_sub_cat where catogry_id='".trim($_GET['galid'])."'";
		 }
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
		  if($a_row->status == "Y") $c_status="<img src='../images/activate_green.gif' />"; else $c_status="<img src='../images/activate_red.gif' />"; 
		   print "<tr bgcolor='".$bgcolor."' valign='top'><td height='20' align='center'>";
		  print "<input type='checkbox' name='chk_id[]' class='smalltxt' value='".$id."'></td>";
		 /* print "<td align='center'>"; ?>
		  <img src="../images/edit.gif" onclick="javascript:location.href='user.php?frm=forum_modify&id=<?=$id?>&catid=<?=$a_row->catogry_id?>';" border="0" style="cursor:pointer;" />
		   <? 
		  print "</td>"; */
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".stripslashes($a_row->topic)."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".get_cat_name($a_row->catogry_id,'classified_cat')."</td>";
			  
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".date('m-d-Y',strtotime($a_row->datetime))."</td>";
		  print "<td align='center' class='a_txt'>".$c_status."</td></tr>"; 
		  $cnt++;  
		} 
		print "<tr valign='middle'><td colspan='4' align='center'>";
		$chk_pg=0;
		for($pgno=1;$pgno<$tot_pgs;$pgno++){ 
		  if($chk_pg > 0) $strt=$strt+$t_rec; else $strt=$chk_pg;
		  if($_REQUEST['pgn']=="" && $pgno==1) $currpg="lnky";
		  else if($_REQUEST['pgn']==$pgno) $currpg="lnky"; else $currpg="lnkn";
		  print "<a href='user.php?frm=view_question&strt=".$strt."&pgn=".$pgno."&galid=".trim($_GET['galid'])."' class='$currpg'>".$pgno."</a> ";
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
