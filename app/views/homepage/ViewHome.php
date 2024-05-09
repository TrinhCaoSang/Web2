<?php
  session_start();
  ob_start();

  // Kiểm tra trạng thái đăng nhập
  if (isset($_SESSION['username'])) {
    
    $loggedIn = true;

    // Kiểm tra loại tài khoản
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'staff') {
      $userType = 'staff';
    } else {
      $userType = 'customer';
    }
  } else {
    // Người dùng chưa đăng nhập
    $loggedIn = false;
    $userType = null;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trek Bikes - Cuộc sống sẽ tốt hơn khi có xe đạp</title>
    <link rel="stylesheet" href="/WEB2/public/fontawesome-free-6.5.1-web/css/all.min.css" />
    <link rel="stylesheet" href="/WEB2/public/components/fonts.css" />
    <link rel="stylesheet" href="/WEB2/public/style.css" />
    <link rel="stylesheet" href="/WEB2/public/components/menu/menu.css" />
    <link rel="stylesheet" href="/WEB2/public/components/login/login.css" />
    <link rel="stylesheet" href="/WEB2/public/components/popup/popUp.css" />
    <link rel="stylesheet" href="/WEB2/public/components/pageInfoProduct.css" />
    <link rel="stylesheet" href="/WEB2/public/components/search.css">
    <link rel="stylesheet" href="/WEB2/public/components/responsive/responsive.css" />
    <link rel="stylesheet" href="/WEB2/public/components/product/product.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="module" defer src="/WEB2/public/components/login/login.js"></script> 
    <script type="module" defer src="/Web2/public/script.js"></script>
    <script type="module" defer src="/Web2/public/components/slider/slider.js"></script>
  
  </head>
  <body>
    
    <!-- =========== START: HEADER =========== -->
    <div class="header">
      <!-- =========== START: HEADER TOP =========== -->

      <div class="header__container">
        <div class="header__top">
          <div class="grid wide header__top--container">
            <div class="header__top-item--left">
              <div class="header__top-item user-welcome">
                <p>Xin chào,</p>
                <p>
                    <?php
                    
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    }
                    
                    ?>
                </p>
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
              <!-- <span>|</span> -->
              <!-- <div class="header__top-item-select">
                Language:
                <select name="" id="">
                  <option value="opt1" selected class="opt">Vietnamese</option>
                  <option value="opt2">English</option>
                </select>
              </div> -->
            </div>
          </div>
        </div>
    
        <!-- =========== END: HEADER TOP =========== -->
  
        <!-- =========== START: HEADER BOTTOM =========== -->
  
        <div class="header__bottom">
          <div class="header__bottom--logo">TREK</div>
          <div class="header__bottom--list">
            <ul>
              <li>
                <a href="index.php?controller=product&action=index&type=all">ALL</a>
              </li>
              <li>
                <a href="index.php?controller=product&action=index&type=mountain">MOUNTAIN</a>
              </li>
              <li>
                <a href="index.php?controller=product&action=index&type=road">ROAD</a>
              </li>
              <li>
                <a href="index.php?controller=product&action=index&type=touring">TOURING</a>
              </li>
              <li>
                <a href="index.php?controller=product&action=index&type=kids">KIDS</a>

              </li>
            </ul>
          </div>
  
          <div class="header__bottom--extention">
                <div class="header__bottom--extention-item header__bottom--extention-user">
                   <i class="fa-solid fa-user"></i>
                    <ul class="header__bottom--user__list">
                        <!-- <li class="adminManager__item">
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
                        </li> -->
                    </ul>
                </div>
            
                
           

                <a href="index.php?controller=cart&action=index">
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

      <div class="header__slider">
        <video src="/WEB2/public/database/images/sliderVideos/RBHFFG Marquee Summer 2021.mp4" muted></video>
        <video src="/WEB2/public/database/images/sliderVideos/NF24 US Video Marquee_1080p.mp4" muted></video>
        <video src="/WEB2/public/database/images/sliderVideos/Fuel EX_ Ace of All Trails.mp4" muted></video>
        <ul class="dots">
          <li class="active"></li>
          <li></li>
          <li></li>
        </ul>

        <div class="header__slider--btn-container">
          <button class="btn header__slide--btn-left">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <button class="btn header__slide--btn-right">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>

        <div class="header__slider--bars"></div>
      </div>

      <!-- =========== END: HEADER SLIDER =========== -->
    </div>

    <!-- =========== END: HEADER =========== -->

    <di v class="content grid wide">
      <div class="section section--1">
        <h1>Tại sao nên chọn chúng tôi?</h1>
        <div class="wrapper row">
          <div class="section--1__item col l-3 m-6 c-12">
            <i class="fa-solid fa-truck-fast"></i>
            <h3>Vận chuyển</h3>
            <p>
              Dịch vụ vận chuyển hàng hóa chuyên nghiệp của chúng tôi cam kết đảm bảo an toàn và độ tin cậy cho mọi lô
              hàng của bạn
            </p>
          </div>
          <div class="section--1__item col l-3 m-6 c-12">
            <i class="fa-solid fa-rotate-right"></i>
            <h3>Đổi - trả</h3>
            <p>Sản phẩm có thể được đổi hoặc trả trong khoảng thời gian quy định với điều kiện cụ thể</p>
          </div>
          <div class="section--1__item col l-3 m-6 c-12">
            <i class="fa-solid fa-building-columns"></i>
            <h3>Thanh toán</h3>
            <p>Nhiều phương thức thanh toán linh hoạt: thanh toán khi nhận hàng, qua tất cả ngân hàng</p>
          </div>
          <div class="section--1__item col l-3 m-6 c-12">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <h3>Bảo hành</h3>
            <p>Luôn sẵn sàng bảo hành cho dù mọi tình huống, để đảm bảo khách hàng luôn có trải nghiệm tốt nhất</p>
          </div>
        </div>
      </div>
    </di>

    <div class="section section--2">
      <div class="section--2-container row">
        <div class="section--2-item col l-4 m-4 c-12">
          <span data-value="10000000">10M+</span>
          <p>sản phẩm đã bán</p>
        </div>
        <div class="section--2-item col l-4 m-4 c-12">
          <span data-value="1700000">1M7+</span>
          <p>người theo dõi trên Facebook</p>
        </div>
        <div class="section--2-item col l-4 m-4 c-12" id="experienceYear">
          <span data-value="45">45</span>
          <p>năm kinh nghiệm</p>
        </div>
      </div>
    </div>

  
    <div class="info_container">
      <div class="product">
        <div class="left">
          <div class="image"><img src="/Web2/public/database/images/productImgs/mountain-3.jpg" alt=""></div>
        </div>
        <div class="right">
          <div class="type">Mountain</div>
          <div class="name">Fuel EXe 9.9 XX AXS T-TYPE</div>
          <div class="content">
            <p>
              Sở hữu thiết kế hiện đại, cá tính . Chiếc xe này mang đến cảm giác lái mạnh mẽ và ấn tượng, phù hợp với
              những người yêu thích leo núi và muốn thể hiện cá tính của mình
            </p>
            <ul class="custom-list">
              <li>Động cơ Shimano EP8-RS mạnh mẽ và êm ái</li>
              <li>Pin 720Wh cho tầm hoạt động dài</li>
              <li>Khung 900 Series Alpha Aluminum nhẹ và bền</li>
              <li>Vành Bontrager Kovee XXX 30 carbon nhẹ và bền</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="product reverse">
        <div class="left">
          <div class="image"><img src="/Web2/public/database/images/productImgs/road.webp" alt=""></div>
        </div>
        <div class="right">
          <div class="type">Road</div>
          <div class="name">Domane SLR 9 AXS Gen 4</div>
          <div class="content">
            <p>
              Xe đạp đường đua cao cấp, tốc độ và thoải mái. Domane SLR 9 AXS Gen 4 là một chiếc xe đạp đường đua cao cấp của Trek, được trang bị những công nghệ tiên tiến nhất hiện nay.
            </p>
            <ul class="custom-list">
              <li>Khung 800-Series OCLV Carbon, giảm xóc IsoSpeed giảm rung</li>
              <li>Hiệu suất cao với bộ chuyển động SRAM Red AXS 12 tốc độ</li>
              <li>Phanh đĩa thủy lực SRAM Red AXS</li>
              <li>vành Bontrager Aeolus RSL 37 carbon</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="left">
          <div class="image"><img src="/Web2/public/database/images/productImgs/touring.webp" alt=""></div>
        </div>
        <div class="right">
          <div class="type">Touring</div>
          <div class="name">
            Checkpoint SLR 7 AXS</div>
          <div class="content">
            <p>
              Xe đạp gravel cao cấp, đa năng và thoải mái. Checkpoint SLR 7 AXS là một chiếc xe đạp gravel cao cấp của Trek, được trang bị những công nghệ tiên tiến nhất hiện nay. 
            </p>
            <ul class="custom-list">
              <li>Khung 700 Series OCLV Carbon, giảm xóc IsoSpeed giảm rung</li>
              <li>Vành Bontrager Aeolus Pro 3V carbon</li>
              <li>Hiệu suất cao với bộ chuyển động SRAM Force AXS 12 tốc độ</li>
              <li>Phanh đĩa thủy lực SRAM Force AXS</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="product reverse">
        <div class="left">
          <div class="image"><img src="/Web2/public/database/images/productImgs/kid.webp" alt=""></div>
        </div>
        <div class="right">
          <div class="type">Kid</div>
          <div class="name">Super Sprocket 16"</div>
          <div class="content">
            <p>
              Xe đạp trẻ em vui nhộn và năng động. Super Sprocket 16" là một chiếc xe đạp trẻ em của Trek, được thiết kế dành cho trẻ em từ 3-5 tuổi.
            </p>
            <ul class="custom-list">
              <li>Thiết kế vui nhộn và năng động với khung xe màu sắc tươi sáng, lốp xe dày và bánh xe có đèn LED</li>
              <li>Khả năng vận hành ổn định với khung xe chắc chắn, bánh xe có kích thước phù hợp</li>
              <li>An toàn với hệ thống phanh V-brake và chắn bùn</li>
            </ul>
          </div>
        </div>
      </div>

      
      </div>
    </div>
    <div class="section--4-container">
      <div class="section section--4 grid wide">
        <h1>Thể thao là cuộc sống, chúng tôi sẽ nâng cao cuộc sống của bạn bằng xe đạp!</h1>
        <button>ĐĂNG KÝ MUA NGAY HÔM NAY!</button>

      </div>
    </div>
    <div class="footer-container">
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
       
  
      <div class="overlay"></div>
      <!-- login/create account -->
      <div class="user__wrapper">
        <button class="form__close--global">
            <i class="fa-solid fa-xmark"></i>
        </button>
  
        <div class="register">
          <div class="register__info">
  
            <h1>Tạo tài khoản</h1>
            <form id="register-form">
              <div class="register__info--input register__info--input__full-name">
                <label for="registerName">Tên đầy đủ</label>
                <input type="text" name="registerName1" id="registerName" class="register__info--input-name" placeholder="Nhập tên của bạn" />
               
              </div>
              <div id="Name_reg--error" class="error-message"></div>
              <div class="register__info--input register__info--input__full-password">
                 <label for="registerPassword">Mật khẩu</label>
                 <div class="password__container">
                  <input type="password"
                  class="register__info--input-password"
                  id="registerPassword"
                  name="registerPassword1"
                  placeholder="Nhập mật khẩu của bạn"/>
                  <button class="showEyeRegister">
                     <i class="fa-solid fa-eye"></i>
                  </button>
  
                  <button class="hideEyeRegister hide">
                    <i class="fa-solid fa-eye-slash"></i>
                  </button>
                 </div>            
              </div>
              <div id="Pass_reg--error" class="error-message"></div>

              <div class="register__info--input register__info--input__Phone">
                <label for="registerPhone">Số điện thoại</label>
                <input type="text" name="registerPhone1" id="registerPhone" class="register__info--input-Phone" placeholder="Nhập số điện thoại" />
     
              </div>
              <div id="Phone_reg--error" class="error-message"></div>

              <div class="register__info--input register__info--input__Gender">
                  <label for="registerGender">Giới tính</label>
                  <select name="registerGender1" id="registerGender"  class="register__info--input-email">
                       <option value="" disabled selected hidden>Chọn</option>
                       <option value="male">Nam</option>
                       <option value="female">Nữ</option>
                       <option value="other">Khác</option>
                  </select>
              </div>
              <div id="Gender_reg--error" class="error-message"></div>

              <div class="register__info--input register__info--input__address">
                <label for="registeraddress">Địa chỉ</label>
                <input type="text" name="registeraddress1" id="registeraddress" class="register__info--input-address" placeholder="Nhập địa chỉ của bạn" />
               
              </div>
              <div id="Address_reg--error" class="error-message"></div>
              <p class="policy">
                Bằng việc đã đăng ký, bạn đã đồng ý với <b>Trek</b> về 
                <a href="">Điều khoản dịch vụ</a> và 
                <a href="">Chính sách bảo mật</a>
              </p>
              <button type="submit" class="register__info--submit">Đăng ký</button>
            </form>
            <div class="signin" style="display: none">
                <p>Bạn đã có tài khoản?</p>
                <button>Đăng nhập</button>
            </div>
          </div>
  
          <div class="register__background">
            <h1>Chào mừng bạn đã trở lại</h1>
            <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
            <button>Đăng nhập</button>
          </div>
        </div>
  
        <div class="login">
          <div class="login__info">
            <h1>Đăng nhập</h1>
            <form action="" id="login-form" method="post">
              <div class="login__info--input login__info--input__full-email">
                <label for="loginName">Tên đăng nhập</label>
                <input type="Name" name="Namelogin" class="login__info--input-name" id="loginName" placeholder="Nhập tên đăng nhập" />
                <p></p>
              </div>
              <div id="Name_log--error" class="error-message"></div>
              <div class="login__info--input login__info--input__full-password">
                <label for="loginPassword">Mật khẩu</label>
  
                <div class="password__container">
                  <input type="password"
                  class="login__info--input-password"
                  id="loginPassword"
                  name="PasswordLogin"
                  placeholder="Nhập mật khẩu của bạn"/>
                  <button class="showEyeLogin">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                  <button class="hideEyeLogin hide">
                    <i class="fa-solid fa-eye-slash"></i>
                  </button>
                </div>
                <p></p>
              </div>
              <div id="Pass_log--error" class="error-message"></div>
              <div class="forgot__password">
                <a href="#">Bạn quên mật khẩu?</a>
              </div>
              <button type="submit" class="login__info--submit">Đăng nhập</button>
              <button class="login__info--create__other mb10px">
                <svg
                  stroke="currentColor"
                  fill="currentColor"
                  stroke-width="0"
                  version="1.1"
                  x="0px"
                  y="0px"
                  viewBox="0 0 48 48"
                  enable-background="new 0 0 48 48"
                  class="h-5 w-5"
                  height="1em"
                  width="1em"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill="#FFC107"
                    d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                    c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                    c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"
                  ></path>
                  <path
                    fill="#FF3D00"
                    d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
                    C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"
                  ></path>
                  <path
                    fill="#4CAF50"
                    d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                    c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"
                  ></path>
                  <path
                    fill="#1976D2"
                    d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                    c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"
                  ></path>
                </svg>
                Đăng nhập với Google
              </button>
              
              <button class="login__info--create__other">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#0866ff" width="800px" height="800px" viewBox="0 0 24 24">
                  <path
                    d="M12 2.03998C6.5 2.03998 2 6.52998 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.84998C10.44 7.33998 11.93 5.95998 14.22 5.95998C15.31 5.95998 16.45 6.14998 16.45 6.14998V8.61998H15.19C13.95 8.61998 13.56 9.38998 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96C15.9164 21.5878 18.0622 20.3855 19.6099 18.57C21.1576 16.7546 22.0054 14.4456 22 12.06C22 6.52998 17.5 2.03998 12 2.03998Z"
                  />
                </svg>
                Đăng nhập với Facebook
              </button>
            </form>
            <div class="register__again" style="display: none">
              <p>Bạn chưa có tài khoản?</p>
              <button>Đăng ký</button>
            </div>
          </div>
  
          <div class="login__background">
            <h1>Rất vui khi được bạn biết đến!</h1>
            <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
            <button>Đăng ký</button>
          </div>
        </div>
      </div>
      <div class="hide__menu">
        <button class="hide__menu--close">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <h1>TREK</h1>
        <div class="hide__menu--list__extention">
          <div class="header__bottom--extention-item header__bottom--extention-user">
            <i class="fa-solid fa-user"></i>
            <span>Tài khoản</span>
            <i class="header__bottom--extention__icon header__bottom--extention__icon--right fa-solid fa-arrow-right"></i>
            <i class="header__bottom--extention__icon header__bottom--extention__icon--down fa-solid fa-caret-down"></i>
            <i class="header__bottom--extention__icon header__bottom--extention__icon--up fa-solid fa-caret-up"></i>
          </div>
          <div class="hide__menu--user__list">
            <div class="hide__menu--list__type adminManager__item" style="display: none"><button>Quản lý</button></div>
            <div class="hide__menu--list__type logout__item"><button>Đăng xuất</button></div>
          </div>
          <a href="/public/html/page/cart/cart.html" class="header__bottom--extention-item header__bottom--extention-cart">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Giỏ hàng</span>
            <i class="header__bottom--extention__icon fa-solid fa-arrow-right"></i>
          </a>
  
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
      <script>

