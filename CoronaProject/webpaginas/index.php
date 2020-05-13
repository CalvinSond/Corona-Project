<?php
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
