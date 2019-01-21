<?php
if (isset($_POST['submit'])) {
//Require database in this file
    require_once "includes/database.php";

//Postback with the data showed to the user, first retrieve data from 'Super global'
    $behandeling_dame = mysqli_real_escape_string($db, $_POST['behandeling_dame']);
    $behandeling_heer = mysqli_real_escape_string($db, $_POST['behandeling_heer']);
    $behandeling_kind = mysqli_real_escape_string($db, $_POST['behandeling_kind']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $agreed = mysqli_real_escape_string($db, $_POST['agreed']);

//Require the form validation handling
  require_once "includes/form-validation.php";

//Special check for add form only
    if (empty($errors)) {

        //Save the record to the database
        $query = "INSERT INTO alexandras_haarmode (behandeling_dame, behandeling_heer, behandeling_kind, datum, email)
                  Values ('$behandeling_dame, $behandeling_heer, $behandeling_kind, $datum, $email')";
        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);
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
        <title>Alexandra's Haarmode | Afspraak Maken</title>
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
                        <li class="current"><a href="afspraak maken.php">Afspraak maken</a></li>
                        <li><a href="vacature.php">Vacature</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section id="newsletter">
            <div class="container">
                <h1>Subscribe To Our Newsletter</h1>
                <form>
                    <input type="email" placeholder="Enter Email....">
                    <button type="submit" class="button_1">Send</button>
                </form>
            </div>
        </section>

        <section id="main">
            <div class="container">
                <div class="content">
                    <form action="" id="afspraak" method="post">
                        <label for="behandeling_dame">Uw keuzes voor dame: </label>
                            <select name="behandeling_dame" id="behandeling_dame">
                                <option value="">Kies een optie</option>
                                <option value="Knippen_dames">Knippen</option>
                                <option value="Wassen, Knippen en Drogen_dame">Wassen, Knippen en Drogen</option>
                                <option value="Wassen, Knippen en Föhnen_dame">Wassen, Knippen en Föhnen</option>
                                <option value="Tondeuse_dame">Tondeuse</option>
                            </select>
                        <label for="behandeling_heer">Uw keuze voor heer: </label>
                            <select name="behandeling_heer" id="behandeling_heer">
                                <option value="">Kies een optie</option>
                                <option value="Knippen_heer">Knippen</option>
                            </select>
                        <label for="behandeling_kind">Uw keuze voor kind: </label>
                            <select name="behandeling_kind" id="behandeling_kind">
                                <option value="">Kies een optie</option>
                                <option value="Knippen_kind">Knippen</option>
                            </select>
                        <label>Voor andere behandelingen bel: 0181-416143</label>
                        <label for="date">Datum: </label>
                        <input type="date" name="afspraak" id="date">
                        <label for="time">Tijd: </label>
                            <select name="time" id="time">
                                <option value="">Kies een tijdsblok</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                            </select>
                        <label for="email">Email: </label>
                        <input type="text" name="email" id="email" placeholder="jan.jansen@gmail.com">
                        <label for="phone">Telefoonnummer: </label>
                        <input type="text" name="telefoonnummer" id="phone">
                        <input type="hidden" name="agreed" value="0">
                        <label for="agreed">Toestemming gegevensverwerking</label>
                        <input type="checkbox" name="agreed" value="akkoord" id="agreed">
                        <br>
                        <input class="knop_submit" type="submit" value="submit">
                    </form>
                </div>
            </div>
        </section>

        <footer>
            <p>Alexandra's Haarmode, Copyright &copy; 2018</p>
        </footer>
    </body>
</html>