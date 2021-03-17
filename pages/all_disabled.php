<?php
	$xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('payments');
    $xcrud->unset_add();
    $xcrud->unset_edit();
    $xcrud->unset_remove();
    $xcrud->unset_view();
    $xcrud->unset_csv();
    $xcrud->unset_limitlist();
    $xcrud->unset_numbers();
    $xcrud->unset_pagination();
    $xcrud->unset_print();
    $xcrud->unset_search();
    $xcrud->unset_title();
    $xcrud->unset_sortable();
    echo $xcrud->render();
?>