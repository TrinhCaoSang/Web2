<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
</body>
</html>
<?php

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

?>