<?php
require "header.php";
?>

<div class="container" style="margin-top:70px;">
    <form method="POST" action="RegistrationAction.php">
        <div class="form-group row">
            <label for="lastName" class="col-2 col-form-label">Nom</label>
            <div class="col-10">
                <input class="form-control" type="text" value="John" name="lastName" id="lastName">
            </div>
        </div>
        <div class="form-group row">
            <label for="firstName" class="col-2 col-form-label">Prénom</label>
            <div class="col-10">
                <input class="form-control" type="text" value="Doe" name="firstName" id="firstName">
            </div>
        </div>
        <div class="form-group row">
            <label for="mail" class="col-2 col-form-label">Email</label>
            <div class="col-10">
                <input class="form-control" type="email" value="johndoe@add.com" name="mail" id="mail">
            </div>
        </div>
        <div class="form-group row">
            <label for="tel" class="col-2 col-form-label">Telephone</label>
            <div class="col-10">
                <input class="form-control" type="tel" value="0612345678" name="tel" id="tel">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-2 col-form-label">Mot de Passe</label>
            <div class="col-10">
                <input class="form-control" type="password" value="johndoe" name="password" id="password">
            </div>
        </div>
        <div class="form-group row">
            <label for="repeatpassword" class="col-2 col-form-label">Mot de Passe</label>
            <div class="col-10">
                <input class="form-control" type="password" value="johndoe" id="repeatpassword">
            </div>
        </div>
        <div class="form-group row">
            <label for="birthdate" class="col-2 col-form-label">Date</label>
            <div class="col-10">
                <input class="form-control" type="date" value="1995-08-19" name="birthdate" id="birthdate">
            </div>
        </div>
        <div class="form-group row">
            <label for="adresse" class="col-2 col-form-label">Adresse</label>
            <div class="col-10">
                <input class="form-control" type="text" value="12, rue des Tilleuls" name="adresse" id="adresse">
            </div>
        </div>
        <div class="form-group row">
            <label for="cp" class="col-2 col-form-label">Code Postal</label>
            <div class="col-10">
                <input class="form-control" type="text" value="75012" name="cp" id="cp">
            </div>
        </div>
        <div class="form-group row">
            <label for="ville" class="col-2 col-form-label">Ville</label>
            <div class="col-10">
                <input class="form-control" type="text" value="Paris" name="ville" id="ville">
            </div>
        </div>
        <div class="form-group row">
            <label for="country" class="col-2 col-form-label">Pays</label>
            <div class="col-10">
                <input class="form-control" type="text" value="France" name="country" id="country">
            </div>
        </div>
        <div class="form-group row">
            <label for="country" class="col-2 col-form-label"></label>
            <div class="col-10">
                <input type="submit" class="btn btn-primary" value="GO">
            </div>
        </div>
    </form>
</div>


<?php
require "footer.php";
?>