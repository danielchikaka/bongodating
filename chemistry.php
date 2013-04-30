<?php 
session_start();
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

// fetch chemistry records 
$chem		= mysql_query("select user_id from chemistry_user where user_id = '".$_SESSION['userid']."' ");
$fetch_cem	= mysql_fetch_array($chem);
$avlbuser	= $fetch_cem['user_id'];

if($avlbuser!='')
{
	header("location:chemistry_result.php");
}

// Add chemistry Records
if(isset($_POST['submit']))
{
	$query= mysql_query("insert into chemistry_user set 
			user_id	= '".$_SESSION['userid']."' , 
			ques1 	= '".addslashes($_POST['qu1'])."',
			ans1 	= '".addslashes($_POST['q1'])."',
			ques2 	= '".addslashes($_POST['qu2'])."',
			ans2 	= '".addslashes($_POST['q2'])."',
			ques3 	= '".addslashes($_POST['qu3'])."',
			ans3 	= '".addslashes($_POST['q3'])."',
			ques4 	= '".addslashes($_POST['qu4'])."',
			ans4 	= '".addslashes($_POST['q4'])."',
			ques5 	= '".addslashes($_POST['qu5'])."',
			ans5 	= '".addslashes($_POST['q5'])."',
			ques6 	= '".addslashes($_POST['qu6'])."',
			ans6 	= '".addslashes($_POST['q6'])."',
			ques7 	= '".addslashes($_POST['qu7'])."',
			ans7 	= '".addslashes($_POST['q7'])."',
			ques8	= '".addslashes($_POST['qu8'])."',
			ans8 	= '".addslashes($_POST['q8'])."',
			ques9 	= '".addslashes($_POST['qu9'])."',
			ans9 	= '".addslashes($_POST['q9'])."',
			ques10 	= '".addslashes($_POST['qu10'])."',
			ans10 	= '".addslashes($_POST['q10'])."',
			ques11 	= '".addslashes($_POST['qu11'])."',
			ans11 	= '".addslashes($_POST['q11'])."',
			ques12 	= '".addslashes($_POST['qu12'])."',
			ans12 	= '".addslashes($_POST['q12'])."',
			ques13 	= '".addslashes($_POST['qu13'])."',
			ans13 	= '".addslashes($_POST['q13'])."',
			ques14 	= '".addslashes($_POST['qu14'])."',
			ans14 	= '".addslashes($_POST['q14'])."',
			ques15 	= '".addslashes($_POST['qu15'])."',
			ans15 	= '".addslashes($_POST['q15'])."',
			ques16 	= '".addslashes($_POST['qu16'])."',
			ans16	= '".addslashes($_POST['q16'])."',
			ques17	= '".addslashes($_POST['qu17'])."',
			ans17	= '".addslashes($_POST['q17'])."',
			ques18	= '".addslashes($_POST['qu18'])."',
			ans18	= '".addslashes($_POST['q18'])."',
			ques19 	= '".addslashes($_POST['qu19'])."',
			ans19	= '".addslashes($_POST['q19'])."',
			ques20	= '".addslashes($_POST['qu20'])."',
			ans20	= '".addslashes($_POST['q20'])."',
			ques21	= '".addslashes($_POST['qu21'])."',
			ans21	= '".addslashes($_POST['q21'])."',
			ques22	= '".addslashes($_POST['qu22'])."',
			ans22	= '".addslashes($_POST['q22'])."',
			ques23	= '".addslashes($_POST['qu23'])."',
			ans23	= '".addslashes($_POST['q23'])."',
			ques24	= '".addslashes($_POST['qu24'])."',
			ans24	= '".addslashes($_POST['q24'])."',
			ques25	= '".addslashes($_POST['qu25'])."',
			ans25	= '".addslashes($_POST['q25'])."',
			ques26	= '".addslashes($_POST['qu26'])."',
			ans26	= '".addslashes($_POST['q26'])."',
			ques27	= '".addslashes($_POST['qu27'])."',
			ans27	= '".addslashes($_POST['q27'])."',
			ques28 	= '".addslashes($_POST['qu28'])."',
			ans28	= '".addslashes($_POST['q28'])."',
			ques29	= '".addslashes($_POST['qu29'])."',
			ans29	= '".addslashes($_POST['q29'])."',
			ques30	= '".addslashes($_POST['qu30'])."',
			ans30	= '".addslashes($_POST['q30'])."',
			ques31	= '".addslashes($_POST['qu31'])."',
			ans31	= '".addslashes($_POST['q31'])."',
			ques32	= '".addslashes($_POST['qu32'])."',
			ans32	= '".addslashes($_POST['q32'])."',
			ques33	= '".addslashes($_POST['qu33'])."',
			ans33	= '".addslashes($_POST['q33'])."',
			ques34	= '".addslashes($_POST['qu34'])."',
			ans34	= '".addslashes($_POST['q34'])."',
			ques35	= '".addslashes($_POST['qu35'])."',
			ans35	= '".addslashes($_POST['q35'])."',
			ques36	= '".addslashes($_POST['qu36'])."',
			ans36	= '".addslashes($_POST['q36'])."',
			ques37	= '".addslashes($_POST['qu37'])."',
			ans37	= '".addslashes($_POST['q37'])."',
			ques38	= '".addslashes($_POST['qu38'])."',
			ans38	= '".addslashes($_POST['q38'])."',
			ques39	= '".addslashes($_POST['qu39'])."',
			ans39	= '".addslashes($_POST['q39'])."',
			ques40	= '".addslashes($_POST['qu40'])."',
			ans40	= '".addslashes($_POST['q40'])."',
			ques41	= '".addslashes($_POST['qu41'])."',
			ans41	= '".addslashes($_POST['q41'])."',
			ques42	= '".addslashes($_POST['qu42'])."',
			ans42	= '".addslashes($_POST['q42'])."',
			ques43	= '".addslashes($_POST['qu43'])."',
			ans43	= '".addslashes($_POST['q43'])."',
			ques44	= '".addslashes($_POST['qu44'])."',
			ans44	= '".addslashes($_POST['q44'])."',
			ques45	= '".addslashes($_POST['qu45'])."',
			ans45 	= '".addslashes($_POST['q45'])."',
			ques46	= '".addslashes($_POST['qu46'])."',
			ans46	= '".addslashes($_POST['q46'])."',
			ques47	= '".addslashes($_POST['qu47'])."',
			ans47	= '".addslashes($_POST['q47'])."',
			ques48	= '".addslashes($_POST['qu48'])."',
			ans48	= '".addslashes($_POST['q48'])."',
			ques49	= '".addslashes($_POST['qu49'])."',
			ans49	= '".addslashes($_POST['q49'])."',
			ques50	= '".addslashes($_POST['qu50'])."',
			ans50	= '".addslashes($_POST['q50'])."',
			ques51	= '".addslashes($_POST['qu51'])."',
			ans51	= '".addslashes($_POST['q51'])."',
			ques52	= '".addslashes($_POST['qu52'])."',
			ans52	= '".addslashes($_POST['q52'])."',
			ques53	= '".addslashes($_POST['qu53'])."',
			ans53	= '".addslashes($_POST['q53'])."',
			ques54	= '".addslashes($_POST['qu54'])."',
			ans54	= '".addslashes($_POST['q54'])."',
			ques55	= '".addslashes($_POST['qu55'])."',
			ans55	= '".addslashes($_POST['q55'])."',
			ques56	= '".addslashes($_POST['qu56'])."',
			ans56	= '".addslashes($_POST['q56'])."',
			ques57	= '".addslashes($_POST['qu57'])."',
			ans57	= '".addslashes($_POST['q57'])."',
			ques58	= '".addslashes($_POST['qu58'])."',
			ans58	= '".addslashes($_POST['q58'])."',
			ques59	= '".addslashes($_POST['qu59'])."',
			ans59	= '".addslashes($_POST['q59'])."',
			ques60	= '".addslashes($_POST['qu60'])."',
			ans60	= '".addslashes($_POST['q60'])."',
			ques61	= '".addslashes($_POST['qu61'])."',
			ans61	= '".addslashes($_POST['q61'])."',
			ques62	= '".addslashes($_POST['qu62'])."',
			ans62	= '".addslashes($_POST['q62'])."',
			ques63	= '".addslashes($_POST['qu63'])."',
			ans63	= '".addslashes($_POST['q63'])."',
			ques64 	= '".addslashes($_POST['qu64'])."',
			ans64	= '".addslashes($_POST['q64'])."',
			ques65	= '".addslashes($_POST['qu65'])."',
			ans65	= '".addslashes($_POST['q65'])."',
			ques66	= '".addslashes($_POST['qu66'])."',
			ans66	= '".addslashes($_POST['q66'])."',
			ques67	= '".addslashes($_POST['qu67'])."',
			ans67	= '".addslashes($_POST['q67'])."',
			ques68	= '".addslashes($_POST['qu68'])."',
			ans68	= '".addslashes($_POST['q68'])."',
			ques69	= '".addslashes($_POST['qu69'])."',
			ans69	= '".addslashes($_POST['q69'])."',
			ques70	= '".addslashes($_POST['qu70'])."',
			ans70	= '".addslashes($_POST['q70'])."',
			ques71	= '".addslashes($_POST['qu71'])."',
			ans71	= '".addslashes($_POST['q71'])."',
			ques72	= '".addslashes($_POST['qu72'])."',
			ans72	= '".addslashes($_POST['q72'])."',
			ques73	= '".addslashes($_POST['qu73'])."',
			ans73	= '".addslashes($_POST['q73'])."'") or die(mysql_error());
			
			if($query)
			{
				header("location:chemistry_result.php");
			}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME; ?></title>
<meta name="description" content="<?php echo SITE_DESCRIPTION; ?>"/>
<meta name="keywords" content="<?php echo SITE_KEYWORD; ?>"/>
<link rel="shortcut icon" type="image/x-icon" href="images/logo/<?php echo SITE_FAVICON; ?>"/>
<link href="templates/default/css/main.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="js/slideshow.js"></script>
<script type="text/javascript" language="javascript">
function valid(){
//var msg="Select answer question";
var msg="";
if (!document.chemistry.q1[0].checked && !document.chemistry.q1[1].checked && !document.chemistry.q1[2].checked && !document.chemistry.q1[3].checked){ 
msg ="Select answer question"+1;
}
if (!document.chemistry.q2[0].checked && !document.chemistry.q2[1].checked && !document.chemistry.q2[2].checked && !document.chemistry.q2[3].checked){ 
msg = msg+","+2;
}
if (!document.chemistry.q3[0].checked && !document.chemistry.q3[1].checked && !document.chemistry.q3[2].checked && !document.chemistry.q3[3].checked){ 
msg = msg+","+3;
}
if (!document.chemistry.q4[0].checked && !document.chemistry.q4[1].checked && !document.chemistry.q4[2].checked && !document.chemistry.q4[3].checked){ 
msg = msg+","+4;
}
if (!document.chemistry.q5[0].checked && !document.chemistry.q5[1].checked && !document.chemistry.q5[2].checked && !document.chemistry.q5[3].checked){ 
msg = msg+","+5;
}
if (!document.chemistry.q6[0].checked && !document.chemistry.q6[1].checked && !document.chemistry.q6[2].checked && !document.chemistry.q6[3].checked){ 
msg = msg+","+6;
}
if (!document.chemistry.q7[0].checked && !document.chemistry.q7[1].checked && !document.chemistry.q7[2].checked && !document.chemistry.q7[3].checked){ 
msg = msg+","+7;
}
if (!document.chemistry.q8[0].checked && !document.chemistry.q8[1].checked && !document.chemistry.q8[2].checked && !document.chemistry.q8[3].checked){ 
msg = msg+","+8;
}
if (!document.chemistry.q9[0].checked && !document.chemistry.q9[1].checked && !document.chemistry.q9[2].checked && !document.chemistry.q9[3].checked){ 
msg = msg+","+9;
}
if (!document.chemistry.q10[0].checked && !document.chemistry.q10[1].checked && !document.chemistry.q10[2].checked && !document.chemistry.q10[3].checked){ 
msg = msg+","+10;
}
if (!document.chemistry.q11[0].checked && !document.chemistry.q11[1].checked && !document.chemistry.q11[2].checked && !document.chemistry.q11[3].checked){ 
msg = msg+","+11;
}
if (!document.chemistry.q12[0].checked && !document.chemistry.q12[1].checked && !document.chemistry.q12[2].checked && !document.chemistry.q12[3].checked){ 
msg = msg+","+12;
}
if (!document.chemistry.q13[0].checked && !document.chemistry.q13[1].checked && !document.chemistry.q13[2].checked && !document.chemistry.q13[3].checked){ 
msg = msg+","+13;
}
if (!document.chemistry.q14[0].checked && !document.chemistry.q14[1].checked && !document.chemistry.q14[2].checked && !document.chemistry.q14[3].checked){ 
msg = msg+","+14;
}
if (!document.chemistry.q15[0].checked && !document.chemistry.q15[1].checked && !document.chemistry.q15[2].checked && !document.chemistry.q15[3].checked){ 
msg = msg+","+15;
}
if (!document.chemistry.q16[0].checked && !document.chemistry.q16[1].checked && !document.chemistry.q16[2].checked && !document.chemistry.q16[3].checked){ 
msg = msg+","+16;
}
if (!document.chemistry.q17[0].checked && !document.chemistry.q17[1].checked && !document.chemistry.q17[2].checked && !document.chemistry.q17[3].checked){ 
msg = msg+","+17;
}
if (!document.chemistry.q18[0].checked && !document.chemistry.q18[1].checked && !document.chemistry.q18[2].checked && !document.chemistry.q18[3].checked){ 
msg = msg+","+18;
}
if (!document.chemistry.q19[0].checked && !document.chemistry.q19[1].checked && !document.chemistry.q19[2].checked && !document.chemistry.q19[3].checked){ 
msg = msg+","+19;
}
if (!document.chemistry.q20[0].checked && !document.chemistry.q20[1].checked && !document.chemistry.q20[2].checked && !document.chemistry.q20[3].checked){ 
msg = msg+","+20;
}
if (!document.chemistry.q21[0].checked && !document.chemistry.q21[1].checked && !document.chemistry.q21[2].checked && !document.chemistry.q21[3].checked){ 
msg = msg+","+21;
}
if (!document.chemistry.q22[0].checked && !document.chemistry.q22[1].checked && !document.chemistry.q22[2].checked && !document.chemistry.q22[3].checked){ 
msg = msg+","+22;
}
if (!document.chemistry.q23[0].checked && !document.chemistry.q23[1].checked && !document.chemistry.q23[2].checked && !document.chemistry.q23[3].checked){ 
msg = msg+","+23;
}
if (!document.chemistry.q24[0].checked && !document.chemistry.q24[1].checked && !document.chemistry.q24[2].checked && !document.chemistry.q24[3].checked){ 
msg = msg+","+24;
}
if (!document.chemistry.q25[0].checked && !document.chemistry.q25[1].checked && !document.chemistry.q25[2].checked && !document.chemistry.q25[3].checked){ 
msg = msg+","+25;
}
if (!document.chemistry.q26[0].checked && !document.chemistry.q26[1].checked && !document.chemistry.q26[2].checked && !document.chemistry.q26[3].checked){ 
msg = msg+","+26;
}
if (!document.chemistry.q27[0].checked && !document.chemistry.q27[1].checked && !document.chemistry.q27[2].checked && !document.chemistry.q27[3].checked){ 
msg = msg+","+27+"\n";
}if (!document.chemistry.q28[0].checked && !document.chemistry.q28[1].checked && !document.chemistry.q28[2].checked && !document.chemistry.q28[3].checked){ 
msg = msg+","+28;

}
if (!document.chemistry.q29[0].checked && !document.chemistry.q29[1].checked && !document.chemistry.q29[2].checked && !document.chemistry.q29[3].checked){ 
msg = msg+","+29;
}
if (!document.chemistry.q30[0].checked && !document.chemistry.q30[1].checked && !document.chemistry.q30[2].checked && !document.chemistry.q30[3].checked){ 
msg = msg+","+30;

}
if (!document.chemistry.q31[0].checked && !document.chemistry.q31[1].checked && !document.chemistry.q31[2].checked && !document.chemistry.q31[3].checked){ 
msg = msg+","+31;

}
if (!document.chemistry.q32[0].checked && !document.chemistry.q32[1].checked && !document.chemistry.q32[2].checked && !document.chemistry.q32[3].checked){ 
msg = msg+","+32;
}
if (!document.chemistry.q33[0].checked && !document.chemistry.q33[1].checked && !document.chemistry.q33[2].checked && !document.chemistry.q33[3].checked){ 
msg = msg+","+33;
}
if (!document.chemistry.q34[0].checked && !document.chemistry.q34[1].checked && !document.chemistry.q34[2].checked && !document.chemistry.q34[3].checked){ 
msg = msg+","+34;
}
if (!document.chemistry.q35[0].checked && !document.chemistry.q35[1].checked && !document.chemistry.q35[2].checked && !document.chemistry.q35[3].checked){ 
msg = msg+","+35;
}
if (!document.chemistry.q36[0].checked && !document.chemistry.q36[1].checked && !document.chemistry.q36[2].checked && !document.chemistry.q36[3].checked){ 
msg = msg+","+36;
}
if (!document.chemistry.q37[0].checked && !document.chemistry.q37[1].checked && !document.chemistry.q37[2].checked && !document.chemistry.q37[3].checked){ 
msg = msg+","+37;
}
if (!document.chemistry.q38[0].checked && !document.chemistry.q38[1].checked && !document.chemistry.q38[2].checked && !document.chemistry.q38[3].checked){ 
msg = msg+","+38;
}
if (!document.chemistry.q39[0].checked && !document.chemistry.q39[1].checked && !document.chemistry.q39[2].checked && !document.chemistry.q39[3].checked){ 
msg = msg+","+39;
}
if (!document.chemistry.q40[0].checked && !document.chemistry.q40[1].checked && !document.chemistry.q40[2].checked && !document.chemistry.q40[3].checked){ 
msg = msg+","+40;
}
if (!document.chemistry.q41[0].checked && !document.chemistry.q41[1].checked && !document.chemistry.q41[2].checked && !document.chemistry.q41[3].checked){ 
msg = msg+","+41;
}
if (!document.chemistry.q42[0].checked && !document.chemistry.q42[1].checked && !document.chemistry.q42[2].checked && !document.chemistry.q42[3].checked){ 
msg = msg+","+42;
}
if (!document.chemistry.q43[0].checked && !document.chemistry.q43[1].checked && !document.chemistry.q43[2].checked && !document.chemistry.q43[3].checked){ 
msg = msg+","+43;
}
if (!document.chemistry.q44[0].checked && !document.chemistry.q44[1].checked && !document.chemistry.q44[2].checked && !document.chemistry.q44[3].checked){ 
msg = msg+","+44;
}
if (!document.chemistry.q45[0].checked && !document.chemistry.q45[1].checked && !document.chemistry.q45[2].checked && !document.chemistry.q45[3].checked){ 
msg = msg+","+45;
}
if (!document.chemistry.q46[0].checked && !document.chemistry.q46[1].checked && !document.chemistry.q46[2].checked && !document.chemistry.q46[3].checked){ 
msg = msg+","+46;
}
if (!document.chemistry.q47[0].checked && !document.chemistry.q47[1].checked && !document.chemistry.q47[2].checked && !document.chemistry.q47[3].checked){ 
msg = msg+","+47;
}
if (!document.chemistry.q48[0].checked && !document.chemistry.q48[1].checked && !document.chemistry.q48[2].checked && !document.chemistry.q48[3].checked){ 
msg = msg+","+48;
}
if (!document.chemistry.q49[0].checked && !document.chemistry.q49[1].checked && !document.chemistry.q49[2].checked && !document.chemistry.q49[3].checked){ 
msg = msg+","+49;
}
if (!document.chemistry.q50[0].checked && !document.chemistry.q50[1].checked && !document.chemistry.q50[2].checked && !document.chemistry.q50[3].checked){ 
msg = msg+","+50;
}
if (!document.chemistry.q51[0].checked && !document.chemistry.q51[1].checked && !document.chemistry.q51[2].checked && !document.chemistry.q41[3].checked){ 
msg = msg+","+51;
}
if (!document.chemistry.q52[0].checked && !document.chemistry.q52[1].checked && !document.chemistry.q52[2].checked && !document.chemistry.q52[3].checked){ 
msg = msg+","+52;

}
if (!document.chemistry.q53[0].checked && !document.chemistry.q53[1].checked && !document.chemistry.q53[2].checked && !document.chemistry.q53[3].checked){ 
msg = msg+","+53;
}
if (!document.chemistry.q54[0].checked && !document.chemistry.q54[1].checked && !document.chemistry.q54[2].checked && !document.chemistry.q54[3].checked){ 
msg = msg+","+54;
}
if (!document.chemistry.q55[0].checked && !document.chemistry.q55[1].checked && !document.chemistry.q55[2].checked && !document.chemistry.q55[3].checked){ 
msg = msg+","+55;

}
if (!document.chemistry.q56[0].checked && !document.chemistry.q56[1].checked && !document.chemistry.q56[2].checked && !document.chemistry.q56[3].checked){ 
msg = msg+","+56;
}
if (!document.chemistry.q57[0].checked && !document.chemistry.q57[1].checked && !document.chemistry.q57[2].checked && !document.chemistry.q57[3].checked){ 
msg = msg+","+57;
}
if (!document.chemistry.q58[0].checked && !document.chemistry.q58[1].checked && !document.chemistry.q58[2].checked && !document.chemistry.q58[3].checked){ 
msg = msg+","+58+"\n";
}
if (!document.chemistry.q59[0].checked && !document.chemistry.q59[1].checked && !document.chemistry.q59[2].checked && !document.chemistry.q59[3].checked){ 
msg = msg+","+59;
}if (!document.chemistry.q60[0].checked && !document.chemistry.q60[1].checked && !document.chemistry.q60[2].checked && !document.chemistry.q60[3].checked){ 
msg = msg+","+60;
}
if (!document.chemistry.q61[0].checked && !document.chemistry.q61[1].checked && !document.chemistry.q61[2].checked && !document.chemistry.q61[3].checked){ 
msg = msg+","+61;
}

if (!document.chemistry.q62[0].checked && !document.chemistry.q62[1].checked && !document.chemistry.q62[2].checked && !document.chemistry.q62[3].checked){ 
msg = msg+","+62;
}
if (!document.chemistry.q63[0].checked && !document.chemistry.q63[1].checked && !document.chemistry.q63[2].checked && !document.chemistry.q63[3].checked){ 
msg = msg+","+63;
}
if (!document.chemistry.q64[0].checked && !document.chemistry.q64[1].checked && !document.chemistry.q64[2].checked && !document.chemistry.q64[3].checked){ 
msg = msg+","+64;
}
if (!document.chemistry.q65[0].checked && !document.chemistry.q65[1].checked && !document.chemistry.q65[2].checked && !document.chemistry.q65[3].checked){ 
msg = msg+","+65;
}
if (!document.chemistry.q66[0].checked && !document.chemistry.q66[1].checked && !document.chemistry.q66[2].checked && !document.chemistry.q66[3].checked){ 
msg = msg+","+66;
}
if (!document.chemistry.q67[0].checked && !document.chemistry.q67[1].checked && !document.chemistry.q67[2].checked && !document.chemistry.q67[3].checked){ 
msg = msg+","+67;
}
if (!document.chemistry.q68[0].checked && !document.chemistry.q68[1].checked && !document.chemistry.q68[2].checked && !document.chemistry.q68[3].checked){ 
msg = msg+","+68;
}

if (!document.chemistry.q69[0].checked && !document.chemistry.q69[1].checked && !document.chemistry.q69[2].checked && !document.chemistry.q69[3].checked){ 
msg = msg+","+69;
}

if (!document.chemistry.q70[0].checked && !document.chemistry.q70[1].checked && !document.chemistry.q70[2].checked && !document.chemistry.q70[3].checked){ 
msg = msg+","+70;
}

if (!document.chemistry.q71[0].checked && !document.chemistry.q71[1].checked && !document.chemistry.q71[2].checked && !document.chemistry.q71[3].checked){ 
msg = msg+","+71;
}

if (!document.chemistry.q72[0].checked && !document.chemistry.q72[1].checked && !document.chemistry.q72[2].checked && !document.chemistry.q72[3].checked){ 
msg = msg+","+72;
}
if (!document.chemistry.q73[0].checked && !document.chemistry.q73[1].checked && !document.chemistry.q73[2].checked && !document.chemistry.q73[3].checked){ 
msg = msg+","+73;
}
if (msg !="") {
alert(msg);
return false;
}

return true;
}
</script>
</head>
<body>
  <?php include_once("header.php");?>
<div id="wrapper">
  <div id="maincont">
    <div id="illust">
      <form name="chemistry" id="chemistry" method="post" action="" onsubmit="return valid();">
        <div class="chemistry_main">
          <div class="chemistry_hd_txt"><?php echo SITE_NAME;?> Relationship Chemistry Predictor</div>
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1"> 1. I get nervous easily.</div>
          <div class="radio">
            <input name="q1" id="q1" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q1" id="q1" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q1" id="q1" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q1" id="q1" type="radio" value="Agree" />
          </div>
          <input name="qu1" id="qu1" type="hidden" value="I get nervous easily." />
          <div class="clr"></div>
          <div class="chemistry_txt1"> 2. I am not easily embarrassed by others.</div>
          <div class="radio">
            <input name="q2" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q2" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q2" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q2" type="radio" value="Agree" />
          </div>
          <input name="qu2" id="qu2" type="hidden" value="I am not easily embarrassed by others." />
          <div class="clr"></div>
          <div class="chemistry_txt1"> 3. I tend to become very enthusiastic about new things.</div>
          <div class="radio">
            <input name="q3" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q3" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q3" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q3" type="radio" value="Agree" />
          </div>
          <input name="qu3" id="qu3" type="hidden" value="I tend to become very enthusiastic about new things." />
          <div class="clr"></div>
          <div class="chemistry_txt1">4. My own thoughts and feelings sometimes scare me. </div>
          <div class="radio">
            <input name="q4" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q4" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q4" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q4" type="radio" value="Agree" />
          </div>
          <input name="qu4" id="qu4" type="hidden" value="My own thoughts and feelings sometimes scare me." />
          <div class="clr"></div>
          <div class="chemistry_txt1">5. I tend to work too long and hard. </div>
          <div class="radio">
            <input name="q5" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q5" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q5" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q5" type="radio" value="Agree" />
          </div>
          <input name="qu5" id="qu5" type="hidden" value="I tend to work too long and hard." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">6. I am a very productive person. </div>
          <div class="radio">
            <input name="q6" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q6" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q6" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q6" type="radio" value="Agree" />
          </div>
          <input name="qu6" id="qu6" type="hidden" value="I am a very productive person." />
          <div class="clr"></div>
          <div class="chemistry_txt1">7. I would much rather eat dinner at a restaurant than at home. </div>
          <div class="radio">
            <input name="q7" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q7" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q7" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q7" type="radio" value="Agree" />
          </div>
          <input name="qu7" id="qu7" type="hidden" value="I would much rather eat dinner at a restaurant than at home." />
          <div class="clr"></div>
          <div class="chemistry_txt1">8. I am comfortable interacting with strangers. </div>
          <div class="radio">
            <input name="q8" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q8" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q8" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q8" type="radio" value="Agree" />
          </div>
          <input name="qu7" id="qu8" type="hidden" value="I am comfortable interacting with strangers." />
          <div class="clr"></div>
          <div class="chemistry_txt1">9. I want my children to speak English. </div>
          <div class="radio">
            <input name="q9" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q9" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q9" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q9" type="radio" value="Agree" />
          </div>
          <input name="qu9" id="qu9" type="hidden" value="I want my children to speak English." />
          <div class="clr"></div>
          <div class="chemistry_txt1">10. Its difficult for me to feel sorry for people less fortunate than myself. </div>
          <div class="radio">
            <input name="q10" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q10" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q10" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q10" type="radio" value="Agree" />
          </div>
          <input name="qu10" id="qu10" type="hidden" value="Its difficult for me to feel sorry for people less fortunate than myself." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">11. I am looking for someone to be just friends with. </div>
          <div class="radio">
            <input name="q11" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q11" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q11" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q11" type="radio" value="Agree" />
          </div>
          <input name="qu11" id="qu11" type="hidden" value="I am looking for someone to be just friends with." />
          <div class="clr"></div>
          <div class="chemistry_txt1">12. Basically I am a happy person. </div>
          <div class="radio">
            <input name="q12" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q12" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q12" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q12" type="radio" value="Agree" />
          </div>
          <input name="qu12" id="qu12" type="hidden" value="Basically I am a happy person." />
          <div class="clr"></div>
          <div class="chemistry_txt1">13. I can resist temptations easily. </div>
          <div class="radio">
            <input name="q13" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q13" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q13" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q13" type="radio" value="Agree" />
          </div>
          <input name="qu13" id="qu13" type="hidden" value="I can resist temptations easily." />
          <div class="clr"></div>
          <div class="chemistry_txt1">14. My religion is very important to me. </div>
          <div class="radio">
            <input name="q14" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q14" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q14" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q14" type="radio" value="Agree" />
          </div>
          <input name="qu14" id="qu14" type="hidden" value="My religion is very important to me." />
          <div class="clr"></div>
          <div class="chemistry_txt1">15. I like to take care of all the details when doing things. </div>
          <div class="radio">
            <input name="q15" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q15" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q15" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q15" type="radio" value="Agree" />
          </div>
          <input name="qu15" id="qu15" type="hidden" value="I like to take care of all the details when doing things." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">16. I sometimes find it difficult to get used to changes in my life. </div>
          <div class="radio">
            <input name="q16" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q16" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q16" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q16" type="radio" value="Agree" />
          </div>
          <input name="qu16" id="qu16" type="hidden" value="I sometimes find it difficult to get used to changes in my life." />
          <div class="clr"></div>
          <div class="chemistry_txt1">17. My political beliefs are very important to me. </div>
          <div class="radio">
            <input name="q17" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q17" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q17" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q17" type="radio" value="Agree" />
          </div>
          <input name="qu17" id="qu17" type="hidden" value="My political beliefs are very important to me." />
          <div class="clr"></div>
          <div class="chemistry_txt1">18. It is important that my romantic partner is liked by my friends. </div>
          <div class="radio">
            <input name="q18" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q18" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q18" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q18" type="radio" value="Agree" />
          </div>
          <input name="qu18" id="qu18" type="hidden" value="It is important that my romantic partner is liked by my friends." />
          <div class="clr"></div>
          <div class="chemistry_txt1">19. I am looking for someone to possibly begin a long-lasting relationship. </div>
          <div class="radio">
            <input name="q19" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q19" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q19" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q19" type="radio" value="Agree" />
          </div>
          <input name="qu19" id="qu19" type="hidden" value="I am looking for someone to possibly begin a long-lasting relationship." />
          <div class="clr"></div>
          <div class="chemistry_txt1">20. I often do or say things I later regret. </div>
          <div class="radio">
            <input name="q20" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q20" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q20" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q20" type="radio" value="Agree" />
          </div>
          <input name="qu20" id="qu20" type="hidden" value="I often do or say things I later regret." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">21. I think highly of myself. </div>
          <div class="radio">
            <input name="q21" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q21" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q21" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q21" type="radio" value="Agree" />
          </div>
          <input name="qu21" id="qu21" type="hidden" value="I think highly of myself." />
          <div class="clr"></div>
          <div class="chemistry_txt1">22. I would like to have children in the near future. </div>
          <div class="radio">
            <input name="q22" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q22" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q22" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q22" type="radio" value="Agree" />
          </div>
          <input name="qu22" id="qu22" type="hidden" value="I would like to have children in the near future." />
          <div class="clr"></div>
          <div class="chemistry_txt1">23. I have high standards for myself. </div>
          <div class="radio">
            <input name="q23" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q23" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q23" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q23" type="radio" value="Agree" />
          </div>
          <input name="qu23" id="qu23" type="hidden" value="I have high standards for myself." />
          <div class="clr"></div>
          <div class="chemistry_txt1">24. I don't experience strong emotions. </div>
          <div class="radio">
            <input name="q24" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q24" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q24" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q24" type="radio" value="Agree" />
          </div>
          <input name="qu24" id="qu24" type="hidden" value="I don't experience strong emotions." />
          <div class="clr"></div>
          <div class="chemistry_txt1">25. I love all kinds of music. </div>
          <div class="radio">
            <input name="q25" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q25" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q25" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q25" type="radio" value="Agree" />
          </div>
          <input name="qu25" id="qu25" type="hidden" value="I love all kinds of music." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">26. I would love to spend a holiday backpacking through another country. </div>
          <div class="radio">
            <input name="q26" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q26" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q26" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q26" type="radio" value="Agree" />
          </div>
          <input name="qu26" id="qu26" type="hidden" value="I would love to spend a holiday backpacking through another country." />
          <div class="clr"></div>
          <div class="chemistry_txt1">27. My ideal vacation would be on a tropical island. </div>
          <div class="radio">
            <input name="q27" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q27" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q27" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q27" type="radio" value="Agree" />
          </div>
          <input name="qu27" id="qu27" type="hidden" value="My ideal vacation would be on a tropical island." />
          <div class="clr"></div>
          <div class="chemistry_txt1">28. I am a very reliable person. </div>
          <div class="radio">
            <input name="q28" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q28" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q28" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q28" type="radio" value="Agree" />
          </div>
          <input name="qu28" id="qu28" type="hidden" value="I am a very reliable person." />
          <div class="clr"></div>
          <div class="chemistry_txt1">29. I enjoy cooking. </div>
          <div class="radio">
            <input name="q29" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q29" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q29" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q29" type="radio" value="Agree" />
          </div>
          <input name="qu29" id="qu29" type="hidden" value="I enjoy cooking." />
          <div class="clr"></div>
          <div class="chemistry_txt1">30. I prefer working alone than in groups. </div>
          <div class="radio">
            <input name="q30" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q30" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q30" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q30" type="radio" value="Agree" />
          </div>
          <input name="qu30" id="qu30" type="hidden" value="I prefer working alone than in groups." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">31. It is important that I get married soon. </div>
          <div class="radio">
            <input name="q31" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q31" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q31" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q31" type="radio" value="Agree" />
          </div>
          <input name="qu31" id="qu31" type="hidden" value="It is important that I get married soon." />
          <div class="clr"></div>
          <div class="chemistry_txt1">32. I talk more than most people. </div>
          <div class="radio">
            <input name="q32" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q32" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q32" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q32" type="radio" value="Agree" />
          </div>
          <input name="qu32" id="qu32" type="hidden" value="I talk more than most people." />
          <div class="clr"></div>
          <div class="chemistry_txt1">33. I enjoy solving crossword puzzles and games. </div>
          <div class="radio">
            <input name="q33" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q33" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q33" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q33" type="radio" value="Agree" />
          </div>
          <input name="qu33" id="qu33" type="hidden" value="I enjoy solving crossword puzzles and games." />
          <div class="clr"></div>
          <div class="chemistry_txt1">34. I'm very open to trying new foods and different cultures. </div>
          <div class="radio">
            <input name="q34" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q34" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q34" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q34" type="radio" value="Agree" />
          </div>
          <input name="qu34" id="qu34" type="hidden" value="I'm very open to trying new foods and different cultures." />
          <div class="clr"></div>
          <div class="chemistry_txt1">35. I often get angry about how I'm treated by others. </div>
          <div class="radio">
            <input name="q35" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q35" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q35" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q35" type="radio" value="Agree" />
          </div>
          <input name="qu35" id="qu35" type="hidden" value="I often get angry about how I'm treated by others." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">36. I feel more comfortable as a follower than a leader. </div>
          <div class="radio">
            <input name="q36" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q36" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q36" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q36" type="radio" value="Agree" />
          </div>
          <input name="qu36" id="qu36" type="hidden" value="I feel more comfortable as a follower than a leader." />
          <div class="clr"></div>
          <div class="chemistry_txt1">37. I love to have excitement in my life. </div>
          <div class="radio">
            <input name="q37" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q37" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q37" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q37" type="radio" value="Agree" />
          </div>
          <input name="qu37" id="qu37" type="hidden" value="I love to have excitement in my life." />
          <div class="clr"></div>
          <div class="chemistry_txt1">38. I am a hard-working person. </div>
          <div class="radio">
            <input name="q38" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q38" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q38" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q38" type="radio" value="Agree" />
          </div>
          <input name="qu38" id="qu38" type="hidden" value="I am a hard-working person." />
          <div class="clr"></div>
          <div class="chemistry_txt1">39. I don't express my feelings easily. </div>
          <div class="radio">
            <input name="q39" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q39" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q39" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q39" type="radio" value="Agree" />
          </div>
          <input name="qu39" id="qu39" type="hidden" value="I don't express my feelings easily." />
          <div class="clr"></div>
          <div class="chemistry_txt1">40. I don't like scary movies. </div>
          <div class="radio">
            <input name="q40" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q40" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q40" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q40" type="radio" value="Agree" />
          </div>
          <input name="qu40" id="qu40" type="hidden" value="I don't like scary movies." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">41. I feel more comfortable when other people do most of the talking. </div>
          <div class="radio">
            <input name="q41" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q41" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q41" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q41" type="radio" value="Agree" />
          </div>
          <input name="qu41" id="qu41" type="hidden" value="I feel more comfortable when other people do most of the talking." />
          <div class="clr"></div>
          <div class="chemistry_txt1">42. People probably think I'm stubborn. </div>
          <div class="radio">
            <input name="q42" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q42" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q42" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q42" type="radio" value="Agree" />
          </div>
          <input name="qu42" id="qu42" type="hidden" value="People probably think I'm stubborn." />
          <div class="clr"></div>
          <div class="chemistry_txt1">43. I feel quite comfortable in large groups of people. </div>
          <div class="radio">
            <input name="q43" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q43" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q43" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q43" type="radio" value="Agree" />
          </div>
          <input name="qu43" id="qu43" type="hidden" value="I feel quite comfortable in large groups of people." />
          <div class="clr"></div>
          <div class="chemistry_txt1">44. I believe there's more than one way to do something correctly. </div>
          <div class="radio">
            <input name="q44" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q44" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q44" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q44" type="radio" value="Agree" />
          </div>
          <input name="qu44" id="qu44" type="hidden" value="I believe there's more than one way to do something correctly." />
          <div class="clr"></div>
          <div class="chemistry_txt1">45. My relationships with my friends are very important to me. </div>
          <div class="radio">
            <input name="q45" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q45" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q45" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q45" type="radio" value="Agree" />
          </div>
          <input name="qu45" id="qu45" type="hidden" value="My relationships with my friends are very important to me." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">46. I am looking for someone to go out on dates with. </div>
          <div class="radio">
            <input name="q46" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q46" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q46" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q46" type="radio" value="Agree" />
          </div>
          <input name="qu46" id="qu46" type="hidden" value="I am looking for someone to go out on dates with." />
          <div class="clr"></div>
          <div class="chemistry_txt1">47. I am sensitive to other people's feelings. </div>
          <div class="radio">
            <input name="q47" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q47" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q47" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q47" type="radio" value="Agree" />
          </div>
          <input name="qu47" id="qu47" type="hidden" value="I am sensitive to other people's feelings." />
          <div class="clr"></div>
          <div class="chemistry_txt1">48. I rarely get angry. </div>
          <div class="radio">
            <input name="q48" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q48" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q48" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q48" type="radio" value="Agree" />
          </div>
          <input name="qu48" id="qu48" type="hidden" value="I rarely get angry." />
          <div class="clr"></div>
          <div class="chemistry_txt1">49. I've never told a lie to avoid negative consequences. </div>
          <div class="radio">
            <input name="q49" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q49" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q49" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q49" type="radio" value="Agree" />
          </div>
          <input name="qu49" id="qu49" type="hidden" value="I've never told a lie to avoid negative consequences." />
          <div class="clr"></div>
          <div class="chemistry_txt1">50. I sometimes feel resentful when I don't get my way. </div>
          <div class="radio">
            <input name="q50" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q50" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q50" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q50" type="radio" value="Agree" />
          </div>
          <input name="qu50" id="qu50" type="hidden" value="I sometimes feel resentful when I don't get my way." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">51. I tend to avoid questions about my personal life. </div>
          <div class="radio">
            <input name="q51" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q51" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q51" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q51" type="radio" value="Agree" />
          </div>
          <input name="qu51" id="qu51" type="hidden" value="I tend to avoid questions about my personal life." />
          <div class="clr"></div>
          <div class="chemistry_txt1">52. I've never forgotten anyone's name when this was important. </div>
          <div class="radio">
            <input name="q52" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q52" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q52" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q52" type="radio" value="Agree" />
          </div>
          <input name="qu52" id="qu52" type="hidden" value="I've never forgotten anyone's name when this was important." />
          <div class="clr"></div>
          <div class="chemistry_txt1">53. White lies, like faking orgasm, are perfectly normal in maintaining a relationship. </div>
          <div class="radio">
            <input name="q53" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q53" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q53" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q53" type="radio" value="Agree" />
          </div>
          <input name="qu53" id="qu53" type="hidden" value="White lies, like faking orgasm, are perfectly normal in maintaining a relationship." />
          <div class="clr"></div>
          <div class="chemistry_txt1">54. My relationship pattern is best described as serial monogamy -- I go from one relationship to the next without much of a breather. </div>
          <div class="radio">
            <input name="q54" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q54" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q54" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q54" type="radio" value="Agree" />
          </div>
          <input name="qu54" id="qu54" type="hidden" value="My relationship pattern is best described as serial monogamy -- I go from one relationship to the next without much of a breather." />
          <div class="clr"></div>
          <div class="chemistry_txt1">55. I sometimes try to get even rather than forgive and forget. </div>
          <div class="radio">
            <input name="q55" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q55" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q55" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q55" type="radio" value="Agree" />
          </div>
          <input name="qu55" id="qu55" type="hidden" value="I sometimes try to get even rather than forgive and forget." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">56. When I start a new relationship, I'm sometimes guilty of speaking badly about past relationships. </div>
          <div class="radio">
            <input name="q56" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q56" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q56" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q56" type="radio" value="Agree" />
          </div>
          <input name="qu56" id="qu56" type="hidden" value="When I start a new relationship, I'm sometimes guilty of speaking badly about past relationships." />
          <div class="clr"></div>
          <div class="chemistry_txt1">57. I'm extremely persuasive at getting what I want from people. </div>
          <div class="radio">
            <input name="q57" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q57" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q57" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q57" type="radio" value="Agree" />
          </div>
          <input name="qu57" id="qu57" type="hidden" value="I'm extremely persuasive at getting what I want from people." />
          <div class="clr"></div>
          <div class="chemistry_txt1">58. When I'm in a relationship, I can be critical of my partner. </div>
          <div class="radio">
            <input name="q58" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q58" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q58" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q58" type="radio" value="Agree" />
          </div>
          <input name="qu58" id="qu58" type="hidden" value="When I'm in a relationship, I can be critical of my partner." />
          <div class="clr"></div>
          <div class="chemistry_txt1">59. I can't get to know everything about a love interest fast enough. </div>
          <div class="radio">
            <input name="q59" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q59" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q59" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q59" type="radio" value="Agree" />
          </div>
          <input name="qu59" id="qu59" type="hidden" value="I can't get to know everything about a love interest fast enough." />
          <div class="clr"></div>
          <div class="chemistry_txt1">60. There have been occasions when I took advantage of a romantic partner. </div>
          <div class="radio">
            <input name="q60" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q60" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q60" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q60" type="radio" value="Agree" />
          </div>
          <input name="qu60" id="qu60" type="hidden" value="There have been occasions when I took advantage of a romantic partner." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">61. Money is an extremely important thing in my life. </div>
          <div class="radio">
            <input name="q61" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q61" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q61" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q61" type="radio" value="Agree" />
          </div>
          <input name="qu61" id="qu61" type="hidden" value="Money is an extremely important thing in my life." />
          <div class="clr"></div>
          <div class="chemistry_txt1">62. Sometimes, what I adore about a sweetheart is what ends up driving me crazy about that partner. </div>
          <div class="radio">
            <input name="q62" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q62" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q62" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q62" type="radio" value="Agree" />
          </div>
          <input name="qu62" id="qu62" type="hidden" value="Sometimes, what I adore about a sweetheart is what ends up driving me crazy about that partner." />
          <div class="clr"></div>
          <div class="chemistry_txt1">63. My relationships tend to get really intense very quickly. </div>
          <div class="radio">
            <input name="q63" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q63" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q63" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q63" type="radio" value="Agree" />
          </div>
          <input name="qu63" id="qu63" type="hidden" value="My relationships tend to get really intense very quickly." />
          <div class="clr"></div>
          <div class="chemistry_txt1">64. I thrive off of romantic relationships where I receive a great deal of admiration and praise. </div>
          <div class="radio">
            <input name="q64" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q64" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q64" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q64" type="radio" value="Agree" />
          </div>
          <input name="qu64" id="qu64" type="hidden" value="I thrive off of romantic relationships where I receive a great deal of admiration and praise." />
          <div class="clr"></div>
          <div class="chemistry_txt1">65. There really isn't any situation that I can't talk my way out of. </div>
          <div class="radio">
            <input name="q65" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q65" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q65" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q65" type="radio" value="Agree" />
          </div>
          <input name="qu65" id="qu65" type="hidden" value="There really isn't any situation that I can't talk my way out of." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">66. I have a completely different persona when I'm online than when I'm with my family and friends. </div>
          <div class="radio">
            <input name="q66" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q66" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q66" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q66" type="radio" value="Agree" />
          </div>
          <input name="qu66" id="qu66" type="hidden" value="I have a completely different persona when I'm online than when I'm with my family and friends." />
          <div class="clr"></div>
          <div class="chemistry_txt1">67. My friends or family would say that I'm very good at managing my money. </div>
          <div class="radio">
            <input name="q67" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q67" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q67" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q67" type="radio" value="Agree" />
          </div>
          <input name="qu67" id="qu67" type="hidden" value="My friends or family would say that I'm very good at managing my money." />
          <div class="clr"></div>
          <div class="chemistry_txt1">68. Most of my ex-partners would take me back. </div>
          <div class="radio">
            <input name="q68" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q68" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q68" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q68" type="radio" value="Agree" />
          </div>
          <input name="qu68" id="qu68" type="hidden" value="Most of my ex-partners would take me back." />
          <div class="clr"></div>
          <div class="chemistry_txt1">69. I am drawn to others for their strengths especially the ones I don't have. </div>
          <div class="radio">
            <input name="q69" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q69" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q69" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q69" type="radio" value="Agree" />
          </div>
          <input name="qu69" id="qu69" type="hidden" value="I am drawn to others for their strengths especially the ones I don't have." />
          <div class="clr"></div>
          <div class="chemistry_txt1">70. I find that I can only really be myself when I'm online. </div>
          <div class="radio">
            <input name="q70" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q70" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q70" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q70" type="radio" value="Agree" />
          </div>
          <input name="qu70" id="qu70" type="hidden" value="I find that I can only really be myself when I'm online." />
          <div class="clr"></div>
          <div class="chemistry_title">
            <div class="title_text">Disagree</div>
            <div class="title_text1">Somewhat
              Disagree</div>
            <div class="title_text1">Somewhat Agree</div>
            <div class="title_text1">Agree</div>
          </div>
          <div class="clr"></div>
          <div class="chemistry_txt1">71. When I'm not online, I often think about the Internet. </div>
          <div class="radio">
            <input name="q71" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q71" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q71" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q71" type="radio" value="Agree" />
          </div>
          <input name="qu71" id="qu71" type="hidden" value="When I'm not online, I often think about the Internet." />
          <div class="clr"></div>
          <div class="chemistry_txt1">72. Few people love me other than those I know online. </div>
          <div class="radio">
            <input name="q72" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q72" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q72" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q72" type="radio" value="Agree" />
          </div>
          <input name="qu72" id="qu72" type="hidden" value="Few people love me other than those I know online." />
          <div class="clr"></div>
          <div class="chemistry_txt1">73. People who know me best often complain that I use the Internet too much. </div>
          <div class="radio">
            <input name="q73" type="radio" value="Disagree" />
          </div>
          <div class="radio">
            <input name="q73" type="radio" value="Somewhat Disagree" />
          </div>
          <div class="radio">
            <input name="q73" type="radio" value="Somewhat Agree" />
          </div>
          <div class="radio">
            <input name="q73" type="radio" value="Agree" />
          </div>
          <input name="qu73" id="qu73" type="hidden" value="People who know me best often complain that I use the Internet too much." />
          <div class="clr"></div>
          <div class="registration_form_bttn">
            <input type="image" src="images/registration_form_bttn2.png" name="button" id="button" value="Submit" />
            <input type="hidden" name="submit" id="submit" value="submit" />
          </div>
          <div class="clr"></div>
        </div>
      </form>
    </div>
    <p>&nbsp;</p>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
