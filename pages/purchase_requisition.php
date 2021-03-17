<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("purchase_requisition");
    echo $xcrud->render();	
	
?>