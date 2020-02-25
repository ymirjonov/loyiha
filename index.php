<?php
ob_start();
// session_start();
ob_end_clean();
if(isset($_SESSION['id'])){
  // $SESSION_id = $_SESSION['id'];
  require('ruyhat.php');
}
else{
 // ob_start();
 //header('location: login.php');
 // ob_end_clean()
 require('login.php');
}
 ?>
