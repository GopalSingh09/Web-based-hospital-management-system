<?php
session_start();
include("include/connection.php");

if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if(empty($username)){
        $error['admin'] = "Enter the username";
    }
    elseif(empty($password)){
        $error['admin'] = "enter the password";
    }

    if(count($error)==0){

        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connect,$query);

        if(mysqli_num_rows($result)== 1){
            echo "<script>alert('You have Login as an admin')</script>";

            $_SESSION['admin'] = $username;

            header("Location:admin/index.php");
            exit();
        }else{
            echo "<script>alert('Invalid Username or Password')</script>";
        }
    }
}



?>

<html>
<head>
<title>Admin login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    include("include/header.php");
    ?>

    <div style="margin-top=10px"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <form method="post" class="my-2">

                        <div ></div>
                        <?php
                        if (isset($error['admin'])){

                            $sh = error['admin'];

                            $show = "<h4 class='alert alert-danger'></h4>";

                        }else{
                            $show = "";
                        }

                        echo $show;

                        ?>

                    <h2>Admin login</h2>
                        <div class="form-group">
                        <input type="text" name="uname" placeholder="name" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="password">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" value="Login">
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>
</html>