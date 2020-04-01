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
    <title>Accounts</title>
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
    <form action="zoekenAdmin.php" method="post">
        <div id="zoekVeld">
            <p>Zoek account</p>
            <input type="text" name="zoekInput"/>
            <input type="submit" value="Zoek" name="zoekKnop"/>
        </div>
    </form>
    <form action="accountDeleteAdmin.php" method="post">
        <div id="overzichtHouder">
            <?php
            //Display the data in a table
            $query = $conn->query("SELECT accountID, voornaam, tussenvoegsel, achternaam FROM account");
            print "<table class ='zenderoverzicht'>";
            print "<tr><th>Voornaam</th><th>Tussenvoegsel</th><th>Achternaam</th><th></th></tr>";
            foreach ($query as $row) {
                print "<tr>";
                print "<td>" . "<button onclick=\"window.location = 'indexAdmin.php';\" value='" . $row['accountID'] . "' name='accountDeleteKnop' hidden>Verwijder</button>" . "</td>";
                print "<td>" . $row['tussenvoegsel'] . "</td>";
                print "<td>" . '<input type="button" name="achternaamKnop" value="' . $row['achternaam'] . '"/>';
                print "<td>" . "<button onclick=\"window.location = 'accountDeleteAdmin.php';\" value='" . $row['accountID'] . "' name='accountDeleteKnop'>Verwijder</button>" . "</td>";
                print "</tr>";
            }
            print "</table>";
            ?>
        </div>
    </form>
    <footer>
        <p>&copy;Kraeken</p>
    </footer>
</div>
</body>
</html>