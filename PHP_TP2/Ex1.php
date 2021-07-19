<?php

$phrase = "monkey d. luffy, roronoa zoro, nami, usopp, sanji, tony tony chopper, nico robin, franky brook";
//=======================================================
echo "String : \"$phrase\" <br><br>";
//=======================================================
echo "1) Capitals: <br>";
echo  ucwords($phrase);
echo "<br><br>";
//=======================================================
echo "2) Letters: <br>";
for ($i = 0; $i < strlen($phrase); $i++)
    if ($phrase[$i] != " ") echo "{$phrase[$i]} | ";
echo "<br><br>";
//=======================================================
echo "3) Format: <br>";
//echo wordwrap($phrase, 20, "<br>");
$words = explode(",", $phrase);
foreach ($words as $key => $word) {
    if (strlen($word) > 20) {
        $words[$key] = wordwrap($word, 20, "<br>");
    }
}
$words = implode("<br>", $words);
echo ucwords($words);
echo "<br><br>";
//=======================================================
echo "4) HTML Snippet: <br>";
echo htmlentities("<form action='script.php'></form>");
echo "<br><br>";
//=======================================================
echo "5) Order: <br>";
$w1 = "Azir";
$w2 = "Ashe";
if (strcasecmp($w1, $w2) < 0)
    echo "$w1, $w2";
else
    echo "$w2, $w1";
echo "<br><br>";
//=======================================================
echo "6) NewLine To Break: <br>";
$newLinePhrase = "\n☺ PHP is \nin fight with\n ASP and JSP\n";
echo $newLinePhrase;
echo nl2br($newLinePhrase);
//=======================================================