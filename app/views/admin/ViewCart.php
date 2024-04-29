<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/Web2/public/html/page/cart/cart.css">
    <link rel="stylesheet" href="/Web2/public/components/menu/menu.css">
    <link rel="stylesheet" href="/Web2/public/components/login/login.css">
    <link rel="stylesheet" href="/Web2/public/html/page/cart/reponsive.css">
    <title>Document</title>
</head>
<body>
<header>
        <div class="header__container">
          <div class="header__top">
            <div class="header__top-item--left">
              <div class="header__top-item user-welcome active">
                <p>Xin chào,</p>
                <p></p>
              </div>
            </div>
          </div>
  
          <!-- =========== END: HEADER TOP =========== -->
  
          <!-- =========== START: HEADER BOTTOM =========== -->
  
          <div class="header__bottom">
            <div class="header__bottom--logo">
              <a href="index.php">TREK</a>
            </div>
            <div class="header__bottom--list">
              <ul>
                <li>
                  <a href="product.php">ALL</a>
                </li>
                <li>
                  <a href="product.php">MOUNTAIN</a>
                </li>
                <li>
                  <a href="product.php">ROAD</a>
                </li>
                <li>
                  <a href="product.php">TOURING</a>
                </li>
                <li>
                  <a href="product.php">KIDS</a>
                </li>
              </ul>
            </div>
  
            <div class="header__bottom--extention">
              <div class="header__bottom--extention-item header__bottom--extention-user">
                <i class="fa-solid fa-user"></i>
                <ul class="header__bottom--user__list">
                  <li class="adminManager__item" style="display: block">
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
            </div>
  
            <div class="header__bottom--hide-menu">
              <i class="fa-solid fa-bars"></i>
            </div>
          </div>
        </div>
      </header>
      <div class="content">
        <div class="order_status">
          <table id="order_status_table">
            <thead>
              <tr>
                <th>Giỏ hàng</th>
                <th>Đang chờ xử lý</th>
                <th>Đang giao</th>
              </tr>
            </thead>
          </table>
        </div>
  
        <div class="cart-info_container">
        <form action="index.php?controller=cart&action=update" method="post">
          <table class="menu" id="menu">
            <thead>
              <tr>
                <th>Hình ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Đơn giá</th>
                <th>Số Lượng</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
  
            <tbody class="cart-info" id="cart-info">
                <?php
                    foreach($products as $product){
                ?>
               <tr>
                <th><img src="data:image/jpeg;base64,<?php echo base64_encode($product['Hinhanh'])?>"></th>            
                <th><?php echo $product['TenHang'] ?></th>
                <th><?php echo $product['DonGia'] ?></th>
                <th>
                    <input type="text" name="qty[<?php echo $product['MaHang'] ?>]" value="<?php echo $product['qty'] ?>">
                </th>
                <th><a href="index.php?controller=cart&action=delete&id=<?php echo $product['MaHang'] ?>">Xóa</a></th>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
            <p align="left">
                <a href="index.php?controller=cart&action=destroy">Xóa tất cả</a>
                <a href="index.php?controller=product&action=index">Tiếp tục mua</a>
                <button>Cập nhật</button>
                <button onclick="return flase;">Đặt hàng</button>
            </p>
          </form>
         
          <div class="form-order">
            <form action="index.php?controller=order&action=store" method="post">
                <label>Tên khách hàng</label>
                <input type="text" name="customer_name">
                <br>
                <label>Email khách hàng</label>
                <input type="text" name="customer_email">
                <br>
                <label>Số điện thoại</label>
                <input type="text" name="customer_phone">
                <br>
                <label>&nbsp;</label>
                <button>Gửi đơn hàng</button>
                <br>
            </form>
          </div>

        </div>
      </div>
      <!-- <footer id="footer">
        <div class="totalPrice" id="totalPriceContainer">
          <h3>Thanh toán</h3>
          <span id="totalPriceId">0 VND</span>
        </div>
        <div class="footerButton">
          <button id="selectAllButton">Chọn tất cả</button>
  
          <button id="buy">Mua</button>
          <button id="delete">Xóa</button>
        </div>
      </footer> -->

      <div class="toast" id="toast">
        <h2>Chưa có sản phẩm nào trong giỏ hàng</h2>
      </div>

      <div class="overlay"></div>

      <div class="modal">
        <header class="modal__header">
          <h1>Xóa dữ liệu</h1>
        </header>
        <div class="modal__content">
          <p>Bạn có muốn xóa dữ liệu này không?</p>
        </div>
        <div class="modal__footer">
          <button class="modal__footer--delete">Chắc chắn</button>
          <button class="modal__footer--exit">Không</button>
        </div>
      </div>


      <div class="hide__menu">
        <button class="hide__menu--close">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <h1>TREK</h1>
        <div class="hide__menu--list__extention">
          <div class="header__bottom--extention-item header__bottom--extention-user active-down" id="userLowDeviceBtn">
            <i class="fa-solid fa-user"></i>
            <span>Tài khoản</span>
            <i class="header__bottom--extention__icon header__bottom--extention__icon--down fa-solid fa-caret-down"></i>
            <i class="header__bottom--extention__icon header__bottom--extention__icon--up fa-solid fa-caret-up"></i>
          </div>
          <div class="hide__menu--user__list">
            <div class="hide__menu--list__type adminManager__item" style="display: none"><button>Quản lý</button></div>
            <div class="hide__menu--list__type logout__item"><button>Đăng xuất</button></div>
          </div>
  
          <div class="header__bottom--extention-item header__bottom--extention-cate">
            <i class="fa-solid fa-table-columns"></i>
            <span>Danh mục</span>
            <i class="header__bottom--extention__icon header__bottom--extention__icon--down fa-solid fa-caret-down"></i>
            <i class="header__bottom--extention__icon header__bottom--extention__icon--up fa-solid fa-caret-up"></i>
          </div>
          <div class="hide__menu--list__types">
            <div class="hide__menu--list__type"><a href="/public/html/page/product/product.php">ALL</a></div>
            <div class="hide__menu--list__type"><a href="/public/html/page/product/product.php">MOUNTAIN</a></div>
            <div class="hide__menu--list__type"><a href="/public/html/page/product/product.php">ROAD</a></div>
            <div class="hide__menu--list__type"><a href="/public/html/page/product/product.php">TOURING</a></div>
            <div class="hide__menu--list__type"><a href="/public/html/page/product/product.php">KIDS</a></div>
          </div>
        </div>
      </div>

      <div class="overlay"></div>

      <script type="module" src="/public/database/products.js"></script>
      <script type="module" src="/public/components/menu/menu.js"></script>
      <script type="module" src="cart.js"></script>
</body>

<style>
    .form-order{
        width: 200px;
        float: left;
    }
    .form-order input{
        padding: 5px;
        width: 200px;
        margin-bottom: 10px;

    }
</style>
</html>