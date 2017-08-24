<?php
session_start();
//Inclusion
require 'class/Autoloader.php';
Autoloader::register();

//Requêtes
$DB = new DB('localhost', 'root', '', 'graphshop', null);
$usersmanager = new UsersManager($DB->db);

if (isset($_POST)) {
    $user = new user([
        'lastName' => $_POST['lastName'],
        'firstName' => $_POST['firstName'],
        'mail' => $_POST['mail'],
        'tel' => $_POST['tel'],
        'password' => md5($_POST['password']),
        'birthdate' => $_POST['birthdate'],
        'adresse' => $_POST['adresse'],
        'cp' => $_POST['cp'],
        'ville' => $_POST['ville'],
        'country' => $_POST['country']
    ]);
    try {
        $usersmanager->addUser($user);
        echo "<h2>Vous êtes désormais inscrit " . $user->getFirstName() . " " . $user->getLastName() . " Redirection dans 2 secondes...</h2>.";
        header("refresh:2 ;url=index.php");
    } catch (PDOException $e) {
        echo "insertion KO: " . $e->getMessage();
        header("refresh:2 ;url=registration.php");
    }
}
?>
   