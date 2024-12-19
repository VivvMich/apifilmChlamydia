<?php 
    include "../controller/pdo.php";

    if ( !empty($_POST['user_mail']) && !empty($_POST['user_psw'])) {

        $mail = $_POST['user_mail'];
        $sql = "SELECT * FROM users WHERE user_mail=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$mail]);

        $user= $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){

            if(password_verify($_POST['user_psw'], $user['user_psw'])){
                session_start();

                $_SESSION['name'] = $user['user_name'];
                $_SESSION['id_user'] = $user['user_id'];

                header("Location: ../view/homepage.php"); 
            }else{
                header("Location: ../view/login.php?message=Identifiants incorrectes.&status=error"); 
            }

        }else{
            header("Location: ../view/login.php?message=Identifiants incorrectes.&status=error"); 
        }

    }else{
        header("Location: ../view/login.php?message=Entrez vos identifiants correctement.&status=error");
    }

?>