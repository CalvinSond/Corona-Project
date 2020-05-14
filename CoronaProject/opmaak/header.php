<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Corona Project</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../opmaak/main.css">
    <link rel="stylesheet" href="../opmaak/header.css">
</head>
<body>
<header class="header">
    <ul class="horizontalList">
        <?php
        if (!strpos($_SERVER['REQUEST_URI'], 'index.php')) {
            echo '
                        <li><form action="index.php">
                            <button type="submit" class="inputStyling headerbtn">Homepage</button>
                        </form></li>';
        }

        if (empty($_SESSION)) {
            echo '<form action="../includes/login.inc.php" method="post" >
                    <ul class="horizontalList">
                        <li><input type="text" name="gebruikersmail" placeholder="gebruikersnaam/email" class="headerbtn"></li>
                        <li><input type="password" name="wachtwoord" placeholder="wachtwoord" class="headerbtn"></li>
                        <li><button type="submit" name="login-submit" class="inputStyling headerbtn">Log in</button></li>
                    </ul>
                   </form>
                        ';
        }
        if (isset($_SESSION['gebruikersNaam'])) {
            if (!strpos($_SERVER['REQUEST_URI'], 'editor.php')) {
                echo '<li><form action="editor.php">
                        <button type="submit" class="inputStyling headerbtn">editor</button>
                      </form></li>';
            }
            if (!strpos($_SERVER['REQUEST_URI'], 'overzicht.php')) {
                echo '
                        <li><form action="overzicht.php">
                            <button type="submit" class="inputStyling headerbtn">overzicht</button>
                        </form></li>';
            }
            echo '<li>
                    <form action="../includes/logout.inc.php" method="post">
                        <ul class="horizontalList">
                            <li><button type="submit" name="logout-submit" class="inputStyling headerbtn">Log out</button></li>
                            <li><p style="margin-top: 35px; color: white">Je bent ingelogd als ' . $_SESSION['gebruikersNaam'] . '</p> </li> 
                        </ul>
                    </form>
                  </li>';

        }
        echo '
            <form name="form" action="../includes/activiteiten.inc.php" method="post">
                <ul class="horizontalList">
                    <li><input type="hidden" name="url" value='.$_SERVER['REQUEST_URI'].'></li>
                    <li><input class="headerbtn" type="text" name="activiteit" id="activiteit" placeholder="Voer hier uw activiteit in: " required></li>
                    <li><input class="headerbtn" type="submit" id="go" value="Kan ik dit nu doen?"></li>
                </ul>
            </form>';
            if (isset($_GET['result'])) {
                if ($_GET['result'] == "toegestaan") {
                    echo "<li><p class='green headerbtn'>Dit is toegestaan</p></li>";
                } else if ($_GET['result'] == "niettoegestaan") {
                    echo "<li><p class='red headerbtn'>Dit is niet toegestaan</p></li>";
                }
            }
        ?>
    </ul>
</header>
<div class="container">