<?
if($_REQUEST['btn_delete']=="Delete"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){
	
	  mysql_query( " delete from state where id = '".$id."' ");
	  $err="State(s) Deleted Successfully !!"; 
	} 
	
  } ?>
<script>javascript:location.href="user.php?frm=state_list&err=<?=$err?>";</script>
<? 
}

?>
<div id="name_list">
  <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
    <form name="frmvincent" method="post" action="user.php?frm=state_list" enctype="multipart/form-data">
      <tr valign="top">
        <td><table width="90%" border="0" align="center" cellpadding="1" cellspacing="1">
            <tr valign="middle" bgcolor="#f2f2f2" height="25">
              <td align="center"  colspan="5">&nbsp;</td>
              <td class="hdrbtn" align="center"><a href="user.php?frm=state_add" class="" ><strong>Add State</strong></a></td>
            </tr>
            <tr valign="middle" height="25">
              <td colspan="6" align="center" >&nbsp;</td>
            </tr>
            <tr valign="middle" bgcolor="#f2f2f2" height="25">
              <td align="center" class="hdrbtn" width="10%"><input type="checkbox" name="chk_all" onClick="check(document.frmvincent)"></td>
              <td class="hdrbtn" width="10%" align="center" nowrap="nowrap"><strong>Edit</strong></td>
              <td width="25%" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Country Name</strong></td>
              <td class="hdrbtn" width="25%"><strong>State Name</strong></td>
              <td class="hdrbtn" width="15%"><strong>Abbreviation</strong></td>
            </tr>
            <?
		$t_rec=35;
		 $sql="select * from state order by id";
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
		  $country_id	= $a_row['country_id'];
		  $name	= $a_row['name'];
	      $abbreviation 	= $a_row['abbreviation'];
		  
		  $country_row = mysql_fetch_array(mysql_query("select name from country where country_id = '".$country_id."' "));
		  $country_name = $country_row['name'];
		  if($cnt%2==0) $bgcolor=""; else $bgcolor="#F5F5F5";
		  
		  if($fff77== "1") $c_status="<img src='../images/activate_green.gif' />"; else $c_status="<img src='../images/activate_red.gif' />"; 
		  print "<tr bgcolor='".$bgcolor."' valign='top'><td height='25' align='center'>";
		  print "<input type='checkbox' name='chk_id[]' class='smalltxt' value='".$id."'></td>";
		  print "<td align='center'>"; ?>
            <img src="../images/edit.gif" onclick="javascript:location.href='user.php?frm=state_edit&id=<?=$id?>';" border="0" style="cursor:pointer;" />
            <? 
		  print "</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$country_name."</td>";
		  ?>
            <td align='left' class='a_txt' style='padding-left:2px;'><?php echo $name; ?></td>
              <?php
		 print "<td align='left' class='a_txt' style='padding-left:2px;'>".$abbreviation."</td></tr>";
		$cnt++;  
		} 
		//echo $eveid; die;
		print "<tr valign='middle'><td colspan='6' align='center'>";
		$chk_pg=0;
		for($pgno=1;$pgno<$tot_pgs;$pgno++){ 
		  if($chk_pg > 0) $strt=$strt+$t_rec; else $strt=$chk_pg;
		  if($_REQUEST['pgn']=="" && $pgno==1) $currpg="lnky";
		  else if($_REQUEST['pgn']==$pgno) $currpg="lnky"; else $currpg="lnkn";
		  print "<a href='user.php?frm=state_list&strt=".$strt."&pgn=".$pgno."' class='$currpg'>".$pgno."</a> ";
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
          <? } ?></td>
      </tr>
    </form>
  </table>
</div>
