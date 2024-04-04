<?php include './header.php' ?>
<div class="mainpage">
    <div class="mainpagelinks">
        <p><a href="/index.php">Home</a> > <a href="/index.php">Shop</a> > Dozen</p>
    </div>
    <form action="" method="get" class="sidebar">
        <div class="filters"> <!--filters voor de maat, je kan er op klikken verder niet functioneel-->
            <p style="border-bottom: 1px solid black; font-size: 18px;">Maat</p>
            <p><input type="checkbox" name="maat[]" value="XS">XS</p>
            <p><input type="checkbox" name="maat[]" value="S">S</p>
            <p><input type="checkbox" name="maat[]" value="M">M</p>
            <p><input type="checkbox" name="maat[]" value="L">L</p>
            <p><input type="checkbox" name="maat[]" value="XL">XL</p>
        </div>
        <div class="filters"> <!--filters voor de kleur, je kan er op klikken verder niet functioneel-->
            <p style="border-bottom: 1px solid black; font-size: 18px;">Kleur</p>
            <p><input type="checkbox" name="kleur[]" value="blauw">Blauw</p>
            <p><input type="checkbox" name="kleur[]" value="geel">Geel</p>
            <p><input type="checkbox" name="kleur[]" value="goud">Goud</p>
            <p><input type="checkbox" name="kleur[]" value="groen">Groen</p>
            <p><input type="checkbox" name="kleur[]" value="oranje">Oranje</p>
            <p><input type="checkbox" name="kleur[]" value="paars">Paars</p>
            <p><input type="checkbox" name="kleur[]" value="rood">Rood</p>
            <p><input type="checkbox" name="kleur[]" value="roze">Roze</p>
            <p><input type="checkbox" name="kleur[]" value="wit">Wit</p>
            <p><input type="checkbox" name="kleur[]" value="zilver">Zilver</p>
            <p><input type="checkbox" name="kleur[]" value="zwart">Zwart</p>
        </div>
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
        <input type="submit" class="toepassen" value="Toepassen"> <!--knop voor de filters toepassen. klikbaar-->
    </form>
    <div id="products">
        <div id="producttop"><!--titel van de pagina, en de knop voor het sorteren-->
            <div id="title">
                <p>Dozen</p>
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
            <div class="productdescription">dozen en kisten versierd met acryl fluid art</div>
            <div id="allproducts">
                <?php $currentcat = "Dozen" ?>
                <?php include 'productlijst.php' ?>
            </div>
            <div class="productamount">
                <?php echo $productamount; ?> artikelen
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/slider.js"></script>
<?php include './footer.php' ?>