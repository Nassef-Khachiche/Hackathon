<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/quiz-style.css">
    <link rel="shortcut icon" href="assets/logo.svg" type="image/x-icon">
    <script src="js/script.js" defer></script>
    <title>Quiz questions</title>
</head>

<body>
    <?php require 'inc/nav.php'; ?>
    <?php include 'functions/functions.php'; ?>
    <div class="container-question">
        <h1 class="question-count"> Vraag 1/10 </h1>
        <h2 class="dummy">Hoe oud ben je?</h2>
        <form action="quiz_questions.php" method="POST">
            <div class="elements">
            <input type="number" id="answer" class="answer">
            </div>
            <div class="buttonEnd">
            <input type="button" name="answer" value="Volgende vraag" class="btnSubmitQuestion">
            </div>
        </form>
    </div>
    <?php require 'inc/footer.php'; ?>
</body>

</html>