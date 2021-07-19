<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ex5 - Registration Data</title>
    <style>
        body {
            margin: 10px;
            padding: 0;
            font-family: "Bookman Old Style", sans-serif;
            background: linear-gradient(#54d9f1, #1212af);
            background-attachment: fixed;
        }
        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #4CAF50;
            box-shadow: 0px 0px 50px white;
        }

        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2;}

        tr:hover {background-color: #ddd;}

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        a:link{
            text-decoration:underline;
            color:#2a5db0;
        }
        a:visited{
            text-decoration:underline;
            color:darkslategray;
        }
        a:hover{
            text-decoration:none;
            color:#4CAF50;
        }
    </style>
</head>
<body>
<h1>Welcome <?php if($_SESSION) echo $_SESSION["first_name"]; ?> !</h1>
<table>
    <tr>
        <?php if($_SESSION) :
            foreach ($_SESSION as $key => $value) {
                echo "<th>$key</th>";
            }
        endif; ?>
    </tr>
    <tr>
        <?php if($_SESSION) :
            foreach ($_SESSION as $key => $value) {
                if (is_array($value)) {
                    echo "<td>". implode(", ", $value) . "</td>";
                } else {
                    echo "<td>$value</td>";
                }
            }
        endif; ?>
    </tr>
</table>
<h2><a href="Ex5.php">&lt;&lt; Go back</a></h2>
</body>
</html>