<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("departments");
    echo $xcrud->render();	
	
?>