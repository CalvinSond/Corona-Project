<?php
session_start();
if (isset($_SESSION)) {
    if (isset($_POST['deleteBtn'])) {
        require "dbh.inc.php";
        $activiteitId = $_POST['deleteBtn'];
        $sql = "DELETE FROM `activiteiten` WHERE activiteitId = '{$activiteitId}'";
        mysqli_query($connection, $sql);
        header("Location: ../webpaginas/overzicht.php?delete=succes");
        exit();
    }
    else{
        header("Location: ../webpaginas/overzicht.php?error");
        exit();
    }
} else{
    header("Location: ../webpaginas/overzicht.php?error");
    exit();
}