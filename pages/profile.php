<?php 
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
        $conn = mysqli_connect("localhost", "root", "ApDpVm14", "rpg");
        
    }
    if(isset($_SESSION["loggedin"])) {
        $username = $_SESSION["username"];
        $userID = $_SESSION["userID"];
        $loggedin = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/profile.css">
    <title>game</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <h2><?php 
        if($loggedin) 
            echo "$username's top scores."; 
        else {
            echo "<a href='login.php'>log in</a> to save your stats";
        }
    ?></h2>
    <?php   
        $result = $conn->query("SELECT * FROM userScores WHERE userID = $userID");
        if($loggedin): ?>
        <div class="scores">
                <h3>WPM: <?php
                    if($result->num_rows < 0)
                        echo "--";
                    else 
                        echo $result->num_rows;
                ?> </h3>
                <h3>Highest Score:</h3>
        </div>
    <?php endif; ?>
    
</body>
</html>