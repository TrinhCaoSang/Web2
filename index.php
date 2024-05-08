<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/Web2/public/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
</body>
</html>
<?php
$controllerName=ucfirst((strtolower('Controller'.$_REQUEST['controller'])??'khuyenmai'));
$actionName=$_REQUEST['action']??'index';
require "./app/controllers/${controllerName}.php";
$controllerObject=new $controllerName;
$controllerObject->$actionName();
?>