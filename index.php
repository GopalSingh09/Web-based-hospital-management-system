<?php
?>
<html>
<head>
<title>HOME</title>
</head>
<body>
        <?php
   include("include/header.php");
   ?>

   <div style="margin-top:50px;"></div>

   <div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 mx-1 shadow">
            <img style: width="100%;height=100%;" src="images/doctor.jpg" >
            <h5 class="text-center" style="color:black;">we are employing for doctors</h5>
            <a href="apply.php"><button class="btn btn-success my-3">Apply now!!</button></a>
            </div>

            <div class="col-md-4 mx-1 shadow">
            <img style= "width:100%; height:190px;" src="images/patient.jfif" >
            <h5 class="text-center" style="color:black;">Create account so that we can take good care of you.</h5>
            <a href="patientlogin.php"><button class="btn btn-success my-3">Create Account!!</button></a>
            </div>

            <div class="col-md-4 mx-1 shadow">
            <img src="images/more-info.jpg" >
            <h5 class="text-center" style="color:black;">Click for more information</h5>
            <a href="more.php"><button class="btn btn-success my-3">More</button></a>
            </div>
        </div>
    </div>
   </div>
</body>
</html>