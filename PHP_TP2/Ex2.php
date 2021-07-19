<?php
function print_array($array, $title = "") {
    echo "$title<br>";
    foreach ($array as $key => $value)
        echo "[$key] : $value <br>";
    echo "<br>";
}

$sites = array("facebook.com", "twitter.com", "instagram.com", "whatsapp.com");
shuffle($sites);
echo "<a href='http://$sites[0]' target='_blank'>$sites[0]</a><br><br>";

$t1 = [];
for ($i = 1; $i <= 63; $i++) {
    $t1[] = $i;
}
print_array($t1, "array 1:");

$t2 = [];
for ($i = 0; $i < count($t1); $i++) {
    $t2[] = $t1[$i] / 10;
}
print_array($t2, "array 2:");

$t3 = [];
for ($i = 0; $i < count($t2); $i++) {
    $t3["$t2[$i]"] = sin($t2[$i]);
}
print_array($t3, "array 3:");
echo "<br><br>";

//======================================================
$tab = array("Apple", "Banana", "Orange", "Graspe");
print_array($tab, "Delicious Food:");

// Add
$tab[] = "Chocolate";
print_array($tab, "Delicious Food after Add:");

// Modify
$tab[4] = "White chocolate";
print_array($tab, "Delicious Food after Modify:");

// Delete
unset($tab[4]);
print_array($tab, "Delicious Food after Delete:");