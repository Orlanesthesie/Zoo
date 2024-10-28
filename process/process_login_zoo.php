<?php
session_start();
require "../config/autoload.php";
require "../config/connexion.php";

    $id = $_POST['id'];
    $zooManager = new ZooManager($connexion);
    $zoo = $zooManager->getZooById($id);


    $_SESSION['id']= $id;
    $_SESSION['name']= $zoo->getName();

   
    header("Location: ../forest.php");