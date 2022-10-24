<?php
//This page handles data to create and store new user to database
//redirect after creation to the index page.
header( "refresh:0;url=login.php" );
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //create a connection to database
    $conn = mysqli_connect("localhost", "root", "", "assignment2");

    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
            echo "<h3>error conecting</h3>";
    }
    // Taking all 5 values from the form data(input)
    $email =  $_POST['email'];
    $login = $_POST['login'];
    $pass =  $_POST['pass'];
    // Performing insert query execution
    // here our table name is college
    $sql = "INSERT INTO users (email, user_name, password) VALUES ('$email', '$login','$pass')";
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Account created succesfully: please sign!');</script>";
    } else{
        echo "ERROR: $sql. "
            . mysqli_error($conn);
            echo "<h3>error</h3>";
    }
    // Close connection
    mysqli_close($conn);
}
?>