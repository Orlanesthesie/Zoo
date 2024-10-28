<?php
session_start();
include "./partials/header.php";
include "./config/autoload.php";
include "./config/connexion.php";

$zooManager = new ZooManager($connexion);
$zoos = $zooManager->getAll();

?>


<div class="row">
    <div class="col-2 marron-blur">
        <a href="./index.php" title="Home"> <img src="./assets/images/logo.png" class="logo-maison"></a>
        <h3 class="text-center greetings">Greetings to the Sanctuary! </h3>
        <h5 class="text-justify this-is-a-place"> "This is a sanctuary dedicated to the care of rescued wild animals. 
            Although saved from captivity, these animals have become too accustomed to socialization, 
            making an immediate return to the wild challenging. 
            To begin, please give a name to your sanctuary or choose an existing one, so we can commence their care journey!"
        </h5>
    </div>
    <div class="col-10">
        <div class="container corps-photo marron1 mt-5">
            <img src="./assets/images/test.jpg" class="d-block mx-auto img-photo">
        </div>
        <div class="row d-flex">
            <div class="container corps-pseudo marron1 mt-5">
                <h3 class="text-center mb-4">Create a sanctuary</h3>
                <form action="./process/process_add_zoo.php" method="post">
                    <input class="form-control" name="name" type="text" placeholder="Your sanctuary's name">
                    <button type="submit" class="btn btn-success d-flex mx-auto mt-4">Go !</button>
                </form>
            </div>

            <div class="container corps-pseudo marron1 mt-5">
                <h3 class="text-center mb-4">Select a sanctuary</h3>
                <form action="./process/process_login_zoo.php" method="post">
                        <select name="id" id="zoo-select">
                            <option value="" class=""> Please choose a sanctuary </option>
                            <?php foreach ($zoos as $key => $zoo) { ?>
                                <option value="<?= $zoo->getId() ?>"> <?= $zoo->getName() ?>  </option>
                            <?php } ?>
                        </select>
                    <button type="submit" class="btn btn-success d-flex mx-auto mt-4" >Go !</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>


<!-- <form action="./process/employee/process_add_employee.php" method="post">
    <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
    <input type="radio" name="sex" id="men" value="Men"> Men 
    <input type="radio" name="sex" id="women" value="Woman"> Woman
        <button type="submit" class="btn">Go !</button>
    </form>  -->



<?php
include "./partials/footer.php"
?>