<?php
class EmployeeManager {
    private $connexion;

    public function __construct($connexion){
        $this-> connexion = $connexion;
    }

    public function addEmployee($employee)
    {
        $preparedRequest = $this->connexion->prepare(
            "INSERT INTO employee (name, sex) VALUES (?,?)"
        );
        $preparedRequest->execute([
            $employee->getName(),
            $employee->getSex(),
        ]); 
    }
}