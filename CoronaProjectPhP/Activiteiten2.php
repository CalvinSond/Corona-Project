<?php
require_once ("db_credentials.php");
require_once ("database.php");
db_connect();
confirm_db_connect();
$sql = "SELECT * FROM activiteiten WHERE activiteit_titel = '{$_POST['activiteit']}'";
$resultaat = mysqli_query($db, $sql);
$activiteit = mysqli_fetch_assoc($resultaat);

if($_POST['activiteit'] == $activiteit['activiteit_titel'])
{
    echo $activiteit['activiteit_titel']. " is toegestaan";
    echo "<br>";
    echo "<br>";

   echo $activiteit['activiteit_inhoud'];
}else
    {
        echo "Helaas, " . $_POST['activiteit'] . " is nu niet toegestaan";
    }
db_disconnect();