<?php
	$xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('million');
    $xcrud->limit_list('20,50,100,1000'); // do not use 'all' for large tables
    $xcrud->benchmark(); // lets see performance
    echo $xcrud->render();
?>