<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/quiz-style.css">
    <title>Quiz</title>
</head>

<body>
    <?php require 'inc/nav.php'; ?>
    <div class="quiz-container">
        <h1 class="quiz-title">Quiz Pagina</h1>
        <h2> Hoi daar! </h2>
        <p class="p-quiz">Wij hebben een quiz gemaakt om erachter te komen wat je dagelijks doet.Nadat je deze quiz hebt
            gemaakt zien jij of je ouders hulp nodig hebben.</p>
        <p class="naam-start">Voordat je start willen wij je naam weten.</p>
        <div class="input-and-btn">
        <label for="input-name">Vul je naam in!</label>
          <input type="text" name="input-name" class="name-input">
          
          <button class="start-quiz-btn">Start quiz</button>
       </div>
    </div>
</body>

</html>