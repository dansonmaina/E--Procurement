<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("notes");
    echo $xcrud->render();	
	
?>