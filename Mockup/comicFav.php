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
    $itemtype = $userData->itemtype;
    $title = $userData->title;

    $query = "  
    INSERT INTO favorite (`userid`, `itemid`, `itemType`, `title`) VALUES ('" . $id . "','" . $itemid . "','" . $itemtype . "' ,'" . $title . "') ";

    $check = "select * from favorite where userId='$id' and itemid='$itemid'";
    $result2 = mysqli_query($connect, $check);


    if ((mysqli_num_rows($result2)) > 0) {
        echo '-2';
    } else {
        mysqli_query($connect, $query);
        echo '-1';
    }
}
