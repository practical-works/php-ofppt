<?php
if (!empty($_GET["txt"])) {
    $txt = $_GET["txt"];
    header("location: https://www.instagram.com/$txt/");
} else {
    if ($_GET) echo "-.-'";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ex5</title>
</head>
<body>
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
    <label for="hello">Say Hello! </label>
    <input type="text" placeholder="Hello..." name="txt">
    <button type="submit">Send</button>
</form>
</body>
</html>
