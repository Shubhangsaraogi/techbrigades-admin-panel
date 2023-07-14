<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "ansrone";
$conn = mysqli_connect($servername, $username , $password ,  $databasename);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if(isset($_POST["careerbtn"])&&isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["mobile"])&&isset($_POST["appliedfor"])&&isset($_POST["address"])&&!empty($_POST["name"])&&!empty($_POST["email"])&&!empty($_POST["mobile"])&&!empty($_POST["appliedfor"])&&!empty($_POST["address"]))
{
    $name=mysqli_real_escape_string($conn,@$_POST['name']);
    $email=mysqli_real_escape_string($conn,@$_POST['email']);
    $mobile=mysqli_real_escape_string($conn,@$_POST['mobile']);
    $appliedfor=mysqli_real_escape_string($conn,@$_POST['appliedfor']);
    $address=mysqli_real_escape_string($conn,@$_POST['address']);
    $btn=$_POST["careerbtn"];
    if($btn=="career")
    {
        $insertquery="INSERT INTO career(name,email,mobile,appliedfor,address) VALUES('$name','$email','$mobile','$appliedfor','$address')";
    
    if (mysqli_query($conn, $insertquery)) {
       //echo "New record created successfully";
            ?> <script>alert("Request Sent")</script><?php
       
    } else {
        echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
    }
    }
}


?>