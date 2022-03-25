<?php
require('functions/functions.php');

if (!isset($_SESSION['vraag_index_mem']) && !empty($_SESSION['vraag_index_mem'])) 
{
    $_SESSION['vraag_index_mem'] = 1;
}
elseif (!empty($_SESSION['vraag_index_mem'])) 
{
    $vraag_index = $_SESSION['vraag_index_mem'];
}
else 
{
    $_SESSION['vraag_index_mem'] = 1;
    $vraag_index = $_SESSION['vraag_index_mem'];
}

if (isset($_POST['knop_plus'])) 
{
    if($vraag_index < 10)
    {
        $vraag_index++;
    }
}
if (isset($_POST['knop_min'])) 
{
    if ($vraag_index > 1) {
        $vraag_index--;
    }
}
$naam = "kind";

$_SESSION['vraag_index_mem'] = $vraag_index;
?>


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

<body class="questions-div">
    <?php require 'inc/nav.php'; ?>

    <?php

laat_vraag_zien($antwoord_array[$vraag_index][0]);

if (isset($_GET[$antwoord_array[$vraag_index][0]])) {
    $antwoord_array[$vraag_index][1] = $_GET[$antwoord_array[$vraag_index][0]];

            $_SESSION['antwoord1'] = $antwoord_1; 
            $_SESSION['antwoord1'] = $antwoord_1; 
            $_SESSION['antwoord2'] = $antwoord_2;
            $_SESSION['antwoord3'] = $antwoord_3;
            $_SESSION['antwoord4'] = $antwoord_4;
            $_SESSION['antwoord5'] = $antwoord_5;
            $_SESSION['antwoord6'] = $antwoord_6;
            $_SESSION['antwoord7'] = $antwoord_7;
            $_SESSION['antwoord8'] = $antwoord_8;
            $_SESSION['antwoord9'] = $antwoord_9;
        }


        if(isset($_POST['stuur_vraag']))
        {
            insert_questions(
            $naam ,
            $antwoord_array[1][1] ,
            $antwoord_array[2][1] ,
            $antwoord_array[3][1] ,
            $antwoord_array[4][1] ,
            $antwoord_array[5][1] ,
            $antwoord_array[6][1] ,
            $antwoord_array[7][1] ,
            $antwoord_array[8][1] ,
            $antwoord_array[9][1]);
        
            unset($_SESSION['antwoord1']);
            unset($_SESSION['antwoord2']);
            unset($_SESSION['antwoord3']);
            unset($_SESSION['antwoord4']);
            unset($_SESSION['antwoord5']);
            unset($_SESSION['antwoord6']);
            unset($_SESSION['antwoord7']);
            unset($_SESSION['antwoord8']);
            unset($_SESSION['antwoord9']);
        
            $antwoord_array[1][1] = 0; 
            $antwoord_array[2][1] = 0;
            $antwoord_array[3][1] = 0;
            $antwoord_array[4][1] = 0;
            $antwoord_array[5][1] = 0;
            $antwoord_array[6][1] = 0;
            $antwoord_array[7][1] = 0;
            $antwoord_array[8][1] = 0;
            $antwoord_array[9][1] = 0;
        }
        if(!isset($_POST['sendQuestions']))
        {
            echo '<br><br> vull alsjeblieft alles in'; 
        }




    /*
    echo $antwoord_array[1][0] . '  ' . $antwoord_array[1][1] . '<br>' ;
    echo $antwoord_array[2][0] . '  ' . $antwoord_array[2][1] . '<br>' ;
    echo $antwoord_array[3][0] . '  ' . $antwoord_array[3][1] . '<br>' ;
    echo $antwoord_array[4][0] . '  ' . $antwoord_array[4][1] . '<br>' ;
    echo $antwoord_array[5][0] . '  ' . $antwoord_array[5][1] . '<br>' ;
    echo $antwoord_array[6][0] . '  ' . $antwoord_array[6][1] . '<br>' ;
    echo $antwoord_array[7][0] . '  ' . $antwoord_array[7][1] . '<br>' ;
    echo $antwoord_array[8][0] . '  ' . $antwoord_array[8][1] . '<br>' ;
    echo $antwoord_array[9][0] . '  ' . $antwoord_array[9][1] . '<br>' ;
    */
    ?>

    
    <?php require 'inc/footer.php'; ?>
</body>

</html>