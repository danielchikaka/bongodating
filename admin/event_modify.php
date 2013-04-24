<?
$gid=trim($_GET['id']);
if($_POST['btn_save']=="Submit")
{
$title=trim($_POST['title']);
$event_date=trim($_POST['calendra']);
//$start_date=date('Y-m-d',strtotime($event_date));
$month = substr($event_date,0,2);
$day = substr($event_date,3,2);
$year = substr($event_date,6,4);
 $start_date= $year."-".$month."-".$day;
$end_date1=trim($_POST['calendra1']);
//$end_date=date('Y-m-d',strtotime($end_date1));
$month1 = substr($end_date1,0,2);
$day1 = substr($end_date1,3,2);
$year1 = substr($end_date1,6,4);
$end_date= $year1."-".$month1."-".$day1;
if($end_date=="--")
{
$end_date="";
}
else
{
$end_date=$end_date;
}
 $where=trim($_POST['where']);
 $when=trim($_POST['when']);
 $time=trim($_POST['time']);
 $ampm=trim($_POST['ampm']);
 $cost=trim($_POST['cost']);
 $description= addslashes($_POST['pc_TR_body']);
$sql="select id from calendar  where date1='".$start_date."' group by event_id";
$qry=mysql_query($sql);
 $num=mysql_num_rows($qry);

 $ins="update calendar set title='".$title."',date1='".$start_date."',end_date1='".$end_date."',where1='".$where."',when1='".$when."',time='".$time."',ampm='".$ampm."',cost='".$cost."',description='".$description."',event_id='".$id."' where id='".$_POST['hid']."'";
mysql_query($ins);
$err='Event Update successfully';
?>
<script>javascript:location.href="user.php?frm=event_edit&err=<?=$err?>";</script><? 
}

	
 $wes="select * from calendar where id='".$gid."'";
$rde=mysql_query($wes);
$result=mysql_fetch_assoc($rde);
$tittle1=$result['title'];
$event1_date=$result['date1'];
$start_date11=date('m/d/Y',strtotime($event1_date));
 $end_dates=$result['end_date1'];
$end_datess=date('m/d/Y',strtotime($end_dates));
$ampm=$result['ampm'];
$description11=stripslashes($result['description']);
?>
<html>
<head>

	<script language="JavaScript" src="calendra/calendar_us.js"></script>
	<link rel="stylesheet" href="calendra/calendar.css">
	</head>
	<body>
<table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
<form action="user.php?frm=event_modify" name="frm_email" method="post" onSubmit="return validate();">

<tr valign="bottom"><td></td><td align="left"><strong>Event</strong></td></tr>

<tr valign="middle"><td align="right" valign="top">
Title
</td><td align="left">
<input name="title" type="text" class="txtfield" style="width:350px;" value="<?=$tittle1?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Start Date
</td><td align="left">
<input type="text" id="calendra" name="calendra"  readonly="readonly" value="<?=$start_date11?>"/>
					    	<script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'frm_email',
		// input name
		'controlname': 'calendra'
	});

	</script>
</td></tr>
<tr valign="middle"><td align="right" valign="top">
End Date
</td><td align="left">
<input type="text" id="calendra1" name="calendra1"  readonly="readonly" value="<?=$end_datess?>"/>
					    	<script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'frm_email',
		// input name
		'controlname': 'calendra1'
	});

	</script>
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Where
</td><td align="left">
<input name="where" type="text" class="txtfield" style="width:350px;" value="<?=stripslashes($result['where1'])?>"/>
</td></tr>



<tr valign="middle"><td align="right" valign="top">
When
</td><td align="left">
<input name="when" type="text" class="txtfield" style="width:350px;"  value="<?=stripslashes($result['when1'])?>"/>
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Time
</td><td align="left">
<input name="time" type="text" class="txtfield" style="width:350px;"  value="<?=stripslashes($result['time'])?>"/><select name="ampm"><option value="AM" <?php if($ampm=='AM') echo "selected"; ?>>AM</option><option value="PM" <?php if($ampm=='PM') echo "selected"; ?>>PM</option></select>
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Cost
</td><td align="left">
<input name="cost" type="text" class="txtfield" style="width:350px;"  value="<?=$result['cost']?>"/>
</td></tr>
<tr valign="middle"><td align="right" valign="top">Description</td><td align="left">
<textarea name="pc_TR_body" rows="10" id="pc_TR_body" style="width:200px"> <?=stripslashes($result['description'])?></textarea>
</td>
</tr>


  <tr align="center" valign="middle"><td height="40" colspan="3">
  <input type="hidden" name="hid" value="<?=$_GET['id']?>">
	  <input name="btn_save" type="submit" class="button2" value="Submit" />
	  <input type="button" class="button2" value="Cancel" onClick="javascript:location.href='user.php?frm=admin_panel';" /></td>
	</tr>
</form>
</table>

  <SCRIPT language=JavaScript type=text/javascript>
  //You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("frm_email");
frmvalidator.addValidation("title","req","Please enter Title");  
   frmvalidator.addValidation("calendra","req","Please Select event Date");  
  </SCRIPT>
</table>