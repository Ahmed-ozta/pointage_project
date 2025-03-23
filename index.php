<?php 
    include("database.php")

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet" >
    <title>Login</title>
</head>
<body>
    <div class="login">
        <div class="login_sub_container">
        <h1>Log in your account</h1>
        <form>
            <label for="username">username</label>
            <div class="input_field"><img src="icons\user_icon.svg"><input type="text" name="username" id="username" placeholder="Enter your username"></div>
            <label for="password">password</label>
            <div class="input_field"><img src="icons\lock_icon.svg"><input type="password" name="password" id="password" placeholder="Enter your password"><button type="button" id="button_view"></button></div>
            <input type="submit" name="submit" value="se connecter">
        </form>
        </div>
    </div>
    <script src="script.js"></script>
    
</body>
</html>