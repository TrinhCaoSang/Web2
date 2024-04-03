<<<<<<< HEAD

  <!DOCTYPE html>
=======
<!DOCTYPE html>
>>>>>>> 08285baece043a94d328d99065cfaa43149dfc7d
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trek - Quản lý cửa hàng</title>
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/Web2/public/style.css">

    <link rel="stylesheet" href="/Web2/public/components/HomeAdmin/HomeAdmin.css">
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/AdminProduct.css">
    <link rel="stylesheet" href="/Web2/public/components/ManageUserList/ManageUserList.css" />
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/adminProduct.css" />
<<<<<<< HEAD
    
=======
    <!-- <script defer src= "/Web2/public/components/HomeAdmin/HomeAdmin.js"></script> -->
>>>>>>> 08285baece043a94d328d99065cfaa43149dfc7d
</head>
<body>
</body>
</html>
<?php

<<<<<<< HEAD
    $controllerName=ucfirst((strtolower('Controller'.$_REQUEST['controller'])??'Sanpham'));
    $actionName=$_REQUEST['action']??'index';
    
    
=======
    $controllerName=ucfirst((strtolower('Controller'.$_REQUEST['controller'])??'khuyenmai'));
    $actionName=$_REQUEST['action']??'index';
    
    //require './app/controllers/BaseController.php';
>>>>>>> 08285baece043a94d328d99065cfaa43149dfc7d
    require "./app/controllers/${controllerName}.php";
    
    $controllerObject=new $controllerName;
    $controllerObject->$actionName();

<<<<<<< HEAD
?>
=======
    // require './app/controllers/BaseController.php';
    // require './app/controllers/ControllerKhuyenMai.php';
    // $promotion=new ControllerKhuyenMai;
    // $promotion->index();

?>
>>>>>>> 08285baece043a94d328d99065cfaa43149dfc7d
