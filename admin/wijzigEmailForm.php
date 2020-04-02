<?php
include_once('../DBconnection.php');
include_once('accountDetailsAdmin.php');
session_start();

if (isset($_POST["WijzigEmailKnop"])) {
    $email = $_POST['email'];

    $sql = "UPDATE account SET email = ? FROM account WHERE accountID = " . $_POST['accountDetailsKnop'] . " ";
    $result = $conn->prepare($sql);
    $result->execute([$email]);

    echo "<script>alert('Email successfully updatded!'); window.location='accountDetailsAdmin.php.php';</script>";
} else {
    echo "<script>alert('Kan E-mail niet wijzigen'); window.location='accountDetailsWijzigEmailAdmin.php';</script>";
}
?>