<?php
include('../includes/config.php');

$id= stripslashes($_REQUEST['id']);
 $sql="select * from calendar where id='".$id."'";
$qry=mysql_query($sql);
$res=mysql_fetch_assoc($qry);
				$title=$res['title'];
				$start_date=$res['date1'];
				$end_date=$res['end_date1'];
                $st_date=date('m-d-Y',strtotime($start_date));
				$en_date=date('m-d-Y',strtotime($end_date));
?>
<html>
<head>

</head>
<body>

<table border="0" cellpadding="0" cellspacing="5" style="font:11px Verdana, Arial, Helvetica, sans-serif;
color:#000000; margin-top:0;" align="right" width="90%">
<tr>
<td align="left" width="20%"><b>Title:&nbsp;&nbsp;</b></td>
<td width="80%" align="left"><?php echo $title;?></td>
</tr>
<tr>
<td align="left" ><b>Start Date:&nbsp;&nbsp;</b></td>
<td align="left"><?php echo $st_date;?></td>
</tr>
<tr>
<td align="left"><b>End Date:&nbsp;&nbsp;</b></td>
<td align="left"><?php echo $en_date;?></td>
</tr><tr>
<td align="left"><b>Where:&nbsp;&nbsp;</b></td>
<td align="left"><?php echo stripslashes($res['where1']);?></td>
</tr>
<tr>
<td align="left"><b>When:&nbsp;&nbsp;</b></td>
<td align="left"><?php echo stripslashes($res['when1']);?></td>
</tr>
<tr>
<td align="left"><b>Time:&nbsp;&nbsp;</b></td>
<td align="left"><?php echo stripslashes($res['time'])." " .$res['ampm'];?></td>
</tr>
<tr>
<td align="left"><b>Cost:</b>&nbsp;&nbsp;</td>
<td align="left">$<?php echo stripslashes($res['cost']);?></td>
</tr>
<tr>
<td align="left" colspan="2"><b>Description:&nbsp;&nbsp;</b></td>
</tr>
<tr>
<td colspan="2"><?php echo stripslashes($res['description']);?></td>
</tr>

<tr>
  <td align="left">&nbsp;</td>
  <td>&nbsp;</td>
</tr>

</table>
</body>
</html>