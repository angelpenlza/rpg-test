<?php 
    if(session_status() == PHP_SESSION_NONE)
        session_start(); 
?>
<link rel="stylesheet" href="../styles/navbar.css">
<h1>Game</h1>
<div class="navbar">
    <a class="menu-item" href="index.php">Play</a>
    <a class="menu-item" href="profile.php">Profile</a>
    <a class="menu-item" href="setting.php">Settings</a>
<?php 
    if(!isset($_SESSION["loggedin"])) 
        echo "<a class=\"menu-item\" href=\"login.php\">Login</a>";
    else 
        echo "<a id='logout' onclick=\"certain()\" class=\"menu-item\">Logout</a>";
?>
</div>
<script>
    function certain() {
        const logout = document.getElementById('logout');
        let choice = confirm('are you sure you want to log out?');
        if(choice) {
            logout.setAttribute('href', "logout.php");
        }
    }
</script>