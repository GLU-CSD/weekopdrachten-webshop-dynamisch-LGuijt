<?php include './header.php' ?>
<div class="mainpage">
    <?php
    $aanhef = $vnaam = $tnaam = $anaam = $postcode = $strtnaam = $huisnummer = $numtoev = $email = $phone = $geboortedatum = $voorwaarde = "";

    $aanheferr = $vnaamerr = $anaamerr = $postcodeerr = $strtnaamerr = $huisnummererr = $emailerr = $phoneerr = $geboortedatumerr = $voorwaardeerr = "";

    $errormess = "Dit veld is verplicht";

    $accept = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["aanhef"])) {
            $aanheferr = $errormess;
        } else {
            $aanhef = test_input($_POST["aanhef"]);
        }

        if (empty($_POST["vnaam"])) {
            $vnaamerr = $errormess;
        } else {
            $vnaam = test_input($_POST["vnaam"]);
        }

        if (empty($_POST["anaam"])) {
            $anaamerr = $errormess;
        } else {
            $anaam = test_input($_POST["anaam"]);
        }

        if (empty($_POST["postcode"])) {
            $postcodeerr = $errormess;
        } else {
            $postcode = test_input($_POST["postcode"]);
        }

        if (empty($_POST["strtnaam"])) {
            $strtnaamerr = $errormess;
        } else {
            $strtnaam = test_input($_POST["strtnaam"]);
        }

        if (empty($_POST["huisnummer"])) {
            $huisnummererr = $errormess;
        } else {
            $huisnummer = test_input($_POST["huisnummer"]);
        }

        if (empty($_POST["email"])) {
            $emailerr = $errormess;
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["phone"])) {
            $phoneerr = $errormess;
        } else {
            $phone = test_input($_POST["phone"]);
        }

        if (empty($_POST["geboortedatum"])) {
            $geboortedatumerr = $errormess;
        } else {
            $geboortedatum = test_input($_POST["geboortedatum"]);
        }

        if (empty($_POST["voorwaarde"])) {
            $voorwaardeerr = $errormess;
        } else {
            $voorwaarde = test_input($_POST["voorwaarde"]);
        }

        $tnaam = test_input($_POST["tnaam"]);
        $numtoev = test_input($_POST["numtoev"]);

        if (empty($aanhef) || empty($vnaam) || empty($anaam) || empty($postcode) || empty($strtnaam) || empty($huisnummer) || empty($email) || empty($phone) || empty($geboortedatum) || empty($voorwaarde)) {
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
        <div style="font-size: xx-large; text-decoration:underline;">Bestelformulier</div>
        <p><span style="margin-right: 88px;">Aanhef:</span>
            <input type="radio" name="aanhef" id="man" value="Dhr." checked>
            <label for="man">Dhr.</label>
            <input type="radio" name="aanhef" id="vrouw" value="Mevr.">
            <label for="vrouw">Mevr.</label>
            <span class="error">*
                <?php echo $aanheferr; ?>
            </span>
        </p>
        <p><span style="margin-right: 100px;">Naam:</span>
            <input id="vnaam" type="text" name="vnaam" placeholder="Voornaam" required onblur="checkField(this)">
            <span class="error">*
                <?php echo $vnaamerr; ?>
            </span>
            <input type="text" name="tnaam" placeholder="Tussenvoegsel">
            <input type="text" name="anaam" placeholder="Achternaam" required onblur="checkField(this)">
            <span class="error" id="nameerror">*
                <?php echo $anaamerr; ?>
            </span>
        </p>
        <p><span style="margin-right: 74px;">Postcode:</span>
            <input type="text" name="postcode" placeholder="1234AB" pattern="[0-9]{4}[A-Za-z]{2}" required
                onblur="checkField(this)"><span class="error" id="codeerror">*
                <?php echo $postcodeerr; ?>
            </span>
        </p>
        <p><span style="margin-right: 101px;">Adres:</span>
            <input type="text" name="strtnaam" placeholder="Straat" required onblur="checkField(this)">
            <span class="error">*
                <?php echo $strtnaamerr ?>
            </span>
            <input type="number" name="huisnummer" placeholder="Nummer" min="1" required onblur="checkField(this)">
            <span class="error">*
                <?php echo $huisnummererr; ?>
            </span>
            <input type="text" name="numtoev" placeholder="Toevoeging">
            <span class="error" id="strterror"><span>
        </p>
        <p><span style="margin-right: 107px;">Land:</span>
            <select name="landen">
                <option value="NL">Nederland</option>
                <option value="BE">België</option>
                <option value="DE">Duitsland</option>
                <option value="FR">Frankrijk</option>
            </select>
        </p>
        <p><span style="margin-right: 96px;">E-Mail:</span>
            <input type="email" name="email" placeholder="E-mailadres" required onblur="checkField(this)">
            <span class="error" id="mailerror">*
                <?php echo $emailerr; ?>
            </span>
        </p>
        <p><span style="margin-right: 10px;">Telefoonnummer:</span>
            <input type="tel" name="phone" placeholder="0612345678" required onblur="checkField(this)">
            <span class="error" id="telerror">*
                <?php echo $phoneerr; ?>
            </span>
        </p>
        <p><span style="margin-right: 18px;">Geboortedatum:</span>
            <input type="date" name="geboortedatum" required placeholder="MM/DD/YYYY" onblur="checkField(this)">
            <span class="error" id="geberror">*
                <?php echo $geboortedatumerr; ?>
            </span>
        </p>
        <p>
            <input type="checkbox" name="voorwaarde" value="yes"> Ik accepteer de <a
                href="https://youtu.be/dQw4w9WgXcQ?si=gj4Ku7-ACwxYP881" target="_blank">algemene voorwaarden</a> en het
            <a href="https://youtu.be/dQw4w9WgXcQ?si=gj4Ku7-ACwxYP881" target="_blank">privacy beleid</a>.
            <span class="error">*
                <?php echo $voorwaardeerr; ?>
            </span>
        </p>
        <input type="submit" id="submitbutton" value="Bestel">
        <div class="error" id="notvalid">
            <?php echo $accept; ?>
        </div>
    </form>
</div>
<script src="../assets/js/validate.js"></script>
<?php include './footer.php' ?>