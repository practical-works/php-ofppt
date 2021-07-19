<?php
// r: radian, d: degree, g: gradian
function sine($angle, $unit = "r") {
    switch ($unit) {
        case "r":
            // radian
            return sin($angle);
        case "d":
            // radian = degree * pi/180
            return sin($angle * pi() / 180);
        case "g":
            // radian = gradian * 200/pi
            return sin($angle * 200 / pi());
        default:
            return false;
    }
}

$angle = 1;
echo "Sine($angle rads) = " . sine($angle) . "<br>";
echo "Sine($angle degs) = " . sine($angle, "d") . "<br>";
echo "Sine($angle grads) = " . sine($angle, "g") . "<br>";
echo "================================================<br>";

function print_pascal_triangle($length) {
    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length; $j++) {
            $t[$i][$j] = "";
        }
    }
    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length; $j++) {
            if ($j == 0) {
                $t[$i][$j] = 1;
            } else if ($i == 0) {
                $t[$i][$j] = "";
            } else if ($j <= $i) {
                $t[$i][$j] = $t[$i-1][$j] + $t[$i-1][$j-1];
            }
            echo $t[$i][$j] . " ";
        }
        echo "<br>";
    }
}
print_pascal_triangle(10);