<?php
/*session_start();*/
$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
$update = false;
$id = 0;
$name = '';
$location = '';
if(isset($_POST['save'])){
  $name = $_POST['name'];
  $location = $_POST['regionid'];
  $gender =$_POST['gender'];

  $mysqli->query("INSERT INTO data(name, gender,region_id) VALUES('$name','$gender','$location')") or
  die($mysqli->error);
  $_SESSION['message'] = "Record has been saved!";
  $_SESSION['msg_type'] = "success";

  header("location: ruyhat.php");
}

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM data WHERE id =$id") or die ($mysqli->error());

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  header("location: ruyhat.php");
}

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM data WHERE id = $id") or die($mysqli->error());
  if(count($result)==1){
    $row = $result->fetch_array();
    $name = $row['name'];
    $location = $row['regionid'];
  }
}
if(isset($_POST['update'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $location = $_POST['regionid'];

  $mysqli->query("UPDATE data SET name ='$name', region_id = '$location' where id = $id")
  or die($mysqli->error);

  $_SESSION['message'] ="Record has been updated!";
  $_SESSION['msg_type'] ='warning';

  header('location: ruyhat.php');
}

?>
