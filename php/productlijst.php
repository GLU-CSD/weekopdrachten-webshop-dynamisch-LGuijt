<?php
$productamount = 0;
$file_json = file_get_contents("../products.json");
$file = json_decode($file_json, true);

foreach ($file as $x) {
    $filter = filefilter($x);
    if ($x["category"] == $currentcat && $filter == true) {
        ?>
        <div class="product">
            <div class="pic"><a href="./detailpag.php?sku=<?= $x["code"] ?>"><img class="<?= $x["imgsize"] ?>"
                        src="<?= $x["img"] ?>" alt="schilderij"></a></div>
            <div class="productname">
                <?= $x["name"] ?>
            </div>
            <div class="productprijs">&euro;
                <?= $x["price"] ?>
            </div>
            <div class="productkleuren">
                <?php
                foreach ($x["colours"] as $y) {
                    echo '<div class=' . $y . '></div>';
                } ?>
            </div>
            <div class="productmaat">
                <?= $x["maat"] ?>
            </div>
            <div class="bestelknop">
                <button onclick="cartCounter(<?= $x['code'] ?>)">Bestel</button>
            </div>
        </div>
        <?php
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
        $typeCheck = false;
        $minCheck = false;
        $maxCheck = false;
        $maatCheck = false;

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

        if (isset($_GET['type'])) {
            $mt = $_GET['type'];
            foreach ($mt as $b) {
                if ($prod["type"] === $b) {
                    $typeCheck = true;
                }
            }
        } else {
            $typeCheck = true;
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

        if ($colorCheck && $typeCheck && $maatCheck && $minCheck && $maxCheck) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}