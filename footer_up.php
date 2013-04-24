<?php 
$page_connect	= mysql_fetch_array(mysql_query("select * from tbl_pages where pageid=7"));
$page_fun		= mysql_fetch_array(mysql_query("select * from tbl_pages where pageid=8"));
$page_stay		= mysql_fetch_array(mysql_query("select * from tbl_pages where pageid=9"));
?>

<div class="homecont">
  <div class="connect">
    <div class="desc">
      <h3>
        <?=$page_connect['pagetitle'];?>
      </h3>
      <?=substr(stripslashes($page_connect['pagetext']),0,200);?>
      <!--..<br />
          <a href="page.php?p_id=<?php echo $page_connect['pageid']; ?>">Learn More</a>-->
    </div>
  </div>
  <div class="fun">
    <div class="desc">
      <h3>
        <?=$page_fun['pagetitle'];?>
      </h3>
      <?=substr(stripslashes($page_fun['pagetext']),0,200);?>
      <!--....<br />
          <a href="page.php?p_id=<?php echo $page_fun['pageid']; ?>">Learn More</a>-->
    </div>
  </div>
  <div class="learn">
    <div class="desc">
      <h3>
        <?=$page_stay['pagetitle'];?>
      </h3>
      <?=substr(stripslashes($page_stay['pagetext']),0,200);?>
      <!--..<br />
          <a href="page.php?p_id=<?php echo $page_stay['pageid']; ?>">Learn More</a>-->
    </div>
  </div>
</div>
