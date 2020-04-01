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
    <div id="addAccount">
        <a href="addAccountAdmin.php">Account toevoegen</a>
    </div>
    <div id="addFuncties">
        <a href="addFunctieAdmin.php">Functie toevoegen</a>
    </div>
    <div id="addEvent">
        <a href="addEventAdmin.php">Evenement toevoegen</a>
    </div>
    <div class="addEvent">
        <h1>Evenement aanmaken</h1>
        <form action="addEventFormAdmin.php" method="post">
            <label for="eventNaam">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="eventNaam" placeholder="Naam" id="eventNaam" required>
            <label for="eventOmschrijving">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="eventOmschrijving" placeholder="Omschrijving" id="eventOmschrijving">
            <label for="eventlocatie">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="eventlocatie" placeholder="Locatie" id="eventlocatie">
            <label for="eventDatum">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="eventDatum" placeholder="Datum jjjj-mm-dd" id="eventDatum">
            <input type="submit" value="Create" name="addEventKnop">
        </form>
    </div>
    <footer>
        <p>&copy;Kraeken</p>
    </footer>
</div>
</body>
</html>