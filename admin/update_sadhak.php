<?
$id=trim($_GET['id']);
 $sql="select * from user where user_id='".$id."'";
$query=mysql_query($sql);
$row=mysql_fetch_assoc($query);
//echo "select * from user_info where user_id='".$row['user_id']."'"; die;
$fetch_info= mysql_fetch_array(mysql_query("select * from user_info where user_id='".$row['user_id']."'"));
$uname=trim($row['user_name']);
$email=trim($row['user_email']);
$password=base64_decode(trim($row['user_password']));
$dob=trim($row['user_birthdate']);
$gender=trim($row['user_gender']);
$ethnicity=trim($row['user_ethnicity']);
$city=trim($row['city']);
$state=trim($row['state']);
$country=trim($row['country']);

$phone=trim($row['phone_no']);

$pin=trim($row['pin']);
$company=trim($row['company']);
$interest= trim($fetch_info['interests']);
$headline= trim($fetch_info['headline']);


if($_REQUEST['btn_sub']=="Submit") {
 
$password = base64_encode($_POST['password']);

$sql22 = " update user SET user_name = '".$_POST['username']."' , user_password = '".$password."' , user_email = '".$_POST['email']."' , user_birthdate = '".$_POST['dob']."' , user_gender = '".$_POST['gender']."' , user_ethnicity = '".$_POST['ethnicity']."' , user_country = '".$_POST['country']."' where user_id = '".$_POST['id']."' ";
 //echo $sql22; die;
$sql33 = " update user_info SET city = '".$_POST['city']."' , postalcode = '".$_POST['postalcode']."' , seeking = '".$_POST['seeking']."' , lookingfor = '".$_POST['looking']."' , height = '".$_POST['height']."' , hair = '".$_POST['hair']."' , bodytype = '".$_POST['bodytype']."' , havecar = '".$_POST['havecar']."' , education = '".$_POST['education']."' , eyecolor = '".$_POST['eyecolor']."' , union_territory = '".$_POST['territory']."' , want_children = '".$_POST['wantchildren']."' , have_children = '".$_POST['havechildren']."' , smoke = '".$_POST['do_smoke']."' , drugs = '".$_POST['dodrugs']."' , drink = '".$_POST['dodrink']."' , religion = '".$_POST['religion']."' , your_profession = '".$_POST['profession']."' , income = '".$_POST['income']."' , wantdate_smokes = '".$_POST['date_smoke']."' , wantdate_kids = '".$_POST['datekids']."' , headline = '".$_POST['headline']."' , interests = '".$_POST['interests']."' where user_id = '".$_POST['id']."' ";
 //echo $sql33; die;
mysql_query($sql22);
mysql_query($sql33);


$err="User Update Successfully";
?>
<script>javascript:location.href="user.php?frm=showalluser&err=<?=$err?>&id=<?php echo $id;?>";</script>
<?
}
?>
<html>
<head>
<script type="text/javascript" language="javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(strURL) {		
	
	var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {/*
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				*/
				
//alert(httpxml.responseText);
var myarray= new Array(); 
 myarray=eval(req.responseText);
//alert(myarray);

for(j=document.frm_sub.territory.options.length-1;j>=0;j--)
{
document.frm_sub.territory.remove(j);
}

for (i=0;i<myarray.length;i++)
{
var optn = document.createElement("OPTION");
optn.value = myarray[i++];
optn.text = myarray[i];

//alert(optn);
document.frm_sub.territory.options.add(optn);
} 
}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
</script>
</head>
</html>

