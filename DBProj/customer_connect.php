<?php

   
        $firstName = $_POST['firstName'];  
        $lastName = $_POST['lastName'];   
        $Email = $_POST['Email'];   
        $cellNum = $_POST['cellNum'];
    

    $serverName="localhost";
    $username = "root";
    $password = "";
    $dbname = "dbproject";

    $conn = mysqli_connect($serverName,$username,$password,$dbname);
    if($conn)
    {
        echo "Connection Ok";
    }
    else 
    {
        die("Connection failed because : ".mysqli_connect_error());
    }
    
    //Data connection
    //mysqli('servername','username','password','database') <--this is the syntax
    // $conn = new mysqli($serverName,$username,$password,$dbname);
    // if($conn->connect_error || $conn==false){
    //     die('Connection Failed: '.$conn->connect_error);
    // }
    // else{
    //     $sql= "INSERT INTO customerReg(firstName,lastName,Email,cellNum) values(?,?,?,?,?)";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bind_param("sssi",$firstName,$lastName,$Email,$cellNum);
    //     $stmt->execute();

    //     echo "Registration successful";
    //     $stmt->close();
    //     $conn->close();
    //     $stmt = $conn->prepare("insert into customerReg(firstName,lastName,Email,cellNum) values(?,?,?,?)");
    //    // $stmt=$conn->prepare($query);
    //     $stmt->bind_param("sssi",$firstName,$lastName,$Email,$cellNum);
    //     $stmt->execute();
    //     if($stmt->execute())
    //     {
    //         echo "Registration Successfull";
    //     }

    //     $stmt->close();
    //     $conn->close();
    
?>