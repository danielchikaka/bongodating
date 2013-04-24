<?php 
session_start();
include_once("config/db_connect.php") ;
include_once("config/ckh_session.php");
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
	jQuery("#emailpass").validationEngine();
	});

</script>
</head>

<body>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="basic_list">
          <ul>
            <li><a href="basicsearch.php">Basic Search</a></li>
            <li>|</li>
            <li><a href="advancedsearch.php">Advanced Search</a></li>
            <li>|</li>
            <li><a href="user_search.php">Username Search</a></li>
          </ul>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="profl_contnt2">
        <p>
          Have fun searching through millions of dating profiles!</p>
      </div>
      <div class="clr"></div>
      <form action="advsearch_result.php" method="post" name="frm3">
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px; padding-bottom:20px;">
          <div class="clr"></div>
          <div class="mandatory_left">
            <div class="mandatory_txt1">I'm A</div>
            <div class="mandatory_flds">
              <select name="gender" id="gender" class="list_drop">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Seeking</div>
            <div class="mandatory_flds">
              <select name="seeking" id="seeking" class="list_drop">
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Age</div>
            <div class="basic_txt">
              <select name="fage" id="fage" style="width:50px;">
                <?php $startage=18; while($startage!=100) { ?>
                <option value="<?=$startage;?>">
                <?=$startage;?>
                </option>
                <?php $startage++; } ?>
              </select>
            </div>
            <div class="basic_txt">to</div>
            <div class="basic_txt">
              <select name="lage" id="lage" style="width:50px;">
                <?php $endage=99; while($endage!=17) { ?>
                <option value="<?=$endage;?>">
                <?=$endage;?>
                </option>
                <?php $endage--; } ?>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Country</div>
            <div class="mandatory_flds">
              <select name="country" id="country" class="list_drop">
                <option value="">Select Country</option>
                <?php $con = mysql_query("select * from country order by name asc");
			 while($confetch=mysql_fetch_array($con)){ ?>
                <option value="<?=$confetch['country_id'];?>">
                <?=$confetch['name'];?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">City</div>
            <div class="basic_txt">
              <input name="city" type="text" style="width:148px;"/>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Postal Code</div>
            <div class="basic_txt">
              <input name="pincode" type="text"  style="width:148px;"/>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Minimum Height</div>
            <div class="mandatory_flds">
              <select name="minheight" id="minheight" class="list_drop">
                <option Value="152" selected="selected">5' 0&quot; (152 cm)</option>
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
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Maximum Height</div>
            <div class="mandatory_flds">
              <select name="maxheight" id="maxheight" class="list_drop">
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
                <option Value="213" selected="selected">7' 0&quot; (213 cm)</option>
                <option Value="999">&gt; 7' (&gt; 213 cm)</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Religion</div>
            <div class="mandatory_flds">
              <select name="religion" id="religion" class="list_drop">
                <option value="" selected="selected">I don't care</option>
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
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Ethnicity</div>
            <div class="mandatory_flds">
              <select name="ethnicity" id="ethnicity" class="list_drop">
                <option value="" selected="selected">I don't care</option>
                <option value="Caucasian"> Caucasian</option>
                <option value="Black">Black</option>
                <option value="European">European </option>
                <option value="Hispanic">Hispanic </option>
                <option value="Indian">Indian </option>
                <option value="Middle Eastern">Middle Eastern </option>
                <option value="Native American">Native American</option>
                <option value="Asian">Asian </option>
                <option value="Mixed Race">Mixed Race </option>
                <option value="Other Ethnicity">Other Ethnicity </option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Pets</div>
            <div class="mandatory_flds">
              <select name="havepets" id="havepets" class="list_drop">
                <option value="" selected="selected">I don't care</option>
                <option Value="No Pets">No Pets</option>
                <option Value="Cat">Cat</option>
                <option Value="Dog">Dog</option>
                <option Value="Cat & Dog">Cat & Dog</option>
                <option Value="Birds">Birds</option>
                <option Value="Other">Other</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Search Type</div>
            <div class="mandatory_flds">
              <select name="lookingfor" id="lookingfor" class="list_drop">
                <option value="" selected="selected">I don't care</option>
                <option Value="Hang Out">Hang Out</option>
                <option Value="Dating">Dating</option>
                <option Value="Friends" >Friends</option>
                <option Value="Intimate Encounter">Intimate Encounter</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Education</div>
            <div class="mandatory_flds">
              <select name="education" id="education" class="list_drop">
                <option value="" selected="selected">I don't care</option>
                <option value="High school" >High school</option>
                <option value="Some college" >Some college</option>
                <option value="Some university" >Some university</option>
                <option value="Associates degree" >Associates degree</option>
                <option value="Bachelors degree" >Bachelors degree</option>
                <option value="Masters degree" >Masters degree</option>
                <option value="PhD / Post Doctoral" >PhD / Post Doctoral</option>
                <option value="Graduate degree" >Graduate degree</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Family Orientation</div>
            <div class="mandatory_flds">
              <select name="select" id="select" class="list_drop">
                <option value="" selected="selected">I don't care</option>
                <option value="Not Family Centric">Not Family Centric</option>
                <option value="Average Family Centric">Average Family Centric</option>
                <option value="Strongly Family Centric">Strongly Family Centric</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Self-Confidence</div>
            <div class="mandatory_flds">
              <select name="confidence" id="select4" class="list_drop">
                <option Value="" selected="selected">I don't care</option>
                <option Value="Average Self-Confidence">Average Self-Confidence</option>
                <option Value="High Self-Confidence">High Self-Confidence</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Profession</div>
            <div class="mandatory_flds">
              <select name="profession" id="profession" class="list_drop">
                <option Value="" selected="selected" >I don't care</option>
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
            </div>
            <div class="clr"></div>
          </div>
          <div class="mandatory_left">
            <div class="mandatory_txt1">Marital Status</div>
            <div class="mandatory_flds">
              <select name="marital" id="marital" class="list_drop">
                <option VALUE="" selected="selected" >Prefer Not to Say</option>
                <option Value="Single">Single</option>
                <option Value="Married">Married</option>
                <option Value="Living Together">Living Together</option>
                <option Value="Divorced">Divorced</option>
                <option Value="Widowed">Widowed</option>
                <option Value="Separated">Separated</option>
                <option Value="Not Single/Not Looking">Not Single/Not Looking</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> User Wants children?</div>
            <div class="mandatory_flds">
              <select name="wantchild" id="wantchild" class="list_drop">
                <option VALUE="" selected="selected">I don't care</option>
                <option Value="Want children">Want children</option>
                <option Value="Does not want children">Does not want children</option>
                <option Value="Undecided/Open">Undecided/Open</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Smokes?</div>
            <div class="mandatory_flds">
              <select name="dosmoke" id="dosmoke" class="list_drop">
                <option VALUE="" selected="selected" >I don't care</option>
                <option Value="No">No</option>
                <option Value="Socially">Socially</option>
                <option Value="Often (&gt;3 times/week)">Often (&gt;3 times/week)</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Does drugs?</div>
            <div class="mandatory_flds">
              <select name="dodrugs" id="dodrugs" class="list_drop">
                <option VALUE="" selected="selected">I don't care</option>
                <option Value="No">No</option>
                <option Value="Socially">Socially</option>
                <option Value="Often (&gt;3 times/week)">Often (&gt;3 times/week)</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1">Interest One interest per search</div>
            <div class="basic_txt">
              <input name="interest" value="" type="text"  style="width:150px;"/>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Drink</div>
            <div class="mandatory_flds">
              <select name="dodrink" id="dodrink" class="list_drop">
                <option VALUE="" selected="selected" >I don't care</option>
                <option Value="No">No</option>
                <option Value="Socially">Socially</option>
                <option Value="Often (&gt;3 times/week)">Often (&gt;3 times/week)</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Users With Children</div>
            <div class="mandatory_flds">
              <select name="havechild" id="havechild" class="list_drop">
                <option VALUE="" selected="selected" >I don't care</option>
                <option Value="Want children">Want children</option>
                <option Value="Does not want children">Does not want children</option>
                <option Value="Undecided/Open">Undecided/Open</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Hair Color</div>
            <div class="mandatory_flds">
              <select name="hair" id="hair" class="list_drop">
                <option value="" selected="selected">I don't care</option>
                <option Value="Black">Black</option>
                <option Value="Blond(e)">Blond(e)</option>
                <option Value="Brown">Brown</option>
                <option Value="Red">Red</option>
                <option Value="Gray">Gray</option>
                <option Value="Bald">Bald</option>
                <option Value="Mixed Color">Mixed Color</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Eye color</div>
            <div class="mandatory_flds">
              <select name="eyecolor" id="eyecolor" class="list_drop">
                <option VALUE="" selected="selected" >I don't care</option>
                <option Value="Blue">Blue</option>
                <option Value="Hazel">Hazel</option>
                <option Value="Grey">Grey</option>
                <option Value="Green">Green</option>
                <option Value="Brown">Brown</option>
                <option Value="Other">Other</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Body Type</div>
            <div class="mandatory_flds">
              <select name="bodytype" id="bodytype" class="list_drop">
                <option VALUE="" selected="selected" >I don't care</option>
                <option Value="Thin">Thin</option>
                <option Value="Athletic">Athletic</option>
                <option Value="Average">Average</option>
                <option Value="A Few Extra Pounds">A Few Extra Pounds</option>
                <option Value="Big &amp; Tall/BBW">Big &amp; Tall/BBW</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Income</div>
            <div class="mandatory_flds">
              <select name="income" id="income" class="list_drop">
                <option Value="" selected="selected">I don't care</option>
                <option Value="Less Than 25,000">Less Than 25,000</option>
                <option Value="25,001 to 35,000">25,001 to 35,000</option>
                <option Value="35,001 to 50,000">35,001 to 50,000</option>
                <option Value="50,001 to 75,00">50,001 to 75,000</option>
                <option Value="75,001 to 100,0005">75,001 to 100,000</option>
                <option Value="100,001 to 150,000">100,001 to 150,000</option>
                <option Value="150,000+">150,000+ </option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Easygoingness</div>
            <div class="mandatory_flds">
              <select name="easygoing" id="easygoing" class="list_drop">
                <option Value="" selected="selected">I don't care.</option>
                <option Value="1">Not Easygoing</option>
                <option Value="2">Average Easygoing</option>
                <option Value="3">Very Easygoing</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Openness/People Dependent</div>
            <div class="mandatory_flds">
              <select name="openness" id="openness" class="list_drop">
                <option Value="" selected="selected">I don't care</option>
                <option Value="1">Not Dependent on others</option>
                <option Value="2">Average Openness</option>
                <option Value="3">Big People Person</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Intent</div>
            <div class="mandatory_flds">
              <select name="describes" id="describes" class="list_drop">
                <option Value="" selected="selected" >Anything</option>
                <option Value="I'm looking for Casual dating/No Commitment"> I'm looking for Casual dating/No Commitment.</option>
                <option Value="I want to date but nothing serious"> I want to date but nothing serious</option>
                <option Value="I want a relationship"> I want a relationship.</option>
                <option Value="I am putting in serious effort to find someone"> I am putting in serious effort to find someone.</option>
                <option Value="I am serious and I want to find someone to marry"> I am serious and I want to find someone to marry.</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
          <div class="registration_form_bttn">
            <input type="image" src="images/fishing.png" name="button" id="button" value="Submit" />
          </div>
        </div>
      </form>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
  </div>
  <p>&nbsp;</p>
</div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