const loginForm = document.getElementById('login-form');

loginForm.addEventListener('submit', (event) => {
    event.preventDefault();
    var isValid = true;
    const nameInput = document.getElementById('loginName');
    const passwordInput = document.getElementById('loginPassword');
    const nameError = document.getElementById('Name_log--error');
    const passwordError = document.getElementById('Pass_log--error');

    nameError.textContent = '';
    nameError.style.display = 'none';
    passwordError.textContent = '';
    passwordError.style.display = 'none';

    const username = nameInput.value.trim();
    const password = passwordInput.value.trim();

    if (username === '') {
        nameError.textContent = '*Chưa nhập tên đăng nhập!';
        nameError.style.display = 'block';
        isValid = false;;
    }

    if (password === '') {
        passwordError.textContent = '*Mật khẩu không được để trống!';
        passwordError.style.display = 'block';
        isValid = false;;
    }
    if (isValid) {
    let isLoggedIn = false;

    $.ajax({
  type: "POST",
  url: "index.php?controller=home&action=login",
  data: {
    Namelogin: username,
    PasswordLogin: password
  },
  dataType: "json",
  success: function(data) {
    if (data.success) {
      isLoggedIn = true;
      document.querySelector('.user__wrapper').style.display = 'none';
      swal("Đăng nhập thành công!", "Chuyển hướng đến trang chủ...", "success").then(function() {
        window.location.href = data.redirect;
      });
    } else {
      isLoggedIn = false;
      document.querySelector('.user__wrapper').style.display = 'none';
      swal("Đăng nhập thất bại", data.message, "error")
            .then((value) => {
                                // Xóa thông tin đăng nhập và chuyển hướng về trang chủ
                 window.location.href = "index.php?controller=home&action=index";
                });

    }
  },
  error: function(xhr, status, error) {
    console.error('Error:', error);
    
    // if(xhr.responseText) {
    //   swal("Oops!", xhr.responseText, "error");
    // } else {
    //   swal("Oops!", "Đã có lỗi xảy ra, vui lòng thử lại sau.", "error");
    // }
  }
});

    }
});
function isValidPhone(phone) {
    var phoneRegex = /^0[0-9]{9}$/;
    return phoneRegex.test(phone);
}
function isValidPassword(password) {
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return passwordRegex.test(password);
}

