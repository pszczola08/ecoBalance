<?php

session_start();
if(!isset($_SESSION['userId'])) {
    require "./functions.php";
    redirect("../user/languages/login.php", "_self");
}