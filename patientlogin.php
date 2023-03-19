<?php
session_start();

include("include/connection.php");

if (isset($_POST['login'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if(empty($uname)){
        echo "<script>alert('enter username')</script>";
    }else if(empty($pass)){
        echo "<script>alert('enter password')</script>";
    }else{

        $query = "SELECT * FROM patient WHERE username='$uname' AND password='$pass'";
        $res = mysqli_query($connect,$query);
        if(mysqli_num_rows($res)==1){

            header("Location:patient/index.php");
            $_SESSION['patient'] = $uname;

        }else{
            echo "<script>alert('Invalid Account')</script>";
        }
    }
}
?>
<html>
<head>
    <title>Patient Login Page</title>
</head>
<body>
    <?php
        include("include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                
                </div>
                <div class="col-md-6 my-5 jumbotron">
                    <h5 class="text-center my-3">Patient Login</h5>     
                    <form method="post">
                        <div>
                            <input type="text" name="uname" class="form-control my-3" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-info my-3" Value="Login">
                        <p> Dont have account?<a href="account.php">Sign in</a></p>
                    </form>           
                </div>
                <div class="col-md-3">
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>