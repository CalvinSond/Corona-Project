<?php
session_start();
if (isset($_SESSION['gebruikersId'])) {
    include_once "../includes/dbh.inc.php";
    if (isset($_POST['uploadButton'])) {
        $gebruikersId = $_SESSION['gebruikersId'];
        $activiteitTitel = $_POST['titelInvoer'];
        $activiteitText = $_POST['textInvoer'];
        $activiteitUploaddatum = time();
        $activiteitLocatie = $_POST['locatieInvoer'];
        $activiteitOrganisator = $_POST['organisatorInvoer'];
        $activiteitLink = $_POST['linkInvoer'];

        $activiteitId = $_POST['activiteitId'];

        echo $gebruikersId, $activiteitTitel, $activiteitText, $activiteitUploaddatum, $activiteitLocatie, $activiteitOrganisator, $activiteitLink;

        $sql = 'UPDATE `activiteiten` SET `activiteitTitel` = ? , `activiteitInhoud` = ?, `activiteitLocatie` = ?, `activiteitOrganisator` = ?, `activiteitLink` = ? WHERE `activiteitId` = ?;';
        $stmt = mysqli_stmt_init($connection);
        echo $sql;
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../webpaginas/editor.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "sssssi", $activiteitTitel, $activiteitText, $activiteitLocatie, $activiteitOrganisator, $activiteitLink, $activiteitId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            header("Location: ../webpaginas/editor.php?upload=succes");
            exit();
        }
    } else {
        header("Location: ../webpaginas/index.php");
        exit();
    }
} else {
    header("Location: ../webpaginas/index.php");
    exit();
}