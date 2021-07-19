<?php
if ($btn = !empty($_POST["btn"]) ? $_POST["btn"] : null) {
    $choices = [ "Sell", "Buy", "Rent" ];
    $url = "https://www.google.com/search?q=Real+Estate+Agency+";
    if (in_array($btn, $choices)) {
        $url .= $btn;
        header("location: $url");
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ex8</title>
</head>
<body>
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h1>Real Estate Agency</h1>
    <input type="submit" name="btn" value="Sell">
    <input type="submit" name="btn" value="Buy">
    <input type="submit" name="btn" value="Rent">
</form>
</body>
</html>