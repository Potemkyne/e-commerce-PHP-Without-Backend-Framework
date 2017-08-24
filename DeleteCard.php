<?php
require "index.php";
if(isset($_SESSION['panier'])){
	unset($_SESSION['panier']);
	unset($_SESSION['header']);
}
header("refresh:1; url=index.php");
?>
