<?php
include "connect.php";

session_start();
$email=$_SESSION['email'];

$result = mysqli_query($con,"SELECT `p_id`, `pic`, `name`, `age`, `sex`, `primaryD` FROM `patient` WHERE email = '$email'");
$retrive = mysqli_fetch_array($result);

//print_r($retrive);

$id = $retrive['p_id'];
$image = $retrive['pic'];
$name = $retrive['name'];
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
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="profile-info">
                        <div class="card bg-light" style="margin-top:20px; width:1050px;">
                            <div class="card-body" style="margin-left:20px;"><img class="rounded-circle"
                                    src="<?php echo "img/$image";?>" style="width:150px;height:150px;">
                                <h4 class="card-title" style="padding-top:20px;"><?php echo $name;?></h4>
                                <h5> Email : <?php echo $email;?></h5>
                                <h5>Age : <?php echo $age;?></h5>
                                <h5>Sex &nbsp;: <?php echo $sex;?></h5>
                                <h5>Patient ID : <?php echo $id;?></h5>
                                <button type="button" class="btn btn-danger"><a class="text-monospace" href="login.php"
                                        style="color:#ffffff;"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></button>
                            </div>
                        </div>
                        <br>
                    </div>

                </div>
            </div>
        </div>



        <?php 

$result2 = mysqli_query($con,"SELECT `p_id`, `cdiagno`, `sex`, `diagno`, `med`, `dname`, `time`, `cdate`, `ndate` FROM `issue` WHERE p_id = $id");
$retrive = mysqli_fetch_array($result2);

$p_id=$retrive['p_id'];
$cdiagno=$retrive['cdiagno'];
$sex=$retrive['sex'];
$diagno=$retrive['diagno'];
$med=$retrive['med'];
$dname=$retrive['dname'];
$time=$retrive['time'];
$cdate=$retrive['cdate'];
$ndate=$retrive['ndate'];


?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card bg-light" style="padding-top:20px; width:500px;">
                        <div class="card-body">
                            <h4 class="card-title">Prescriptions Issued:<br></h4>
                            <button class="btn btn-success" type="button" data-toggle="modal"
                                data-target="#exampleModalCenter">View Prescription<br></button>
                            </a>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Prescription</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <pre>
        <h5>Name: <?php echo $name;?></h5>
        <h5>Current Diagnosis : <?php echo $cdiagno;?></h5>
        <h5>Sex &nbsp;: <?php echo $sex;?></h5>
        <h5>Diagnostic Tests : <?php echo $diagno;?></h5>
        <h5>Medicines and corresponding doses : <?php echo $med;?></h5>
        <h5>Doctor's Name : <?php echo $dname;?></h5>
        <h5>Time &nbsp;: <?php echo $time;?></h5>
        <h5>Date : <?php echo $cdate;?></h5>
        <h5>Next date of visit: <?php echo $ndate;?></h5>
        </pre>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-light" style="padding-top:20px; width:500px;">
                        <div class="card-body">
                            <h4 class="card-title">Primary Diagnosis:<br></h4>
                            <p style="font-size:19px;"><?php echo $pd;?><br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col">
                    <?php
   
     $datas = mysqli_query($con, "SELECT * FROM `report` WHERE p_id = $id");
     
  ?>
                    <div class="card bg-light" style="margin-top:20px; width:1050px;">
                        <div class="card-body">
                            <h4 class="card-title text-center">Report:<br></h4>
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
            </div>
        </div>






        <div class="container" id="file-upld" style="background-color:#ffffff;margin-top:20px;">

            <form method="post" id="patient" enctype="multipart/form-data">
                <h3 class="text-capitalize text-center" style="padding:8px;">Upload Reports</h3>
                <div>
                    <label>Report Name</label>
                    <input class="form-control" type="text" name="rname"></div>
                <input type="file" name="file">
                <input class="btn btn-outline-success" type="submit" name="upload" id="psubmit"></input>
            </form>

            <button class="btn btn-primary" type="submit" name="book" style="margin-left:92px;margin-top:19px;"><a
                    class="text-monospace" href="booking.php" style="color:#ffffff;margin-top:19px;"><i
                        class="fa fa-sign-out"></i>Book
                    Appointment</a></button>
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
        <script src="assets/script/jquery.min.js"></script>
        <script src="assets/script/bootstrap.bundle.min.js"></script>
        <script src="assets/script/jquery.dataTables.min.js"></script>
        <script src="assets/script/dataTables.bootstrap.min.js"></script>
</body>

</html>