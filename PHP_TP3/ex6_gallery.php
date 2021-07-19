<?php
$IMAGES = [];
$img_dir_path = "ex6_img";
$img_dir_handle = opendir($img_dir_path);
while ($img_file_name = readdir($img_dir_handle)) {
    // Set image file path
    $img_file_path = "$img_dir_path/$img_file_name";

    // Check if file has an extension
    $file_ext = pathinfo($img_file_name, PATHINFO_EXTENSION);
    if ($file_ext) {

        // Check if file is an image
        $img_size_data = getimagesize($img_file_path);
        if ($img_size_data) {

            // Get some informations about image
            // and save them in global array
            $img["name"] = $img_file_name;
            $img["path"] = $img_file_path;
            $img["width"] = $img_size_data[0];
            $img["height"] = $img_size_data[1];
            $img["mime"] = $img_size_data["mime"];
            $img["file_size"] = filesize($img_file_path);
            $img["creation_date"] = filectime($img_file_path);
            $IMAGES[] = $img;
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
    <title>Ex6 - Image Gallery</title>
    <style>
        td {
            border: 1px solid gray;
            padding: 10px;
            box-shadow: 1px 1px 3px black;
            background-color: whitesmoke;
        }
        td:hover {
            border: 1px solid gray;
            cursor: pointer;
            background-color: white;
            box-shadow: 1px 1px 13px black;
        }
    </style>
</head>
<body class="pure-form-message">
    <h1 >Gallery</h1>
    <p><a href="Ex6.php" target="_blank">Upload image</a></p>
    <table><?php
        if ($IMAGES) {
            $images_count = count($IMAGES);
            $images_per_row = 3;
            if ($images_count < $images_per_row) {
                $total_rows = 1;
            } else {
                $total_rows = count($IMAGES) / $images_per_row;
            }
            $remaining_images = $images_count;
            for ($row = 0; $row < $total_rows; $row++) {
                echo "<tr>";
                for ($cell = 0; $cell < $images_per_row; $cell++) {
                    $cell_image = "";
                    if ($remaining_images) {
                        $img_id = $cell + $row * $images_per_row;

                        $img_src = $IMAGES[$img_id]["path"];
                        $img_alt = $IMAGES[$img_id]["name"];
                        $img_width = "100px";
                        $cell_image = "<img src='$img_src' alt='$img_alt' width='$img_width' >";

                        $cell_image .= "<p>" .  $IMAGES[$img_id]["width"] . "x" . $IMAGES[$img_id]["height"] . "</p>";
                        $cell_image .= "<p>" . $IMAGES[$img_id]["mime"] . "</p>";
                        $cell_image .= "<p>" . $IMAGES[$img_id]["file_size"] . " Bytes</p>";
                        $cell_image .= "<p>" . date("d/m/Y", $IMAGES[$img_id]["creation_date"]) . "</p>";

                        $remaining_images--;
                    }
                    echo "<td>";
                    echo $cell_image;
                    echo"</td>";
                }
                echo "</tr>";
            }
        }
    ?></table>
</body>
</html>