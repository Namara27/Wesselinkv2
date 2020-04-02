<?php
require_once('../DBconnection.php');
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login.html');
    exit;
}

if (isset($_POST['functieDeleteKnop'])) {
    $id = $_POST['functieDeleteKnop'];

    $sql = "DELETE FROM rol WHERE rolID = ? ";
    $query = $conn->prepare($sql);
    $result = $query->execute(array($id));

    header("location: functiesOverzichtAdmin.php");
}

if (isset($_POST['functieWijzigKnop'])) {
    $naam = $_POST['functieNaamWijzig'];
    $omschrijving = $_POST['functieOmschrijvingWijzig'];
    $id = $_POST['functieWijzigKnop'];

    $sql = "UPDATE rol SET naam = ?, omschrijving = ? WHERE rolID = ? ";
    $query = $conn->prepare($sql);
    $result = $query->execute(array($naam, $omschrijving, $id));

    header("location: functiesOverzichtAdmin.php");
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
    <div id="addFuncties">
        <a href="functiesOverzichtAdmin.php">Functies</a>
    </div>
    <div id="addEvent">
        <a href="addFunctieAdmin.php">Functie toevoegen</a>
    </div>
    <div class="addFunctie">
        <h1>Wijzig functie</h1>
        <form action="functieDeleteAdmin.php" method="post">
            <?php
            $query = $conn->query("SELECT rolID, naam, omschrijving FROM rol");
            foreach ($query as $row) {
                print "<label for='functieNaamWijzig'><i class='fas fa-user'></i></label>";
                print "<input type='text' name='functieNaamWijzig' value='" . $row['naam'] . "' id='functieNaamWijzig'>";
                print "<label for='functieOmschrijvingWijzig'><i class='fas fa-user'></i></label>";
                print "<input type='text' name='functieOmschrijvingWijzig' value='" . $row['omschrijving'] . "' id='functieOmschrijvingWijzig'>";
                print "<button onclick=\"window.location = 'functieDeleteAdmin.php';\" value='" . $row['rolID'] . "' name='functieWijzigKnop'>Wijzig</button>";
            }
            ?>
        </form>
    </div>
    <footer>
        <p>&copy;2019</p>
    </footer>
</div>
</body>
</html>
