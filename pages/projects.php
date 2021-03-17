<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("projects");
    echo $xcrud->render();	
	
?>