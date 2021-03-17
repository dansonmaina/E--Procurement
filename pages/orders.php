<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("orders");
    echo $xcrud->render();	
	
?>