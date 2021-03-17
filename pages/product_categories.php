<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("product_categories");
    echo $xcrud->render();	
	
?>