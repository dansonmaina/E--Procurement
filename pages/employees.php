<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("employees");
    echo $xcrud->render();	
	
?>