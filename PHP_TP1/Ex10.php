<?php

for ($i = 0; $i < 11; $i++) {
    echo "========================================<br>";
    echo "Multiplication table of $i : <br>";
    for ($j = 0; $j < 11; $j++) {
        echo "$i x $j = " . ($i*$j) . "<br>";
    }
}