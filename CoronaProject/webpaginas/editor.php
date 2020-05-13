<?php
include_once "../opmaak/header.php";
if (isset($_SESSION['gebruikersId'])) {
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
    header("Location: ../webpaginas/index.php");
    exit();
}