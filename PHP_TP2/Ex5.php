<?php
$cars = [
    0 => ["Volvo", 22, 18],
    1 => ["BMW", 15, 13],
    2 => ["Saab", 5, 2],
    3 => ["Land Rover", 17, 15],
    4 => ["X", 0, 0],
    5 => ["A", 1, 1],
    6 => ["B", 2, 2, 3, 4],
];
function array2table($array) {
    $table = "";
    foreach ($array as $row) {
        $table .= "<tr><td>". implode("</td><td>", $row). "</td></tr>";
    }
    return $table;
}

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ex5</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th {
            background: silver;
        }
        th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Cars:</h1>
    <table>
        <?= array2table($cars); ?>
    </table>
</body>
</html>
