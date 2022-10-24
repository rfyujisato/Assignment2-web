<?php
  ini_set('display_startup_errors', 1);
  ini_set('display_errors', 1);
  error_reporting(-1);
    function connectdb(){
        
        $servername = "localhost";
        $username = "group39";
        $password = "Grupo39";

        $db_connect = 
            mysqli_connect($servername, $username, $password);

        if (!$db_connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            echo "<p> succesful </p>";
        }

    }
    function closedb(){

        mysqli_close($db_connect);

    }

?>