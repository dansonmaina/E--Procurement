<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("customers");
    echo $xcrud->render();	
	
?>