<?php
//this page contains the connection to the database to delete the selected movie
include("headerboiler.html");
include("headboiler.html");
session_start();
//redirect to search bar 
header( "refresh:5;url=profile.php" );
/*
check errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
*/

if($_SERVER["REQUEST_METHOD"] == 'GET'){
    //get data from get array
    $id = $_SESSION['id'];
    $title = $_GET['title'];
    $poster = $_GET['poster'];
    //start the connection to database
    $conn = mysqli_connect("localhost", "root", "", "assignment2");
    // check the connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
            echo "<h3>error conecting to database</h3>";
    }
    
    // Delete the movies to table
    $sql = "DELETE FROM movies WHERE title = '$title' and user_id = " .$_SESSION['id']. " ";
    //succesfully deleted the movies
    if(mysqli_query($conn, $sql)){
        //display the movie info deleted
        echo 
        "<div class='display'>
            <div class='searchInfo'>
                <h1>You succesfully deleted $title to your profile!</h1>
                <img src='$poster' >
                <h4> You will be redirectioned to the movie search bar in 5 seconds... </h4>
            </div>
        </div>";
    } else{
        echo "Not able to delete movie $sql. "
            . mysqli_error($conn);
            echo "<h3>ERROR</h3>";
    }
    // close the connection
    mysqli_close($conn);
    //unset global variable for the next searches
    unset($_SESSION['title']);
}
?>