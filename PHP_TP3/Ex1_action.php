<?php
if($_POST) :
    foreach ($_POST as $key => $value) {
        if (!$value) {
            echo "<script>alert('A field or more are missing !')</script>";
            break;
        }
}
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ex1_action</title>
    <style>
        body {
            margin: 10% 20%;
            padding: 0;
            font-family: "Bookman Old Style", sans-serif;
            background: linear-gradient(#afafaf, #cfcfcf);
            background-attachment: fixed;
        }
        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #4CAF50;
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
    <h1>Welcome <?php if($_POST) echo $_POST["fname"]; ?> !</h1>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Postal Code</th>
        </tr>
        <tr>
            <?php if($_POST) :
                foreach ($_POST as $key => $value) {
                    echo "<td>$value</td>";
                }
            endif; ?>
        </tr>
    </table>
    <h2><a href="Ex1.php">&lt;&lt; Go back</a></h2>
</body>
</html>