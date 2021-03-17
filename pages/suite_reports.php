<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table("suite_reports");

    $xcrud->label('Name','NAME');
    echo $xcrud->render();	
	
?>