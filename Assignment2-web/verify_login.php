<?php
//file to verify if user exist and redirect to sign in to profile
//session start to get session variables
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //connect to database
    $conn = mysqli_connect("localhost", "root", "", "assignment2");
    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
            echo "<h3>error conecting</h3>";
    }
    // Taking all 5 values from the form data(input)
    $login = $_POST['userlogin'];
    $pass =  $_POST['userPass'];

    // Performing insert query execution
    // here our table name is college
    $sql = "SELECT * FROM users WHERE user_name = '$login' and password = '$pass' ";
    $info = mysqli_query($conn, $sql);
    if(!$info){
        echo "<script>alert('Connection failed')</script>";
    }
    else{
        $array = mysqli_fetch_array($info);
        if($array[2] == $login){
            echo "<script>alert('$login : verification completed!')</script>";
            $_SESSION['username'] = $array[2];
            $_SESSION['email'] = $array[1];
            $_SESSION['id'] = $array[0];
        }
        else{
            echo "<script>alert('Error: user $login does not exist. Please create an account')</script>";
        }
        
    }
    // Close connection
    mysqli_close($conn);
}
?>