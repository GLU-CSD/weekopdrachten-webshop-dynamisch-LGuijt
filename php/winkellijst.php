<?php

session_start();

$productcode = $_REQUEST["code"];
$status = $_REQUEST["status"];
$allow = true;




if ($status == "add") {
    if (!isset ($_SESSION["cartitems"])) {
        $_SESSION["cartitems"] = array();
        array_push($_SESSION["cartitems"], $productcode);
    } else {
        foreach ($_SESSION["cartitems"] as $x) {
            if ($x == $productcode) {
                $allow = false;
            }
        }
        if ($allow == true) {
            array_push($_SESSION["cartitems"], $productcode);
        }
    }
} else if ($status == "remove") {
    $key = array_search($productcode, $_SESSION["cartitems"]);
    if ($key !== false) {
        unset($_SESSION["cartitems"][$key]);
        $keyToo = array_search($productcode, $_SESSION["extrahoes"]);
        if ($keyToo !== false) {
            unset($_SESSION["extrahoes"][$keyToo]);
        }
        $_SESSION["extrahoes"] = array_values($_SESSION["extrahoes"]);
    }
    $_SESSION["cartitems"] = array_values($_SESSION["cartitems"]);
}