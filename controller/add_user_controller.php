<?php
include "pdo.php";

if ($_POST['psw1'] === $_POST['psw2']) {
    $psw = password_hash($_POST["psw1"], PASSWORD_ARGON2I);
    $sql = "INSERT INTO users (
                        user_name, 
                        user_mail, 
                        user_psw,
                        user_birthdate) 
                    VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $verif = $stmt->execute([
        $_POST["name"],
        $_POST["mail"],
        $psw,
        $_POST['birthdate'],
    ]);
    if ($verif) {
        header("Location: ../view/form.php?message=Inscription validée&status=success");
    } else {
        header("Location: ../view/form.php?message=Erreur serveur&status=error");
    };
} else {
    header("Location: ../view/form.php?message=Les mots de passe ne correspondent pas&status=error");
};
