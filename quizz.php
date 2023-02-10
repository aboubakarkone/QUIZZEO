<?php

// creation of the class Choix with all the information about the answer

class Choix {
    public $idChoix;
    public $bonneReponse;
    public $mauvaiseReponse1;
    public $mauvaiseReponse2;
    public $mauvaiseReponse3;

    function __construct($idChoix, $bonneReponse, $mauvaiseReponse1, $mauvaiseReponse2, $mauvaiseReponse3)
    {
        $this-> idChoix = $idChoix;
        $this-> bonneReponse = $bonneReponse;
        $this-> mauvaiseReponse1 = $mauvaiseReponse1;
        $this-> mauvaiseReponse2 = $mauvaiseReponse2;
        $this-> mauvaiseReponse3 = $mauvaiseReponse3;
    }
}


// creation of the class Question with all the information about the question

class Question {
    public $idQuestion;
    public $intituleQuestion;
    public $idChoix;
    // list of choix Object (list of answers)
    public $choix;

    function __construct($idQuestion, $intituleQuestion, $choix)
    {
        $this-> idQuestion = $idQuestion;
        $this-> intituleQuestion = $intituleQuestion;
        $this-> idChoix = $choix;
    }
}


// creation of the class Quizz with all the information about the quizz

class Quizz {
    public $idQuizz;
    public $titreQuizz;
    public $difficulteQuizz;
    public $dateCreationQuizz;
    // list of question Object (list of questions)
    public $question = [];




    function __construct($id, $titre, $difficulte, $dateCreation){
        $this-> idQuizz = $id;
        $this-> titreQuizz = $titre;
        $this-> difficulteQuizz = $difficulte;
        $this-> dateCreationQuizz = $dateCreation;
    }
}

// collect all the information about the quizz who have the idQuizz = $_GET['id']

require_once 'database.php';
$sql = "SELECT * FROM quizz WHERE idQuizz = " . $_GET['id'];
$result = mysqli_query($conn, $sql);
$quizzInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);

// create a new quizz Object

$quizz = new Quizz($quizzInfo[0]['idQuizz'], $titreQuizz = $quizzInfo[0]['titreQuizz'], $difficulteQuizz = $quizzInfo[0]['difficulteQuizz'], $dateCreationQuizz = $quizzInfo[0]['date_creationQuizz']);

// collect all the information about the questions who have the idQuizz = $_GET['id']
// and put them on an Object Question
// and put all the Object Question in a list

$sql = "SELECT * FROM appartenir WHERE idQuizz = " . $_GET['id'];
$result = mysqli_query($conn, $sql);
$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

$listOfQuestion = [];

for($i = 0; $i < count($questions); $i++){
    $sql = "SELECT * FROM question WHERE idQuestion = " . $questions[$i]["idQuestion"];
    $result = mysqli_query($conn, $sql);
    $questionInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $question = new Question($questionInfo[0]["idQuestion"], $questionInfo[0]["intituleQuestion"], $questionInfo[0]["idChoix"]);
    array_push($listOfQuestion, $question);
}


// for each question, collect all the information about the answers who have the idChoix = $question->idChoix
// and put them on an Object Choix
// and put all the Object Choix in a list


for($i = 0; $i < count($listOfQuestion); $i++){
    $listOfChoix = [];
    $sql = "SELECT * FROM choix WHERE idChoix = " . $listOfQuestion[$i]->idChoix;
    $result = mysqli_query($conn, $sql);
    $choixInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $choix = new Choix($choixInfo[0]["idChoix"], $choixInfo[0]["bonne_reponse"], $choixInfo[0]["fausse_reponse1"], $choixInfo[0]["fausse_reponse2"], $choixInfo[0]["fausse_reponse3"]);
    // for each question, put the list of answers in the question Object
    $listOfQuestion[$i]->choix = $choix;
}

$quizz -> question = $listOfQuestion;

print_r($quizz -> question[0] -> choix -> mauvaiseReponse1)


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
</head>
<body>
    
</body>
</html>