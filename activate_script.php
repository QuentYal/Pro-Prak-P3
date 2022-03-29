<?php 
    include("./connect_db.php");
    include("./functions.php");

    $id = sanitize($_POST["id"]);
    $pwh = sanitize($_POST["pwh"]);
    $password = sanitize($_POST["wachtwoord"]);
    $passwordCheck = sanitize($_POST["passwordCheck"]);

    if(empty($_POST["password"]) || empty($_POST["passwordCheck"])) {
        header("Location: ./index.php?content=message&alert=password-empty&id=$id&pwh=$pwh");
    } else if(strcmp($password, $passwordCheck)) {
        echo "niet gelijk";
    } else {
        
        $sql = "SELECT * FROM `register` WHERE `id` = $id AND `wachtwoord` = '$pwh'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result);) {
            // password hash voor nieuw password
            $pasword_hash = password_hash($password, PASSWORD_BCRYPT);
            // record updaten nieuw gekozen gehaste password
            $sql = "UPDATE `register` 
                    SET    `wachtwoord` = '$pasword_hash' 
                    WHERE  `id` = $id;
                    AND    `wachtwoord` = '$pwh'";

        mysqli_query($conn, $sql);
                    
        } else {
            //foutmelding
            header("Location: ./index.php?content=message&alert=no-id-pwh-match");
        }
    }
?>