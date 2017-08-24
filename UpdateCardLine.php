<?php
if (!isset($_SESSION)) {
    session_start();
}
if(isset($_POST['qte_modifie'])){
	$_SESSION['panier'][$_POST['id']] = $_POST['qte_modifie'];
	header("refresh:1; url=card.php");
}

?>