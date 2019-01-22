<?php
require_once "includes/database.php";

$query = "SELECT * FROM afspraken ORDER BY date_day, time ASC";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);

$afspraken = [];
while ($row = mysqli_fetch_assoc($result)) {
    $afspraken[] = $row;
}

mysqli_close($db);
?>
<!doctype html>
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
                        <li><a href="afspraak maken.php">Afspraak maken</a></li>
                        <li><a href="vacature.php">Vacature</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Behandeling Vrouwen</th>
                        <th>Behandeling Heren</th>
                        <th>Behandeling Kinderen</th>
                        <th>Datum</th>
                        <th>Tijd</th>
                        <th>E-mail Adres</th>
                        <th>Telefoonnummer</th>
                        <th>Akkoord</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($afspraken as $afspraak) { ?>
                        <tr>
                            <td><?= $afspraak['id']; ?></td>
                            <td><?= $afspraak['behandeling_dame']; ?></td>
                            <td><?= $afspraak['behandeling_heer']; ?></td>
                            <td><?= $afspraak['behandeling_kind']; ?></td>
                            <td><?php $inputDate = date_create($afspraak['date_day']);
                                echo $date_day = date_format($inputDate, 'd-m-Y')?></td>
                            <td><?= $afspraak['time']; ?></td>
                            <td><a href="mailto<?= $afspraak['email']; ?>"><?= $afspraak['email']; ?></a></td>
                            <td><a href="tel:<?= $afspraak['phone']; ?>"><?= $afspraak['phone']; ?></a></td>
                            <td><input type="checkbox" name="agreed" id="agreed" checked value"<?= $afspraak['agreed'] ?>"></td>
                            <td><a href="delete.php?id=<?= $afspraak['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <footer>
            <p>Alexandra's Haarmode, Copyright &copy; 2018</p>
        </footer>
    </body>
</html>
