<?php

session_start();

$productcode = $_REQUEST["code"];

if(!isset($_SESSION["cartitems"])){
    $_SESSION["cartitems"] = array();
    array_push($_SESSION["cartitems"], $productcode);
} else {
    array_push($_SESSION["cartitems"], $productcode);
}