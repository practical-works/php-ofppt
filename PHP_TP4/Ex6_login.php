<?php
session_start();
if ($_GET) {
    if (!empty($_GET["logout"])) {
        $logout = $_GET["logout"];
        if ($logout != 0) {
            // session_destroy();
            $_SESSION = [];
        }
    }
    if (!empty($_GET["access_denied"])) {
        $access_denied_url = $_GET["access_denied"];
        if ($access_denied_url) {
            $error = "Login is required to access $access_denied_url";
        }
    }
}
if (empty($_SESSION["username"])) {
    if ($_POST) {
        define("USERNAME", "user");
        define("PASSWORD", "123");
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (empty($username) || empty($password)) {
            $error = "All fields are required";
        } else if ($username != USERNAME || $password != PASSWORD) {
            $error = "Wrong username or password";
        } else {
            $_SESSION["username"] = $username;
            $_SESSION["ip"] = $_SERVER["REMOTE_ADDR"];
            require "user_agent_parser.php";
            $browser = parse_user_agent();
            $_SESSION["browser"] = "{$browser["browser"]} {$browser["version"]} for {$browser["platform"]}";
            header("location: Ex6_secret_1.php");
        }
    }
} else {
    header("location: Ex6_secret_1.php?autologged");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../_css/pure-min.css">
    <link rel="stylesheet" href="../_css/_.css">
    <title>ex6 - Login</title>
</head>
<body class="solo">
    <form class="pure-form pure-form-message pure-form-aligned"
          action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h1>Login</h1>
        <?php if (!empty($error)) : ?>
            <div class="error"><?= $error ?></div>
            <br>
        <?php endif; ?>
        <div class="pure-control-group">
            <input type="text" placeholder="Username" name="username"
                   value="<?php if (!empty($username)) echo $username; ?>">
        </div>
        <div class="pure-control-group">
            <input type="text" placeholder="Password" name="password"
                   value="<?php if (!empty($password)) echo $password; ?>">
        </div>
        <div class="pure-button-group">
            <input class="pure-button pure-button-primary" type="submit" value="Sign In">
        </div>
    </form>
</body>
</html>