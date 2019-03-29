<?php
require_once('connection.php');

//$userData = json_decode($_POST["userData"]);
//$pass = $userData->password;
// $query = "
//       SELECT * FROM cart
//       WHERE userid = '4'
//       ";

// $pass = "admin";
// $pass = md5($pass);
// $result = mysqli_query($connect, $query);
// $cartnumber = mysqli_num_rows($result);
// echo $cartnumber;
// while ($row = mysqli_fetch_array($result)) {
//     $dbpass = $row['password'];
// }

$query = "  
    SELECT price FROM cart WHERE userid='4'";

$result2 = mysqli_query($connect, $query);

$query2 = "  
    SELECT quantity FROM cart WHERE userid='4'";

$result3 = mysqli_query($connect, $query2);
// $ids = mmysqli_fetch_object($result2);
// echo $ids;
//$row = mysqli_fetch_object($result2);
//echo $row->itemid;

$myarray = array();

$i = 0;
while ($row = mysqli_fetch_object($result2)) {
    $myarray[$i] = $row->price;
    $i++;
}

$j = 0;
while ($row2 = mysqli_fetch_object($result3)) {
    $myarray[$j] = $myarray[$j] * $row2->quantity;
    $j++;
}
// echo '<pre>';
print_r($myarray);

// while ($row2 = mysqli_fetch_object($result2)) {
//     echo $row->itemid;
// }
// echo '</pre>';
//echo $dbpass;
// if (!(mysqli_num_rows($result))) {
//     echo '-1';
// if ($dbpass == $pass) {
// }
//     //echo '   matched';
// else {
//     //echo "   not matched";
// }


// } else {
//     $_SESSION['user'] = $userData->username;

//         // header("location:index.php");
// }
