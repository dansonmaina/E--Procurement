<?php
    $xcrud = Xcrud::get_instance();	
    //language snipet
    
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
	//print_r($xcrud->translate_external_text("sdadfads"));	
	$xcrud->table("payments");
	$xcrud->table_name($xcrud->translate_external_text("Payments"));
	$xcrud->label('checkNumber',$xcrud->translate_external_text("check_number"));
	$xcrud->label('paymentDate',$xcrud->translate_external_text("payment_date"));
	$xcrud->label('customerNumber',$xcrud->translate_external_text("check_number"));
	$xcrud->label('amount',$xcrud->translate_external_text("amount"));	   
	
	echo $xcrud->render();		
	
?>
