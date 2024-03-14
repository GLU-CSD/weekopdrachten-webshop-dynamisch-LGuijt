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

            echo '<div id="detailpage">';
            echo '<div id="detailtitle">' . $x["category"] . ' - ' . $title . '</div>';
            echo '<div id="detailpiccon">';
            echo '<div id="detailpicbig"><img class="detimg" id="bigpic" src="' . $x["img"] . '"></div>';
            echo '<div class="detailpicsmall"><img class="s detimg" id="one" src="' . $x["img"] . '"></div>';
            echo '<div class="detailpicsmall"><img class="s detimg" id="two" src="' . $x["imgtwo"] . '"></div>';
            echo '<div class="detailpicsmall"><img class="s detimg" id="three" src="' . $x["imgthree"] . '"></div>';
            echo '</div>';
            echo '<div id="detailtext">';
            echo '<div id="detailprice">€' . $x["price"] . '</div>';
            echo '<button id="addcart">Voeg toe aan winkelwagen</button>';
            echo '<button id="addfave">Voeg toe aan favorieten</button>';
            echo '<ul id="detailinfo">';
            foreach($x["detailinfo"] as $y){
                echo '<li>' . $y . '</li>';
            }
            echo '</ul>';
            echo '</div>';
            echo '</div>';
        }
    }
}
?>
<?php include './footer.php' ?>