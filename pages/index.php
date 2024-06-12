<?php 
    if(session_status() == PHP_SESSION_NONE)
        session_start();
    
    if(isset($_SESSION["loggedin"])) {
        $username = $_SESSION["username"];
        $loggedin = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <title>games</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <h2>welcome<?php if(isset($_SESSION["loggedin"])) echo ", $username!"; else echo "!" ?> </h2>
    <a class="game" href="aimv2.php">black tile, don't tap it</a>
    <a class="game" href="typev2.php">gorillatype</a>
    <a class="game" href="other.php">worm</a>
    
</body>
</html>