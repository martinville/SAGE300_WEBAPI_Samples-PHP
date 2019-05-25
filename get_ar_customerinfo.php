<?php
//**************************************************************************************************************************
//** SAGE ERP 300 WEB-API Sample Fetch customer Information
//** Example by  Martin Viljoen mailmartinviljoen@gmail.com
//** 1. Create POST request header with username and password
//** 2. Post request
//** 3. Retrieve each JSON object into a variable and display to screen
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

$CustomerNumber = $JSON_OBJ['CustomerNumber'];
$ShortName = $JSON_OBJ['ShortName'];
$GroupCode = $JSON_OBJ['GroupCode'];
$NationalAccount = $JSON_OBJ['NationalAccount'];
$Status = $JSON_OBJ['Status'];
$InactiveDate = $JSON_OBJ['InactiveDate'];
$DateLastMaintained = $JSON_OBJ['DateLastMaintained'];
$OnHold = $JSON_OBJ['OnHold'];
$StartDate = $JSON_OBJ['StartDate'];
$CreditBureauNumber = $JSON_OBJ['CreditBureauNumber'];
$CreditBureauRating = $JSON_OBJ['CreditBureauRating'];
$CreditBureauDate = $JSON_OBJ['CreditBureauDate'];
$CustomerName = $JSON_OBJ['CustomerName'];
$AddressLine1 = $JSON_OBJ['AddressLine1'];
$AddressLine2 = $JSON_OBJ['AddressLine2'];
$AddressLine3 = $JSON_OBJ['AddressLine3'];
$AddressLine4 = $JSON_OBJ['AddressLine4'];
$City = $JSON_OBJ['City'];
$StateProvince = $JSON_OBJ['StateProvince'];
$ZipPostalCode = $JSON_OBJ['ZipPostalCode'];
$Country = $JSON_OBJ['Country'];
$ContactName = $JSON_OBJ['ContactName'];
$PhoneNumber = $JSON_OBJ['PhoneNumber'];
$FaxNumber = $JSON_OBJ['FaxNumber'];
$TerritoryCode = $JSON_OBJ['TerritoryCode'];
$AccountSet = $JSON_OBJ['AccountSet'];
$AutocashProfile = $JSON_OBJ['AutocashProfile'];
$BillingCycle = $JSON_OBJ['BillingCycle'];
$InterestProfile = $JSON_OBJ['InterestProfile'];
$CurrencyCode = $JSON_OBJ['CurrencyCode'];
$PrintStatements = $JSON_OBJ['PrintStatements'];
$AccountType = $JSON_OBJ['AccountType'];
$Terms = $JSON_OBJ['Terms'];
$RateType = $JSON_OBJ['RateType'];
$TaxGroup = $JSON_OBJ['TaxGroup'];
$TaxRegistrationNumber1 = $JSON_OBJ['TaxRegistrationNumber1'];
$TaxRegistrationNumber2 = $JSON_OBJ['TaxRegistrationNumber2'];
$TaxRegistrationNumber3 = $JSON_OBJ['TaxRegistrationNumber3'];
$TaxRegistrationNumber4 = $JSON_OBJ['TaxRegistrationNumber4'];
$TaxRegistrationNumber5 = $JSON_OBJ['TaxRegistrationNumber5'];
$TaxClassCode1 = $JSON_OBJ['TaxClassCode1'];
$TaxClassCode2 = $JSON_OBJ['TaxClassCode2'];
$TaxClassCode3 = $JSON_OBJ['TaxClassCode3'];
$TaxClassCode4 = $JSON_OBJ['TaxClassCode4'];
$TaxClassCode5 = $JSON_OBJ['TaxClassCode5'];
$CreditLimitCustomerCurrency = $JSON_OBJ['CreditLimitCustomerCurrency'];
$BalanceDueInCustomerCurrency = $JSON_OBJ['BalanceDueInCustomerCurrency'];
$BalanceDueInFunctionalCurrency = $JSON_OBJ['BalanceDueInFunctionalCurrency'];
$DateOfLastStatement = $JSON_OBJ['DateOfLastStatement'];
$LastStatementTotalCustomerCurrency = $JSON_OBJ['LastStatementTotalCustomerCurrency'];
$DateOfLastBalanceForwardStatement = $JSON_OBJ['DateOfLastBalanceForwardStatement'];
$BeginningBalanceOnLastStatement = $JSON_OBJ['BeginningBalanceOnLastStatement'];
$DateOfLastRevaluation = $JSON_OBJ['DateOfLastRevaluation'];
$LastRevaluationBalance = $JSON_OBJ['LastRevaluationBalance'];
$NumberOfOpenDocuments = $JSON_OBJ['NumberOfOpenDocuments'];
$NumberOfPaidInvoices = $JSON_OBJ['NumberOfPaidInvoices'];
$NumberOfDaysToPay = $JSON_OBJ['NumberOfDaysToPay'];
$DateOfLargestInvoice = $JSON_OBJ['DateOfLargestInvoice'];
$DateOfHighestBalance = $JSON_OBJ['DateOfHighestBalance'];
$DateOfLargestInvoiceLastYear = $JSON_OBJ['DateOfLargestInvoiceLastYear'];
$DateOfHighestBalanceLastYear = $JSON_OBJ['DateOfHighestBalanceLastYear'];
$DateOfLastActivity = $JSON_OBJ['DateOfLastActivity'];
$DateOfLastInvoice = $JSON_OBJ['DateOfLastInvoice'];
$DateOfLastCreditNote = $JSON_OBJ['DateOfLastCreditNote'];
$DateOfLastDebitNote = $JSON_OBJ['DateOfLastDebitNote'];
$DateOfLastReceipt = $JSON_OBJ['DateOfLastReceipt'];
$DateOfLastDiscount = $JSON_OBJ['DateOfLastDiscount'];
$DateOfLastAdjustment = $JSON_OBJ['DateOfLastAdjustment'];
$DateOfLastWriteOff = $JSON_OBJ['DateOfLastWriteOff'];
$DateOfLastReturnedCheck = $JSON_OBJ['DateOfLastReturnedCheck'];
$DateOfLastInterestCharge = $JSON_OBJ['DateOfLastInterestCharge'];
$LargestInvoiceNumber = $JSON_OBJ['LargestInvoiceNumber'];
$LargestInvoiceNumberLastYear = $JSON_OBJ['LargestInvoiceNumberLastYear'];
$LargestInvoiceCustomerCurrency = $JSON_OBJ['LargestInvoiceCustomerCurrency'];
$HighestBalanceCustomerCurrency = $JSON_OBJ['HighestBalanceCustomerCurrency'];
$LargestInvoiceLastYearCustomerCurrency = $JSON_OBJ['LargestInvoiceLastYearCustomerCurrency'];
$HighBalanceLastYearCustomerCurrency = $JSON_OBJ['HighBalanceLastYearCustomerCurrency'];
$LastInvoiceAmountCustomerCurrency = $JSON_OBJ['LastInvoiceAmountCustomerCurrency'];
$LastCreditNoteAmountCustomerCurrency = $JSON_OBJ['LastCreditNoteAmountCustomerCurrency'];
$LastDebitNoteAmountCustomerCurrency = $JSON_OBJ['LastDebitNoteAmountCustomerCurrency'];
$LastReceiptCustomerCurrency = $JSON_OBJ['LastReceiptCustomerCurrency'];
$LastDiscountAmountCustomerCurrency = $JSON_OBJ['LastDiscountAmountCustomerCurrency'];
$LastAdjustmentAmountCustomerCurrency = $JSON_OBJ['LastAdjustmentAmountCustomerCurrency'];
$LastWriteOffAmountCustomerCurrency = $JSON_OBJ['LastWriteOffAmountCustomerCurrency'];
$LastReturnedCheckAmountCustomerCurr = $JSON_OBJ['LastReturnedCheckAmountCustomerCurr'];
$LastInterestChargeCustomerCurrency = $JSON_OBJ['LastInterestChargeCustomerCurrency'];
$LargestInvoiceFunctionalCurrency = $JSON_OBJ['LargestInvoiceFunctionalCurrency'];
$HighestBalanceFunctionalCurrency = $JSON_OBJ['HighestBalanceFunctionalCurrency'];
$LargestInvoiceLastYearFunctionalCurrency = $JSON_OBJ['LargestInvoiceLastYearFunctionalCurrency'];
$HighBalanceLastYearFunctionalCurrency = $JSON_OBJ['HighBalanceLastYearFunctionalCurrency'];
$LastInvoiceAmountFunctionalCurrency = $JSON_OBJ['LastInvoiceAmountFunctionalCurrency'];
$LastCreditNoteAmountFunctionalCurrency = $JSON_OBJ['LastCreditNoteAmountFunctionalCurrency'];
$LastDebitNoteAmountFunctionalCurrency = $JSON_OBJ['LastDebitNoteAmountFunctionalCurrency'];
$LastReceiptFunctionalCurrency = $JSON_OBJ['LastReceiptFunctionalCurrency'];
$LastDiscountAmountFunctionalCurrency = $JSON_OBJ['LastDiscountAmountFunctionalCurrency'];
$LastAdjustmentAmountFunctionalCurrency = $JSON_OBJ['LastAdjustmentAmountFunctionalCurrency'];
$LastWriteOffAmountFunctionalCurrency = $JSON_OBJ['LastWriteOffAmountFunctionalCurrency'];
$LastReturnedCheckAmountFunctionalCurr = $JSON_OBJ['LastReturnedCheckAmountFunctionalCurr'];
$LastInterestChargeFunctionalCurrency = $JSON_OBJ['LastInterestChargeFunctionalCurrency'];
$Salesperson1 = $JSON_OBJ['Salesperson1'];
$Salesperson2 = $JSON_OBJ['Salesperson2'];
$Salesperson3 = $JSON_OBJ['Salesperson3'];
$Salesperson4 = $JSON_OBJ['Salesperson4'];
$Salesperson5 = $JSON_OBJ['Salesperson5'];
$SalesSplitPercentage1 = $JSON_OBJ['SalesSplitPercentage1'];
$SalesSplitPercentage2 = $JSON_OBJ['SalesSplitPercentage2'];
$SalesSplitPercentage3 = $JSON_OBJ['SalesSplitPercentage3'];
$SalesSplitPercentage4 = $JSON_OBJ['SalesSplitPercentage4'];
$SalesSplitPercentage5 = $JSON_OBJ['SalesSplitPercentage5'];
$AverageDaysToPay = $JSON_OBJ['AverageDaysToPay'];
$CustomerPriceList = $JSON_OBJ['CustomerPriceList'];
$CustomerDiscountType = $JSON_OBJ['CustomerDiscountType'];
$AmountPastDue = $JSON_OBJ['AmountPastDue'];
$ContactsEmail = $JSON_OBJ['ContactsEmail'];
$Email = $JSON_OBJ['Email'];
$WebSite = $JSON_OBJ['WebSite'];
$BillingMethod = $JSON_OBJ['BillingMethod'];
$PaymentCode = $JSON_OBJ['PaymentCode'];
$FreeOnBoard = $JSON_OBJ['FreeOnBoard'];
$ShipViaCode = $JSON_OBJ['ShipViaCode'];
$ShipViaDescription = $JSON_OBJ['ShipViaDescription'];
$DeliveryMethod = $JSON_OBJ['DeliveryMethod'];
$PrimaryShipToLocation = $JSON_OBJ['PrimaryShipToLocation'];
$ContactsPhone = $JSON_OBJ['ContactsPhone'];
$ContactsFax = $JSON_OBJ['ContactsFax'];
$AllowPartialShipments = $JSON_OBJ['AllowPartialShipments'];
$AllowWebStoreShopping = $JSON_OBJ['AllowWebStoreShopping'];
$PercentRetained = $JSON_OBJ['PercentRetained'];
$DaysRetained = $JSON_OBJ['DaysRetained'];
$RetainageTermsCode = $JSON_OBJ['RetainageTermsCode'];
$AmountRetainedCustomerCurrency = $JSON_OBJ['AmountRetainedCustomerCurrency'];
$AmountRetainedFunctionalCurrency = $JSON_OBJ['AmountRetainedFunctionalCurrency'];
$NumberOfOptionalFields = $JSON_OBJ['NumberOfOptionalFields'];
$ProcessCommandCode = $JSON_OBJ['ProcessCommandCode'];
$NumberOfOpenPrepayments = $JSON_OBJ['NumberOfOpenPrepayments'];
$AmountPrepaidCustomerCurrency = $JSON_OBJ['AmountPrepaidCustomerCurrency'];
$AmountPrepaidFunctionalCurrency = $JSON_OBJ['AmountPrepaidFunctionalCurrency'];
$DateOfLastRefund = $JSON_OBJ['DateOfLastRefund'];
$LastRefundAmountCustomerCurrency = $JSON_OBJ['LastRefundAmountCustomerCurrency'];
$LastRefundAmountFunctionalCurrency = $JSON_OBJ['LastRefundAmountFunctionalCurrency'];
$CheckLanguage = $JSON_OBJ['CheckLanguage'];
$NextClientUniqueID = $JSON_OBJ['NextClientUniqueID'];
$InventoryLocation = $JSON_OBJ['InventoryLocation'];
$CheckCreditLimit = $JSON_OBJ['CheckCreditLimit'];
$CheckOverdueAmounts = $JSON_OBJ['CheckOverdueAmounts'];
$DaysOverdue = $JSON_OBJ['DaysOverdue'];
$AmountOverdue = $JSON_OBJ['AmountOverdue'];
$AllowBackorderQuantities = $JSON_OBJ['AllowBackorderQuantities'];
$CheckForDuplicatePOs = $JSON_OBJ['CheckForDuplicatePOs'];
$SuppressIntegration = $JSON_OBJ['SuppressIntegration'];
$ARVersion = $JSON_OBJ['ARVersion'];
$Database = $JSON_OBJ['Database'];
$Mode = $JSON_OBJ['Mode'];
$SageBillingAndPaymentCustomer = $JSON_OBJ['SageBillingAndPaymentCustomer'];
$BusinessRegistrationNumber = $JSON_OBJ['BusinessRegistrationNumber'];

//Display some of the variables
echo 'Customer Number: ' . $CustomerNumber . '<br>';
echo 'Customer Shortname: ' . $ShortName . '<br>';
echo 'On Hold Status: ' . $OnHold . '<br>';
echo 'Customer Email: ' . $Email . '<br>';



?>
