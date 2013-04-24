<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>softdatepro</title>
<meta name="description" content="softdatepro is a social network for relationship tips, answers, and answers to sex questions. Users can ask any question they want in a safe environment."/>
<meta name="keywords" content="softdatepro, softdatepro, always eden, garden of eden, sex advice, relationship advice, tips, sex positions, sex toys, answers, divorce, cheating, sex toys, adult toys, sex questions, adult forums."/>

<link rel="shortcut icon" type="image/x-icon" href="http://www.softdatepro.com/templates/default/fav.ico"/>
<link href="templates/default/css/layout.css" rel="stylesheet" type="text/css" />
<link href="templates/default/css/basic.css" rel="stylesheet" type="text/css" />
<link href="templates/default/css/main.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="js/checkOnlineUser.js"></script>

<script language="JavaScript" type="text/javascript" src="js/slideshow.js"></script>
<script type="text/javascript" src="js/func.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script src="js/facebox/jquery-1.2.6.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery-effect.js"></script>
<script type="text/javascript" src="js/validator.js"></script>
<script type="text/javascript" src="js/facebox/facebox.js"></script>
<link href="js/facebox/facebox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/vars.js"></script>
<script language="javascript" type="text/javascript">
var SITEROOT = 'http://www.softdatepro.com/';
var SITEIMG = 'http://www.softdatepro.com/templates/default/images';
var csUserId	= '';
var TEMPLATEDIR = 'default';
var USERID_SESSION = '';

jQuery(document).ready(function(){
jQuery("#mainHomeDiv div.tabheader").click(function()
{
		//alert("kesava");
		jQuery(this).toggleClass("tabheader2");
		jQuery(this).next("div").slideToggle("slow");
});

jQuery('a[rel*=facebox]').facebox({
        loading_image : 'loading.gif.html',
        close_image : 'closelabel.gif.html'
      })

});
</script>
</head>
<body onload="ss.restore_position('SS_POSITION');ss.next();ss.play();document.frmLogin1.email.focus();">
<script language="JavaScript" type="text/javascript">
    jQuery(document).ready(function(){
	jQuery("#passworddisp").click(function(){
	document.getElementById("passworddisp").style.display="none";
	document.getElementById("password").style.display="block";
	document.getElementById("password").focus();
	});
		jQuery("#passworddisp").focus(function(){
		document.getElementById("passworddisp").style.display="none";
		document.getElementById("password").style.display="block";
		document.getElementById("password").focus();	
		});
	});
