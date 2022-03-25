<?php
class User {

    public function __construct($username) {
      $this->name = $username;
    }

    public function get_username() {
        return $this->username;
    }
}

session_start();

if 
(  
    isset($_SESSION['antwoord_1']) && 
    isset($_SESSION['antwoord_2']) && 
    isset($_SESSION['antwoord_3']) && 
    isset($_SESSION['antwoord_4']) && 
    isset($_SESSION['antwoord_5']) && 
    isset($_SESSION['antwoord_6']) && 
    isset($_SESSION['antwoord_7']) && 
    isset($_SESSION['antwoord_8']) && 
    isset($_SESSION['antwoord_9']) && 
    isset($_SESSION['antwoord_10']) 
)
{
    $antwoord_array = array (

        1  => array("vraag_1" , $_SESSION['antwoord_1'] ),
        2  => array("vraag_2" , $_SESSION['antwoord_2'] ),
        3  => array("vraag_3" , $_SESSION['antwoord_3'] ),
        4  => array("vraag_4" , $_SESSION['antwoord_4'] ),
        5  => array("vraag_5" , $_SESSION['antwoord_5'] ),
        6  => array("vraag_6" , $_SESSION['antwoord_6'] ),
        7  => array("vraag_7" , $_SESSION['antwoord_7'] ),
        8  => array("vraag_8" , $_SESSION['antwoord_8'] ),
        9  => array("vraag_9" , $_SESSION['antwoord_9'] ),
        10 => array("vraag_10" , $_SESSION['antwoord_10'] )
    );
    $antwoord__1 = $_SESSION['antwoord_1'];
    $antwoord__2 = $_SESSION['antwoord_2'];
    $antwoord__3 = $_SESSION['antwoord_3'];
    $antwoord__4 = $_SESSION['antwoord_4'];
    $antwoord__5 = $_SESSION['antwoord_5'];
    $antwoord__6 = $_SESSION['antwoord_6'];
    $antwoord__7 = $_SESSION['antwoord_7'];
    $antwoord__8 = $_SESSION['antwoord_8'];
    $antwoord__9 = $_SESSION['antwoord_9'];
    $antwoord__10 = $_SESSION['antwoord_10'];
}
else
{
    $antwoord_array = array (

        1 => array( 1, 0 ),
        2 => array( 2, 0 ),
        3 => array( 3, 0 ),
        4 => array( 4, 0 ),
        5 => array( 5, 0 ),
        6 => array( 6, 0 ),
        7 => array( 7, 0 ),
        8 => array( 8, 0 ),
        9 => array( 9, 0 ),
        10 => array( 10, 0 )
    );
    $antwoord__1 = 0;
    $antwoord__2 = 0;
    $antwoord__3 = 0;
    $antwoord__4 = 0;
    $antwoord__5 = 0;
    $antwoord__6 = 0;
    $antwoord__7 = 0;
    $antwoord__8 = 0;
    $antwoord__9 = 0;
    $antwoord__10 = 0;
}


function db()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "leergeld";
    
    // create connection
    $cn = new mysqli($servername, $username, $password, $db);
    
    return $cn;
}

function get_contact_info() {
    // db conn
    $conn = db();

    // sql: what data and where it should be stored, values are not set yet so ?,?,?
    $SELECT = "SELECT firstname From user Where firstname = ? Limit 1";
    $INSERT = "INSERT INTO user (`firstname`, `lastname`, `email`, `telephone_number`, `user_message`) VALUES (?, ?, ?, ?, ?)";

    //blueprint for the database (preparation)
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param('s', $firstname);
    $stmt->execute();
    $stmt->bind_result($firstname);
    $stmt->store_result();
    $rnum = $stmt->num_rows();

    // if there aren't any logins set yet or if it is not the same login only then it will store everything in the database
    if ($rnum == 0) {     
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssis", $firstname, $lastname, $email, $telephone_number, $user_message);
        $stmt->execute();
        // echo "A new record has been inserted succesfully.<br>";
    } else {
        # Error warning
        echo "These are already in use try to use something else.";
    }
    $stmt->close();
    $conn->close();
}

function get_question($question_id)
{
    $cn = db(); // connect to database

    $sql = "SELECT * FROM `question` WHERE `question_id` = " . $question_id; // sql question
    $result = $cn->query($sql); // call query

    if ($result->num_rows > 0) // if result as obj in num_rows > 0
    {
        while ($row = $result->fetch_assoc()) // create assoc array and put result in
        {
            $question = $row['question_id'] . ": " . $row['question'] . "<br>";
        }

        echo $question;
    }
    $cn->close(); // close connection
}

