<?php
require_once("db_credentials.php");
require_once("database.php");
db_connect();
confirm_db_connect();
if (!empty($_POST)) {
    $sql = "SELECT * FROM activiteiten WHERE activiteit_titel = '{$_POST['activiteit']}'";
    $resultaat = mysqli_query($db, $sql);
    $activiteit = mysqli_fetch_assoc($resultaat);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<h1> Nee, Je mag niet naar buiten</h1>

<p> Maar hier zijn wat dingen die je nu wel kunt doen </p>


<ul>
    <div class="tooltip">
        <li>
            Netflix party
        </li>

        <span class="tooltiptext"> Jaja</span>
    </div>
    <br>
    <div class="tooltip">
        <li>
            Hardlopen
        </li>

        <span class="tooltiptext"> Wandelen door de natuur is gewoon toegestaan,
            ook hierbij gelden natuurlijk de richtlijnen : Houd afstand! Ga alleen op en pad vermijd drukte</span>
    </div>
    <br>
    <div class="tooltip">
        <li>
            Houseparty (App)
        </li>

        <span class="tooltiptext"> Neenee</span>
    </div>
    <br>
    <div class="tooltip">
        <li>
            Podcasts luisteren
        </li>

        <span class="tooltiptext"> Neenee</span>
    </div>
    <br>
    <div class="tooltip">
        <li>
            Instrumenten leren spelen
        </li>

        <span class="tooltiptext"> Neenee</span>
    </div>
    <br>
    <div class="tooltip">
        <li>
            Houseparty (App)
        </li>

        <span class="tooltiptext"> Neenee</span>
    </div>
</ul>
<ul id="rightul">
    <div class="tooltipr">
        <li>
            Leren programeren
        </li>

        <span class="tooltiptextr"> Jaja</span>
    </div>
    <br>
    <div class="tooltipr">
        <li>
            Update uw CV en professionele documenten
        </li>

        <span class="tooltiptextr"> Neenee</span>
    </div>
    <br>
    <div class="tooltipr">
        <li>
            Koekjes makenn
        </li>

        <span class="tooltiptextr"> Neenee</span>
    </div>
    <br>
    <div class="tooltipr">
        <li>
            Je schuur opruimen
        </li>

        <span class="tooltiptextr"> Neenee</span>
    </div>
    <br>
    <div class="tooltipr">
        <li>
            Verbeter je tekenkunst
        </li>

        <span class="tooltiptextr"> Neenee</span>
    </div>
    <br>
    <div class="tooltipr">
        <li>
            Online films kijken met vrienden
        </li>

        <span class="tooltiptextr"> Neenee</span>
    </div>
</ul>

</body>
</html>