<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ex7 - shop</title>
    <link rel="stylesheet" href="../_css/pure-min.css">
    <link rel="stylesheet" href="../_css/_.css">
    <style>
        body {
            font-family: "Bookman Old Style";
        }
    </style>
</head>
<body class="solo">
<form action="Ex7_shop.php" method="post" class="pure-form pure-form-message">
    <?php
        session_start();
        if (!empty($_POST["clear"])) {
            $_SESSION["cart"] = [];
        }
        if (!empty($_POST["item"])) {
            $item = $_POST["item"];
            $_SESSION["cart"][] = $item;
        }
    $cart_count = empty($_SESSION["cart"]) ? 0 : count($_SESSION["cart"]);
    ?>
    <h1>🛒 My cart (<?= $cart_count ?>)</h1>
    <button class="lnk" type="submit" name="clear" value="clear">✖ Clear</button>
    <?php require_once "Ex7.php"; ?>
    <h1>🛍 Shop</h1>
    <?php
        $items = [ "🍎", "🍒", "🍓", "🍞", "🍡", "🍜" ];
        foreach ($items as $item) {
            echo "<button class='pure-button' type='submit' name='item' value='$item'> $item </button>";
        }
    ?>
</form>
</body>
</html>