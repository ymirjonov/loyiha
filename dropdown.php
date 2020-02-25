<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DropdownList</title>
    <style media="screen">
      body{
        background-color: #81ecec;
      }
      .container{
        background-color: whitesmoke;
        box-shadow: 1px 1px 2px 1px grey;
        padding: 50px 8px 20px 39px;
        width: 50%;
        height:50%;
        margin-left: 35%;
      }
      .txt{
        width: 70%;
        height: 5%;
        border: 1px solid brown;
        border-radius: 05px;
        padding: 10px 5px 10px 5px;
        margin: 10px 0px 15px 0px;
      }
      select{
        width: 75%;
        border:1px solid brown;
        border-radius: 05px;
        box-shadow: : 1px 1px 2px 1px grey;
        padding: 10px 15px 10px 15px;
        margin: 10px 0px 15px 0px;
      }
    </style>
  </head>
  <body>
    <center><h1>How to insert DropdownList Value into Database using PHP MYsql</h1></center>
    <div class="container">


      <form class="" action="" method="post">
        <label for="">Username</label><br>
        <input type="text" class="txt" name="username" placeholder="Ismingizni yozing"><br><br>

        <label for="">Email ID</label><br>
        <input type="email" class="txt" name="email" placeholder="Electron manzilingizni yozing"><br><br>

        <label for="">Tumaningizni tanlang</label><br>
        <select  name="tuman">
          <option value="">--Tanlang--</option>
          <option value="Shovot">Shovot</option>
          <option value="Urganch">Urganch</option>
          <option value="Bog'ot">Bog'ot</option>
          <option value="Xiva">Xiva</option>
        </select><br><br>

        <input type="submit" class="txt" name="insert" value="Ma'lumotni kirgizing">
      </form>
      </div>
  </body>
</html>

<?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,'youtubedb');

  if(isset($_POST['insert'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tuman = $_POST['tuman'];
      $query = "INSERT INTO 'emplist'('username','email','tuman')   VALUES  ('$username','$email','$tuman')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
      echo '<script type = " text/javascript"> alert("Data Saved") </script>';
    }
    else {
      echo '<script type = " text/javascript"> alert("Data NOt Saved") </script>';
    }
  }
 ?>
