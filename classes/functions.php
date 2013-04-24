<?
function get_cat_name($cat_id,$tblname)
{
  $query =  "select * from  ".$tblname. " where id = '".$cat_id."'";
   $sql1 = mysql_query($query);
   $rowcat=mysql_fetch_object($sql1);
   return  stripslashes($rowcat->name);
}
function getPageContent($id ,$type)
{
 $sql3="select * from page where id =".$id;
 $res3=mysql_query($sql3) or mysql_error();
 $val3=mysql_num_rows($res3);
 
   $dat3 = mysql_fetch_array($res3);
   if($type==1)
     return $content = stripslashes(strip_tags($dat3['description']));
   if($type==2) 
    return $title =stripslashes($dat3['name']);
	   if($type==3) 
    return $title =stripslashes($dat3['image']);
		   if($type==4) 
    return $title =stripslashes($dat3['logourl']);
}
function getPageContentfull($id ,$type)
{
 $sql3="select * from page where id =".$id;
 $res3=mysql_query($sql3) or mysql_error();
 $val3=mysql_num_rows($res3);
 
   $dat3 = mysql_fetch_array($res3);
   if($type==1)
     return $content = stripslashes($dat3['description']);
   if($type==2) 
    return $title =stripslashes($dat3['name']);
	   if($type==3) 
    return $title =stripslashes($dat3['image']);
		   if($type==4) 
    return $title =stripslashes($dat3['logourl']);
}

function shortdata($con,$cut)
{
$con1=substr($con,0,$cut);
//echo $con1[2];
$flag=0;
for($i=$cut;$i>0;$i--)
{
if($con1[$i]==" " && $flag==0)
{
$flag=1;
 $cnt=$i;
}
}
return $con1=substr($con1,0,$cnt);
}
function strtrim($str, $maxlen=100, $elli=" ...", $maxoverflow=15) {
       
    if (strlen($str) > $maxlen) {
           
        $output = NULL;
        $body = explode(" ", $str);
        $body_count = count($body);
       
        $i=0;
   
        do {
            $output .= $body[$i]." ";
            $thisLen = strlen($output);
            $cycle = ($thisLen < $maxlen && $i < $body_count-1 && ($thisLen+strlen($body[$i+1])) < $maxlen+$maxoverflow?true:false);
            $i++;
        } while ($cycle);
        return $output.$elli;
    }
    else return $str;
}
function gUserName($uid)
{
	$sql_gUN = "select mid,name from members where mid= '".$uid."'";
	$rs_gUN = mysql_query($sql_gUN);
	if(mysql_num_rows($rs_gUN)>0)
	{
		$row_gUN = mysql_fetch_object($rs_gUN);
		return $row_gUN->name;
	}
	else
	{
		return "";
	}

}
function gUrl($uid)
{
	$sql_gURL = "select mid,url from members where mid= '".$uid."'";
	$rs_gURL = mysql_query($sql_gURL);
	if(mysql_num_rows($rs_gURL)>0)
	{
		$row_gURL = mysql_fetch_object($rs_gURL);
		return $row_gURL->url;
	}
	else
	{
		return "";
	}

}

function gCountry($gcode)
{
	$sql_gC = "select * from tbl_country where iso='$gcode'";
	$rs_gC = mysql_query($sql_gC);
	$row_gC = mysql_fetch_object($rs_gC);
	return $row_gC->name;
}
function adminEmail()
{
	$sql_admin = "select email from tbl_admin";
	$rs_admin = mysql_query($sql_admin);
	$row_admin = mysql_fetch_object($rs_admin);
	return $row_admin->email;
}
function getUPSprice ($shipType,$sendZipcode,$recieveZipcode,$recieveCountry,$weight) {
	$tmp = "AppVersion=1.2&AcceptUPSLicenseAgreement=yes&ResponseType=application/x-ups-rss&ActionCode=3".
		"&RateChart=Regular+Daily+Pickup&DCISInd=0&SNDestinationInd1=0&SNDestinationInd2=0&ResidentialInd=0&PackagingType=00".
		"&ServiceLevelCode=$shipType&ShipperPostalCode=".substr($sendZipcode, 0, 5)."&ConsigneePostalCode=". substr($recieveZipcode, 0, 5).
		"&ConsigneeCountry=$recieveCountry&PackageActualWeight=$weight&DeclaredValueInsurance=0\n\r";
			
	$request = "POST /using/services/rave/qcost_dss.cgi HTTP/1.0\nContent-type: application/x-www-form-urlencoded\nContent-length: " .
		strlen($tmp) . "\n\n" . $tmp;
				
	//$this->socket = fsockopen("www.ups.com", 80);
	$socket = fsockopen("www.ups.com", 80);
	//fputs($this->socket, $request);	
	fputs($socket, $request);
	//strtok(fread ($this->socket, 4096), "%");
	strtok(fread ($socket, 4096), "%");

	for ($i = 0; $i < 12 ;$i++)
		$price = strtok("%");

	//fclose($this->socket);
	fclose($socket);
	
	return($price);
}
?>