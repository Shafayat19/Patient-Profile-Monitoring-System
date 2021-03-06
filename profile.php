<?php
include "connect.php";

$user = $_GET["id"];

$result = mysqli_query($con,"SELECT `p_id`, `email`, `pic`, `name`, `age`, `sex`, `primaryD` FROM `patient` WHERE p_id = '$user'");
$retrive = mysqli_fetch_array($result);

//print_r($retrive);

$id = $retrive['p_id'];
$image = $retrive['pic'];
$name = $retrive['name'];
$email = $retrive['email'];
$age = $retrive['age'];
$sex = $retrive['sex'];
$pd = $retrive['primaryD'];

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

    <div class="container">
        <div class="row">
            <div class="col">
                <div id="profile-info">
                    <div class="card bg-light" style="margin-top:20px; width:1100px;">
                        <div class="card-body" style="margin-left:20px;"><img class="rounded-circle"
                                src="<?php echo "img/$image";?>" style="width:150px;height:150px;">
                            <h4 class="card-title" style="padding-top:20px;"><?php echo $name;?></h4>
                            <h5> Email : <?php echo $email;?></h5>
                            <h5>Age : <?php echo $age;?></h5>
                            <h5>Sex &nbsp;: <?php echo $sex;?></h5>
                            <h5>Patient ID : <?php echo $id;?></h5>
                            <button type="button" class="btn btn-danger"><a class="text-monospace" href="doctor.php"
                                    style="color:#ffffff;"><i class="fa fa-sign-out"></i>&nbsp;Back</a></button>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="card bg-light">
            <div class="card-body">
                <h4 class="card-title">Prescriptions Issued:<br></h4>
                <p>
                    <a href="issue.php" style="font-size:20px;"><br></p>
                <button class="btn btn-success" type="button" data-toggle="modal"
                    data-target="#exampleModalCenter">Issue
                    New Prescription<br></button>
                </a>
            </div>

        </div>
    </div>



    <div class="container" style="margin-top:20px;">
        <div class="card bg-light">






            <?php
   
     $datas = mysqli_query($con, "SELECT * FROM `report` WHERE p_id = $id");
     
  ?>

            <div class="card-body">
                <h4 class="card-title">Report:<br></h4>
                <div class="table-responsive-sm table-bordered" style="width:1000px;">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <th>Report</th>
                            <th>File</th>
                        </thead>
                        <tbody>
                            <?php
          foreach($datas as $data)
          { ?>
                            <tr>
                                <td style="width:500px;"><?php echo $data['rname'];?></td>
                                <td><a href="files/<?php echo $data['file'];?>">Report</a></td>
                            </tr>
                            <?php
          };
         ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid" id="book"></div>
    <script src="assets/script/jquery.min.js"></script>
    <script src="assets/script/bootstrap.bundle.min.js"></script>
    <script src="assets/script/jquery.dataTables.min.js"></script>
    <script src="assets/script/dataTables.bootstrap.min.js"></script>
</body>

</html>