<?php
    if(empty($_POST["email"])) {
        header("location: ./index.php?content=message&alert=no-email");
    } else {
        include("./connect_db.php");
        include("./functions.php");

        $email = sanitize($_POST["email"]);

        $sql = "SELECT * FROM `register` WHERE `email` = '$email'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)) {
            header("Location: ./index.php?content=message&alert=emailexists");
        } else{
            $password = "geheim";
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO `register` (`id`,
                                            `email`,
                                            `wachtwoord`,
                                            `userrole`)
                    VALUES                 (NULL,
                                            '$email',
                                            '$password_hash',
                                            'user')";
            
            if (mysqli_query($conn, $sql)) {

                $id = mysqli_insert_id($conn);

                $to = $email;
                $subject = "Activiteiten voor uw account van be-p3-vr.com";
                $message = '<!doctype html>
                                <html lang="en">
                                <head>
                                    <!-- Required meta tags -->
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                
                                    <!-- Bootstrap CSS -->
                                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                                
                                    <style>
                                        body
                                        {
                                            background-color: #dddddd;
                                            font-size: 1.3em
                                        }
                                    </style>
                                </head>
                                <body>
                                    <h2>Beste gebruiker,</h2>
                                    <p>U heeft zich onlangs geregistreerd voor de site www.vr-p3-br.com</p>
                                    <p>Klik <a href="http://be-p3-vr.com/index.php?content=activate&id=' . $id . '& pwh=' . $password_hash . '">hier</a> voor het activeren en wijzigen van het wachtwoord van uw account.</p>
                                    <p>Bedankt voor het registreren</p>
                                    <p>Met vriendelijke groet,</p>
                                    <p>Q.Yalcin</p>
                                    <p>CEO VR</p>
                                
                                    <!-- Optional JavaScript; choose one of the two! -->
                                
                                    <!-- Option 1: Bootstrap Bundle with Popper -->
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                                
                                    <!-- Option 2: Separate Popper and Bootstrap JS -->
                                    <!--
                                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
                                    -->
                                </body>
                                </html>';

                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8\r\n";
                $headers .= "From: admin@vr-p3-be.com\r\n";
                $headers .= "Cc: moderator@vr-p3-be.com\r\n";
                $headers .= "Bcc: root@vr-p3-be.com";


                mail($to, $subject, $message, $headers);

                header("Location: ./index.php?content=message&alert=register-success");
            } else{
                header("location: ./index.php?content=message&alert=register-error");
            }
        }
    }
?>