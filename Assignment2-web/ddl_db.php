<?php
/*
Contains all queries and Database definition code to create the database and tables
Connection to the database server will be done with username "root" and server "localhost"
and will not requiere password to stablish a conncetion
*/


//file to create the database and the required tables
// Create connection
$conn = mysqli_connect("localhost", "root", "");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 

// Create database
$db = "CREATE DATABASE assignment2";
if (mysqli_query($conn, $db)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}
//close connection after creating database
mysqli_close($conn);

//new connection to acces with new database
$conn = mysqli_connect("localhost", "root", "", "assignment2");
// check assignment2 database connection
if (!$conn) {
  die("Error: creation of databse failed: " . mysqli_connect_error());
} 
// query to create table users
$users = "CREATE TABLE users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(40), 
username VARCHAR(40),
password VARCHAR(40) 
)";
//check if created correclty
if (mysqli_query($conn, $users)) {
    echo "Table users created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

//query to create table movies 
$movies = "CREATE TABLE movies (
movie_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(11),
title VARCHAR(40), 
img VARCHAR(500),
year INT(11),
rating VARCHAR(10)
)";
//check if created correclty
if (mysqli_query($conn, $movies)) {
    echo "Table movies created successfully";
    } else {
    echo "Error creating table: " . mysqli_error($conn);
    }

// query to create table series
$series = "CREATE TABLE series (
series_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(11),
title VARCHAR(40), 
year INT(11),
img VARCHAR(500),
rating VARCHAR(11)
)";
//check if created correclty
if (mysqli_query($conn, $series)) {
    echo "Table series created successfully";
    } else {
    echo "Error creating table: " . mysqli_error($conn);
    }
//close connection
mysqli_close($conn);



?>