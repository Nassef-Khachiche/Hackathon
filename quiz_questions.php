<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/quiz-style.css">
    <script src="js/script.js" defer></script>
    <title>Quiz questions</title>
</head>

<body>
    <?php require 'inc/nav.php'; ?>
    <?php include 'functions/functions.php';?>
    <div class="container-question">
        <h1 class="question-count"> Vraag 1/12 </h1>
        <h2 class="dummy">
        
        <?php
        
        $q = $_GET["q"];
        
        if (isset($_POST['answer'])) {
            $q++;
        }

        get_question($_GET["q"]);

        ?>

        </h2>
        <form action="quiz_questions.php?q=1" method="POST">
            <input type="number" id="answer" class="answer">
            <input type="button" name="answer" value="Volgende vraag" class="btnSubmitQuestion">
        </form>
    </div>
</body>

</html>