<?php
//this page handles the data from the search to add to the database according to the user
include("headerboiler.html");
include("headboiler.html");
session_start();
//redirect to search bar 
header( "refresh:5;url=movies.php" );
/*
check errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
*/

if($_SERVER["REQUEST_METHOD"] == 'GET'){
    //get data from get array
    $title = $_GET['title'];
    $poster = $_GET['poster'];
    $year = $_GET['year'];
    $rating = $_GET['rating'];
    //start the connection to database
    $conn = mysqli_connect("localhost", "root", "", "assignment2");
    // check the connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
            echo "<h3>error conecting to database</h3>";
    }
    
    // Pinsert the movies to table
    $sql = "INSERT INTO movies (user_id, title, img, year, rating) 
    VALUES (  ".$_SESSION['id']." , '$title', '$poster', '$year', '$rating')";
    //succesfully added the movies
    if(mysqli_query($conn, $sql)){
        //display the movie info added
        echo 
        "<div class='display'>
            <div class='searchInfo'>
                <h1>You succesfully added $title to your profile!</h1>
                <img src='$poster' >
                <h4> You will be redirectioned to the movie search bar in 5 seconds... </h4>
            </div>
        </div>";
    } else{
        echo "Not able to add movie $sql. "
            . mysqli_error($conn);
            echo "<h3>ERROR</h3>";
    }
    // close the connection
    mysqli_close($conn);
    //unset global variable for the next searches
    unset($_SESSION['title']);
}
?>