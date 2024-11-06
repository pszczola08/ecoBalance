<?php

function redirect($path, $target) {
    echo "<script>";
    echo "window.open('$path', '$target')";
    echo "</script>";
}