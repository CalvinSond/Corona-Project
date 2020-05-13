<?php
/*require_once ("db_credentials.php");
require_once ("database.php"); */
if (isset($_POST['activiteit'])) {
    require 'dbh.inc.php';
    $activiteitTitel = $_POST['activiteit'];

    $sql = "SELECT * FROM activiteiten WHERE activiteitTitel = '{$activiteitTitel}'";

    $resultaat = mysqli_query($connection, $sql);
    $activiteit = mysqli_fetch_assoc($resultaat);

    if ($_POST['activiteit'] == $activiteit['activiteitTitel']) {
        header("Location: ../webpaginas/activiteiten.php?result=toegestaan");
        exit();

        echo $activiteit['activiteitTitel'] . " is toegestaan";
        echo "<br>";
        echo "<br>";

        echo $activiteit['activiteitInhoud'];
    } else {
        header("Location: ../webpaginas/activiteiten.php?result=niettoegestaan");
        exit();
        echo "Helaas, " . $_POST['activiteit'] . " is nu niet toegestaan";
    }
}