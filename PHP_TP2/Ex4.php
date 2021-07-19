<?php

function get_rand_series($length, $min, $max, $pattern) {
    $pattern_array = str_split($pattern, 1);
    if (count($pattern_array) >= $length) :
        $series = [];
        for ($i=0; $i<$length; $i++) :
            $number = rand($min, $max);
            if ($pattern_array[$i] == "p")
                while ($number % 2 != 0)
                    $number = mt_rand($min, $max);
            else if ($pattern_array[$i] == "o")
                while ($number % 2 == 0)
                    $number = mt_rand($min, $max);
            else
                return false;
            $series[$i] = $number;
        endfor;
        return $series;
    endif;
    return false;
}
echo "poo : "
    . implode(", ", get_rand_series(3, 1, 10, "poo")) . "<br>";
echo "pp : "
    . implode(", ", get_rand_series(2, 1, 10, "pp")) . "<br>";
echo "popopoo : "
    . implode(", ", get_rand_series(7, 1, 10, "popopoo")) . "<br>";