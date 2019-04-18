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

        <form id="registrationpage" enctype="multipart/form-data" action="issue.php" method="post">
            <h1>Issue Prescription</h1>

            <input type="text" name="p_id" class="input" placeholder="Patient ID" />
            <br>
            <input type="text" name="cdiagno" class="input" placeholder="Current Diagnosis" />
            <br>
            <input type="text" name="sex" class="input" placeholder="Sex" />
            <br>
            <input type="text" name="diagno" class="input" placeholder="Diagnostic Tests Required" />
            <br>
            <input type="text" name="med" class="input" placeholder="Medicines and Corresponding Doses" />
            <br>
            <input type="text" name="dname" class="input" placeholder="Doctor's Name" />
            <br>
            <label for="input">Time :</label><br>
            <input type="time" name="time" class="input" placeholder="Time" />
            <br>
            <label for="input">Current Date :</label><br>
            <input type="date" name="cdate" class="input" placeholder="Current Date" />
            <br>
            <label for="input">Next Date to Visit :</label><br>
            <input type="date" name="ndate" class="input" placeholder="Next Date to Visit" />
            <br>
            <input type="submit" name="issue" class="Registrationbutton" value="Submit" />

        </form>

        <?php

if (isset($_POST['issue'])) {
      //echo '<script type="text/javascript"> alert("Register button click")</script>';

      $p_id=$_POST['p_id'];
      $cdiagno=$_POST['cdiagno'];
      $sex=$_POST['sex'];
      $diagno=$_POST['diagno'];
      $med=$_POST['med'];
      $dname=$_POST['dname'];
      $time=$_POST['time'];
      $cdate=$_POST['cdate'];
      $ndate=$_POST['ndate'];

        $query1 = "INSERT INTO `issue` (`p_id`, `cdiagno`, `sex`, `diagno`, `med`, `dname`, `time`, `cdate`, `ndate`) VALUES ('$p_id','$cdiagno','$sex','$diagno','$med','$dname','$time','$cdate','$ndate')";


            $query_run = mysqli_query ($con,$query1);
            if ($query_run) {
                echo '<script type="text/javascript"> alert("Prescription Issued Successfully !!")</script>';
            }
            else {
                echo (mysqli_error($con));
               //echo '<script type="text/javascript"> alert("!! Error !!")</script>';
            }
    

}

mysqli_close($con);

    ?>

    </div>

</body>

</html>