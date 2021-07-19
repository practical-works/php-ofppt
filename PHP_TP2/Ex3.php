<?php

function messagebox($message = '') {
    echo "<script>alert('$message');</script>";
}

messagebox("Hello !");
messagebox("How are you ?");
messagebox("Very good, thanks :)");