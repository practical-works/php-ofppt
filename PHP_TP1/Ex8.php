<?php

$num = 15;
echo "• Number is $num <br>";
do {
    $rand_num = mt_rand($num, 7*$num);
    echo "$rand_num ➗ $num = " . $rand_num / $num;
    echo "<br>";
} while($rand_num % $num != 0);

echo "♦ $rand_num is a multiple of $num";