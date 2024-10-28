<?php

class AnimalManager {
    private $connexion;

    public function __construct($connexion)
    {

        $this-> connexion = $connexion;
    }

    public function getAnimalById($id)
    {
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM animal WHERE id = ?"
        );
        $preparedRequest->execute([
            $id
        ]);

        $data = $preparedRequest->fetch(PDO::FETCH_ASSOC);

        $classname = ucfirst($data['species']);
        if (class_exists($classname)) {
            return new $classname($data);
        }else{
            echo "errorrrr";
        }

        switch ($data['species']) {
            case 'bear':
                return new Bear($data);
                break;

            case 'tiger':
                return new Tiger($data);
                break;
            
            case 'fish':
                return new Fish($data);
                break;
                
            case 'eagle':
                return new Eagle($data);
                break; 

            default:
                echo "error";
                break;
        }
    }

    public function UpdateAnimal(Animal $animal)
    {
        $preparedRequest = $this->connexion->prepare(
            "UPDATE animal SET hungry = ? WHERE id = ?"
        );
        $preparedRequest->execute([
            $animal->getHungry(),
            $animal->getId()
        ]);
    }

    public function depleatHungryness(Animal $animal)
    {
        
        $animal->setHungry($animal->getHungry() - 10);
        $this->UpdateAnimal($animal);
    }

    public function getAll()
    {
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM animal"
        );

        $preparedRequest->execute();
        $animalArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

        $animals = [];
        foreach ($animalArray as $line) {
            $className = ucfirst($line['species']);
            $animal = new $className($line);

            $animals[] = $animal; 
        }

        return $animals;
    }

    public function addAnimal(Animal $animal)
    {
        $preparedRequest = $this->connexion->prepare(
            "INSERT INTO animal (name, species, weight, size, age, sex) VALUES (?,?,?,?,?,?)"
        );
        $preparedRequest->execute([
            $animal->getName(),
            $animal->getSpecies(),
            $animal->getWeight(),
            $animal->getSize(),
            $animal->getAge(),
            $animal->getSex()
        ]);
    }

    public function deleteAnimalById(Animal $animal)
    {
        $preparedRequest = $this->connexion->prepare(
            "DELETE FROM animal WHERE id = ?"
        );
        $preparedRequest->execute([
            $animal->getId()
        ]);
    }

    public function getAnimalsBySpecies($species)
    {
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM animal WHERE species = ?"
        );
        $preparedRequest->execute([
            $species
        ]);

        $animalArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

        $animals = [];
        foreach ($animalArray as $line) {
            $className = ucfirst($line['species']);
            $animal = new $className($line);

            $animals[] = $animal; 
        }

        return $animals;
    }

    public function hungryRand(Animal $animal)
    {
        $rand = rand(0, 100);
        $preparedRequest = $this->connexion->prepare(
            "UPDATE animal SET hungry = ? WHERE species = ?"
        );
        $preparedRequest->execute([
            $rand,
            $animal->getSpecies()
        ]);
    }

    public function sickRand(Animal $animal)
    {
        $rand = rand(0, 100);
        $preparedRequest = $this->connexion->prepare(
            "UPDATE animal SET sick = ? WHERE species = ?"
        );
        $preparedRequest->execute([
            $rand,
            $animal->getSpecies()
        ]);
    }

    // public function feedAnimalById(Animal $animal)
    // {
    //     $preparedRequest = $this->connexion->prepare(
    //         "UPDATE animal SET hungry = . WHERE id = ?"
    //     );
    //     $preparedRequest->execute([
    //         $animal->setHungry(100),
    //         $animal->getId()
    //     ]);
    // }

}