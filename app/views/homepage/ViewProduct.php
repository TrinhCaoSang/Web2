<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product</title>
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css" />
    <link rel="stylesheet" href="/Web2/public/components/fonts.css" />
    <link rel="stylesheet" href="/Web2/public/style.css" />
    <link rel="stylesheet" href="/Web2/public/components/menu/menu.css" />
    <link rel="stylesheet" href="/Web2/public/components/login/login.css" />
    <link rel="stylesheet" href="/Web2/public/components/popup/popUp.css" />
    <link rel="stylesheet" href="/Web2/public/components/pageInfoProduct.css" />
    <link rel="stylesheet" href="/Web2/public/components/search.css">
    <link rel="stylesheet" href="/Web2/public/components/responsive/responsive.css" />
    <link rel="stylesheet" href="/Web2/public/components/product/product.css" />
    <script type="module" defer src="/Web2/public/script.js"></script>
    <script type="module" defer src="/Web2/public/components/login/login.js"></script>
    <script type="module" defer src="/Web2/public/components/menu/menu.js"></script>
    <script type="module" defer src="/Web2/public/components/slider/slider.js"></script>
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
        </div><div class="container">
        <div class="leftmenu">
            <form>
                <h2>Lọc đơn giản</h2>
                <div id="locdongian">
                    <h3>Nhập khoảng giá</h3>
                    <input type="text" id="giatu">
                    <h3>đến</h3>
                    <input type="text" id="giaden"> <br>
                    <input type="submit" id="chon" value="Chọn">
                </div>
            </form>
            <br>
            <form>
                <h2>Lọc nâng cao</h2>
                <div id="locnangcao">
                    <select id="khoanggia">
                        <option value="a">10tr-50tr</option>
                        <option value="b">50tr-100tr</option>
                        <option value="c">100tr-300tr</option>
                    </select>
                    <br>
                    <div id="mountain">
                      <input type="checkbox" name="loaixe" value="mountain"><h3>Mountain</h3> <br>
                    </div>
                    <div id="road">
                      <input type="checkbox" name="loaixe" value="road"><h3>Road</h3><br>
                    </div>
                    <div id="kids">
                      <input type="checkbox" name="loaixe" value="kids"><h3>Kids</h3><br>
                    </div>
                    <div id="touring">
                      <input type="checkbox" name="loaixe" value="touring"><h3>Touring</h3><br>
                    </div>
                      <input type="submit" id="chon" value="Chọn">
                </div>
            </form>
        </div>
        <div style="background-color:none;width: 80%;float: left;margin-left: 30px;margin-top: 10%;height: 90%;">
        <?php
                  $count = count($data);
                  for ($i = 0; $i < $count-1; $i++){
                  
         ?> 
        <div id="content">
              <div class="divproduct">
                <div id="img-product">
                  <i class="fa-solid fa-cart-plus"></i>
                  <?php 
                  echo '<img src="data:image/jpeg;base64,'.base64_encode($data[$i]['Hinhanh']).'">';
                  ?>
                  <div id="datmua">
                    <h3>Mua ngay</h3>
                  </div>
                </div>
                <div id="mota-product">
                  <p><?php echo $data[$i]['TenHang'] ?> <br>
                    Price: <?php echo $data[$i]['DonGia'] ?></p>
                </div>
              </div>
              <div class="divproduct">
                <div id="img-product">
                  <i class="fa-solid fa-cart-plus"></i>
                  <?php 
                  echo '<img src="data:image/jpeg;base64,'.base64_encode($data[++$i]['Hinhanh']).'">';
                  ?>
                  <div id="datmua">
                    <h3>Mua ngay</h3>
                  </div>
                </div>
                <div id="mota-product">
                  <p><?php echo $data[++$i]['TenHang'] ?> <br>
                    Price: <?php echo $data[++$i]['DonGia'] ?></p>
                </div>
              </div>     
            <div style="clear:both"></div>
            </div>
               <?php 
                  } 
               ?>
         </div> 
        </div>
      </div>

    <!-- <div style="clear:both"></div> -->
      <div class="pagination">
        <a href=""id="active">&lt;&lt;</a>
        <a href="" >1</a>
        <a href="" >2</a>
        <a href="" >3</a>
        <a href="" >4</a>
        <a href="" id="active">&gt;&gt;</a>
      </div>


    <div class="section--4-container">
        <div class="section section--4 grid wide">
          <h1>Thể thao là cuộc sống, chúng tôi sẽ nâng cao cuộc sống của bạn bằng xe đạp!</h1>
          <button>ĐĂNG KÝ MUA NGAY HÔM NAY!</button>
        </div>
      </div><div class="footer-container">
        <div class="footer--section grid wide">
          <div class="row">
            <div class="footer-item footer-item--logo col c-12 m-12 l-2">TREK</div>
  
            <div class="footer-item footer-item--produce col c-6 m-6 l-2">
              <h1>Sản phẩm</h1>
              <ul>
                <li>
                  <a href="">Mountain</a>
                </li>
                <li>
                  <a href="">Road</a>
                </li>
                <li>
                  <a href="">Touring</a>
                </li>
                <li>
                  <a href="">Electric</a>
                </li>
                <li>
                  <a href="">Kids</a>
                </li>
              </ul>
            </div>
  
            <div class="footer-item footer-item--company col c-6 m-6 l-2">
              <h1>Về chúng tôi</h1>
              <ul>
                <li>
                  <a href="">Lịch sử hình thành</a>
                </li>
                <li>
                  <a href="">Về TREK</a>
                </li>
              </ul>
            </div>
  
            <div class="footer-item footer-item--help col c-6 m-6 l-2">
              <h1>Hỗ trợ</h1>
              <ul>
                <li>
                  <a href="">FAQs</a>
                </li>
                <li>
                  <a href="">Thông tin bảo mật</a>
                </li>
                <li>
                  <a href="">Chính sách chung</a>
                </li>
                <li>
                  <a href="">Tra cứu đơn hàng</a>
                </li>
              </ul>
            </div>
  
            <div class="footer-item footer-contact col c-6 m-6 l-2">
              <h1>Liên hệ chúng tôi</h1>
              <ul>
                <li>Địa chỉ: 801 West Madison Street, Waterloo WI 53594</li>
                <li>Hotline: 1-800-585-8735</li>
              </ul>
            </div>
          </div>
  
          <div class="footer-socials">
            <a href="">
              <i class="fa-brands fa-square-facebook"></i>
            </a>
            <a href="">
              <i class="fa-brands fa-square-instagram"></i>
            </a>
            <a href="">
              <i class="fa-brands fa-square-youtube"></i>
            </a>
            <a href="">
              <i class="fa-brands fa-square-x-twitter"></i>
            </a>
          </div>
  
          <div class="footer-copyright">
            <p>Copyright © 2023 TREK. All rights reserved.</p>
          </div>
        </div>
      </div>
</body>
</html>