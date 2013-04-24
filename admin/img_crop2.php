<?php
//$photo_name=$_FILES['photo1']['tmp_name'];
//$source_pic=$destination_pic= $photo_name
//$size = size of original uploded image
// $size_requirement :-  croping size of image; ex;-400
/*$dim_requirement = array(400, 300);
$size_requirement = array(400, 300);
$min_size_requirement=array(400,300);
*/
function resize($source_pic,$destination_pic,$size,$size_requirement)
{
 $min_size_requirement=array(280, 314);
$max_width = $size_requirement[0];
$max_height = $size_requirement[1];
$min_width = $min_size_requirement[0];
$min_height = $min_size_requirement[1];

 $width			= $size[0];
 $height			= $size[1];
$x_ratio = $max_width / $width;
$y_ratio = $max_height / $height;
if( ($width <= $max_width) && ($height <= $max_height) ){
    $tn_width = $width;
    $tn_height = $height;
    }elseif (($x_ratio * $height) < $max_height){
        $tn_height = floor($x_ratio * $height);
        $tn_width = $max_width;
    }else{
        $tn_width = floor($y_ratio * $width);
        $tn_height = $max_height;
}

###########  Check for minimum dimension
if( ($tn_width <= $min_width) && ($tn_height <= $min_height) ){
    $tn_width = $min_width;
    $tn_height = $min_height;
    }else if($tn_width <= $min_width && $tn_height > $min_height){
        $tn_height = $tn_height;
        $tn_width = $min_width;
    }else if($tn_width > $min_width && $tn_height <= $min_height){
        $tn_width = $tn_width;
        $tn_height = $min_height;
}
//echo $tn_width .' ' . $tn_height;
############################################

switch ($size['mime'])
{
	case 'image/gif':
		$creationFunction	= "imagecreatefromgif";
	break;
	case 'image/x-png':
	case 'image/png':
		$creationFunction	= 'imagecreatefrompng';
	break;
	default:
		$creationFunction	= 'imagecreatefromjpeg';
	break;
}
$src = $creationFunction($source_pic);
$tmp=imagecreatetruecolor($tn_width,$tn_height);
imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);
if($size['mime'] == "image/jpeg" OR $size['mime'] == "image/pjpeg"){ 
imagejpeg($tmp,$destination_pic,100);
    } 
	if($size['mime'] == "image/JPG" OR $size['mime'] == "image/PJPG"){ 
imagejpeg($tmp,$destination_pic,100);
    } 
    if($size['mime'] == "image/gif"){ 
imagegif($tmp,$destination_pic);
    } 
  if($size['mime'] == "image/png" OR $size['mime'] == "image/x-png"){ 
imagepng($tmp,$destination_pic);
    } 
$size[0]=$tn_width;
$size[1]=$tn_height;
imagedestroy($src);
imagedestroy($tmp);
return $size;
}

