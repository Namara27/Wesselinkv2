<?php
require_once('../DBconnection.php');

if (isset($_POST['accountDeleteKnop'])) {
    echo 'adasd';
    $id = $_POST['accountDeleteKnop'];

    $sql = "DELETE FROM account WHERE accountID = ? ";
    $query = $conn->prepare($sql);
    $result = $query->execute(array($id));

    header("location: accountsAdmin.php");
}
