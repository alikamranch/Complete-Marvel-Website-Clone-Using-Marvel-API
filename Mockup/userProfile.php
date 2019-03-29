<?php
error_reporting(0);
session_start();
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="marvel.jpg">
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../dist/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet">
    <link href="userprofileStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">

</head>

<body>









    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="logo.jpg" alt="homepage logo" id="homepage"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="About.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Characters.php">Characters</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Comics.php">Comics</a>
                </li>
            </ul>

            <form class="form-inline mt-2 mt-md-0">
                <span id="favCount"></span>
                <a id="favorite" href="Wishlist.php" style="display: none;" title="Wish list"><span class="nav-link fas fa-heart fa-lg"
                        style="color: #dee2e69e;"></span></a>
                <span id="itemCount"></span>
                <a id="cart" href="Cart.php" style="display: none;" title="Cart"><span class="nav-link fas fa-shopping-cart fa-lg"
                        style="color: #dee2e69e;"></span></a>
                <button id="signinButton" class="btn btn-outline-danger my-2 my-sm-0" type="button" data-toggle="modal"
                    data-target="#loginModalSignIn">Sign
                    In</button>
            </form>


            <a id="usernameInNavbar" class="nav-link" href="userProfile.php" style="display: none; color: #dee2e69e;
"></a>

            <ul id="loginIcon" class="nav" style="display: none;">
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="color: #dee2e69e; background-color: #212427 !important;">
                        <span><i class="fas fa-user"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button"><a href="userProfile.php" class="nav-link dropdown-item"><i
                                    class="fas fa-user"></i>
                                User Profile</a></button>
                        <button id="logout" class="dropdown-item" type="button"><a href="wishlistLogout.php" class="nav-link dropdown-item"><i
                                    class="fas fa-sign-out-alt"></i> Logout</a></button>
                    </div>

                </li>
            </ul>





        </div>
    </nav>



    <?php
        include('connection.php');
        if (isset($_POST['submit'])) {
            $olduser=$_SESSION['user'];
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $pass = $_POST['password'];
            $cpass = $_POST['password2'];
            $pic = $_FILES['picture'];
            $firstname= $_POST['first_name'];
            $_SESSION['firstname'] = $firstname;
            $lastname = $_POST['last_name'];
            $_SESSION['lastname'] = $lastname;
           



            $sql = "SELECT id FROM user WHERE username='$olduser'";
            $result = mysqli_query($connect, $sql);
            $value = mysqli_fetch_array($result);
            $id = $value[0];


            $allow_ext = array('jpg', 'jpeg', 'gif', 'png', '');
            $errors = array();


            $pic_name = $_FILES['picture']['name'];
            $pic_type = strtolower(end(explode(".", $pic_name)));
            $pic_tmp = $_FILES['picture']['tmp_name'];
            $pic_size = $_FILES['picture']['size'];



            if (!(in_array($pic_type, $allow_ext))) {
                $errors[] = "This file is not allowed";
            }

            if ($pic_size > 5242880) {
                $errors[] = "Image Size of 5MB allowed only";
            }


            if ($username || $email || $pass || $phone ||$cpass) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $result2 = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");

                    $check = mysqli_num_rows($result2);

                    if (($olduser==$username) || ($check < 1)) {
                        if ($pass == $cpass) {
                            if (strlen($phone) == 11) {
                                if (empty($errors)) {
                                    if (move_uploaded_file($pic_tmp, "images/" . $pic_name) && !empty($_FILES['picture']['name'])) {
                                        $passwordmd5 = md5($pass);
                                        $qry = "  
                                    UPDATE `user` SET `username`='" . $username . "', `password`='" . $passwordmd5 . "', `email`='" . $email . "', `number`='" . $phone . "', `picname`='" . $pic_name . "' WHERE `id`='" . $id . "'";

                                        $result3 = mysqli_query($connect, $qry);
                                        if ($result3) {
                                            ?>
    <div id="favSuccess" class="alert alert-success alert-dismissible" role="alert" style="">
        Profile Updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    $_SESSION['user'] = $username;
                                            $_SESSION['phone'] = $phone;
                                            $_SESSION['email'] = $email;
                                            $_SESSION['password'] = $pass;
                                            $_SESSION['picname'] = $pic_name;
                                            header("location:userProfile.php");
                                        } else {
                                            ?>
    <div id="favError" class="alert alert-danger alert-dismissible" role="alert" style="">
        Profile not updated!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
                                        }
                                    } else {
                                        $passwordmd5 = md5($pass);
                                        $qry = "  
                                    UPDATE `user` SET `username`='" . $username . "', `password`='" . $passwordmd5 . "', `email`='" . $email . "', `number`='" . $phone . "' WHERE `id`='" . $id . "'";

                                        $result3 = mysqli_query($connect, $qry);
                                        if ($result3) {
                                            ?>
    <div id="favSuccess" class="alert alert-success alert-dismissible" role="alert" style="">
        Profile Updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    $_SESSION['user'] = $username;
                                            $_SESSION['phone'] = $phone;
                                            $_SESSION['email'] = $email;
                                            $_SESSION['password'] = $pass;
                                            header("location:userProfile.php");
                                        } else {
                                            ?>
    <div id="favError" class="alert alert-danger alert-dismissible" role="alert" style="">
        Profile not updated!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
                                        }
                                    }
                                } else {
                                    ?>
    <div id="favError" class="alert alert-danger alert-dismissible" role="alert" style="">
        <?php
        foreach ($errors as $error) {
            echo $error . "<br />";
        } ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
                                }
                            } else {
                                ?>
    <div id="favError" class="alert alert-danger alert-dismissible" role="alert" style="">
        Invalid phone number, must be upto 11 digits
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
                            }
                        } else {
                            ?>
    <div id="favError" class="alert alert-danger alert-dismissible" role="alert" style="">
        Passwords don't match.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
                        }
                    } else {
                        ?>
    <div id="favError" class="alert alert-danger alert-dismissible" role="alert" style="">
        This username is already registered!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
                    }
                } else {
                    ?>
    <div id="favError" class="alert alert-danger alert-dismissible" role="alert" style="">
        Please enter a valid email address.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php
                }
            } else {
                ?>
    <div id="favError" class="alert alert-danger alert-dismissible" role="alert" style="">
        Please enter new values to update profile.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
            }
        }






