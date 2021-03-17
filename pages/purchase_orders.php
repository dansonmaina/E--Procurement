<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("purchase_orders");
    echo $xcrud->render();	
	
?>