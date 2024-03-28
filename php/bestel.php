<?php include './header.php' ?>
<div class="bestelpage">
    <?php
    $aanhef = $vnaam = $tnaam = $anaam = $postcode = $strtnaam = $huisnummer = $numtoev = $email = $phone = $geboortedatum = $voorwaarde = "";
    $aanheferr = $vnaamerr = $anaamerr = $postcodeerr = $strtnaamerr = $huisnummererr = $emailerr = $phoneerr = $geboortedatumerr = $voorwaardeerr = "";
    $errormess = "Dit veld is verplicht";
    $accept = "";
    $file_json = file_get_contents("../products.json");
    $file = json_decode($file_json, true);

    $price = 0;
    $hoesprijs = 0;
    $btw = 0;
    $zendkos = 4.35;

    foreach ($_SESSION["cartitems"] as $c) {
        foreach ($file as $x) {
            if ($c == $x["code"]) {
                $price += $x["price"];
            }
        }
    }
    if (isset ($_SESSION["extrahoes"])) {
        foreach ($_SESSION["extrahoes"] as $h) {
            $hoesprijs += 5;
        }
    }

    $btw = $price * 0.21;

    $total = $price + $hoesprijs + $btw + $zendkos;

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>
    <form class="bestel" action="bedank.php" method="post">
        <div id="productinfo">
            <div id="row1">Bestellingsinformatie</div>
            <div id="col1">
                <p>
                    <?php if (count($_SESSION["cartitems"]) > 1) {
                        echo "Producten";
                    } ?>
                </p>
                <p>Productprijs</p>
                <p>Hoezen</p>
                <p>BTW</p>
                <p>Verzendkosten</p>
                <p>Totaal</p>
            </div>
            <div id="col2">
                <p>
                    <?php if (count($_SESSION["cartitems"]) > 1) {
                        echo count($_SESSION["cartitems"]);
                    } ?>
                </p>
                <p>&euro;
                    <?= number_format($price, 2) ?>
                </p>
                <p>&euro;
                    <?= number_format($hoesprijs, 2) ?>
                </p>
                <p>&euro;
                    <?= number_format($btw, 2) ?>
                </p>
                <p>&euro;
                    <?= number_format($zendkos, 2) ?>
                </p>
                <p>&euro;
                    <?= number_format($total, 2) ?>
                </p>
            </div>
        </div>
        <div id="personalia">
            <div id="row2">Personalia</div>
            <div id="col3">
                <p>Aanhef</p>
                <p>Naam</p>
                <p>Telefoon</p>
                <p>Email</p>
                <p>Geboortedatum</p>
            </div>
            <div id="col4">
                <p>
                    <input type="radio" name="aanhef" id="man" value="Dhr." checked>
                    <label for="man">Dhr.</label>
                    <input type="radio" name="aanhef" id="vrouw" value="Mevr.">
                    <label for="vrouw">Mevr.</label>
                    <span class="error">*
                        <?php echo $aanheferr; ?>
                    </span>
                </p>
                <p>
                    <input id="vnaam" type="text" name="vnaam" placeholder="Voornaam" onblur="checkField(this)"
                        tabindex="1">
                    <span class="error">*
                        <?php echo $vnaamerr; ?>
                    </span>
                    <input type="text" name="tnaam" placeholder="Tussenvoegsel" tabindex="2">
                    <input type="text" name="anaam" placeholder="Achternaam" onblur="checkField(this)" tabindex="3">
                    <span class="error" id="nameerror">*
                        <?php echo $anaamerr; ?>
                    </span>
                </p>
                <p>
                    <input type="tel" name="phone" placeholder="0612345678" onblur="checkField(this)" tabindex="4">
                    <span class="error" id="telerror">*
                        <?php echo $phoneerr; ?>
                    </span>
                </p>
                <p>
                    <input type="email" name="email" placeholder="E-mailadres" onblur="checkField(this)" tabindex="5">
                    <span class="error" id="mailerror">*
                        <?php echo $emailerr; ?>
                    </span>
                </p>
                <p>
                    <input type="date" name="geboortedatum" onblur="checkField(this)" tabindex="6">
                    <span class="error" id="geberror">*
                        <?php echo $geboortedatumerr; ?>
                    </span>
                </p>
            </div>
        </div>
        <div id="verzendinfo">
            <div id="row3">Verzendinformatie</div>
            <div id="col5">
                <p>Adres</p>
                <p>Postcode</p>
                <p>Land</p>
            </div>
            <div id="col6">
                <p>
                    <input type="text" name="strtnaam" placeholder="Straat" onblur="checkField(this)" tabindex="7">
                    <span class="error">*
                        <?php echo $strtnaamerr ?>
                    </span>
                    <input type="number" name="huisnummer" placeholder="Nummer" min="1" tabindex="8"
                        onblur="checkField(this)">
                    <span class="error">*
                        <?php echo $huisnummererr; ?>
                    </span>
                    <input type="text" name="numtoev" placeholder="Toevoeging">
                    <span class="error" id="strterror"></span>
                </p>
                <p>
                    <input type="text" name="postcode" placeholder="1234AB" pattern="[0-9]{4}[A-Za-z]{2}" onblur="checkField(this)" tabindex="9"><span class="error" id="codeerror">*
                        <?php echo $postcodeerr; ?>
                    </span>
                </p>
                <p>
                    <select name="landen">
                        <option value="NL">Nederland</option>
                        <option value="BE">België</option>
                        <option value="DE">Duitsland</option>
                        <option value="FR">Frankrijk</option>
                    </select>
                </p>
            </div>
        </div>
        <div id="betaalinfo">
            <div id="row4">Betaalinformatie</div>
            <p> Betaalmethode:<br>
                <input type="radio" name="betaalmethode" id="ideal" value="ideal" checked>
                <label for="ideal">IDEAL</label>
                <br>
                <input type="radio" name="betaalmethode" id="paypal" value="paypal">
                <label for="paypal">PayPal</label>
            </p>
        </div>
        <div id="bestelknoppen">
            <p>
                <input type="checkbox" name="voorwaarde" value="yes"> Ik accepteer de <a
                    href="https://youtu.be/dQw4w9WgXcQ?si=gj4Ku7-ACwxYP881" target="_blank">algemene voorwaarden</a> en
                het
                <a href="https://youtu.be/dQw4w9WgXcQ?si=gj4Ku7-ACwxYP881" target="_blank">privacy beleid</a>.
                <span class="error">*
                    <?php echo $voorwaardeerr; ?>
                </span>
            </p>
            <input type="submit" id="submitbutton" value="Bestel">
            <div class="error" id="notvalid">
                <?php echo $accept; ?>
            </div>
        </div>
    </form>
</div>
<script>
    document.getElementById("vnaam").focus();
</script>
<script src="../assets/js/validate.js"></script>
<?php include './footer.php' ?>