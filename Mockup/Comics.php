<?php
    error_reporting(0);
    session_start();
?>


<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="marvel.jpg">
    <title>Comics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- =====================================STYLESHEETS=================================== -->

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css">
    <!-- My defined stylesheet -->
    <link href="style.css" media="all" rel="stylesheet" type="text/css">
    <!-- Search icon stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">


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


    <!-- jQuery Scripts -->
    <script type="text/javascript">
        var comics = [];
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "https://gateway.marvel.com:443/v1/public/comics?dateDescriptor=thisWeek&limit=32&apikey=63aecf3116ca56dd9b4d4a0723eb0eff",
                success: function(data) {
                    comics = data.data.results;
                    var list = "";
                    for (var i = 0; i < comics.length; i++) {
                        list += '<div class="popup col-lg-3 col-md-4 col-xs-6">' +
                            '<a href="" onClick="fetchComic(' + comics[i].id +
                            ')" data-toggle="modal" id=' +
                            comics[i].id +
                            ' class="d-block mb-4 h-100">' +
                            '<img class="img-fluid img-thumbnail" style="width: 255; height: 400;"src=' +
                            comics[i].thumbnail.path +
                            "." + comics[i].thumbnail.extension + "></a></div>"
                    }
                    $("#comics").html(list);
                    console.log(comics);
                },
                error: function(data,
                    response) {
                    console.log(response.data.data);
                },
                contentType: "application/json"
            });


            $('#searchch').click(function() {
                $("#back").show();
                var name = $('#comicname').val();
                name = name.replace(" ", "%20");
                url =
                    "https://gateway.marvel.com:443/v1/public/comics?dateDescriptor=thisMonth&titleStartsWith=search&limit=32&apikey=63aecf3116ca56dd9b4d4a0723eb0eff"
                url = url.replace("search", name);


                $.ajax({
                    type: "GET",
                    url: url,

                    success: function(data) {
                        comics = data.data.results;
                        if (comics.length == 0) {
                            $("#searchError").html("No results");
                        } else {
                            $("#searchError").html("");
                        }
                        var list = "";
                        for (var i = 0; i < comics.length; i++) {
                            list += '<div class="popup col-lg-3 col-md-4 col-xs-6">' +
                                '<a href="" onClick="fetchComic(' + comics[i].id +
                                ')" data-toggle="modal" id=' +
                                comics[i].id +
                                ' class="d-block mb-4 h-100">' +
                                '<img class="img-fluid img-thumbnail" style="width: 255; height: 400;"src=' +
                                comics[i].thumbnail.path +
                                "." + comics[i].thumbnail.extension + "></a></div>"
                        }
                        $("#comics").html(list);

                    },
                    error: function(data, response) {
                        console.log(response.data.data);
                    },

                    contentType: "application/json"
                });


            });


            //signin
            $('#signin').click(function() {
                var username = $('#username').val();
                var password = $('#password').val();

                if (username != '' && password != '') {
                    var data = {
                        'username': username,
                        'password': password
                    };

                    $.ajax({
                        url: "loginCheck.php",
                        type: "POST",
                        data: {
                            userData: JSON.stringify(data)
                        },
                        success: function(data) {
                            if (parseInt(data) === -1 || parseInt(data) === -2) {
                                $("#loginFormError").css("display", "block");
                            } else {
                                location.reload();
                            }
                        }
                    });
                }
            });


            //signup
            $('#signup').click(function() {
                var formData = new FormData();
                var username = $('#signUpUsername').val();
                var password = $('#signUpPassword').val();
                var cpassword = $('#cpassword').val();
                var email = $('#email').val();
                var number = $('#number').val();

                if (username != '' && password != '') {
                    if (password == cpassword) {
                        var data = {
                            'username': username,
                            'password': password,
                            'email': email,
                            'number': number
                        };

                        $.ajax({
                            url: "signup.php",
                            type: "POST",
                            data: {
                                userData: JSON.stringify(data)
                            },
                            success: function(data) {
                                if (parseInt(data) === -1) {
                                    $("#SignUpFormError").html(
                                        "Username taken! Try a different one.");
                                    $("#SignUpFormError").css("display", "block");
                                } else if (parseInt(data) === -2) {
                                    $("#SignUpFormError").html(
                                        "Enter a valid email address");
                                    $("#SignUpFormError").css("display", "block");
                                } else if (parseInt(data) === -3) {
                                    $("#SignUpFormError").html(
                                        "Invalid phone number, must be upto 11 digits");
                                    $("#SignUpFormError").css("display", "block");
                                } else {
                                    $("#SignUpFormError").css("display", "none");
                                    $("#SignUpFormSuccess").css("display", "block");
                                    setTimeout(location.reload.bind(location), 2000);
                                }
                            }
                        });
                    } else {
                        $("#SignUpFormError").html("Passwords don't match!");
                        $("#SignUpFormError").css("display", "block");
                    }

                }
            });



            $("#search").click(function() {
                $("#bar").show();
                $("#search").css("display", "none");
            });

            $("#CreateAnAccount").click(function() {
                $("#loginModalSignIn").modal('hide');
                jQuery('.modal').on('show.bs.modal', function(e) {
                    jQuery('body').css('overflow-y', 'hidden');
                });
                jQuery('.close').on('click', function(e) {
                    jQuery('body').css('overflow-y', 'scroll');
                });
            });


            $('#fav').click(function(e) {
                e.preventDefault();
                if ($('#usernameInNavbar').is(':empty')) {
                    $("#favError").html("Please login to favourtite items");
                    $("#favError").css("display", "block");
                } else {
                    var username = $("#usernameInNavbar").attr('name');
                    var itemid = parseInt($(this).attr('name'));
                    var itemtype = 2;
                    var title = "";
                    for (var i = 0; i < comics.length; i++) {
                        if (itemid == comics[i].id) {
                            title = comics[i].title;
                            break;
                        }
                    }

                    if (username != '') {
                        var data = {
                            'username': username,
                            'itemid': itemid,
                            'itemtype': itemtype,
                            'title': title
                        };

                        $.ajax({
                            url: "comicFav.php",
                            type: "POST",
                            data: {
                                userData: JSON.stringify(data)
                            },
                            success: function(data) {
                                if (parseInt(data) === -1) {
                                    $("#fav").css("color", "crimson");
                                    $("#favSuccess").css("display", "block");
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
                                                $('#favCount').html(favCount).css(
                                                    'display', 'block');
                                            }
                                        }
                                    });
                                } else if (parseInt(data) === -2) {
                                    $("#favError").html("Already added to favorites");
                                    $("#favError").css("display", "block");
                                }
                            }
                        });

                    }
                }


            });
            var itemCount = 0;

            $('#addToCart').click(function(e) {
                //e.preventDefault();  
                if ($('#usernameInNavbar').is(':empty')) {
                    $("#favError").html("Please login to buy items");
                    $("#favError").css("display", "block");
                } else {
                    var username = $("#usernameInNavbar").attr('name');
                    var itemid = parseInt($(this).attr('name'));
                    var price = "";
                    var title = "";
                    var quantity = 1;
                    var createdDate = new Date();
                    for (var i = 0; i < comics.length; i++) {
                        if (itemid == comics[i].id) {
                            title = comics[i].title;
                            price = (comics[i].prices[0].price ? "$" + comics[i].prices[0].price : "$" +
                                2.99);
                            break;
                        }
                    }
                    price = price.replace("$", "");
                    price = parseFloat(price);
                    if (username != '') {
                        var data = {
                            'username': username,
                            'itemid': itemid,
                            'price': price,
                            'title': title,
                            'quantity': quantity,
                            'created_date': createdDate
                        };

                        $.ajax({
                            url: "addToCart.php",
                            type: "POST",
                            data: {
                                userData: JSON.stringify(data)
                            },
                            success: function(data) {
                                if (parseInt(data) === -1) {
                                    $("#favSuccess").html("Added to cart");
                                    $("#favSuccess").css("display", "block");
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
                                            if (data) {
                                                itemCount = JSON.parse(data);
                                                $('#itemCount').html(itemCount)
                                                    .css('display', 'block');
                                            }
                                        }
                                    });
                                } else if (parseInt(data) === -2) {
                                    $("#favError").html("Already added to Cart");
                                    $("#favError").css("display", "block");
                                }
                            }
                        });

                    }
                }


            });

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
            var favCount = 0;

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






        });

        var value = "";

        function fetchComic(id) {
            for (var i = 0; i < comics.length; i++) {
                if (id == comics[i].id) {
                    $("#comicTitle").html(comics[i].title);
                    $("#comicCover").attr("src", comics[i].thumbnail
                        .path +
                        "." + comics[i].thumbnail.extension
                    );
                    $("#comicDescription").html(comics[i].description ? comics[i].description :
                        "Description not Available");
                    $("#comicPrice").html(comics[i].prices[0].price ? "$" + comics[i].prices[0].price : "$" + 2.99);
                    value = comics[i].id;
                    $("#fav").attr('name', value);
                    $("#addToCart").attr('name', value);
                    $("#favError").css('display', 'none');
                    $("#favSuccess").css('display', 'none');
                    $("#fav").css('color', '#3c302e9e');
                    $('#comicModal').modal('show');
                    break;
                }
            }
        }
    </script>

