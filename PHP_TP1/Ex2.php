<?php

$n = 100;
$n1 = 3;
$n2 = 5;
$not = "NOT";

if ($n % $n1 == 0 && $n % $n2 == 0)
    $not = "";
echo "$n is $not a multiple of $n1 and $n2 at the same time.";