function resize2($source_pic="",$destination_pic="",$size=0,$size_requirement1=0)
{
 $min_size_requirement1=array(118, 80);
$max_width = $size_requirement1[0];
$max_height = $size_requirement1[1];
$min_width = $min_size_requirement1[0];
$min_height = $min_size_requirement1[1];

 $width			= $size[0];
 $height			= $size[1];
$x_ratio = $max_width / $width;
$y_ratio = $max_height / $height;
if( ($width <= $max_width) && ($height <= $max_height) ){
    $tn_width = $width;
    $tn_height = $height;
    }elseif (($x_ratio * $height) < $max_height){
        $tn_height = floor($x_ratio * $height);
        $tn_width = $max_width;
    }else{
        $tn_width = floor($y_ratio * $width);
        $tn_height = $max_height;
}

###########  Check for minimum dimension
if( ($tn_width <= $min_width) && ($tn_height <= $min_height) ){
    $tn_width = $min_width;
    $tn_height = $min_height;
    }else if($tn_width <= $min_width && $tn_height > $min_height){
        $tn_height = $tn_height;
        $tn_width = $min_width;
    }else if($tn_width > $min_width && $tn_height <= $min_height){
        $tn_width = $tn_width;
        $tn_height = $min_height;
}
//echo $tn_width .' ' . $tn_height;
############################################

switch ($size['mime'])
{
	case 'image/gif':
		$creationFunction	= "imagecreatefromgif";
	break;
	case 'image/x-png':
	case 'image/png':
		$creationFunction	= 'imagecreatefrompng';
	break;
	default:
		$creationFunction	= 'imagecreatefromjpeg';
	break;
}
$src = $creationFunction($source_pic);
$tmp=imagecreatetruecolor($tn_width,$tn_height);
imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);
if($size['mime'] == "image/jpeg" OR $size['mime'] == "image/pjpeg"){ 
imagejpeg($tmp,$destination_pic,100);
    } 
	if($size['mime'] == "image/JPG" OR $size['mime'] == "image/PJPG"){ 
imagejpeg($tmp,$destination_pic,100);
    } 
    if($size['mime'] == "image/gif"){ 
imagegif($tmp,$destination_pic);
    } 
  if($size['mime'] == "image/png" OR $size['mime'] == "image/x-png"){ 
imagepng($tmp,$destination_pic);
    } 
$size[0]=$tn_width;
$size[1]=$tn_height;
imagedestroy($src);
imagedestroy($tmp);
return $size;
}

function resize3($source_pic,$destination_pic,$size,$size_requirement)
{
$min_size_requirement=array(160, 120);
$max_width = $size_requirement[0];
$max_height = $size_requirement[1];
$min_width = $min_size_requirement[0];
$min_height = $min_size_requirement[1];

 $width			= $size[0];
 $height			= $size[1];
$x_ratio = $max_width / $width;
$y_ratio = $max_height / $height;
if( ($width <= $max_width) && ($height <= $max_height) ){
    $tn_width = $width;
    $tn_height = $height;
    }elseif (($x_ratio * $height) < $max_height){
        $tn_height = floor($x_ratio * $height);
        $tn_width = $max_width;
    }else{
        $tn_width = floor($y_ratio * $width);
        $tn_height = $max_height;
}

###########  Check for minimum dimension
if( ($tn_width <= $min_width) && ($tn_height <= $min_height) ){
    $tn_width = $min_width;
    $tn_height = $min_height;
    }else if($tn_width <= $min_width && $tn_height > $min_height){
        $tn_height = $tn_height;
        $tn_width = $min_width;
    }else if($tn_width > $min_width && $tn_height <= $min_height){
        $tn_width = $tn_width;
        $tn_height = $min_height;
}
//echo $tn_width .' ' . $tn_height;
############################################

switch ($size['mime'])
{
	case 'image/gif':
		$creationFunction	= "imagecreatefromgif";
	break;
	case 'image/x-png':
	case 'image/png':
		$creationFunction	= 'imagecreatefrompng';
	break;
	default:
		$creationFunction	= 'imagecreatefromjpeg';
	break;
}
$src = $creationFunction($source_pic);
$tmp=imagecreatetruecolor($tn_width,$tn_height);
imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);
if($size['mime'] == "image/jpeg" OR $size['mime'] == "image/pjpeg"){ 
imagejpeg($tmp,$destination_pic,100);
    } 
	if($size['mime'] == "image/JPG" OR $size['mime'] == "image/PJPG"){ 
imagejpeg($tmp,$destination_pic,100);
    } 
    if($size['mime'] == "image/gif"){ 
imagegif($tmp,$destination_pic);
    } 
  if($size['mime'] == "image/png" OR $size['mime'] == "image/x-png"){ 
imagepng($tmp,$destination_pic);
    } 
$size[0]=$tn_width;
$size[1]=$tn_height;
imagedestroy($src);
imagedestroy($tmp);
return $size;
}


?>