document.getElementById('register-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var isValid = true;
    var Name_reg = document.getElementById('registerName').value.trim();
    var Pass_reg = document.getElementById('registerPassword').value.trim();
    var Phone_reg = document.getElementById('registerPhone').value.trim();
    var Gender_reg = document.getElementById('registerGender').value.trim();
    var Address_reg = document.getElementById('registeraddress').value.trim();
    var nameError = document.getElementById('Name_reg--error');
    var passError = document.getElementById('Pass_reg--error');
    var phoneError = document.getElementById('Phone_reg--error');
    var genderError = document.getElementById('Gender_reg--error');
    var addressError = document.getElementById('Address_reg--error');

   
    nameError.textContent = '';
    nameError.style.display = 'none';
    passError.textContent = '';
    passError.style.display = 'none';
    phoneError.textContent = '';
    phoneError.style.display = 'none';
    genderError.textContent = '';
    genderError.style.display = 'none';
    addressError.textContent = '';
    addressError.style.display = 'none';

    if (Name_reg === '') {
        nameError.textContent = '*Chưa nhập tên của bạn!';
        nameError.style.display = 'block';
        isValid = false;
    }
    if (Pass_reg === '') {
        passError.textContent = '*Mật khẩu không được để trống!';
        passError.style.display = 'block';
        isValid = false;
    } else if (!isValidPassword(Pass_reg)) {
        passError.textContent = '*Mật khẩu phải gồm ít nhất 8 kí tự, bao gồm chữ cái viết thường, chữ cái viết hoa, số và một ký tự đặc biệt!';
        passError.style.display = 'block';
        isValid = false;
    }

    if (Phone_reg === '') {
        phoneError.textContent = '*Chưa nhập số điện thoại!';
        phoneError.style.display = 'block';
        isValid = false;
    } else if (!isValidPhone(Phone_reg)) {
        phoneError.textContent = '*Số điện thoại không hợp lệ!';
        phoneError.style.display = 'block';
        isValid = false;
    }
    if (Gender_reg === '') {
        genderError.textContent = '*Giới tính không được để trống!';
        genderError.style.display = 'block';
        isValid = false;
    }
    if (Address_reg === '') {
        addressError.textContent = '*Chưa nhập địa chỉ!';
        addressError.style.display = 'block';
        isValid = false;
    }

    if (isValid) {
        $.ajax({
            type: "POST",
            url: "index.php?controller=home&action=register",
            data: {
                registerName1: Name_reg,
                registerPassword1: Pass_reg,
                registerPhone1: Phone_reg,
                registerGender1: Gender_reg,
                registeraddress1: Address_reg
            },
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    document.querySelector('.user__wrapper').style.display = 'none';
                    swal("Good job!", "Đăng ký thành công! Hãy đăng nhập để tiếp tục", "success").then(function() {
                        window.location.reload();
                    });
                } else {
                    swal("Oops!", data.message, "error");
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                if(xhr.responseText) {
                    swal("Oops!", xhr.responseText, "error");
                } else {
                    swal("Oops!", "Đã có lỗi xảy ra, vui lòng thử lại sau.", "error");
                }
            }
        });
    }
});
document.getElementById('loginName').addEventListener('input', function() {
    var Name_logVal = this.value.trim();
    if (Name_logVal !== '') {
        document.getElementById('Name_log--error').style.display = 'none';
    } else {
        document.getElementById('Name_log--error').textContent = '*Tên đăng nhập không được để trống!';
        document.getElementById('Name_log--error').style.display = 'block';
    }
});
document.getElementById('loginPassword').addEventListener('input', function() {
    var Pass_regValue = this.value.trim();
    if (Pass_regValue !== '') {
        document.getElementById('Pass_log--error').style.display = 'none';
    } else {
        document.getElementById('Pass_log--error').textContent = '*Mật khẩu không được để trống!';
        document.getElementById('Pass_log--error').style.display = 'block';
    }
});
document.getElementById('registerName').addEventListener('input', function() {
    var Name_regVal = this.value.trim();
    if (Name_regVal !== '') {
        document.getElementById('Name_reg--error').style.display = 'none';
    } else {
        document.getElementById('Name_reg--error').textContent = '*Chưa nhập tên của bạn!';
        document.getElementById('Name_reg--error').style.display = 'block';
    }
});
document.getElementById('registerPassword').addEventListener('input', function() {
    var Pass_regValue = this.value.trim();
    if (Pass_regValue !== '') {
        document.getElementById('Pass_reg--error').style.display = 'none';
    } else {
        document.getElementById('Pass_reg--error').textContent = '*Mật khẩu không được để trống!';
        document.getElementById('Pass_reg--error').style.display = 'block';
    }
});
document.getElementById('registerPhone').addEventListener('input', function() {
    var Phone_regValue = this.value.trim();
    if (Phone_regValue !== '') {
        document.getElementById('Phone_reg--error').style.display = 'none';
    } else {
        document.getElementById('Phone_reg--error').textContent = '*Chưa nhập số điện thoại!';
        document.getElementById('Phone_reg--error').style.display = 'block';
    }
});
document.getElementById('registerGender').addEventListener('input', function() {
    var Gender_regValue = this.value.trim();
    if (Gender_regValue !== '') {
        document.getElementById('Gender_reg--error').style.display = 'none';
    } else {
        document.getElementById('Gender_reg--error').textContent = '*Chưa nhập số điện thoại!';
        document.getElementById('Gender_reg--error').style.display = 'block';
    }
});
document.getElementById('registeraddress').addEventListener('input', function() {
    var Address_regValue = this.value.trim();
    if (Address_regValue !== '') {
        document.getElementById('Address_reg--error').style.display = 'none';
    } else {
        document.getElementById('Address_reg--error').textContent = '*Chưa nhập địa chỉ!';
        document.getElementById('Address_reg--error').style.display = 'block';
    }
});

