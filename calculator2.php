<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Calculator Yasash</title>
  </head>
    <?php
      $birinchiSon = $_POST['birinchiSon'];
      $ikkinchiSon = $_POST['ikkinchiSon'];
      $amal = $_POST['amal'];
      $natija = "";

      if(is_numeric($birinchiSon) && is_numeric($ikkinchiSon)){
        switch ($amal) {
          case "yigindi":
            $natija = $birinchiSon + $ikkinchiSon;
            break;
          case "ayirish":
            $natija = $birinchiSon - $ikkinchiSon;
            break;
          case "kopaytirish":
            $natija = $birinchiSon * $ikkinchiSon;
            break;
          case "bolish":
            $natija = $birinchiSon / $ikkinchiSon;
          }
      }
     ?>

  <body>
    <div ip = "page-wrap">
      <h1>PHPda Calculator</h1>
        <form  action="" method="post" id = "quiz-form">
          <p>
            <input type="number" name="birinchiSon" id = "birinchiSon"
            required = "required" value="<?php echo $birinchiSon ?>"/><b>Birinchi son</b>
          </p>
          <p>
            <input type="number" name="ikkinchiSon" id = "ikkinchiSon"
            required = "required" value="<?php echo $ikkinchiSon ?>"/><b>Ikkinchi son</b>
          </p>
          <p>
            <input readonly = "readonly" name="natija" value="<?php echo $natija ?>"><b>Natija</b>
          </p>
          <input type="submit" name="amal" value="yigindi"/>
          <input type="submit" name="amal" value="ayirish"/>
          <input type="submit" name="amal" value="kopaytirish"/>
          <input type="submit" name="amal" value="bolish"/>
          </form>
        </div>
      </body>
</html>
