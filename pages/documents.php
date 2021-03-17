<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("documents");
    echo $xcrud->render();	
	
?>