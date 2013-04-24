<?
if($_REQUEST['btn_delete']=="Delete"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id)
	{
	//print_r($id); exit;
	  $sql="select * from home_img where id ='$id'"; 
	  $rs=mysql_query($sql);
	  $row=mysql_fetch_object($rs);
	
	  @unlink("media/".$row->pname); 
	  $sqld = "delete from home_img where id='$id'";
	  mysql_query($sqld);
	  $err="Image(s) Deleted Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=hpimg_edit&err=<?=$err?>";</script><? 
}
 


?>
<html>
<head>
	
</head>
<body>
<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
<tr valign="top"><td>
	    

</td></tr>
  <form name="frmvincent" method="post" action="user.php?frm=hpimg_edit" enctype="multipart/form-data" > 

  <tr valign="top">
    <td>
	  <table width="100%" align="center" border="0" cellspacing="1" cellpadding="1">
		<tr valign="middle">
		  <td align="center" class="hdrbtn" width="4%">
		    <input type="checkbox" name="chk_all" onClick="check(document.frmvincent)"></td>
		  <td class="hdrbtn" width="96%" align="left" nowrap="nowrap"><strong>Select All </strong></td>
	    </tr>
	</table>
	
	<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="left" valign="top">
		<?
		$t_rec=50;
		$sql= "select * from home_img";


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
		
		  print '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
		 $order=array();
		  $id = array();
		  $desc =array();
		  $date =array();
		while($a_row=mysql_fetch_object($rs)){
		    $id[$cnt]=$a_row->id;
		    
		    
			$img[$cnt]=$a_row->pname;
			
			
			$date[$cnt]=date('m-d-Y',strtotime($date1));
			$cnt++;
		}
	
	for($k=0;$k<count($id);$k++)
	{
	 print "<tr>";
	 print "<td valign='top' align='left'>";
	 if(!empty($id[$k])){		
	 print "<input type='checkbox' name='chk_id[]'  value='".$id[$k]."' >&nbsp;&nbsp;";


	print "<input type='hidden' name='hidden_id[]'  value='".$id[$k]."' >";
	print "<br/>";
	print "&nbsp;<img src='media/".$img[$k++]."' border='0' align='center'   height='120'  width='160'>"; 
	print "<br/>";

	
	}
	print "</td>";
	print "<td valign='top' align='left'>";	
	if(!empty($id[$k])){	
	print "<input type='checkbox' name='chk_id[]'  value='".$id[$k]."' >&nbsp;&nbsp;";

	print "<input type='hidden' name='hidden_id[]'  value='".$id[$k]."' >";
	echo "<br/>";
	print "<img src='media/".$img[$k++]."' border='0' align='center'   height='120'  width='160'>"; 
	print "<br/>";
	}
	print "</td>";
	   
	print "<td valign='top' align='left'>";	
	if(!empty($id[$k]))	{	
	print "<input type='checkbox' name='chk_id[]'  value='".$id[$k]."' >&nbsp;&nbsp;";
	print "<input type='hidden' name='hidden_id[]'  value='".$id[$k]."' >";
	echo "<br/>";
	print "<img src='media/".$img[$k++]."' border='0' align='center'   height='120'  width='160'>"; 
	print "<br/>";
	}
	print "</td>";
	   
	print "<td valign='top' align='left'>";	
	if(!empty($id[$k]))	{
	print "<input type='checkbox' name='chk_id[]'  value='".$id[$k]."' >&nbsp;&nbsp;";
	print "<input type='hidden' name='hidden_id[]'  value='".$id[$k]."' >";
	echo "<br/>";
	print "<img src='media/".$img[$k]."' border='0' align='center'   height='120'  width='160'>"; 

	}
	print "</td>";
	print "</tr>";
			
}	
   print "</table>";
		 
		print "<div style='clear:both;'></div><div align=center>";
		$chk_pg=0;
		for($pgno=1;$pgno<$tot_pgs;$pgno++){ 
		  if($chk_pg > 0) $strt=$strt+$t_rec; else $strt=$chk_pg;
		  if($_REQUEST['pgn']=="" && $pgno==1) $currpg="lnky";
		  else if($_REQUEST['pgn']==$pgno) $currpg="lnky"; else $currpg="lnkn";
		  print "<a href='user.php?frm=hpimg_edit&sel_cat=".$_REQUEST['sel_cat']."&strt=".$strt."&pgn=".$pgno."' class='$currpg'>".$pgno."</a> ";
			$chk_pg=$chk_pg+1;
		}
	    $pgnostop=$_REQUEST['strt']+$t_rec; 
		if($pgnostop > $tot_num_appt){ $newnum=$pgnostop-$tot_num_appt; $pgnostop=($_REQUEST['strt']+$t_rec)-$newnum; }
		print "<br/><br/>";
		if($tot_num_appt > 0){ print "Showing ".($_REQUEST['strt']+1)."-".$pgnostop." of total ".$tot_num_appt." Records"; }
		else{ print "<span class='errmsg'>No Records Found !!</span>"; } 
		print "</div>";
		?>
	  </td></tr>
	  </table>
	</td>
  </tr>
  <tr><td align="center">
  <? if($_SESSION['admin'] != ""){ ?>
   
	<input name="btn_delete" type="submit" value="Delete" class="button2">&nbsp;&nbsp;
	
  <? } ?></td>
  </tr>
  </form> 
</table>

<script  language="javascript" type="text/javascript">
function number(b)
 {var a;var c;if(window.event){a=window.event.keyCode}else{if(b){a=b.which}else{return true}}if((a==8)||(a==0)){return true}c=String.fromCharCode(a);c=c.toLowerCase();if((a>47)&&(a<58)){return true}else{return false}}

</script>
</body></html>