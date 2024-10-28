<?php

class Aquarium extends Enclosure {

    private string $species = "Fish";
    private int $salinity;

    //      CONSTRUCT
    public function __construct(string $species, bool $salinity)
    {
        $this-> species = $species;
        $this-> salinity = $salinity;
    }

    //      METHOD
    public function checkWater()
    {
        if ($this->salinity = 5)   
        {
            echo "Salinity correct";
        }
        else if ($this->salinity < 5) 
        {
            echo "Salinity too low";
        }
        else if ($this->salinity > 5) 
        {
            echo "Salinity too hight";
        }
    }


    //      GETTER 

    public function getSpecies()
    {
        return $this->species;
    }

    public function getSalinity()
    {
        return $this->salinity;
    }


    //      SETTER

    public function setSpecies($species)
    {
        if ($species == "Fish")
        {
            $this->species = $species;
        }
        else
        {
            throw new Exception("Make sure that the species is Fish");
        }
    }

    public function setSalinity(int $salinity)
    {
        if ($salinity >= 0 && $salinity <= 10)
        {
            $this->salinity = $salinity;
        }
        else 
        {
            throw new Exception("Make sure that the salinity is set between 0 and 10");
        }
        
    }

}



?>