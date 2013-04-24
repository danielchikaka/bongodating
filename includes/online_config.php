<?
	$sitename = "dev.mygraphicworks.com/shop";
	$d_path = "/home/ddg/public_html/shop";
	$hostname = "localhost";
	$dbname = "dewmor2";
	$dblogin = "phpmyadminuser";
	$dbpass = "paruxome";
	$mail_admin = "robert@mygraphicworks.com";
	$admin_host = "";
	define('DBHOST','localhost');
	define('DBUSER','phpmyadminuser');
	define('DBPASS','paruxome');
	define('DBNAME','dewmor2');

	 $title="Shopping Cart";
	 $footer_text = "Copyrights 2007 - All Rights Reserved";
	 
	 $table_bg = "#f2f2f2";
	 $table_bg_w = "#ffffff";
	 $table_border = "#2d294c";
	 $table_border_l = "#2d294c";
	 $table_h = "#2d294c";
	 $table_h_b = "#2d294c";
	 $rollover="#f2f2f2";
	 $rollout="#e0f1fb";

	 $bt_update="Update";
	 
	 $update_msg="Value(s) updated sucessfully";
	 $delete_msg="Value(s) deleted sucessfully";	 
	 $insert_msg="Value(s) inserted sucessfully";	 	 
  
	$img_path="http://$sitename/images";
	$template_path="http://$sitename/products";	
	$css_path="http://$sitename/css";
	$admin_path="http://$sitename/admin";
	$site_path="http://$sitename";
	$site_path1="http://$sitename1";
	$doc_path = $d_path;
	
	$include_path="http://$sitename/includes";
	$user_img = "http://$sitename/users/images";

	$hostname = $hostname;
	$database = $dbname;
	$db_login = $dblogin;
	$db_pass = $dbpass;
	
	$res_per_page = 9; 
	
	$admin_email = "robert@mygraphicworks.com";
	$paypal_email = "robert@mygraphicworks.com";
		
	$dbase_link = mysql_connect($hostname, $db_login, $db_pass) or die("Could not connect");
	mysql_select_db($database,$dbase_link) or die(mysql_error());
// function to resize images
	function resize_img($nwidth,$img_name)
		{
			$imgb = "images/gallery/".$img_name;
			$myimg_b = @getimagesize($imgb);
			  if($nwidth <  $myimg_b[0])
			  {
				  $nwidth_b = $myimg_b[0] - $nwidth;
				  $red_per_b = $nwidth_b * 100/$myimg_b[0];
				  $nheight_b = $myimg_b[1]-($myimg_b[1] * $red_per_b / 100);
			  }
			  else
			  {
				  $nheight_b = $myimg_b[0];
			  }
			  $img_url = "<a href=\"#\" onClick=\"javascript:window.open('preview.php?fname=images/gallery/$img_name','Preview','width=680,height=400,scrollbars=yes')\"><img src=\"images/gallery/".$img_name."\" width=\"".$nwidth."\" height=\"".$nheight_b."\" border=\"0\"></a>";
			  return ($img_url);
		}
		
		function resize_pic($nwidth,$img_name)
		{
			$imgb = $img_name;
			$myimg_b = @getimagesize($imgb);
			  if($nwidth <  $myimg_b[0])
			  {
				  $nwidth_b = $myimg_b[0] - $nwidth;
				  $red_per_b = $nwidth_b * 100/$myimg_b[0];
				  $nheight_b = $myimg_b[1]-($myimg_b[1] * $red_per_b / 100);
			  }
			  else
			  {
				  $nheight_b = $myimg_b[0];
			  }
			  $img_url = "<a href=\"#\" onClick=\"javascript:window.open('preview.php?fname=$img_name','Preview','width=600,height=400,scrollbars=yes')\"><img src=\"".$img_name."\" width=\"".$nwidth."\" height=\"".$nheight_b."\" border=\"0\" align=\"left\" hspace=\"5\" vspace=\"5\"></a>";
			  return ($img_url);
		}		
function getiCategory($class="",$selected="") {
		$str="";
		$sql="select * from mst_icategory order by category_name";
		$rs=mysql_query($sql);
		$str="<select name='cmb_icateid' class='$class' onChange='goto();'>";
		$str=$str."<option value='-1'>Select Category</option>";
		while($a_row=mysql_fetch_object($rs)) {
			if($a_row->pid==$selected) {
				$str=$str."<option value='".$a_row->pid."' selected>".$a_row->category_name."</option>";
			}
			else {
				$str=$str."<option value='".$a_row->pid."'>".$a_row->category_name."</option>";
			}
		}
		$str=$str."</select>";
		return $str;
	}	
 ?>
