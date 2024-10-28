<?php
session_start();
require "../config/autoload.php";
require "../config/connexion.php";


if (!empty($_POST['name'] && (!empty($_POST['sex']))))
{
    $employee = new Employee ($_POST['name'], $_POST['sex']);
    
    $employeeManager = new EmployeeManager($connexion);
    $employeeManager->addEmployee($employee);

    $_SESSION['name']= $_POST['name'];
    $_SESSION['sex']= $_POST['sex'];
   
    header("Location: ../forest.php");
}

else 
{
    header("Location: ../index.php?failed=Error");
}