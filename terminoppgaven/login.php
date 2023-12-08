<?php
session_start(); // Starter en PHP økt for å lagre variabler på tvers av sider
include("connections.php"); // Inkluderer filen som håndterer databaseforbindelsen
//include("functions.php"); // Kommentert ut, ikke i bruk

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Log In</title>
</head>

<body class="body1" >
    <!-- A login site -->
    <form class="form" method="post" action="login.php">
        <div class="container">
            <h1 class="title">Log-In</h1>
            <!---<?php print_r($_SESSION); ?>---> <!-- Kommentert ut, viser sesjonsdata -->
            <input class="username" type="username" placeholder="Username" name="username" required><br>
            <input class="password" type="password" placeholder="Password" name="password" required>
            <input class="button" type="submit" name="submit" value="LogIn">
            <p class="form_text">
                <a href="signup.php" class="form_link">Don't Have An Account? Signup now</a>
            </p>
        </div>
    </form>

    <?php

    //session_start(); // Kommentert ut, allerede startet økten øverst
    //Connects with php sites
    include("connections.php"); // Inkluderer filen som håndterer databaseforbindelsen
    include("functions.php"); // Inkluderer filen med funksjoner (kommentert ut, men kan bli brukt senere)

    // Able to login with username and password
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = ($_POST['password']);

        // Connects to database
        $con = mysqli_connect('localhost', 'root', '', 'terminoppgave')
            or die('Error connecting to MYSQL server.');

        $query = "SELECT * from users where username='$username' and password='$password'";

        $result = mysqli_query($con, $query)
            or die('Error querying database.');

        // Disconnects from database  
        mysqli_close($con);

        if ($result->num_rows > 0) {
            $user_data = mysqli_fetch_assoc($result);
            //if (password_verify(md5($password), $user_data['Password'])) { // Kommentert ut, kan bli brukt til passordhåndtering
            print_r($user_data);
            $_SESSION = $user_data;
            print_r($_SESSION);
            header('location: home.php'); // Omdirigerer til hjemmesiden etter vellykket innlogging
            die;
            //}
           
        } else {
            // Not Valid login
            header('location:failed.php'); // Omdirigerer til en feilsiden ved ugyldig innlogging
        }
    }
    ?>

</body>

</html>
