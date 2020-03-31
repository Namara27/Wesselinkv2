<?php
include_once('../DBconnection.php');
session_start();

if (isset($_POST["addFunctieKnop"])) {
    $naam = $_POST['functieNaam'];
    $omschrijving = $_POST['functieOmschrijving'];

    //Check if username exists
    $query = "SELECT naam FROM rol WHERE naam = ?";

    $res = $conn->prepare($query);
    $res->execute([$naam]);

    if ($res->rowCount() > 0) {
        $error = "Name already exists";
    }

    //Creates a new account
    if (!isset($error)) {
        $sql = "INSERT INTO rol (naam, omschrijving) VALUES (?,?)";

        $result = $conn->prepare($sql);
        $result->execute([$naam, $omschrijving]);

        echo "<script>alert('Functie successfully created!'); window.location='addFunctieAdmin.php';</script>";
    } else {
        echo "<script>alert('$error '); window.location='addFunctieAdmin.php';</script>";
    }
}