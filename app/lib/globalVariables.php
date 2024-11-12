<?php

$connection = mysqli_connect (
    "localhost",
    "root",
    "",
    "ecobalance"
);

define("DB", $connection);