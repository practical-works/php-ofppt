<?php

$num1 = 0;
$num2 = 20;
$gcd = 1; // greatest common divisor

try {
    if (!is_int($num1) || !is_int($num2))
        throw new Exception("Values must be integer");
    for ($i = 1; $i <= sqrt(max($num1, $num2)); $i++) {
        if ($num1 % $i == 0 && $num2 % $i == 0
            && $i > $gcd) {
            $gcd = $i;
        }
    }
    echo "The greatest common divisor of $num1 and $num2 is:";
    echo "<br> GCD($num1, $num2) = $gcd";
} catch (Exception $x) {
    echo "There's an error bro : <br>";
    echo $x->getMessage();
}