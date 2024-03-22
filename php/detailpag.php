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
            echo '<div id="detailpicbig"><img class="detimg" id="bigpic" src="' . $x["img"] . '" alt="big picture"></div>';
            echo '<div class="detailpicsmall"><img class="s detimg" id="one" src="' . $x["img"] . '" alt="small picture"></div>';
            echo '<div class="detailpicsmall"><img class="s detimg" id="two" src="' . $x["imgtwo"] . '" alt="small picture"></div>';
            echo '<div class="detailpicsmall"><img class="s detimg" id="three" src="' . $x["imgthree"] . '" alt="small picture"></div>';
            echo '</div>';
            echo '<div id="detailtext">';
            echo '<div id="detailprice">€' . $x["price"] . '</div>';
            echo '<button id="addcart" onclick="myFunction('. $x["code"] .')" >Voeg toe aan winkelwagen</button>';
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
<script>

function myFunction(code){
    cartCounter(code);
    document.location = './winkelwagen.php';
}

</script>
<?php include './footer.php' ?>