<?php
  error_reporting(0);
  session_start();
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="marvel.jpg">

  <title>Marvel Comics</title>

  <!-- =====================================STYLESHEETS=================================== -->


  <!-- Bootstrap core CSS -->
  <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- My defined stylesheet -->
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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
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
          <input id="bar" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" style="display: none;">
          <!-- <a id="search" href="#"><span class="nav-link fas fa-search fa-lg" style="color: #dee2e69e;"></span></a> -->
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




        <a id="usernameInNavbar" class="nav-link" href="userProfile.php" style="display: none; color: #dee2e69e;"></a>

        <ul id="loginIcon" class="nav" style="display: none;">
          <li class="dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="color: #dee2e69e;">
              <span><i class="fas fa-user"></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item" type="button"><a href="userProfile.php" class="nav-link dropdown-item"><i
                    class="fas fa-user"></i>
                  User Profile</a></button>
              <button id="logout" class="dropdown-item" type="button"><a href="logout.php" class="nav-link dropdown-item"><i
                    class="fas fa-sign-out-alt"></i> Logout</a></button>
            </div>

          </li>
        </ul>





      </div>
    </nav>
  </header>

  <main role="main">
    <!-- slider -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/ff0109-mas_dsk_01.jpg"
            alt="First slide">
          <div class="container">
            <div class="carousel-caption text-left div-style">
              <figure class="img__wrapper masthead__logo"><img src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/fantasticfour-wgweek-logo-343x190.png"
                  srcset="https://terrigen-cdn-dev.marvel.com/content/prod/1x/fantasticfour-wgweek-logo-343x190.png"
                  alt="Fantastic Four Logo"></figure>
              <h1><span>Marvel Games Welcomes the Fantastic Four</span></h1>
              <p>Marvel's First Family takes over your favorite Marvel games!</p>
              <p><a class="btn btn-lg btn-danger" href="https://www.youtube.com/watch?v=M1LDaBprE_s
" role="button"
                  target="_blank">WATCH
                  NOW</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/ml2_com_mas_dsk_01.jpg
"
            alt="Second slide">
          <div class="container">
            <div class="carousel-caption text-left div-style">
              <figure class="img__wrapper masthead__logo"><img src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/marvel_studios_lob_mh.png"
                  srcset="https://terrigen-cdn-dev.marvel.com/content/prod/1x/marvel_studios_lob_mh.png,
      https://terrigen-cdn-dev.marvel.com/content/prod/2x/marvel_studios_lob_mh.png 2x"
                  alt="Marvel Studios Logo"></figure>
              <h1><span>AVENGERS TRAILER</span></h1>
              <p>Part of the journey is the end.</p>
              <p><a class="btn btn-lg btn-danger" href="https://www.youtube.com/watch?v=hA6hldpSTF8
" role="button"
                  target="_blank">WATCH NOW</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/01.03-punishernetflix-mas-dsk-01.jpg
"
            alt="Third slide">
          <div class="container">
            <div class="carousel-caption text-left div-style">
              <figure>
                <img src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/punisher_masthead_logo.png" srcset="https://terrigen-cdn-dev.marvel.com/content/prod/1x/punisher_masthead_logo.png
">
              </figure>
              <h1><span>New Teaser and Premiere Date Revealed</span></h1>
              <p>Let Frank be who he's meant to be.</p>
              <p><a class="btn btn-lg btn-danger" href="https://www.youtube.com/watch?v=j9nca9cktCI
" role="button"
                  target="_blank">WATCH NOW</a></p>
            </div>

          </div>
        </div>
        <div class="carousel-item">
          <img class="fourth-slide img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/mmah0103-mas_dsk_01.jpg
"
            alt="Fourth slide">
          <div class="container">
            <div class="carousel-caption text-left div-style">
              <figure class="img__wrapper masthead__logo"><img src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/makemeahero_mh_logo.png"
                  srcset="https://terrigen-cdn-dev.marvel.com/content/prod/1x/makemeahero_mh_logo.png,
                  https://terrigen-cdn-dev.marvel.com/content/prod/2x/makemeahero_mh_logo.png 2x"
                  alt="Make Me a Hero"></figure>
              <h1><span class="masthead__headline">The Urban Hero</span></h1>
              <p>Fan JAM brings his Super Hero to life as hero with super speed and strength!</p>
              <p><a class="btn btn-lg btn-danger" href="https://www.youtube.com/watch?v=KCUgd2MXCFI
