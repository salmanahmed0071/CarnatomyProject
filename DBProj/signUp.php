<html>
<head>

</head>
<?php

    function checkPasswords($p1,$p2)
    {
        if(strcmp($p1,$p2)==0)
        {
            return true;
        }
        return false;
    }
    $setFirstName=$_POST["fname"];
    $setLastName=$_POST["lname"];
    $setEmail=$_POST["user_email"];
    $setPassword=$_POST["user_password"];
    $verifyPassword=$_POST["vPassword"];
    $setStreet=$_POST["streetAddress"];
    $setCity=$_POST["city"];
    $setProvince=$_POST["province"];
    $setAccNum=$_POST["accountNum"];

    //now set up connection
    $conn=new mysqli('localhost','root','','dbproject');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else{

        if(strcmp($setPassword,$verifyPassword)!=0)
        {
            echo "Incorrect Password";
            header("Location: signUp.html");
           // echo "<a href='signUp.html'>Go Back and make changes?</a>";
            $conn->close();
            return;
        }
        $sql_insert="insert into userprofile(First_name,Last_name,email,user_password,Street,City,State_Province) values
        ('".$setFirstName."','".$setLastName."','".$setEmail."','".$setPassword."','".$setStreet."','".$setCity."','".$setProvince."')";

        if($conn->query($sql_insert)=== TRUE){
            echo "record inserted successfully";
            header("location:login.php");//must go to login page
        }
        else{
        echo "record not inserted!";
        }
    }
    $conn->close();
?>

</html>
