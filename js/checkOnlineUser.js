// JavaScript Document
/*Function to set users online status*/
function check_timeandrun()
{
	setInterval("Change_onlinestatusByForuMins()", 240000); 
	setInterval("Delete_onlinestatusByForuMins()", 300000); 
}
var xmlHttp

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}
function Change_onlinestatusByForuMins()
{ 
	xmlHttp=GetXmlHttpObject()
	var type= "0";
    	if (xmlHttp==null)
    	{
          //alert ("Your browser does not support AJAX!");
          return;
      	}  
    	var url="http://www.Softdatepro.com/modules/profile/update_statusajax.php";
	
	xmlHttp.onreadystatechange=check_status;
    	xmlHttp.open("GET",url,true);
    	xmlHttp.send(null);
}

function check_status() 
{ 
    if (xmlHttp.readyState==4)
    { 
        var response=xmlHttp.responseText;
	
    }
}

function Delete_onlinestatusByForuMins()
{ 
	xmlHttp=GetXmlHttpObject()
	var type= "0";
    	if (xmlHttp==null)
    	{
          //alert ("Your browser does not support AJAX!");
          return;
      	}  
    	var url="http://www.Softdatepro.com/modules/profile/change_onlinestatus.php";
	
	xmlHttp.onreadystatechange=check_statusdelete;
    	xmlHttp.open("GET",url,true);
    	xmlHttp.send(null);
}

function check_statusdelete() 
{ 
    if (xmlHttp.readyState==4)
    { 
        var response=xmlHttp.responseText;
	
    }
}

check_timeandrun();