</head>

<body>

    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img src="logo.jpg" alt="homepage logo" id="homepage"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="Comics.php">Comics</a>
                    </li>
                </ul>

                <form class="form-inline mt-2 mt-md-0">
                    <a id="back" href="Comics.php" style="display: none"><span class="nav-link fas fa-arrow-left fa-lg"
                            style="color: #dee2e69e;"></span></a>
                    <div id="bar" class="input-group input-group-sm" style="display: none;">
                        <input id="comicname" type="text" class="form-control" placeholder="Search" aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text mr-sm-2" id="basic-addon2"><a id="searchch" href="#" class="nav-link fas fa-search fa-lg"
                                    style="color: #50555a9e;"></a></span>
                        </div>
                    </div>
                    <!-- <input id="bar" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" style="display: none;"> -->
                    <a id="search" href="#"><span class="nav-link fas fa-search fa-lg" style="color: #dee2e69e;"></span></a>
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
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="color: #dee2e69e;">
                            <span><i class="fas fa-user"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button"><a href="userProfile.php" class="nav-link dropdown-item"><i
                                        class="fas fa-user"></i> User Profile</a></button>
                            <button id="logout" class="dropdown-item" type="button"><a href="logout.php" class="nav-link dropdown-item"><i
                                        class="fas fa-sign-out-alt"></i> Logout</a></button>
                        </div>

                    </li>
                </ul>





            </div>
        </nav>
    </header>

    <main role="main">

        <div class="jumbotron AboutMastHead">
            <div class="container">
                <div class="masthead_container">
                    <h2 class="masthead_caption">COMICS</h2>
                </div>
            </div>
        </div>
        <br>
        <!-- Page Content -->
        <div class="container comic-container">
            <h1 id="searchError" align="center"></h1>
            <div class="row text-center text-lg-left " id="comics">
                <img src="loader.svg" class="img-center loader-margin" width="100" height="100" />

            </div>

        </div>

        <!-- FOOTER -->
        <footer class="page-footer font-small footerText">
            <div class="jumbotron text-center">
                <h4>FOLLOW MARVEL</h4>
                <div>
                    <a href="https://www.facebook.com/Marvel/" target="_blank"><span class="nav-link fab fa-facebook fa-lg"
                            style="color: #dee2e69e;"></span></a>
                    <a href="https://twitter.com/marvel" target="_blank"><span class="nav-link fab fa-twitter fa-lg"
                            style="color: #dee2e69e;"></span></a>
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

    </main>


    <!-- =====================================SING IN MODAL POPUP======================================= -->
    <div class="modal fade" role="dialog" id="loginModalSignIn">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header jumbotron">
                    <h5 class="modal-title footerText"><b>HOP IN THE UNIVERSE</b></h5>
                    <button type="button" class="close" data-dismiss="modal" style="color: #dee2e69e;">&times;</button>
                </div>

                <form id="loginForm">

                    <div id="loginFormError" class="alert alert-danger" role="alert" style="display: none;">
                        Invalid username or password.
                    </div>


                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Username:</h5>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username"
                                required />
                        </div>

                        <div class="form-group">
                            <h5>Password:</h5>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                                required />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="CreateAnAccount" type="button" class="btn btn-danger mr-auto" data-toggle="modal"
                            data-target="#loginModalSignUp">CREATE
                            AN ACCOUNT</button>
                        <button id="signin" name="signin" type="button" class="btn btn-success">SIGN IN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- =====================================SIGN UP MODAL POPUP======================================= -->
    <div class="modal fade" role="dialog" id="loginModalSignUp">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header jumbotron">
                    <h5 class="modal-title footerText"><b>FASTEN YOUR SEAT BELT</b></h5>
                    <button type="button" class="close" data-dismiss="modal" style="color: #dee2e69e;">&times;</button>
                </div>

                <form id="SignUpForm" action="#">
                    <div id="SignUpFormError" class="alert alert-danger" role="alert" style="display: none;">

                    </div>

                    <div id="SignUpFormSuccess" class="alert alert-success" role="alert" style="display: none;">
                        Successfully Registered!
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <img class="rounded-circle img-center" src="login.jpg" alt="Generic placeholder image"
                                width="230" height="280">
                        </div>

                        <div class="form-group">
                            <h5>E-mail:</h5>
                            <input id="email" type="email" name="email" class="form-control" placeholder="Email"
                                required />
                        </div>

                        <div class="form-group">
                            <h5>Phone:</h5>
                            <input id="number" type="number" name="phone" class="form-control" placeholder="Phone Number"
                                required />
                        </div>

                        <div class="form-group">
                            <h5>Username:</h5>
                            <input id="signUpUsername" type="text" name="username" class="form-control" placeholder="Username"
                                required />
                        </div>

                        <div class="form-group">
                            <h5>Gender:</h5>
                            <form>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" checked>Male
                                </label>
                                &emsp;
                                <label class="radio-inline">
                                    <input type="radio" name="optradio">Female
                                </label>
                            </form>
                        </div>
                        <div class="form-group">
                            <h5>Password:</h5>
                            <input id="signUpPassword" type="password" name="password" class="form-control" placeholder="Password"
                                required />
                        </div>

                        <div class="form-group">
                            <h5>Confirm Password:</h5>
                            <input id="cpassword" type="password" name="cpassword" class="form-control" placeholder="Confirm Password"
                                required />
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button id="signup" type="button" class="btn btn-success">SIGN UP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- =====================================COMIC MODAL POPUP======================================= -->
    <div class="modal fade" role="dialog" id="comicModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header jumbotron">
                    <h5 id="comicTitle" class="modal-title footerText"><b></b></h5>
                    <button type="button" class="close" data-dismiss="modal" style="color: #dee2e69e;">&times;</button>
                </div>

                <form id="Comicbook" action="#">

                    <div id="favError" class="alert alert-danger" role="alert" style="display: none;">

                    </div>

                    <div id="favSuccess" class="alert alert-success" role="alert" style="display: none;">
                        Added to favourites
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <img id="comicCover" class="img-center" src="" alt="thumbnail" width="400" height="600">
                        </div>
                        <div class="form-group">
                            <h6 id="comicDescription"></h6>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <a id="fav" name="" href="#" class="nav-link fas fa-heart fa-2x mr-auto" style="color: #3c302e9e;"></a>
                        <p id="comicPrice"></p>
                        <button id="addToCart" type="button" name="" class="btn btn-danger">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                    //alert('Welcome " . $_SESSION['user'] . "');
                </script>";
        }
        ?>








</body>

</html>