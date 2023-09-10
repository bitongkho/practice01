<?php
require 'Connection.php';   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airforce</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <video muted autoplay loop>
        <source src="Login.mp4" type="video/mp4">
        <!-- <source src="movie.ogg" type="video/ogg"> -->
        
      </video>  
    <div class="contain">
        <div class="login">
            <h3>Login Page</h3>
            <input type="text"  placeholder="Name" class="inputT" id="">
            <input type="text"  placeholder="Password" class="inputT" id=""><br>
            <button class="btnL"><a href="content.php">Login</a></button>
            <p>You dont have account? register <a href="register.php">here!</a></p>
        </div>

    </div>
   
   

</body>
</html>