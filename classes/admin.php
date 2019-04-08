<?php
/**
 * Created by PhpStorm.
 * User: Shovon
 * Date: 4/2/2019
 * Time: 12:10 PM
 */

class Admin
{
public function adminInfo($data) {
    $link = mysqli_connect("localhost","root","","estimate");
    $password = md5($data['password']);
    $insert = "INSERT INTO user(first_name, last_name, address, username,password) VALUES ('$data[firstname]','$data[lastname]','$data[email]','$data[username]','$password')";
    if(mysqli_query($link,$insert)){
        header("Location:index.php");
    }else {
        die("query Problem").mysqli_error($link);
    }
}
public function adminLoginInfo($data){
    $link = mysqli_connect("localhost","root","","estimate");
    $username = $data['username'];
    $password = md5($data['password']);
    $select ="SELECT * FROM user WHERE username='$username' AND  password = '$password'";
    if(mysqli_query($link,$select)){
        $query = mysqli_query($link,$select);
        $admin = mysqli_fetch_assoc($query);
        if($admin){
            session_start();
            $_SESSION['id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];
            header("Location:dashboard.php");
        }
    }else {
        die("Query Problem".mysqli_error($link));
    }
}
public function adminLogout(){
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    header("Location:index.php");
}
}