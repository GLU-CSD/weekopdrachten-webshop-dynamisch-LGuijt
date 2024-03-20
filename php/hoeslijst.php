<?php

session_start();

$hoeslijst = $_REQUEST["hoes"];

if (!isset($_SESSION["extrahoes"])){
    $_SESSION["extrahoes"] = array();
    array_push($_SESSION["extrahoes"], $hoeslijst);
    echo $hoeslijst;
} else {
    array_push($_SESSION["extrahoes"], $hoeslijst);
    echo $hoeslijst;
}