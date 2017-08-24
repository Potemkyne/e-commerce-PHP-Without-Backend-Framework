<?php
require "header.php";
?>

<div class="container" style="margin-top:70px;">
    <span class="oi oi-icon-name" title="icon name" aria-hidden="true"></span>
    <div class="row">
        <div class="col">
            <div class="card-columns" style="width: 100rem;">
                <?php foreach ($res as $key => $value) { ?>
                    <div class="card" >
                        <a href="fiche.php"><img class="card-img-top img-fluid" src="img/<?php echo $value->id; ?>.jpg" alt="img1"  id="zoom_08" data-zoom-image="img/<?php echo $value->id; ?>.jpg"/></a>
                        <div class="card-block">
                            <a href="fiche.php"> <h5 class="card-title"><?php echo $value->name; ?></h5></a>
                            <p class="card-text"><?php echo $value->description; ?></p>
                            <h5 class="card-text"><?php echo $value->price; ?> $</h5>
                            <a href="card.php?id=<?php echo $value->id; ?>" class="btn btn-primary">Acheter</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
require "footer.php";
?>