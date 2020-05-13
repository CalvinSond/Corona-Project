<?php
include_once("../opmaak/header.php");
?>
    <div class="centerContent activiteitenInput">
        <form name="form" action="../includes/activiteiten.inc.php" method="post" class="centerContent activiteitenInput">
            <input type="text" name="activiteit" id="activiteit" class="inputStyling" placeholder="Voer hier uw activiteit in: ">
            <input type="submit" id="go" value="Kan ik dit nu doen?">
        </form>
    </div>
<?php
if (isset($_GET['result'])) {
    if ($_GET['result'] == "toegestaan") {
        echo  '<p class="green">Dit is toegestaan</p>';
    } else if ($_GET['result'] == "niettoegestaan") {
        echo '<p class="red">Dit is niet toegestaan</p>';
    }
}
include_once("../opmaak/footer.php");
?>