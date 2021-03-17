<?php
    $xcrud = Xcrud::get_instance();
	
	//language snipet
    if(isset($_SESSION["lang"])){
    	$xcrud->language($_SESSION["lang"]);
    }else{
    	$xcrud->language('en');
    } 
	
    $xcrud->table('gallery');
    $xcrud->modal('image,description');
    $xcrud->change_type('image', 'image', false, array(
        'width' => 450,
        'path' => '../uploads/gallery',
        'thumbs' => array(array(
                'height' => 55,
                'width' => 120,
                'crop' => true,
                'marker' => '_th'))));
    $xcrud->button('index.php?page=modal_and_buttons&theme=bootstrap', 'bootstrap theme');
    $xcrud->button('index.php?page=modal_and_buttons&theme=default', 'default theme');
    echo $xcrud->render();
?>