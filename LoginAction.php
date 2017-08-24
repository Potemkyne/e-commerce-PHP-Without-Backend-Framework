<?php
session_start();
//Inclusion
require 'class/Autoloader.php';
Autoloader::register();

$DB = new DB('localhost', 'root', '', 'graphshop', null);
$usersmanager = new UsersManager($DB->db);

if (isset($_POST)) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    try {
        $res = $usersmanager->verifUser($mail, $password);
        if (is_array($res)) {
            if (empty($res)) {
                echo "<h2>Mauvaise combinaison, veuiller réessayez </h2>";
                header("refresh:1; url=login.php");
            } else {
                $_SESSION['user'] = array(1=>$res[0]->firstName );
                echo "<h2>Vous êtes connecté:  " . $res[0]->firstName . " " . $res[0]->lastName . " Redirection dans 3 secondes...</h2>";
                header("refresh:3 ;url=index.php");
            }
        } else {
            echo "<h2>Aucun compte ne correspond à votre mail, veuiller réessayez </h2>";
            header("refresh:1; url=login.php");
        }
    } catch (PDOException $e) {
        echo "extraction KO: " . $e->getMessage();
    }
}
?>
   