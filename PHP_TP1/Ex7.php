<?php
//==========================================
echo "<br>creating letters array ...<br>";
for ($i = 11; $i <= 36; $i++) {
    $tab[$i] = chr(86 + $i);
    echo "(item_$i) ";
}
echo "<br>letters array created.<br>";
//==========================================
echo "<br>reading letters array (for loop)...<br>";
for ($i = key($tab); $i < key($tab) + count($tab); $i++) {
    echo "($i => {$tab[$i]}) ";
}
echo "<br>letters array read.<br>";
//==========================================
echo "<br>reading letters array (foreach loop) ...<br>";
foreach ($tab as $key => $value) {
    echo "($key => {$value}) ";
}
echo "<br>letters array read.<br>";
//==========================================