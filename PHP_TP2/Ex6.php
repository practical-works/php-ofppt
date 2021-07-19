<?php

// U(n) = x^(2n+1)/n!
function series_sum($x, $iterations, $precision) {
    $sum = 0;
    for ($i = 0; $i < $iterations; $i++) {
        $sum += pow($x, (2*$i+1) / gmp_fact($i));
    }
    return round($sum, $precision);
}

echo "Sum(7^(2n+1)/n!) = " . series_sum(7, 10, 2);