<?php 

class Forest extends Enclosure {

    private string $image = 'forest.jpg';

    private string $species = "Bear";

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
        if ($species == "Bear")
        {
            $this->species = $species;
        }
        else
        {
            throw new Exception("Make sure that the species is Bear");
        }
    }
}


?>