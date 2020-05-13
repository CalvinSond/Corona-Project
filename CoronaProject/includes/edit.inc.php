<?php
if (isset($_SESSION)) {
    if (isset($_POST['activiteitId'])) {

    } else {
        header("Location: ../webpaginas/index.php");
        exit();
    }
} else {
    header("Location: ../webpaginas/index.php");
    exit();
}