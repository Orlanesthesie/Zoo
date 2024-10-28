<?php

include "./config/autoload.php";
include "./config/connexion.php";

if (!empty($_POST['name'])
&& !empty($_POST['type'])
&& !empty ($_POST['zoo_id']))
{
    $enclosure = new Enclosure($_POST);

    $enclosureManager = new EnclosureManager($connexion);
    
    $enclosureManager->addEnclosure($enclosure);

    header ("Location: ");
}
