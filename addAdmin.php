<?php
if (isset($_POST['submit'])) {
//Require database in this file
    require_once "includes/database.php";
//Postback with the data showed to the user, first retrieve data from 'Super global'
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password = PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);
//Special check for add form only
    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO users (email, password)
                  VALUES ('$email', '$password')";
        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);
        if ($result) {
            header('Location: view.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }
        //Close connection
        mysqli_close($db);
    }
}
?>

<!doctype html>
<html lang="en">
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
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="email" value=""/>
    <input type="password" name="password" value=""/>
    <input type="submit" name="submit" value="Verzenden"/>
</form>
</body>
</html>