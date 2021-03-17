
<?php

    $xcrud = Xcrud::get_instance();	
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
	$xcrud->table('payments');
    $xcrud ->is_edit_side(true);
	echo $xcrud->render();
		
?>