<table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
  <form action="user.php?frm=update_sadhak" name="frm_sub" method="post" >
    <tr valign="middle" >
      <td align="right" valign="top" > User Name</td>
      <td align="left"><input type="text" name="username" id="username" style="width:350px;"  value="<?php echo $uname; ?>"/>
      </td>
    </tr>
    </tr>
    
    <tr valign="middle">
      <td align="right" valign="top"> Password</td>
      <td align="left"><input type="text" name="password" id="password" style="width:350px;"  value="<?php echo $password; ?>"/>
      </td>
    </tr>
    <tr>
      <td align="right" valign="top"> Email</td>
      <td align="left"><input type="text" id="email" name="email" style="width:350px;" value="<?php echo $email; ?>"/></td>
    </tr>
    </tr>
    <tr>
      <td align="right" valign="top"> Date Of Birth</td>
      <td align="left"><input type="text" id="dob" name="dob" style="width:350px;" value="<?php echo $dob; ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Gender</td>
      <td align="left"><input type="text" id="gender" name="gender" style="width:350px;" value="<?php echo $gender; ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Ethnicity</td>
      <td align="left"><select name="ethnicity" id="ethnicity" class="list_drop" style="width:350px;">
          <option value="">Select</option>
          <option value="Caucasian" <?php if($row['user_ethnicity']=="Caucasian") echo "selected";?>> Caucasian</option>
          <option value="Black" <?php if($row['user_ethnicity']=="Black") echo "selected";?>>Black</option>
          <option value="European" <?php if($row['user_ethnicity']=="European") echo "selected";?>>European </option>
          <option value="Hispanic" <?php if($row['user_ethnicity']=="Hispanic") echo "selected";?>>Hispanic </option>
          <option value="Indian" <?php if($row['user_ethnicity']=="Indian") echo "selected";?>>Indian </option>
          <option value="Middle Eastern" <?php if($row['user_ethnicity']=="Middle Eastern") echo "selected";?>>Middle Eastern </option>
          <option value="Native American" <?php if($row['user_ethnicity']=="Native American") echo "selected";?>>Native American</option>
          <option value="Asian" <?php if($row['user_ethnicity']=="Asian") echo "selected";?>>Asian </option>
          <option value="Mixed Race" <?php if($row['user_ethnicity']=="Mixed Race") echo "selected";?>>Mixed Race </option>
          <option value="Other Ethnicity" <?php if($row['user_ethnicity']=="Other Ethnicity") echo "selected";?>>Other Ethnicity </option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> City</td>
      <td align="left"><input type="text" name="city" id="city" style="width:350px;" value="<?=$fetch_info['city']?>" /></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Country</td>
      <td align="left"><select name="country" id="country" class="list_drop" style="width:350px;" onChange="getState('findstate.php?country='+this.value)">
          <?php $con= mysql_query("select * from country");
			 while($confetch=mysql_fetch_array($con)){ ?>
          <option value="<?=$confetch['country_id'];?>" <?php if($row['user_country']==$confetch['country_id']) echo "selected";?>>
          <?=$confetch['name'];?>
          </option>
          <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Union Territory</td>
      <td align="left"><select name="territory" id="territory" class="list_drop" style="width:350px;">
          <? $statequery= mysql_query("select * from state");
while($st=mysql_fetch_array($statequery)) { ?>
          <option value="<?=$st['name']?>"<?php if($fetch_info['union_territory']==$st['name']) echo "selected";?>>
          <?=$st['name']?>
          </option>
          <? } ?>
        </select>
        <!--<div id="statediv"></div>-->
      </td>
      <!--<td align="left"><select name="territory" id="territory" class="list_drop" style="width:350px;">
 <option value="Andhra Pradesh" <?php if($fetch_info['union_territory']=="Andhra Pradesh") echo "selected";?>>Andhra Pradesh</option>
<option value="Arunachal Pradesh" <?php if($fetch_info['union_territory']=="Arunachal Pradesh") echo "selected";?>>Arunachal Pradesh</option>
<option value="Assam" <?php if($fetch_info['union_territory']=="Assam") echo "selected";?>>Assam</option>
<option value="Bihar" <?php if($fetch_info['union_territory']=="Bihar") echo "selected";?>>Bihar</option>
<option value="Chandigarh" <?php if($fetch_info['union_territory']=="Chandigarh") echo "selected";?>>Chandigarh</option>
<option value="Chhattisgarh" <?php if($fetch_info['union_territory']=="Chhattisgarh") echo "selected";?>>Chhattisgarh</option>
<option value="Dadra and Nagar Haveli" <?php if($fetch_info['union_territory']=="Dadra and Nagar Haveli") echo "selected";?>>Dadra and Nagar Haveli</option>
<option value="Daman and Diu" <?php if($fetch_info['union_territory']=="Daman and Diu") echo "selected";?>>Daman and Diu</option>
<option value="Delhi" <?php if($fetch_info['union_territory']=="Delhi") echo "selected";?>>Delhi</option>
<option value="Goa" <?php if($fetch_info['union_territory']=="Goa") echo "selected";?>>Goa</option>
<option value="Gujarat" <?php if($fetch_info['union_territory']=="Gujarat") echo "selected";?>>Gujarat</option>
<option value="Haryana" <?php if($fetch_info['union_territory']=="Haryana") echo "selected";?>>Haryana</option>
<option value="Himachal Pradesh" <?php if($fetch_info['union_territory']=="Himachal Pradesh") echo "selected";?>>Himachal Pradesh</option>
<option value="Jammu and Kashmir" <?php if($fetch_info['union_territory']=="Jammu and Kashmir") echo "selected";?>>Jammu and Kashmir</option>
<option value="Jharkhand" <?php if($fetch_info['union_territory']=="Jharkhand") echo "selected";?>>Jharkhand</option>
<option value="Karnataka" <?php if($fetch_info['union_territory']=="Karnataka") echo "selected";?>>Karnataka</option>
<option value="Kerala" <?php if($fetch_info['union_territory']=="Kerala") echo "selected";?>>Kerala</option>
<option value="Lakshadweep Islands" <?php if($fetch_info['union_territory']=="Lakshadweep Islands") echo "selected";?>>Lakshadweep Islands</option>
<option value="Madhya Pradesh" <?php if($fetch_info['union_territory']=="Madhya Pradesh") echo "selected";?>>Madhya Pradesh</option>
<option value="Maharashtra" <?php if($fetch_info['union_territory']=="Maharashtra") echo "selected";?>>Maharashtra</option>
<option value="Manipur" <?php if($fetch_info['union_territory']=="Manipur") echo "selected";?>>Manipur</option>
<option value="Meghalaya" <?php if($fetch_info['union_territory']=="Meghalaya") echo "selected";?>>Meghalaya</option>
<option value="Mizoram" <?php if($fetch_info['union_territory']=="Mizoram") echo "selected";?>>Mizoram</option>
<option value="Nagaland" <?php if($fetch_info['union_territory']=="Nagaland") echo "selected";?>>Nagaland</option>
<option value="Orissa" <?php if($fetch_info['union_territory']=="Orissa") echo "selected";?>>Orissa</option>
<option value="Pondicherry" <?php if($fetch_info['union_territory']=="Pondicherry") echo "selected";?>>Pondicherry</option>
<option value="Punjab" <?php if($fetch_info['union_territory']=="Punjab") echo "selected";?>>Punjab</option>
<option value="Rajasthan" <?php if($fetch_info['union_territory']=="Rajasthan") echo "selected";?>>Rajasthan</option>
<option value="Sikkim" <?php if($fetch_info['union_territory']=="Sikkim") echo "selected";?>>Sikkim</option>
<option value="Tamil Nadu" <?php if($fetch_info['union_territory']=="Tamil Nadu") echo "selected";?>>Tamil Nadu</option>
<option value="Tripura" <?php if($fetch_info['union_territory']=="Tripura") echo "selected";?>>Tripura</option>
<option value="Uttar Pradesh" <?php if($fetch_info['union_territory']=="Uttar Pradesh") echo "selected";?>>Uttar Pradesh</option>
<option value="Uttaranchal" <?php if($fetch_info['union_territory']=="Uttaranchal") echo "selected";?>>Uttaranchal</option>
<option value="West Bengal" <?php if($fetch_info['union_territory']=="West Bengal") echo "selected";?>>West Bengal</option>
<option value="Bangla" <?php if($fetch_info['union_territory']=="Bangla") echo "selected";?>>Bangla</option>
<option value="Aksai Chin" <?php if($fetch_info['union_territory']=="Aksai Chin") echo "selected";?>>Aksai Chin</option>
</select></td>-->
    </tr>
    <td align="right" valign="top"> Postal Code</td>
    <td align="left"><input type="text" name="postalcode" id="postalcode" style="width:350px;" value="<?=$fetch_info['postalcode']?>" />
    </td>
    </tr>
    
    <tr>
      <td align="right" valign="top"> Seeking</td>
      <td align="left"><select name="seeking" id="seeking" class="list_drop" style="width:350px;">
          <option value="male" <?php if($fetch_info['seeking']=="male") echo "selected";?>>Male</option>
          <option value="female" <?php if($fetch_info['seeking']=="female") echo "selected";?>>Female</option>
        </select>
        <!--<input type="text" name="phone" id="phone" style="width:350px;" value="<?php echo $phone; ?> "/></td>-->
    </tr>
    <tr>
      <td align="right" valign="top"> I am Looking For</td>
      <td align="left"><select name="looking" id="looking" class="list_drop" style="width:350px;">
          <option Value="Hang Out" <?php if($fetch_info['lookingfor']=="Hang Out") echo "selected";?>>Hang Out</option>
          <option Value="Dating" <?php if($fetch_info['lookingfor']=="Dating") echo "selected";?>>Dating</option>
          <option Value="Friends" <?php if($fetch_info['lookingfor']=="Friends") echo "selected";?>>Friends</option>
          <option Value="Intimate Encounter" <?php if($fetch_info['lookingfor']=="Intimate Encounter") echo "selected";?>>Intimate Encounter</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Height</td>
      <td align="left"><select name="height" id="height" class="list_drop" style="width:350px;">
          <option value="">Select</option>
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
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Hair Color</td>
      <td align="left"><select name="hair" id="hair" class="list_drop" style="width:350px;">
          <option Value="Black" <?php if($fetch_info['hair']=="Black") echo "selected";?>>Black</option>
          <option Value="Blond(e)" <?php if($fetch_info['hair']=="Blond(e)") echo "selected";?>>Blond(e)</option>
          <option Value="Brown" <?php if($fetch_info['hair']=="Brown") echo "selected";?>>Brown</option>
          <option Value="Red" <?php if($fetch_info['hair']=="Red") echo "selected";?>>Red</option>
          <option Value="Gray" <?php if($fetch_info['hair']=="Gray") echo "selected";?>>Gray</option>
          <option Value="Bald" <?php if($fetch_info['hair']=="Bald") echo "selected";?>>Bald</option>
          <option Value="Mixed Color" <?php if($fetch_info['hair']=="Mixed Color") echo "selected";?>>Mixed Color</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Body Type</td>
      <td align="left"><select name="bodytype" id="bodytype" class="list_drop" style="width:350px;">
          <option value="">Select</option>
          <option Value="Thin" <?php if($fetch_info['bodytype']=="Thin") echo "selected";?>>Thin</option>
          <option Value="Athletic" <?php if($fetch_info['bodytype']=="Thin") echo "selected";?>>Athletic</option>
          <option Value="Average" <?php if($fetch_info['bodytype']=="Thin") echo "selected";?>>Average</option>
          <option Value="A Few Extra Pounds" <?php if($fetch_info['bodytype']=="Thin") echo "selected";?>>A Few Extra Pounds</option>
          <option Value="Big &amp; Tall/BBW" <?php if($fetch_info['bodytype']=="Thin") echo "selected";?>>Big &amp; Tall/BBW</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Do You Have Car?</td>
      <td align="left"><select name="havecar" id="havecar" class="list_drop" style="width:350px;">
          <option value="">Select</option>
          <option Value="Prefer Not To Say" <?php if($fetch_info['havecar']=="Prefer Not To Say") echo "selected";?>>Prefer Not To Say</option>
          <option Value="Yes" <?php if($fetch_info['havecar']=="Yes") echo "selected";?>>Yes</option>
          <option Value="No" <?php if($fetch_info['havecar']=="No") echo "selected";?>>No</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Education</td>
      <td align="left"><select name="education" id="education" class="list_drop" style="width:350px;">
          <option value="">Select</option>
          <option value="High school" <?php if($fetch_info['education']=="High school") echo "selected";?>>High school</option>
          <option value="Some college" <?php if($fetch_info['education']=="Some college") echo "selected";?>>Some college</option>
          <option value="Some university" <?php if($fetch_info['education']=="Some university") echo "selected";?>>Some university</option>
          <option value="Associates degree" <?php if($fetch_info['education']=="Associates degree") echo "selected";?>>Associates degree</option>
          <option value="Bachelors degree" <?php if($fetch_info['education']=="Bachelors degree") echo "selected";?>>Bachelors degree</option>
          <option value="Masters degree" <?php if($fetch_info['education']=="Masters degree") echo "selected";?>>Masters degree</option>
          <option value="PhD / Post Doctoral" <?php if($fetch_info['education']=="PhD / Post Doctoral") echo "selected";?>>PhD / Post Doctoral</option>
          <option value="Graduate degree" <?php if($fetch_info['education']=="Graduate degree") echo "selected";?>>Graduate degree</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Eye Color</td>
      <td align="left"><select name="eyecolor" id="eyecolor" class="list_drop" style="width:350px;">
          <option value="">Select</option>
          <option Value="Blue" <?php if($fetch_info['eyecolor']=="Blue") echo "selected";?>>Blue</option>
          <option Value="Hazel" <?php if($fetch_info['eyecolor']=="Hazel") echo "selected";?>>Hazel</option>
          <option Value="Grey" <?php if($fetch_info['eyecolor']=="Grey") echo "selected";?>>Grey</option>
          <option Value="Green" <?php if($fetch_info['eyecolor']=="Green") echo "selected";?>>Green</option>
          <option Value="Brown" <?php if($fetch_info['eyecolor']=="Brown") echo "selected";?>>Brown</option>
          <option Value="Other" <?php if($fetch_info['eyecolor']=="Other") echo "selected";?>>Other</option>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right" valign="top"> Do You Want Children?</td>
      <td align="left"><select name="wantchildren" id="wantchildren" class="list_drop" style="width:350px;">
          <option Value="Prefer Not To Say" <?php if($fetch_info['want_children']=="Prefer Not To Say") echo "selected";?>>Prefer Not To Say</option>
          <option Value="Want children" <?php if($fetch_info['want_children']=="Want children") echo "selected";?>>Want children</option>
          <option Value="Does not want children" <?php if($fetch_info['want_children']=="Does not want children") echo "selected";?>>Does not want children</option>
          <option Value="Undecided/Open" <?php if($fetch_info['want_children']=="Undecided/Open") echo "selected";?>>Undecided/Open</option>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right" valign="top"> Marital Status</td>
      <td align="left"><select name="marital_status" id="marital_status" class="list_drop" style="width:350px;">
          <option Value="Single" <?php if($fetch_info['marital_status']=="Single") echo "selected";?>>Single</option>
          <option Value="Married" <?php if($fetch_info['marital_status']=="Married") echo "selected";?>>Married</option>
          <option Value="Living Together" <?php if($fetch_info['marital_status']=="Living Together") echo "selected";?>>Living Together</option>
          <option Value="Divorced" <?php if($fetch_info['marital_status']=="Divorced") echo "selected";?>>Divorced</option>
          <option Value="Widowed" <?php if($fetch_info['marital_status']=="Widowed") echo "selected";?>>Widowed</option>
          <option Value="Separated" <?php if($fetch_info['marital_status']=="Separated") echo "selected";?>>Separated</option>
          <option Value="Not Single/Not Looking" <?php if($fetch_info['marital_status']=="Not Single/Not Looking") echo "selected";?>>Not Single/Not Looking</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Do You Have Children</td>
      <td align="left"><select name="havechildren" id="havechildren" class="list_drop" style="width:350px;">
          <option Value="Yes" <?php if($fetch_info['have_children']=="Yes") echo "selected";?>>Yes</option>
          <option Value="No" <?php if($fetch_info['have_children']=="No") echo "selected";?>>No</option>
          <option Value="All my kids are 18+" <?php if($fetch_info['have_children']=="All my kids are 18+") echo "selected";?>>All my kids are 18+</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Do You Smoke?</td>
      <td align="left"><select name="do_smoke" id="do_smoke" class="list_drop" style="width:350px;">
          <option value="">Select</option>
          <option Value="No" <?php if($fetch_info['smoke']=="No") echo "selected";?>>No</option>
          <option Value="Socially" <?php if($fetch_info['smoke']=="Socially") echo "selected";?>>Socially</option>
          <option Value="Often (&gt;3 times/week)" <?php if($fetch_info['smoke']=="Often (>3 times/week)") echo "selected";?>>Often (&gt;3 times/week)</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Do you do drugs?</td>
      <td align="left"><select name="dodrugs" id="dodrugs" class="list_drop" style="width:350px;">
          <option value="">Select</option>
          <option Value="No" <?php if($fetch_info['drugs']=="No") echo "selected";?>>No</option>
          <option Value="Socially" <?php if($fetch_info['drugs']=="Socially") echo "selected";?>>Socially</option>
          <option Value="Often (&gt;3 times/week)" <?php if($fetch_info['drugs']=="Often (>3 times/week)") echo "selected";?>>Often (&gt;3 times/week)</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Do you drink? </td>
      <td align="left"><select name="dodrink" id="dodrink" class="list_drop" style="width:350px;">
          <option value="">Select</option>
          <option Value="No" <?php if($fetch_info['drink']=="No") echo "selected";?>>No</option>
          <option Value="Socially" <?php if($fetch_info['drink']=="Socially") echo "selected";?>>Socially</option>
          <option Value="Often (&gt;3 times/week)" <?php if($fetch_info['drink']=="Often (>3 times/week)") echo "selected";?>>Often (&gt;3 times/week)</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Religion</td>
      <td align="left"><select name="religion" id="religion" class="list_drop" style="width:350px;">
          <option value="">Select</option>
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
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Your Profession</td>
      <td align="left"><input type="text" name="profession" id="profession" style="width:350px;" value="<?=$fetch_info['your_profession']?>" /></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Your Income Level? </td>
      <td align="left"><select name="income" id="income" class="list_drop" style="width:350px;">
          <option value=""> Select</option>
          <option Value="Less Than 25,000" <?php if($fetch_info['income']=="Less Than 25,000") echo "selected";?>>Less Than 25,000</option>
          <option Value="25,001 to 35,000" <?php if($fetch_info['income']=="25,001 to 35,000") echo "selected";?>>25,001 to 35,000</option>
          <option Value="35,001 to 50,000" <?php if($fetch_info['income']=="35,001 to 50,000") echo "selected";?>>35,001 to 50,000</option>
          <option Value="50,001 to 75,00" <?php if($fetch_info['income']=="50,001 to 75,00") echo "selected";?>>50,001 to 75,000</option>
          <option Value="75,001 to 100,0005" <?php if($fetch_info['income']=="75,001 to 100,0005") echo "selected";?>>75,001 to 100,000</option>
          <option Value="100,001 to 150,000" <?php if($fetch_info['income']=="100,001 to 150,000") echo "selected";?>>100,001 to 150,000</option>
          <option Value="150,000+" <?php if($fetch_info['income']=="150,000+") echo "selected";?>>150,000+ </option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Would you date someone who smokes?</td>
      <td align="left"><select name="date_smoke" id="date_smoke" class="list_drop" style="width:350px;">
          <option value="">Select</option>
          <option value="No" <?php if($fetch_info['wantdate_smokes']=="No") echo "selected";?>>No</option>
          <option value="Yes" <?php if($fetch_info['wantdate_smokes']=="Yes") echo "selected";?>>Yes</option>
          <option value="I only date smokers" <?php if($fetch_info['wantdate_smokes']=="I only date smokers") echo "selected";?>>I only date smokers</option>
        </select></td>
    </tr>
    <!--<tr>
<td align="right" valign="top">
Do you have children?</td>
<td align="left"><select name="havechildren" id="havechildren" class="list_drop" style="width:350px;">
        <option Value="Prefer Not To Say" <?php if($fetch_info['want_children']=="Prefer Not To Say") echo "selected";?>>Prefer Not To Say</option>
        <option Value="Want children" <?php if($fetch_info['want_children']=="Want children") echo "selected";?>>Want children</option>
        <option Value="Does not want children" <?php if($fetch_info['want_children']=="Does not want children") echo "selected";?>>Does not want children</option>
        <option Value="Undecided/Open" <?php if($fetch_info['want_children']=="Undecided/Open") echo "selected";?>>Undecided/Open</option>
        </select></td>
</tr>-->
    <tr>
      <td align="right" valign="top"> Would you date someone who has kids?</td>
      <td align="left"><select name="datekids" id="datekids" class="list_drop" style="width:350px;">
          <option value="">Select</option>
          <option value="No" <?php if($fetch_info['wantdate_kids']=="No") echo "selected";?>>No</option>
          <option value="Yes" <?php if($fetch_info['wantdate_kids']=="Yes") echo "selected";?>>Yes</option>
          <option value="I only date single parents" <?php if($fetch_info['wantdate_kids']=="I only date single parents") echo "selected";?>>I only date single parents</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Headline</td>
      <td align="left"><input type="text" name="headline" id="headline" style="width:350px;" value="<?php echo $headline; ?> "/></td>
    </tr>
    <tr>
      <td align="right" valign="top"> Interests</td>
      <td align="left"><input type="text" name="interests" id="interests" style="width:350px;" value="<?php echo $interest; ?> "/></td>
    </tr>
    <tr valign="middle">
      <td align="left"><table width="40%" align="left" cellpadding="0" cellspacing="0" border="0">
        </table></td>
    </tr>
    <tr align="center" valign="middle">
      <td></td>
      <td height="40" align="left"><input type="hidden" name="id" value="<?php echo trim($_GET['id']); ?>" />
        <input name="btn_sub" type="submit" class="button2" value="Submit">
        <input name="btn_cancel" type="button" class="button2" value="Cancel" onClick="javascript:location.href='user.php?frm=admin_panel';">
      </td>
    </tr>
  </form>
</table>
<SCRIPT language=JavaScript type=text/javascript>
//You should create the validator only after the definition of the HTML form
var frmvalidator  = new Validator("frm_sub");
frmvalidator.addValidation("password","req","Please enter password");  
frmvalidator.addValidation("email","req","Please Enter email id");  
</SCRIPT>