function insert_form($fname, $lname, $phone, $email, $message)
{
    $conn = db();
    
    $sql = "INSERT INTO contact_form (`contact_form_fname`,`contact_form_sname`, `contact_form_phone` ,`contact_form_email`,`contact_form_messige`)
    VALUES ( '". $fname ."', '". $lname ."', '". $phone ."', '". $email ."', '". $message ."')";
    
    if ($conn->query($sql) == TRUE) 
    {
        echo "New record created successfully";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}



function laat_vraag_zien($vraag_id)
{


    $cn = db(); // connect to database
    $sql = "SELECT * FROM `question` WHERE `question_id` = " . $vraag_id; // sql question
    $result = $cn->query($sql);

    if ($result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc()) // create assoc array and put result in
        {

            $question = $row['question_id'] . ": " . $row['question'] . "<br>";
                
            if ($vraag_id == 1 ||$vraag_id == 7 ) 
            {
                echo 
                '
                    <form method="get" action="quiz_questions.php">
                        <br><br>
                        Vraag'. $row['question_id'] .'/10 
                        <br><br> '. $row['question'] .' <br><br>
                        <input type="number" name="' . $vraag_id . '">
                        <br><br>
                        <input type="Submit">
                    </form> 
                    <form method="post">
                        <input type="submit" name="knop_min" value="vorige vraag" />
                        <input type="submit" name="knop_plus" value="vlogende vraag" />
                    </form>
                ';
            }    
            if ($vraag_id != 1 &&  $vraag_id != 5 && $vraag_id != 6 && $vraag_id != 7  &&  $vraag_id != 10) 
            {
                echo
                    '
                    <form method="get" action="quiz_questions.php">
                        <div>
                            <br><br>
                            Vraag'. $row['question_id'] .'/10 
                            <br><br> '. $row['question'] .' <br><br>
                            <input type="radio" id="A" name="' . $vraag_id . '" value="1">
                            <label for="A">ja</label><br>
                    
                            <input type="radio" id="B" name="' . $vraag_id . '" value="2">
                            <label for="B">nee</label><br>
                    
                            <input type="radio" id="C" name="' . $vraag_id . '" value="3">
                            <label for="C">soms</label><br>
                    
                            <input type="radio" id="D" name="' . $vraag_id . '" value="4">
                            <label for="D">beantwoord ik liever niet</label><br>
                        </div>
                        <input type="Submit" value="dit is mijn antwoord">
                    </form> 
                    <form method="post">
                        <input type="submit" name="knop_min" value="vorige vraag" />
                        <input type="submit" name="knop_plus" value="vlogende vraag" />
                    </form>
                    <br><br>
                    ';
            }
            if ($vraag_id == 5 || $vraag_id == 6) 
            {
                echo
                    '
                    <form method="get" action="quiz_questions.php">
                        <div>
                            <br><br>
                            Vraag'. $row['question_id'] .'/10 
                            <br><br> '. $row['question'] .' <br><br>
                            <input type="radio" id="A" name="' . $vraag_id . '" value="1">
                            <label for="A">ja</label><br>
                    
                            <input type="radio" id="B" name="' . $vraag_id . '" value="2">
                            <label for="B">nee</label><br>
                    
                            <input type="radio" id="D" name="' . $vraag_id . '" value="4">
                            <label for="D">beantwoord ik liever niet</label><br>
                        </div>
                        <input type="Submit" value="dit is mijn antwoord">
                    </form> 
                    <form method="post">
                        <input type="submit" name="knop_min" value="vorige vraag" />
                        <input type="submit" name="knop_plus" value="vlogende vraag" />
                    </form>
                    <br><br>
                    ';
            }
            if ($vraag_id == 10) 
            {
                echo 
                '
                <form method="get" action="quiz_questions.php">
                <br><br>
                <form action="" method="post">
                    <input value="verstuur" type="submit" name="stuur_vraag" />
                </form>

                <br><br>
                    
                </form> 
                <form method="post">
                    <input type="submit" name="knop_min" value="vorige vraag" />
                    <input type="submit" name="knop_plus" value="vlogende vraag" />
                </form>
                ';
            }    
            if ($vraag_id < 1 || $vraag_id > 11) 
            {
                echo 'error';
            }
                    
        }
    }
}

function insert_questions($name, $vraag_1, $vraag_2, $vraag_3, $vraag_4, $vraag_5, $vraag_6, $vraag_7, $vraag_8, $vraag_9)
{
    $conn = db();

    if ($name != "" && $vraag_1 != 0 && $vraag_2 != 0 && $vraag_3 != 0 && $vraag_4 != 0 && $vraag_5 != 0 && $vraag_6 != 0 && $vraag_7 != 0 && $vraag_8 != 0 && $vraag_9 != 0) 
    {
        $sql = "INSERT INTO `antwoorden`(`antwoord_id`, `antwoord_naam`, `antwoord_1`, `antwoord_2`, `antwoord_3`, `antwoord_4`, `antwoord_5`, `antwoord_6`, `antwoord_7`, `antwoord_8`, `antwoord_9`) 
        VALUES 
        ('". $name ."', ". $vraag_1 ." , ". $vraag_2 ." , ". $vraag_3 ." , ". $vraag_4 ." , ". $vraag_5 ." , ". $vraag_6 ." , ". $vraag_7 ." , ". $vraag_8 ." , ". $vraag_9 ." )";

        
       if ($conn->query($sql) == TRUE) 
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else 
    {
        echo "please fill everything in";
    }

}

// , $ans2, $ans3, $ans4, $ans5, $ans6, $ans7, $ans8, $ans9, $ans10
// , '". $ans2 ."', '". $ans3 ."', '". $ans4 ."', '". $ans5 ."', '". $ans6 ."', '". $ans7 ."', '". $ans8 ."', '". $ans9 ."', '". $ans10 ."'

// function insert_antwoord_s($antwoord_s = [])
// {
//     $conn = db();
    
//     $sql = "INSERT INTO antwoord_ (`antwoord_`) VALUES ( '". $antwoord_s ."')";
    
//     if ($conn->query($sql) == TRUE)
//     {
//         echo "New record created successfully";
//     } 
//     else 
//     {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }



?>