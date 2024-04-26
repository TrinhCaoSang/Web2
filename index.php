<!DOCTYPE html>
<html lang="en">

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