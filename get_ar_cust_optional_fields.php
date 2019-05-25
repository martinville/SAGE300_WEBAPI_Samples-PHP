<?php
//**************************************************************************************************************************
//** SAGE ERP 300 WEB-API Sample Fetch customer info optional fileds
//** Example by  Martin Viljoen mailmartinviljoen@gmail.com
//** 1. Create POST request header with username and password
//** 2. Post request
//** 3. Retrieve each JSON object into a variable and display to screen
//** 4. Cylcle through each Object[CustomerOptionalFieldValues] values
//**************************************************************************************************************************


//Select customer to be retrieved
$ACCOUNT_CODE='1100';
//Setup Endpoint to be queried.
$ENDPOINT_URL = "http://localhost/Sage300WebApi/v1.0/-/SAMINC/AR/ARCustomers('$ACCOUNT_CODE')";
$ENDPOINT_USER='WEBAPI';
$ENDPOINT_PASS='WEBAPI';


//add username and password to POST request header (Username and Password is formatted in HTTP Basic authentiation)
$auth = base64_encode($ENDPOINT_USER . ":" . $ENDPOINT_PASS);
$context = stream_context_create([
    "http" => [
        "header" => "Authorization: Basic $auth"
    ]
]);

$IncommingData = file_get_contents($ENDPOINT_URL, false, $context ); //Fetch data from URL
$JSON_OBJ = json_decode($IncommingData,true); //Decode data from URL into JSON Format

//Output JSON data as is to screen see further down below how to iterate through JSON array to get each field value individtually into a usable variable.
//header('Content-type: application/json');
//echo $IncommingData ;



//CustomerOptionalFieldValues is a JSON object that holdes more than one record
//Below will cycle through them one by one using foreach
//Tip: To get a better idea of this uncomment the section that will dump all the of the cutomer info to screen.

//CUSTOMER_IFNO
// |
// --CustomerNumber
// --OptionalField
// --Values
// --CustomerOptionalFieldValueType

$RowCount=0;				
$CustomerOptionalFieldValues = $JSON_OBJ['CustomerOptionalFieldValues'];
	
	foreach($CustomerOptionalFieldValues as $item) { //foreach element in $array
		$RowCount++;
		$CustomerNumber = $item['CustomerNumber'];
		$OptionalField = $item['OptionalField'];
		$Value = $item['Value'];
		$CustomerOptionalFieldValueType = $item['CustomerOptionalFieldValueType'];
		
		//Output each object item to screen
		echo 
		'ROW:' . $RowCount . '<b>Customer Number:</b>[' . $CustomerNumber . '] <b>OptionalField:</b>[' . $OptionalField  .'] <b>Value:</b>[' . $Value  .'] <b>CustomerOptionalFieldValueType:</b>[' . $CustomerOptionalFieldValueType  .']     <br>';
	}




?>
