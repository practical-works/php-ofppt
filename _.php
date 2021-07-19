<?php

// echo "✔ $key = " . clean_input($value) . "<br>";
// echo "❌ $key is missing.<br>";

/**
 * Cleans an input string from white spaces,
 * slashes, and escapes HTML tags.
 * @param $data <b>string</b> input string to clean
 * @return <b>string</b> clean input string
 */
function clean_input($data) {
    if (!is_array($data)) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
    return $data;
}
function name_is_valid($name) {
    return preg_match("/^[a-zA-Z ]*$/", $name);
}
function email_is_valid($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function url_is_valid($url) {
    return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url);
}

function write_message($message, $text_color) {
    echo "<div style='color:$text_color; font-family:Consolas; font-size:2.3em;'>• $message</div>";
}
?>