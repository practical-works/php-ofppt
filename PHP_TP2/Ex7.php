<?php
function str_array_capitalize(&$str_array) {
    foreach ($str_array as $key => $value)
        $str_array[$key] = ucwords(strtolower($value));
}

$words  = [ "iReliA", "AkAli", "garen", "YASUO" ];

echo implode(", ", $words) . "<br>";

str_array_capitalize($words);

echo implode(", ", $words) . "<br>";