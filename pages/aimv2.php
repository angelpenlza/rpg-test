<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/aimv2.css">
    <title>game</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <h2>don't click the black tiles</h2>
    <div class="menu">
        <select class="item" id="size">
            <option value="4">4x4</option>
            <option value="5">5x5</option>
            <option value="7">7x7</option>
        </select>
        <select class="item" id="numTiles">
            <option value="1">singles</option>
            <option value="3">triples</option>
        </select>
        <select class="item" id="userTime">
            <option value="15.00">15 secs</option>
            <option value="30.00">30 secs</option>
            <option value="10.00">endurance</option>
        </select>
    </div>
    <div id="tiles" class="tiles"></div>
    <div class="lower-menu">
        <h3 id="score" class="score">score: --</h3>
        <h3 id="timer" class="timer">time: 15.00</h3>
        <h3 id="start" class="start">start</h3>
    </div>
    <script src="../logic/aimv2.js"></script>
</body>
</html>