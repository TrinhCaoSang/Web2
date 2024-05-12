<!DOCTYPE html>
<html lang="en">
<body>
</body>
</html>
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

?>