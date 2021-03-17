<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("invoices_received");
    echo $xcrud->render();	
	
?>