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

function get_contact_info() {
    // db conn
    $conn = db();

    // sql: what data and where it should be stored, values are not set yet so ?,?,?
    $SELECT = "SELECT leergeld From user Where user_firstname = ? Limit 1";
    $INSERT = "INSERT INTO user (user_firstname, user_lastname, email) VALUES (?, ?, ?, ?)";

    //blueprint for the database (preparation)
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $firstname);
    $stmt->execute();
    $stmt->bind_result($firstname);
    $stmt->store_result();
    $rnum = $stmt->num_rows();

    // if there aren't any logins set yet or if it is not the same login only then it will store everything in the database
    if ($rnum == 0) {     
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sss", $firstname, $lastname, $email);
        $stmt->execute();
        echo "A new record has been inserted succesfully.";
    } else {
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
        if ($row = $result->fetch_assoc()) // create assoc array and put result in
        {
            // output data of each row
            $row[$question_id = 1];

            if (isset($_POST['answer'])) {
                $row[$question_id + 1];
            }
        }
    }
    $cn->close(); // close connection
}
?>