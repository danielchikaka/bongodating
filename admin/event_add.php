<?


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

if($num==0)
{

$ins="insert into calendar set title='".$title."',date1='".$start_date."',end_date1='".$end_date."',where1='".$where."',when1='".$when."',time='".$time."',ampm='".$ampm."',cost='".$cost."',description='".$description."',is_active='Y',event_id='".$id."'";
mysql_query($ins);
$err='Event Add successfully';
?>
<script>javascript:location.href="user.php?frm=event_edit&err=<?=$err?>";</script><? 
}
else
{

$err='Event already exist';
?>
<script>javascript:location.href="user.php?frm=event_add&err=<?=$err?>";</script><? 
}
   }
   else 
	  { 
		//$err="Please upload at least one image in 1st box."; 
	
	  }
	
	



?>
<html>
<head>

	<script language="JavaScript" src="calendra/calendar_us.js"></script>
	<link rel="stylesheet" href="calendra/calendar.css">
	</head>
	<body>
    <table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
<form action="user.php?frm=event_add" name="frm_email" method="post" onSubmit="return validate();">

<tr valign="bottom"><td></td><td align="left"><strong>Event</strong></td></tr>

<tr valign="middle"><td align="right" valign="top">
Title
</td><td align="left">
<input name="title" type="text" class="txtfield" style="width:350px;" value="<?=$_POST['tfname']?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Start Date
</td><td align="left">
<input type="text" id="calendra" name="calendra"  readonly="readonly"/>
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
<input type="text" id="calendra1" name="calendra1"  readonly="readonly"/>
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
<input name="where" type="text" class="txtfield" style="width:350px;"/>
</td></tr>



<tr valign="middle"><td align="right" valign="top">
When
</td><td align="left">
<input name="when" type="text" class="txtfield" style="width:350px;" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Time
</td><td align="left">
<input name="time" type="text" class="txtfield" style="width:350px;" /><select name="ampm"><option value="AM">AM</option><option value="PM">PM</option></select>
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Cost
</td><td align="left">
<input name="cost" type="text" class="txtfield" style="width:350px;" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">Description</td><td align="left">
<textarea name="pc_TR_body" rows="10" id="pc_TR_body" style="width:200px"></textarea>
</td>
</tr>


  <tr align="center" valign="middle"><td height="40" colspan="3">
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
