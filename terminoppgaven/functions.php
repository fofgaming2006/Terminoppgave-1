<?php

// Funksjon for å sjekke om en bruker er logget inn og hente brukerdata
function check_login($con){
    // Sjekker om brukerens ID er satt i økten (session)
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];

        // Henter brukerdata fra databasen basert på brukerens ID
        $query = "SELECT * FROM users WHERE id = '$id' limit 1 ";
        $result = mysqli_query($con, $query);

        // Sjekker om spørringen ble utført vellykket og om det er minst én rad med resultater
        if($result && mysqli_num_rows($result) > 0 ){
            // Henter brukerens data som en assosiativ array
            $user_data = mysqli_fetch_assoc($result);
            return $user_data; // Returnerer brukerdataene
        }
    }

    // Hvis brukeren ikke er logget inn, omdiriger til logg inn-siden og avslutt skriptet
    header("Location: login.php");
    die;
}
