<?php
require "header.php";
if (isset($_GET['id'])) {
    $ligne = $panier->extractId($_GET['id']);
} else {
    $ligne = $panier->extractSession();
}
?>
<div class="container" style="margin-top:70px;">
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Article</th>
                    <th colspan="1"></th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($ligne)) {
                    foreach ($ligne as $key => $value) {
                        ?>
                        <tr>
                            <th scope="row" class='invisible'><?php echo $value->id; ?></th>
                            <td><?php echo $value->name; ?></td>
                            <td><img src="img/<?php echo $value->id; ?>.jpg" alt="img<?php echo $value->id; ?>" height="60"/></td>
                            <td id="form" >
                                <?php
                                $qte = $_SESSION['panier'][$value->id];
                                if (isset($qte_totale)) {
                                    $qte_totale += $qte;
                                } else {
                                    $qte_totale = $qte;
                                }
                                ?>
                                <form class="form-inline" method="post" action="UpdateCardLine.php">
                                    <input type="number" class="form-control form-control-sm" value='<?php echo $qte; ?>' name="qte_modifie" /> 
                                    <input type='hidden' name='id' value='<?php echo $value->id; ?>'/> &nbsp;&nbsp; 
                                    <button type="submit" class="btn" style="background-color:transparent"  value="recalculer"> <i class="fa fa-refresh" aria-hidden="true"></i></button>

                                </form>
                            </td>
                            <td><?php echo $value->price; ?> $</td>
                            <td class="total_ligne"><?php
                                $total_ligne = $qte * $value->price;
                                if (isset($total)) {
                                    $total += $total_ligne;
                                } else {
                                    $total = $total_ligne;
                                }
                                echo $total_ligne;
                                ?> $ &nbsp;&nbsp;&nbsp; 
                                <a href="#" class="supp"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <tr>
                    <th scope="row">Total</th>
                    <td id="quantite-panier">
                        <?php
                        if (isset($qte_totale)) {
                            $_SESSION['header']['qte_totale'] = $qte_totale;
                        }
                        ?></td>
                    <td colspan="3"></td>
                    <td > <?php
                        if (isset($total)) {
                            $_SESSION['header']['total'] = $total;
                        }
                        echo $total . " $";
                        ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col">
            <a href="DeleteCard.php" class="btn btn-primary">Vider Panier</a>
        </div>
        <div class="col">

        </div>
        <div class="col">

        </div>
        <div class="col">
            <div id="paypal-button"></div>
        </div>
    </div>
</div>

<?php
require "footer.php";
?>