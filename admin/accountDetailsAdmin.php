<?php
include_once('../DBconnection.php');
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login.html');
    exit;
}

//Delete a row
if (isset($_POST['accountDeleteKnop'])) {
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
    <div class="profiel">
        <?php
        $query = $conn->query("SELECT voornaam, tussenvoegsel, achternaam, email, telefoon FROM account WHERE accountID = " . $_POST['accountDetailsKnop'] . " ");
        foreach ($query as $row) {
            print "<h1>" . $row['voornaam'] . " " . $row['tussenvoegsel'] . " " . $row['achternaam'] . "</h1>";
            print "<form action='accountDetailsAdmin.php' method='post'>";

            print "<label for='accountvoornaam'>Voornaam: </label>";
            print "<input type='text' name='accountvoornaam' value='" . $row['voornaam'] . "' id='accountvoornaam'>";

            print "<label for='accounttussenvoegsel'>Tussenvoegsel: </label>";
            print "<input type='text' name='accounttussenvoegsel' value='" . $row['tussenvoegsel'] . "' id='accounttussenvoegsel'>";

            print "<label for='accountachternaam'>Achternaam: </label>";
            print "<input type='text' name='accountachternaam' value='" . $row['achternaam'] . "' id='accountachternaam'>";

            print "<label for='accountemail'>E-mail: </label>";
            print "<input type='text' name='accountemail' value='" . $row['email'] . "' id='accountemail'>";

            print "<label for='accountnummer'>Telefoonnummer: </label>";
            print "<input type='text' name='accountnummer' value='" . $row['telefoon'] . "' id='accountnummer'>";

            print "<button onclick=\"window.location = 'accountDetailsAdmin.php';\" value='' name='accountWijzigKnop'>Wijzig</button>";
        }

        //Update a row
        if (isset($_POST['accountWijzigKnop'])) {
            $voornaam = $_POST['accountvoornaam'];
            $tussenvoegsel = $_POST['accounttussenvoegsel'];
            $achternaam = $_POST['accountachternaam'];
            $email = $_POST['accountemail'];
            $nummer = $_POST['accountnummer'];

            $sql = "UPDATE account SET voornaam = ?, tussenvoegsel = ?, achternaam = ?, email = ?, telefoonnummer = ? WHERE accountID = " . $_POST['accountDetailsKnop'] . " ";
            $query = $conn->prepare($sql);
            $result = $query->execute(array($voornaam, $tussenvoegsel, $achternaam, $email, $nummer));

            header("location: accountDetailsAdmin.php");
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