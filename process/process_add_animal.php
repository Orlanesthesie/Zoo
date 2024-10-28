<?php

include "../config/autoload.php";
include "../config/connexion.php";


if (!empty($_POST['name'])
    && !empty ($_POST['weight'])
    && !empty ($_POST['size'])
    && !empty ($_POST['age'])
    && !empty ($_POST['species'])
    && !empty ($_POST['sex']))
    {
        $data = [
            'species' => $_POST['species'],
            'name' => $_POST['name'],
            'weight' => $_POST['weight'],
            'size' => $_POST['size'],
            'age' => $_POST['age'],
            'sex' => $_POST['sex']
        ];
        
        $classname = ucfirst($data['species']);
        if (class_exists($classname)) {
            $animal = new $classname($data);
        }else{
            echo "errorrrr";
        }
        $i = intval("5");
        switch ($i) {
            case $i > 5 :
                # code...
                break;
            
            case $i < 5 :
                # code...
                break;
            
            default:
                # code...
                break;
        }

        // switch ($data['species']) {
        //     case 'eagle':
        //         $animal = new Eagle($data);
        //         break;

        //     case 'fish' :
        //         $animal = new Fish($data);
        //         break;

        //     case 'bear': 
        //         $animal = new Bear($data);
        //         break;
            
        //     case 'tiger':
        //         $animal = new Tiger($data);
        //         break;

        //     default:
        //         echo "errorrrr";
        //         break;
        //    }
  
        $animalManager = new AnimalManager($connexion);
        $animalManager->addAnimal($animal);
    
    header ('Location:' .$_SERVER['HTTP_REFERER']);

    }
else {
    header ('Location:' .$_SERVER['HTTP_REFERER']);
}
