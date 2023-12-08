<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Log In</title>
</head>

 <!--Gir deg error om ikke vellykket logg-inn -->

<body class="body1" >
    <form class="form" method="post" action="login.php">
        <div class="container">
            <h1 class="title">Log-In</h1>
            <div class=" message_form message_form--error"></div>
            <input class="username" type="username" placeholder="Username" name="username" required><br>
            <input class="password" type="password" placeholder="Password" name="password" required>
            <p class="fail">Username or password was incorrect</p>
            <link rel="stylesheet" href="">
            <input class="signup-button" type="submit" name="submit" value="Logg inn">
            <p class="form_text">
                <a href="signup.php" class="form_link">Don't Have An Account? Sign in</a>
            </p>
        </div>
    </form>