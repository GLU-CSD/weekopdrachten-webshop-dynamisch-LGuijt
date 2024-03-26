<?php include './header.php' ?>
<div id="wagen">
    <div id="wwtxt">Winkelwagen</div>
    <div id="date">
        <?= date("d-m-Y"); ?>
    </div>
    <div id="imgcon">
        <?php
        $totalprice = 0;
        $artikelamount = 0;
        $btw = 0;
        $fulltotal = 0;
        $zendkosten = 4.35;
        $file_json = file_get_contents("../products.json");
        $file = json_decode($file_json, true);
        $crossarray = array();
        $random = array();

        if (isset ($_SESSION["cartitems"])) {
            foreach ($_SESSION["cartitems"] as $prcode) {
                foreach ($file as $p) {
                    if ($p["code"] == $prcode) {
                        $extrahoes = false;
                        foreach ($_SESSION["extrahoes"] as $q) {
                            if ($q == $p["code"]) {
                                $extrahoes = true;
                            }
                        } ?>
                        <div class="items">
                            <div class="trashcan" onclick="trashcan(<?= $p['code'] ?>)"><img src="../assets/iconen/delete.png"></div>
                            <div class="itemimg"><img src="<?= $p["img"] ?>"></div>
                            <div class="itemtitle">
                                <a href="detailpag.php?sku=<?= $p["code"] ?>" target="_blank">
                                    <?= $p["category"] . ' - ' . $p["name"] ?>
                                </a>
                            </div>
                            <div class="itemprice">&euro;
                                <?= $p["price"] ?>
                            </div>
                            <?php
                            if ($extrahoes == true) {
                                ?>
                                <p class="hoescheck" id="hoescheck<?= $p["code"] ?>">
                                    <input type="checkbox" id="checkbox<?= $p["code"] ?>" onclick="toggle(<?= $p['code'] ?>, true)"
                                        value="yes" name="hoescheck<?= $p["code"] ?>" checked>
                                    Extra beschermende hoes?
                                </p>
                                <div class="hoesprijs" id="hoesprijs<?= $p["code"] ?>" style="opacity:1">€5.00</div>
                                <?php
                                $h = 5;
                            } else if ($extrahoes == false) {
                                ?>
                                    <p class="hoescheck" id="hoescheck<?= $p["code"] ?>">
                                        <input type="checkbox" id="checkbox<?= $p["code"] ?>" onclick="toggle(<?= $p['code'] ?>, false)"
                                            value="yes" name="hoescheck<?= $p["code"] ?>">
                                        Extra beschermende hoes?
                                    </p>
                                    <div class="hoesprijs" id="hoesprijs<?= $p["code"] ?>">€5.00</div>
                                    <?php
                                    $h = 0;
                            }
                            $price = $p["price"] + $h;
                            ?>
                            <div class="itemtotal">&euro;<span id="totalitemprice<?= $p["code"] ?>">
                                    <?= $price ?>
                                </span></div>
                        </div>
                        <?php
                        $totalprice += $price;
                        $artikelamount++;
                    } else {
                        array_push($crossarray, $p["code"]);
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
        } else {
            echo "geen producten in winkelmand";
            foreach ($file as $p) {
                array_push($crossarray, $p["code"]);
            }
        }
        ?>
    </div>
    <div id="overzicht">
        <div id="overzichttext">Overzicht</div>
        <div id="lijstprijs">
            <div id="p1">
                <?php
                if ($artikelamount > 1) {
                    echo 'Artikel(en)(' . $artikelamount . ')';
                } else {
                    echo "Artikelprijs";
                }
                ?>
            </div>
            <div id="artikelprijzen">€
                <span id="combiprijs">
                    <?= $totalprice ?>
                </span>
            </div>
            <div id="p2">Verzendkosten</div>
            <div id="zendkost"><!-- CHANGE LATER -->
                €<span id="ugh">
                    <?= $zendkosten ?>
                </span>
            </div>
            <div id="p3">BTW</div>
            <div>
                €
                <span id="btw">
                    <?= $btw ?>
                </span>
            </div>
        </div>
        <div id="total">
            €<span id="totalmoney">
                <?= $fulltotal ?>
            </span>
        </div>
        <a id="besknop" href="./bestel.php">
            <p>Verder naar Bestellen</p>
        </a>
    </div>
    <div id="crosssell">
        <?php
        if (count($crossarray) >= 4) {
            $randomkeys = array_rand($crossarray, 4);
            foreach ($randomkeys as $ran) {
                array_push($random, $crossarray[$ran]);
            }
        } else {
            $random = $crossarray;
        }
        ?>
        <div id="crosstitle">Mogelijk ook interessant</div>
        <div id="crosscon">
            <?php foreach ($random as $ran) {
                foreach ($file as $r) {
                    if ($ran == $r["code"]) { ?>
                        <div class="crossitem">
                            <div class="crossimg"><a href="./detailpag.php?sku=<?= $r["code"] ?>" target="_blank"><img src="<?= $r["img"] ?>"></a>
                            </div>
                            <div class="xtitle">
                                <?= $r["category"] . ' - ' . $r["name"] ?>
                            </div>
                            <div class="crossprice">&euro;
                                <?= $r["price"] ?>
                            </div>
                        </div>
                        <?php
                    }
                }
            } ?>
        </div>
    </div>
</div>
<?php include './footer.php' ?>