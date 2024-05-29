<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/form.css">
    <title>game</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <form method="post" action="sauth.php">
        <h2>signup</h2>
        <label>username</label>
        <input name="username" type="text" required>
        <label>password</label>
        <input name="password" type="password" required>
        <button type="submit">submit</button>
    </form>
</body>
</html>