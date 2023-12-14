<?php
// Database connection parameters
$dbhost = "localhost"; // Linknavn for databasen
$dbuser = "root"; // Brukernavn for databasebrukeren
$dbpass = "admin"; // Passord for databasebrukeren
$dbbase = "terminoppgave"; // Databasenavn

// Forsøker å opprette en databaseforbindelse
if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbbase)) {
    die("Failed to connect!"); // En feilmelding hvis forbindelsen mislykkes
}
?>
