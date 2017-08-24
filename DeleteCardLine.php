<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    unset($_SESSION['panier'][$id]);
    echo json_encode(['lol' =>$_SESSION['panier']]);
    header("refresh:1; url=card.php");
}
?>
  
