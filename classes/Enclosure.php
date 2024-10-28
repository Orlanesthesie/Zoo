<?php 

abstract class Enclosure {

    private int $id;
    private string $name;
    private int $cleanliness = 100;
    private int $numberMaxAnimals = 6;
    private array $animals = [];
    private string $type;
    private int $zoo_id;


    //      CONSTRUCTEUR
    public function __construct(array $data)
    {
        $this->hydrate($data);
    } 


    //      HYDRATE
    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    //      METHOD
    public function presentation()
    {
        echo " This enclosure contains $this->numberMaxAnimals $this->name";
    }

    public function showAnimals()
    {
        // afficher les caractéristiques des animaux qu'il contient
    }

    public function addAnimals($animal)
    {
        $thisanimals[] = $animal;
    }
    
    public function removeAnimals()
    {
        // enlever des animaux de l'enclos
    }

    public function maintain ()
    {
        // entretenir l'enclos si il est vide
        // if (is empty) {
        //     setCleanliness() = good
        // }
    }


    //      GETTER
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNumberMaxAnimals()
    {
        return $this->numberMaxAnimals;
    }

    public function getCleanliness()
    {
        return $this->cleanliness;
    }

    public function getAnimals()
    {
        return $this->animals;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getZooId(){
        return $this->zoo_id;
    }

    
    //      SETTER
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setNumberAnimals($numberMaxAnimals)
    {
        $this->numberMaxAnimals = $numberMaxAnimals;
    }

    public function setCleanliness($cleanliness)
    {
        $this->$cleanliness = $cleanliness;
    }

    public function setAnimals($animals)
    {
        $this->animals = $animals;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setZooId($zoo_id){
        $this->zoo_id = $zoo_id;
    }

}