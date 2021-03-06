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
                <li><a href="indexUser.php">Home</a></li>
                <li><a href="evenementenUser.php">Evenementen</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Profiel</a></li>
                <li><a href="../logout.php">Loguit</a></li>
            </ul>
        </nav>
    </header>
    <form action="zoekenUser.php" method="post">
        <div id="zoekVeld">
            <p>Zoek evenement</p>
            <input type="text" name="zoekInput"/>
            <input type="submit" value="Zoek" name="zoekKnop"/>
        </div>
    </form>
    <form action="" method="post">
        <div id="overzichtHouder">
            <?php
            if (isset($_POST["zoekKnop"])) {
                $test = $_POST['zoekInput'];

                $query = $conn->query("SELECT datum, evenementNaam, locatie FROM evenementen WHERE evenementNaam LIKE '%" . $test . "%' ");
                print "<table class ='zoekoverzicht'>";
                print "<tr><th>Datum</th><th>Evenement naam</th><th>Locatie</th></tr>";
                foreach ($query as $row) {
                    print "<tr>";
                    print "<td>" . $row['datum'] . "</td>";
                    print "<td>" . $row['evenementNaam'] . "</td>";
                    print "<td>" . $row['locatie'] . "</td>";
                    print "</tr>";
                }
                print "</table>";
            }
            ?>
        </div>
    </form>
    <footer>
        <p>&copy;2019</p>
    </footer>
</div>
</body>
</html>

