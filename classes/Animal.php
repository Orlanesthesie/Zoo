<?php

abstract class Animal {
    protected int $id;
    protected string $species;
    protected string $name;
    protected int $weight;
    protected int $size;
    protected int $age;
    protected string $sex;
    protected int $hungry;
    protected bool $sleep = false;
    protected int $sick;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this -> $method($value);
            }
        }
    }

    //      METHOD
    public function eat()
    {
        if ($this->hungry >= 0) {
            $this->hungry = 110;
        }
        // echo "Yummy";
    }


    //      GETTER 
    public function getId(){
        return $this->id;
    }
    public function getSpecies(){
        return $this->species;
    }

    public function getName(){
        return $this->name;
    }

    public function getWeight(){
        return $this->weight;
    }

    public function getSize(){
        return $this->size;
    }

    public function getAge(){
        return $this->age;
    }

    public function getSex(){
        return $this->sex;
    }

    public function getHungry(){
        return $this->hungry;
    }

    public function getSick(){
        return $this->sick;
    }



    //      SETTER
    public function setId($id){
        $this->id = $id;
    }
    public function setSpecies($species){
        $this->species = $species;
    }
    
    public function setName($name){
        $this->name = $name;
    }

    public function setWeight($weight){
        $this->weight = $weight;
    }

    public function setSize($size){
        $this->size = $size;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function setSex($sex){
        $this->sex = $sex;
    }

    public function setHungry($hungry){
        $this->hungry = $hungry;
    }

    public function setSick($sick){
        $this->sick = $sick;
    }
    
}

?>