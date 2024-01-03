<!DOCTYPE html>
<?php
session_start();
$_SESSION['redirect']=null;
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Galleria</title>
    <link rel="stylesheet" type="text/css" href="css/galleria.css">
</head>
<body>
    <?php require "header.html"; ?>
    <div style="height: 100px;"></div>  
    <?php require "footer.html"; ?>
</body>
</html>