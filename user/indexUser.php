<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Homepage</title>
</head>
<body>
<div id="wrapper">
    <header>
        <nav>
            <ul>
                <li><a href="indexUser.php">Home</a></li>
                <li><a href="evenementenUser.php">Evenementen</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Profiel</a></li>
                <li><a href="../logout.php">Loguit</a></li>
            </ul>
        </nav>
    </header>
    <div id="picHolder">
        <img src="../img/evenement.jpg" alt="evenement">
    </div>
    <footer>
        <p>&copy; Kraeken</p>
    </footer>
</div>
</body>
</html>