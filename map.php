<?php
session_start();

include "./config/autoload.php";
include "./config/connexion.php";
include "./partials/header.php";

?>

<!-- NAVBAR -->
    <div class="col-12 p-0">
        <nav class="navbar">
            <a href="" title="Home"> <img src="./assets/images/logo.png" class="logo-house"></a>
            <h3 class="navbar-brand"> Welcome <?= $_SESSION['name'] ?></h3>
            <!-- <a class="navbar-brand"> Where do you want to start ? </a> -->
            <a class="navbar-brand" href="./process/process_logout.php">Out</a>
        </nav>

        <!-- PHOTO MAP -->
        <div class="corps-forest row">

        <div class="col-6 p-0">
            <a href="./forest.php"><img src="./assets/images/forest.jpg" class="img-map-forest"></a>
            <a href="./mountain.php"><img src="./assets/images/mountain1.jpg" class="img-map-mountain"></a>
            
        </div>
        <div class="col-6 p-0">
            <a href="./savane.php"><img src="./assets/images/savane.jpg" class="img-map-savane"></a>
            <a href="./aquarium.php"><img src="./assets/images/aquarium1.jpg" class="img-map-aquarium"></a>
        </div>
          

            <!-- afficher le nombre d ours presents dans la bdd -->
        </div>
    </div>
</div>