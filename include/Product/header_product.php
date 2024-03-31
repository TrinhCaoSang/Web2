<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="public/fontawesome-free-6.5.1-web/css/all.min.css" />

    <link rel="stylesheet" href="public/components/fonts.css" />

    <link rel="stylesheet" href="public/style.css" />
    <link rel="stylesheet" href="public/components/product/product.css" />

    <link rel="stylesheet" href="public/components/menu/menu.css" />
    <link rel="stylesheet" href="public/components/login/login.css" />
    <link rel="stylesheet" href="public/components/popup/popUp.css" />
    <link rel="stylesheet" href="public/components/pageInfoProduct.css" />
    <link rel="stylesheet" href="public/components/search.css">
    <link rel="stylesheet" href="public/components/responsive/responsive.css" />
</head>
<body style="margin: 0 auto;">
    <div class="header">
        <!-- =========== START: HEADER TOP =========== -->
  
        <div class="header__container">
          <div class="header__top">
            <div class="grid wide header__top--container">
              <div class="header__top-item--left">
                <div class="header__top-item user-welcome">
                  <p>Xin chào,</p>
                  <p></p>
                </div>
              </div>
              <div class="header__top-item--right">
                <div class="header__top-item">
                  <a class="header__top-link" href="">Trợ giúp</a>
                </div>
                <span>|</span>
                <div class="header__top-item">
                  <a class="header__top-link" href="">Hệ thống cửa hàng</a>
                </div>
                <span>|</span>
                <div class="header__top-item-select">
                  Language:
                  <select name="" id="">
                    <option value="opt1" selected class="opt">Vietnamese</option>
                    <option value="opt2">English</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
    
          <!-- =========== END: HEADER TOP =========== -->
    
          <!-- =========== START: HEADER BOTTOM =========== -->
    
          <div class="header__bottom">
          <div class="header__bottom--logo">
              <a href="index.php">TREK</a>
            </div>
            <div class="header__search--extension">
              <form>
                <div class="input_search">
                  <input type="search" autocomplete="off">
                  <button type="submit" id="btnSubmit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </div>
              </form>
            </div>
    
            <div class="header__bottom--extention">
              <div class="header__bottom--extention-item header__bottom--extention-user">
                <i class="fa-solid fa-user"></i>
                <ul class="header__bottom--user__list">
                  <li class="adminManager__item" style="display: none">
                    <button class="adminManager">
                      <i class="fa-solid fa-hammer"></i>
                      <p>Quản lý</p>
                    </button>
                  </li>
                  <li>
                    <button class="logout">
                      <i class="fa-solid fa-door-open"></i>
                      <p>Đăng xuất</p>
                    </button>
                  </li>
                </ul>
              </div>
    
              <a href="cart.php">
                <div class="header__bottom--extention-item header__bottom--extention-cart">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <p>0</p>
                </div>
              </a>
              
            </div>
    
            <div class="header__bottom--hide-menu">
              <i class="fa-solid fa-bars"></i>
            </div>
          </div>
        </div>
        </div>