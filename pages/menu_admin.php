<?php
$version = 'v1.0';
  if(isset($_SESSION['role'])){
$pagedata = $model->loadMenu($_SESSION['role']);
}else{
  unset($_SESSION);
}
  
  
?>

