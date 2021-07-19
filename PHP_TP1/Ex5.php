<?php

$special = [];
echo "Matriculations:<br>";
for ($i=0; $i<10; $i++) {
    $matriculation = (100+rand(0, 10*$i)) . "PHP" . (75+2*$i);
    echo "$matriculation, ";
    if ($matriculation % 100 == 0)
        $special[] = $matriculation;
}
echo "<br>Chosen Matriculations:<br>";
foreach ($special as $item) {
    echo "$item, ";
}