<?php include './header.php' ?>
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
                    <?= $x["category"] . ' - ' . $title . '</div>'; ?>
                    <div id="detailpiccon">
                        <div id="detailpicbig"><img class="detimg" id="bigpic" src="<?= $x["img"] ?>" alt="big picture"></div>
                        <div class="detailpicsmall"><img class="s detimg" id="one" src="<?= $x["img"] ?>" alt="small picture"></div>
                        <div class="detailpicsmall"><img class="s detimg" id="two" src="<?= $x["imgtwo"] ?>" alt="small picture">
                        </div>
                        <div class="detailpicsmall"><img class="s detimg" id="three" src="<?= $x["imgthree"] ?>"
                                alt="small picture"></div>
                    </div>
                    <div id="detailtext">
                        <div id="detailprice">&euro;
                            <?= $x["price"] ?>
                        </div>
                        <button id="addcart" onclick="myFunction(<?= $x['code'] ?>)">Voeg toe aan winkelwagen</button>
                        <button id="addfave">Voeg toe aan favorieten</button>
                        <ul id="detailinfo">
                            <?php
                            foreach ($x["detailinfo"] as $y) {
                                echo '<li>' . $y . '</li>';
                            } ?>
                        </ul>
                    </div>
                </div>
                <?php
        }
    }
}
?>
    <script>

        function myFunction(code) {
            cartCounter(code);
            document.location = './winkelwagen.php';
        }

    </script>
    <?php include './footer.php' ?>