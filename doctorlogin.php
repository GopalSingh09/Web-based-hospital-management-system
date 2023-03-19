<?php
session_start();

    include("include/connection.php");
if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    $q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
    $qq = mysqli_query($connect,$q);

    $row = mysqli_fetch_array($qq);

    if(empty($uname)){
        $error['login'] = "enter username";
    }else if(empty($password)){
        $error['login'] = "enter password";
    }else if($row['status']== "Pendding"){
        $error['login'] = "Please wait for the admin to approve";
    }else if($row['status']=="Rejected"){
        $error['login'] = "try again later";
    }

    if(count($error)==0){
        $query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
        $res = mysqli_query($connect,$query);
        if(mysqli_num_rows($res)){
            echo "<script>alert('done')</script>";

            $_SESSION['doctor']= $uname;
            header("Location:doctor/index.php");
        }else{
            echo "<script>alert('Invalid Account')</script>";
        }
    }
}

if(isset($error['login'])){
    $l = $error['login'];
    $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
}else{
    $show="";
}
?>

<html >
<head>
    <title>Doctor login page</title>
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
                <h5 class="text-center my-2">Doctor Login</h5>
                <div>
                <?php echo $show; ?>
                </div>
                <form method="post">
                    <div class="form-group">
                        <input type="text" name="uname" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group"> 
                        <input type="password" name="pass" class="form-control" placeholder="password" >
                    </div>
                    <input type="submit" name="login" class="btn btn-success" value="Login">
                    <a href="apply.php">I dont have an account/Create new</a>   
                </form>
                
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>