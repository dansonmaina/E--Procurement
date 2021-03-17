<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("branches");
    echo $xcrud->render();	
	
?>