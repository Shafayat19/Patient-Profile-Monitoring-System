<?php
include "connect.php";
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md bg-dark navigation-clean-button">
            <div class="container-fluid"><a class="navbar-brand text-white" href="index.html"><i class="fa fa-globe"></i>&nbsp;PPMS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item" role="presentation"><a class="nav-link" href="index.html" style="color:#ffffff;"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                    
                        <li class="nav-item" role="presentation"><a class="nav-link" href="doctor.php" style="color:#ffffff;"><i class="fa fa-user-circle-o"></i>&nbsp;Doctor</a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link" href="registartion.php" style="color:#ffffff;"><i class="fa fa-drivers-license"></i>&nbsp;Registration</a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link text-monospace" href="login.php" style="color:#ffffff;"><i class="fa fa-sign-in"></i>&nbsp;Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="login-dark">
        <form id="login" action="login.php" method="post">
            <h2 class="sr-only">Login Form</h2>

            <div class="illustration">
                <i class="icon ion-ios-locked-outline"></i>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGropuSelect01">User</label>
                </div>
                
                <select name="user" class="custom-select" id="inputGropuSelect01">
                    <option selected>Choose...</option>
                    <option value="doctor">Doctor</option>
                    <option value="patient">Patient</option>
                </select>

            </div>

            <div class="form-group">
                <input id="email" class="form-control" type="text" name="email" placeholder="Username">
            </div>

            <div class="form-group">
                <input id="password" class="form-control" type="password" name="password"placeholder="Password">
            </div>

            <div class="form-group">
                <input type="submit" name="login" class="btn btn-primary"></input>
            </div>
            <a href="#" class="forgot">Forgot your email or password?</a>
        </form>
    </div>



    <?php

    session_start();
      if(isset($_POST['login'])){
         //echo '<script type="text/javascript"> alert("Logged in xD !!")</script>';
         $email=$_POST['email'];
         $password=$_POST['password'];
         $query = "SELECT * FROM patient WHERE email = '$email' AND password = ('$password')";
         $query_run = mysqli_query($con,$query);
         if (mysqli_num_rows ($query_run) > 0) {
            //vaild
            $_SESSION['email']=$email;
            header("location:patient.php");
         }
         else {
            //Invaild
            echo '<script type="text/javascript"> alert("Invaild User")</script>';
         }
      }
mysqli_close($con);
    ?>


    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 item text">
                        <h3>About</h3>
                        <p>The Patient Profile Monitoring System (PPMS) is an online system that puts in a mechanism to
                            automate the whole process of prescription issuing to report handling, strictly online, with
                            ZERO usage of papers.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">PPMS © 2019</p>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>