?>





    <!-- <div id="favError" class="alert alert-danger alert-dismissible" role="alert" style="">
        Username taken! Try a different one.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div id="favSuccess" class="alert alert-success alert-dismissible" role="alert" style="">
        Profile Updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> -->


    <div class="container bootstrap snippet">
        <!-- <div class="row">
            <div class="col-sm-10">
                <h1>
                    <?php //echo $_SESSION['user'];?>
        </h1>
    </div>
    </div> -->
    <br><br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->


            <div class="text-center">
                <img style="height: 256px; width: 230px" src="images/<?php echo $_SESSION['picname'] ?>"
                    class="avatar
                            rounded-circle" alt="avatar">
                <h1>
                    <?php echo $_SESSION['user']; ?>
                </h1>
                <br>
                <h6>Upload a different photo...</h6>
                <input type="file" name="picture" id="picture" form="updateForm" class="text-center center-block
                            file-upload">
            </div>
            <br>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#info">Info</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#wishListCo">Wish list</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#wishListCh">Liked Characters</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#orderHistory">Order History</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="info">



                    <hr>
                    <form class="form" action="" method="post" id="updateForm" enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4>
                                </label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name"
                                    title="enter your first name if any." value="<?php echo $_SESSION['firstname'] ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4>
                                </label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name"
                                    title="enter your last name if any." value="<?php echo $_SESSION['lastname'] ?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="username">
                                    <h4>Username</h4>
                                </label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="enter username"
                                    title="enter new username." value="<?php echo $_SESSION['user']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Phone</h4>
                                </label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="enter new phone number"
                                    title="enter new phone number if any." value="<?php echo $_SESSION['phone']; ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com"
                                    title="enter your email." value="<?php echo $_SESSION['email']; ?>">
                            </div>
                        </div>
                        <!-- <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Location</h4>
                                    </label>
                                    <input type="email" class="form-control" id="location" placeholder="somewhere"
                                        title="enter a location">
                                </div>
                            </div> -->
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Password</h4>
                                </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password"
                                    title="enter your password." value="<?php echo $_SESSION['password']; ?>">
                                <a><i toggle="#password" class="nav-link field-icon far fa-eye toggle-password"></i></a>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Verify</h4>
                                </label>
                                <input type="password" class="form-control" name="password2" id="password2" placeholder="password"
                                    title="confirm password." value="<?php echo $_SESSION['password']; ?>">
                                <a><i toggle="#password2" class="nav-link field-icon far fa-eye toggle-password"></i></a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <br>
                                <!-- <h6>Upload a different photo...</h6>
                                <input type="file" name="picture" id="picture" form="updateForm" class="text-center center-block
                            file-upload"> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-danger" type="submit" name="submit" id="submit"><i class="glyphicon glyphicon-ok-sign"></i>
                                    Save</button>
                                <button class="btn btn-lg" type="button" id="reset"><i class="glyphicon glyphicon-repeat"></i>
                                    Reset</button>
                            </div>
                        </div>







                    </form>

                    <hr>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="wishListCo">
                    <hr>

                    <div id="link" style="display: none; float: left;"><a href='Wishlist.php'>View full list>></a></div><br>
                    <h4> Comics </h4><br>
                    <div id="wishList"></div>

                </div>



                <!--/tab-pane-->
                <div class="tab-pane" id="wishListCh">
                    <hr>

                    <div id="linkch" style="display: none; float: left;"><a href='Wishlist.php'>View full
                            list>></a></div><br>
                    <h4> Characters </h4><br>
                    <div id="wishListCharacter"></div>

                </div>

                <!--/tab-pane-->
                <div class="tab-pane" id="orderHistory">


                    <hr>


                    <?php


                        include("connection.php");
                        $olduser = $_SESSION['user'];
                        $sql = "SELECT id FROM user WHERE username='$olduser'";
                        $result = mysqli_query($connect, $sql);
                        $value = mysqli_fetch_array($result);
                        $id = $value[0];

                        $qry = "SELECT * FROM cart WHERE userid='$id'";

                        $result1 = mysqli_query($connect, $qry);

                        ?>

                    <div>
                        <table align="center" class="table table-striped table-bordered" width="500" style="width: 100%">
                            <tr>
                                <th class="text-center">Item Id</th>
                                <th class="text-center">Price ($)</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Order Placed</th>
                            </tr>

                            <?php
                                while ($row = mysqli_fetch_array($result1)) {
                                    ?>

                            <tr>
                                <td class="text-center">
                                    <?php echo $row['itemid'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $row['price'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $row['title'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $row['quantity']; ?>

                                </td>
                                <td class="text-center">
                                    <?php echo $row['created_date']; ?>

                                </td>
                            </tr>
                            <?php
                            //echo "</table>";
                                }
                                
                                ?>

                        </table>

                    </div>



                </div>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
    </div>
    <!--/row-->
    <br><br><br><br><br><br><br><br>





    <!-- FOOTER -->
    <footer class="page-footer font-small footerText">
        <div class="jumbotron text-center">
            <h4>FOLLOW MARVEL</h4>
            <div>
                <a href="https://www.facebook.com/Marvel/" target="_blank"><span class="nav-link fab fa-facebook fa-lg"
                        style="color: #dee2e69e;"></span></a>
                <a href="https://twitter.com/marvel" target="_blank"><span class="nav-link fab fa-twitter fa-lg" style="color: #dee2e69e;"></span></a>
                <a href="https://www.instagram.com/marvel/" target="_blank"><span class="nav-link fab fa-instagram fa-lg"
                        style="color: #dee2e69e;"></span></a>
                <a href="http://marvelentertainment.tumblr.com/" target="_blank"><span class="nav-link fab fa-tumblr fa-lg"
                        style="color: #dee2e69e;"></span></a><br>
                <a href="https://www.youtube.com/marvel" target="_blank"><span class="nav-link fab fa-youtube fa-lg"
                        style="color: #dee2e69e;"></span></a>
                <a href="https://www.snapchat.com/add/marvelhq" target="_blank"><span class="nav-link fab fa-snapchat-ghost fa-lg"
                        style="color: #dee2e69e;"></span></a>
                <a href="https://www.pinterest.com/marvelofficial/" target="_blank"><span class="nav-link fab fa-pinterest fa-lg"
                        style="color: #dee2e69e;"></span></a>
            </div>
            <br><br>
            <div class="footer-copyright text-center">© 2018 Copyright:
                <a href="https://www.marvel.com/" target="_blank"> Marvel Comics</a>
            </div>
            <div class="float-right">
                <a href="#">
                    <span class="nav-link fas fa-arrow-circle-up fa-lg" style="color: #dee2e69e;"></span>
                    Back to top
                </a>
            </div>
        </div>
    </footer>











    <!-- =====================================SCRIPTS======================================= -->
    <!-- jQuery core JavaScript-->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.js"></script>
    <script src="../jquery-3.3.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script> -->

    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- Just to make the placeholder images work. -->
    <script src="../assets/js/vendor/holder.min.js"></script>


    <script>
        var comics = [];
        var comics2 = [];
        var characters = [];
        var characters2 = [];

        $(document).ready(function() {
            if (!($("#usernameInNavbar").is(':empty'))) {
                var username1 = $("#usernameInNavbar").attr('name');
                var data1 = {
                    'username': username1,
                };
                $.ajax({
                    url: "cartCount.php",
                    type: "POST",
                    data: {
                        userData: JSON.stringify(data1)
                    },
                    success: function(data) {
                        if ((JSON.parse(data)) > 0) {
                            itemCount = JSON.parse(data);
                            $('#itemCount').html(itemCount).css('display', 'block');
                        }
                    }
                });
            }

            if (!($("#usernameInNavbar").is(':empty'))) {
                var username1 = $("#usernameInNavbar").attr('name');
                var data1 = {
                    'username': username1,
                };
                $.ajax({
                    url: "favCount.php",
                    type: "POST",
                    data: {
                        userData: JSON.stringify(data1)
                    },
                    success: function(data) {
                        if ((JSON.parse(data)) > 0) {
                            favCount = JSON.parse(data);
                            $('#favCount').html(favCount).css('display', 'block');
                        }
                    }
                });
            }

            $('#reset').click(function() {
                $('#first_name').val("");
                $('#last_name').val("");
                $('#username').val("");
                $('#phone').val("");
                $('#email').val("");
                $('#password').val("");
                $('#password2').val("");
                $('.toggle-password').css("display", "none");
            });




            if (!($("#usernameInNavbar").is(':empty'))) {
                var username1 = $("#usernameInNavbar").attr('name');
                var data1 = {
                    'username': username1,
                };
                $.ajax({
                    url: "getFavComics.php",
                    type: "POST",
                    data: {
                        userData: JSON.stringify(data1)
                    },
                    success: function(data) {
                        if ((JSON.parse(data))) {
                            var ids = JSON.parse(data);
                            var list = "";
                            for (let i = 0; i < ids.length; i++) {
                                var id = ids[i];
                                var url =
                                    "https://gateway.marvel.com:443/v1/public/comics/id?apikey=63aecf3116ca56dd9b4d4a0723eb0eff"
                                url = url.replace("id", id);
                                $.ajax({
                                    type: "GET",
                                    url: url,
                                    success: function(data) {
                                        comics = data.data.results;


                                        for (var j = 0; j < comics.length; j++) {
                                            list +=
                                                '<div class="popup col-lg-3 col-md-4 col-xs-6">' +
                                                '<a href="" onClick="fetchComic(' +
                                                comics[j].id +
                                                ')" data-toggle="modal" id=' +
                                                comics[j].id +
                                                ' class="d-block mb-4 h-100">' +
                                                '<img class="img-fluid img-thumbnail" style="width: 176px; height: 265px;"src=' +
                                                comics[j].thumbnail.path +
                                                "." + comics[j].thumbnail.extension +
                                                "></a> </div>"
                                        }

                                        $("#wishList").html(list);
                                        $("#link").css("display", "block");
                                        $.merge(comics2, comics);
                                        console.log(comics2);
                                    },
                                    error: function(data,
                                        response) {},
                                    contentType: "application/json"
                                });

                            }

                        }
                    }
                });
            }






            if (!($("#usernameInNavbar").is(':empty'))) {
                var username1 = $("#usernameInNavbar").attr('name');
                var data1 = {
                    'username': username1,
                };
                $.ajax({
                    url: "getFavCharacters.php",
                    type: "POST",
                    data: {
                        userData: JSON.stringify(data1)
                    },
                    success: function(data) {
                        if ((JSON.parse(data))) {
                            var ids = JSON.parse(data);
                            var list = "";
                            for (let i = 0; i < ids.length; i++) {
                                var id = ids[i];
                                var url =
                                    "https://gateway.marvel.com:443/v1/public/characters/id?apikey=63aecf3116ca56dd9b4d4a0723eb0eff"
                                url = url.replace("id", id);
                                $.ajax({
                                    type: "GET",
                                    url: url,
                                    success: function(data) {
                                        characters = data.data.results;


                                        for (var j = 0; j < characters.length; j++) {
                                            list +=
                                                '<div class="popup col-lg-3 col-md-4 col-xs-6 character-container">' +
                                                '<a href="" onClick="fetchCharacter(' +
                                                characters[j].id +
                                                ')" data-toggle="modal" id=' +
                                                characters[j].id +
                                                ' class="d-block mb-4 characterHeight">' +
                                                '<img class="img-fluid img-thumbnail" style="width: 255px; height: 200px;"src=' +
                                                characters[j].thumbnail.path + "." +
                                                characters[j].thumbnail.extension +
                                                "></a> </div>"
                                        }

                                        $("#wishListCharacter").html(list);
                                        $("#linkch").css("display", "block");
                                        $.merge(characters2, characters);
                                        console.log(characters2);
                                    },
                                    error: function(data,
                                        response) {},
                                    contentType: "application/json"
                                });

                            }

                        }
                    }
                });
            }


            $(".toggle-password").click(function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });







        });
    </script>












    <?php


            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                echo "<script>
                    $('#cart').css('display', 'block');
                    $('#favorite').css('display', 'block');
                    $('#loginIcon').css('display', 'block');
                    $('#signinButton').css('display', 'none');
                    $('#usernameInNavbar').css('display', 'block');
                    $('#usernameInNavbar').html('" . $_SESSION['user'] . "');
                    $('#usernameInNavbar').attr('name','" . $_SESSION['user'] . "');
                </script>";
            }
            ?>

</body>

</html>