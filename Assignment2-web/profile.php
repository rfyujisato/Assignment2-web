<!-- This is the profile of the user, will diplay movies and shows or will tell user to sign in -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Profile</title>
</head>
<body>
<?php 
include("headboiler.html");
include ("headerboiler.html"); ?>
<?php
    /*
    check errors
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    */
    include_once("verify_login.php");
    if(!isset($_SESSION['id'])){
        ?>
        <?php
        echo "
        <div class='display'>
            <div class='searchInfo'>
                <h2> Please sign in to your account! </h2>
            </div>
        </div>";
        include("footer.html");
    }
    else{
?>      
        <div class='display'>
            <h1>Welcome back <?php echo $_SESSION['username']?></h1>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "assignment2");
            // Check connection
            if($conn === false){
                die("ERROR: Could not connect. "
                    . mysqli_connect_error());
                    echo "<h3>error conecting</h3>";
            }
            
            // select movies that user added
            $sql_movies = "SELECT title, img, year, rating FROM movies WHERE user_id = " .$_SESSION['id']. " ";
            $movies = mysqli_query($conn, $sql_movies);
            
            if($movies){
                echo "<h2>Your movies!</h2>";
                $rows = mysqli_num_rows($movies);
                        
            if ($rows > 0){
                echo 
                "<div>
                <table> 
                    <tr>
                        <th></th>
                        <th>Title</th> 
                        <th>Year</th>
                        <th>Rating</th>
                        <th></th>
                    </tr>";
                while($i = mysqli_fetch_assoc($movies)) {
                    echo 
                        "<tr>
                            <td> <img src=' ".$i['img']." '> </td>
                            <td>".$i['title']."</td> 
                            <td>".$i['year']."</td>
                            <td>".$i['rating']." </td>
                            <td> <a href='delete_movie.php?title=".$i['title']."&poster=".$i['img'].".php' 
                                <span name='delete' id='delete' class='material-symbols-outlined'>delete_forever</span> </a> </td>
                        </tr>";
                }
                echo "
                </table>
                </div>";
                mysqli_free_result($movies);
            } else {
                echo "<h3> 0 movies on your profile! </h3>";
            }
            }

            $sql_series = "SELECT title, img, year, rating FROM series WHERE user_id = " .$_SESSION['id']. " ";
            $series = mysqli_query($conn, $sql_series);
            if($series){
                echo "<h2>Your Series!</h2>";
                $rows = mysqli_num_rows($series);
                            
                if ($rows > 0){
                    echo "
                    <div>
                    <table> 
                    <tr>
                        <th></th>
                        <th>Title</th> 
                        <th>Year</th>
                        <th>Rating</th>
                        <th></th>
                    </tr>";
                    while($i = mysqli_fetch_assoc($series)) {
                        echo 
                            "<tr>
                                <td> <img src=' ".$i['img']." '> </td>
                                <td>".$i['title']."</td> 
                                <td>".$i['year']."</td>
                                <td>".$i['rating']."</td>
                                <td> <a href='delete_series.php?title=".$i['title']."&poster=".$i['img'].".php' 
                                <span name='delete' id='delete' class='material-symbols-outlined'>delete_forever</span> </a> </td>
                            </tr>";
                    }
                    echo "
                    </div>
                    </table>";
                    mysqli_free_result($series);
                } else {
                    echo "<h3> 0 series on your profile! </h3>";
                    }
                
        }
            // Close connection
            mysqli_close($conn);
        ?>
    </div>
    <?php
    }
    ?>
    <footer>

    </footer>
</body>
</html>