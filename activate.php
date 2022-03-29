<?php 
    if(!(isset($_GET["content"]) && isset($_GET["id"]) && isset($_GET["pwh"])) ) {
        header("Location: ./index.php?content=message&alert=hacker-alert");
    }
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-6">
            <form action="./index.php?content=activate_script" method="post">
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Kies een nieuw wachtwoord: .... </label>
                <input name="password" type="passwords" class="form-control" id="inputPassword" aria-describedby="passwordHelp">
                <div id="passwordHelp" class="form-text text-muted">Kies een veilig wachtwoord...</div>
            </div>

            <div class="mb-3">
                <label for="inputPasswordCheck" class="form-label">Type het wachtwoord opnieuw: .... </label>
                <input name="passwordCheck" type="passwords" class="form-control" id="inputPassword" aria-describedby="passwordHelpCheck">
                <div id="passwordHelpCheck" class="form-text text-muted">
                    Ter controle, Voer nogmaals uw wachtwoord in...
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            <input type="hidden" name="pwh" value="<?php echo $_GET["pwh"]; ?>">

            <button type="submit" class="btn btn-success">Activeer</button>
            </form>
        </div>

        <div class="col-12 col-sm-6">
            <img src="./img/Oculus-Quest-2-Review.jpg" alt="" class="w-50 mx-auto d-block">
        </div>

    </div>
</div>