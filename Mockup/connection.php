<?php
$connect = mysqli_connect('localhost', 'root', '', 'marvel');

if (!$connect) {
    echo "<script> alert('Database connection error'); </script>";
}
