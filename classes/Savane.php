<?php

class Savane extends Enclosure {

    private string $species = "Tiger";

    //      CONSTRUCT
    public function __construct(string $species)
    {
        $this-> species;
    }


    //      GETTER 
    public function getSpecies()
    {
        return $this->species;
    }


    //      SETTER
    public function setSpecies($species)
    {
        if ($species == "Tiger")
        {
            $this->species = $species;
        }
        else
        {
            throw new Exception("Make sure that the species is Tiger");
        }
    }

}



?>