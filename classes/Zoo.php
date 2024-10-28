<?php

class Zoo {

    private int $id;
    private string $name;
    private int $numberEnclosureMax = 6;
    private array $enclosure = [];

    
    // CONSTRUCT
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    //      METHOD
    public function addEnclosure($enclosure)
    {
        // $this->enclosure[] = $enclosure;
        array_push($this->enclosure, $enclosure);
    }

    public function showEnclosure()
    {
        // afficher le contenu de tout les enclos
    }

    public function numberAnimals()
    {
        // afficher le nombre d'animaux présents dans le zoo
    }

    public function main()
    {
        // pour chaque animaux du zoo on va aléatoirement mofifier les valeur d'instance de cet animal: malade, faim, dort
        // pour quache enclos, on modifie aléatoirement son etat de propreté, + salinité pour les fish + etat du toit pour les birds
        // passer la main a l'employe pour qu'il s'occupe du zoo
        // while ($a <= 10) {
        //     # code...
        // }
    }

    // GETTER

    public function getId()
    {
       return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNumberEnclosureMax()
    {
        return $this->numberEnclosureMax;
    }

    // SETTER  
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setNumberEnclosureMax($numberEnclosureMax)
    {
        $this->numberEnclosureMax = $numberEnclosureMax;
    }
}