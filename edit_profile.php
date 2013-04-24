<?php 
include_once("config/db_connect.php") ;

// Check user id
if($_SESSION['userid'] == "")
{
	header("location:index.php");
}

// Fetch user details
$userdata		= mysql_query("select * from user where user_id = '".$_SESSION['userid']."' ");
$fetch_user		= mysql_fetch_array($userdata);
$user_country	= $fetch_user['user_country'];

$userinfo		= mysql_query("select * from user_info where user_id = '".$fetch_user['user_id']."' ");
$fetch_info		= mysql_fetch_array($userinfo);

// Update user Profile
if(isset($_POST['submitform']))
{
	$intent			= addslashes($_POST['intent']);
	$profession		= addslashes($_POST['profession']);
	$unionterritory = addslashes($_POST['territory']);
	$talk_about		= addslashes($_POST['talk_about']);
	$interests 		= addslashes($_POST['interests']);
	$firstdate 		= addslashes($_POST['firstdate']);
	$headline 		= addslashes($_POST['headline']);
	$talkingabout 	= addslashes($_POST['talkingabout']);

	$query_update 	= mysql_query(" update user_info set seeking = '".$_POST['seeking']."' , 
	lookingfor 		= '".$_POST['lookingfor']."' , 
	best_describes	= '".$intent."' , 
	city 			= '".$_POST['city']."' , 
	union_territory = '".$unionterritory."' , 
	postalcode 		= '".$_POST['postalcode']."' , 
	longest_relation= '".$_POST['longest_relation']."' , 
	marital_status 	= '".$_POST['marital_status']."' , 
	height 			= '".$_POST['height']."' , 
	bodytype 		= '".$_POST['bodytype']."' , 
	hair 			= '".$_POST['haircolor']."' , 
	religion 		= '".$_POST['religion']."' , 
	your_profession = '".$profession."' , 
	income 			= '".$_POST['income']."' , 
	education 		= '".$_POST['education']."' , 
	eyecolor 		= '".$_POST['eyecolor']."' , 
	smoke 			= '".$_POST['do_smoke']."' , 
	wantdate_smokes = '".$_POST['date_smoke']."' , 
	drugs 			= '".$_POST['dodrugs']."' , 
	drink 			= '".$_POST['dodrink']."' , 
	havecar 		= '".$_POST['havecar']."' , 
	have_children 	= '".$_POST['havechildren']."' , 
	wantdate_kids	= '".$_POST['datekids']."' , 
	have_pets 		= '".$_POST['havepets']."' , 
	talking_about 	= '".$talkingabout."' , 
	first_date 		= '".$firstdate."' , 
	interests 		= '".$interests."' , 
	fish_personality= '".$_POST['fishpersonality']."' ,  
	headline 		= '".$headline."' where user_id = '".$_SESSION['userid']."' ") or die(mysql_error());

	if($query_update)
	{
		header("location:profile.php");
		exit;
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

<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/template.css" type="text/css"/>
<script src="js/jquery-1.6.min.js" type="text/javascript"></script>
<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"> </script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<script>
	jQuery(document).ready(function(){
	jQuery("#updatepwd").validationEngine();
	});

</script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <form name="update_basics" id="update_basics" method="post" action="">
      <div id="illust">
        <div class="chemistry_main" style="background:#f1f1f1;">
          <div class="profl_txt_1">Take the relationship needs test, it will tell you all the ways you mess up in 
            relationships & dates and what you can do about it. Take it Now!</div>
        </div>
        <div class="clr"></div>
        <div class="profl_contnt2">
          <p>EDIT PROFILE - To save changes, remember to click 'Update Profile' at the bottom of the page.</p>
        </div>
        <div class="clr"></div>
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <div class="mandatory_txt">THE BASICS</div>
          <div class="clr"></div>
          <div class="mandatory_left">
            <div class="mandatory_txt1"> Your Fish Personality</div>
            <div class="mandatory_flds">
              <label>
              <select name="fishpersonality" id="fishpersonality" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="No Personality" <?php if($fetch_info['fish_personality']=="No Personality") echo "selected";?> >No Personality</option>
                <option Value="Angelfish" <?php if($fetch_info['fish_personality']=="Angelfish") echo "selected";?> >Angelfish</option>
                <option Value="Barnacle" <?php if($fetch_info['fish_personality']=="Barnacle") echo "selected";?> >Barnacle</option>
                <option Value="Barracuda" <?php if($fetch_info['fish_personality']=="Barracuda") echo "selected";?> >Barracuda </option>
                <option Value="Big Mouth Bass" <?php if($fetch_info['fish_personality']=="Big Mouth Bass") echo "selected";?> >Big Mouth Bass</option>
                <option Value="BlowFish" <?php if($fetch_info['fish_personality']=="BlowFish") echo "selected";?> >BlowFish</option>
                <option Value="Bottom Dweller" <?php if($fetch_info['fish_personality']=="Bottom Dweller") echo "selected";?> >Bottom Dweller</option>
                <option Value="Catfish" <?php if($fetch_info['fish_personality']=="Catfish") echo "selected";?> >Catfish</option>
                <option Value="Clam" <?php if($fetch_info['fish_personality']=="Clam") echo "selected";?> >Clam</option>
                <option Value="Clownfish" <?php if($fetch_info['fish_personality']=="Clownfish") echo "selected";?> >Clownfish</option>
                <option Value="Crab" <?php if($fetch_info['fish_personality']=="Crab") echo "selected";?> >Crab </option>
                <option Value="Damselfish" <?php if($fetch_info['fish_personality']=="Damselfish") echo "selected";?> >Damselfish</option>
                <option Value="Dolphin" <?php if($fetch_info['fish_personality']=="Dolphin") echo "selected";?> >Dolphin</option>
                <option Value="Eel" <?php if($fetch_info['fish_personality']=="Eel") echo "selected";?> >Eel</option>
                <option Value="Hammerhead" <?php if($fetch_info['fish_personality']=="Hammerhead") echo "selected";?> >Hammerhead</option>
                <option Value="Jellyfish" <?php if($fetch_info['fish_personality']=="Jellyfish") echo "selected";?> >Jellyfish </option>
                <option Value="Lobster" <?php if($fetch_info['fish_personality']=="Lobster") echo "selected";?> >Lobster</option>
                <option Value="Octopus" <?php if($fetch_info['fish_personality']=="Octopus") echo "selected";?> >Octopus</option>
                <option Value="Piranha" <?php if($fetch_info['fish_personality']=="Piranha") echo "selected";?> >Piranha</option>
                <option Value="Sea horse" <?php if($fetch_info['fish_personality']=="Sea horse") echo "selected";?> >Sea horse</option>
                <option Value="Sea urchin" <?php if($fetch_info['fish_personality']=="Sea urchin") echo "selected";?> >Sea urchin</option>
                <option Value="Shark" <?php if($fetch_info['fish_personality']=="Shark") echo "selected";?> >Shark</option>
                <option Value="Shrimp" <?php if($fetch_info['fish_personality']=="Shrimp") echo "selected";?> >Shrimp</option>
                <option Value="Starfish" <?php if($fetch_info['fish_personality']=="Starfish") echo "selected";?> >Starfish</option>
                <option Value="Sucker fish" <?php if($fetch_info['fish_personality']=="Sucker fish") echo "selected";?> >Sucker fish</option>
                <option Value="sunfish" <?php if($fetch_info['fish_personality']=="sunfish") echo "selected";?> >sunfish</option>
                <option Value="Swordfish" <?php if($fetch_info['fish_personality']=="Swordfish") echo "selected";?> >Swordfish</option>
                <option Value="Tuna" <?php if($fetch_info['fish_personality']=="Tuna") echo "selected";?> >Tuna</option>
                <option Value="Turtle" <?php if($fetch_info['fish_personality']=="Turtle") echo "selected";?> >Turtle</option>
                <option Value="Whale" <?php if($fetch_info['fish_personality']=="Whale") echo "selected";?> >Whale</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Seeking</div>
            <div class="mandatory_flds">
              <label>
              <select name="seeking" id="seeking" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option value="Male" <?php if($fetch_info['seeking']=="Male") echo "selected";?>>Male</option>
                <option value="Female" <?php if($fetch_info['seeking']=="Female") echo "selected";?>>Female</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> I am looking for</div>
            <div class="mandatory_flds">
              <label>
              <select name="lookingfor" id="lookingfor" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Hang Out" <?php if($fetch_info['lookingfor']=="Hang Out") echo "selected";?>>Hang Out</option>
                <option Value="Dating" <?php if($fetch_info['lookingfor']=="Dating") echo "selected";?>>Dating</option>
                <option Value="Friends" <?php if($fetch_info['lookingfor']=="Friends") echo "selected";?>>Friends</option>
                <option Value="Intimate Encounter" <?php if($fetch_info['lookingfor']=="Intimate Encounter") echo "selected";?>>Intimate Encounter</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Intent</div>
            <div class="mandatory_flds">
              <label>
              <select name="intent" id="intent" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="I'm looking for Casual dating/No Commitment" <?php if(stripslashes($fetch_info['best_describes'])=="I'm looking for Casual dating/No Commitment") echo "selected";?>>1. I'm looking for Casual dating/No Commitment.</option>
                <option Value="I want to date but nothing serious" <?php if($fetch_info['best_describes']=="I want to date but nothing serious") echo "selected";?>>2. I want to date but nothing serious</option>
                <option Value="I want a relationship" <?php if($fetch_info['best_describes']=="I want a relationship") echo "selected";?>>3. I want a relationship.</option>
                <option Value="I am putting in serious effort to find someone" <?php if($fetch_info['best_describes']=="I am putting in serious effort to find someone") echo "selected";?>>4. I am putting in serious effort to find someone.</option>
                <option Value="I am serious and I want to find someone to marry" <?php if($fetch_info['best_describes']=="I am serious and I want to find someone to marry") echo "selected";?>>5. I am serious and I want to find someone to marry.</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
          </div>
          <div class="mandatory_left">
            <div class="mandatory_txt1"> City</div>
            <div class="mandatory_flds">
              <label>
              <input type="text" name="city" id="city" value="<?=$fetch_info['city']?>" />
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> union territory</div>
            <div class="mandatory_flds">
            <?php
				$state = mysql_query("select * from state where country_id = '".$user_country."' order by name asc");
			?>
              <label>
              <select name="territory" id="territory" class="list_drop">
                <option value="" selected="selected">Select</option>
                <?php while($row = mysql_fetch_array($state)) { ?>
                <option value="<?=$row['name']?>" <?php if($fetch_info['union_territory']==stripslashes($row['name'])) echo "selected";?> >
                <?=$row['name']?>
                </option>
                <?php } ?>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Postal Code</div>
            <div class="mandatory_flds">
              <label>
              <input type="text" name="postalcode" id="postalcode" value="<?=$fetch_info['postalcode']?>" />
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Longest Relationship:</div>
            <div class="mandatory_flds">
              <label>
              <select name="longest_relation" id="longest_relation" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Under 1 year" <?php if($fetch_info['longest_relation']=="Under 1 year") echo "selected";?>>Under 1 year</option>
                <option Value="Over 1 year" <?php if($fetch_info['longest_relation']=="Under 1 year") echo "selected";?>>Over 1 year</option>
                <option Value="Over 2 years" <?php if($fetch_info['longest_relation']=="Over 2 years") echo "selected";?>>Over 2 years</option>
                <option Value="Over 3 years" <?php if($fetch_info['longest_relation']=="Over 3 years") echo "selected";?>>Over 3 years</option>
                <option Value="Over 4 year" <?php if($fetch_info['longest_relation']=="Over 4 year") echo "selected";?>>Over 4 years</option>
                <option Value="Over 5 years" <?php if($fetch_info['longest_relation']=="Over 5 years") echo "selected";?>>Over 5 years</option>
                <option Value="Over 6 years" <?php if($fetch_info['longest_relation']=="Over 6 years") echo "selected";?>>Over 6 years</option>
                <option Value="Over 7 years"<?php if($fetch_info['longest_relation']=="Over 7 years") echo "selected";?>>Over 7 years</option>
                <option Value="Over 8 year" <?php if($fetch_info['longest_relation']=="Over 8 year") echo "selected";?>>Over 8 years</option>
                <option Value="Over 9 years" <?php if($fetch_info['longest_relation']=="Over 9 years") echo "selected";?>>Over 9 years</option>
                <option Value="Over 10 years" <?php if($fetch_info['longest_relation']=="Over 10 years") echo "selected";?>>Over 10 years</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <div class="mandatory_txt">ABOUT YOU</div>
          <div class="clr"></div>
          <div class="mandatory_left">
            <div class="mandatory_txt1">Marital Status</div>
            <div class="mandatory_flds">
              <label>
              <select name="marital_status" id="marital_status" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Single" <?php if($fetch_info['marital_status']=="Single") echo "selected";?>>Single</option>
                <option Value="Married" <?php if($fetch_info['marital_status']=="Married") echo "selected";?>>Married</option>
                <option Value="Living Together" <?php if($fetch_info['marital_status']=="Living Together") echo "selected";?>>Living Together</option>
                <option Value="Divorced" <?php if($fetch_info['marital_status']=="Divorced") echo "selected";?>>Divorced</option>
                <option Value="Widowed" <?php if($fetch_info['marital_status']=="Widowed") echo "selected";?>>Widowed</option>
                <option Value="Separated" <?php if($fetch_info['marital_status']=="Separated") echo "selected";?>>Separated</option>
                <option Value="Not Single/Not Looking" <?php if($fetch_info['marital_status']=="Not Single/Not Looking") echo "selected";?>>Not Single/Not Looking</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Height</div>
            <div class="mandatory_flds">
              <label>
              <select name="height" id="height" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="0" <?php if($fetch_info['height']=="0") echo "selected";?>>&lt; 5' (&lt; 152 cm)</option>
                <option Value="152" <?php if($fetch_info['height']=="152") echo "selected";?>>5' 0&quot; (152 cm)</option>
                <option Value="155" <?php if($fetch_info['height']=="155") echo "selected";?>>5' 1&quot; (155 cm)</option>
                <option Value="157" <?php if($fetch_info['height']=="157") echo "selected";?>>5' 2&quot; (157 cm)</option>
                <option Value="160" <?php if($fetch_info['height']=="160") echo "selected";?>>5' 3&quot; (160 cm)</option>
                <option Value="163" <?php if($fetch_info['height']=="163") echo "selected";?>>5' 4&quot; (163 cm)</option>
                <option Value="165" <?php if($fetch_info['height']=="165") echo "selected";?>>5' 5&quot; (165 cm)</option>
                <option Value="168" <?php if($fetch_info['height']=="168") echo "selected";?>>5' 6&quot; (168 cm)</option>
                <option Value="170" <?php if($fetch_info['height']=="170") echo "selected";?>>5' 7&quot; (170 cm)</option>
                <option Value="173" <?php if($fetch_info['height']=="173") echo "selected";?>>5' 8&quot; (173 cm)</option>
                <option Value="175" <?php if($fetch_info['height']=="175") echo "selected";?>>5' 9&quot; (175 cm)</option>
                <option Value="178" <?php if($fetch_info['height']=="178") echo "selected";?>>5' 10&quot; (178 cm)</option>
                <option Value="180" <?php if($fetch_info['height']=="180") echo "selected";?>>5' 11&quot; (180 cm)</option>
                <option Value="183" <?php if($fetch_info['height']=="183") echo "selected";?>>6' 0&quot; (183 cm)</option>
                <option Value="185" <?php if($fetch_info['height']=="185") echo "selected";?>>6' 1&quot; (185 cm)</option>
                <option Value="188" <?php if($fetch_info['height']=="188") echo "selected";?>>6' 2&quot;(188 cm)</option>
                <option Value="191" <?php if($fetch_info['height']=="191") echo "selected";?>>6' 3&quot; (191 cm)</option>
                <option Value="193" <?php if($fetch_info['height']=="193") echo "selected";?>>6' 4&quot; (193 cm)</option>
                <option Value="196" <?php if($fetch_info['height']=="196") echo "selected";?>>6' 5&quot; (196 cm)</option>
                <option Value="198" <?php if($fetch_info['height']=="198") echo "selected";?>>6' 6&quot; (198 cm)</option>
                <option Value="201" <?php if($fetch_info['height']=="201") echo "selected";?>>6' 7&quot; (201 cm)</option>
                <option Value="203" <?php if($fetch_info['height']=="203") echo "selected";?>>6' 8&quot; (203 cm)</option>
                <option Value="206" <?php if($fetch_info['height']=="206") echo "selected";?>>6' 9&quot; (206 cm)</option>
                <option Value="208" <?php if($fetch_info['height']=="208") echo "selected";?>>6' 10&quot; (208 cm)</option>
                <option Value="211" <?php if($fetch_info['height']=="211") echo "selected";?>>6' 11&quot; (211 cm)</option>
                <option Value="213" <?php if($fetch_info['height']=="213") echo "selected";?>>7' 0&quot; (213 cm)</option>
                <option Value="999" <?php if($fetch_info['height']=="999") echo "selected";?>>&gt; 7' (&gt; 213 cm)</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Body Type </div>
            <div class="mandatory_flds">
              <label>
              <select name="bodytype" id="bodytype" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Thin" <?php if($fetch_info['bodytype']=="Thin") echo "selected";?>>Thin</option>
                <option Value="Athletic" <?php if($fetch_info['bodytype']=="Thin") echo "selected";?>>Athletic</option>
                <option Value="Average" <?php if($fetch_info['bodytype']=="Thin") echo "selected";?>>Average</option>
                <option Value="A Few Extra Pounds" <?php if($fetch_info['bodytype']=="Thin") echo "selected";?>>A Few Extra Pounds</option>
                <option Value="Big &amp; Tall/BBW" <?php if($fetch_info['bodytype']=="Thin") echo "selected";?>>Big &amp; Tall/BBW</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Hair Color </div>
            <div class="mandatory_flds">
              <label>
              <select name="haircolor" id="haircolor" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Black" <?php if($fetch_info['hair']=="Black") echo "selected";?>>Black</option>
                <option Value="Blond(e)" <?php if($fetch_info['hair']=="Blond(e)") echo "selected";?>>Blond(e)</option>
                <option Value="Brown" <?php if($fetch_info['hair']=="Brown") echo "selected";?>>Brown</option>
                <option Value="Red" <?php if($fetch_info['hair']=="Red") echo "selected";?>>Red</option>
                <option Value="Gray" <?php if($fetch_info['hair']=="Gray") echo "selected";?>>Gray</option>
                <option Value="Bald" <?php if($fetch_info['hair']=="Bald") echo "selected";?>>Bald</option>
                <option Value="Mixed Color" <?php if($fetch_info['hair']=="Mixed Color") echo "selected";?>>Mixed Color</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Religion</div>
            <div class="mandatory_flds">
              <label>
              <select name="religion" id="religion" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Non-religious" <?php if($fetch_info['religion']=="Non-religious") echo "selected";?>>Non-religious</option>
                <option Value="New age" <?php if($fetch_info['religion']=="New age") echo "selected";?>>New age</option>
                <option Value="Islamic" <?php if($fetch_info['religion']=="Islamic") echo "selected";?>>Islamic</option>
                <option Value="Jewish" <?php if($fetch_info['religion']=="Jewish") echo "selected";?>>Jewish</option>
                <option Value="Catholic" <?php if($fetch_info['religion']=="Catholic") echo "selected";?>>Catholic</option>
                <option Value="Buddhist" <?php if($fetch_info['religion']=="Buddhist") echo "selected";?>>Buddhist</option>
                <option Value="Hindu" <?php if($fetch_info['religion']=="Hindu") echo "selected";?>>Hindu</option>
                <option Value="Anglican" <?php if($fetch_info['religion']=="Anglican") echo "selected";?>>Anglican</option>
                <option Value="Sikh" <?php if($fetch_info['religion']=="Sikh") echo "selected";?>>Sikh</option>
                <option Value="Methodist" <?php if($fetch_info['religion']=="Methodist") echo "selected";?>>Methodist</option>
                <option Value="Christian - other" <?php if($fetch_info['religion']=="Christian - other") echo "selected";?>>Christian - other</option>
                <option Value="Baptist" <?php if($fetch_info['religion']=="Baptist") echo "selected";?>>Baptist</option>
                <option Value="Lutheran" <?php if($fetch_info['religion']=="Lutheran") echo "selected";?>>Lutheran</option>
                <option Value="Presbyterian" <?php if($fetch_info['religion']=="Presbyterian") echo "selected";?>>Presbyterian</option>
                <option Value="Other" <?php if($fetch_info['religion']=="Other") echo "selected";?>>Other</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Ethnicity</div>
            <div class="mandatory_flds">
              <label>
              <select name="select4" id="select4" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option value="Caucasian" <?php if($fetch_user['user_ethnicity']=="Caucasian") echo "selected";?>> Caucasian</option>
                <option value="Black" <?php if($fetch_user['user_ethnicity']=="Black") echo "selected";?>>Black</option>
                <option value="European" <?php if($fetch_user['user_ethnicity']=="European") echo "selected";?>>European </option>
                <option value="Hispanic" <?php if($fetch_user['user_ethnicity']=="Hispanic") echo "selected";?>>Hispanic </option>
                <option value="Indian" <?php if($fetch_user['user_ethnicity']=="Indian") echo "selected";?>>Indian </option>
                <option value="Middle Eastern" <?php if($fetch_user['user_ethnicity']=="Middle Eastern") echo "selected";?>>Middle Eastern </option>
                <option value="Native American" <?php if($fetch_user['user_ethnicity']=="Native American") echo "selected";?>>Native American</option>
                <option value="Asian" <?php if($fetch_user['user_ethnicity']=="Asian") echo "selected";?>>Asian </option>
                <option value="Mixed Race" <?php if($fetch_user['user_ethnicity']=="Mixed Race") echo "selected";?>>Mixed Race </option>
                <option value="Other Ethnicity" <?php if($fetch_user['user_ethnicity']=="Other Ethnicity") echo "selected";?>>Other Ethnicity </option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Profession</div>
            <div class="mandatory_flds">
              <label>
              <input type="text" name="profession" id="profession" value="<?=stripslashes($fetch_info['your_profession'])?>" />
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Your Income Level? </div>
            <div class="mandatory_flds">
              <label>
              <select name="income" id="income" class="list_drop">
                <option value="" selected="selected"> Select</option>
                <option Value="Less Than 25,000" <?php if($fetch_info['income']=="Less Than 25,000") echo "selected";?>>Less Than 25,000</option>
                <option Value="25,001 to 35,000" <?php if($fetch_info['income']=="25,001 to 35,000") echo "selected";?>>25,001 to 35,000</option>
                <option Value="35,001 to 50,000" <?php if($fetch_info['income']=="35,001 to 50,000") echo "selected";?>>35,001 to 50,000</option>
                <option Value="50,001 to 75,00" <?php if($fetch_info['income']=="50,001 to 75,00") echo "selected";?>>50,001 to 75,000</option>
                <option Value="75,001 to 100,0005" <?php if($fetch_info['income']=="75,001 to 100,0005") echo "selected";?>>75,001 to 100,000</option>
                <option Value="100,001 to 150,000" <?php if($fetch_info['income']=="100,001 to 150,000") echo "selected";?>>100,001 to 150,000</option>
                <option Value="150,000+" <?php if($fetch_info['income']=="150,000+") echo "selected";?>>150,000+ </option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Education</div>
            <div class="mandatory_flds">
              <label>
              <select name="education" id="education" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option value="High school" <?php if($fetch_info['education']=="High school") echo "selected";?>>High school</option>
                <option value="Some college" <?php if($fetch_info['education']=="Some college") echo "selected";?>>Some college</option>
                <option value="Some university" <?php if($fetch_info['education']=="Some university") echo "selected";?>>Some university</option>
                <option value="Associates degree" <?php if($fetch_info['education']=="Associates degree") echo "selected";?>>Associates degree</option>
                <option value="Bachelors degree" <?php if($fetch_info['education']=="Bachelors degree") echo "selected";?>>Bachelors degree</option>
                <option value="Masters degree" <?php if($fetch_info['education']=="Masters degree") echo "selected";?>>Masters degree</option>
                <option value="PhD / Post Doctoral" <?php if($fetch_info['education']=="PhD / Post Doctoral") echo "selected";?>>PhD / Post Doctoral</option>
                <option value="Graduate degree" <?php if($fetch_info['education']=="Graduate degree") echo "selected";?>>Graduate degree</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Eye color </div>
            <div class="mandatory_flds">
              <label>
              <select name="eyecolor" id="eyecolor" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Blue" <?php if($fetch_info['eyecolor']=="Blue") echo "selected";?>>Blue</option>
                <option Value="Hazel" <?php if($fetch_info['eyecolor']=="Hazel") echo "selected";?>>Hazel</option>
                <option Value="Grey" <?php if($fetch_info['eyecolor']=="Grey") echo "selected";?>>Grey</option>
                <option Value="Green" <?php if($fetch_info['eyecolor']=="Green") echo "selected";?>>Green</option>
                <option Value="Brown" <?php if($fetch_info['eyecolor']=="Brown") echo "selected";?>>Brown</option>
                <option Value="Other" <?php if($fetch_info['eyecolor']=="Other") echo "selected";?>>Other</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
          </div>
          <div class="mandatory_left">
            <div class="mandatory_txt1">Do you smoke? </div>
            <div class="mandatory_flds">
              <label>
              <select name="do_smoke" id="do_smoke" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="No" <?php if($fetch_info['smoke']=="No") echo "selected";?>>No</option>
                <option Value="Socially" <?php if($fetch_info['smoke']=="Socially") echo "selected";?>>Socially</option>
                <option Value="Often (&gt;3 times/week)" <?php if($fetch_info['smoke']=="Often (&gt;3 times/week)") echo "selected";?>>Often (&gt;3 times/week)</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Would you date someone
              who smokes?</div>
            <div class="mandatory_flds">
              <label>
              <select name="date_smoke" id="date_smoke" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option value="No" <?php if($fetch_info['wantdate_smokes']=="No") echo "selected";?>>No</option>
                <option value="Yes" <?php if($fetch_info['wantdate_smokes']=="Yes") echo "selected";?>>Yes</option>
                <option value="I only date smokers" <?php if($fetch_info['wantdate_smokes']=="I only date smokers") echo "selected";?>>I only date smokers</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Do you do drugs? </div>
            <div class="mandatory_flds">
              <label>
              <select name="dodrugs" id="dodrugs" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="No" <?php if($fetch_info['drugs']=="No") echo "selected";?>>No</option>
                <option Value="Socially" <?php if($fetch_info['drugs']=="Socially") echo "selected";?>>Socially</option>
                <option Value="Often (&gt;3 times/week)" <?php if($fetch_info['drugs']=="Often (&gt;3 times/week)") echo "selected";?>>Often (&gt;3 times/week)</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Do you drink? </div>
            <div class="mandatory_flds">
              <label>
              <select name="dodrink" id="dodrink" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="No" <?php if($fetch_info['drink']=="No") echo "selected";?>>No</option>
                <option Value="Socially" <?php if($fetch_info['drink']=="Socially") echo "selected";?>>Socially</option>
                <option Value="Often (&gt;3 times/week)" <?php if($fetch_info['drink']=="Often (&gt;3 times/week)") echo "selected";?>>Often (&gt;3 times/week)</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Do You Have a Car? </div>
            <div class="mandatory_flds">
              <label>
              <select name="havecar" id="havecar" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Prefer Not To Say" <?php if($fetch_info['havecar']=="Prefer Not To Say") echo "selected";?>>Prefer Not To Say</option>
                <option Value="Yes" <?php if($fetch_info['havecar']=="Yes") echo "selected";?>>Yes</option>
                <option Value="No" <?php if($fetch_info['havecar']=="No") echo "selected";?>>No</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Do you have children? </div>
            <div class="mandatory_flds">
              <label>
              <select name="havechildren" id="havechildren" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Yes" <?php if($fetch_info['have_children']=="Yes") echo "selected";?>>Yes</option>
                <option Value="No" <?php if($fetch_info['have_children']=="No") echo "selected";?>>No</option>
                <option Value="All my kids are 18+" <?php if($fetch_info['have_children']=="All my kids are 18+") echo "selected";?>>All my kids are 18+</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Do you want children? </div>
            <div class="mandatory_flds">
              <label>
              <select name="wantchildren" id="wantchildren" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="Prefer Not To Say" <?php if($fetch_info['want_children']=="Prefer Not To Say") echo "selected";?>>Prefer Not To Say</option>
                <option Value="Want children" <?php if($fetch_info['want_children']=="Want children") echo "selected";?>>Want children</option>
                <option Value="Does not want children" <?php if($fetch_info['want_children']=="Does not want children") echo "selected";?>>Does not want children</option>
                <option Value="Undecided/Open" <?php if($fetch_info['want_children']=="Undecided/Open") echo "selected";?>>Undecided/Open</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Would you date someone
              who has kids?</div>
            <div class="mandatory_flds">
              <label>
              <select name="datekids" id="datekids" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option value="No" <?php if($fetch_info['wantdate_kids']=="No") echo "selected";?>>No</option>
                <option value="Yes" <?php if($fetch_info['wantdate_kids']=="Yes") echo "selected";?>>Yes</option>
                <option value="I only date single parents" <?php if($fetch_info['wantdate_kids']=="I only date single parents") echo "selected";?>>I only date single parents</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Do you have pets?</div>
            <div class="mandatory_flds">
              <label>
              <select name="havepets" id="havepets" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option Value="No Pets" <?php if($fetch_info['have_pets']=="No Pets") echo "selected";?>>No Pets</option>
                <option Value="Cat" <?php if($fetch_info['have_pets']=="Cat") echo "selected";?>>Cat</option>
                <option Value="Dog" <?php if($fetch_info['have_pets']=="Dog") echo "selected";?>>Dog</option>
                <option Value="Cat & Dog" <?php if($fetch_info['have_pets']=="Cat & Dog") echo "selected";?>>Cat & Dog</option>
                <option Value="Birds" <?php if($fetch_info['have_pets']=="Birds") echo "selected";?>>Birds</option>
                <option Value="Other" <?php if($fetch_info['have_pets']=="Other") echo "selected";?>>Other</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
      </div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="mandatory_txt">YOUR DESCRIPTION</div>
        <div class="clr"></div>
        <div class="mandatory_txt2"> HEADLINE</div>
        <div class="clr"></div>
        <div class="mandatory_flds2">
          <label>
          <?php $headline= mysql_fetch_array(mysql_query("select * from user_info where user_id='".$_SESSION['userid']."'"));
		    if(trim($headline['headline']) !='' ){
			$headline = $headline['headline'];
			} else {
			$headline = "Looking For ".$headline['lookingfor'];
			} ?>
          <input type="text" name="headline" id="headline" value="<?=stripslashes($headline)?>" style="width:800px; height:40px;" />
          </label>
        </div>
        <div class="clr"></div>
        <div class="edit_pro">
          <p><strong>DESCRIPTION (Mandatory)<br />
            For your own safety, do not include your name, phone number or address.</strong></p>
          <p>&nbsp;</p>
          <p>People will read both your profile AND message when deciding if they should write back to you. If your profile is really lame it won't matter how good your message is.</p>
          <p> If you want to be successful on <?php echo SITE_NAME;?>, try this:
            1. Talk about your hobbies. 
            2. Talk about your goals and aspirations
            3. Talk about yourself and what makes you unique. 
            4. Describe your taste in music.
            
            Formatting Options: [b]BOLD[/b] [i] Italics [/i] [u] Underline [/u] </p>
        </div>
        <div class="edit_pro">
          <p><strong> If you want to be successful on <?php echo SITE_NAME;?>, try this:</strong></p>
          1. Talk about your hobbies.  <br />
          2. Talk about your goals and aspirations<br />
          3. 
          Talk about yourself and what makes you unique.  <br />
          4. Describe your taste in music. </div>
        <div class="clr"></div>
        <div class="mandatory_txt2">Formatting Options: </div>
        <div class="clr"></div>
        <div class="mandatory_flds2">
          <label>
          <textarea name="talkingabout" id="talkingabout"  style="width:800px; height:250px;"><?=stripslashes($fetch_info['talking_about'])?>
</textarea>
          </label>
        </div>
        <div class="mandatory_flds2"></div>
        <div class="clr"></div>
        <div class="mandatory_txt2"><strong>First Date</strong></div>
        <div class="clr"></div>
        <div class="mandatory_flds2">
          <label>
          <textarea name="firstdate" id="firstdate"  style="width:800px; height:250px;"><?=stripslashes($fetch_info['first_date'])?>
</textarea>
          </label>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2">INTERESTS</div>
        <div class="mandatory_flds2">
          <label>
          <input type="text" name="interests" id="interests" value="<?=stripslashes($fetch_info['interests'])?>" style="width:800px; height:40px;" />
          </label>
        </div>
        <div class="clr"></div>
        <div class="registration_form_bttn">
          <input type="hidden" name="submitform" value="" id="submitform" />
          <input type="image" src="images/update.png" name="button2" id="button2" value="Submit" />
        </div>
      </div>
    </form>
    <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
      <div class="clr"></div>
      <div class="profl_contnt2">
        <p>ESSENTIAL INFORMATION - You can change your birthday and gender within 2 weeks of signing up. After that, it can't be changed.</p>
      </div>
      <div class="clr"></div>
      <form name="update_userinfo" id="update_userinfo" action="update_userinfo.php" method="post">
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <div class="mandatory_txt">ABOUT YOU</div>
          <div class="clr"></div>
          <div class="mandatory_left">
            <div class="mandatory_txt1">User Name* </div>
            <div class="mandatory_flds">
              <label>
              <input type="text" name="username" id="username" value="<?=$fetch_user['user_name'];?>" />
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Birthdate* </div>
            <div class="mandatory_flds">
              <label>
              <input type="text" name="dob" id="dob" value="<?=$fetch_user['user_birthdate'];?>" />
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Ethnicity</div>
            <div class="mandatory_flds">
              <label>
              <!--<input type="text" name="textfield4" id="textfield4" />-->
              <select name="ethnicity" id="ethnicity" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option value="Caucasian" <?php if($fetch_user['user_ethnicity']=="Caucasian") echo "selected";?>> Caucasian</option>
                <option value="Black" <?php if($fetch_user['user_ethnicity']=="Black") echo "selected";?>>Black</option>
                <option value="European" <?php if($fetch_user['user_ethnicity']=="European") echo "selected";?>>European </option>
                <option value="Hispanic" <?php if($fetch_user['user_ethnicity']=="Hispanic") echo "selected";?>>Hispanic </option>
                <option value="Indian" <?php if($fetch_user['user_ethnicity']=="Indian") echo "selected";?>>Indian </option>
                <option value="Middle Eastern" <?php if($fetch_user['user_ethnicity']=="Middle Eastern") echo "selected";?>>Middle Eastern </option>
                <option value="Native American" <?php if($fetch_user['user_ethnicity']=="Native American") echo "selected";?>>Native American</option>
                <option value="Asian" <?php if($fetch_user['user_ethnicity']=="Asian") echo "selected";?>>Asian </option>
                <option value="Mixed Race" <?php if($fetch_user['user_ethnicity']=="Mixed Race") echo "selected";?>>Mixed Race </option>
                <option value="Other Ethnicity" <?php if($fetch_user['user_ethnicity']=="Other Ethnicity") echo "selected";?>>Other Ethnicity </option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
          </div>
          <div class="mandatory_left">
            <div class="mandatory_txt1">Email</div>
            <div class="mandatory_flds">
              <label>
              <input type="text" name="email" id="email" value="<?=$fetch_user['user_email'];?>" />
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Gender</div>
            <div class="mandatory_flds">
              <label>
              <!--<input type="text" name="textfield6" id="textfield6" />-->
              <select name="gender" id="gender" class="list_drop">
                <option value="" selected="selected">Select</option>
                <option value="male" <?php if($fetch_user['user_gender']=="male") echo "selected";?>>Male</option>
                <option value="female" <?php if($fetch_user['user_gender']=="female") echo "selected";?>>Female</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Country</div>
            <div class="mandatory_flds">
              <label>
              <select name="country" id="country" class="list_drop">
                <option value="" selected="selected">Select</option>
                <?php $con= mysql_query("select * from country order by name asc");
			 while($confetch=mysql_fetch_array($con)){ ?>
                <option value="<?=$confetch['country_id'];?>" <?php if($fetch_user['user_country']==$confetch['country_id']) echo "selected";?>>
                <?=$confetch['name'];?>
                </option>
                <?php } ?>
              </select>
              </label>
            </div>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
        <div class="registration_form_bttn">
          <input type="image" src="images/update_regis.png" name="button" id="button" value="Submit" />
        </div>
      </form>
      <div class="clr"></div>
      <form name="updatepwd" id="updatepwd" method="post" action="update_password.php">
        <div class="profl_contnt2">
          <p> CHANGE PASSWORD - Fill in all fields below to change your password (max 20 characters).</p>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt1-1" style="margin-left:30px;">Old Password*</div>
        <div class="mandatory_flds">
          <label>
          <input type="password" name="oldpassword" id="oldpassword" class="validate[required]" />
          </label>
        </div>
        <div class="mandatory_txt1-1">New Password*</div>
        <div class="mandatory_flds">
          <label>
          <input type="password" name="newpwd" id="newpwd" class="validate[required]" />
          </label>
        </div>
        <div class="mandatory_txt1-1">New Password Again*</div>
        <div class="mandatory_flds">
          <label>
          <input type="password" name="newpwd2" id="newpwd2" class="validate[required,equals[newpwd]]"  />
          </label>
        </div>
        <div class="clr"></div>
        <div class="registration_form_bttn">
          <input type="image" src="images/update_pswrd.png" name="update_pwd" id="update_pwd" value="update_password" />
        </div>
      </form>
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
