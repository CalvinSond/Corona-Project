<?php
require_once "../opmaak/header.php";
?>

    <main>
        <form action="../includes/signup.inc.php" method="post" class="signupform">
            <h1> Sign up</h1>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
<<<<<<< Updated upstream
                    echo '<p style="color: red">Vul alle velden in</p>';
                }
                else if ($_GET['error'] == "invalidemailusername") {
                    echo '<p style="color: red">Dit email adres en deze gebruikersnaam zijn niet beschikbaar of zijn al in gebruik</p>';
                }
                else if ($_GET['error'] == "invalidemail") {
                    echo '<p style="color: red">Dit email adres is al in gebruik of bestaat niet</p>';
                }
                else if ($_GET['error'] == "invalidusername") {
                    echo '<p style="color: red">Deze gebruikersnaam is niet beschikbaar</p>';
                }
                else if ($_GET['error'] == "passwordcheck") {
                    echo '<p style="color: red">De wachtwoorden zijn niet hetzelde</p>';
                }
                else if ($_GET['error'] == "sqlerror") {
                    echo '<p style="color: red">er is een fout opgetreden met de verbinding</p>';
=======
                    echo '<p class="red">Vul alle velden in</p>';
                }
                else if ($_GET['error'] == "invalidemailusername") {
                    echo '<p class="red">Dit email adres en deze gebruikersnaam zijn niet beschikbaar of zijn al in gebruik</p>';
                }
                else if ($_GET['error'] == "invalidemail") {
                    echo '<p class="red">Dit email adres is al in gebruik of bestaat niet</p>';
                }
                else if ($_GET['error'] == "invalidusername") {
                    echo '<p class="red">Deze gebruikersnaam is niet beschikbaar</p>';
                }
                else if ($_GET['error'] == "passwordcheck") {
                    echo '<p class="red">De wachtwoorden zijn niet hetzelde</p>';
                }
                else if ($_GET['error'] == "sqlerror") {
                    echo '<p class="red">er is een fout opgetreden met de verbinding</p>';
>>>>>>> Stashed changes
                }
            }
            if (isset($_GET['signup'])) {
                if ($_GET['signup'] == "succes") {
<<<<<<< Updated upstream
                    echo '<p style="color: greenyellow">account aanmaken was succesvol</p>';
=======
                    echo '<p class="red">account aanmaken was succesvol</p>';
>>>>>>> Stashed changes
                }
            }
            ?>
            <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam"> <br>
            <input type="email" name="email" placeholder="email"> <br>
            <input type="password" name="wachtwoord" placeholder="wachtwoord"> <br>
            <input class="" type="password" name="wachtwoord-herhaal" placeholder="herhaal wachtwoord"> <br>
            <button type="submit" name="signup-submit">Sign up</button>
        </form>
    </main>

<?php
require_once "../opmaak/footer.php";
?>