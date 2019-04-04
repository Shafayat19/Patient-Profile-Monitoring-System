<?php
include "connect.php";

if (isset($_POST['signup'])) {

    $pic=$_FILES['pic']['name'];
    $picTmp=$_FILES['pic']['tmp_name'];
    $folder="img/";

    move_uploaded_file($picTmp,$folder.$pic);

    $query1 = "INSERT INTO `patient`(`pic`) VALUES ('$pic')";
    $query_run = mysqli_query ($con,$query1);
}



?>

<!DOCTYPE html>
<html lang="en">
<body>
    <form id="registrationpage" enctype="multipart/form-data" action="" method="post">
      <h1>Registration</h1>

         
         <input type="file" name="pic" class="input" placeholder="Picture" />
         <br>
         <input type="submit" name="signup" class="Registrationbutton" value="Submit"/>

   </form>
</body>
</html>