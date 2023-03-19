<?php
include("include/connection.php");

if(isset($_POST['sign'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $con_pass = $_POST['con_pass'];

    $error = array();
    if(empty($fname)){
        $error['ac'] = "Enter First name";
    }else if(empty($lname)){
        $error['ac'] = "Enter Last name";
    }else if(empty($uname)){
        $error['ac'] = "Enter User name";
    }else if(empty($email)){
        $error['ac'] = "Enter Email";
    }else if(empty($phone)){
        $error['ac'] = "Enter Phone number";
    }else if($gender == ""){
        $error['ac'] = "Select gender";
    }else if($country == ""){
        $error['ac'] = "Select country";
    }else if(empty($password)){
        $error['ac'] = "Enter password";
    }else if($con_pass != $password){
        $error['ac'] = "Password  isn't same";
    }

    if(count($error)==0){
        $query = "INSERT INTO patient(firstname,lastname,username,email,phone,gender,country,password,date_reg,profile) VALUES('$fname','$lname','$uname','$email','$phone','$gender','$country','$password',NOW(),'patient.jpg')";

        $res = mysqli_query($connect,$query);
        if($res){
            header("Location:patientlogin");
        }else{
            echo "<script>alert('failed')</script>";
        }
    }
}
?>

<html>
<head>
    <title>Create Account</title>
</head>
<body>
    <?php
    include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-2 jumbotron">
                    <h5 class="text-center text-info">Create Account</h5>
                    <form method="post">
                        <div class="form-group">
                        <input type="text" name="fname" class="form-control" placeholder="Firstname">
                        </div>

                        <div class="form-group">
                        <input type="text" name="lname" class="form-control" placeholder="lastname">
                        </div>

                        <div class="form-group">
                        <input type="text" name="uname" class="form-control" placeholder="Username">
                        </div>

                        <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Phone no.">
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select your gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select your country</option>
                                <option value="india">India</option>
                                <option value="usa">USA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="password" name="con_pass" class="form-control" placeholder="Re-type Password">
                        </div>
                        <input type="submit" name="sign" value="Sign in" class="btn btn-info">
                        <p>already have account? <a href="patientlogin.php">Log in</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>
</html>