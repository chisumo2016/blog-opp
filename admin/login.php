<?php session_start() ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Login </title>

    <!-- Bootstrap core CSS -->
    <link href="../styles/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../styles/css/blog.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="../styles/css/customs.css" rel="stylesheet">
    <script src="../styles/js/customs.js"></script>


<body>


<div class="container">

    <div class="row">

        <div class="col-sm-12 blog-main">
            <div class="login-page">
                 <h1>Welcome Admin</h1>
                <form action="login.php" method="post">

                    <div class="form">
                        <form class="register-form">

                            <input type="text" name="email" placeholder="email address"/>
                            <input type="password" name="password" placeholder="password"/>
                            <button type="submit" name="login" id="login-button">Login</button>
                            <p class="message">Already registered? <a href="#">Sign In</a></p>
                        </form>

                    </div>
                </form>
            </div>

        </div>


    </div>

</div>

<?php
include "../libs/config.php";
include "../libs/Database.php";

//Create an instance
$db = new Database();

if (isset($_POST['login']))
{
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM admin WHERE email ='$email' AND password='$pass'";

    $user = $db->select($query);

    //check number of rows in the table
    $check = $user->num_rows;

    if ($check > 0){
        $_SESSION['email'] =$email;
        header("Location: index.php?msg = Successfully Logged in!");
    }else{
        echo "<script>alert('Password or Email is not correct')</script>";
    }
}



?>