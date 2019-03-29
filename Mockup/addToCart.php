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
    $itemid = $userData->itemid;
    $price = $userData->price;
    $title = $userData->title;
    $quantity = $userData->quantity;
    $date = $userData->created_date;

    $query = "  
    INSERT INTO cart (`userid`, `itemid`, `price`, `title`, `quantity`, `created_date`) VALUES ('" . $id . "','" . $itemid . "','" . $price . "' ,'" . $title . "', '" . $quantity . "','" . $date . "') ";

    $check = "select * from cart where userid='$id' and itemid='$itemid'";
    $result2 = mysqli_query($connect, $check);


    if ((mysqli_num_rows($result2)) > 0) {
        echo '-2';
    } else {
        mysqli_query($connect, $query);
        echo '-1';
    }
}
