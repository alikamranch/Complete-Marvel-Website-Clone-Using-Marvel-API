<?php
session_start();
session_destroy();
// header("Location: index.php");
$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
