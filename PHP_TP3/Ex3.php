<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ex3</title>
</head>
<body>
<h1>Subscribe now !</h1>
<form method="post" action="<?= $_SERVER["PHP_SELF"];  ?>">
    <p>
        <?php
            if ($_POST && $_POST["email"]) {
                $email = $_POST["email"];
            }
        ?>
        <label for="email">Enter your eamil :</label>
        <input type="email" name="email" id="email"
            value="<?php if(isset($email)) echo $email ?>">
        <input type="submit" value="OK">
        <?php if (isset($email)) {
            $browser = $_SERVER["HTTP_USER_AGENT"];
            echo "<p>Your browser is $browser</p>";
        } else if ($_POST) {
            echo "<span>You didn't enter your email o.O</span>";
        } ?>
    </p>
</form>
</body>
</html>