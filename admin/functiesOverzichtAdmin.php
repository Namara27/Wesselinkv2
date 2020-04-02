<?php
include_once('../DBconnection.php');
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <title>Evenementen</title>
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
    <div id="addFuncties">
        <a href="functiesOverzichtAdmin.php">Functies</a>
    </div>
    <div id="addEvent">
        <a href="addFunctieAdmin.php">Functie toevoegen</a>
    </div>
    <h3></h3>
    <form action="functieDeleteAdmin.php" method="post">
        <div id="overzichtHouder">
            <?php
            //Display the data in a table
            $query = $conn->query("SELECT rolID, naam, omschrijving FROM rol");
            print "<table class ='zenderoverzicht'>";
            print "<tr><th>Naam</th><th>Omschrijving</th><th></th><th></th></tr>";
            foreach ($query as $row) {
                print "<tr>";
                print "<td>" . $row['naam'] . "</td>";
                print "<td>" . $row['omschrijving'] . "</td>";
                print "<td>" . "<button onclick=\"window.location = 'functieDeleteAdmin.php';\" value='" . $row['rolID'] . "' name='functieDeleteKnop'>Verwijder</button>" . "</td>";
                print "<td>" . "<button onclick=\"window.location = 'functieDeleteAdmin.php';\" value='" . $row['rolID'] . "' name=''>Wijzig</button>" . "</td>";
                print "</tr>";
            }
            print "</table>";
            ?>
        </div>
    </form>
    <footer>
        <p>&copy;2019</p>
    </footer>
</div>
</body>
</html>