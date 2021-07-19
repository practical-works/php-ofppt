<?php
session_start();
$COLORS = [ "black", "white", "red", "green", "blue" ];
$background_color = (!empty($_SESSION["bcolor"])) ? $_SESSION["bcolor"] : $COLORS[0];
$text_color = (!empty($_SESSION["color"])) ? $_SESSION["color"] : $COLORS[1];

if ($_POST) {
    $_SESSION["bcolor"] = $background_color = $_POST["bcolor"];
    $_SESSION["color"] = $text_color = $_POST["color"];
}

function print_color_select_options($selected_color) {
    global  $COLORS;
    foreach ($COLORS as $color) {
        $selected = ($color == $selected_color) ? "selected" : "";
        echo "<option value='$color' $selected>$color</option>";
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ex3</title>
    <link rel="stylesheet" href="../_css/pure-min.css">
    <style>
        body {
            font-family: "Bookman Old Style";
            text-align: center;
            background: <?= $background_color; ?>;
            color: <?= $text_color; ?>;
        }
        select#bcolor {
            background-color: <?= $background_color; ?>;
            color: <?php
                    if ($background_color == "black")
                        echo "white";
                    else
                        echo "black";
                ?>;
        }
        select#color {
            background-color: <?= $text_color; ?>;
            color: <?php
                    if ($text_color == "black")
                        echo "white";
                    else
                        echo "black";
                ?>;
        }
        option[value="black"] {
            background-color: black;
            color: white;
        }
        option[value="white"] {
            background-color: white;
            color: black;
        }
        option[value="red"] {
            background-color: red;
            color: white;
        }
        option[value="green"] {
            background-color: green;
            color: white;
        }
        option[value="blue"] {
            background-color: blue;
            color: white;
        }
        .op {
            text-align: right;
        }
    </style>
</head>
<body>
<form action="Ex4.php" method="post">

    <div class="op pure-control-group">
        <label for="bcolor">Background color </label>
        <select name="bcolor" id="bcolor" onchange="this.form.submit()">
            <?= print_color_select_options($background_color); ?>
        </select>
    </div>

    <div class="op pure-control-group">
        <label for="color">Text color </label>
        <select name="color" id="color" onchange="this.form.submit()">
            <?= print_color_select_options($text_color); ?>
        </select>
    </div>

</form>
<div>
    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam perferendis possimus quo reiciendis velit. Aut, consectetur deserunt dolore facere iste magnam obcaecati, porro praesentium, qui reprehenderit repudiandae temporibus veniam voluptas?</h2>
</div>
</body>
</html>