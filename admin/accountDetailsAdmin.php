<?php
include_once('../DBconnection.php');
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login.html');
    exit;
}

//Delete a row
if (isset($_POST['accountDeleteKnop'])) {
    echo 'adasd';
    $id = $_POST['accountDeleteKnop'];

    $sql = "DELETE FROM account WHERE accountID = ? ";
    $query = $conn->prepare($sql);
    $result = $query->execute(array($id));

    header("location: accountsAdmin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <title>Account details</title>
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
    <form action="accountDetailsWijzigEmailAdmin.php" method="post">
        <div id="overzichtHouder">
            <?php
            if (isset($_POST["accountDetailsKnop"])) {
                $query = $conn->query("SELECT voornaam, tussenvoegsel, achternaam, email, telefoon FROM account WHERE accountID = " . $_POST['accountDetailsKnop'] . " ");
                print "<table class ='zenderoverzicht'>";
                foreach ($query as $row) {
                    print "<tr><th colspan='3'>" . $row['voornaam'] . " " . $row['tussenvoegsel'] . " " . $row['achternaam'] . "</th></tr>";
                    print "<tr>";
                    print "<td>E-mail:</td>";
                    print "<td>" . $row['email'] . "</td>";
                    print "<td>" . "<button onclick=\"window.location = 'accountDetailsWijzigEmailAdmin.php';\" value='" . $_POST['accountDetailsKnop'] . "' name='accountWijzigEmailKnop'>Wijzig</button>" . "</td>";
                    print "</tr>";
                    print "<tr>";
                    print "<tr>";
                    print "<td>Telefoon:</td>";
                    print "<td>" . $row['telefoon'] . "</td>";
                    print "<td>" . "<button onclick=\"window.location = 'accountDetailsWijzigNummerAdmin.php';\" value='" . $_POST['accountDetailsKnop'] . "' name='accountWijzigKnop'>Wijzig</button>" . "</td>";
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