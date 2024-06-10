<?php 
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
        $conn = mysqli_connect("localhost", "root", "ApDpVm14", "rpg");
        
    }
    $loggedin = false;
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
    <?php   
        if($loggedin): ?>
        <?php $result = $conn->query("SELECT wpm FROM userscores WHERE userID = $userID"); ?>
        <div class="scores">
                <h2><?php echo $username ?>'s top scores</h2>
                <h3>WPM: <?php
                    if($result->num_rows < 0)
                        echo "--";
                    else 
                        while($row = $result->fetch_assoc()) {
                            $wpm = $row["wpm"];
                            echo "wpm: " . $wpm;
                        }
                ?> </h3>
                <h3>Highest Score:</h3>
        </div>
    <?php else: ?>
        <h2><a href="login.php">log in</a> to save your stats<h2>
    <?php endif; ?>
</body>
</html>