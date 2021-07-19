<?php

// shopping cart
if (empty($_SESSION["cart"])) {
    echo "<div>No items in the cart.</div>";
} else {
    $cart = $_SESSION["cart"];
    echo "<div>";
    foreach ($cart as $item) {
        echo "<span>$item</span> ";
    }
    echo "</div>";
}

?>