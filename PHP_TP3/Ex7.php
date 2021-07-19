<?php
if (!empty($_FILES["file"])) {
    $file = $_FILES["file"];
    foreach ($file as $key => $value) {
        ${"file_$key"} = $value;
    }

    $error_message = "";
    $file_dir = "Ex7_files";
    $file_save_path = "$file_dir/$file_name";
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    define("MEGABYTE", 1024**2);
    $file_size_mb = round($file_size/MEGABYTE, 2);

    if (empty($file_name)) {
        $error_message = "⚠ No file selected";
    } else if ($file_extension != "zip") {
        $error_message = "⚠ \"$file_name\" is not a zip file";
    } else if ($file_size > MEGABYTE) {
        $error_message = "⚠ File size ($file_size) is higher than allowed limit (1Mb)";
    } else if (file_exists($file_save_path)) {
        $error_message = "⚠ File already sent <a href='$file_save_path'>Download</a>";
    } else if (!move_uploaded_file($file_tmp_name, $file_save_path)) {
        $error_message = "⚠ Could not send file";
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
    <link rel="stylesheet" href="../_css/pure-min.css">
    <link rel="stylesheet" href="../_css/_.css">
    <title>Ex7 - Zip File Transfert</title>
</head>
<body class="solo">
    <form   class="pure-form pure-form-message pure-form-aligned"
            action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            method="post" enctype="multipart/form-data">
        <h1>Send File (.zip)</h1>
        <input class="pure-button pure-button-active" type="file" name="file">
        <button class="pure-button pure-button-primary" type="submit">Send</button>
        <?php if (isset($file)) { ?>
            <?php if(!empty($file_name)) : ?>
                <p>
                    File name: <?= $file_name ?> <br>
                    File size: <?= $file_size ?> Bytes <br>
                </p>
            <?php endif; ?>
            <?php if (empty($error_message)) : ?>
                <p style="color: green;">✔ File successfully received !</p>
            <?php else : ?>
                <p class="err"><?= $error_message ?></p>
            <?php endif; ?>
        <?php } ?>
        <?php
            $dir = "Ex7_files";
            if (file_exists($dir)) {
                echo "<h2>Sent Files</h2>";
                $dir_handle = opendir($dir);
                if ($dir_handle) {
                    while ($f = readdir($dir_handle)) {
                        $f_xt = pathinfo($f, PATHINFO_EXTENSION);
                        $f_sz = filesize("$dir/$f");
                        if ($f_xt) {
                            echo "<div>";
                            echo str_pad($f,50, ". ");
                            echo "$f_sz bytes";
                            echo "</div>";
                        }
                    }
                }
            } else {
                echo "<p>⚠</p>";
            }
        ?>
    </form>
</body>
</html>