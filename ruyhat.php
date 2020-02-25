<!DOCTYPE html>
<html >
  <head>
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <?php
 ob_start();
 session_start();
 ob_end_clean();
 if(isset($_SESSION['id'])){
   $SESSION_id = $_SESSION['id'];
 }
else{
  ob_start();
  header('location: login.php');
  ob_end_clean();
}
  ?>
  </head>
  <body>
    <?php require_once 'process.php' ?>

    <?php
      if(isset($_SESSION['message'])):?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
         ?>
      </div>
      <?php endif ?>
    <div class="container">

    <?php
      $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT data.*, region.region_name as region_name FROM data join region on data.region_id = region.id") or die($mysqli->error);
      $regions = $mysqli->query("SELECT * FROM region") or die($mysqli->error);
      $states = $mysqli->query("SELECT * FROM state") or die($mysqli->error);

      ?>
      <div class="row">
        <div class="col-xs-12">
          <a href="logout.php" class="btn btn-link btn-danger pull-right">Logout</a>
        </div>

      </div>
      <div class="row justify-content-md-center">
        <div class="col-xs-12">


          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Location</th>
                <th>gender</th>
                <th>Action</th>
              </tr>
          </thead>
          <?php
            while($row = $result->fetch_assoc()):?>
            <tr>
              <td><?php echo $row['name']; ?></td>

              <td><?php echo $row['region_name']; ?></td>
              <td><?php echo $row['gender']; ?></td>


              <td>
                  <a href="ruyhat.php?edit=<?php echo $row['id']; ?>"
                    class="btn btn-info">Edit</a>
                  <a href="process.php?delete=<?php echo $row['id']; ?>"
                    class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>

          </table>

        </div>
    <div class="row justify-content-centre">
      <div class="col-xs-12">


    <form  action="process.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control"
      value="<?php echo $name; ?>" placeholder="Enter your name">
        </div>

        <div class="form-group">

      </label>
      <label class="btn btn-primary dropdown-toggle" for="states">States</label>

      <select>
      <?php
            while($row = $states->fetch_assoc()):?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
          <?php endwhile; ?>

      </select>
<br><br>

      <label class="btn btn-primary dropdown-toggle" >Location</label>

     <select name="regionid">
      <?php
            while($row = $regions->fetch_assoc()):?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['region_name']; ?></option>
          <?php endwhile; ?>

      </select>
      <!-- <select  name="location" class="form-control">
        <option value="">--Tumanlar--</option>
        <option value="Shovot"<?php if($location=='Shovot')echo 'selected' ?> >Shovot</option>
        <option value="Urganch" <?php if($location=='Urganch')echo 'selected' ?> >Urganch</option>
        <option value="Bogot" <?php if($location=='Bogot') echo 'selected' ?> >Bog'ot</option>
        <option value="Koshkopir" <?php if($location=='Koshkopir')echo 'selected' ?> >Ko'shko'pir</option>
        <option value="Xiva" <?php if($location=='Xiva')echo 'selected' ?> >Xiva</option>
        <option value="Xonqa" <?php if($location=='Xonqa') echo 'selected' ?>>Xonqa</option>
        <option value="Xozorasp" <?php if($location=='Xozorasp') echo 'selected' ?>>Xozarasp</option>
        <option value="Gurlan" <?php if($location=='Gurlan')echo 'selected' ?>>Gurlan</option>
      </select> -->
      </div>
      <div class="form-check">
  <input type="radio" class="form-check-input" value="male" name="gender" >
  <label class="form-check-label disabled" for="gender">Male</label>
</div>

<!-- Material checked disabled -->
<div class="form-check">
  <input type="radio" class="form-check-input" value="female" name="gender" checked >
  <label class="form-check-label disabled md-disabled" for="gender">Female</label>
</div>
      <div class="form-group">
        <?php
        if($update == true): ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
      <?php else: ?>
        <button type="submit" class="btn btn-primary" name="save">Save</button>
      <?php endif; ?>
        </div>
      </form>
        </div>
    </div>
  </div>
  </body>
</html>
