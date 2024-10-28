<?php
session_start();
include "./config/autoload.php";
include "./config/connexion.php";
include "./partials/header.php";

$animalManager = new AnimalManager($connexion);
$animals = $animalManager->getAnimalsBySpecies('bear');

foreach ($animals as $animal) {
    $animalManager->depleatHungryness($animal);
}
?>

<!-- MARRON / BLUR -->
<div class="row">
    <div class="col-2 marron-blur">
        <h1>Welcome to <?= $_SESSION['name'] ?></h1>
        <?php foreach ($animals as $key => $animal) { ?>
            <!-- <img src="./assets/images/bear.png" class="img-bear" style="left:<?= $key * 90 + 1000 ?>px; top:75%"> -->
        <?php } ?>

        <a href="" title="Home"> <img src="./assets/images/logo.png" class="logo-maison"></a>

        <!-- MODALE OUT -->
        <div id="openModal2" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <h2 class="text-center">Time to leave ?</h2>
                    <p> Feel free to come back when you want!</p>
                    <form action="./process/process_logout.php" method="post">
                        <button type="submit" class="btn">Bye</button>
                    </form>
                </div>
            <a href="#close" title="Close" class="close">x</a>
        </div>

        <!-- MODALE OUT -->
        <div id="openModal2" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <h2 class="text-center">Time to leave ?</h2>
                    <p> Feel free to come back when you want!</p>
                    <form action="./process/process_logout.php" method="post">
                        <button type="submit" class="btn">Bye</button>
                    </form>
                </div>
            <a href="#close" title="Close" class="close">x</a>
        </div>

        <!-- MODALE ADD -->
        <h3 class="text-center mt-5"><a href="#openModal">Add a bear</a></h3>
        <?php if (count($animals) <= 3) { ?>
            <div id="openModal" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <h2 class="text-center">Let's add a bear !</h2>
                    <p> Kindly specify the rescued bear's name, weight, size, age, and gender.</p>
                    <form action="./process/process_add_animal.php" method="post">
                        <p> name <input type="text" name="name" id="name"> </p>
                        <p> weight <input type="number" name="weight" id="weight"> kg </p>
                        <p> size <input type="number" name="size" id="size"> cm </p>
                        <p> age <input type="number" name="age" id="age"> years old </p>
                        <input type="hidden" name="species" id="species" value="bear">
                        <input type="radio" name="sex" id="sex" value="Male"> Male
                        <input type="radio" name="sex" id="sex" value="Female"> Female <br>
                        <button type="submit" class="btn">Add</button>
                    </form>
                </div>
                <a href="#close" title="Close" class="close">x</a>
            </div>
        <?php } else { ?>
            <div id="openModal" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <h2 class="text-center">Let's add a bear !</h2>
                    <p> There are already too many bears. Release one before adding another.</p>
                </div>
                <a href="#close" title="Close" class="close">x</a>
            </div>
        <?php } ?>
        

        <!-- MODALE DELETE -->
        <h3 class="text-center mt-5"><a href="#openModal1">Release a bear</a></h3>
        <?php if (count($animals) !== 0) { ?>
            <div id="openModal1" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <h2>Let's release a bear !</h2>
                    <p> It's time to release this animal to it's home !</p>
                    <form action="./process/process_delete_animal.php" method="post">
                        <select name="id" id="pet-select">
                            <option value=""> Please choose a bear </option>
                            <?php foreach ($animals as $key => $animal) { ?>
                                <option value="<?= $animal->getId() ?>"> <?= $animal->getName() ?> </option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn">Release</button>
                    </form>
                </div>
                <a href="#close" title="Close" class="close">x</a>
            </div>
        <?php } else { ?>
            <div id="openModal1" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <h2 class="text-center">Let's release a bear !</h2>
                    <p> All the bears have been released back into the wild !</p>
                </div>
                <a href="#close" title="Close" class="close">x</a>
            </div>
        <?php } ?>
        </div> 

        <!-- NAVBAR -->
        <div class="col-10 p-0">
        <nav class="navbar">
            <a class="navbar-brand" href="./aquarium.php">Aquarium</a>
            <a class="navbar-brand " href="./night-forest.php">Night Forest</a>
            <a class="navbar-brand" href="./forest.php">Forest</a>
            <a class="navbar-brand " href="./jungle.php">Jungle</a>
            <a class="navbar-brand" href="#openModal2">Out</a>
        </nav>
    
        
        
        <!-- PHOTO FORET -->
        <div class="corps-forest p-0 ">
            <img src="./assets/images/forest.jpg" class="img-forest">
            <div class="d-flex justify-content-around align-items-end">
                <?php foreach ($animals as $key => $animal) { ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="./assets/images/ours-cute.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center"> <?= $animal->getName() ?> </h5>
                            <div class="progress mb-1">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
                                role="progressbar" 
                                aria-valuenow="<?= $animal->getHungry() ?>" 
                                aria-valuemin="0" 
                                aria-valuemax="100" 
                                style="width: <?= $animal->getHungry() ?>%"> <?= $animal->getHungry() ?> </div>
                            </div>
                            
                            <div class="d-flex justify-content-around">
                                <form action="/process/process_feed_animal.php" method="post">
                                    <input type="hidden" name="id" id="id" value=<?= $animal->getId() ?>>
                                    <button type="submit" class="btn btn-outline-primary">Feed</button>
                                </form>
                                <!-- <form action="/process/process_heal_animal.php" method="post">
                                            <input type="hidden" name="id" id="id" value=<?= $animal->getId() ?>>
                                            <button type="submit" class="btn btn-outline-success">Heal</button>
                                        </form> -->
                                    </div>
                                </div>
                    </div>
                    <!-- <img src="./assets/images/bear.png" class="img-bear" style="left:<?= $key * 90 + 1000 ?>px; top:75%"> -->
                <?php } ?>
            </div>
        </div>
    </div>
</div>
    