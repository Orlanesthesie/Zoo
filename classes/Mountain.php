<?php

class Avery extends Enclosure {

    private string $species = "Bird";
    private bool $roofCondition = true;

    //      CONSTRUCT
    public function __construct(string $species, bool $roofCondition)
    {
        $this-> species = $species;
        $this-> roofCondition = $roofCondition;
    }

    //      METHOD
    public function checkRoof()
    {
        // verifier l'etat du toit
    }


    //      GETTER 
    public function getSpecies()
    {
        return $this->species;
    }


     //      SETTER
     public function setSpecies($species)
     {
         if ($species == "Bird")
         {
             $this->species = $species;
         }
         else
         {
             throw new Exception("Make sure that the species is Bird");
         }
     }

}



?>