// =========================== start: IF LOGGEDIN ===========================
const userBtn = document.querySelector('.header__bottom--extention-user');
const userList = document.querySelector('.header__bottom--user__list');
// Sử dụng AJAX để kiểm tra trạng thái đăng nhập
$.ajax({
    type: "POST",
    url: "index.php?controller=home&action=checkLoginStatus",
    dataType: "json",
    success: function(data) {
        if (data.loggedIn) {
          document.querySelector('.user__wrapper').style.display = 'none';
          var userType = data.user_type;
          console.log('userType:', userType);
           // Hiển thị tùy chọn dựa trên loại tài khoản
            if (userType === 'staff') {
                // Hiển thị "Quản lý" và "Đăng xuất"
                userList.innerHTML = `
                    <li class="adminManager__item">
                    <a href="index.php?controller=sanpham&action=index"> <button class="adminManager">
                            <i class="fa-solid fa-hammer"></i>
                            <p>Quản lý</p>
                        </button></a>
                    </li>
                    <li>
                        <button class="logout">
                            <i class="fa-solid fa-door-open"></i>
                            <p>Đăng xuất</p>
                        </button>
                    </li>
                    `;
            } else {
                // Chỉ hiển thị "Đăng xuất"
                userList.innerHTML = `
                    <li>
                        <button class="logout">
                            <i class="fa-solid fa-door-open"></i>
                            <p>Đăng xuất</p>
                        </button>
                    </li>
                `;
            }


            // Thêm sự kiện click vào biểu tượng người dùng
            userBtn.addEventListener('click', () => {
                userList.style.display = userList.style.display === 'block' ? 'none' : 'block';
            });

            // Xử lý sự kiện đăng xuất
            const logoutBtn = document.querySelector('.logout');
            logoutBtn.addEventListener('click', () => {
                $.ajax({
                    type: "POST",
                    url: "index.php?controller=home&action=logout",
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            // Hiển thị thông báo đăng xuất thành công
                            swal("Thành công!", "Bạn đã đăng xuất thành công.", "success")
                            .then((value) => {
                                // Xóa thông tin đăng nhập và chuyển hướng về trang chủ
                                window.location.href = "index.php?controller=home&action=index";
                            });
                        } else {
                            swal("Oops!", data.message, "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        swal("Oops!", "Đã có lỗi xảy ra, vui lòng thử lại sau.", "error");
                    }
                });
            });
          }
        // } else {
        //     // Hiển thị form đăng nhập/đăng ký
        //     document.querySelector('.user__wrapper').style.display = 'flex';
        // }
    },
    error: function(xhr, status, error) {
        console.error('Error:', error);
        swal("Oops!", "Đã có lỗi xảy ra, vui lòng thử lại sau.", "error");
    }
});
// =========================== end: IF LOGGEDIN ===========================


//// ============================click: Cart =============================
var isLoggedIn = <?php echo $loggedIn ? 'true' : 'false'; ?>;
var userType = '<?php echo $userType; ?>';

if (isLoggedIn) {
  // Ẩn phần tử khi đã đăng nhập
  document.querySelector('.section--4-container').style.display = 'none';
} else {
  // Hiển thị phần tử khi chưa đăng nhập hoặc đã đăng xuất
  document.querySelector('.section--4-container').style.display = 'block';
}
const cartLink = document.querySelector('a[href="index.php?controller=cart&action=index"]');

cartLink.addEventListener('click', (event) => {
  if (isLoggedIn) {
    
    return true;
  } else {
    // Nếu chưa đăng nhập, hiển thị thông báo và ngăn không cho chuyển hướng
    swal("Thông báo", "Vui lòng đăng nhập để truy cập vào giỏ hàng.", "warning");
    event.preventDefault(); // Ngăn không cho chuyển hướng
  }
});

      </script>
    </body>
  </html>