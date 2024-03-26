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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty ($_POST["aanhef"])) {
            $aanheferr = $errormess;
        } else {
            $aanhef = test_input($_POST["aanhef"]);
        }

        if (empty ($_POST["vnaam"])) {
            $vnaamerr = $errormess;
        } else {
            $vnaam = test_input($_POST["vnaam"]);
        }

        if (empty ($_POST["anaam"])) {
            $anaamerr = $errormess;
        } else {
            $anaam = test_input($_POST["anaam"]);
        }

        if (empty ($_POST["postcode"])) {
            $postcodeerr = $errormess;
        } else {
            $postcode = test_input($_POST["postcode"]);
        }

        if (empty ($_POST["strtnaam"])) {
            $strtnaamerr = $errormess;
        } else {
            $strtnaam = test_input($_POST["strtnaam"]);
        }

        if (empty ($_POST["huisnummer"])) {
            $huisnummererr = $errormess;
        } else {
            $huisnummer = test_input($_POST["huisnummer"]);
        }

        if (empty ($_POST["email"])) {
            $emailerr = $errormess;
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty ($_POST["phone"])) {
            $phoneerr = $errormess;
        } else {
            $phone = test_input($_POST["phone"]);
        }

        if (empty ($_POST["geboortedatum"])) {
            $geboortedatumerr = $errormess;
        } else {
            $geboortedatum = test_input($_POST["geboortedatum"]);
        }

        if (empty ($_POST["voorwaarde"])) {
            $voorwaardeerr = $errormess;
        } else {
            $voorwaarde = test_input($_POST["voorwaarde"]);
        }

        $tnaam = test_input($_POST["tnaam"]);
        $numtoev = test_input($_POST["numtoev"]);

        if (empty ($aanhef) || empty ($vnaam) || empty ($anaam) || empty ($postcode) || empty ($strtnaam) || empty ($huisnummer) || empty ($email) || empty ($phone) || empty ($geboortedatum) || empty ($voorwaarde)) {
            $accept = "Een fout is voorgekomen, vul alstublieft het formulier opnieuw in.";
        } else {
            $accept = '<span style="color:black; font-size: medium;">Dankjewel voor de bestelling! Een bevestigingsmail volgt snel.</span>';
            $msg = 'Beste ' . $aanhef . ' ' . $tnaam . ' ' . $anaam . ',  Dankjewel voor je bestelling bij FruitFish op ' . date("d-m-Y") . ' om ' . date("H:i") . '.';

            $msg = wordwrap($msg, 70);

            mail($email, "Bestelbevesting", $msg, 'From: <230067@student.glu.nl>');
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>
    <form class="bestel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div id="productinfo">
            <div id="row1">Bestellingsinformatie</div>
            <div id="col1">
                <p>
                    <?php if (count($_SESSION["cartitems"]) > 1) {
                        echo "producten";
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
                    <input id="vnaam" type="text" name="vnaam" placeholder="Voornaam" required
                        onblur="checkField(this)">
                    <span class="error">*
                        <?php echo $vnaamerr; ?>
                    </span>
                    <input type="text" name="tnaam" placeholder="Tussenvoegsel">
                    <input type="text" name="anaam" placeholder="Achternaam" required onblur="checkField(this)">
                    <span class="error" id="nameerror">*
                        <?php echo $anaamerr; ?>
                    </span>
                </p>
                <p>
                    <input type="tel" name="phone" placeholder="0612345678" required onblur="checkField(this)">
                    <span class="error" id="telerror">*
                        <?php echo $phoneerr; ?>
                    </span>
                </p>
                <p>
                    <input type="email" name="email" placeholder="E-mailadres" required onblur="checkField(this)">
                    <span class="error" id="mailerror">*
                        <?php echo $emailerr; ?>
                    </span>
                </p>
                <p>
                    <input type="date" name="geboortedatum" required onblur="checkField(this)">
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
                    <input type="text" name="strtnaam" placeholder="Straat" required onblur="checkField(this)">
                    <span class="error">*
                        <?php echo $strtnaamerr ?>
                    </span>
                    <input type="number" name="huisnummer" placeholder="Nummer" min="1" required
                        onblur="checkField(this)">
                    <span class="error">*
                        <?php echo $huisnummererr; ?>
                    </span>
                    <input type="text" name="numtoev" placeholder="Toevoeging">
                    <span class="error" id="strterror"></span>
                </p>
                <p>
                    <input type="text" name="postcode" placeholder="1234AB" pattern="[0-9]{4}[A-Za-z]{2}" required
                        onblur="checkField(this)"><span class="error" id="codeerror">*
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
            <p>
                <input type="radio" name="betaalmethode" id="ideal" value="ideal" checked>
                <label for="ideal">IDEAL</label>
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
<script src="../assets/js/validate.js"></script>
<?php include './footer.php' ?>