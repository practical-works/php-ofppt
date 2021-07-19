<?php
$COLORS = [ "black", "white", "red", "green", "blue" ];
$background_color = (!empty($_COOKIE["bcolor"])) ? $_COOKIE["bcolor"] : $COLORS[0];
$text_color = (!empty($_COOKIE["color"])) ? $_COOKIE["color"] : $COLORS[1];

if ($_POST) {
    $background_color = $_POST["bcolor"];
    $text_color = $_POST["color"];
    $month = 30*24*60*60;
    setcookie("bcolor", $background_color, time() + 2*$month);
    setcookie("color", $text_color, time() + 2*$month);
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
<form action="Ex3.php" method="post">

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
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam at, consequatur distinctio ducimus earum eos, inventore laborum magnam magni mollitia nostrum odio odit optio, quam qui ratione ullam voluptatem.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci corporis dignissimos dolor explicabo mollitia nam numquam praesentium quaerat quisquam recusandae sapiente sed, tempora voluptates! Alias cum ducimus neque nisi similique!</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aut cupiditate dolore impedit maxime neque nisi, nostrum praesentium quod sit. Esse ipsum maxime modi nam nobis praesentium quod, rem ullam?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid, aut blanditiis deserunt dignissimos dolorem excepturi ipsa iure magni nostrum nulla pariatur placeat possimus, suscipit voluptas. Nihil nobis obcaecati vel.</p>
</div>
</body>
</html>