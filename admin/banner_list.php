<?
if($_REQUEST['btn_delete']=="Delete"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){
	
		$sql_img = mysql_query( " select * from banners where id = '".$id."' ");
		while($img_sql = mysql_fetch_array($sql_img))
		{
			$large_image_location = "../images/homeimages/".$img_sql['image'];
			$thumb_image_location = "../images/homeimages/thumbnail/".$img_sql['image'];
			if (file_exists($large_image_location)) {
				@unlink($large_image_location);
			}
			if (file_exists($thumb_image_location)) {
				@unlink($thumb_image_location);
			}
			mysql_query( " delete from banners where id = '".$id."' ");
		}
		
	  $err="Banner(s) Deleted Successfully !!"; 
	} 
	
  } ?>
<script>javascript:location.href="user.php?frm=banner_list&err=<?=$err?>";</script>
<? 
}
if($_REQUEST['btn_delete']=="Activate"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){ 
	 $sql="update banners set status='1' where id='$id'"; 
	  $rs=mysql_query($sql);
	  $err="Banner(s) Activated Successfully !!"; 
	} 
  } ?>
<script>javascript:location.href="user.php?frm=banner_list&err=<?=$err?>";</script>
<? 
}
if($_REQUEST['btn_delete']=="Deactivate"){ 
  if(is_array($_REQUEST['chk_id'])){
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update banners set status='0' where id='$id'"; 
	  $rs=mysql_query($sql); 
 
	  $err="Banner(s) DeActivated Successfully !!"; 
	} 
	
  } ?>
<script>javascript:location.href="user.php?frm=banner_list&err=<?=$err?>";</script>
<? 
}

?>
<div id="name_list">
  <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
    <form name="frmvincent" method="post" action="user.php?frm=banner_list" enctype="multipart/form-data">
      <tr valign="top">
        <td><table width="90%" border="0" align="center" cellpadding="1" cellspacing="1">
            <tr valign="middle" bgcolor="#f2f2f2" height="25">
              <td align="center"  colspan="5">&nbsp;</td>
              <td class="hdrbtn" align="center"><a href="user.php?frm=banner_add" class="" ><strong>Add Banner</strong></a></td>
            </tr>
            <tr valign="middle" height="25">
              <td colspan="6" align="center" >&nbsp;</td>
            </tr>
            <tr valign="middle" bgcolor="#f2f2f2" height="25">
              <td align="center" class="hdrbtn" width="10%"><input type="checkbox" name="chk_all" onClick="check(document.frmvincent)"></td>
              <td class="hdrbtn" width="10%" align="center" nowrap="nowrap"><strong>Edit</strong></td>
              <td width="25%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Title</strong></td>
              <td class="hdrbtn" width="25%"><strong>Image</strong></td>
              <td class="hdrbtn" width="15%"><strong>Date</strong></td>
              <td class="hdrbtn" align="center" width="15%"><strong>Status</strong></td>
            </tr>
            <?
		$t_rec=15;
		 $sql="select * from banners order by id";
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
		  $id		= $a_row['id'];
		  $title	= $a_row['title'];
		  $image	= $a_row['image'];
	      $date 	= $a_row['udate'];
		  $fff77	= $a_row['status'];
		 
		  if($cnt%2==0) $bgcolor=""; else $bgcolor="#F5F5F5";
		  
		  if($fff77== "1") $c_status="<img src='../images/activate_green.gif' />"; else $c_status="<img src='../images/activate_red.gif' />"; 
		  print "<tr bgcolor='".$bgcolor."' valign='top'><td height='25' align='center'>";
		  print "<input type='checkbox' name='chk_id[]' class='smalltxt' value='".$id."'></td>";
		  print "<td align='center'>"; ?>
            <img src="../images/edit.gif" onclick="javascript:location.href='user.php?frm=banner_edit&id=<?=$id?>';" border="0" style="cursor:pointer;" />
            <? 
		  print "</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$title."</td>";
		  ?>
            <td align='left' class='a_txt' style='padding-left:2px;'><?php if($image!='') {  echo "<img src='../images/homeimages/$image' border='0' wight=150 height=100 />"; } ?></td>
              <?php
		 print "<td align='left' class='a_txt' style='padding-left:2px;'>".$date."</td>";
		
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
		  print "<a href='user.php?frm=banner_list&strt=".$strt."&pgn=".$pgno."' class='$currpg'>".$pgno."</a> ";
			$chk_pg=$chk_pg+1;
		}
	    $pgnostop=$_REQUEST['strt']+$t_rec; 
		if($pgnostop > $tot_num_appt){ $newnum=$pgnostop-$tot_num_appt; $pgnostop=($_REQUEST['strt']+$t_rec)-$newnum; }
		print "<br>";
		if($tot_num_appt > 0){ print "Showing ".($_REQUEST['strt']+1)."-".$pgnostop." of total ".$tot_num_appt." Records"; }
		else{ print "<span class='errmsg'>No Records Found !!</span>"; } 
		?>
        </table></td>
      </tr>
      <tr valign="top">
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><? if($_SESSION['admin'] != ""){ ?>
          <input name="btn_delete" type="submit" value="Delete" class="button2">
          <input name="btn_delete" type="submit" value="Activate" class="button2">
          <input name="btn_delete" type="submit" value="Deactivate" class="button2">
          <? } ?></td>
      </tr>
    </form>
  </table>
</div>
