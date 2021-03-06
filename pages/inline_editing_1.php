<?php
	
	$xcrud = Xcrud::get_instance();	
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
	$xcrud->table_name("Employees - Inline Editing - Double Click on 'Customer Number' Column to edit!");
	$xcrud->table('payments');
	$xcrud->unset_remove();
	$xcrud->fields_inline('customerNumber');//set the fields to allow inline editing
	$xcrud->inline_edit_click('double_click');//can be 'double_click' or 'single_click'
    echo $xcrud->render();

?>
