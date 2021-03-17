<?php
	$xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('customers');
    $xcrud->columns('customerNumber,Customer orders,city');
    $xcrud->fk_relation('Customer orders','customerNumber','customers_orders_fk','customer_id','order_id','orders','orderNumber',array('orderNumber','orderDate'));
    echo $xcrud->render();
?>