<?php

class EnclosureManager {
    private $connexion;

    public function __construct($connexion){

        $this-> connexion = $connexion;
    }

    public function addEnclosure(Enclosure $enclosure){
        $preparedRequest = $this->connexion->prepare(
            "INSERT INTO enclos (name, zoo_id, cleanliness, type, number_max_animals) VALUE (?,?,?,?,?)"
        );
        $preparedRequest->execute([
            $enclosure->getName(),
            $enclosure->getZooId(),
            $enclosure->getCleanliness(),
            $enclosure->getType(),
            $enclosure->getNumberMaxAnimals()
        ]);
    }

    public function findByZooID(Zoo $zoo){
        
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM enclos WHERE zoo_id = ?"
        );
        $preparedRequest->execute([$zoo->getId()]);

        $enclosArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

        foreach ($enclosArray as $line) {
            $enclos = new Enclosure($line);
            $zoo->addEnclosure($enclos);
        }
    }
}