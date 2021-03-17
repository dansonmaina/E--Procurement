<?php
    //Xcrud_config::$editor_url = dirname($_SERVER["SCRIPT_NAME"]).'/../editors/ckeditor/ckeditor.js'; // can be set in config
	$xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('orders');
    $xcrud->change_type('status','select','','On Hold,In Process,Resolved,Shipped,Disputed,Cancelled');
    $xcrud->change_type('orderDate','none');
    echo $xcrud->render();
?>