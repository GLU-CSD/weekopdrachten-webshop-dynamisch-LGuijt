<?php include 'header.php' ?>
<div class="mainpage">
    <div class="mainpagelinks">
        <p><a href="/index.php">Home</a> > <a href="/index.php">Shop</a> >Tekeningen</p>
    </div>
    <div class="sidebar">
        <div class="filters"><!--prijs sliders-->
            <p style="border-bottom: 1px solid black; font-size: 18px;">Prijs</p>
            <p>Min. Prijs:</p>
            <div class="pricerange">
                <p>€<span id="minvalue"></span></p>
                <p>-</p>
                <p>€100</p>
            </div>
            <div class="slider">
                <input type="range" min="0" max="100" name="minprice" id="minprice" value="0">
            </div>
            <p>Max. Prijs:</p>
            <div class="pricerange">
                <p>€0</p>
                <p>-</p>
                <p>€<span id="maxvalue"></span></p>
            </div>
            <div class="slider">
                <input type="range" min="0" max="100" name="maxprice" id="maxprice" value="100">
            </div>
        </div>
        <button class="toepassen">Toepassen</button> <!--knop voor de filters toepassen. klikbaar-->
    </div>
    <div id="products">
        <div id="producttop"><!--titel van de pagina, en de knop voor het sorteren-->
            <div id="title">
                <p>Tekeningen</p>
            </div>
            <div id="productsort">
                <select name="sorteren">
                    <option value="a-z">Naam: A-Z</option>
                    <option value="z-a">Naam: Z-A</option>
                    <option value="pricelow-high">Prijs: Laag-Hoog</option>
                    <option value="pricehigh-low">Prijs: Hoog-Laag</option>
                </select>
            </div>
        </div>
        <div id="productlist">
            <div class="productdescription">tekeningen</div>
            <div id="allproducts">
                <?php
                $productamount = 0;
                $file_json = file_get_contents("./products.json");
                $file = json_decode($file_json, true);

                foreach ($file as $x) {
                    if ($x["category"] == "Tekeningen") {
                        echo '<div class="product">';
                        echo '<div class="pic"><img class="' . $x["imgsize"] . '" src="' . $x["img"] . '" alt="schilderij"></div>';
                        echo '<div class="productname">' . $x["name"] . '</div>';
                        echo '<div class="productprijs">' . $x["price"] . '</div>';
                        echo '<div class="productkleuren">';
                        foreach ($x["colours"] as $y) {
                            echo '<div class=' . $y . '></div>';
                        }
                        echo '</div>';
                        echo '<div class="productmaat">' . $x["maat"] . '</div>';
                        echo '<div class="bestelknop">';
                        echo '<button onclick="cartCounter()">Bestel</button>';
                        echo '</div>';
                        echo '</div>';
                        $productamount++;
                    }
                }
                ?>
            </div>
            <div class="productamount">
                <?php echo $productamount; ?> artikelen
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>