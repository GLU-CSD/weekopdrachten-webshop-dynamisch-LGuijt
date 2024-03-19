<?php include './header.php' ?>
<?php

foreach ($_SESSION["cartitems"] as $prcode) {
    echo $prcode;
}

?>

<div id="wagen">
    <div id="wwtxt">winkelwagen</div>
    <div id="date">date</div>
    <div id="imgcon">
        <div class="items">
            <div class="itemimg">img</div>
            <div class="itemtitle">tite</div>
            <div class="itemprice">price</div>
            <p class="hoescheck"><input type="checkbox" value="yes" name="hoescheck">
                Extra beschermende hoes?
            <p>
            <div class="hoesprijs">5,00</div>
            <div class="itemtotal">total</div>
        </div>
    </div>
    <div id="overzicht">
        <div>
            <div>artikel(en)()></div>
            <div>prijs</div>
        </div>
        <div>
            <div>verzendkosten</div>
            <div>prijs</div>
        </div>
        <div>
            <div>BTW</div>
            <div>prijs</div>
        </div>
        <div id="total">TOTAL</div>
        <button>Verder naar Bestellen</button>
    </div>
</div>
<?php include './footer.php' ?>