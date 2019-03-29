<?php
require_once('connection.php');
session_start();

if (isset($_POST["userData"])) {
    $userData = json_decode($_POST["userData"]);
    $pass = $userData->password;
    $password=$pass;
    $pass = md5($pass);
    $query = "  
      SELECT * FROM user  
      WHERE username = '" . $userData->username . "'   
      ";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) {
        $dbpass = $row['password'];
        $number= $row['number'];
        $email = $row['email'];
        $pic=$row['picname'];
    }
    if (!(mysqli_num_rows($result))) {
        echo '-1';
    } elseif (!($dbpass == $pass)) {
        echo '-2';
    } else {
        $_SESSION['user'] = $userData->username;
        $_SESSION['phone'] = $number;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['picname']=$pic;

        // header("location:index.php");
    }
}
