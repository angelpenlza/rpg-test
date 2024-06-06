<?php 
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
        $conn = mysqli_connect("localhost", "root", "ApDpVm14", "rpg");
    }
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
    <link rel="stylesheet" href="../styles/type.css">
    <title>game</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <h2>typing game</h2>
    <div class="typing-menu"> 
        <button class="refresh" id="refresh">⟳</button><div class="space"></div>
        <h3 class="timer">time: </h3><h3 class="timer" id="timer"></h3>
    </div>  
    <p class="words" id="words"></p>
    <div class="lower">
        <input class="user" type="text" id="myWord">
        <div class="wpm" id="wpm"></div><div class="accuracy" id="accuracy"></div>
    </div>
    <a href="typev2.php">v2</a>
    <script src="../logic/type.js"></script>
</body>
</html>