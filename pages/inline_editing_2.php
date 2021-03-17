<?php
    $xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('employees');
	$xcrud->table_name('Employees - Single click cell to edit!');
    $xcrud->validation_required('lastName',2)->validation_required('firstName',2)->validation_required('jobTitle');
    $xcrud->validation_required('email');
    $xcrud->validation_pattern('email','email')->validation_pattern('extension','alpha_numeric')->validation_pattern('officeCode','natural');
    $xcrud->relation('officeCode','offices','officeCode','city');
    $xcrud->limit(100);
	
    $xcrud->fields_inline('lastName,firstName,extension,email,officeCode,reportsTo,jobTitle');//set the fields to allow inline editing
    
    echo $xcrud->render();
?>