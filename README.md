# SAGE300_WEBAPI_Samples-PHP-
Just a few Sage 300 WEP API examples using PHP and CURL

For these samples to work you need to setup a Sage ERP 300 Sample company (SAMINC).
The instructions for this can be followed from the official Sage 300 installation guides. Sage300 and WEB-API must be installed.

Setup a new user:WEBAPI with a password:WEBAPI and make sure the WEBAPI user has read/write access in the permission 
setup for the sage modules. IE AR, OE ect ect. Importan!: Ensure Sage 300 Web-API is checked.

Some notes:
These samples do not query all web-api enpoints mostly because in principal the method used to query the API is the same.
I specifically selected and created samples that should cover all scenarios.


post_oe_order.php
Will send a 2 line item order to the OE WebAPI to show you how to add items to the detail array in a loop.
I.E If you have a database loop that will read each record , they can be added to the array one by one untill the loop is 
complete.

get_ar_customerinfo.php Will fetch customer information from the accounts receiveable endoint.

get_ar_cust_optional_fields.php Will fetch all ship to locations. Optional fields sometimes have multiple values, meaning 
it will be nested array inside a nested array.
