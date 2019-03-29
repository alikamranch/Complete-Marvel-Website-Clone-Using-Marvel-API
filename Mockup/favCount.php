<?php
error_reporting(0);
require_once('connection.php');

session_start();

if (isset($_POST["userData"])) {
    $userData = json_decode($_POST["userData"]);
    $username = $userData->username;
    $q = "select id from user where username='$username'";
    $result = mysqli_query($connect, $q);
    $useridn = mysqli_fetch_array($result);
    //final id
    $id = $useridn['id'];
    // $itemid = $userData->itemid;
    // $price = $userData->price;
    // $title = $userData->title;
    // $quantity = $userData->quantity;
    // $date = $userData->created_date;

    $query = "  
    SELECT * FROM favorite WHERE userId='" . $id . "'";

    $result2 = mysqli_query($connect, $query);
    $cartnumber = mysqli_num_rows($result2);
    echo json_encode($cartnumber);
}
