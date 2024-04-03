<<<<<<< HEAD
<!DOCTYPE html>
=======
<<<<<<< HEAD

  <!DOCTYPE html>
=======
<!DOCTYPE html>
>>>>>>> 08285baece043a94d328d99065cfaa43149dfc7d
>>>>>>> 5feb62df48d84a3b9c26cdcc53334e4e7668e2fb
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<<<<<<< HEAD
=======
    <title>Trek - Quản lý cửa hàng</title>
>>>>>>> 5feb62df48d84a3b9c26cdcc53334e4e7668e2fb
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/Web2/public/style.css">

<<<<<<< HEAD
    
    <!-- <script defer src= "/Web2/public/components/HomeAdmin/HomeAdmin.js"></script> -->
=======
    <link rel="stylesheet" href="/Web2/public/components/HomeAdmin/HomeAdmin.css">
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/AdminProduct.css">
    <link rel="stylesheet" href="/Web2/public/components/ManageUserList/ManageUserList.css" />
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/adminProduct.css" />
<<<<<<< HEAD
    
=======
    <!-- <script defer src= "/Web2/public/components/HomeAdmin/HomeAdmin.js"></script> -->
>>>>>>> 08285baece043a94d328d99065cfaa43149dfc7d
>>>>>>> 5feb62df48d84a3b9c26cdcc53334e4e7668e2fb
</head>
<body>
</body>
</html>
<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
    $controllerName=ucfirst((strtolower('Controller'.$_REQUEST['controller'])??'Sanpham'));
    $actionName=$_REQUEST['action']??'index';
    
    
=======
>>>>>>> 5feb62df48d84a3b9c26cdcc53334e4e7668e2fb
    $controllerName=ucfirst((strtolower('Controller'.$_REQUEST['controller'])??'khuyenmai'));
    $actionName=$_REQUEST['action']??'index';
    
    //require './app/controllers/BaseController.php';
<<<<<<< HEAD
=======
>>>>>>> 08285baece043a94d328d99065cfaa43149dfc7d
>>>>>>> 5feb62df48d84a3b9c26cdcc53334e4e7668e2fb
    require "./app/controllers/${controllerName}.php";
    
    $controllerObject=new $controllerName;
    $controllerObject->$actionName();

<<<<<<< HEAD
=======
<<<<<<< HEAD
?>
=======
>>>>>>> 5feb62df48d84a3b9c26cdcc53334e4e7668e2fb
    // require './app/controllers/BaseController.php';
    // require './app/controllers/ControllerKhuyenMai.php';
    // $promotion=new ControllerKhuyenMai;
    // $promotion->index();

<<<<<<< HEAD
?>
=======
?>
>>>>>>> 08285baece043a94d328d99065cfaa43149dfc7d
>>>>>>> 5feb62df48d84a3b9c26cdcc53334e4e7668e2fb
