<?php
	$xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
    $xcrud->table('productlines');
    $xcrud->columns('productLine,textDescription');
    $xcrud->column_width('textDescription','80%');
    $xcrud->column_cut(250,'textDescription');
    echo $xcrud->render();
?>