<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/Web2/public/style.css">
=======
>>>>>>> b415c7d608ddd57a573520d4594d359b7b5b4dbb
</head>
<body>
</body>
</html>
<?php

<<<<<<< HEAD
$controllerName=ucfirst((strtolower('Controller'.$_REQUEST['controller'])??'khuyenmai'));
$actionName=$_REQUEST['action']??'index';
require "./app/controllers/${controllerName}.php";
$controllerObject=new $controllerName;
$controllerObject->$actionName();
=======
    $controllerName=ucfirst((strtolower('Controller'.$_REQUEST['controller'])??'khuyenmai'));
    $actionName=$_REQUEST['action']??'index';
    //require './app/controllers/BaseController.php';
    require "./app/controllers/${controllerName}.php";
    $controllerObject=new $controllerName;
    $controllerObject->$actionName();

    // require './app/controllers/BaseController.php';
    // require './app/controllers/ControllerKhuyenMai.php';
    // $promotion=new ControllerKhuyenMai;
    // $promotion->index();

>>>>>>> b415c7d608ddd57a573520d4594d359b7b5b4dbb
?>