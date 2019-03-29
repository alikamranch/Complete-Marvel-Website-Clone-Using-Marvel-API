<?php
    error_reporting(0);
    session_start();
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="marvel.jpg">
    <title>Cart</title>


    <!-- =====================================STYLESHEETS=================================== -->

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- My defined stylesheet -->
    <link href="cartStyle.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <!-- Search icon stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">

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
                    <!-- <li class="nav-item">
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
                    </li> -->
                </ul>

                <form class="form-inline mt-2 mt-md-0">
                    <span id="favCount"></span>
                    <a id="favorite" href="Wishlist.php" style="display: none;" title="Wish list"><span class="nav-link fas fa-heart fa-lg"
                            style="color: #dee2e69e;"></span></a>
                    <span id="itemCount"></span>
                    <a id="cart" href="#" style="display: none;" title="Cart"><span class="nav-link fas fa-shopping-cart fa-lg"
                            style="color: #dee2e69e;"></span></a>
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
                            <button id="logout" class="dropdown-item" type="button"><a href="wishlistLogout.php" class="nav-link dropdown-item"><i
                                        class="fas fa-sign-out-alt"></i> Logout</a></button>
                        </div>

                    </li>
                </ul>





            </div>
        </nav>
    </header>

    <div id="favError" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
        Already added to favorites.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div id="favSuccess" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
        Added to favorites.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


    <div class="shopping-cart">
        <div class="title">
            <h1>Shopping Cart</h1>
        </div>
    </div>

    <div id="cartContent" class="shopping-cart">
        <!-- Title -->


        <img id="loadercomic" src="loader.svg" class="img-center loader-margin" width="100" height="100" />
        <div id="emptycomic" class="shopping-cart" style="display: none;">
            <h5>Cart is empty</h5>
        </div>


        <!-- Product #1 -->
        <!-- <div class="item">
        <div class="buttons">
          <span class="delete-btn"></span>
          <span class="like-btn"></span>
        </div>

        <div class="image">
          <img id="comicImage" src="item-1.png" alt="" />
        </div>

        <div class="description">
          <span><h5 id="comicTitle">Common Projects</h5></span>
          <span><p id="comicDescription">dfjdsfdsjfkdsjfkdsjfkldsjfkdlsjfkdsjflkdsjfkdsjfdkjflkdsfdskjfdsfjkdsjfld
              sfjdskjflkdsjfkdsjf</p></span>
          <div id="comicPrice">$34</div>
        </div>

        

        <div class="quantity">
          <button class="button plus-btn" type="button" name="button">
            <img src="plus.svg" alt="" />
          </button>
          <input type="text" name="name" value="1">
          <button class="button minus-btn" type="button" name="button">
            <img src="minus.svg" alt="" />
          </button>
        </div>

        <div id="totalPrice" class="total-price">$549</div>
      </div> -->









    </div>

    <div class="item">
        <div class="back">
            <a href="Comics.php" style="color: #585c619e;" class="nav-link" style="color: crimson;">
                <h5><i class="fas fa-chevron-left fa-lg"></i> Continue Shopping</h5>
            </a>
        </div>
        <div class="totalsHeading">
            <span>
                <h5>Sub-Total</h5>
            </span><br>
            <span>
                <h5>Shipping</h5>
            </span><br>
            <span>
                <h5>Total</h5>
            </span><br>
        </div>

        <div class="bills">
            <span>
                <h5 id="subtotal"></h5>
            </span><br>
            <span>
                <h5>Free</h5>
            </span><br>
            <span>
                <h5 id="total"></h5>
            </span><br>
            <button class="btn btn-outline-danger my-2 my-sm-0">Checkout</button>
        </div>
    </div>






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
        $(document).ready(function() {


            if (!($("#usernameInNavbar").is(':empty'))) {
                var username1 = $("#usernameInNavbar").attr('name');
                var data1 = {
                    'username': username1,
                };
                $.ajax({
                    url: "getCartComics.php",
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
                                            list += '<div class="item">' +
                                                '<div class="buttons">' +
                                                '<span id="removeFromCart" name="' +
                                                comics[j].id +
                                                '" class="delete-btn"></span>' +
                                                '<span id="fav" name="' + comics[j].id +
                                                '" class="like-btn"></span>' +
                                                '</div>' +

                                                '<div class="image">' +
                                                '<img id="comicImage" src="' + comics[j]
                                                .thumbnail.path + "." + comics[j].thumbnail
                                                .extension + '" alt="" />' +
                                                '</div>' +

                                                '<div class="description">' +
                                                '<span><h5 id="comicTitle">' + comics[j]
                                                .title + '</h5></span>' +
                                                '<span class=""><p id="comicDescription">' +
                                                (comics[j].description ? comics[j].description :
                                                    "Description not Available") +
                                                '</p></span>' +
                                                '<div class="" id="comicPrice"><b>' + (
                                                    comics[j].prices[0].price ? "$" +
                                                    comics[j].prices[0].price : "$" +
                                                    2.99) +
                                                '</b></div>' +
                                                '</div>' +



                                                '<div class="quantity">' +
                                                '<button class="button plus-btn" type="button" name="' +
                                                (comics[j].prices[0].price ? "$" +
                                                    comics[j].prices[0].price : "$" +
                                                    2.99) + '" id="' + comics[j].id +
                                                '">' +
                                                '<img src="plus.svg" alt="" />' +
                                                '</button>' +
                                                '<input type="text" name="name" value="1">' +
                                                '<button class="button minus-btn" type="button" name="' +
                                                (comics[j].prices[0].price ? "$" +
                                                    comics[j].prices[0].price : "$" +
                                                    2.99) + '" id="' + comics[j].id +
                                                '">' +
                                                '<img src="minus.svg" alt="" />' +
                                                '</button>' +
                                                '</div>' +

                                                '<div id="totalPrice" class="total-price">' +
                                                (comics[j].prices[0].price ? "$" +
                                                    comics[j].prices[0].price : "$" +
                                                    2.99) + '</div>' +
                                                '</div>'
                                        }

                                        $('#loadercomic').css("display", "none");
                                        $("#cartContent").html(list);
                                        $.merge(comics2, comics);
                                        console.log(comics);
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

            if (comics2.length == 0) {
                $('#loadercomic').css("display", "none");
                $('#emptycomic').css("display", "block");

            }

            $(document).on('click', '.like-btn', function(e) {
                var elem = $(this);
                if ($('#usernameInNavbar').is(':empty')) {
                    $("#favError").html("Please login to favourtite items");
                    $("#favError").css("display", "block");
                } else {
                    var username = $("#usernameInNavbar").attr('name');
                    var itemid = parseInt($(this).attr('name'));
                    var itemtype = 2;
                    var title = "";
                    for (var i = 0; i < comics2.length; i++) {
                        if (itemid == comics2[i].id) {
                            title = comics2[i].title;
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

                                    elem.toggleClass('is-active');
                                    $("#favSuccess").fadeTo(2000, 500).slideUp(500,
                                        function() {
                                            $("#success-alert").slideUp(500);
                                        });
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
                                    $("#favSuccess").css("display", "none");
                                    $("#favError").fadeTo(2000, 500).slideUp(500, function() {
                                        $("#success-alert").slideUp(500);
                                    });
                                }
                            }
                        });

                    }
                }


            });



            $(document).on('click', '#removeFromCart', function(e) {
                var username = $("#usernameInNavbar").attr('name');
                var itemid = parseInt($(this).attr('name'));
                var data = {
                    'username': username,
                    'itemid': itemid,
                };
                $.ajax({
                    url: "removeFromCart.php",
                    type: "POST",
                    data: {
                        userData: JSON.stringify(data)
                    },
                    success: function(data) {
                        if (parseInt(data) === -1) {
                            location.reload();
                        }
                    }
                });


            });




            if (!($("#usernameInNavbar").is(':empty'))) {
                var username1 = $("#usernameInNavbar").attr('name');
                var data1 = {
                    'username': username1,
                };
                $.ajax({
                    url: "getPrices.php",
                    type: "POST",
                    data: {
                        userData: JSON.stringify(data1)
                    },
                    success: function(data) {
                        if ((JSON.parse(data))) {
                            var prices = JSON.parse(data);
                            var sum = 0.0;
                            for (let i = 0; i < prices.length; i++) {
                                sum = sum + parseFloat(prices[i].toFixed(2));
                            }
                            sum = sum.toFixed(2);
                            $('#subtotal').html("$" + sum);
                            $('#total').html("$" + sum);

                        }
                    }
                });

            }












            $(document).on('click', '.minus-btn', function(e) {
                e.preventDefault();
                var $this = $(this);
                var price = $this.attr('name');
                var $input = $this.closest('div').find('input');
                var total = $this.closest('.quantity').next('.total-price');
                total.show();
                var value = parseInt($input.val());

                if (value > 1) {
                    value = value - 1;
                } else {
                    value = 1;
                }

                var username = $("#usernameInNavbar").attr('name');
                var itemid = parseInt($(this).attr('id'));
                var quantity = value;
                var data = {
                    'username': username,
                    'itemid': itemid,
                    'quantity': quantity
                };
                $.ajax({
                    url: "updateQuantity.php",
                    type: "POST",
                    data: {
                        userData: JSON.stringify(data)
                    },
                    success: function(data) {
                        if (parseInt(data) === -1) {
                            $input.val(value);
                        }
                    }
                });



                var totalnum = price
                totalnum = totalnum.replace("$", "");
                var totalprice = value * parseFloat(totalnum);
                totalprice = totalprice.toFixed(2);
                var totalpricefinal = "$" + totalprice;

                total.fadeOut(function() {
                    total.html(totalpricefinal);
                    total.fadeIn(function() {
                        total.html();
                    })
                })

                if (!($("#usernameInNavbar").is(':empty'))) {
                    var username1 = $("#usernameInNavbar").attr('name');
                    var data1 = {
                        'username': username1,
                    };
                    $.ajax({
                        url: "getPrices.php",
                        type: "POST",
                        data: {
                            userData: JSON.stringify(data1)
                        },
                        success: function(data) {
                            if ((JSON.parse(data))) {
                                var prices = JSON.parse(data);
                                var sum = 0.0;
                                for (let i = 0; i < prices.length; i++) {
                                    sum = sum + parseFloat(prices[i].toFixed(2));
                                }
                                sum = sum.toFixed(2);
                                $('#subtotal').fadeOut(function() {
                                    $('#subtotal').html("$" + sum);
                                    $('#subtotal').fadeIn(function() {
                                        $('#subtotal').html();
                                    });
                                });
                                $('#total').fadeOut(function() {
                                    $('#total').html("$" + sum);
                                    $('#total').fadeIn(function() {
                                        $('#total').html();
                                    });
                                });

                            }
                        }
                    });

                }

            });






            $(document).on('click', '.plus-btn', function(e) {
                e.preventDefault();
                var $this = $(this);
                var price = $this.attr('name');
                var $input = $this.closest('div').find('input');
                var total = $this.closest('.quantity').next('.total-price');
                total.show();
                var value = parseInt($input.val());

                if (value < 100) {
                    value = value + 1;
                } else {
                    value = 100;
                }


                var username = $("#usernameInNavbar").attr('name');
                var itemid = parseInt($(this).attr('id'));
                var quantity = value;
                var data = {
                    'username': username,
                    'itemid': itemid,
                    'quantity': quantity
                };
                $.ajax({
                    url: "updateQuantity.php",
                    type: "POST",
                    data: {
                        userData: JSON.stringify(data)
                    },
                    success: function(data) {
                        if (parseInt(data) === -1) {
                            $input.val(value);
                        }
                    }
                });



                var totalnum = price
                totalnum = totalnum.replace("$", "");
                var totalprice = value * parseFloat(totalnum);
                totalprice = totalprice.toFixed(2);
                var totalpricefinal = "$" + totalprice;

                total.fadeOut(function() {
                    total.html(totalpricefinal);
                    total.fadeIn(function() {
                        total.html();
                    })
                })

                if (!($("#usernameInNavbar").is(':empty'))) {
                    var username1 = $("#usernameInNavbar").attr('name');
                    var data1 = {
                        'username': username1,
                    };
                    $.ajax({
                        url: "getPrices.php",
                        type: "POST",
                        data: {
                            userData: JSON.stringify(data1)
                        },
                        success: function(data) {
                            if ((JSON.parse(data))) {
                                var prices = JSON.parse(data);
                                var sum = 0.0;
                                for (let i = 0; i < prices.length; i++) {
                                    sum = sum + parseFloat(prices[i].toFixed(2));
                                }
                                sum = sum.toFixed(2);
                                $('#subtotal').fadeOut(function() {
                                    $('#subtotal').html("$" + sum);
                                    $('#subtotal').fadeIn(function() {
                                        $('#subtotal').html();
                                    });
                                });
                                $('#total').fadeOut(function() {
                                    $('#total').html("$" + sum);
                                    $('#total').fadeIn(function() {
                                        $('#total').html();
                                    });
                                });

                            }
                        }
                    });

                }


            });



            var itemCount = 0;
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