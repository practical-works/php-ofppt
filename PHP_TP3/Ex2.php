<?php
$missing = [];
if ($_POST) {
    foreach ($_POST as $key => $value) {
        if ($value) {
            $$key = $value;
        } else {
            $missing[] = $key;
        }
    }
}
if (!$missing) {
    exit("<h1>Data submited with success !</h1>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ex2</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Bookman Old Style", sans-serif;
            background: linear-gradient(#afafaf, #cfcfcf);
            background-attachment: fixed;
        }
        input[type=text], input[type=number], select, textarea {
            width: 100%;
            padding: 6px 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: none;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 7px 10px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        form, fieldset {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            border: 2px solid #ccc;
        }
        .missing {
            color: red;
            font-weight: bold;
        }
        .no-input {
            background: rgba(255, 0, 0, 0.33);
        }
    </style>
</head>
<body>
<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
    <fieldset>
        <legend>Client Address</legend>
        <?php if($_POST && $missing) : ?>
            <span class="missing">A field or more are missing</span>
        <?php endif; ?>
        <p>
            <label for="fname">First Name</label>
            <input type="text" name="fname"  placeholder="Your first name..."
                class="<?php if($_POST && !isset($fname)) echo "no-input" ?>"
                value="<?php if(isset($fname)) echo $fname ?>">
        </p>
        <p>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" placeholder="Your last name..."
                class="<?php if($_POST && !isset($lname)) echo "no-input" ?>"
                value="<?php if(isset($lname)) echo $lname ?>">
        </p>
        <p>
            <label for="addr">Address</label>
            <textarea name="addr" placeholder="Your actual address..."
                  class="<?php if($_POST && !isset($addr)) echo "no-input" ?>"><?php if(isset($addr)) echo $addr ?></textarea>
        </p>
        <p>
            <label for="city">City</label>
            <select name="city"
                class="<?php if($_POST && !isset($city)) echo "no-input" ?>">>
                <option value="">Select your city...</option>
                <option value="marrakesh"
                    <?php if(isset($city) && $city == "marrakesh") echo "selected" ?>
                    >Marrakech</option>
                <option value="chefchaouen"
                    <?php if(isset($city) && $city == "chefchaouen") echo "selected" ?>
                    >Chefchaouen</option>
                <option value="rabat"
                    <?php if(isset($city) && $city == "rabat") echo "selected" ?>
                    >Rabat</option>
            </select>
        </p>
        <p>
            <label for="pcode">Postal Code</label>
            <input type="number" name="pcode" placeholder="Your postal code..."
                class="<?php if($_POST && !isset($pcode)) echo "no-input" ?>"
                value="<?php if (isset($pcode)) echo $pcode ?>">
        </p>
        <p>
            <input type="submit" value="Send">
        </p>
    </fieldset>
</form>
</body>
</html>