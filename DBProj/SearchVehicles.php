<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=\, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Carnatomy</title>
        <link rel="stylesheet" href="CSS/searchCSS.css">
        <link rel="stylesheet"  href="CSS/bootstrap.css">
        <script src="JS/bootstrap.js"></script>
        <script src="JS/bootstrapjquery.js"></script>
        <script src="JS/jquery-3.3.1.js"></script>
        <script src="JS/popper.js"></script>

        <link rel="stylesheet" href="JS/bootstrap.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>
    <style>
      body{
        background-image: url("Porsche-wallpaper.jpg");

      }

      </style>
    <body>

        <!-- <div class="jumbotron text-center" style="margin-bottom:0;background-color:white;">
            <img src="Logo.jpeg">
          </div> -->
          <!--Add top navigation bar below-->
          <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <a class="navbar-brand" href="index.php">Home</a>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="signUp.html">Sign Up</a>
              </li>
              <li class="nav-item">
                <?php
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
              <li class="nav-item">
                <a class="nav-link" href="SearchVehicles.php">Search</a>
              </li>
            </ul>

          </nav>
          <!---->

          <!--Search bar-->
          <div class="container-fluid text-left " >
              <div class="row" style="padding-top:200px;" class="carnatomy">
                <div class="offset-2">
                </div>
                <div class="col-md-8" style="background-color:black;opacity:0.7 ">
                    <form action="SearchResults.php" method="POST" class="carnatomy" >
                      <fieldset>
                        <legend style="color:white;font-size:36px">Carnatomy</legend>
                      </fieldset>
                      <div class="row text-center" style="padding:25px;">
                        <div class="col-sm-6">
                        <input type="text" name="vehicleMake" placeholder="Make/Brand" class="carnatomy">
                        <br>
                        <label style="color:grey"><strong>From</strong></label>
                        <br>
                        <input type="number" name="startYear" min="1900" max=<?php echo date("Y");?> class="carnatomy" >
                      </div>
                      <div class="col-sm-6">

                        <input type="text" name="vehicleModel" placeholder="Model" class="carnatomy " >
                        <br>
                      <label style="color:grey"><strong>To</strong></label>
                        <br>
                        <input type="number" name="endYear" min="1901" max=<?php echo date("Y");?> class="carnatomy ">
                      </div>

                      </div>
                      <div class="row text-center"style="padding-bottom:25px;">
                        <div class="col-md-12">
                        <button class="btn btn-default" type="submit">Search</button>
                      </div>
                      </div>
                    </div>
                    </form>
                </div>
              </div>

          </div>

    </body>


</html>
<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    header("Location: SearchResults.php");
  }
 ?>
