<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=\, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Carnatomy</title>
        <link rel="stylesheet" a href="CSS/bootstrap.css">
        <script src="JS/bootstrap.js"></script>
        <script src="JS/bootstrapjquery.js"></script>
        <script src="JS/jquery-3.3.1.js"></script>
        <script src="JS/popper.js"></script>
        <link rel="stylesheet" a href="CSS/myStyle.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="index.php">Home</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="signUp.html">Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Search</a>
      </li>
    </ul>
  </nav>


            <div class="container mt-12">
                <div class="row">
                    <div class="offset-4 col-sm-4">
                            <form class="text-center" method="POST" action="Login.php">
                                <br>
                                <h3>Sign In</h3>
                                <br><br>
                                <div class="form-row ">
                                    <div class="col ml-4">
                                        <!-- First name -->
                                        <input type="text" name="user_name" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col ml-4">
                                        <input type="password" name="user_password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-light" type="submit" value="submit">sign in</button>
                            </form>
                        </div>
                    </div>
            </div>
        <?php

            session_start();//start the session
            $found=0;
         if($_SERVER['REQUEST_METHOD']=='POST')
         {
           $userEmail=$_POST['user_name'];
           $userPassword=$_POST['user_password'];

           //establish sql connection
           $conn=new mysqli("localhost","root","","dbproject");
           $sql="Select * from userprofile";
           $result=$conn->query($sql);//gets the query results
           if($result->num_rows<0)
           {
               echo "0 Results Found";
               header("Location: Login.php");
           }
           while($row =$result->fetch_assoc())
           {
               if($row['email']==$userEmail)
               {
                   if($row['user_password']==$userPassword)
                   {
                     //copy($row['First_name'],$dispName);
                     echo "<script type='javascript'>";
                     echo "alert('Login SuccessFul')";
                     echo "</script>";
                     $found=1;
                     break;//break the loop
                   }
               }

           }

           $conn->close();

                 //now setting up a login session
                 $_SESSION['valid']=true;
                 $_SESSION['timeout']=time()*60*60;//1 hour session
                 $_SESSION['username']=$row['First_name'];
                 $_SESSION['userId']=$row['User_id'];
                 header("Location:index.php");//go to index page

         }
        ?>

    </body>
</html>
