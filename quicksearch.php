<div class="welcome">
  <form name="frm1" id="frm1" method="post" action="">
    <div class="form_flds">I am a <br />
      <select name="gender" id="gender" style="width:120px; margin-top:5px;">
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>
    <div class="form_flds">Seeking a<br />
      <select name="seeking" id="seeking" style="width:120px; margin-top:5px;">
        <option value="female">Female</option>
        <option value="male">Male</option>
      </select>
    </div>
    <div class="clr"></div>
    <div class="form_flds">Between Age<br />
      <select name="fstage" id="fstage" style="width:120px; margin-top:5px;">
        <?php $startage=18; while($startage!=100) { ?>
        <option value="<?=$startage;?>">
        <?=$startage;?>
        Years</option>
        <?php $startage++; } ?>
      </select>
    </div>
    <div class="form_flds">To<br />
      <select name="scdage" id="scdage" style="width:120px; margin-top:5px;">
        <?php $endage=99; while($endage!=17) { ?>
        <option value="<?=$endage;?>">
        <?=$endage;?>
        Years</option>
        <?php $endage--; } ?>
      </select>
    </div>
    <div class="clr"></div>
    <div class="form_flds">Country<br />
      <select name="country" id="country" style="width:260px; margin-top:5px;">
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
    <div class="form_flds">Zip Code<br />
      <input name="zip" id="zip" type="text" value="" style="width:263px; margin-top:5px;" />
    </div>
    <div class="clr"></div>
    <div class="join_btn">
      <input type="hidden" name="subsearch" id="subsearch" />
      <input type="image" src="images/search_btn.png" name="button" id="button" value="Submit" />
    </div>
  </form>
</div>
