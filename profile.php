<?php
include "connect.php";

session_start();
$user = $_SESSION['name'];
echo $user;

$result = mysqli_query($con,"SELECT `p_id`, `pic`, `name`, `age`, `sex`, `primaryD` FROM `patient` WHERE name = '$user'");
$retrive = mysqli_fetch_array($result);

//print_r($retrive);

$id = $retrive['p_id'];
$image = $retrive['pic'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md bg-dark navigation-clean-button">
            <div class="container-fluid"><a class="navbar-brand text-white" href="#"><i
                        class="fa fa-globe"></i>&nbsp;PPMS</a><button class="navbar-toggler" data-toggle="collapse"
                    data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item" role="presentation"><a class="nav-link" href="index.html"
                                style="color:#ffffff;"><i class="fa fa-home"></i>&nbsp;Home</a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link" href="doctor.php"
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
        <div id="profile-info">
            <div class="card" style="width:990px;"></div>
            <div class="card">
                <div class="card-body">
                    <div class="card">

                        <div class="card-body"><img class="rounded-circle" src="<?php echo "img/$image";?>"
                                style="width:150px;height:150px;margin-left:0px;">
                            <h4 class="card-title" style="padding-top:20px;"><?php echo $name;?></h4>
                            <h5>Email : <?php echo $email;?></h5>
                            <h5>Age : <?php echo $age;?></h5>
                            <h5>Sex &nbsp;: <?php echo $sex;?></h5>
                            <h5>Patient ID : <?php echo $id;?></h5>
                            <button type="button" class="btn btn-danger"><a class="text-monospace" href="doctor.php"
                                    style="color:#ffffff;"><i class="fa fa-sign-out"></i>&nbsp;Back</a></button>
                        </div>
                    </div>
                    <br>
                    <h4 class="card-title">Primary Diagnosis:<br></h4>
                    <p style="font-size:19px;"><?php echo $pd;?><br></p>
                </div>


        <div class="card-body">
            <h4 class="card-title">Prescriptions Issued:<br></h4>
            <p><a href="#" style="font-size:20px;">Pdf</a><br></p><button class="btn btn-success" type="button">Issue New Prescription<br></button></div>
        <div class="card-body">


            <?php
   
     $datas = mysqli_query($con, "SELECT * FROM `report` WHERE p_id = $id");
     
  ?>

            <div class="card-body">
                <h4 class="card-title">Report:<br></h4>
                <div class="table-responsive-sm table-bordered" style="width:760px;">
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
                                <td style="width:372px;"><?php echo $data['rname'];?></td>
                                <td><a href="files/<?php echo $data['file'];?>">Report</a></td>
                            </tr>
                            <?php
          };
         ?>


                        </tbody>
                    </table>
                </div>
            </div>





            <div class="container" id="file-upld" style="background-color:#ffffff;margin-top:21px;">

                <form method="post" id="patient" enctype="multipart/form-data">
                    <h3 class="text-capitalize text-center" style="padding:8px;">Upload Reports</h3>
                    <div>
                        <label>Report Name</label>
                        <input class="form-control" type="text" name="rname"></div>
                    <input type="file" name="file">
                    <input class="btn btn-outline-success" type="submit" name="upload" id="psubmit"></input>
                </form>

                <button class="btn btn-primary" type="submit" name="book" style="margin-left:92px;margin-top:19px;">Book
                    Appointment</button>
            </div>

            <?php

    if (isset($_POST['upload'])) {
    //echo '<script type="text/javascript"> alert("Register button click")</script>';
    

    $rname=$_POST['rname'];
    $report=$_FILES['file']['name'];
    $reportTmp=$_FILES['file']['tmp_name'];
    $folder="files/";

      move_uploaded_file($reportTmp,$folder.$report);

    $query1 = "INSERT INTO report (p_id, rname, file) VALUES ('$id','$rname','$report')";
    $query_run = mysqli_query ($con,$query1);
        if ($query_run) {
            echo '<script type="text/javascript"> alert("Report Upload Successful !!")</script>';
        }
        else {
            echo (mysqli_error($con));
            //echo '<script type="text/javascript"> alert("!! Error !!")</script>';
        }
    }

mysqli_close($con);

    ?>


            <div class="container-fluid" id="book"></div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js">
            </script>
            <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
            </body>

            </html>