<?php
//**************************************************************************************************************************
//** SAGE ERP 300 WEB-API Sample Create OE Order
//** Example by  Martin Viljoen mailmartinviljoen@gmail.com
//** 1. Create Order line item details array
//** 2. Create Order header and add order line item details to header array
//** 3. Post to Sage 300 Sample SAMINC company using CURL
//**************************************************************************************************************************

//Decalre  Array Item detail row
$ItemData='';  
//After collecting row information into $ItemData, keep adding to $allItemData array
$allItemData=array(); 


//Setup Item 1
$ItemNumber='A14010';
$QTY_ORDERED=1;
$QTY_BACKORDERED=1;
$QTY_COMITTED=0;
$QTY_SHIPPED=0;
//Add above row of data to $ItemData
$ItemData = array(
				'Item' => $ItemNumber ,
				'QuantityOrdered' => (int)$QTY_ORDERED,
				'QuantityBackordered' => (int)$QTY_BACKORDERED,
				'QuantityCommitted' => (int)$QTY_COMITTED,
				'QuantityShipped' => (int)$QTY_SHIPPED
			);	
//Add $ItemData row set to 	$allItemData		
$allItemData[] = $ItemData;	

//Setup Item 2
$ItemNumber='A11030';
$QTY_ORDERED=1;
$QTY_BACKORDERED=1;
$QTY_COMITTED=0;
$QTY_SHIPPED=0;
//Add above row of data to $ItemData
$ItemData = array(
				'Item' => $ItemNumber ,
				'QuantityOrdered' => (int)$QTY_ORDERED,
				'QuantityBackordered' => (int)$QTY_BACKORDERED,
				'QuantityCommitted' => (int)$QTY_COMITTED,
				'QuantityShipped' => (int)$QTY_SHIPPED
			);	
//Add $ItemData row set to 	$allItemData		
$allItemData[] = $ItemData;	


//Setup Order Header
$ACCOUNT_CODE='1100';
$CUST_PO_NUMBER='PO00001';
$ORDER_DESC='Order description';
$ORDER_REFERENCE='Order Reference';
$CUSTOMER_SHIPTO_LOCATION='001';
$SHIP_VIA_CODE='CCT';
$ORDER_COMMENT='This is a comment';

$data = array(
'CustomerNumber' => $ACCOUNT_CODE,
'PurchaseOrderNumber' => $CUST_PO_NUMBER,
'OrderDescription' => $ORDER_DESC,
'OrderReference' => $ORDER_REFERENCE,			
'ShipToLocationCode' => $CUSTOMER_SHIPTO_LOCATION,
'ShipViaCode' => $SHIP_VIA_CODE,
'OrderComment' => $ORDER_COMMENT,		
//Add All Item Data to the Order
'OrderDetails' => $allItemData
);

//Format Arrays into JSON 
$payload = json_encode($data);



//Output the JSON payload to screen
//header('Content-type: application/json');
//echo $payload ;



//POST the JSON DATA USING CURL
	$ENDPOINT_URL = 'http://localhost/Sage300WebApi/v1.0/-/SAMINC/OE/OEOrders';
	$ENDPOINT_USER='WEBAPI';
	$ENDPOINT_PASS='WEBAPI';	

			$CurlHeader = curl_init($ENDPOINT_URL);		
			//set user and pass
			curl_setopt($CurlHeader, CURLOPT_USERPWD, "$ENDPOINT_USER:$ENDPOINT_PASS"); //Your credentials goes here
			//attach encoded JSON string to the POST fields
			curl_setopt($CurlHeader, CURLOPT_POSTFIELDS, $payload);
			//set the content type to application/json
			curl_setopt($CurlHeader, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			//return response instead of outputting
			curl_setopt($CurlHeader, CURLOPT_RETURNTRANSFER, true);	
			//execute the POST request after checking if it may be posted
			$result = curl_exec($CurlHeader);
				
			//close cURL resource
			curl_close($CurlHeader);


//Output result to screen
header('Content-type: application/json');
echo $result ;

