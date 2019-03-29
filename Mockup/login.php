<?php
require_once('connection.php');
session_start();

function correctLogin($username, $password)
{
    if (isset($_POST['username'])) {
        $query = "select * from user where username='" . $username . "'and password='" . $password . "'";
        $result = mysqli_query($connect, $query);

        if (mysqli_fetch_assoc($result)) {
            $_SESSION['user'] = $username;

            header("location:index.php");
        } else {
        //header("Location: index.php?Invalid=Incorrect username or password.");
        }

    }
}


?>