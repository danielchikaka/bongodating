<?php 
session_start();
include_once("config/db_connect.php") ;

// Check user id
if($_SESSION['userid']=="")
{
	header("location:index.php");
}

// Fetch user details
$userdata	= mysql_query("select * from user where user_id = '".$_SESSION['userid']."' ");
$fetch_user	= mysql_fetch_array($userdata);

$userinfo	= mysql_query("select * from user_info where user_id = '".$fetch_user['user_id']."' ");
$fetch_info = mysql_fetch_array($userinfo);

// Code search setting for searching user
if(isset($_POST['sub']))
{
	$set_search	= mysql_query("select * from search_setting where user_id = '".$_SESSION['userid']."' ");
	if(mysql_num_rows($set_search)>0)
	{
		// for search setting update
		$intent = addslashes($_POST['intent']);
		$query 	= mysql_query("update search_setting set s_gender = '".$_POST['gender']."' , s_country = '".$_POST['country']."' , s_intent = '".$intent."' , s_age1 = '".$_POST['fage']."' , s_age2 = '".$_POST['lage']."' , s_relation = '".$_POST['longest_relation']."' , s_race = '".$_POST['race']."' , s_religion = '".$_POST['religion']."' where user_id = '".$_SESSION['userid']."' ") or die(mysql_error());
	
	} else {
		//for search setting add
		$intent = addslashes($_POST['intent']);
		$query  = mysql_query(" insert into search_setting set user_id = '".$_SESSION['userid']."' , s_gender = '".$_POST['gender']."' , s_country = '".$_POST['country']."' , s_intent = '".$intent."' , s_age1 = '".$_POST['fage']."' , s_age2 = '".$_POST['lage']."' , s_relation = '".$_POST['longest_relation']."' , s_race = '".$_POST['race']."' , s_religion = '".$_POST['religion']."' ") or die(mysql_error());
	}
	
	if($query)
	{
		header("location:profile.php");
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
<script>
	jQuery(document).ready(function(){
	jQuery("#updatepwd").validationEngine();
	});

</script>

<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php include_once("header.php");?>
<div id="wrapper">
  <div id="maincont">
    <form name="update_basics" id="update_basics" method="post" action="">
      <div id="illust">
        <div class="clr"></div>
        <div class="profl_contnt2">
          <p> ADJUST YOUR SEARCH SETTINGS 
            You can limit who is allowed to contact you by setting these options. (Ex. By selecting 'female', you are allowing only women to contact you. etc.) </p>
        </div>
        <div class="clr"></div>
        <?php
$row_set = mysql_fetch_array(mysql_query("select * from search_setting where user_id='".$_SESSION['userid']."'"));
?>
        <div class="clr"></div>
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <div class="mandatory_txt">Search Setting</div>
          <div class="clr"></div>
          <div class="mandatory_left">
            <div class="mandatory_txt1"> Gender</div>
            <div class="mandatory_flds">
              <label>
              <select name="gender" id="gender" class="list_drop">
                <option value="">All Gender</option>
                <option Value="male" <?php if($row_set['s_gender']=="male") echo "selected";?> >Male</option>
                <option Value="female" <?php if($row_set['s_gender']=="female") echo "selected";?> >Female</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <!--<div class="mandatory_txt1"> Country</div>
       <div class="mandatory_flds">
           <label>
           <select name="country" id="country" class="list_drop">
           <option value="all">Any One</option>
             <?php $con= mysql_query("select * from country");
			 while($confetch=mysql_fetch_array($con)){ ?>
             <option value="<?=$confetch['countryId'];?>"><?=$confetch['countryName'];?></option>
             <?php } ?>
           </select>
           </label>
         </div>-->
            <div class="mandatory_txt1"> Intent</div>
            <div class="mandatory_flds">
              <label>
              <select name="intent" id="intent" class="list_drop">
                <option value="">All Intent</option>
                <option Value="I'm looking for Casual dating/No Commitment" <?php if(stripslashes($row_set['s_intent'])=="I'm looking for Casual dating/No Commitment") echo "selected";?> >1. I'm looking for Casual dating/No Commitment.</option>
                <option Value="I want to date but nothing serious" <?php if($row_set['s_intent']=="I want to date but nothing serious") echo "selected";?> >2. I want to date but nothing serious</option>
                <option Value="I want a relationship" <?php if($row_set['s_intent']=="I want a relationship") echo "selected";?> >3. I want a relationship.</option>
                <option Value="I am putting in serious effort to find someone" <?php if($row_set['s_intent']=="I am putting in serious effort to find someone") echo "selected";?> >4. I am putting in serious effort to find someone.</option>
                <option Value="I am serious and I want to find someone to marry" <?php if($row_set['s_intent']=="I am serious and I want to find someone to marry") echo "selected";?> >5. I am serious and I want to find someone to marry.</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Race</div>
            <div class="mandatory_flds">
              <label>
              <select name="race" id="race" class="list_drop">
                <option value="">All Race</option>
                <option value="Caucasian" <?php if($row_set['s_race']=="Caucasian") echo "selected";?> > Caucasian</option>
                <option value="Black" <?php if($row_set['s_race']=="Black") echo "selected";?> >Black</option>
                <option value="European" <?php if($row_set['s_race']=="European") echo "selected";?> >European </option>
                <option value="Hispanic" <?php if($row_set['s_race']=="Hispanic") echo "selected";?> >Hispanic </option>
                <option value="Indian" <?php if($row_set['s_race']=="Indian") echo "selected";?> >Indian </option>
                <option value="Middle Eastern" <?php if($row_set['s_race']=="Middle Eastern") echo "selected";?> >Middle Eastern </option>
                <option value="Native American" <?php if($row_set['s_race']=="Native American") echo "selected";?> >Native American</option>
                <option value="Asian" <?php if($row_set['s_race']=="Asian") echo "selected";?> >Asian </option>
                <option value="Mixed Race" <?php if($row_set['s_race']=="Mixed Race") echo "selected";?> >Mixed Race </option>
                <option value="Other Ethnicity" <?php if($row_set['s_race']=="Other Ethnicity") echo "selected";?> >Other Ethnicity </option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
          </div>
          <div class="mandatory_left">
            <div class="mandatory_txt1"> Age Between</div>
            <div class="basic_txt">
              <select name="fage" id="fage">
                <option value="">Select</option>
                <?php $startage=18; while($startage!=100) { ?>
                <option value="<?=$startage;?>" <?php if($row_set['s_age1']==$startage) echo "selected";?> >
                <?=$startage;?>
                </option>
                <?php $startage++; } ?>
              </select>
              &nbsp;&nbsp;&nbsp;to &nbsp;&nbsp;
              <select name="lage" id="lage">
                <option value="">Select</option>
                <?php $endage=99; while($endage!=17) { ?>
                <option value="<?=$endage;?>" <?php if($row_set['s_age2']==$endage) echo "selected";?> >
                <?=$endage;?>
                </option>
                <?php $endage--; } ?>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Religion</div>
            <div class="mandatory_flds">
              <label>
              <select name="religion" id="religion" class="list_drop">
                <option value="">All Religion</option>
                <option Value="Non-religious" <?php if($row_set['s_religion']=="Non-religious") echo "selected";?> >Non-religious</option>
                <option Value="New age" <?php if($row_set['s_religion']=="New age") echo "selected";?> >New age</option>
                <option Value="Islamic" <?php if($row_set['s_religion']=="Islamic") echo "selected";?> >Islamic</option>
                <option Value="Jewish" <?php if($row_set['s_religion']=="Jewish") echo "selected";?> >Jewish</option>
                <option Value="Catholic" <?php if($row_set['s_religion']=="Catholic") echo "selected";?> >Catholic</option>
                <option Value="Buddhist" <?php if($row_set['s_religion']=="Buddhist") echo "selected";?> >Buddhist</option>
                <option Value="Hindu" <?php if($row_set['s_religion']=="Hindu") echo "selected";?> >Hindu</option>
                <option Value="Anglican" <?php if($row_set['s_religion']=="Anglican") echo "selected";?> >Anglican</option>
                <option Value="Sikh" <?php if($row_set['s_religion']=="Sikh") echo "selected";?> >Sikh</option>
                <option Value="Methodist" <?php if($row_set['s_religion']=="Methodist") echo "selected";?> >Methodist</option>
                <option Value="Christian - other" <?php if($row_set['s_religion']=="Christian - other") echo "selected";?> >Christian - other</option>
                <option Value="Baptist" <?php if($row_set['s_religion']=="Baptist") echo "selected";?> >Baptist</option>
                <option Value="Lutheran" <?php if($row_set['s_religion']=="Lutheran") echo "selected";?> >Lutheran</option>
                <option Value="Presbyterian" <?php if($row_set['s_religion']=="Presbyterian") echo "selected";?> >Presbyterian</option>
                <option Value="Other" <?php if($row_set['s_religion']=="Other") echo "selected";?> >Other</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
          <div class="registration_form_bttn">
            <input type="submit" name="sub" id="button" value="Submit" />
          </div>
        </div>
        <div class="clr"></div>
      </div>
    </form>
    <div class="clr"></div>
  </div>
  <p>&nbsp;</p>
</div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
