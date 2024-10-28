<?php 

class Employee {

    private string $name;
    private string $sex;


    //      CONSTRUCTEUR
    public function __construct(string $name, string $sex){
        $this->name = $name;
        $this->sex = $sex;
    }


    //      METHOD 
    public function checkEnclosure(){
        // afficher les animaux contenus dans l'enclos + les caractéristiques de l'enclos
    }

    public function cleanEnclosure(){
        // nettoyer l'enclos si il est sale et vide
    }

    public function feed(){
        // nourrir les animaux si ils ne dorment pas
    }

    public function addAnimal(){
        // ajouter un animal a l'enclos lorsque c'est possible
    }

    public function removeAnimal(){
        // enlever une animal d'un enclos
    }

    public function transferAnimal(){
        // transferer un animal d'un enclos à l'autre
    }


    //      GETTER
    public function getName()
    {
        return $this-> name;
    }

    public function getSex()
    {
        return $this-> sex;
    }


    //      SETTER 
    public function setName($name){
        $this->name = $name;
    }

    public function setSex($sex){
        $this->sex = $sex;
    }
}

?>