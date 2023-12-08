<?php

session_start(); // Starter en PHP økt 

session_unset(); // Frigjør alle sesjonsvariabler, beholder sesjonen aktiv

session_destroy(); // Ødelegger selve sesjonen, sletter alle data knyttet til sesjonen

header("Location: login.php"); // Sender deg til logg inn-siden etter å ha avsluttet sesjonen

?>
