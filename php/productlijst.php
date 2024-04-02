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