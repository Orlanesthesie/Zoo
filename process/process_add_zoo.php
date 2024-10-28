<?php 
session_start();
require "../config/autoload.php";
require "../config/connexion.php";

if (!empty($_POST['name'])){

    $zoo = new Zoo($_POST);

    $zooManager = new ZooManager($connexion);
    $zooManager->addZoo($zoo);

    $_SESSION['name'] = $_POST['name'];

    header('Location: /forest.php?success');
}

else {
    header ("Location: /index.php?error");
}