<?php
// Method 1 : if we get number as separate digits
//$number = "123";
//$picks = [ mt_rand(0, 9), mt_rand(0, 9), mt_rand(0, 9) ];
//$draws = 1;
//echo "Draw #$draws =====> " . implode("", $picks) . "<br>";
//while ( $picks[0] != substr($number, 0, 1) ||
//        $picks[1] != substr($number, 1, 1) ||
//        $picks[2] != substr($number, 2, 1) ) {
//    for ($i = 0; $i < 3; $i++)
//        $picks[$i] = mt_rand(0, 9);
//    $draws++;
//    echo "Draw #$draws =====> " . implode("", $picks) . "<br>";
//}

// Method 2 : If we get full nmuber (while loop)
//$number = 123;
//$picked_number = 0;
//$draws = 0;
//while ($picked_number != $number) {
//    $picked_number = mt_rand(0, $number);
//    $draws++;
//    echo "Draw #$draws =====> $picked_number <br>";
//}
//echo "Number $number matched after $draws draws !";

// Method 2 : If we get full nmuber (for loop)
$number = 123;
for ($i = 1; $i < $i + 1; $i++) {
    $picked_number = mt_rand(0, $number);
    echo "Draw #$i =====> $picked_number <br>";
    if ($picked_number == $number) {
        echo "Number $number matched after $i draws !";
        break;
    }
}