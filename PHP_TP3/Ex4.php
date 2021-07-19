<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../_css/pure-min.css">
    <link rel="stylesheet" href="../_css/_.css">
    <title>Ex4</title>
</head>
<body class="solo">
<?php
    $valid = true;
    if ($_POST) {
        foreach ($_POST as $key => $value) {
            if ($value) {
                $$key = $value;
            } else {
                $valid = false;
            }
        }
    }
?>
<form class="pure-form pure-form-aligned" action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
    <div class="pure-control-group">
        <?php if($_POST && !isset($price)) : ?>
            <span class="error">⚠ You must enter the price</span>
        <?php elseif (isset($price) && (!is_numeric($price) || $price < 0)) :
            $valid = false;?>
            <span class="error">⚠ The price is a positive number (higher than 0)</span>
        <?php endif; ?>
        <label for="price">Price (Excluding Tax)</label>
        <input type="text" name="price" id="price" placeholder="Enter the price..."
                value="<?php if (isset($price)) echo $price ?>"> $
    </div>
    <div class="pure-control-group">
        <?php if($_POST && !isset($vat)) : ?>
            <span class="error">⚠ You must enter the VAT rate</span>
        <?php elseif (isset($vat) && (!is_numeric($vat) || $vat < 0 || $vat > 100)) :
            $valid = false; ?>
            <span class="error">⚠ The VAT rate is a positive percentage value (between 0 and 100)</span>
        <?php endif; ?>
        <label for="vat">VAT rate</label>
        <input type="text" name="vat" id="vat" placeholder="Enter the VAT rate..."
               value="<?php if (isset($vat)) echo $vat ?>"> %
    </div>
    <div class="pure-controls">
        <input class="pure-button pure-button-primary" type="submit" value="Submit">
    </div>
    <?php if ($_POST && $valid) :
        $vat_amount = $price*$vat/100;
        $ati_price = $price + $vat_amount;
        ?><br>
        <div class="pure-control-group">
            <label for="vat_amount">VAT Amount</label>
            <input type="text" name="vat_amount" id="vat_amount" readonly
                value="<?= $vat_amount ?>"> $
        </div>
        <div class="pure-control-group">
            <label for="ati_pric">Price (All Taxes Included)</label>
            <input type="text" name="ati_pric" id="ati_pric" readonly
                   value="<?= $ati_price ?>"> $
        </div>
    <?php endif; ?>
</form>
</body>
</html>