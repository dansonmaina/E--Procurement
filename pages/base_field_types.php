<?php
    $xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('base_fields');
    $xcrud->no_editor('text_area');
    echo $xcrud->render('create');
?>