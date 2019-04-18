<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PPMS</title>
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>

   <div>
      <nav class="navbar navbar-light navbar-expand-md bg-dark navigation-clean-button">
         <div class="container-fluid"><a class="navbar-brand text-white" href="index.html"><i
                  class="fa fa-globe"></i>&nbsp;PPMS</a><button class="navbar-toggler" data-toggle="collapse"
               data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                  class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
               <ul class="nav navbar-nav ml-auto">

                  <li class="nav-item" role="presentation"><a class="nav-link" href="index.html"
                        style="color:#ffffff;"><i class="fa fa-home"></i>&nbsp;Home</a></li>

                  <li class="nav-item" role="presentation"><a class="nav-link" href="doclist.php"
                        style="color:#ffffff;"><i class="fa fa-user-circle-o"></i>&nbsp;Doctor</a></li>

                  <li class="nav-item" role="presentation"><a class="nav-link" href="registartion.php"
                        style="color:#ffffff;"><i class="fa fa-drivers-license"></i>&nbsp;Registration</a></li>

                  <li class="nav-item" role="presentation"><a class="nav-link text-monospace" href="login.php"
                        style="color:#ffffff;"><i class="fa fa-sign-in"></i>&nbsp;Login</a></li>
               </ul>
            </div>
         </div>
      </nav>
   </div>

   <link rel="stylesheet" href="style.css">
   <div id="regbox">

      <form id="registrationpage" enctype="multipart/form-data" action="registartion.php" method="post">
         <h1>Registration</h1>

         <input type="text" name="email" class="input" placeholder="Email" required />
         <br>
         <input type="password" name="password" class="input" placeholder="Password" required />
         <br>
         <input type="password" name="cpassword" class="input" placeholder="Re-enter Password" required />
         <br>
         <br>
         <input type="file" name="pic" class="input" placeholder="Picture" />
         <br>
         <input type="text" name="name" class="input" placeholder="Name" />
         <br>
         <input type="text" name="age" class="input" placeholder="Age" required />
         <br>
         <input type="text" name="sex" class="input" placeholder="Sex" required />
         <br>
         <input type="text" name="primaryD" class="input" placeholder="Primary Diagnosis" required />
         <br>
         <br>
         <input type="submit" name="signup" class="Registrationbutton" value="Submit" />

      </form>

      <?php

   if (isset($_POST['signup'])) {
      //echo '<script type="text/javascript"> alert("Register button click")</script>';

      $email=$_POST['email'];
      $password=$_POST['password'];
      $cpassword=$_POST['cpassword'];

      $name=$_POST['name'];
      $age=$_POST['age'];
      $sex=$_POST['sex'];
      $primaryD=$_POST['primaryD'];

      $pic=$_FILES['pic']['name'];
      $picTmp=$_FILES['pic']['tmp_name'];
      $folder="img/";

      move_uploaded_file($picTmp,$folder.$pic);


      if ($password == $cpassword) {
         $query = "SELECT * FROM patient WHERE email = '$email' ";

         $query_run = mysqli_query ($con,$query);

         if (mysqli_num_rows($query_run)>0) {
            //all ready a user
            echo '<script type="text/javascript"> alert("User Exists !!")</script>';
         }
         else {

           $query1 = "INSERT INTO patient (email, password, pic, name, age, sex, primaryD) VALUES ('$email','$password','$pic','$name','$age','$sex','$primaryD')";


            $query_run = mysqli_query ($con,$query1);
            if ($query_run) {
               echo '<script type="text/javascript"> alert("Member Add Successfully !!")</script>';
            }
            else {
               echo (mysqli_error($con));
               //echo '<script type="text/javascript"> alert("!! Error !!")</script>';
            }


         }

      }
      else {
         echo '<script type="text/javascript"> alert("Please Enter Values !!")</script>';
      }
   }

mysqli_close($con);

    ?>

   </div>

</body>

</html>