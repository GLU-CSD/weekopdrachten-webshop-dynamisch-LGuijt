<?php 
$pagetitle = "Winkelwagen";
include './header.php';
?>
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
if (isset($_SESSION["extrahoes"])) {
    foreach ($_SESSION["extrahoes"] as $h) {
        $hoesprijs += 5;
    }
}
$btw = $price * 0.21;
$total = $price + $hoesprijs + $btw + $zendkos;

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
    } else { ?>
        <div id="bedank">
            <div id="danktop">
                <p>Dank u wel voor uw bestelling bij Fruitfish, een bestelbevestinging per mail volgt snel.</p>
            </div>
            <div class="danksidef">
                <?php
                foreach ($_SESSION["cartitems"] as $e) {
                    foreach ($file as $y) {
                        if ($e == $y["code"]) { ?>
                            <p>
                                <?= $y["category"] ?>
                                <?= $y["name"] ?>
                            </p>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <div class="dankside">
                <div class="col">
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
                <div class="col">
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
            <div class="dankside">
                <div class="col">
                    <p>Aanhef</p>
                    <p>Naam</p>
                    <p>Telefoon</p>
                    <p>Email</p>
                    <p>Geboortedatum</p>
                </div>
                <div class="col">
                    <p>
                        <?= $aanhef ?>
                    </p>
                    <p>
                        <?= $vnaam ?>
                        <?= $tnaam ?>
                        <?= $anaam ?>
                    </p>
                    <p>
                        <?= $phone ?>
                    </p>
                    <p>
                        <?= $email ?>
                    </p>
                    <p>
                        <?= $geboortedatum ?>
                    </p>
                </div>
            </div>
            <div class="dankside">
                <div class="col">
                    <p>Adres</p>
                    <p>Postcode</p>
                    <p>Land</p>
                </div>
                <div class="col">
                    <p>
                        <?= $strtnaam ?>
                        <?= $huisnummer ?>
                        <?= $numtoev ?>
                    </p>
                    <p>
                        <?= $postcode ?>
                    <p> Nederland </p>
                </div>
            </div>

        </div>


        <?php
        $msg = '<html>
        <head>
        <title>Bestelbevestiging</title>
        </head>
        <body>
        <p>Beste ' . $aanhef . ' ' . $tnaam . ' ' . $anaam . ',</p>
        <p>Dank u wel voor uw bestelling bij FruitFish op ' . date("d-m-Y") . ' om ' . date("H:i") . '. Een mail met de bezorginformatie volgt z.s.m.</p>
        <p>Met vriendelijke groet,</p>
        <p>FruitFish</p>
        </body>
        </html>';

        $headers = 'Content-type:text/html;charset=UTF-8' . '\r\n';
        $headers .= 'From: <230067@student.glu.nl>' . '\r\n';

        mail($email, "Bestelbevesting", $msg, $headers);
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
<?php include './footer.php' ?>