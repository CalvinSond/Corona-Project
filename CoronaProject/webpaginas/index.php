<?php

include_once("../opmaak/header.php");
require "../includes/dbh.inc.php";
?>
    <br>
    <h1> Nee, Je mag niet naar buiten</h1>
    <p> Maar hier zijn wat dingen die je nu wel kunt doen </p>
        <div class="indexcontent">
<?php
$sql = 'SELECT * FROM `activiteiten`';
$result = mysqli_query($connection, $sql) or die("Bad Query: $sql");
while ($row = mysqli_fetch_array($result)) {
    $uploaddatum = date("d-m-Y\ H:i", $row['activiteitUploaddatum']);

    echo '  <div class="tooltip">
                <ul>
                    <li><a href="">' . $row['activiteitTitel'] . '</a></li>
                    
                    <li><small>geplaatst op ' . $uploaddatum . '</small></li>
                    
                    <li style="margin: 50px;"><span class="tooltiptext"> ' . $row['activiteitInhoud'] . '</span></li>
                </ul>
            </div>';
} ?>
</div>
<?php
include_once("../opmaak/footer.php");
?>