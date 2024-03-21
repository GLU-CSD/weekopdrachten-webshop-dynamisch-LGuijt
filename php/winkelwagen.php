<?php include './header.php' ?>
<div id="wagen">
    <div id="wwtxt">Winkelwagen</div>
    <div id="date">
        <?php echo date("d-m-Y"); ?>
    </div>
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
                    foreach ($_SESSION["extrahoes"] as $q) {
                        if ($q == $p["code"]) {
                            $extrahoes = true;
                        }
                    }
                    echo '<div class="items">';
                    echo '<div class="trashcan" onclick="trashcan(' . $p["code"] . ')"><img src="../assets/iconen/delete.png"></div>';
                    echo '<div class="itemimg"><img src="' . $p["img"] . '"></div>';
                    echo '<div class="itemtitle">' . $p["type"] . " " . $p["name"] . '</div>';
                    echo '<div class="itemprice">€' . $p["price"] . '</div>';
                    if ($extrahoes == true) {
                        echo '<p class="hoescheck" id="hoescheck' . $p["code"] . '"><input type="checkbox" id="checkbox' . $p["code"] . '" onclick="toggle(' . $p["code"] . ', true);" value="yes" name="hoescheck' . $p["code"] . '" checked>';
                        echo 'Extra beschermende hoes?';
                        echo '<p>';
                        echo '<div class="hoesprijs" id="hoesprijs' . $p["code"] . '" style="opacity:1">€5.00</div>';
                        $h = 5;
                    } else if ($extrahoes == false) {
                        echo '<p class="hoescheck" id="hoescheck' . $p["code"] . '"><input type="checkbox" id="checkbox' . $p["code"] . '" onclick="toggle(' . $p["code"] . ', false);" value="yes" name="hoescheck' . $p["code"] . '">';
                        echo 'Extra beschermende hoes?';
                        echo '<p>';
                        echo '<div class="hoesprijs" id="hoesprijs' . $p["code"] . '">€5.00</div>';
                        $h = 0;
                    }
                    $price = $p["price"] + $h;

                    echo '<div class="itemtotal">€<span id="totalitemprice' . $p["code"] . '">' . $price . '</span></div>';
                    echo '</div>';
                    $totalprice += $price;
                    $artikelamount++;
                }
            }
        }

        if ($artikelamount == 0) {
            echo "geen producten in winkelmand";
        }
        $totalprice = number_format($totalprice, 2);
        $btw = $totalprice * 0.21;
        $btw = number_format($btw, 2);
        $fulltotal = $totalprice + $zendkosten + $btw;
        $fulltotal = number_format($fulltotal, 2);
        ?>
    </div>
    <div id="overzicht">
        <div id="overzichttext">Overzicht</div>
        <div id="lijstprijs">
            <div id="p1">Artikel(en)(
                <?php echo $artikelamount ?>
                )
            </div>
            <div id="artikelprijzen">€
                <span id="combiprijs">
                    <?php echo $totalprice ?>
                </span>
            </div>
            <div id="p2">Verzendkosten</div>
            <div id="zendkost"><!-- CHANGE LATER -->
                €<span id="ugh">
                    <?php echo $zendkosten ?>
                </span>
            </div>
            <div id="p3">BTW</div>
            <div>
                €
                <span id="btw">
                    <?php echo $btw ?>
                </span>
            </div>
        </div>
        <div id="total">
            €<span id="totalmoney"><?php echo $fulltotal ?>
            </span>
        </div>
        <button id="besknop">Verder naar Bestellen</button>
    </div>
</div>
<?php include './footer.php' ?>