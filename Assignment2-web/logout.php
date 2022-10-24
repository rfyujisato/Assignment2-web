<?php
//page to destroy session/sign out from profile
session_start();
session_destroy();
//alert user session is over
echo "<script>alert('You logout of your account!');</script>";
//redirect to index
header( "refresh:0;url=index.php" );
?>
