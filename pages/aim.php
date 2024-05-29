<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/grid.css">
    <title>game</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <h2>aim trainer</h2>
    <div class="grid">
        <div class="row">
            <div id="1" class="box"></div>
            <div id="2" class="box"></div>
            <div id="3" class="box"></div>
            <div id="4" class="box"></div>
        </div>
        <div class="row">
            <div id="5" class="box"></div>
            <div id="6" class="box"></div>
            <div id="7" class="box"></div>
            <div id="8" class="box"></div>
        </div>
        <div class="row">
            <div id="9" class="box"></div>
            <div id="10" class="box"></div>
            <div id="11" class="box"></div>
            <div id="12" class="box"></div>
        </div>
        <div class="row">
            <div id="13" class="box"></div>
            <div id="14" class="box"></div>
            <div id="15" class="box"></div>
            <div id="16" class="box"></div>
        </div>
        <div class="info">
            <h3 class="info-label">Score: </h3><h3 id="score" class="score"></h3>
            <h3 class="space"></h3>
            <h3 class="info-label">Time: </h3><h3 id="time" class="time"></h3>
        </div>
    </div>
    <button class="start" id="start">start</button>
    <script src="../logic/tiles.js"></script>
</body>
</html>