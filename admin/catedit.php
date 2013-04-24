<?
if($_REQUEST['btn_delete']=="Delete"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){
	  $sql="delete from sponser where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Charity(s) Deleted Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=catedit&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Activate"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update sponser set status='yes' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Charity(s) Activated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=catedit&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Deactivate"){ 
  if(is_array($_REQUEST['chk_id'])){
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update sponser set status='N' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Charity(s) DeActivated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=catedit&err=<?=$err?>";</script><? 
}
?>

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">

  <form name="frmvincent" method="post" action="user.php?frm=catedit" enctype="multipart/form-data"> 

  <tr valign="top">
    <td>
	  <table width="100%" align="center" border="0" cellspacing="1" cellpadding="1">
		<tr valign="middle">
		  <td align="center" class="hdrbtn" width="3%">
		    <input type="checkbox" name="chk_all" onClick="check(document.frmvincent)"></td>
		  <td class="hdrbtn" width="10%" align="center" nowrap="nowrap"><strong>Edit</strong></td>
		  <? if($_REQUEST['sel_cat'] == ""){ ?>
		 <!-- <td class="hdrbtn" align="left" style="padding-left:2px;"><strong>Category</strong></td> -->
		  <? } ?>
		  <td width="19%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Charity Name</strong></td>
          <td width="19%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Logo Url</strong></td>
		  <td width="30%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Description</strong></td>
		  <td class="hdrbtn" align="center" width="10%"><strong>Status</strong></td>
	    </tr>
		<?
		$t_rec=15;
		$sql="select * from sponser ";
		
		$sql .= " order by id";
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
		    $desc =strip_tags(stripslashes($a_row->description));
		  $len = strlen($desc);
		  if($len >50)
		   $sum2 = substr($desc, 0, 50).'...';
		  else 
		    $sum2 = $desc; 
		  if($cnt%2==0) $bgcolor=""; else $bgcolor="#F5F5F5"; 
		  if($a_row->status == "yes") $c_status="<img src='../images/activate_green.gif' />"; else $c_status="<img src='../images/deactivate_green.gif' />"; 
		  print "<tr bgcolor='".$bgcolor."' valign='top'><td height='20' align='center'>";
		  print "<input type='checkbox' name='chk_id[]' class='smalltxt' value='".$id."'></td>";
		  print "<td align='center'>"; ?>
		  <img src="../images/edit.gif" onclick="javascript:location.href='user.php?frm=catmodify&id=<?=$id?>';" border="0" style="cursor:pointer;" />
<?php
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".stripslashes($a_row->name)."</td>";
		   print "<td align='left' class='a_txt' style='padding-left:2px;'>".stripslashes($a_row->logourl)."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$sum2."</td>";
		  print "<td align='center' class='a_txt'>".$c_status."</td></tr>"; 
		  $cnt++;  
		} 
		print "<tr valign='middle'><td colspan='8' align='center'>";
		$chk_pg=0;
		for($pgno=1;$pgno<$tot_pgs;$pgno++){ 
		  if($chk_pg > 0) $strt=$strt+$t_rec; else $strt=$chk_pg;
		  if($_REQUEST['pgn']=="" && $pgno==1) $currpg="lnky";
		  else if($_REQUEST['pgn']==$pgno) $currpg="lnky"; else $currpg="lnkn";
		  print "<a href='user.php?frm=catedit&sel_cat=".$_REQUEST['sel_cat']."&strt=".$strt."&pgn=".$pgno."' class='$currpg'>".$pgno."</a> ";
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
