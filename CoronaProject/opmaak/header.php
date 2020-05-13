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
<header class="mainHeader">
    <nav>
        <a href="#">
            <img src="#">
        </a>
        <ul class="dropDownHeader">
            <li><a href="#">Home</a></li>
            <li><a href="#">Activiteiten</a></li>
            <li><a href="#">Over ons</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div>
            <?php
                if (empty($_SESSION)) {
                    echo '<form action="../includes/login.inc.php" method="post" style="float: left">
                        <input type="text" name="gebruikersmail" placeholder="gebruikersnaam/email">
                        <input type="password" name="wachtwoord" placeholder="wachtwoord">
                        <button type="submit" name="login-submit">Log in</button>
                        </form>
                        <a href="signup.php" style="float: left">Sign up</a> ';
                }
                if (isset($_SESSION['gebruikersNaam'])) {
                    echo ' <p style="float: left">'.$_SESSION['gebruikersNaam'].'</p>
                        <form action="../includes/logout.inc.php" method="post" style="float: left">
                        <button type="submit" name="logout-submit">Log out</button>
                      </form> 
                      <form action="editor">
                        <input type="submit" value="editor ">
                      </form>';
                }
                echo time();
            ?>
        </div>
    </nav>
    <button onclick="dropDown()" class="inputStyling"></button>
</header>

<script>
    function dropDown() {
        var all = document.getElementsByClassName('dropDownHeader');
        for (var i = 0; i < all.length; i++) {
            if (all[i].style.display === "none") {
                all[i].style.display = "block";
                all[i].style.transitionDuration = "1s";

            } else {
                all[i].style.display = "none";
                all[i].style.transitionDuration = "1s";
            }
        }
    }
</script>