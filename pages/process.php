<h2>test</h2>
<?php 
 session_start();

 $conn = mysqli_connect("localhost", "root", "ApDpVm14", "rpg");

 if($conn->connect_error) 
     exit("failed to connect: " . $conn->connect_error);
    
     $username = $_POST["username"];
     $password = $_POST["password"];
     $userID = $_POST["userID"];

 if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['value'])) {
            if(isset($_SESSION['loggedin'])) {
                $conn->query("INSERT INTO userScores (wpm) VALUES ($_POST['value'])");
            }
            $value = $_POST['value'];

            
            echo "value: " . htmlspecialchars($value);
        } else {
            echo "no value yet";
        }
    } else {
        echo "no method";
    }
?> 
