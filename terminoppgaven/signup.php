<?php $error = ""; ?> <!-- Initialiserer en variabel for feilmeldinger -->

<?php
include("connections.php");

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = ($_POST['password']);
    $conpassword = ($_POST['confirmPassword']);
    $email = $_POST['email'];

    // Sjekker om brukernavn eller e-post allerede eksisterer i databasen
    $check_username = mysqli_query($con, "SELECT * FROM users WHERE username ='$username'");
    $check_dupe = mysqli_query($con, "SELECT * FROM users WHERE email ='$email'");

    // Håndterer tilfeller der brukernavn eller e-post allerede eksisterer
    if (mysqli_num_rows($check_username) > 0) {
        $error = "<div class='fail'> Username Already In Use </div>";
    } else if (mysqli_num_rows($check_dupe) > 0) {
        $error = "<div class='fail'> Email Already In Use </div>";
    } else {
        $error = array(); // Initialiserer et array for feilmeldinger

        // Sjekker om feltene for brukernavn, e-post og passord er tomme
        if (empty($username)) {
            $error['1'] = "Enter Username";
        } else if (empty($email)) {
            $error['1'] = "Enter Email Address";
        } else if (mysqli_num_rows($check_username) > 0) {
            $error['1'] = "Username already exist";
        } else if (mysqli_num_rows($check_dupe) > 0) {
            $error['1'] = "Email Address already exist";
        } else {
            // Kobler til databasen
            $con = mysqli_connect('localhost', 'root', 'admin', 'terminoppgave')
                or die('Error connecting to MySQL server.');

            // Sjekker om passordene stemmer overens
            if ($conpassword == $password) {
                // Setter opp SQL-spørringen for å sette inn brukeren i databasen
                $query = "INSERT INTO users(username, password, email) VALUES ('$username','$password', '$email')";

                $result = mysqli_query($con, $query)
                    or die('Error querying database.');

                mysqli_close($con); // Lukker databasetilkoblingen

                if ($result) {
                    // Vellykket registrering - omdirigerer til logg inn-siden
                    $_SESSION = array("red", "green");
                    header("Location: login.php");
                } else {
                    // Mislykket registrering
                    echo "Something went wrong, please try again!";
                }
            } else {
                $error = '<div class="fail"> Password does not match </div>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Register</title>
</head>

<body class="body2" >

    <form class="form" method="post" id="login">
        <div class="container">
            <h1 class="title">Create An Account</h1>
            <!-- Viser eventuelle feilmeldinger -->
            <?php echo $error; ?>
            <input class="name" type="username" placeholder="Name" id="username" name="username" required><br>
            <input class="email" type="email" placeholder="Email" id="email" name="email" required><br>
            <input class="password" type="password" placeholder="Password" id="password" name="password" required><br>
            <input class="password" type="password" placeholder="Confirm Password" name="confirmPassword" required>
            <link rel="stylesheet" href="">
            <input class="button" type="submit" name="submit" value="Create">
            <p class="form_text">
                <a href="login.php" class="form_link">Already have an account? Log in</a>
            </p>
        </div>
    </form>

</body>
</html>
