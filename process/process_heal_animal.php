<?php

include "../config/autoload.php";
include "../config/connexion.php";


if (!empty ($_POST['id'])
// && IL EST MALADE -> heal = 1
) 
{
    // LE GUERIR

    header ('Location:' .$_SERVER['HTTP_REFERER']. 'healed! ');
}
else 
{
    header ('Location:' .$_SERVER['HTTP_REFERER']. 'not sick !');
}