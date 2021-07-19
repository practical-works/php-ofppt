<?php
session_start();
if (empty($_SESSION["username"])) {
    $this_page = htmlspecialchars($_SERVER["REQUEST_URI"]);
    header("location: Ex6_login.php?access_denied=$this_page");
    exit;
} else {
    $username = $_SESSION["username"];
    $ip = $_SESSION["ip"];
    $browser = $_SESSION["browser"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../_css/pure-min.css">
    <link rel="stylesheet" href="../_css/_.css">
    <title>ex6 - Secret 2</title>
</head>
<body class="solo">
<form class="pure-form pure-form-message pure-form-aligned" action="">
    <h1 class="pure-button-selected"><a href="Ex6_secret_1.php">Secret 1</a> Secret 2</h1>
    <h2 class="pure-button-active">Welcome <?= $username ?> !</h2>
    <h2>Your IP is <?= $ip ?> !</h2>
    <h2>Your browser is <?= $browser ?> !</h2>
</form>
<h3><a href="Ex6_login.php?logout=1">Logout</a></h3>
</body>
</html>