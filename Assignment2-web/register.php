<?php 
//This page registers new users, data will be handles via post in new_user.php
//include html headers
include("headerboiler.html");
include ("headboiler.html"); 
?>
<body>
    <div class="display">
        <div class="searchInfo">
            <h2>Register as a new user</h2>
            <!-- Form to get values from user, data will be handled in the bakcend after submit -->
            <form action="new_user.php" method="post" id="register" onsubmit="return newUser()">
                <div class="textfield">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" placeholder="Email">
                    <span id="mailError" class="error"></span>
                </div>
                <div class="textfield">
                    <label for="login">User Name</label>
                    <input type="text" name="login" id="login" placeholder="User name">
                    <span id="loginError" class="error"></span>
                </div>
                <div class="textfield">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" placeholder="Password">
                    <span id="passError" class="error"></span>
                </div>
            
                <div class="textfield">
                    <label for="pass2">Re-type Password</label>
                    <input type="password" id="pass2" placeholder="Password">
                    <span id="pass2Error" class="error"></span>
                </div>
                <button type="submit">Create User</button>
                <a href="login.php" class="loginlink">Already have an account? Login</a>
            </form>
        </div>
    </div>  


   
</body>
</html>