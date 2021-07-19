<?php
function var_dump_x($variable) {
    foreach($GLOBALS as $var_name => $var_value) {
        if ($var_value === $variable) {
            echo "\$$var_name : ";
            if (!is_array($var_value)) {
                echo "\"$var_value\"";
            } else {
                echo "\"" . implode(", ", $var_value) . "\"";
            }
            echo " << ";
            var_dump($variable);
            echo " >> <br>";
            break;
        }
    }
}

$x = "PostgreSQL";
$y = "MySQL";
$z = &$x; // reference to $x content
$x = "PHP 7";
$y = &$x;

echo "x: $x <br> y: $y <br> z: $z <br><br>";
echo "Globals[x]: {$GLOBALS["x"]} <br>
      Globals[y]: {$GLOBALS["y"]} <br>
      Globals[z]: {$GLOBALS["z"]} <br><br>";

echo "PHP version: " . PHP_VERSION . "<br>";
echo "Server Operating System: " . PHP_OS . "<br>";
echo "Client Browser Language: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>";
echo "Current file: " . __FILE__ . "<br>";
echo "Host: " . $_SERVER["HTTP_HOST"] . "<br><br>";

$word = "PHP7 ";                var_dump_x($word);
$array[] = &$word;              var_dump_x($array);
$phrase = "7th version of PHP"; var_dump_x($phrase);
$WTF = $phrase*10;              var_dump_x($WTF);
$word .= $phrase;               var_dump_x($word);
$phrase *= $WTF;                var_dump_x($phrase);
$array[0] = "MySQL";            var_dump_x($array);
                                var_dump_x($word);
                                echo "<br><br>";

$text = "200hello" / 2.10;    var_dump_x($text);
echo "<br><br>";
$A = "7 persons";   var_dump_x($A); // string : "7 persons"
$B = (int)$A;       var_dump_x($B); // integer : 7
$A = "9e3";         var_dump_x($A); // string : "9e3"
$C = (double)$A;    var_dump_x($C); // double : 9000
echo "===============================<br><br>";

function write_bool($variable) {
    echo boolval($variable) ? "true" : "false";
    echo " <=> ";
    var_dump_x($variable);
}

write_bool($zero_str = "0");    // false
write_bool($true_str = "TRUE"); // true
write_bool($false_bool = FALSE);  // false
echo "<br>";echo "<br>";

$or_expr = ($zero_str OR $true_str);  //
var_dump($or_expr);

$and_expr = ($zero_str AND $false_bool);
var_dump($and_expr);

$xand_expr = ($zero_str XOR $false_bool);
var_dump($xand_expr);

