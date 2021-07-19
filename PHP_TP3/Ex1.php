<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ex1</title>
    <style>
        body {
            margin: 0 20%;
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
    </style>
</head>
<body>
<form method="post" action="Ex1_action.php">
    <fieldset>
        <legend>Client Address</legend>
        <p>
            <label for="fname">First Name</label>
            <input type="text" name="fname"  placeholder="Your first name...">
        </p>
        <p>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" placeholder="Your last name...">
        </p>
        <p>
            <label for="addr">Address</label>
            <textarea name="addr" placeholder="Your actual address..."></textarea>
        </p>
        <p>
            <label for="city">City</label>
            <select name="city">
                <option value="">Select your city...</option>
                <option value="marrakesh">Marrakech</option>
                <option value="chefchaouen">Chefchaouen</option>
                <option value="rabat">Rabat</option>
            </select>
        </p>
        <p>
            <label for="pcode">Postal Code</label>
            <input type="number" name="pcode" placeholder="Your postal code...">
        </p>
        <p>
            <input type="submit" value="Send">
        </p>
    </fieldset>
</form>
</body>
</html>