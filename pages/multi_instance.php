<?php
	$xcrud1 = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud1->table('orders');
    echo $xcrud1->render();
    
    $xcrud2 = Xcrud::get_instance();
    $xcrud2->table('payments');
    echo $xcrud2->render();
?>