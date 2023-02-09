<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}

// Récuperer les données de l'utilisateur dans $user

require_once "database.php";
$email = $_SESSION["user"];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

// Detecter si un utilisateur clique sur le bouton "Liste des Quizz"

if (isset($_POST["listQuizz"])) {
    header("Location: listQuizz.php");
}

// Detecter si un utilisateur clique sur le bouton "Créer un Quizz"

if (isset($_POST["createQuizz"])) {
    // On vérifie que l'utilisateur a bien le droit de créer un quizz
    if ($user["roleUser"] == 2) {
        header("Location: createQuizz.php");
    }else{
        echo "<div class='alert alert-danger'>Vous n'avez pas le droit de créer un quizz</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="container1">
        <h1>Welcome to Quizzeo</h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
    <div class="description">
        <p>Bienvenue sur Quizzeo, le meilleur sit de Quizz du monde !</p>
        <p>Si vous êtes un simple utilisateur, cliquer sur list of Quizz pour accéder à la liste des différents quizz !</p>
        <p>Si vous êtes un quizzer, si vous souhaitez créer un quizz, cliquer sur create quizz !</p>
    </div>
    <form action="index.php" method="POST">
        <div class="container2">
            <div class="form">
                <input type="submit" value="Créer votre Quizz" name="createQuizz" class="btn btn-primary">
            </div>
            <div class="form">
                <input type="submit" value="Liste des Quizz" name="listQuizz" class="btn btn-primary">
            </div>
        </div>
    </form>

</body>
</html>