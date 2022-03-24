<?php
class User {

    public function __construct($username) {
      $this->name = $username;
    }

    public function get_username() {
        return $this->username;
    }
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
    $SELECT = "SELECT leergeld From user Where username = ? Limit 1";
    $INSERT = "INSERT INTO user (username, email, telephone_number, user_message) VALUES (?, ?, ?, ?)";

    //blueprint for the database (preparation)
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($firstname);
    $stmt->store_result();
    $rnum = $stmt->num_rows();

    // if there aren't any logins set yet or if it is not the same login only then it will store everything in the database
    if ($rnum == 0) {     
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssss", $username, $email, $telephone_number, $user_message);
        $stmt->execute();
        echo "A new record has been inserted succesfully.";
    } else {
        # Error warning
        echo "These are already in use try to use something else.";
    }
    
    $stmt->close();
    $conn->close();
}

function get_question($question_id)
{
    // $question_id = 1;
    $cn = db(); // connect to database

    $sql = "SELECT * FROM `question` WHERE `question_id` = " . $question_id; // sql question
    $result = $cn->query($sql); // call query

    if ($result->num_rows > 0) // if result as obj in num_rows > 0
    {

        while ($row = $result->fetch_assoc()) // create assoc array and put result in
        {
            $question = $row['question_id'] . ": " . $row['question'] . "<br>";
            echo $question;
        }
    }
    $cn->close(); // close connection
}
?>