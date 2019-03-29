<?php
error_reporting(0);
require_once('connection.php');

session_start();

if (isset($_POST["userData"])) {
    $userData = json_decode($_POST["userData"]);
    $q = "select * from user where username='" . $userData->username . "'";
    $mysql_get_users = mysqli_query($connect, $q);
    $email = $userData->email;
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $number = $userData->number;
    $pic= "avatar_2x.png";
    


    // $get_rows = mysqli_affected_rows($mysql_get_users);

    if (mysqli_num_rows($mysql_get_users) > 0) {
        echo '-1';
    } elseif (!(filter_var($userData->email, FILTER_VALIDATE_EMAIL))) {
        echo '-2';
    } elseif (strlen($number) > 11) {
        echo '-3';
    } else {
        // $userData = json_decode($_POST["userData"]);
        $query = "  
      INSERT INTO user (`username`, `password`, `email`, `number`, `picname`) VALUES ('" . $userData->username . "','" . md5($userData->password) . "','" . $email . "' ,'" . $number . "', '" . $pic . "') ";
        mysqli_query($connect, $query);
        $_SESSION['user'] = $userData->username;
        $_SESSION['phone']= $userData->number;
        $_SESSION['email'] = $email;
        $_SESSION['password']= $userData->password;
        $_SESSION['picname'] = $pic;
        // if (mysqli_fetch_assoc($result)) {

        // }
    }
    // $result = mysqli_query($connect, $query);
    // if (!(mysqli_fetch_assoc($result))) {
    //     echo '-1';
    // } else {
        

    //     header("location:index.php");
    // }
}
