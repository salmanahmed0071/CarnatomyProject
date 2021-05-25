<?php

    $con=mysqli_connect('localhost','root','');
    if(!$con)
    {
        echo "not connected to the server";
    }

    if(!mysqli_select_db($con,'dbproject'))
    {
        echo "Database not selected";
    }

    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $Eml = $_POST['Email'];
    $cellN = $_POST['cellNum'];
    $sql="INSERT INTO customerReg(firstName,lastName,Email,cellNum) VALUES('$fName','$lName','$Eml','$cellN')";
    if(!mysqli_query($con,$sql))
    {
        echo "Data not inserted";
    }
    else
    {
        echo "Registration successful";
    }

    header("refresh:2;,url=index.html");

?>