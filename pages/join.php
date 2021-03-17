<?php
	$xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('employees');
    $xcrud->join('officeCode','offices','officeCode'); // ... INNER JOIN offices ON employees.officeCode = offices.officeCode ...
    echo $xcrud->render();
?>