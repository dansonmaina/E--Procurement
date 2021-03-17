<?php	
	$xcrud2 = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud2->language($_SESSION["lang"]);
    }else{
    	$xcrud2->language('en');
    } 
		
	$xcrud2->table("logs");
	$xcrud2->relation('updated_by','user','user_id','username');
	$xcrud2->limit(5);
	$xcrud2->unset_remove();
	$xcrud2->unset_add();
	$xcrud2->unset_edit();
	$xcrud2->order_by('updated','desc');
	echo $xcrud2->render();		
?>
