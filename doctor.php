<?php
include "connect.php";

session_start();
$email=$_SESSION['email'];

$result = mysqli_query($con,"SELECT `d_id`, `email`, `password`, `dname`,`phone`, `dfield` FROM `doctor` WHERE email = '$email'");
$retrive = mysqli_fetch_array($result);

//print_r($retrive);

$id = $retrive['d_id'];
$name = $retrive['dname'];
$dfield = $retrive['dfield'];
$phone = $retrive['phone'];


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

<body style="background-image:url(assets/img/doc.jpg);background-attachment: fixed;">
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
    <div>

        <div class="container">
            <div class="col-md-12" id="profile-info">
                <div class="card" style="width:950px; margin-top:20px;">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body" style="padding-top:20px; padding-left : 30px; h5">
                                <h4 class="card-title"><?php echo $name;?></h4>
                                <h5>Username : <?php echo $email;?></h5>
                                <h5>Field : <?php echo $dfield;?></h5>
                                <h5>Phone : <?php echo $phone;?></h5>
                                <h5>ID : <?php echo $id;?></h5>
                                <br>
                                <button type="button" class="btn btn-danger"><a class="text-monospace" href="login.php"
                                        style="color:#ffffff;"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container" id="doctor">
            <div class="col-md-12" style="padding:30px;">
                <h2 class="text-center" style="color:#FFF; padding-bottom: 20px;">Patient List</h2>
                <ul class="list-group">

                    <?php

$datas = mysqli_query($con, "SELECT `name`,`p_id` FROM `patient`");


foreach($datas as $data)
{ ?>

                    <li class="list-group-item" style="padding: 15px 15px 20px 20px;">
                        <a class="text-monospace" href="profile.php?id=<?php echo $data['p_id'];?>"
                            style="color:#17202A; font-size: 18px; "><i class="fa fa-user-circle">

                            </i>&nbsp;<?php echo $data['name'];?>
                        </a>
                    </li>

                    <?php
        };
        ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="assets/script/jquery.min.js"></script>
    <script src="assets/script/bootstrap.bundle.min.js"></script>
    <script src="assets/script/jquery.dataTables.min.js"></script>
    <script src="assets/script/dataTables.bootstrap.min.js"></script>
</body>

</html>