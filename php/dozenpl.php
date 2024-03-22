<?php
$productamount = 0;
$file_json = file_get_contents("../products.json");
$file = json_decode($file_json, true);

foreach ($file as $x) {
    $filter = filefilter($x);
    if ($x["category"] == "Dozen" && $filter == true) {
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
        echo '<button onclick="cartCounter('. $x["code"] .')">Bestel</button>';
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
        $colorCheck = false;
        $maatCheck = false;
        $minCheck = false;
        $maxCheck = false;

        if (isset($_GET['kleur'])) {
            $klr = $_GET['kleur'];
            foreach ($klr as $z) {
                foreach ($prod["colours"] as $a) {
                    if ($z === $a) {
                        $colorCheck = true;
                    }
                }
            }
        } else {
            $colorCheck = true;
        }

        if (isset($_GET['maat'])) {
            $mt = $_GET['maat'];
            foreach ($mt as $b) {
                if ($prod["maat"] === $b) {
                    $maatCheck = true;
                }
            }
        } else {
            $maatCheck = true;
        }

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

        if ($colorCheck && $maatCheck && $minCheck && $maxCheck) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}