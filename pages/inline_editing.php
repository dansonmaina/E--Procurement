<?php
    $xcrud = Xcrud::get_instance();	
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
	$xcrud->table_name('Employees - Single click cell to edit!');
	$xcrud->table('payments');
	$xcrud->unset_remove();
	$xcrud->fields_inline('customerNumber,checkNumber,paymentDate,amount');//set the fields to allow inline editing
	$xcrud->set_logging(true);
	$xcrud->limit(100);
    echo $xcrud->render();
	
?>
