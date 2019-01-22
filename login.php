<?php
session_start();

//Require database in this file
require_once "includes/database.php";

//Check if post isset
if (isset($_SESSION['login'])) {
    header("Location:view.php");
    exit;
}

//If form is posted, lets validate!
if (isset($_POST['submit'])) {
    //Retrieve values (email safe for query)
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];
    //Get password & name from DB
    $query = "SELECT id, password FROM users
              WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    //Check if email exists in database
    $errors = [];
    if ($user) {
        //Validate password
        if (password_verify($password, $user['password'])) {
            //Set email for later use in Session
            $_SESSION['login'] = [
                'name' => $user['name'],
                'id' => $user['id']
            ];
            //Redirect to view.php & exit script
            header("view.php");
            exit;
        } else {
            $errors[] = 'Uw wachtwoord is onjuist';
        }
    } else {
        $errors[] = 'Uw email komt niet voor in de database';
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="De kapperszaak waar je haar geknipt moet worden">
        <meta name="keywords" content="haar, kapper, Antoinette, professioneel">
        <meta name="author" content="Michel Li">
        <title>Alexandra's Haarmode | Home</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/animate.css">
        <link rel="icon" type="image/png" href="./img/logo_alexandra.png">
    </head>
    <body>
        <header>
            <div class="container">
                <div id="branding">
                    <h1><span class="highlight">Alexandra's</span> Haarmode</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="over ons.php">Over ons</a></li>
                        <li><a href="locatie.php">Locatie</a></li>
                        <li><a href="afspraak maken.php">Afspraak maken</a></li>
                        <li><a href="vacature.php">Vacature</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section id="newsletter">
            <div class="container">
                <h1>Subscribe To Our Newsletter</h1>
                <form action="">
                    <input type="email" value="email" placeholder="Enter Email....">
                    <button type="submit" name="submit" class="button_1">Send</button>
                </form>
            </div>
        </section>

        <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="email" >E-mail: </label><br>
            <input type="email" id="email" name="email" value="<?= isset($email) ? $email : '' ?>"> <br>

            <label for="firstname">Wachtwoord:</label> <br>
            <input type="password" id="password" name="password" > <br>

            <div class="data-submit">
                <input id ="sendButton" type="submit" name="submit" value="Login"/>
            </div>
        </form>

        <footer>
            <p>Alexandra's Haarmode, Copyright &copy; 2018</p>
        </footer>
    </body>
</html>











