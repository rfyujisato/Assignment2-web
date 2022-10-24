 <?php 
 //this is the login web, including a form to be completed by the user
 //data sent will be handled POST in add_user.php
include("headerboiler.html");
include ("headboiler.html"); 
include_once("dbhelper.php");
 ?>
 <body>
    <div class = "display" >
        <div class="searchInfo">
            <h2>Login with existing username</h2>
                <div class="userForm">
                    <form action="profile.php" method="post" id="loginform" >
                        <div class="textfield">
                            <label for="userlogin">User Name</label>
                            <input type="text" name="userlogin" id="userlogin" placeholder="User name">
                            <span id="userLoginError" class="error"></span>
                        </div>
                        <div class="textfield">
                            <label for="pass">Password</label>
                            <input type="password" name="userPass" id="userPass" placeholder="Password">
                            <span id="userPassError" class="error"></span>
                        </div>
                        <button type="submit">Login In</button>
                    </form>
                    <a href="register.php" class="loginlink">Don't have an account? Sign-Up</a>
                </div>
        </div>
    </div>
</body>
</html>