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

    $query = "  
     DELETE FROM `favorite` WHERE `userId`='" . $id . "' and `itemid`='" . $itemid . "' ";


    mysqli_query($connect, $query);
    echo '-1';
}
