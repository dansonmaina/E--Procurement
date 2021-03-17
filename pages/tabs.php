<?php
	$xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('customers');
    $xcrud->fields('customerName,contactLastName,contactFirstName,phone', false, 'Contact');
    $xcrud->fields('addressLine1,addressLine2,city,state,postalCode,country', false, 'Address');
    $xcrud->fields('customerNumber,salesRepEmployeeNumber,creditLimit', false, 'Finance');
    echo $xcrud->render('edit', 148); // edit screen with primary id = 148
?>