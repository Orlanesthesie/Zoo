<?php
require "../config/autoload.php";
require "../config/connexion.php";

$id = $_POST['id'];

$animalManager = new AnimalManager($connexion);
$animalToFeed = $animalManager->getAnimalById($id);

$animalToFeed->eat();

$animalManager->UpdateAnimal($animalToFeed);
header('Location:' . $_SERVER['HTTP_REFERER']);