<?php
    $alert = (isset($_GET["alert"]))? $_GET["alert"]: "default";
    $id = (isset($_GET["id"]))? $_GET["id"]: "";
    $pwh = (isset($_GET["pwh"]))? $_GET["pwh"]: "";

    switch($alert) {
        case "no-email" :
            echo   '<div class="alert alert-secondary mt-5 w-50 mx-auto" role="alert">
                    U heb geen e-mailadres ingvuld, probeer het opnieuw...
                    </div>';
            header("Refresh: 3; ./index.php?content=register");
        break;
        case "emailexists" :
            echo   '<div class="alert alert-warning mt-5 w-50 mx-auto" role="alert">
                    Het door u ingevulde e-mailadres bestaat al, probeer het opnieuw met een ander e-mailadres...
                    </div>';
            header("Refresh: 3; ./index.php?content=register");
        break;
        case "register-error" :
            echo   '<div class="alert alert-danger mt-5 w-50 mx-auto" role="alert">
                    Er is iets fout gegaan in het registratieproces... probeer het nogmaals of neem contact op met
                    admin@quest.com
                    </div>';
                header("Refresh: 3; ./index.php?content=register");
        break;

        case "register-success" :
            echo   '<div class="alert alert-success mt-5 w-50 mx-auto" role="alert">
                    U ben successvol geregistreerd. U ontvangt een e-mail van ons met daarin een
                    activiteitenlink.
                    </div>';
                header("Refresh: 3; ./index.php?content=login");
        break;

        case "hacker-alert" :
            echo   '<div class="alert alert-success mt-5 w-50 mx-auto" role="alert">
                    u heeft geen rechten op deze pagina
                    </div>';
                header("Refresh: 3; ./index.php?content=home");
        break;

        case "password-empty" :
            echo   '<div class="alert alert-warning mt-5 w-50 mx-auto" role="alert">
                        u heeft één van beide wachtwoordvelden niet ingevuld. probeer het opnieuw
                    </div>';
                header("Refresh: 3; ./index.php?content=activate&id=$id&pwh=$pwh");
        break;

        case "no-id-pwh-match" :
            echo   '<div class="alert alert-warning mt-5 w-50 mx-auto" role="alert">
                        U bent niet geregistreerd in de database, u wordt doorgestuurd naar de registratiepagina.
                    </div>';
                header("Refresh: 3; ./index.php?content=register");
        break;

        default:
            header("Location: ./index.php?content=home");
        break;
    }
?>