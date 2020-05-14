<?php
include_once "../opmaak/header.php";
include_once "../includes/dbh.inc.php";
if (isset($_SESSION['gebruikersId'])) {
    if (isset($_POST['activiteitBewerkBtnId'])) {
        $activiteitId = $_POST['activiteitBewerkBtnId'];
        $sql = "SELECT * FROM activiteiten WHERE activiteitId = '{$activiteitId}'";
        $result = mysqli_fetch_assoc(mysqli_query($connection, $sql));
    }
    if (isset($_GET['upload'])) {
        if ($_GET['upload'] == "succes") {
            echo '<p class="green">Uploaden gelukt!</p>';
        }
    }

    ?>
    <div class="activiteitBewerker">
        <form action="../includes/<?php if (isset($result)) {echo 'edit';} else {echo 'upload';} ?>.inc.php" method="post">
            <div>
                <ul class="horizontalList">
                    <li><input type="hidden" name="activiteitId" value="<?php if(isset($_POST['activiteitBewerkBtnId'])) {echo $_POST['activiteitBewerkBtnId']; } ?>"></li>
                    <li><input class="centerContent" name="titelInvoer" type="text" placeholder="titel..." value="<?php if(isset($result['activiteitTitel'])) {echo $result['activiteitTitel'];}?>"></li>
                    <li><input class="centerContent" name="locatieInvoer" type="text" placeholder="locatie..." value="<?php if(isset($result['activiteitLocatie'])) {echo $result['activiteitLocatie'];}?>"></li>
                    <li><input class="centerContent" name="organisatorInvoer" type="text" placeholder="organisator..." value="<?php if(isset($result['activiteitOrganisator'])) {echo $result['activiteitOrganisator'];}?>"></li>
                    <li><input class="centerContent" name="linkInvoer" type="text" placeholder="link..." value="<?php if(isset($result['activiteitLink'])) {echo $result['activiteitLink'];}?>"></li>
                </ul>
            </div>
            <div id="textInvoer">
            <textarea class="centerContent" name="textInvoer" rows="27" cols="168" placeholder="Vul hier uw beschrijving in..." required><?php if(isset($result['activiteitInhoud'])) {echo $result['activiteitInhoud'];}?></textarea>
            </div>
            <button type="submit" name="uploadButton" class="centerContent inputStyling"><?php if (isset($result)) {echo 'Edit';} else {echo 'Upload';} ?>!</button>
        </form>
    </div>
    <?php
    include_once "../opmaak/footer.php";
} else {
    header("Location:index.php?error=accesdenied");
    exit();
}