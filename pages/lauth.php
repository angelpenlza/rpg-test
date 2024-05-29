<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "ApDpVm14", "rpg");

    if($conn->connect_error) 
        exit("failed to connect: " . $conn->connect_error);

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $conn->query("SELECT userID, password FROM users WHERE username = '$username'");

    if($result->num_rows < 0) 
        exit("username does not exist");
    
    $logged_in = false;
    while($row = $result->fetch_assoc()) {
        if($row["password"] == $password) {
            session_regenerate_id();
            $_SESSION["loggedin"] = TRUE;
            $_SESSION["username"] = $username;
            $_SESSION["userID"] = $row["userID"];
            $logged_in = true;
            echo "logged in";
        }
    }

    if(!$logged_in) {
echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"../styles/main.css\">
    <link rel=\"stylesheet\" href=\"../styles/form.css\">
    <title>Document</title>
</head>
<body>";
    include 'nav.php';
 echo "<h2>login</h2>
    <form method=\"post\" action=\"lauth.php\">
        <label>username</label>
        <input name=\"username\" type=\"text\" required>
        <label>password</label>
        <input name=\"password\" type=\"password\" required>
        <p class=\"error\">incorrect username or password</p>
        <button type=\"submit\">submit</button>
    </form>
    <footer>don't have an account? <a class=\"sign\" href=\"signup.php\">signup here</a></footer>
    </body>
</html>";

    }
    else  { 
        mysqli_close($conn);
        header("location:index.php");
    }
?>