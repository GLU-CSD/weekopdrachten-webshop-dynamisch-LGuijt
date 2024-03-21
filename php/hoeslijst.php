<?php

session_start();

$hoeslijst = $_REQUEST["hoes"];
$check = $_REQUEST["check"];

if ($check == "false") {
    if (!isset ($_SESSION["extrahoes"])) {
        $_SESSION["extrahoes"] = array();
        array_push($_SESSION["extrahoes"], $hoeslijst);
        echo $hoeslijst;
    } else {
        array_push($_SESSION["extrahoes"], $hoeslijst);
        echo $hoeslijst;
    }
} else if ($check == "true"){
    $key = array_search($hoeslijst, $_SESSION["extrahoes"]);
    if ($key !== false){
     unset($_SESSION["extrahoes"][$key]);
   }
   $_SESSION["extrahoes"] = array_values($_SESSION["extrahoes"]);
   echo $hoeslijst;
}