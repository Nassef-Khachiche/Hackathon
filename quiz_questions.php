<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/quiz-style.css">
    <title>Quiz questions</title>
</head>

<body>
    <?php require 'inc/nav.php'; ?>
<<<<<<< Updated upstream
    <?php include 'function/functions.php'; ?>
    <div class="container-question">
        <h1 class="question-count"> Vraag 1/12 </h1>
        <?php //require 'functions/functions.php';
// get_question(1);
?>
        <h2 class="dummy"><?php get_question(1); ?></h2>
        <form action="quiz_questions.php" method="post">
            <input type="number" name="answer" id="answer" class="answer">
            <input type="submit" name="answer" value="Volgende vraag">
=======
    <?php include 'functions/functions.php'; ?>
    <div class="container-question">
        <h1 class="question-count"> Vraag 1/12 </h1>
        <h2 class="dummy"><?php get_question(0) ?></h2>
        <form action="quiz_questions.php" method="post">
            <input type="number" name="answer" id="answer" class="answer">
            <input type="button" value="Volgende vraag" name="answer" class="btnSubmitQuestion">
>>>>>>> Stashed changes
        </form>
    </div>
</body>
    
</html>