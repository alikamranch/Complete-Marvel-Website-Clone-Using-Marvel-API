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
    SELECT itemid FROM favorite WHERE userId='" . $id . "' AND itemType='2'";

    $result2 = mysqli_query($connect, $query);
    // $row = mysqli_fetch_object($result2);
    $resultids = array();

    $i = 0;
    while ($row = mysqli_fetch_object($result2)) {
        $resultids[$i] = $row->itemid;
        $i++;
    }

    echo json_encode($resultids);
}
