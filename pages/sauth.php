<?php
    $conn = mysqli_connect("localhost", "root", "ApDpVm14", "rpg");
    if($conn->connect_error) 
        exit("failed to connect to server: " . $conn->connect_error);

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $conn->query("SELECT userID, password FROM users WHERE username = '$username'");

    if($result->num_rows > 0) {
        echo "<!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <link rel=\"stylesheet\" href=\"../styles/main.css\">
                <link rel=\"stylesheet\" href=\"../styles/form.css\">
                <title>game</title>
            </head>
            <body>";
            include 'nav.php';
        echo "<form method=\"post\" action=\"sauth.php\">
                    <h2>signup</h2>
                    <label>username</label>
                    <input name=\"username\" type=\"text\" required>
                    <label>password</label>
                    <input name=\"password\" type=\"password\" required>
                    <p class=\"error\">username already taken</p>
                    <button type=\"submit\">submit</button>
                </form>
            </body>
            </html>";
    } else {
        $result = $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password');");
        mysqli_close($conn);
        header("location:index.php");
    }

?>