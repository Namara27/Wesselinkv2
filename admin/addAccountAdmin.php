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
                <li><a href="">Accounts</a></li>
                <li><a href="addAccountAdmin.php">Beheer</a></li>
                <li><a href="">Profiel</a></li>
                <li><a href="../logout.php">Loguit</a></li>
            </ul>
        </nav>
    </header>
    <div id="addAccount">
        <a href="addAccountAdmin.php">Account toevoegen</a>
    </div>
    <div id="addFuncties">
        <a href="addFunctieAdmin.php">Functie toevoegen</a>
    </div>
    <div id="addEvent">
        <a href="addEventAdmin.php">Evenement toevoegen</a>
    </div>
    <div class="addAccount">
        <h1>Account aanmaken</h1>
        <form action="addAccountFormAdmin.php" method="post">
            <label for="regUsername">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="regUsername" placeholder="Naam" id="regUsername" required>
            <label for="regTussenvoegsel">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="regTussenvoegsel" placeholder="Tussenvoegsel" id="regTussenvoegsel">
            <label for="regAchternaam">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="regAchternaam" placeholder="Achternaam" id="regAchternaam" required>
            <label for="regPassword">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="regPassword" placeholder="Wachtwoord" id="regPassword" required>
            <label for="regRepeatPassword">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="regRepeatPassword" placeholder="Wachtwoord herhalen" id="regRepeatPassword" required>
            <input type="submit" value="Create" name="addAccountKnop">
        </form>
    </div>
    <footer>
        <p>&copy;Kraeken</p>
    </footer>
</div>
</body>
</html>