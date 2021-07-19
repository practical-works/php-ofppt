<?php session_start();
require_once "../_.php";
if ($_POST) {
    $form_is_valid = true;
    if (!isset($_POST["sex"])) {
        $_POST["sex"] = "";
    }
    if (!isset($_POST["program"])) {
        $_POST["program"] = [];
    }
    if (!isset($_POST["business"])) {
        $_POST["business"] = [];
    }
    $error_suffix = "_error";
    foreach ($_POST as $key => $value) {
        $$key = clean_input($value);
        if ($value) {
            ${$key . $error_suffix} = "";
        }
        else {
            ${$key . $error_suffix} = ucfirst("$key is missing");
            $form_is_valid = false;
        }
    }
    if (isset($first_name) && $first_name && !name_is_valid($first_name)) {
        $first_name_error = "Invalid first name";
        $form_is_valid = false;
    }
    if (isset($last_name) && $last_name && !name_is_valid($last_name)) {
        $last_name_error = "Invalid last name";
        $form_is_valid = false;
    }
    if (isset($email) && $email && !email_is_valid($email)) {
        $email_error = "Invalid email address";
        $form_is_valid = false;
    }
    if ($form_is_valid) {
        $_SESSION = $_POST;
        header("location: ex5_request.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Ex5 - Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ex5_files/formoid1/formoid-solid-green.css" type="text/css"/>
    <link rel="stylesheet" href="../_css/_.css">
    <script type="text/javascript" src="ex5_files/formoid1/jquery.min.js" async></script>
    <script type="text/javascript" src="ex5_files/formoid1/formoid-solid-green.js" defer></script>
</head>
<body class="blurBg-true" style="background-color:#EBEBEB">

<!-- Start Formoid form-->
<form class="formoid-solid-green" style="background-color:#ffffff;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px"
      method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <!-- Form Title -->
    <div class="title">
        <h2>Registration Form</h2>
    </div>

    <!-- First Name and Last Name -->
    <div class="element-name">
        <label class="title">Name</label>
        <div class="err"><?php if($_POST) echo $first_name_error ?></div>
        <div class="err"><?php if($_POST) echo $last_name_error ?></div>
        <span class="nameFirst">
            <input placeholder="First Name" type="text"  name="first_name"
            value="<?php if($_POST) echo $first_name ?>">
            <span class="icon-place"></span>
        </span>
        <span class="nameLast">
            <input placeholder="Last Name" type="text" name="last_name"
            value="<?php if($_POST) echo $last_name ?>">
            <span class="icon-place"></span>
        </span>
    </div>

    <!-- Email -->
    <div class="element-email">
        <label class="title">Email</label>
        <div class="err"><?php if($_POST) echo $email_error ?></div>
        <div class="item-cont">
            <input class="large" type="email" name="email"
                   value="<?php if($_POST) echo $email ?>" placeholder="Email Address"/>
            <span class="icon-place"></span>
        </div>
    </div>

    <!-- Sex -->
    <div class="element-radio">
        <label class="title">Sex</label>
        <div class="err"><?php if($_POST) echo $sex_error ?></div>
        <div class="column column2">
            <label>
                <input type="radio" name="sex" value="male"
                    <?php if($_POST && $sex == "male") echo "checked" ?>>
                <span>Male</span>
            </label>
        </div>
        <span class="clearfix"></span>
        <div class="column column2">
            <label>
                <input type="radio" name="sex" value="female"
                    <?php if($_POST && $sex == "female") echo "checked" ?>>
                <span>Female</span>
            </label>
        </div>
        <span class="clearfix"></span>
    </div>

    <!-- Country -->
    <div class="element-select">
        <label class="title">Country</label>
        <div class="err"><?php if($_POST) echo $country_error ?></div>
        <div class="item-cont">
            <div class="large">
                <select name="country">
                    <option value="" <?php if($_POST && $country == "") echo "selected" ?>>Select Country...</option>
                    <option value="Morocco" <?php if($_POST && $country == "Morocco") echo "selected" ?>>Morocco</option>
                    <option value="Italy" <?php if($_POST && $country == "Italy") echo "selected" ?>>Italy</option>
                    <option value="Germany" <?php if($_POST && $country == "Germany") echo "selected" ?>>Germany</option>
                </select>
                <span class="icon-place"></span>
            </div>
        </div>
    </div>

    <!-- Programming Languages -->
    <div class="element-multiple">
        <label class="title">Programming Languages</label>
        <div class="err"><?php if($_POST) echo $program_error ?></div>
        <div class="item-cont">
            <div class="large">
                <select data-no-selected="" name="program[]" multiple>
                    <option value="c" <?php if ($_POST && in_array("c", $program)) echo "selected"?>>C</option>
                    <option value="cpp" <?php if ($_POST && in_array("cpp", $program)) echo "selected"?>>C++</option>
                    <option value="java" <?php if ($_POST && in_array("java", $program)) echo "selected"?>>Java</option>
                    <option value="php" <?php if ($_POST && in_array("php", $program)) echo "selected"?>>PHP</option>
                    <option value="cs" <?php if ($_POST && in_array("cs", $program)) echo "selected"?>>C#</option>
                </select>
                <span class="icon-place"></span>
            </div>
        </div>
    </div>

    <!-- Business areas -->
    <div class="element-checkbox">
        <label class="title">Business areas</label>
        <div class="err"><?php if ($_POST) echo $business_error ?></div>
        <div class="column column3">
            <label>
                <input type="checkbox" name="business[]" value="Computer"
                <?php if($_POST && in_array("Computer", $business)) echo "checked" ?>>
                <span>Computer</span>
            </label>
        </div>
        <span class="clearfix"></span>
        <div class="column column3">
            <label>
                <input type="checkbox" name="business[]" value="Management"
                    <?php if($_POST && in_array("Management", $business)) echo "checked" ?>>
                <span>Management</span>
            </label>
        </div>
        <span class="clearfix"></span>
        <div class="column column3">
            <label>
                <input type="checkbox" name="business[]" value="Pedagogy"
                    <?php if($_POST && in_array("Pedagogy", $business)) echo "checked" ?>>
                <span>Pedagogy</span>
            </label>
        </div>
        <span class="clearfix"></span>
    </div>

    <!-- Submit -->
    <div class="submit">
        <input type="submit" value="Submit"/>
    </div>

</form>
<!-- Stop Formoid form-->

</body>
</html>
