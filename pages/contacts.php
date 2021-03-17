<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("contacts");
    echo $xcrud->render();	
	
?>