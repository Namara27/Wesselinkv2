<?php
include_once('../DBconnection.php');
session_start();

if (isset($_POST["addEventKnop"])) {
    $naam = $_POST['eventNaam'];
    $omschrijving = $_POST['eventOmschrijving'];
    $locatie = $_POST['eventlocatie'];
    $datum = $_POST['eventDatum'];

    //Check if username exists
    $query = "SELECT evenementNaam FROM evenementen WHERE evenementNaam = ?";

    $res = $conn->prepare($query);
    $res->execute([$naam]);

    if ($res->rowCount() > 0) {
        $error = "Name already exists";
    }

    //Creates a new account
    if (!isset($error)) {
        $sql = "INSERT INTO evenementen (evenementNaam, omschrijving, locatie, datum) VALUES (?,?,?,?)";

        $result = $conn->prepare($sql);
        $result->execute([$naam, $omschrijving, $locatie, $datum]);

        echo "<script>alert('Evenement successfully created!'); window.location='addEventAdmin.php';</script>";
    } else {
        echo "<script>alert('$error '); window.location='addEventAdmin.php';</script>";
    }
}