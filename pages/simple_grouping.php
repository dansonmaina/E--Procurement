
<?php
    $xcrud = Xcrud::get_instance();	
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
	$xcrud->table('payments');
	$xcrud->unset_remove();
	$xcrud->group_by_columns('customerNumber');
	$xcrud->columns('customerNumber,checkNumber,amount');
	//$xcrud->unset_edit(true,'customerNumber','=','112');
	//$xcrud->unset_edit();
	//$xcrud->unset_edit();
    echo $xcrud->render();
?>
