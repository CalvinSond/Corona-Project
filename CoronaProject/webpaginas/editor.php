<?php
include_once "../opmaak/header.php";
if (isset($_SESSION['gebruikersId'])) {
<<<<<<< Updated upstream
    ?>
    <div class="activiteitBewerker">
        <form action="../includes/upload.inc.php" method="post">
            <!-- redundant hidden input. Can be done by accessing the session variable on the upload script page
            <input type="hidden" name=" " value=" <?php //$_SESSION['gebruikersId'] ?> "> -->

            <div id="titelInvoer">
                <input name="titelInvoer" type="text">
            </div>
            <div id="textInvoer">
                <input name="textInvoer" type="text" style="height: 30%">
                <textarea id="textareaInvoer" rows="8" cols="50" style="color: grey" placeholder="">
                    Vul hier uw beschrijving in...
                </textarea>
            </div>
            <button type="submit" name="uploadButton">Upload!</button>
        </form>

    </div>


    <?php
    include_once "../opmaak/footer.php";
} else if (empty($_SESSION['gebruikersId'])) {
=======
    if (isset($_POST['activiteitId'])) {
        $activiteitId = $_POST['activiteitId'];
    }
    if (isset($_GET['upload'])) {
        if ($_GET['upload'] == "succes") {
            echo '<p class="green">Uploaden gelukt!</p>';
        }
    }
    /* if (empty($_POST['edit'])) {
         echo 'action="../includes/upload.inc.php"';
     }
     if (isset($_POST['edit'])) {
         echo 'action="../includes/edit.inc.php"';
     } */
    ?>
    <div class="activiteitBewerker">
        <form action="../includes/upload.inc.php"
              method="post">
            <div style="display: inline;">
                <input name="titelInvoer" type="text" placeholder="titel...">
                <input name="locatieInvoer" type="text" placeholder="locatie...">
                <input name="organisatorInvoer" type="text" placeholder="organisator...">
                <input name="linkInvoer" type="text" placeholder="link...">
            </div>
            <div id="textInvoer">
                <textarea id="textareaInvoer" name="textInvoer" rows="8" cols="50"
                          placeholder="Vul hier uw beschrijving in..."></textarea>
            </div>
            <button type="submit" name="uploadButton" class="inputStyling">Upload!</button>
        </form>
    </div>
    <?php
    include_once "../opmaak/footer.php";
} else {
>>>>>>> Stashed changes
    header("Location: ../webpaginas/index.php");
    exit();
}