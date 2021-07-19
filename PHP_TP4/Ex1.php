<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ex1</title>
</head>
<style>
    body {
        font-family: "Bookman Old Style";
        text-align: center;
        background: black;
        color: silver;
    }
</style>
<body>
<?php
    if (isset($_COOKIE["visits"])) {
        $visits = $_COOKIE["visits"];
        if (is_numeric($visits)) {
            $visits++;
            setcookie("visits", $visits, time() + 60);
        }
    } else {
        $visits = 1;
        setcookie("visits", $visits, time() + 60);
    }
?>
<h1>Number of visits</h1>
<h1><?php if (isset($visits)) echo $visits; ?></h1>
</body>
</html>