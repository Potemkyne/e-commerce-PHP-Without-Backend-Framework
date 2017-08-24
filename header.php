<?php
if (!isset($_SESSION)) {
    session_start();
}
require 'class/Autoloader.php';
Autoloader::register();
$DB = new DB('localhost', 'root', '', 'graphshop', null);
$panier = new panier($DB);
$query = "SELECT * FROM products";
$res = $DB->extract($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" ></script>
        <script src='js/jquery-1.8.3.min.js'></script>
        <script src='js/jquery.elevatezoom.js'></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <link rel="Stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" /> 
        <link rel="stylesheet" href="css/style.css" >
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <title>Shop</title>
    </head>
    <body>

        <nav class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav " >
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true">Marques</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Comptoir des Cotonniers</a>
                            <a class="dropdown-item" href="#">Saint James</a>
                            <a class="dropdown-item" href="#">Claudie Pierlot</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Outlet</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Pull</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manteau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Veste</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pantalon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jupe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Robe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accessoire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="card.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item header">
                        <a class="nav-link " href="card.php" id="session_qte_totale">
                            <?php
                            if (isset($_SESSION['header']['total'])) {
                                echo $_SESSION['header']['qte_totale'] . " articles";
                            }
                            ?>
                        </a>
                    </li>
                    <li class="nav-item  header">
                        <a class="nav-link" href="card.php" id="session_total"  >
                            <?php
                            if (isset($_SESSION['header']['total'])) {
                                echo $_SESSION['header']['total'] . "$";
                            }
                            ?></a>
                    </li>
                    <?php if (isset($_SESSION['user']['1'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                Vous êtes connecté: <span  id="user_name"><?php echo $_SESSION['user']['1']; ?></span> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account.php"> <i class="fa fa-user" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Déconnexion</a>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registration.php">Pas encore inscrit?</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