" role="button"
                  target="_blank">WATCH NOW</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="fifth-slide img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/excelsior-com_mas_dsk_01.jpg"
            alt="Fifth slide">
          <div class="container">
            <div class="carousel-caption text-left div-style">
              <h1><span>Marvel and Disney Remember Stan Lee</span></h1>
              <p>1922-2018</p>
              <p><a class="btn btn-lg btn-danger" href="https://www.youtube.com/watch?v=ea4Tq7HB7kU&t=47s" role="button"
                  target="_blank">WATCH NOW</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


    <!-- Marketing messaging and featurettes
      ================================================== -->

    <div class="container">
      <h1><b>LATEST NEWS</b></h1>
      <hr>
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="card card-body col-lg-4 text-center spacing">
          <img class="img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/ff-101-card.jpg
" alt="Generic placeholder image">
          <p>DIGITAL SERIES</p>
          <h5>Celebrate Fantastic Four: World's Greatest Week With a New Marvel 101</h5>
          <p><a class="btn btn-danger" href="https://www.youtube.com/watch?v=biif266onOE
" target="_blank" role="button">View
              details
              &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="card card-body spacing col-lg-4 text-center">
          <img class="img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/_cm_card.jpg
" alt="Generic placeholder image">
          <p>MOVIES</p>
          <h5>Get Your Secial Look At Marvel Studios' Captain Marvel. Tickets Now For Sale</h5>
          <p><a class="btn btn-danger" href="https://www.youtube.com/watch?v=GX33bIOA5aA
" target="_blank" role="button">View
              details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="card card-body spacing col-lg-4 text-center">
          <img class="img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/amw-card.jpg
" alt="Generic placeholder image">
          <p>CULTURE & LIFESTYLE</p>
          <h5>Ant-Man and The Wasp: Nano Battle! Opens March 31 at Hong Kong Disneyland</h5>
          <p><a class="btn btn-danger" href="https://www.youtube.com/watch?v=0tW77VFKQC0
" target="_blank" role="button">View
              details
              &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <hr>


      <div class="row">
        <div class="card card-body spacing col-lg-4 text-center">
          <img class="img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/twim-2019_wlogo.jpg" alt="Generic placeholder image">
          <p>PODCASTS</p>
          <h5>This Week in Marvel Gets Ready for What's Ahead in 2019</h5>
          <p><a class="btn btn-danger" href="https://soundcloud.com/marvel/375-2019-and-good-charlotte-are-here" target="_blank"
              role="button">View
              details
              &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="card card-body spacing col-lg-4 text-center">
          <img class="img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/maacard.jpg
" alt="Generic placeholder image">
          <p>TV SHOWS</p>
          <h5>Spider-Man Guest Stars as 'Marvel's Avengers: Black Panther's Quest' Returns</h5>
          <p><a class="btn btn-danger" href="https://www.youtube.com/watch?v=gv_tw_9rgc8
" target="_blank" role="button">View
              details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="card card-body spacing col-lg-4 text-center">
          <img class="img-fluid" src="https://terrigen-cdn-dev.marvel.com/content/prod/1x/black-widow-wom.jpg
" alt="Generic placeholder image">
          <p>PODCASTS</p>
          <h5>The Soska Sisters Bring Their Scary Sensibilities to Women of Marvel</h5>
          <p><a class="btn btn-danger" href="https://soundcloud.com/marvel/horror-and-comics-with-jen-and-sylvia-soska
"
              target="_blank" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

    </div>



    <div class="container marketing">
      <!-- THE FEATURETTES/ NEW COMICS -->

      <hr class="featurette-divider">
      <h1><b>NEW THIS WEEK</b></h1>
      <hr>

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">
            Miles Morales: Spider-Man (2018) #2<br><br><span class="text-muted">It'll blow your mind.</span></h2><br>
          <p class="lead">Miles is getting closer to solving the mystery of the thievery ring plaguing Brooklyn, but
            the Rhino has complicated matters quite a lot. Rhino doesn’t usually have minions preferring to charge
            alone. What’s behind this change of methodology? Plus, meet a new antagonist who may just become Miles’
            most dangerous foe!</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto" src="https://i.annihil.us/u/prod/marvel/i/mg/6/40/5c2f6a413c278/clean.jpg
