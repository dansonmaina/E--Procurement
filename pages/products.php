<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("products");
    echo $xcrud->render();	
	
?>