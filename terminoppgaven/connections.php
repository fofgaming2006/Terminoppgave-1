<?php
// Database connection parameters
$dbhost = "localhost"; // Linknavn for databasen
$dbuser = ""; // Brukernavn for databasebrukeren
$dbpass = ""; // Passord for databasebrukeren
$dbbase = "terminoppgave"; // Databasenavn

// Forsøker å opprette en databaseforbindelse
if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbbase)) {
    die("Failed to connect!"); // En feilmelding hvis forbindelsen mislykkes
}
?>
