<?php
include("../../includes/config.php");	
if($_GET['chk']=='subcat')
{

		  $sql="select * from classified_sub_cat where catogry_id  =".$_GET['catid'];
			$res=mysql_query($sql);
			$cnt = mysql_num_rows($res);
			if($cnt==0)
			{
			   $opt = 'Data not found';
			   $optval = 'not';
			 }
			 else
			 {
			   $opt = 'Select';
			   $optval = '';
			 }  
			
				echo '<select name="sel_sub_cat" id="sel_sub_cat" style="width:140px;"><option value="'.$optval.'" >'.$opt.'</option>';
				
				while($dat=mysql_fetch_array($res))
				{
					echo "<option value='".trim($dat['id'])."'>".$dat['topic']."</option>"; 
				}
   
               echo '</select>';
		  

}

?>