<?php
session_start(); // Starter en PHP-økt for å kunne håndtere sesjonsvariabler
include("connections.php"); // Inkluderer filen som håndterer database
include("functions.php"); // Inkluderer filen som inneholder nyttige funksjoner

$id = $_GET['id']; // Henter verdien for 'id' fra URL-parameteren
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="body4" >
    
<div class="header">
    <a href="login.php"><input class="logout-button" type="submit" name="submit" value="LogOut"></a>
</div>

<div class="wrapper-chat">
    <section class="users" >
        <header></header> <!-- En seksjon for brukere i chat, overskrift ikke spesifisert -->
    </section>
</div>

</body>
</html>
