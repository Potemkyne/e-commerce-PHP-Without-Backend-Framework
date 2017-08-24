
<?php
require "header.php";
?>

<div class="container" style="margin-top:70px;">
    <form method="POST" action="LoginAction.php">
        <div class="form-group row">
            <label for="mail" class="col-2 col-form-label">Email</label>
            <div class="col-10">
                <input class="form-control" type="email" value="johndoe@add.com" name="mail" id="mail">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-2 col-form-label">Mot de Passe</label>
            <div class="col-10">
                <input class="form-control" type="password" value="lola" name="password" id="password">
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