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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background-color:rgb(68,136,238);">
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
            <div id="profile-info">
                <div class="card" style="width:990px; margin-top:20px;" >
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="padding-top:20px;"><?php echo $name;?></h4>
                                <h5>Username : <?php echo $email;?></h5>
                                <h5>Field    : <?php echo $dfield;?></h5>
                                <h5>Phone    : <?php echo $phone;?></h5>
                                <h5>ID       : <?php echo $id;?></h5>
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
                        <div class="row" style="padding-top:10px;">
                            <div class="col-md-6" style="padding:30px;">
                                <h3 class="text-center" style="color:#FFF;">Patient List</h3>
                                <ul class="list-group">

<?php

$datas = mysqli_query($con, "SELECT `name`,`p_id` FROM `patient`");


foreach($datas as $data)
{ ?>
    
    <li class="list-group-item">
    <a class="text-monospace" href="profile.php?id=<?php echo $data['p_id'];?>" style="color:#333; "><i class="fa fa-user-circle">

    </i>&nbsp;<?php echo $data['name'];?>
    </a>
    </li>
    
<?php
        };
        ?>
                                </ul>
                            </div>
                            <div class="col-md-6" style="padding:70px;padding-right:0;padding-bottom:0;padding-left:0;">
                                <form class="d-inline-flex" method="get"><input class="form-control" type="search"
                                        name="search" placeholder="Patient ID"
                                        style="max-width:300px;width:300px;margin:0 auto;"><button
                                        class="btn btn-primary" type="button" style="padding-left:16px;">Search</button>
                                </form>
                                <ul class="list-group float-none" id="file"
                                    style="width:300px;margin:0px;padding:0px;padding-top:10px;"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js">
                </script>
                <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>