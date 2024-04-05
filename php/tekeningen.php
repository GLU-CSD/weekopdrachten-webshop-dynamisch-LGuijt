<?php 
$pagetitle = "Tekeningen";
include './header.php'; 
?>
<div class="mainpage">
    <div class="mainpagelinks">
        <p><a href="/index.php">Home</a> > <a href="/index.php">Shop</a> >Tekeningen</p>
    </div>
    <form method="get" class="sidebar">
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
                $currentcat = "Tekeningen";
                include 'productlijst.php';
                ?>
            </div>
            <div class="productamount">
                <?php echo $productamount; ?> artikelen
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/slider.js"></script>
<?php include './footer.php' ?>