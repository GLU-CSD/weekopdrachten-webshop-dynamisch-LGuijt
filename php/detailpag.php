<?php
$pagetitle = "Product";
include './header.php'; ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sku = $_GET["sku"];
    $file_json = file_get_contents("../products.json");
    $file = json_decode($file_json, true);
    foreach ($file as $x) {
        if ($x["code"] == $sku) {

            if ($x["category"] == "Accesoires") {
                $title = $x["name"];
            } else {
                $title = $x["type"] . ' ' . $x["name"];
            }
            ?>
            <div id="detailpage">
                <div id="detailtitle">
                    <?= $x["category"] . ' - ' . $title ?>
                </div>
                <div id="detailpiccon">
                    <div id="detailpicbig"><img class="detimg" id="bigpic" src="<?= $x["img"] ?>" alt="big picture"></div>
                    <div class="detailpicsmall"><img class="s detimg" id="one" src="<?= $x["img"] ?>" alt="small picture"></div>
                    <div class="detailpicsmall"><img class="s detimg" id="two" src="<?= $x["imgtwo"] ?>" alt="small picture">
                    </div>
                    <div class="detailpicsmall"><img class="s detimg" id="three" src="<?= $x["imgthree"] ?>" alt="small picture">
                    </div>
                </div>
                <div id="detailtext">
                    <div id="detailprice">&euro;
                        <?= $x["price"] ?>
                    </div>
                    <button id="addcart" onclick="cartCounter(<?= $x['code'] ?>)">Voeg toe aan winkelwagen</button>
                    <button id="addfave">Voeg toe aan favorieten</button>
                    <ul id="detailinfo">
                        <?php
                        foreach ($x["detailinfo"] as $y) {
                            echo '<li>' . $y . '</li>';
                        }
                        ?>
                    </ul>
                </div>
                <div id="extraproducten">
                    <div id="soortprod">Soortgelijke producten</div>
                    <?php
                    foreach ($x["extras"] as $e) {
                        ?>
                        <div class="extra">
                            <?php foreach ($file as $z) {
                                if ($e == $z["code"]) {
                                    ?>
                                    <div class="extraimg"><a href="./detailpag.php?sku=<?= $z["code"] ?>" target="_blank"><img
                                                src="<?= $z["img"] ?>"></a></div>
                                    <div class="extratitle">
                                        <?= $z["category"] . ' - ' . $z["name"] ?>
                                    </div>
                                    <div class="extraprice">&euro;
                                        <?= $z["price"] ?>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
}
?>
<script>

</script>
<?php include './footer.php' ?>