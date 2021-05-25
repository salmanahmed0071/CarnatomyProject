<?php
session_start();
//now the user can search their desired vehicle
?>
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

  <body style="background-color:#2C313C">

    <div class="jumbotron text-center" style="margin-bottom:0;background-color:white;">
        <img src="Logo.jpeg">
      </div>
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

      <!---Results will be displayed-->
      <div class="container-fluid" style="padding-top:40px;">
        <div class="row">
        <div class="offset-2">
        </div>
        <div class="col-md-8">
          <?php
            $serverName="localhost";
            $uName="root";
            $password="";
            $dbname="DBProject";//set database name

            //now retrieve search criterias
            $vMake=$_POST['vehicleMake'];
            $vModel=$_POST['vehicleModel'];
            $sYear=$_POST['startYear'];
            $eYear=$_POST['endYear'];

            //now setup database connection
            $conn=new mysqli($serverName,$uName,$password,$dbname);


            //write the query search results
            $sql="select u.*,v.*,m.imgPathway from  userProfile u join seller s on u.User_id=s.user_id
join vehicle v on v.CarCode=s.CarID join mediaData m on m.uploaderID=u.User_id where v.make like '%$vMake%' and v.model_name like '%$vModel%' and v.model_year between $sYear and $eYear";
            //now get the results
            $result = $conn->query($sql);

              //echo "<div class='list-group'>";
                echo "<table class='table table-dark table-hover>'";
                echo "<tr>";
                echo "<th>Image</th><th>Vehicles for sale</th><th>Price</th>";
                echo "</tr>";

              while($row=$result->fetch_assoc())//retrieves data from data base and displays it
              {
                // echo "<a href='#' class='list-group-item'>";
                // echo "<h4 class='list-group-item-heading'>".$row['make']." ".$row['model_name']."</h4>";
                // echo "<p class='list-group-item-text'> Year ".$row['model_year']." Price: ".$row['price']."</p>";
                // echo "<p class='list-group-item-text'> Seller: ".$row['First_name']." ".$row['Last_name']."</p>";
                // echo "</a><br>";


                echo "<tr><td><img src='".$row['imgPathway']. "' width='150' height='128'></td>";
                echo "<td>".$row['make']." ".$row['model_name']."<br> Year:".$row['model_year']." Seller: ".$row['First_name']." ".$row['Last_name']."<br>Email: ".$row['email']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "</tr>";

              }
              echo "</table>";
            //  echo "</div>"

              //$conn->close();//close the connection
           ?>
        </div>
      </div>
      </div>

    </body>
  </html>
