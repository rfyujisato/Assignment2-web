<?php
//This page is the search bar for the movies
//session start to get global variables
session_start();
include ("headerboiler.html");
include("headboiler.html");
?>
<body>
    <div class="display">
        <!-- this web is able to search and display the required movie -->
        <h2>Find your favorite movies</h2>
        <!-- form to get values to search -->
        <form method="POST">
            <input type="text" placeholder="Search.." name="movie" id="search">
            <button type="submit">Search</button>
        </form>
        <?php
        /*
        ini_set('display_startup_errors', 1);
        ini_set('display_errors', 1);
        error_reporting(-1);
        */
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //obtain movie name from form
                $search = $_POST['movie'];
                //API reuqets to database containing movies. The return type will be a JSON containing information
                $request = "http://www.omdbapi.com/?s=$search&type=movie&apikey=9ab90ab5&";
                //API reuqets to database containing movies. The return type will be a JSON containing information
                $array_movies = file_get_contents($request);
                //decode results as array to retrieve information
                $json = json_decode($array_movies, true);
               //Obtaining info about movies by searching the array
               echo "<div class='searchResult'>";
               foreach ($json['Search'] as $i){
                //save variablesa accordingly
                $title = $i['Title'];
                $poster = $i['Poster'];
                $year = $i['Year'];
                $code = $i['imdbID'];
                //new request to extra information not available
                $extra_info = "http://www.omdbapi.com/?type=movie&i=$code&plot=full&apikey=9ab90ab5&";
                $extra_array = file_get_contents($extra_info);
                $json_extra = json_decode($extra_array, true);
                $plot = $json_extra['Plot'];
                $rating = $json_extra['Ratings'][1]['Value'];
                //display info about movies
                echo "
                <div class='card'>
                <form action='add_movie.php' method='get'>
                    <div class='info'>
                        <img src='$poster' id='poster'>
                        <h4 name='movie'>$title</h4>
                        <h3 name='year'>$year</h3>
                        <p name='plot'>$plot</p>
                        <p name='rating'>Rating: $rating</p>";
                    //if user is not signed in
                    if(!isset($_SESSION['id'])){
                        echo "<h4> Sign in or register to add $title to your profile</h4>
                    </div>
                </form>
                </div>";
                    }
                    //if user signed in, can add movie to profile
                    else{
                echo "
                    <button type='submit'> <a href='add_movie.php?title=$title&poster=$poster&year=$year&rating=$rating'> Add $title to my profile </a> </button>
                    </div>
                </form>
                </div>";
                    }                   
                }
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>