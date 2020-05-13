<?php
<<<<<<< Updated upstream
include_once("../Database/database.php");
//include_once("artikel.php");
/*
$artikel = new Artikel();
$artikelen = $artikel->fetch_all();

print_r($artikelen);
*/

include_once("../opmaak/header.php");

//echo time();
//$timestamp = time();
//echo "<br>";
//echo ;

$sql = "SELECT * FROM `activiteiten`";
$result = mysqli_query($db, $sql) or die("Bad Query: $sql");
?>

<main>
    <div class="container">
            <?php
           // echo "<li> {{$row['activiteitTitel']}, {$row['activiteitInhoud']}, {$row['activiteitLocatie']}, {$row['activiteitOrganisator']}, {$row['activiteitLink']} </li> <br>";

            while ($row = mysqli_fetch_array($result))
            {

                $uploaddatum = date("d-m-Y\ H:i", $row['activiteitUploaddatum']);
                echo '<div class="artikel '.$row['activiteitId'].'"> 
                        <a href="index.php" class="article ">'.$row['activiteitTitel'].'</a>
                            <ol>
                                <li>
                                    <a href="artikel.php" id="'.$row['activiteitId'].'">
                                        Artikel titel
                                    </a>
                        - <small>geplaatst op '.$uploaddatum.'</small>
                                </li>
                            </ol>
                      </div>';
            }
            ?>
    </div>
</main>
</body>
</html>
=======

include_once("../opmaak/header.php");
require "../includes/dbh.inc.php";
$sql = 'SELECT * FROM `activiteiten`';
$result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

/*("db_credentials.php");
require_once("database.php");
db_connect();
confirm_db_connect();
if (!empty($_POST)) {
    $sql = "SELECT * FROM activiteiten WHERE activiteit_titel = '{$_POST['activiteit']}'";
    $resultaat = mysqli_query($db, $sql);
    $activiteit = mysqli_fetch_assoc($resultaat);
} */
?>
    <h1> Nee, Je mag niet naar buiten</h1>

    <p> Maar hier zijn wat dingen die je nu wel kunt doen </p>
<?php

while ($row = mysqli_fetch_array($result)) {
    $uploaddatum = date("d-m-Y\ H:i", $row['activiteitUploaddatum']);

    echo '<div class="tooltip">
        <ul>
            <li><a href="">' . $row['activiteitTitel'] . '</a></li>
          
            <li><small>geplaatst op ' . $uploaddatum . '</small></li>
            
            <li><span class="tooltiptext"> ' . $row['activiteitInhoud'] . '</span></li>
        </ul>

    </div>  
    ';
} ?>
<?php
include_once("../opmaak/footer.php");
?>
>>>>>>> Stashed changes
