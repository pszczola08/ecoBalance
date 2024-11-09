<?php
session_start();
require "../lib/globalVariables.php";
require "../lib/functions.php";
$username = $_SESSION['username'];
$getId = DB -> query(
    "SELECT id FROM users WHERE username = '$username'"
);

if($getId) {
    $id = $getId -> fetch_row();
    $tbName = "user".$id[0]."_data";
    $create = DB -> query(
        "
            CREATE TABLE `ecobalance`.`$tbName` (

            `user_id` BIGINT(20) UNSIGNED NOT NULL , 
            `month` TINYINT NOT NULL , 
            `year` YEAR NOT NULL , 
            `usingCar` BOOLEAN NOT NULL , 
            `timesUsedPlane` TINYINT UNSIGNED NOT NULL , 
            `usingMotorcycle` BOOLEAN NOT NULL , 
            `usingPublicTransport` BOOLEAN NOT NULL , 
            `heatingType` SET('coal','gas','heatingOil','wood','otherNonRenewable','heatPump','pellets','solarPanels','otherRenewable') NOT NULL , 
            `usingAC` BOOLEAN NOT NULL , 
            `energySource` SET('renewable','nonRenewable') NOT NULL , 
            `eatingRedMeat` BOOLEAN NOT NULL , 
            `eatingDairy` BOOLEAN NOT NULL , 
            `eatingProcessedFood` BOOLEAN NOT NULL , 
            `eatingFruitAndVegetablesFromImport` BOOLEAN NOT NULL , 
            `timesBoughtFastFashion` TINYINT UNSIGNED NOT NULL , 
            `timesBoughtDevices` TINYINT UNSIGNED NOT NULL , 
            `timesBoughtAGD` TINYINT UNSIGNED NOT NULL , 
            `usingBottledWater` BOOLEAN NOT NULL , 
            `usingPaperDocuments` BOOLEAN NOT NULL , 
            `segregatingTrash` BOOLEAN NOT NULL 

        ) ENGINE = InnoDB;
        "
    );
    if($create) {
        DB -> close();
        $_SESSION['userId'] = $id;
        redirect("../main/panel.php", "_self");
    } else {
        DB -> close();
    }
} else {
    DB -> close();
}