"
            alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">

            The Punisher (2018) #6<br><br><span class="text-muted">Brutal and Rugged!</span></h2><br>
          <p class="lead">BAGALIA BOUND! The Punisher is extradited to the worst place imaginable…Bagalia! Hydra Nation
            itself! Frank’s been in prison before, but he’s about to enter a prison on an island full of bad guys…As
            Frank enters the lion’s den, Zemo makes his move.</p>
        </div>
        <div class="col-md-5 order-md-1">
          <img class="featurette-image img-fluid mx-auto" src="https://i.annihil.us/u/prod/marvel/i/mg/b/d0/5c2f6b1ea2a19/clean.jpg
"
            alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">

            Thor (2018) #9<br><br><span class="text-muted">The New Asgardian Defender.</span></h2><br>
          <p class="lead">MEET EARTH’S NEWEST DEFENDER: ROZ SOLOMON! With S.H.I.E.L.D. gone, Roz Solomon has been left
            adrift in a world full of homeless gods and mislaid hammers. Now this Asgardian ally is about to take on a
            surprising new role — and make a million new enemies. For the War of the Realms is coming…and the invasion
            of Earth may have already begun. Cue the Frost Giants!</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto" src="https://i.annihil.us/u/prod/marvel/i/mg/9/40/5c2f6b164ea37/clean.jpg
"
            alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <!-- FOOTER -->
    <footer class="page-footer font-small footerText">
      <div class="jumbotron text-center">
        <h4>FOLLOW MARVEL</h4>
        <div>
          <a href="https://www.facebook.com/Marvel/" target="_blank"><span class="nav-link fab fa-facebook fa-lg" style="color: #dee2e69e;"></span></a>
          <a href="https://twitter.com/marvel" target="_blank"><span class="nav-link fab fa-twitter fa-lg" style="color: #dee2e69e;"></span></a>
          <a href="https://www.instagram.com/marvel/" target="_blank"><span class="nav-link fab fa-instagram fa-lg"
              style="color: #dee2e69e;"></span></a>
          <a href="http://marvelentertainment.tumblr.com/" target="_blank"><span class="nav-link fab fa-tumblr fa-lg"
              style="color: #dee2e69e;"></span></a><br>
          <a href="https://www.youtube.com/marvel" target="_blank"><span class="nav-link fab fa-youtube fa-lg" style="color: #dee2e69e;"></span></a>
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
              <input type="text" id="username" name="username" class="form-control" placeholder="Username" required />
            </div>

            <div class="form-group">
              <h5>Password:</h5>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required />
            </div>
          </div>

          <div class="modal-footer">
            <button id="CreateAnAccount" type="button" class="btn btn-danger mr-auto" data-toggle="modal" data-target="#loginModalSignUp">CREATE
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
              <img class="rounded-circle img-center" src="login.jpg" alt="Generic placeholder image" width="230" height="280">
            </div>

            <div class="form-group">
              <h5>E-mail:</h5>
              <input id="email" type="email" name="email" class="form-control" placeholder="Email" required />
            </div>

            <div class="form-group">
              <h5>Phone:</h5>
              <input id="number" type="number" name="phone" class="form-control" placeholder="Phone Number" required />
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
    //signin
    $(document).ready(function() {
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
                  $("#SignUpFormError").html("Username taken! Try a different one.");
                  $("#SignUpFormError").css("display", "block");
                } else if (parseInt(data) === -2) {
                  $("#SignUpFormError").html("Enter a valid email address");
                  $("#SignUpFormError").css("display", "block");
                } else if (parseInt(data) === -3) {
                  $("#SignUpFormError").html("Invalid phone number, must be upto 11 digits");
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

      $("#search").click(function() {
        $("#bar").css("display", "block");
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
    });
  </script>




  <!-- jQuery Scripts -->
  <script type="text/javascript">

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
                    //alert('Welcome " . $_SESSION['user'] . "');
                </script>";
    }
    ?>

</body>

</html>