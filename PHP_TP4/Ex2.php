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
    function set_visit_dates_cookie() {
        $name = "visit_dates";
        $value = time();
        $expire = time() + 600;
        $visit_dates = [ $value ];
        if (isset($_COOKIE[$name])) {
            $visit_dates = explode(", ", $_COOKIE[$name]);
            $visit_dates[] = $value;
        }
        setcookie($name, implode(", ", $visit_dates), $expire);
        return $visit_dates;
    }

    $visit_dates = set_visit_dates_cookie();
    $visits = count($visit_dates);

    $message = $visits == 1 ? "You're here for first time" : "You've come here $visits times before";
?>
<h1><?= $message ?></h1>
<ol>
    <?php
    if (!empty($visit_dates)) {
        foreach ($visit_dates as $date) {
            echo "<li>" . date(DATE_COOKIE, (int)$date) . "</li>";
        }
    }
    ?>
</ol>
</body>
</html>