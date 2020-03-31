<?php
include_once('DBconnection.php');
session_start();

if (isset($_POST["login"])) {

    // Check the Login creds
    $sql = "SELECT * FROM account WHERE voornaam = ?";
    $result = $conn->prepare($sql);
    $result->execute(array($_POST['username']));
    $count = $result->rowCount();
    $res = $result->fetch(PDO::FETCH_ASSOC);
    if ($count == 1) {
        // Compare the password
        if (password_verify($_POST['password'], $res['wachtwoord'])) {
            // regenerate session id
            session_regenerate_id();
            $_SESSION['login'] = true;
            $_SESSION['accountID'] = $res['accountID'];

            //Check if its an admin/user
            switch ($res['permission']) {
                case 'admin':
                    header("location: admin/indexAdmin.php");
                    exit();

                case 'user':
                    header("location: user/indexUser.php");
                    exit();
            }

        } else {
            echo "<script>alert('Incorrect username or password'); window.location='login.html';</script>";
        }
    } else {
        echo "<script>alert('Incorrect username or password'); window.location='login.html';</script>";
    }
}
