<?php
include_once("../opmaak/header.php");

if (isset($_SESSION['gebruikersNaam'])) {
    require "../includes/dbh.inc.php";
    $sql = 'SELECT * FROM `activiteiten`';
    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");
    ?>

    <main>
        <div class="container overzicht">
            <?php
            // echo "<li> {{$row['activiteitTitel']}, {$row['activiteitInhoud']}, {$row['activiteitLocatie']}, {$row['activiteitOrganisator']}, {$row['activiteitLink']} </li> <br>";

            while ($row = mysqli_fetch_array($result)) {
                $uploaddatum = date("d-m-Y\ H:i", $row['activiteitUploaddatum']);
                echo '<div class="artikel ' . $row['activiteitId'] . '"> 
                        <ol>
                            <li><a href="artikel.php" id="' . $row['activiteitId'] . '">' . $row['activiteitTitel'] . '</a>
                            - <small>geplaatst op ' . $uploaddatum . '</small>
                            <form action="editor.php" method="post"><button type="submit" name="activiteitBewerkBtnId" value="' . $row['activiteitId'] . '" class="inputStyling">Bewerk</button></form>
                            <form action="../includes/delete.inc.php" method="post"><button type="submit" name="deleteBtn" value="' . $row['activiteitId'] . '" class="inputStyling" style="color: red">Verwijder</button></form>
                            </li>
                        </ol>
                      </div>';
            }
            ?>
        </div>
    </main>
    <?php
} else {
    header("Location:index.php?error=accesdenied");
    exit();
}
include_once("../opmaak/footer.php");

