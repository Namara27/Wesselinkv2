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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>Homepage</title>
</head>
<body>
<div id="wrapper">
    <header>
        <nav>
            <ul>
                <li><a href="indexAdmin.php">Home</a></li>
                <li><a href="evenementenAdmin.php">Evenementen</a></li>
                <li><a href="accountsAdmin.php">Accounts</a></li>
                <li><a href="addAccountAdmin.php">Beheer</a></li>
                <li><a href="">Profiel</a></li>
                <li><a href="../logout.php">Loguit</a></li>
            </ul>
        </nav>
    </header>
    <div class="addFunctie">
        <h1>Wijzig E-mail</h1>
        <form action="wijzigEmailForm.php" method="post">
            <label for="email">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="email" placeholder="Email" id="email">
            <input type="submit" value="Wijzig" name="WijzigEmailKnop">
        </form>
    </div>
    <footer>
        <p>&copy;2019</p>
    </footer>
</div>
</body>
</html>