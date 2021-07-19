<?php
$min = 1;
$max = 10;

//$suite_found = false;
//while (!$suite_found) {
//    $suite = [];
//    $suite[] = rand($min, $max);
//    $suite[] = rand($min, $max);
//    $suite[] = rand($min, $max);
//    if ($suite[0] % 2 == 0
//        && $suite[1] % 2 != 0 && $suite[2] % 2 != 0 ) {
//        $suite_found = true;
//        echo "[ pair ] [ odd ] [ odd ] <=> ";
//        foreach ($suite as $item) :
//            echo "[ $item ] ";
//        endforeach;
//    }
//}
for ($i=0; $i<3; $i++)
    $suite[] = rand($min, $max);
while ($suite[0] % 2 != 0)
    $suite[0] = rand($min, $max);
while ($suite[1] % 2 == 0)
    $suite[1] = rand($min, $max);
while ($suite[2] % 2 == 0)
    $suite[2] = rand($min, $max);
echo "[ pair ] [ odd ] [ odd ] <=> ";
foreach ($suite as $item)
    echo "[ $item ] ";