<?php include './header.php' ?>
<div id="wagen">
    <div id="wwtxt">Winkelwagen</div>
    <div id="date"><?php echo date("d-m-Y"); ?></div>
    <div id="imgcon">
        <?php
        $totalprice = 0;
        $artikelamount = 0;
        $zendkosten = 4.35;
        $file_json = file_get_contents("../products.json");
        $file = json_decode($file_json, true);

        foreach ($_SESSION["cartitems"] as $prcode) {
            foreach ($file as $p) {
                if ($p["code"] == $prcode) {
                    $extrahoes = false;
                    foreach ($_SESSION["extrahoes"] as $q){
                        if ($q == $p["code"]){
                            $extrahoes = true;
                        }
                    }
                    if ($extrahoes == true){
                        echo "in array";
                    } else if ($extrahoes == false){
                        echo "not in array";
                    }
                    echo '<div class="items">';
                    echo '<div class="trashcan"><img src="../assets/iconen/delete.png"></div>'; 
                    echo '<div class="itemimg"><img src="' . $p["img"] .'"></div>';
                    echo '<div class="itemtitle">'. $p["type"] ." " . $p["name"] . '</div>';
                    echo '<div class="itemprice">€' . $p["price"] . '</div>';
                    echo '<p class="hoescheck" id="hoescheck' . $p["code"] . '"><input type="checkbox" onchange="toggle(' . $p["code"] . ');" value="yes" name="hoescheck' . $p["code"] . '">';
                    echo 'Extra beschermende hoes?';
                    echo '<p>';
                    $price = $p["price"];
                    echo '<div class="hoesprijs">€5,00</div>';
                    echo '<div class="itemtotal">€' . $price . '</div>';
                    echo '</div>';
                    $totalprice += $price;
                    $artikelamount++;
                }
            }
        }

        $btw = $totalprice * 0.21;
        $fulltotal = $totalprice + $zendkosten + $btw;
        ?>
    </div>
    <div id="overzicht">
        <div>
            <div>artikel(en)(<?php echo $artikelamount ?>)</div>
            <div><?php echo $totalprice ?></div>
        </div>
        <div>
            <div>verzendkosten</div>
            <div><?php echo $zendkosten ?></div>
        </div>
        <div>
            <div>BTW</div>
            <div><?php echo $btw ?></div>
        </div>
        <div id="total"></div>
        <button>Verder naar Bestellen</button>
    </div>
</div>
<?php include './footer.php' ?>