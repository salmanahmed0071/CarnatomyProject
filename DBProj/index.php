<?php
  session_start();//start the session
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=\, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Carnatomy</title>
        <link rel="stylesheet"  href="CSS/bootstrap.css">
        <script src="JS/bootstrap.js"></script>
        <script src="JS/bootstrapjquery.js"></script>
        <script src="JS/jquery-3.3.1.js"></script>
        <script src="JS/popper.js"></script>

        <link rel="stylesheet" href="JS/bootstrap.js"></script>
        <link rel="stylesheet" a href="CSS/myStyle.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="jumbotron text-center" style="margin-bottom:0;background-color:white;">
            <img src="Logo.jpeg">
          </div>

<!--Top navigation bar-->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="index.php">Home</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="signUp.html">Sign Up</a>
      </li>
      <li class="nav-item">
        <?php
         // if(isset($_SESSION['username']))
         //include 'Login.php';

         if(isset($_SESSION['username']))
         {
          $dName=$_SESSION['username'];
           echo "<a class='nav-link' href='LogOut.php'>";
           echo "Log Out $dName";
           echo"</a>";
         }
          else{
            echo"<a class='nav-link' href='Login.php'>Login</a>";
          }
        ?>

      </li>
      <li class='nav-item'>
          <?php
            if(isset($_SESSION['username']))
            {
              echo "<a class='nav-link' href='postCarAdd.php'>";
              echo "Sell Your Car";
              echo"</a>";
            }
           ?>
      </liv>
      <li class="nav-item">
        <a class="nav-link" href="SearchVehicles.php">Search</a>
      </li>
    </ul>

  </nav>



         <!--Adding a carousel to it-->
         <div id="demo" class="carousel slide" data-ride="carousel" >

            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="homepage-carousel-1.jpg" alt="design 1" width="100%" height="800">
                <div class="carousel-caption">
                    <h2>Going beyond the horizon</h2>
                    <i>Mercedes C63 AMG</i>
                </div>
              </div>
              <div class="carousel-item">
                <img src="homepage-carousel-2.jpg" alt="Chicago" width="100%" height="800">
                <div class="carousel-caption">
                        <h2>Ultimate Finesse</h2>
                        <i>Aston Martin DB11</i>
                </div>

              </div>
              <div class="carousel-item">
                <img src="homepage-carousel-3.jpg" alt="New York" width="100%" height="800">
                <div class="carousel-caption">
                <h2>Overpowering & Dominance</h2>
                    <i>Chevy Corvette C8</i>
                    </div>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
        </div>


        <!--adding footer to the page-->
        <div class="container-fluid text-center" style="background-color:#2d2d30;padding: 80px;color:white">
          <a href="index.html"><i class="fa fa-angle-up" style="font-size:36px;color:white"></i></a>
          <br>
          <i>Project by: M. Ahmad Chaudhary, Haseeb Asif, Salman Ahmed</i>
      </div>
    </body>
</html>
