<?php
$productamount = 0;
$file_json = file_get_contents("../products.json");
$file = json_decode($file_json, true);

foreach ($file as $x) {
    $filter = filefilter($x);
    if ($x["category"] == "Kaarten" && $filter == true) {
        echo '<div class="product">';
        echo '<div class="pic"><a href="./detailpag.php?sku=' . $x["code"] . '"><img class="' . $x["imgsize"] . '" src="' . $x["img"] . '" alt="schilderij"></a></div>';
        echo '<div class="productname">' . $x["name"] . '</div>';
        echo '<div class="productprijs">€' . $x["price"] . '</div>';
        echo '<div class="productkleuren">';
        foreach ($x["colours"] as $y) {
            echo '<div class=' . $y . '></div>';
        }
        echo '</div>';
        echo '<div class="productmaat">' . $x["maat"] . '</div>';
        echo '<div class="bestelknop">';
        echo '<button onclick="cartCounter('. $x["code"].')">Bestel</button>';
        echo '</div>';
        echo '</div>';
        $productamount++;
    }
}

if ($productamount == 0) {
    echo 'Geen producten gevonden.';
}

function filefilter($prod)
{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $minCheck = false;
        $maxCheck = false;

        if (isset($_GET['minprice'])) {
            if ($_GET['minprice'] <= $prod['price']) {
                $minCheck = true;
            } else {
                $minCheck = false;
            }
        } else {
            $minCheck = true;
        }
        
        if (isset($_GET['maxprice'])) {
            if ($_GET['maxprice'] >= $prod['price']) {
                $maxCheck = true;
            } else {
                $maxCheck = false;
            }
        } else {
            $maxCheck = true;
        }

        if ($minCheck && $maxCheck) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}