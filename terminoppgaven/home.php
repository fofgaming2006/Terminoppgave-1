<?php
//Connects with php sites
session_start(); // Starter en PHP økt for å lagre variabler på tvers av sider
include("connections.php"); // Inkluderer filen som håndterer databaseforbindelsen
include("functions.php"); // Inkluderer filen som inneholder nyttige funksjoner

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Cloudz</title>
</head>

<body class="body3" >
    <div class="header">
        <a href="login.php"><input class="logout-button" type="submit" name="submit" value="LogOut"></a>
    </div>

    <div class="welcome-box">
        <!--Show's ur username when you're logged in-->
        <h1 class="title">Whatsup, <?php echo $_SESSION['Username'] ?>!</h1>
    </div>

    <br><br>

    <div class="chat-others">
        <h1 class="title">Chat with others!</h1>
    </div>

    <!--Registered users-->
    <div class="user_wrap">
        <?php
        // Henter alle brukere fra databasen og viser dem som lenker til chat-siden
        $query = "SELECT * FROM users";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            /*print_r($row);*/
            // Sjekker om brukeren ikke er den samme som den som er logget inn
            if ($row['Username'] != $_SESSION['Username']){
                // Viser en lenke til chat-siden med brukerens ID som en parameter
                echo '<a href="chat.php?id=', $row['ID'],'"> <div class="user_box">', $row['Username'], '</div></a>';
            }
        }
        ?>
    </div>

</body>
</html>