</script>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="chemistry_hd_txt"><br />
          Complete this questionnaire to meet your soulmate!</div>
        <div class="clr"></div>
        <div class="mandatory_txt">*All Field Are Mandatory</div>
        <div class="clr"></div>
        <div class="mandatory_left">
          <div class="mandatory_txt1"> Postal code/Zip</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield" id="textfield" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> City</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield" id="textfield" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> My Gender </div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select" id="select" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Seeking</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select2" id="select2" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Height</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select3" id="select3" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> I Am Looking For</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select4" id="select4" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Hair</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select5" id="select5" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Body Type</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select6" id="select6" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Do You Own A Car?</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select9" id="select9" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Education</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select7" id="select7" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Eye color </div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select8" id="select8" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
        </div>
        <div class="mandatory_left">
          <div class="mandatory_txt1"> Union territory </div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select11" id="select11" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Do you want children?</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select10" id="select10" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1">Marital Status </div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select" id="select" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Do you have children?</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select2" id="select2" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Do you smoke?</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select3" id="select3" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1">Do you do drugs?</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select4" id="select4" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Do you drink?</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select5" id="select5" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Religion</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select6" id="select6" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1">Your Profession</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield2" id="textfield2" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1">Do you have pets?</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select8" id="select8" class="list_drop">
                <option>Select</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"> </div>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="mandatory_txt2">When it comes to dating what best describes your intent? </div>
        <div class="clr"></div>
        <div class="mandatory_flds">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <select name="select12" id="select12" class="list_drop2">
              <option>Select</option>
            </select>
            </label>
          </form>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2">What is the longest relationship you have been in?</div>
        <div class="clr"></div>
        <div class="mandatory_flds" style="margin-left:20px;">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <select name="select12" id="select12" class="list_drop">
              <option>Select</option>
            </select>
            </label>
          </form>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2">Income - We use income and birth order behind the scenes for matching, they will not be displayed on your profile.</div>
        <div class="clr"></div>
        <div class="mandatory_flds" style="margin-left:20px;">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <select name="select12" id="select12" class="list_drop">
              <option>Select</option>
            </select>
            </label>
          </form>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2"><strong>Family</strong><br />
          My birth father and mother are:</div>
        <div class="clr"></div>
        <div class="mandatory_flds" style="margin-left:20px;">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <select name="select12" id="select12" class="list_drop">
              <option>Select</option>
            </select>
            </label>
          </form>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2">They had</div>
        <div class="mandatory_flds" style="margin-left:20px;">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <select name="select12" id="select12" class="list_drop">
              <option>Select</option>
            </select>
            </label>
          </form>
        </div>
        <div class="mandatory_txt2">together of which I am</div>
        <div class="mandatory_flds" style="margin-left:20px;">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <select name="select12" id="select12" class="list_drop">
              <option>Select</option>
            </select>
            </label>
          </form>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2">Would you date someone who has kids?</div>
        <div class="mandatory_flds" style="margin-left:20px;">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <select name="select12" id="select12" class="list_drop">
              <option>Select</option>
            </select>
            </label>
          </form>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2">Would you date someone who smokes?</div>
        <div class="mandatory_flds" style="margin-left:20px;">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <select name="select12" id="select12" class="list_drop">
              <option>Select</option>
            </select>
            </label>
          </form>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="mandatory_txt2">Income - We use income and birth order behind the scenes for matching, they will not be displayed on your profile.</div>
        <div class="clr"></div>
        <div class="mandatory_flds2">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <input type="text" name="textfield3" id="textfield3" style="width:800px; height:40px;" />
            </label>
          </form>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2">Description - (Minimum of 100 characters)<br />
          For your own safety, do not include your name, phone number, or address. People will read both your profile AND message when deciding if they should write back to you. When people search on the site the following description will be their first impression of you.</div>
        <div class="clr"></div>
        <div class="mandatory_txt2"><strong>If you want to be successful on POF, try this:</strong></div>
        <div class="clr"></div>
        <div class="mandatory_txt2">1. Talk about your hobbies.</div>
        <div class="mandatory_txt2">3. Talk about yourself and what makes you unique.</div>
        <div class="clr"></div>
        <div class="mandatory_txt2">2. Talk about your goals and aspirations</div>
        <div class="mandatory_txt2">4. Talk about your taste in music.</div>
        <div class="clr"></div>
        <div class="mandatory_flds2">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <textarea name="textarea" id="textarea"  style="width:800px; height:250px;"></textarea>
            </label>
          </form>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2"><strong>Interests</strong> - (Separate interests with commas)</div>
        <div class="clr"></div>
        <div class="mandatory_flds2">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <input type="text" name="textfield3" id="textfield3" style="width:400px; height:30px;" />
            </label>
          </form>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2"><strong>First Date</strong> (optional) - The longer your description, the more likely it is you will get responses.</div>
        <div class="clr"></div>
        <div class="mandatory_flds2">
          <form id="form1" name="form1" method="post" action="">
            <label>
            <textarea name="textarea" id="textarea"  style="width:800px; height:250px;"></textarea>
            </label>
          </form>
        </div>
        <div class="clr"></div>
        <div class="registration_form_bttn">
          <p>
            <input type="image" src="images/registration_form_bttn3.png" name="button" id="button" value="Submit" />
          </p>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
      <div class="clr"></div>
    </div>
    <p>&nbsp;</p>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
