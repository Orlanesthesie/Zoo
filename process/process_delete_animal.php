<?php
include "../config/autoload.php";
include "../config/connexion.php";

if (!empty($_POST['id'])) {

    $animalManager = new AnimalManager($connexion);
    $animal = $animalManager->getAnimalById($_POST['id']);
    $animalManager->deleteAnimalById($animal);

    header('Location:' . $_SERVER['HTTP_REFERER']);
}
else {
    header ('Location:' .$_SERVER['HTTP_REFERER']);
}