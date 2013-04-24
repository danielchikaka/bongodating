<?php 
include_once("config/db_connect.php");

// Check user id
if($_SESSION['userid']=="")
{
	header("location:index.php");
}

// Inserting user Details code
if(isset($_POST['sub2']))
{
	$describes 		= addslashes($_POST['describes']);
	$profession 	= addslashes($_POST['profession']);
	$unionterritory = addslashes($_POST['unionterritory']);
	$talk_about 	= addslashes($_POST['talk_about']);
	$interest 		= addslashes($_POST['interest']);
	$first_date 	= addslashes($_POST['first_date']);
	$headline 		= addslashes($_POST['headline']);
	
	$insert = mysql_query("update user_info set postalcode = '".$_POST['postalcode']."' , 
	city 			= '".$_POST['city']."' , 
	seeking 		= '".$_POST['seeking']."' , 
	height 			= '".$_POST['height']."' , 
	lookingfor 		= '".$_POST['lookingfor']."' , 
	hair 			= '".$_POST['hair']."' , 
	bodytype 		= '".$_POST['bodytype']."' , 
	havecar 		= '".$_POST['owncar']."' , 
	education 		= '".$_POST['education']."' , 
	eyecolor 		= '".$_POST['eyecolor']."' , 
	union_territory = '".$unionterritory."' , 
	want_children 	= '".$_POST['wantchild']."' , 
	marital_status 	= '".$_POST['marital']."' , 
	have_children 	= '".$_POST['havechild']."' ,	
	smoke 			= '".$_POST['dosmoke']."' , 
	drugs 			= '".$_POST['dodrugs']."' , 
	drink 			= '".$_POST['dodrink']."' , 
	religion 		= '".$_POST['religion']."' , 
	your_profession = '".$profession."' , 
	have_pets 		= '".$_POST['havepets']."' , 
	best_describes 	= '".$describes."' , 
	longest_relation= '".$_POST['longestrelationship']."' , 
	income 			= '".$_POST['income']."' , 
	wantdate_kids 	= '".$_POST['datekids']."' , 
	wantdate_smokes = '".$_POST['datesmokers']."' , 
	talking_about 	= '".$talk_about."' , 
	interests 		= '".$interest."' , 
	first_date 		= '".$first_date."',
	headline 		= '".$headline."' where user_id = '".$_SESSION['last_id']."' ") or die(mysql_error());
	
	if($insert)
	{
		header("location: profile.php");
	}
}

// Fetch user details
$query 		= mysql_query("select * from user where user_id = '".$_SESSION['last_id']."' ");
$fetch_user = mysql_fetch_array($query);
$user_country = $fetch_user['user_country'];
$user_gender = $fetch_user['user_gender'];

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

<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/template.css" type="text/css"/>
<script src="js/jquery-1.6.min.js" type="text/javascript"></script>
<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"> </script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
        </script>
<script>
            jQuery(document).ready(function(){
                jQuery("#form3").validationEngine();
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
      <form name="form3" id="form3" action="" method="post">
        <div class="chemistry_main" style="background:#f1f1f1;">
          <div class="chemistry_hd_txt"><br />
            Complete this questionnaire to meet your soulmate!</div>
          <div class="clr"></div>
          <div class="clr"></div>
          <div class="mandatory_txt">*All Field Are Mandatory</div>
          <div class="clr"></div>
          <div class="mandatory_left">
            <div class="mandatory_txt1"> Postal code/Zip</div>
            <div class="mandatory_flds">
              <label>
              <input type="text" name="postalcode" id="postalcode" class="validate[required]" />
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> City</div>
            <div class="mandatory_flds">
              <label>
              <input type="text" name="city" id="city" class="validate[required]" />
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> My Gender </div>
            <div class="mandatory_flds">
              <label>
              <select name="gender" id="gender" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option value="Male" <?php if($user_gender=="Male") echo "selected";?> >Male</option>
                <option value="Female" <?php if($user_gender=="Female") echo "selected";?>>Female</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Seeking</div>
            <div class="mandatory_flds">
              <label>
              <select name="seeking" id="seeking" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Height</div>
            <div class="mandatory_flds">
              <label>
              <select name="height" id="height" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="0"  >&lt; 5' (&lt; 152 cm)</option>
                <option Value="152">5' 0&quot; (152 cm)</option>
                <option Value="155">5' 1&quot; (155 cm)</option>
                <option Value="157">5' 2&quot; (157 cm)</option>
                <option Value="160">5' 3&quot; (160 cm)</option>
                <option Value="163">5' 4&quot; (163 cm)</option>
                <option Value="165">5' 5&quot; (165 cm)</option>
                <option Value="168">5' 6&quot; (168 cm)</option>
                <option Value="170">5' 7&quot; (170 cm)</option>
                <option Value="173">5' 8&quot; (173 cm)</option>
                <option Value="175">5' 9&quot; (175 cm)</option>
                <option Value="178">5' 10&quot; (178 cm)</option>
                <option Value="180">5' 11&quot; (180 cm)</option>
                <option Value="183">6' 0&quot; (183 cm)</option>
                <option Value="185">6' 1&quot; (185 cm)</option>
                <option Value="188">6' 2&quot;(188 cm)</option>
                <option Value="191">6' 3&quot; (191 cm)</option>
                <option Value="193">6' 4&quot; (193 cm)</option>
                <option Value="196">6' 5&quot; (196 cm)</option>
                <option Value="198">6' 6&quot; (198 cm)</option>
                <option Value="201">6' 7&quot; (201 cm)</option>
                <option Value="203">6' 8&quot; (203 cm)</option>
                <option Value="206">6' 9&quot; (206 cm)</option>
                <option Value="208">6' 10&quot; (208 cm)</option>
                <option Value="211">6' 11&quot; (211 cm)</option>
                <option Value="213">7' 0&quot; (213 cm)</option>
                <option Value="999">&gt; 7' (&gt; 213 cm)</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> I Am Looking For</div>
            <div class="mandatory_flds">
              <label>
              <select name="lookingfor" id="lookingfor" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Hang Out">Hang Out</option>
                <option Value="Dating">Dating</option>
                <option Value="Friends" >Friends</option>
                <option Value="Intimate Encounter">Intimate Encounter</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Hair</div>
            <div class="mandatory_flds">
              <label>
              <select name="hair" id="hair" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Black">Black</option>
                <option Value="Blond(e)">Blond(e)</option>
                <option Value="Brown">Brown</option>
                <option Value="Red">Red</option>
                <option Value="Gray">Gray</option>
                <option Value="Bald">Bald</option>
                <option Value="Mixed Color">Mixed Color</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Body Type</div>
            <div class="mandatory_flds">
              <label>
              <select name="bodytype" id="bodytype" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Prefer Not To Say" >Prefer Not To Say</option>
                <option Value="Thin">Thin</option>
                <option Value="Athletic">Athletic</option>
                <option Value="Average">Average</option>
                <option Value="A Few Extra Pounds">A Few Extra Pounds</option>
                <option Value="Big &amp; Tall/BBW">Big &amp; Tall/BBW</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Do You Own A Car?</div>
            <div class="mandatory_flds">
              <label>
              <select name="owncar" id="owncar" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Prefer Not To Say">Prefer Not To Say</option>
                <option Value="Yes">Yes</option>
                <option Value="No">No</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Education</div>
            <div class="mandatory_flds">
              <label>
              <select name="education" id="education" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option value="High school" >High school</option>
                <option value="Some college" >Some college</option>
                <option value="Some university" >Some university</option>
                <option value="Associates degree" >Associates degree</option>
                <option value="Bachelors degree" >Bachelors degree</option>
                <option value="Masters degree" >Masters degree</option>
                <option value="PhD / Post Doctoral" >PhD / Post Doctoral</option>
                <option value="Graduate degree" >Graduate degree</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Eye color </div>
            <div class="mandatory_flds">
              <label>
              <select name="eyecolor" id="eyecolor" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Blue">Blue</option>
                <option Value="Hazel">Hazel</option>
                <option Value="Grey">Grey</option>
                <option Value="Green">Green</option>
                <option Value="Brown">Brown</option>
                <option Value="Other">Other</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="clr"></div>
          </div>
          <div class="mandatory_left">
            <div class="mandatory_txt1"> Union territory </div>
            <div class="mandatory_flds">
              <label>
              <?php
					$state = mysql_query("select * from state where country_id = '".$user_country."' order by name asc");
				?>
              <select name="unionterritory" id="unionterritory" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <?php while($row = mysql_fetch_array($state)) { ?>
                <option value="<?=$row['name']?>">
                <?=$row['name']?>
                </option>
                <?php } ?>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Do you want children?</div>
            <div class="mandatory_flds">
              <label>
              <select name="wantchild" id="wantchild" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Prefer Not To Say" >Prefer Not To Say</option>
                <option Value="Want children">Want children</option>
                <option Value="Does not want children">Does not want children</option>
                <option Value="Undecided/Open">Undecided/Open</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Marital Status </div>
            <div class="mandatory_flds">
              <label>
              <select name="marital" id="marital" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Single">Single</option>
                <option Value="Married">Married</option>
                <option Value="Living Together">Living Together</option>
                <option Value="Divorced">Divorced</option>
                <option Value="Widowed">Widowed</option>
                <option Value="Separated">Separated</option>
                <option Value="Not Single/Not Looking">Not Single/Not Looking</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Do you have children?</div>
            <div class="mandatory_flds">
              <label>
              <select name="havechild" id="havechild" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Yes">Yes</option>
                <option Value="No">No</option>
                <option Value="All my kids are 18+">All my kids are 18+</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Do you smoke?</div>
            <div class="mandatory_flds">
              <label>
              <select name="dosmoke" id="dosmoke" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="No">No</option>
                <option Value="Socially">Socially</option>
                <option Value="Often (&gt;3 times/week)">Often (&gt;3 times/week)</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Do you do drugs?</div>
            <div class="mandatory_flds">
              <label>
              <select name="dodrugs" id="dodrugs" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="No">No</option>
                <option Value="Socially">Socially</option>
                <option Value="Often (&gt;3 times/week)">Often (&gt;3 times/week)</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Do you drink?</div>
            <div class="mandatory_flds">
              <label>
              <select name="dodrink" id="dodrink" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="No">No</option>
                <option Value="Socially">Socially</option>
                <option Value="Often (&gt;3 times/week)">Often (&gt;3 times/week)</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Religion</div>
            <div class="mandatory_flds">
              <label>
              <select name="religion" id="religion" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Non-religious">Non-religious</option>
                <option Value="New age">New age</option>
                <option Value="Islamic">Islamic</option>
                <option Value="Jewish">Jewish</option>
                <option Value="Catholic">Catholic</option>
                <option Value="Buddhist">Buddhist</option>
                <option Value="Hindu">Hindu</option>
                <option Value="Anglican">Anglican</option>
                <option Value="Sikh">Sikh</option>
                <option Value="Methodist">Methodist</option>
                <option Value="Christian - other">Christian - other</option>
                <option Value="Baptist">Baptist</option>
                <option Value="Lutheran">Lutheran</option>
                <option Value="Presbyterian">Presbyterian</option>
                <option Value="Other">Other</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Your Profession</div>
            <div class="mandatory_flds">
              <label>
              <select name="profession" id="profession" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="I don't care">I don't care</option>
                <option Value="Business owner" >Business owner</option>
                <option Value="Blue Collar" >Blue Collar</option>
                <option Value="Sales" >Sales</option>
                <option Value="Medical Field" >Medical Field</option>
                <option Value="Student" >Student</option>
                <option Value="Education" >Education</option>
                <option Value="Unemployed" >Unemployed</option>
                <option Value="Legal" >Legal</option>
                <option Value="IT" >IT</option>
                <option Value="Finance" >Finance</option>
                <option Value="Marketing">Marketing</option>
                <option Value="Engineer" >Engineer</option>
                <option Value="Assistant" >Assistant</option>
                <option Value="Hospitality" >Hospitality</option>
                <option Value="Executive" >Executive</option>
                <option Value="LifeStyle" >LifeStyle</option>
                <option Value="Government" >Government</option>
                <option Value="Real Estate" >Real Estate</option>
                <option Value="Managerial" >Managerial</option>
                <option Value="Retired" >Retired</option>
                <option Value="Professional">Professional</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Do you have pets?</div>
            <div class="mandatory_flds">
              <label>
              <select name="havepets" id="havepets" class="validate[required] list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="No Pets">No Pets</option>
                <option Value="Cat">Cat</option>
                <option Value="Dog">Dog</option>
                <option Value="Cat & Dog">Cat & Dog</option>
                <option Value="Birds">Birds</option>
                <option Value="Other">Other</option>
              </select>
              </label>
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
            <label>
            <select name="describes" id="describes" class="validate[required] list_drop2">
              <option value="" selected="selected">Select</option>
              <option Value="I'm looking for Casual dating/No Commitment">1. I'm looking for Casual dating/No Commitment.</option>
              <option Value="I want to date but nothing serious">2. I want to date but nothing serious</option>
              <option Value="I want a relationship">3. I want a relationship.</option>
              <option Value="I am putting in serious effort to find someone">4. I am putting in serious effort to find someone.</option>
              <option Value="I am serious and I want to find someone to marry">5. I am serious and I want to find someone to marry.</option>
            </select>
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt2">What is the longest relationship you have been in?</div>
          <div class="clr"></div>
          <div class="mandatory_flds" style="margin-left:20px;">
            <label>
            <select name="longestrelationship" id="longestrelationship" class="validate[required] list_drop">
              <option value="" selected="selected">Select</option>
              <option Value="Under 1 year">Under 1 year</option>
              <option Value="Over 1 year">Over 1 year</option>
              <option Value="Over 2 years">Over 2 years</option>
              <option Value="Over 3 years">Over 3 years</option>
              <option Value="Over 4 year">Over 4 years</option>
              <option Value="Over 5 years">Over 5 years</option>
              <option Value="Over 6 years">Over 6 years</option>
              <option Value="Over 7 years">Over 7 years</option>
              <option Value="Over 8 year">Over 8 years</option>
              <option Value="Over 9 years">Over 9 years</option>
              <option Value="Over 10 years">Over 10 years</option>
            </select>
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt2">Income - We use income and birth order behind the scenes for matching, they will not be displayed on your profile.</div>
          <div class="clr"></div>
          <div class="mandatory_flds" style="margin-left:20px;">
            <label><span class="mandatory_flds" style="margin-left:20px;">
            <select name="income" id="income" class="validate[required] list_drop">
              <option value="" selected="selected"> Select</option>
              <option Value="Less Than 25,000">Less Than 25,000</option>
              <option Value="25,001 to 35,000">25,001 to 35,000</option>
              <option Value="35,001 to 50,000">35,001 to 50,000</option>
              <option Value="50,001 to 75,00">50,001 to 75,000</option>
              <option Value="75,001 to 100,0005">75,001 to 100,000</option>
              <option Value="100,001 to 150,000">100,001 to 150,000</option>
              <option Value="150,000+">150,000+ </option>
            </select>
            </span></label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt2"><strong>Family</strong><br />
            My birth father and mother are:</div>
          <div class="clr"></div>
          <div class="mandatory_flds" style="margin-left:20px;">
            <label>
            <select name="maritalparents" id="maritalparents" class="list_drop">
              <option value="" selected="selected">Select</option>
              <option Value="Still Married">Still Married</option>
              <option Value="Divorced">Divorced</option>
              <option Value="Separated">Separated</option>
              <option Value="One has passed away">One has passed away</option>
              <option Value="Both have passed away">Both have passed away</option>
              <option Value="Not Together">Not Together</option>
            </select>
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt2">They had</div>
          <div class="mandatory_flds" style="margin-left:20px;">
            <label>
            <select name="siblings" id="siblings" class="list_drop">
              <option value="" selected="selected">Select</option>
              <option Value="1 Child">1 Child</option>
              <option Value="2 Children">2 Children</option>
              <option Value="3 Children">3 Children</option>
              <option Value="4 Children">4 Children</option>
              <option Value="5 Children">5 Children</option>
              <option Value="6 Children">6 Children</option>
              <option Value="7 Children">7 Children</option>
              <option Value="8 Children">8 Children</option>
              <option Value="9 Children">9 Children</option>
            </select>
            </label>
          </div>
          <div class="mandatory_txt2">together of which I am</div>
          <div class="mandatory_flds" style="margin-left:20px;">
            <label>
            <select name="birthorder" id="birthorder" class="list_drop">
              <option value="" selected="selected">Select</option>
              <option Value="the oldest">the oldest</option>
              <option Value="second born">second born</option>
              <option Value="third born">third born</option>
              <option Value="fourth born">fourth born</option>
              <option Value="fifth born">fifth born</option>
              <option Value="sixth born">sixth born</option>
              <option Value="seven born">seven born</option>
              <option Value="eight born">eight born</option>
              <option Value="ninth born">ninth born</option>
            </select>
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt2">Would you date someone who has kids?</div>
          <div class="mandatory_flds" style="margin-left:20px;">
            <label>
            <select name="datekids" id="datekids" class="validate[required] list_drop">
              <option value="" selected="selected">Select</option>
              <option value="No">No</option>
              <option value="Yes">Yes</option>
              <option value="I only date single parents">I only date single parents</option>
            </select>
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt2">Would you date someone who smokes?</div>
          <div class="mandatory_flds" style="margin-left:20px;">
            <label>
            <select name="datesmokers" id="datesmokers" class="validate[required] list_drop">
              <option value="" selected="selected">Select</option>
              <option value="No">No</option>
              <option value="Yes">Yes</option>
              <option value="I only date smokers">I only date smokers</option>
            </select>
            </label>
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="clr"></div>
        <div class="mandatory_txt2"> HEADLINE</div>
        <div class="clr"></div>
        <div class="mandatory_flds2">
          <label>
          <input type="text" name="headline" id="headline" value="" style="width:800px; height:40px;" class="validate[required]" />
          </label>
        </div>
          <div class="clr"></div>
          <div class="mandatory_txt2">Description - (Minimum of 100 characters)<br />
            For your own safety, do not include your name, phone number, or address. People will read both your profile AND message when deciding if they should write back to you. When people search on the site the following description will be their first impression of you.</div>
          <div class="clr"></div>
          <div class="mandatory_txt2"><strong>If you want to be successful on <?php echo SITE_NAME;?>, try this:</strong></div>
          <div class="clr"></div>
          <div class="mandatory_txt2">1. Talk about your hobbies.</div>
          <div class="mandatory_txt2">3. Talk about yourself and what makes you unique.</div>
          <div class="clr"></div>
          <div class="mandatory_txt2">2. Talk about your goals and aspirations</div>
          <div class="mandatory_txt2">4. Talk about your taste in music.</div>
          <div class="clr"></div>
          <div class="mandatory_flds2">
            <label>
            <textarea name="talk_about" id="talk_about"  style="width:800px; height:250px;"></textarea>
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt2"><strong>Interests</strong> - (Separate interests with commas)</div>
          <div class="clr"></div>
          <div class="mandatory_flds2">
            <label>
            <input type="text" name="interest" id="interest" style="width:400px; height:30px;" />
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt2"><strong>First Date</strong> (optional) - The longer your description, the more likely it is you will get responses.</div>
          <div class="clr"></div>
          <div class="mandatory_flds2">
            <label>
            <textarea name="first_date" id="first_date"  style="width:800px; height:250px;"></textarea>
            </label>
          </div>
          <div class="clr"></div>
          <div class="registration_form_bttn">
            <p>
              <input type="hidden" name="sub2" id="sub2" />
              <input type="image" src="images/registration_form_bttn3.png" name="button" id="button" value="Submit" />
            </p>
          </div>
        </div>
        <div class="clr"></div>
      </form>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
