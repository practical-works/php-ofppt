<?php
if (isset($_FILES["the_image"])) {
    // ================================================================
    // ♦ Define global variable to access image file propeties
    // ================================================================
    $the_image = $_FILES["the_image"];
    foreach ($_FILES["the_image"] as $key => $value)
        ${"the_image_$key"} = $value;

    // ================================================================
    // ♦ Define paths to store image file
    // ================================================================
    $gallery_dir = "ex6_img";
    $the_image_save_path = "$gallery_dir/$the_image_name";

    // ================================================================
    // ♦ Validate image file
    // ================================================================
    /** @var STRING Contains a message if image has an error*/
    $the_image_error = "";
    // ----------------------------------------------------------------
    // 0. Check if a file is loaded
    if (empty($the_image_name)) {
        $the_image_error = "No selected file";
    } else {
        // 1. Check if file is a real image file
        $the_image_data = getimagesize($the_image_tmp_name);
        if(!$the_image_data) {
            $the_image_error = "Invalid image file";
        }
        // 2. Check if file type is a valid image type
        $supported_extensions = [ "jpg", "jpeg", "png", "gif", "bmp" ];
        $the_image_extension = pathinfo($the_image_name,PATHINFO_EXTENSION);
        if (!in_array($the_image_extension, $supported_extensions)) {
            $the_image_error = "Unsupported file type";
            $the_image_error .= "<br>Supported file types are: ";
            $the_image_error .= implode(", ", $supported_extensions);
        }
        // 3. Check if file size is a valid image size
        $the_image_size_mb = round(($the_image_size/1024)/1024, 2);
        $max_size_mb = 1;
        if ($the_image_size_mb > $max_size_mb) {
            $the_image_error = "Unallowed file size: $the_image_size_mb Mb";
            $the_image_error .= "<br>Maximum allowed file size: $max_size_mb Mb";
        }
        // 4. Check if file doesn't already exist
        if (file_exists($the_image_save_path)) {
            $the_image_error = "File already exist";
        }
    }

    // ================================================================
    // Upload image
    // ================================================================
    if (empty($the_image_error)) {
        if (!move_uploaded_file($the_image_tmp_name, $the_image_save_path)) {
            $the_image_error = "Error! Could not upload file";
        }
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
    <title>Ex6 - Image Hosting</title>
</head>
<body>
<form class="pure-form pure-form-message-inline pure-form-aligned" action="Ex6.php" enctype="multipart/form-data" method="post">
    <h1>Image submission form</h1>
    <div class="pure-control-group">
        <label for="file-dialog">Choose image</label>
        <input class="pure-button" type="file" id="file-input" name="the_image" onchange="displayFileInfos()">
        <input class="pure-button pure-button-primary" type="submit" value="Upload image">
        <input class="pure-button" type="button" value="Infos" onclick="displayFileInfos()">
        <p id="file-infos" style="padding-left: 200px">
            <?php if ($_FILES) { ?>
                <?php if (empty($the_image_error)) : ?>
                    Name: <?= $the_image_name ?> <br>
                    Type: <?= $the_image_type ?> <br>
                    Size: <?= $the_image_size_mb ?> Mb<br>
                    Temporary path: <?= $the_image_tmp_name ?> <br><br>
                    <span style="color: green">Image successfully uploaded!</span>
                <?php else : ?>
                    <span style="color: red"><?= $the_image_error ?></span><br>
                <?php endif; ?>
                <a href="ex6_gallery.php" target="_blank">Check gallery of images</a>
            <?php } ?>
        </p>
    </div>
</form>
<script>
    function displayFileInfos() {
        var file = document.querySelector("#file-input").files[0];
        var info = document.querySelector("#file-infos");
        info.innerHTML = "";
        info.innerHTML += "Name: " + file["name"] + "<br>";
        info.innerHTML += "Type: " + file["type"] + "<br>";
        info.innerHTML += "Size: "
            + Math.round(((file["size"]/1024)/1024)) + " Mb ("
            +  file["size"] + " Bytes)<br>";
        info.innerHTML += "Modified on: " + file["lastModifiedDate"] + "<br>";
        var path = URL.createObjectURL(file);
        info.innerHTML += "Path: " + path + "<br><br>";
        var image = document.createElement("img");
        image.src = path;
        image.alt = file["name"];
        image.width = 200;
        info.innerHTML += image.outerHTML;
    }
</script>
</body>
</html>