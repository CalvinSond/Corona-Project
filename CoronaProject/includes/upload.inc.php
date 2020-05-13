<?php
if (isset($_POST['uploadButton'])) {
    require 'dbh.inc.php';
    $activiteitTitel = $_POST['titelInvoer'];
    $activiteitText = $_POST['textInvoer'];
    $tijd = time();
    if (empty($activiteitTitel) || empty($activiteitText)) {
        header("Location: ../webpaginas/editor.php?error=emptyfields");
    } else if (empty($activiteitTitel)) {
        header("Location: ../webpaginas/editor.php?error=emptyfields");
    } else if (empty($activiteitText)) {
        header("Location: ../webpaginas/editor.php?error=emptyfields");
    } else {
        $sql = "INSERT INTO activiteiten (activiteitId, gebruikersId, activiteitTitel, activiteitUploaddatum, activiteitInhoud, activiteitLocatie, activiteitOrganisator, activiteitLink) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../webpaginas/editor.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "isissss", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
        }

    }
} else {
    header("Location: ../webpaginas/index.php");
    exit();
}

//INSERT INTO activiteiten (activiteitId, gebruikersId, activiteitTitel, activiteitUploaddatum, activiteitInhoud, activiteitLocatie, activiteitOrganisator, activiteitLink) VALUES (NULL, 1, "Koenkies bakken", 1589314421, "Lorem Ipsum en kooktips", "Thuis",  , )
//INSERT INTO activiteiten (activiteitId, gebruikersId, activiteitTitel, activiteitUploaddatum, activiteitInhoud, activiteitLocatie, activiteitOrganisator, activiteitLink) VALUES (NULL, 1, "Gamen", 1589314327, "Lorem  Ipsum en nog wat random text", "Thuis", NULL, NULL)