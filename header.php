<?php
error_reporting(0);
?>

<div id="header">
  <h1 id="innerlogo" class="fl"><a href="index.php"><img src="images/logo/<?php echo SITE_LOGO ; ?>"> </a></h1>
  <div id="login">
    <?php if(isset($_SESSION['SESS_email'])) {
	// For login ?>
    <table cellpadding="0" cellspacing="0" width="100%" border="0" >
      <tr>
        <td colspan="4" class="collr">&nbsp;</td>
      </tr>
      <tr>
        <td width="45%" valign="top" align="right" ><strong style="margin-right:35px; padding-bottom:10px;">Hi,
          <?=ucfirst($_SESSION['username']);?>
          </strong></td>
        <td width="15%" ><a href="profile.php">My Profile</a></td>
        <td width="15%" ><a href="edit_profile.php">Edit Profile</a></td>
        <td width="15%" ><a href="search_setting.php">Set Search </a></td>
        <td width="10%" ><a href="logout.php">
          <!--Logout-->
          <img src="images/logout.jpg" /></a></td>
      </tr>
    </table>
    <?php }else { // Without login ?>
    <form name="frmlogin" id="frmlogin" action="login.php" method="post">
      <table cellpadding="0" cellspacing="0" width="100%" border="0">
        <tr>
          <td width="40%" style="color:#2E0060;"><label>
            <input name="rememberme" type="checkbox" value="yes"  />
            Remember me </label></td>
          <td colspan="2" class="collr"><a href="forgotpw.php" class="normTxt" style="color:#2E0060;">Forgot your password?</a></td>
        </tr>
        <tr>
          <td width="45%" valign="top" style="vertical-align:top"><div class="inputbox">
              <input type="text" name="email" id="email" value="Enter Your Email id" class="validate[required] input" onblur="if (this.value == '') {this.value = 'Enter Your Email id';}" onfocus="if (this.value == 'Enter Your Email id') {this.value = '';}" />
            </div></td>
          <td width="45%" valign="top" style="vertical-align:top"><div class="inputbox">
              <input type="password" name="pass" value="Password"  class="validate[required] input" id="pass" onblur="if (this.value == '') {this.value = 'Password';}" onfocus="if (this.value == 'Password') {this.value = '';}"  />
            </div></td>
          <td width="10%" style="vertical-align:top"><input type="hidden" name="submit" id="submit" value="submit">
            <input type="submit" name="button" id="button" value="" class="login"/></td>
        </tr>
      </table>
    </form>
    <?php }?>
  </div>
  <div id="globalNav1">
    <ul class="topnav1" id="jsddm">
      <li class="first"><a href="profile.php" >Profile</a></li>
      <li><a href="inbox.php">Inbox
        <?php $ured = unReadMsgCount($_SESSION['userid']); if ($ured>0) { echo "(".$ured.")"; } ?>
        </a> </li>
      <li><a href="altramatch.php" >We <span style="font-size:smaller; vertical-align:top; color:#CC0000">Match</span></a></li>
      <li><a href="basicsearch.php" >Search</a></li>
      <!--<li><a href="online.php" >Online <?php if(onLineUser()!='') { echo "( ".onLineUser()." )"; } ?></a></li>-->
      <li><a href="favorites.php">Favorites</a></li>
      <li><a href="meetme.php" >Meet Me</a></li>
      <li><a href="chemistry.php" >R. Test</a></li>
      <? if(getMemberType($_SESSION['userid']) != '1' ) { ?>
      <li class="last"><a href="upgrade.php" >Upgrade</a></li>
      <? } ?>
      <?php if(!isset($_SESSION['SESS_email'])) { ?>
      <li class="last"><a href="registration1.php" style="color:#CC0000;" >Join for free</a></li>
      <?php } ?>
    </ul>
  </div>
  <div class="clr"></div>
  <?php if(isset($_SESSION['SESS_email'])) {?>
  <div class="down_list">
    <ul>
      <li><a href="mymatches.php">My Matches</a></li>
      <li>|</li>
      <li><a href="respond.php">Will Respond</a></li>
      <li>|</li>
      <li><a href="sent_mail.php">Sent Msg</a></li>
      <li>|</li>
      <li><a href="lastsignup.php">New Users</a></li>
      <li>|</li>
      <li><a href="uimages.php">Images</a></li>
      <li>|</li>
      <li><a href="mycity.php">My City</a></li>
      <li>|</li>
      <?php 
   $gen=mysql_fetch_array(mysql_query("select user_gender from user where user_id='".$_SESSION['userid']."'"));
   if($gen['user_gender'] == 'female'){
   ?>
      <li><a href="hotboy_reply.php">Hottest Boys</a></li>
      <li>|</li>
      <?php } else { ?>
      <li><a href="hotgirl_reply.php">Hottest Girls</a></li>
      <li>|</li>
      <?php } ?>
      <li><a href="last_visit.php">Viewed Me</a></li>
    </ul>
  </div>
  <div class="clr"></div>
  <?php } ?>
</div>
