<?php


class ZooManager {
    private $connexion;


    // CONSTRUCT
    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    // METHOD
    public function addZoo(Zoo $zoo)
    {
        $checkDuplicate=$this->connexion->prepare(
            "SELECT id FROM zoo WHERE name = ?"
        );
        $checkDuplicate->execute([
            $zoo->getName()
        ]);
        $duplicateExists = $checkDuplicate->fetch(PDO::FETCH_ASSOC);

        if ($duplicateExists)
        {
            return $duplicateExists;
        }
        else
        {
            $preparedRequest= $this->connexion->prepare(
            "INSERT INTO zoo (name, numberEnclosureMax) VALUES (?,?)"
        );
        $preparedRequest->execute([
            $zoo->getName(),
            $zoo->getNumberEnclosureMax()
        ]);
        } 
    }

    public function getAll()
    {
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM zoo "
        );
        $preparedRequest->execute();

        $zoosArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        $zoosArrayObject = [];

        foreach ($zoosArray as $line) {
            $zoo = new Zoo($line);
            $zoosArrayObject[]= $zoo;
        }
        return $zoosArrayObject;
    }

    public function getZooById($id)
    {
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM zoo WHERE id = ?"
        );
        $preparedRequest->execute([
            $id
        ]);

        $line = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        $zoo = new Zoo($line);
        return $zoo;
    }
}