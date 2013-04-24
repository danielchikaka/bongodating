<? 
class ADO
{
//connection
var $ERROR;
var $ERRNUMBER;
var $DBNAME;
var $DBUSER;
var $DBPASS;
var $DBSRVER;
var $CONNECTION;
// recordset
var $totalRecord;
var $currentRecord;
var $DBLINK;
var $RECORD;
var $RECORDID ; //record id 
var $EOF; //
//
var $QUERY_TYPE ; 
var $AFFECTED_ROW;


function ADO($dbhost,$db,$dbuser,$dbpass){

$this->DBUSER =  $dbuser;
$this->DBPASS =  $dbpass;
$this->DBSRVER = $dbhost;
$this->DBNAME  = $db;
//connecting to DB
if(! $this->CONNECTION =mysql_connect($this->DBSRVER,$this->DBUSER,$this->DBPASS))
	{
$this->ERROR=mysql_errno();
$this->ERRNUMBER=mysql_error();
return 	$this->ERROR;
	}

if(!$this->DBLINK= mysql_select_db($this->DBNAME) )
	{
	$this->ERROR=mysql_errno();
	$this->ERRNUMBER=mysql_error();
	return 	$this->ERROR;
    }
}
///// 

function ExecuteUpdateQuery($sql){
	if(!$this->RECORD=mysql_query($sql)){
		return false;
 	}
    else{
		$this->AFFECTED_ROW=mysql_affected_rows();
		return true;

	}
}

function ExecuteInsertQuery($sql){
if(!$this->RECORD =mysql_query($sql) )
    {
	$this->ERRNUMBER=mysql_errno();
	$this->ERROR=mysql_error();
	return 	false;
    }
 $this->RECORDID=mysql_insert_id();
 return $this->RECORDID;
}

function ExecuteDeleteQuery($sql){

if(!mysql_query($sql))
{
	$this->ERROR=mysql_errno();
	$this->ERRNUMBER=mysql_error();
	$this->ERROR;
}

}

//followng code is for SELECT QUERY
function ExecuteSelectQuery($sql){
if(!$this->RECORD =mysql_query($sql) )
    {
	$this->ERROR=mysql_error ();
	$this->ERRNUMBER=mysql_errno();
	
    return false;
	}
 
  $this->totalRecord = mysql_num_rows($this->RECORD);
  $this->currentRecord =0;
 
 if($this->totalRecord == 0)
   $this->EOF=true;
 else
  $this->EOF=false;
 return true;
 } 


// move to next record
function MoveNext(){
 if( ($this->currentRecord +1 )== $this->totalRecord)
   $this->EOF=true;
 else
   $this->currentRecord ++;
      
	 
}

/// find value of a feild 
function Fields($field) {
if(!$value=mysql_result($this->RECORD, $this->currentRecord ,$field ))
    {
	$this->ERROR=mysql_errno();
	$this->ERRNUMBER=mysql_error();
	return 	$this->ERROR;
    }
return $value;

}


}
?>