<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trek Bikes - Cuộc sống sẽ tốt hơn khi có xe đạp</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script href="/Web2/public/components/login/login.js"></script> 
  </head>
  <body>
    <!-- =========== START: HEADER =========== -->
    <div>
    </div>
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
            <?php
            if (isset($_SESSION['user_id'])) {
                ?>
                <div class="header__bottom--extention-item header__bottom--extention-user">
                    <div class="user-box"></div>
                    <ul class="header__bottom--user__list">
                        <li class="adminManager__item">
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
            <?php } else { ?>
                <div class="header__bottom--extention-item header__bottom--extention-user">
                    <i class="fa-solid fa-user"></i>
                </div>
            <?php } ?>
        </div>

        <script>
            var isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
            if (isLoggedIn) {
                var userName = "<?php echo isset($_SESSION['register_Name']) ? $_SESSION['register_Name'] : ''; ?>";
            }
        </script>
  
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
      <div class="header__slider">
        <video src="/public/database/images/sliderVideos/RBHFFG Marquee Summer 2021.mp4" muted></video>
        <video src="/public/database/images/sliderVideos/NF24 US Video Marquee_1080p.mp4" muted></video>
        <video src="/public/database/images/sliderVideos/Fuel EX_ Ace of All Trails.mp4" muted></video>
        

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

          <div class="image"><img src="/public/database/images/productImgs/mountain-3.jpg" alt=""></div>
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

          <div class="image"><img src="/public/database/images/productImgs/road.webp" alt=""></div>
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

          <div class="image"><img src="/public/database/images/productImgs/touring.webp" alt=""></div>
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

          <div class="image"><img src="/public/database/images/productImgs/kid.webp" alt=""></div>
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
        <?php
            if (!isset($_SESSION['user_id'])) {
                ?>
        <button>ĐĂNG KÝ MUA NGAY HÔM NAY!</button>
              <?php
            }
            ?>
            
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
  
            <form method="post" action="">
              <div class="register__info--input register__info--input__full-name">
                <label for="registerName">Tên đầy đủ</label>
                <input type="text" name="" id="registerName" class="register__info--input-name" placeholder="Nhập tên của bạn" />
                <p></p>
              </div>
              
              <div class="register__info--input register__info--input__full-email">
                <label for="registerEmail">Địa chỉ email</label>
                <input type="email"
                class="register__info--input-email"
                id="registerEmail"
                placeholder="Nhập email của bạn"
                />
                <p></p>
              </div>
  
              <div class="register__info--input register__info--input__full-password">
                 <label for="registerPassword">Mật khẩu</label>
                 <div class="password__container">
                  <input type="password"
                  class="register__info--input-password"
                  id="registerPassword"
                  placeholder="Nhập mật khẩu của bạn"/>
                  <button class="showEyeRegister">
                     <i class="fa-solid fa-eye"></i>
                  </button>
  
                  <button class="hideEyeRegister hide">
                    <i class="fa-solid fa-eye-slash"></i>
                  </button>
                 </div>
                 <p></p>
              </div>
  
              <p class="policy">
                Bằng việc đã đăng ký, bạn đã đồng ý với <b>Trek</b> về 
                <a href="">Điều khoản dịch vụ</a> và 
                <a href="">Chính sách bảo mật</a>
              </p>
  
              <input type="submit" class="register__info--submit" value="Đăng ký" />
            </form>
  
            <div id="showerror"></div>
          <script>
              function isValidEmail(email) {
                  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                  return emailPattern.test(email);
                }       

              $('form').submit(function(event) {
                  event.preventDefault();
                  
                  $('#showerror').html('');
                  
                  var registerName = $('#registerName').val();
                  var registerEmail = $('#registerEmail').val();
                  var registerPassword = $('#registerPassword').val();

                  if ($.trim(registerName) === '') {
                      alert('Bạn chưa nhập họ và tên');
                      return false;
                  }

                  if ($.trim(registerEmail) === '') {
                      alert('Bạn chưa nhập email');
                      return false;
                  }

                  if (!isValidEmail(registerEmail)) {
                      alert('Địa chỉ email không hợp lệ');
                      return false;
                  }

                  if ($.trim(registerPassword) === '') {
                      alert('Bạn chưa nhập mật khẩu');
                      return false;
                  }

                  $.ajax({
                      url: 'index.php?controller=dkdn&action=register',
                      type: 'post',
                      dataType: 'json',
                      data: {
                          registerName: registerName,
                          registerEmail: registerEmail,
                          registerPassword: registerPassword
                      },
                      success: function(result) {
                          if (result.hasOwnProperty('error')) {
                            $('#showerror').html(result.error);
                          } else if (result.hasOwnProperty('success')) {
                              $('#showerror').html('Đăng ký thành công, bây giờ bạn có thể đăng nhập tài khoản để bắt đầu chuyến hành trình!');
                          }
                      },
                      error: function(xhr, status, error) {
                          alert('AJAX request failed: ' + error);
                      }
                  });

                  return false;
              });
          </script>  
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
  
            <form method="post" action="">
              <div class="login__info--input login__info--input__full-email">
                <label for="loginEmail">Địa chỉ email</label>
                <input type="email" class="login__info--input-email" id="loginEmail" placeholder="Nhập email của bạn" />
                <p></p>
              </div>
  
              <div class="login__info--input login__info--input__full-password">
                <label for="loginPassword">Mật khẩu</label>
  
                <div class="password__container">
                  <input type="password"
                  class="login__info--input-password"
                  id="loginPassword"
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
  
              <div class="forgot__password">
                <a href="#">Bạn quên mật khẩu?</a>
              </div>
  
              <input type="submit" class="login__info--submit" value="Đăng nhập" />
  
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
            <script>
          $(document).ready(function() {
              $('#loginForm').submit(function(event) {
                  event.preventDefault();

                  $('#loginError').text('');

                  var loginEmail = $('#loginEmail').val();
                  var loginPassword = $('#loginPassword').val();

                  $.ajax({
                      url: 'index.php?controller=dkdn&action=login',
                      type: 'post',
                      dataType: 'json',
                      data: {
                          loginEmail: loginEmail,
                          loginPassword: loginPassword
                      },
                      success: function(result) {
                          if (result.hasOwnProperty('error')) {
                              $('#loginError').text(result.error); 
                          } //else if (result.hasOwnProperty('success')) {
                          //    window.location.href = 'dashboard.php';
                          //}
                      },
                      error: function(xhr, status, error) {
                          alert('AJAX request failed: ' + error);
                      }
                  });
              });
          });
      </script>  

            <div class="register__again" style="display: none">
              <p>Bạn chưa có tài khoản?</p>
              <button>Đăng ký</button>
            </div>
          </div>
  
          <div class="login__background">
            <h1>Chào, bạn!</h1>
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
    </body>
  </html>