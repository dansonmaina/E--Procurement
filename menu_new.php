<?php
require_once 'pages/bootstrap.php';
require ('pages/menu_admin.php');
$code = "";
//echo $_SESSION['role'];
//check if already logged in move to home page
if( !$user->is_logged_in() ){
	 header('Location: login.php'); exit(); 
}

$db = Xcrud_db::get_instance();
if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
}

if(isset($_SESSION['username'])){
	unset($_SESSION['default_level1_name']);
	unset($_SESSION['default_level2_name']);	
	$roles = $user->get_roles($_SESSION['username']);
}
//$page = (isset($_GET['page']) && isset($pagedata[$_GET['page']])) ? $_GET['page'] : 'minimal';
Xcrud_config::$theme = 'bootstrap';
if(isset($_GET['level1'])){
	$level1= $_GET['level1'];
}else{
	
	//echo $_SESSION['default_level_name'];
	if(isset($_SESSION['default_level1_name'])){
		$level1 = $_SESSION['default_level1_name'];
	}else{
		$level1 = false;
	}
}

if(isset($_GET['level2'])){
	$level2 = $_GET['level2'];
}else{
	if(isset($_SESSION['default_level2_name'])){
	    $level2 = $_SESSION['default_level2_name'];
		
	}else{
		$level2 = false;
	}
}


if($level1 == false || $level2 == false){
	   // echo "Your Role has No menu";
		//exit;
}else{
	//echo $level2;
	if (array_key_exists($level2, $pagedata[$level1])) {
		extract($pagedata[$level1][$level2]);
	}else{
		
		
			$level1 = false;
			$level2 = false;
			$code = "Page Not found";
	
	}
}



	if($level1 == false || $level2 == false){
		 
	}else{
		$file = dirname(__file__) . '/pages/' . $filename;
		
		//echo $file;
		try{
		
			if(file_exists($file)){
				$code = file_get_contents($file);
			}else{
				$code = "File Not Found";
			}
			
		}catch(Exception $e){
			$code = "File Not Found";
			exit;
		}
	}
    
	$xcrud = Xcrud::get_instance();	
	if(isset($_SESSION["lang"])){
		$xcrud->language($_SESSION["lang"]);
	}else{
		$xcrud->language('en');
	} 
   
    $counter = 0;
	//print_r($pagedata);
	foreach($pagedata as $val=>$x){
		$main_icon = $pagedata[$val]["icon"];
	   $counter++;
?>		

    <!-- User Credentials --> 
	<li class="has-submenu">	

    <a href="#dashboard<?php echo $counter; ?>" title="<?php echo $level1; ?>" data-toggle="collapse" class="<?php echo $level1 != $val ? 'collapsed' : '' ?>" aria-expanded="<?php echo $level1 != $val ? 'false' : 'true' ?>">
        <i class="<?php echo $main_icon;  ?>"></i>
        <span> <?php  echo $xcrud->translate_external_text("$val"); ?> </span>
        <span class="menu-arrow"></span>
    </a>
        
	<ul style="margin-left: 17px;" id="dashboard<?php echo $counter; ?>" class="nav-second-level mm-show" aria-expanded="<?php echo $level1 != $val ? 'false' : 'true' ?>" style="">

    <?php
		foreach($x as $pk=>$pd){
				
			if(is_array($pd)){
				
				$title_1 = $pd['title_1']; 
				$filename = $pd['filename']; 
				$icon = $pd['icon'];  
	
    ?> 
			<li class="<?php echo $level2 == $title_1 ? 'mm-active' : '' ?>">
				<a href="index.php?level1=<?php echo $val ?>&level2=<?php echo $title_1; ?>" title="<?php echo $title_1; ?>"> 
			    <em class="<?php echo $icon; ?>"></em> <?php echo $xcrud->translate_external_text("$title_1"); ?>
			  </a>
			</li>
<?php
}
			


		}
?>		
	</ul>
	</li>
		
<?php		
			   
	}
?>