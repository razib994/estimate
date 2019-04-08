<?php
session_start();
if($_SESSION['id'] == null){
    header("Location:index.php");
}
require_once "classes/admin.php";
$admin = new Admin();
if(isset($_GET['logout'])){
    $admin->adminLogout();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Estimated </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Kanit:200,400" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/all.css" />
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
                    <a class="nav-link " href="index.php"><?php echo $_SESSION['username']; ?> </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="index.php"> Setting  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="?logout=true"> <i class="fa fa-briefcase"></i> Logout </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<bR>
<bR>