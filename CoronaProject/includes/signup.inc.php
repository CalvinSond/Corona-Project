<?php
if(isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';

    $gebruikersnaam     =  $_POST['gebruikersnaam'];
    $email              =  $_POST['email'];
    $wachtwoord         =  $_POST['wachtwoord'];
    $wachtwoordHerhaal  =  $_POST['wachtwoord-herhaal'];

    if(empty($gebruikersnaam) || empty($email) || empty($wachtwoord) || empty($wachtwoordHerhaal)) {
        header("Location: ../webpaginas/signup.php?error=emptyfields&gebruikersnaam=".$gebruikersnaam."&email=".$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $gebruikersnaam)) {
        header("Location: ../webpaginas/signup.php?error=invalidemailusername");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../webpaginas/signup.php?error=invalidemail&gebruikersnaam=".$gebruikersnaam);
        exit();
    } else if (!preg_match("/^[a-zA-Z-0-9]*$/", $gebruikersnaam)) {
        header("Location: ../webpaginas/signup.php?error=invalidusername&email=".$email);
        exit();
    } else if($wachtwoord !== $wachtwoordHerhaal) {
        header("Location: ../webpaginas/signup.php?error=passwordcheck&gebruikersnaam=".$gebruikersnaam."&email=".$email);
        exit();
    } else {

        $sql = "SELECT `gebruikersNaam` FROM `gebruikers` WHERE `gebruikersNaam` = ?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../webpaginas/signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0){
                header("Location: ../webpaginas/signup.php?error=usernametaken&email=".$email);
                exit();
            } else {
                $sql = "INSERT INTO `gebruikers`(`gebruikersId`, `gebruikersNaam`, `gebruikersEmail`, `gebruikersWachtwoord`) VALUES (NULL, ?, ?, ?)";
                $stmt = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../webpaginas/signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $gebruikersnaam, $email, $hashedWachtwoord);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../webpaginas/signup.php?signup=succes");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
else{
    header("Location: ../webpaginas/signup.php");
}