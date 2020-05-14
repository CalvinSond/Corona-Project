<?php
if(isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $mailNaam = $_POST['gebruikersmail'];
    $wachtwoord = $_POST['wachtwoord'];

    if (empty($mailNaam) || empty($wachtwoord)){
        header("Location: ../webpaginas/index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM gebruikers WHERE gebruikersNaam=? OR gebruikersEmail=?;";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../webpaginas/index.php?error=sqlerror");
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailNaam, $mailNaam);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $wachtwoordcheck = password_verify($wachtwoord, $row['gebruikersWachtwoord']);
                if ($wachtwoordcheck == false) {
                    header("Location: ../webpaginas/index.php?error=wrongpassword");
                }
                elseif ($wachtwoordcheck == true) {
                    session_start();
                    $_SESSION['gebruikersId'] = $row['gebruikersId'];
                    $_SESSION['gebruikersNaam'] = $row['gebruikersNaam'];
                    header("Location: ../webpaginas/index.php?login=success");
                    exit();
                } else {
                    header("Location: ../webpaginas/index.php?error=wrongpassword");
                    exit();
                }
            } else {
                header("Location: ../webpaginas/index.php?error=noexistinguser");
                exit();
            }
        }
    }
} else {
    header("Location: ../webpaginas/index.php");
    exit();
}