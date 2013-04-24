<?
if($_REQUEST['btn_delete']=="Delete"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){
	  $sql="delete from payment where id='$id'"; 
	  //echo $sql; die;
	  $rs=mysql_query($sql); 
	  $err="Booked(s) Deleted Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=orderedit&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Activate"){ 
  if(is_array($_REQUEST['chk_id'])){ 
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update sponser set status='yes' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Sponsor(s) Activated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=catedit&err=<?=$err?>";</script><? 
}
if($_REQUEST['btn_delete']=="Deactivate"){ 
  if(is_array($_REQUEST['chk_id'])){
    foreach($_REQUEST['chk_id'] as $id){ 
	  $sql="update sponser set status='N' where id='$id'"; 
	  $rs=mysql_query($sql); 
	  $err="Sponsor(s) DeActivated Successfully !!"; 
	} 
  } ?><script>javascript:location.href="user.php?frm=catedit&err=<?=$err?>";</script><? 
}
?>

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">

  <form name="frmvincent" method="post" action="user.php?frm=orderedit" enctype="multipart/form-data"> 
<tr >
    <td>
	  <table width="100%" align="center" border="0" cellspacing="1" cellpadding="1">
		<tr valign="middle" bgcolor="#f2f2f2" height="25">
		  <td align="center" class="hdrbtn" width="20">
		    <input type="checkbox" name="chk_all" onClick="check(document.frmvincent)"></td>
		  <td width="63" align="left" class="hdrbtn" style="padding-left:2px;"><strong>First Name</strong></td>
		  <td width="92" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Last Name</strong></td>
          <td width="52" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Address1 </strong></td>
          <td width="52" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Address2</strong></td>
          <td width="64" align="left" class="hdrbtn" style="padding-left:2px;"><strong>City</strong></td>
          <td width="52" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Pin Code</strong></td>
          <td width="63" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Payment from</strong></td>
          <td width="85" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Transaction id</strong></td>
  
          <td width="105" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Payer Email</strong></td>
           <td width="70" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Payment status</strong></td>
           <td width="130" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Date</strong></td>
           <td width="53" align="left" class="hdrbtn" style="padding-left:2px;"><strong>Amt</strong></td>
		    <!--<td width="100" align="center" class="hdrbtn" style="padding-left:2px;"><strong>Class Details</strong></td>-->
	    </tr>
		<?
		$t_rec=15;
		$sql="select * from payment  ";
		
		$sql .= " order by id desc";
		$qry_pgs = mysql_query($sql);
		$tot_num_appt = mysql_num_rows($qry_pgs);
		$tot_pgs = (mysql_num_rows($qry_pgs))/$t_rec;
		$tot_pgs = $tot_pgs+1;
		$strt=$_REQUEST['strt'];
		if($strt != ""){$pgs=" limit ".$strt.",$t_rec";} else{$pgs=" limit 0,$t_rec";}
		$sql = $sql.$pgs;
		$rs=mysql_query($sql);
		$cnt=0;
		while($a_row=mysql_fetch_array($rs)){
		  $id=$a_row['id'];
	      $name=$a_row['firstname'];
		  $lname= $a_row['lastname'];
          $address1=$a_row['address1'];
		  $address2=$a_row['address2'];
          $city=$a_row['city'];
          $pin=$a_row['postalcode'];
         $company=$a_row['company'];
         $email=$a_row['email'];
         $refering=$a_row['refering'];
		 $paymentfrom = "Paypal";
         $transaction_id=$a_row['transaction_id'];
         $payer=$a_row['transaction_type'];
		  $payment_status=$a_row['status'];
		  $amount_total=$a_row['subscription'];
		   $date=$a_row['paymentdate'];
		   $booked_class_id = $a_row['booked_class_id'];
		   $date1=date('m-d-Y',strtotime($date));
		  if($cnt%2==0) $bgcolor=""; else $bgcolor="#F5F5F5"; 
		  if($a_row['status']== "yes") $c_status="<img src='../images/activate_green.gif' />"; else $c_status="<img src='../images/deactivate_green.gif' />"; 
		  print "<tr bgcolor='".$bgcolor."' valign='top'><td height='20' align='center'>";
		  print "<input type='checkbox' name='chk_id[]' class='smalltxt' value='".$id."'></td>";

		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$name."</td>";
		  print "<td align='left' class='a_txt' style='padding-left:2px;'>".$lname."</td>";
		  print "<td align='left' class='a_txt'><textarea name='addeess1' cols='15' rows='2'>".$address1."</textarea></td>"; 
		  print "<td align='left' class='a_txt'><textarea name='addeess2' cols='15' rows='2'>".$address2."</textarea></td>"; 
		  print "<td align='left' class='a_txt'>".$city."</td>"; 
		  print "<td align='left' class='a_txt'>".$pin."</td>"; 
		  print "<td align='left' class='a_txt'>".$paymentfrom."</td>"; 
		  print "<td align='left' class='a_txt'>".$transaction_id."</td>"; 
		 
		 
		  print "<td align='left' class='a_txt'><textarea name='email' cols='15' rows='2'>".$email."</textarea></td>"; 
		  print "<td align='left' class='a_txt'>".$payment_status."</td>"; 
		  print "<td align='left' class='a_txt'>".$date1."</td>"; 
		  print "<td align='left' class='a_txt'>$".$amount_total."</td>"; 
		  // print "<td align='center' class='a_txt'><a href='javascript:ModalPopupsAlert88(".$booked_class_id.");'>View</a></td></tr>"; 

		  $cnt++;  
		} 
		print "<tr valign='middle'><td colspan='8' align='center'>";
		$chk_pg=0;
		for($pgno=1;$pgno<$tot_pgs;$pgno++){ 
		  if($chk_pg > 0) $strt=$strt+$t_rec; else $strt=$chk_pg;
		  if($_REQUEST['pgn']=="" && $pgno==1) $currpg="lnky";
		  else if($_REQUEST['pgn']==$pgno) $currpg="lnky"; else $currpg="lnkn";
		  print "<a href='user.php?frm=orderedit&sel_cat=".$_REQUEST['sel_cat']."&strt=".$strt."&pgn=".$pgno."' class='$currpg'>".$pgno."</a> ";
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

  <? } ?></td>
  </tr>
  </form>
</table>
<script type="text/javascript" src="../ModalPopups.js" language="javascript"></script>
 <script type="text/javascript" language="javascript">

		
		
        function ModalPopupsAlert88(ds) {

            ModalPopups.Alert("jsAlert99",

                "View Booked MA Real Estate Pre-License Course",

                "", 

                {

                    okButtonText: "Close",

                    loadTextFile: "class_view.php?id="+ds,

                    width: 500,

                    height: 400

                }

            );

        }   
  
		</script>