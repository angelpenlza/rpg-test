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
    <link rel="stylesheet" href="../styles/profile.css">
    <title>game</title>
</head>
<body>
    <?php include 'nav.php' ?>

    
</body>
</html>