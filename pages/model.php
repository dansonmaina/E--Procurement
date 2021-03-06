<?php 
    $xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table_name('Model');
    $xcrud->table('model');
    $xcrud->fields('make_id,name');   
    //Labels
    $xcrud->label('name','Model');
	$xcrud->label('make_id','Make');
	
    $xcrud->columns('make_id,name');
	$xcrud->relation('make_id','make','make_id','name'); 
    
    $xcrud->unset_print();
    //$xcrud->unset_search();
    echo $xcrud->render();			
?>