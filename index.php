<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:dashboard.php");
}
require_once "classes/admin.php";
$admin = new Admin();
if(isset($_POST['login'])){
    $admin->adminLoginInfo($_POST);
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >

    <title> Estimate User Login </title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand text-white" href="#"> YOUR LOGO </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item ">
                    <a class="nav-link " href="index.php"><i class="fa fa-th-list "></i> Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="register.php"> <i class="fa fa-briefcase"></i> Sign Up </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<bR>
<bR>

<div class="container">

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="" method="post">
            <div class="card text-center card  bg-default mb-3">
                <div class="card-header bg-dark text-white">
                    USER LOGIN
                </div>
                <div class="card-body">
                    <input type="text" id="userName" name="username" class="form-control input-sm chat-input" placeholder="Username" required="" />
                    </br>
                    <input type="password" id="userPassword" name="password" class="form-control input-sm chat-input" placeholder="Password" required="" />
                </div>
                <div class="pb-3 pl-3 pr-3">
                    <input type="submit" class="btn btn-success form-control" name="login" value="LOGIN"/>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.slim.min.js" ></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>