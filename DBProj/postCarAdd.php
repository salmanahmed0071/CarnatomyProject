<<?php
  session_start();
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
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
             echo "Log Out". $_SESSION['username']." ";
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
    <br><br>
    <div class="container-fluid mt-3 mb-4 bg-light">
      <div class="offset-2 col-md-8 bg-light" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <form method="POST" enctype="multipart/form-data">
          <br><br>
                         <h3 class="text-center">SELL YOUR CAR</h3>
                          <h5 class="text-center mt-4">Vehicle Details</h5>

                          <div class="form-row mt-4"><!--Now for the vehicle details-->
                              <h5>Registration NO. of vehicle</h5>
                              <input type="text" class="form-control" name="RegNum">
                          </div>
                          <div class="form-row mt-4"><!--Now for the vehicle details-->
                              <h5>Transmission</h5>
                              <input type="text" class="form-control" name="transmission">
                          </div>
                          <div class="form-row mt-4"><!--Now for the vehicle details-->
                              <h5>Make</h5>
                              <input type="text" class="form-control" name='make'>
                          </div>
                          <div class="form-row mt-4"><!--Now for the vehicle details-->
                              <h5>Model of Vehicle</h5>
                              <input type="text" class="form-control" name='modelName'>
                          </div>
                          <div class="form-row mt-4"><!--Now for the vehicle details-->
                              <h5>Color</h5>
                              <input type="text" class="form-control" name='color'>
                          </div>
                          <div class="form-row mt-4"><!--Now for the vehicle details-->
                              <h5>Year</h5>
                              <input type="number" class="form-control" min="1900" max=<?php echo date('Y');?> name='modelYear'>
                          </div>
                          <div class="form-row mt-4"><!--Now for the vehicle details-->
                              <h5>Current Mileage</h5>
                              <input type="number" class="form-control" min="0" name='mileage'>
                          </div>
                          <div class="form-row mt-4"><!--Now for the vehicle details-->
                              <h5>Price</h5>
                              <input type="number" class="form-control" min="0" name='askingPrice'>
                          </div>
                          <div class="form-row mt-4">
                              <input type="file" name="carImage" class="form-control">
                          </div>
                          <br>
                          <div class="for-row ml-4">
                              <div class="offset-5 col">
                          <button type="submit" class="btn text-center" style="border:1px solid black">Post Ad</button>
                        </div>
                          <br><br>
                        </div>
                     </form>
      </div>
    </div>


  </body>
</html>

<?php
 $targetDir=";";
if($_SERVER['REQUEST_METHOD']=="POST")
    {
      $extensions= array("jpeg","jpg","png");//files that are supported by our webpage

      $error=array();
      if(isset($_FILE['carImage']))
      {
        $file_name = $_FILES['carImage']['name'];
      $file_size = $_FILES['carImage']['size'];
      $file_tmp = $_FILES['carImage']['tmp_name'];
      $file_type = $_FILES['carImage']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152) {
        $errors[]='File size must be excately 2 MB';
     }


      }

      $vMake=$_POST['make'];
      $vModelName=$_POST['modelName'];
      $vModelYear=$_POST['modelYear'];
      $vPrice=$_POST['askingPrice'];
      $vColor=$_POST['color'];
      $vRegNum=$_POST['RegNum'];
      $vTransmission=$_POST['transmission'];
      $vMileage=$_POST['mileage'];

      //Now establish sql connection
      $conn=new mysqli("localhost","root","","DBProject");

      $sql_1="insert into vehicle(model_year,price,make,model_name) values(".$vModelYear.",".$vPrice.",'".$vMake."','".$vModelName."')";

      if($conn->query($sql_1)==TRUE)
      {
        echo "Record entered successfully";
        $sql_2="insert into seller values (".$_SESSION['userId'].",(select MAX(CarCode) from vehicle))";
        if($conn->query($sql_2)==TRUE)
        {
          echo "seller successfully added";
          $sql_3="insert into cardetails values((select MAX(CarCode) from vehicle),".$vMileage.",'".$vTransmission."','".$vColor."','".$vRegNum."')";
          if($conn->query($sql_3)==TRUE)
          {
            echo "Car details inserted";
            //now uploading image
            $sql_4="insert into mediaData values('uploads/".$_SESSION['userId']."/". $_FILES['carImage']['name']."',".$_SESSION['userId'].")";
            if($conn->query($sql_4)==TRUE)
            {
              echo "Image ID also stored\n";
              if(empty($errors)==true) {
                  mkdir("F:/xampp/htdocs/DBProj/uploads/".$_SESSION['userId']);
                  move_uploaded_file( $_FILES['carImage']['tmp_name'],"F:/xampp/htdocs/DBProj/uploads/".$_SESSION['userId']."/". $_FILES['carImage']['name']);
                  echo "Success";
                  header("location:index.php");
               }else{
                  print_r($errors);
               }
            }
          }
          else
          {
            echo "Car details not inserted";
          }
        }
        else{
          echo "Data not inserted for seller";
        }
      }
      else
      {
        echo "Data not inserted";
      }


    }//POST

 ?>
