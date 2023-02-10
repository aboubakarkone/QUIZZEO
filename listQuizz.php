<?php

// collect all the quizz from the database
require_once "database.php";
$sql = "SELECT * FROM quizz";
$result = mysqli_query($conn, $sql);
$quizz = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Quizz</title>
</head>
<body>
    <h1>Voici la liste des quizz disponibles</h1>
    <?php
    foreach ($quizz as $q) {
        echo "<h2>" . $q["titreQuizz"] . "</h2>";
        echo "<p>" . $q["difficulteQuizz"] . "</p>";
        echo "<p>" . $q["date_creationQuizz"] . "</p>";
        echo "<a href='quizz.php?id=" . $q["idQuizz"] . "'>Start the quizz</a>";
    }





    ?>
</body>
</html>

