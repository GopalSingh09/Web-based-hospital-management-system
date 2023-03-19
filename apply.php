<?php
include("include/connection.php");

if(isset($_POST['apply'])){

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if(empty($firstname)){
        $error['apply'] = "Enter the First name";
    }else if(empty($lastname)){
        $error['apply'] = "Enter the last name";
    }else if(empty($username)){
        $error['apply'] = "Enter the user name";
    }else if(empty($email)){
        $error['apply'] = "Enter the email";
    }else if($gender == ""){
        $error['apply'] = "Select Gender";
    }else if(empty($phone)){
        $error['apply'] = "Enter the phone number";
    }else if($country == ""){
        $error['apply'] = "Select country";
    }else if(empty($password)){
        $error['apply'] = "Enter the password";
    }else if($confirm_password!= $password){
        $error['apply'] = "Both password doesn't match";
    }
    
    if(count($error)==0){

        $query = "INSERT INTO doctors(firstname,lastname,username,email,gender,phone,country,password,salary,data_reg,status,profile) VALUES('$firstname','$lastname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','doctor.jpg')";
    
        $result = mysqli_query($connect,$query);

        if($result){

            echo "<script>alert('you have successfully Registered   :^)')</script>";

            header("Location: doctorlogin.php");
        }else{
            echo "<script>alert('Failed  :(')</script>";
        }
    }


}

if(isset($error['apply'])){

    $s = $error['apply'];

    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
    $show="";
}
?>

<html >
<head>
    <title>Create new account</title>
</head>
<body style="background-image:url(images/hos1.jpg);background-size:cover; background-attachment: fixed;">
    
    <?php
        include("include/header.php");
    ?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-5 jumbotron">
                <h5 class="text-center">Create New Account</h5>

                <div>
                <?php
                    echo $show;
                ?>
                </div>

                <form method="post" >

                    <div class="form-group">
                        <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" name="uname" class="form-control" placeholder="Username"value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
                    </div>

                    <div class="form-group"> 
                        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                    </div>

                    <div class="form-group"> 
                        <input type="number" name="phone" class="form-control" placeholder="Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                    </div>

                    <div class="form-group"> 
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group"> 
                        <select name="country" class="form-control">
                            <option value="">Select Country</option>
                            <option value="india">India</option>
                            <option value="america">America</option>
                        </select>
                    </div>

                    <div class="form-group"> 
                        <input type="password" name="pass" class="form-control" placeholder="password" >
                    </div>

                    <div class="form-group"> 
                        <input type="password" name="con_pass" class="form-control" placeholder="confirm password" >
                    </div>

                    <input type="submit" name="apply" class="btn btn-success" value="Create">
                    <a href="doctorlogin.php">Already have an account/Login</a> 
                </form>   
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>