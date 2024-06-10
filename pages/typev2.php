<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/type2.css">
    <title>game</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <h2>gorillatype</h2>
    <div class="type-menu">
        <button class="refresh" id="refresh">&#8634;</button>
        <h3 class="timer" id="timer">time: 30.00</h3>
    </div>
    <div class="words" id="words"></div>
    <div class="score">
        <input id="userInput" type="text">
        <h3 class="wpm" id="wpm">wpm: --</h3>
        <h3 class="acc" id="acc">accuracy: --</h3>
    </div>
    <script src="../logic/typev2.js"></script>
</body> 
</html>