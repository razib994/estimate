<?php
/**
 * Created by PhpStorm.
 * User: Shovon
 * Date: 4/2/2019
 * Time: 2:20 PM
 */

class Invoic
{
public function invoicAdd($data){
    $link = mysqli_connect("localhost","root","","estimate");
    $insert = "INSERT INTO invoice (labor, labor_options, partdescription, part_number, price, tax, laborunit, cost) VALUES ('$data[labour]','$data[options]','$data[partdescription]','$data[partNumber]','$data[price]','$data[tax]','$data[qty]','$data[cost]')";
    if(mysqli_query($link,$insert)){
        $message = "data Successful";
        header("Location:dashboard.php");
        return $message;
    }else {
        die("query Problem").mysqli_error($link);
    }
}
public function invoiceView(){
    $link = mysqli_connect("localhost","root","","estimate");
    $sql = "SELECT * FROM invoice";
    if(mysqli_query($link,$sql)){
        $result = mysqli_query($link,$sql);
        return $result;
    }else {
        die('Query Problem'.mysqli_error($link));
    }
}

    public function invoiceViewDetails(){
        $link = mysqli_connect("localhost","root","","estimate");
        $sql = "SELECT * FROM invoice ORDER BY id ASC";
        if(mysqli_query($link,$sql)){
            $result = mysqli_query($link,$sql);
            return $result;
        }else {
            die('Query Problem'.mysqli_error($link));
        }
    }

}