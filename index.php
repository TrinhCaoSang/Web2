<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/Web2/public/style.css"> -->
</head>
=======

<body>
</body>
>>>>>>> 2dd8d62762797c2aa7b411682bb57c2e5e23753a
</html>

<<<<<<< HEAD
<?php
    session_start();
    if(isset($_REQUEST['controller'])){
        $controllerName=ucfirst((strtolower('Controller'.$_REQUEST['controller'])??'khuyenmai'));
        $actionName=$_REQUEST['action']??'index';
        require "./app/controllers/${controllerName}.php";
        $controllerObject=new $controllerName;
        $controllerObject->$actionName();
    }
    else{
        echo '<meta http-equiv="refresh" content="0;URL=\'index.php?controller=product&action=index\'">'; // Chuyển hướng sau 0 giây
    }


    // require './app/controllers/BaseController.php';
    // require './app/controllers/ControllerKhuyenMai.php';
    // $promotion=new ControllerKhuyenMai;
    // $promotion->index();

=======
$controllerName=ucfirst((strtolower('Controller'.$_REQUEST['controller'])??'khuyenmai'));
$actionName=$_REQUEST['action']??'index';
require "./app/controllers/${controllerName}.php";
$controllerObject=new $controllerName;
$controllerObject->$actionName();

>>>>>>> 2dd8d62762797c2aa7b411682bb57c2e5e23753a
?>