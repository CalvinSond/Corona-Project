<?php
if (isset($_POST['activiteit'])) {
    require 'dbh.inc.php';
    $activiteitTitel = $_POST['activiteit'];
    $url = $_POST['url'];
    $sql = "SELECT * FROM activiteiten WHERE activiteitTitel = '{$activiteitTitel}'";

    $resultaat = mysqli_query($connection, $sql);
    $activiteit = mysqli_fetch_assoc($resultaat);

    if ($activiteitTitel == $activiteit['activiteitTitel']) {
        header("Location: ../webpaginas/index.php?result=toegestaan");
        exit();
    } else {
        header("Location: ../webpaginas/index.php?result=niettoegestaan");
        exit();
    }
}