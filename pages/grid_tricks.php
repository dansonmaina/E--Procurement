<?php
	$xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('customers');
    $xcrud->columns('customerName,city');
    $xcrud->hide_button('edit');
    $xcrud->unset_view();
    $xcrud->column_pattern('customerName', '<a href="#" class="xcrud-action" data-task="edit" data-primary="{customerNumber}">{value}</a>');
    $xcrud->column_width('city','20%');
    echo $xcrud->render();
?>