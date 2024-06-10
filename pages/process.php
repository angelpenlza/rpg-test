<?php 
 session_start();

 $conn = mysqli_connect("localhost", "root", "ApDpVm14", "rpg");

if($conn->connect_error) 
     exit("failed to connect: " . $conn->connect_error);
    
if(isset($_SESSION['loggedin'])) {
    $userID = $_SESSION["userID"];
    $value = $_POST['value'];
    if(isset($value)) {
        $result = $conn->query("SELECT userID FROM userscores WHERE userID = $userID");
        if($result->num_rows === 0) {
            $conn->query("INSERT INTO userScores (userID, wpm) VALUES ($userID, $value)");
        } else {
            $score = $conn->query("SELECT wpm FROM userScores WHERE userID = $userID");
            while($row = $score->fetch_assoc()) {
                $wpm = $row['wpm'];
                if($wpm < $value) {
                    $conn->query("UPDATE userScores SET wpm = $value WHERE userID = $userID");
                }
            } 
        }
        echo htmlspecialchars($value);
    } else {
        echo "wpm: --";
    }
}

?> 
