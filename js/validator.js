function validator() {

	this.checkPhoto = function (imagename	) {
		var imagefile_value = imagename;
		var checkimg = imagefile_value.toLowerCase();
		if (!checkimg.match(/(\.jpg|\.gif|\.png|\.JPG|\.GIF|\.PNG|\.jpeg|\.JPEG)$/))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	this.checkFile = function (imagename	) {
		var imagefile_value = imagename;
		var checkimg = imagefile_value.toLowerCase();
		if (!checkimg.match(/(\.pdf|\.txt|\.doc)$/))
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	this.checkUsername = function(strng){
		var error = "";
		if (strng == "") {
			return "<span>You didn't enter a username.</span>";
		}
		if ((strng.length < 4) || (strng.length > 10)) {
			return "<span>The username is the wrong length.</span>";
		}
		var illegalChars = /\W/;
		// allow only letters, numbers, and underscores
		if (illegalChars.test(strng)) {
			return "<span>The username contains illegal characters.</span>";
		}
	}

	this.isFullName = function(string){
		if(string.length < 1){
			return false;
		}
		return true;
	}


	this.trim = function(str) {
		var m = str;
		if(m != '' || m != 'undefined') {
			return m.replace(/^[\s]+/,'').replace(/[\s]+$/,'').replace(/[\s]{2,}/,' ');
		}else{
			return '';
		}//if
	}//trim
	
	
	
	this.isEmptyValue = function(val){
		var trim_val = this.trim(val);	
		
		if(trim_val == '')
		{	
			return false;
		}
		else
		{
			return true;
		}
		
	}
	
	
	this.isNumber = function (objValue) {
		var charpos = objValue.search("[^0-9]");
		
		if(charpos == -1 && (objValue.length > 0) ) {	
			return true
		} else {
			return false
		}
	}	
	
	this.isPhoneNumber = function (objValue) {
		var charpos = objValue.search("[^0-9\-\(\)]");
		
		if(charpos == -1 && (objValue.length > 0) ) {	
			return true
		} else {
			return false
		}
	}	
//if(str.substr(0,1)==1)

//else if(str.substr(0,3)==2.1)
this.isname = function (objValue)
{
		var temp; 
		var lTag;
		var unm;
		lTag = 0;
		temp = (objValue.length);
		unm= objValue.substring(0,1);
		var charpos = unm.search("[^A-Za-z]");
		
		if(charpos != -1)
		{
			return false; 
		}
		else {	return true; }
		
}

	this.isAlpha = function(objValue) { 
// 		var charpos = objValue.search("[^A-Za-z]"); 
// 		if(objValue.length < 1) {
// 			return true;
// 		}
// 		
// 		if(charpos == -1) {
// 			return true;
// 			
// 		} else {
// 			return false;			
// 		}

		var objValue = this.trim(objValue);
		var charpos = objValue.search("[^A-Za-z]"); 
		
		if(charpos == -1 && (objValue.length > 0) ) {
					return true;
		}else {
			return false
		}
	}

	this.isAlphaNumeric = function (objValue) {
		var objValue = this.trim(objValue);
		var charpos = objValue.search("[^A-Za-z0-9\.\_]"); 
		
		if(charpos == -1 && (objValue.length > 0) ) {
					return true;
		}else {
			return false
		}
		
	}
	
	this.isValidImage = function (imagename)
{
	imagefile_value = imagename;
	var checkimg = imagefile_value.toLowerCase();
	if (!checkimg.match(/(\.jpg|\.gif|\.png|\.JPG|\.GIF|\.PNG|\.jpeg|\.JPEG)$/))
	{
				
		return true;
	}
	else
	{
		return false;
	}
}
	
	this.validEmail = function (str) {
		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		var err_msg = "Invalid E-mail ID";
		var return_val = true;
		
		if (str.indexOf(at)==-1)
		{	return_val = false	}
		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
		{   return_val = false	}
		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
		{	return_val = false	}
		if (str.indexOf(at,(lat+1))!=-1)
		{	return_val = false	}
		if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
		{	return_val = false	}
		if (str.indexOf(dot,(lat+2))==-1)
		{	return_val = false	}
		if (str.indexOf(" ")!=-1)
		{	return_val = false	}
		
		if(return_val == true) {
			return true;
		} else {
			return false;
		}
	}//validEmail
	
	this.verifyEmail = function(email,vemail) {
		if(vemail.length > 0 && email == vemail) {
			return true;
		}else{
			return false;
		}
	}//verifyEmail	
	
	
	this.validatePassword = function(pass) {
		var pass = this.trim(pass);
		if(pass.length < 4) {
			return false;
		}else{
			return true;
		}//if
	}//validatePassword
	
	
	this.verifyPassword = function(pass,vpass) {
		if(pass == vpass) {
			return true;
		}else{
			return false;
		}
	}//verifyPassword	
	
	
	this.clearData = function (arr) {
		for(i=0; i < arr.length; i++) {
			Dom.get(arr[i]).value = '';	
		}
	}
	
	
	this.hasWhiteSpace = function(s) {
		
		var str = s;
		
		for(i=0;i<str.length;i++){
			if(str[i] == " "){
				return true;	
			}
		}
	}	
	this.validPic = function (image) {
		var vext;
		var image;
		image = image;
		vext  = image.split(".");
		if((vext[1]!="jpg") && (vext[1]!="gif") && (vext[1]!="png") && (vext[1]!="JPEG") && (vext[1]!="JPG") && (vext[1]!="GIF") && (vext[1]!="PNG") && (vext[1]!="jpeg"))
		 {
			return false;
		}
		return true;
     	}
	
}//validator

var validator = new validator();