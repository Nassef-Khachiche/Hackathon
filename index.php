<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script_home.js" defer></script>
    <title>Home</title>
</head>

<body>
    <?php require 'inc/nav.php'; ?>
    <?php include 'functions/functions.php'; ?>
    <div class="start-quiz-container">
        <h1>Stichting Leergeld</h1>
        <article>Doe nu mee aan onze quiz door op de knop the klikken!</article>
        <a href="quiz.php">Start Quiz</a>
    </div>
    <div id="pageJump"></div> 
    <p class="end-page-line"></p>
    <div class="about-container">
        <h1>Over Ons</h1>
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="assets/leergeld1.png" >
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="assets/leergeld2.jpg">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="assets/leergeld3.jpg" >
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>
    <article class="article-history">
        De eerste Stichting Leergeld werd opgericht in 1996. Dit was een initiatief van een aantal particulieren in
        Tilburg.<br /><br />
        Zij gaven financiële hulp aan gezinnen met leerplichtige kinderen die in armoede leefden. Zij betaalden
        bijvoorbeeld de schoolboeken of zorgden dat deze kinderen lid konden worden van een sportvereniging.<br /><br />
        Dit initiatief was zo’n succes dat het al snel navolging kreeg in andere steden. Inmiddels is Leergeld
        uitgegroeid tot een landelijke stichting met een groot aantal vestigingen.
    </article>
    <?php

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['telephone_number']) && isset($_POST['email']) && isset($_POST['user_message'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $phone = $_POST['telephone_number'];
    $email = $_POST['email'];
    $message = $_POST['user_message'];

    insert_form($fname, $lname, $phone, $email, $message);
}
?>
    <div class="contact-container">
        <form id="contact-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- get filepath of file -->
        <?php get_contact_info(); ?>    
            <h3>Vul het contactformulier hier in als u nog vragen heeft!</h3>
            <label for="fname">Voornaam</label>
            <input type="text" id="fname" name="firstname" placeholder="Jan" required />
            <!-- form will not post if empty field -->
            <label for="lname">Achternaam</label>
            <input type="text" id="lname" name="lastname" placeholder="Peters"/>
            <label for="tel">Telefoon nummer</label>
            <input type="number" id="tel" name="telephone_number" placeholder="123-456-789"/>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="jan@example.com"/>
            <label for="message">Bericht</label>
            <textarea id="message" name="user_message" placeholder="Typ iets.." style="height:200px"></textarea>
            <input type="submit" value="Verstuur">
        </form>
    </div>
    <?php require 'inc/footer.php'; ?>
</body>

</html>