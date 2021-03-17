<?php
	$xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('customers');
    $xcrud->columns('customerName,phone,city,country'); // columns in grid
    $xcrud->fields('customerName,creditLimit,salesRepEmployeeNumber'); // fields in details
    echo $xcrud->render();
?>