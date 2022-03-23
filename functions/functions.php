<?php
class User {

    public function __construct($firstname, $lastname) {
      $this->firstname = $firstname;
      $this->lastname = $lastname;

    }

    public function get_firstname() {
      return $this->firstname;
    }

    public function get_lastname() {
        return $this->lastname;
    }
}


function db()
{
    $sn = "localhost";
    $un = "root";
    $pw = "";
    $db = "leergeld";
    
    // create connection
    $cn = new mysqli($sn, $un, $pw, $db);
    
    return $cn;
}

function get_userinfo() {
    
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
            // output data of each row
            
        }
    }
    $cn->close(); // close connection
}
?>