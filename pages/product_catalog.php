<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("product_catalog");
    echo $xcrud->render();	
	
?>