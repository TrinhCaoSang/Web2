<?php
  // session_start();
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


<!-- <!DOCTYPE html>
<html lang="en">
  <head> -->
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
    <!-- <script type="module" defer src="/WEB2/public/components/login/login.js"></script>  -->
    <!-- <script type="module" defer src="/Web2/public/script.js"></script> -->
    <!-- <script type="module" defer src="/Web2/public/components/slider/slider.js"></script> -->
  
  <!-- </head> -->
  <body style="margin: 0 auto;">
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
              <a href="index.php?controller=home">TREK</a>
            </div>
            <div class="header__search--extension">
              <form>
                <div class="input_search">
                  <input type="search" autocomplete="off" id="content_search-basic">
                  <button type="button" id="btnSubmit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </div>
                <div id="container_search">
                </div>
              </form>
            </div>
    
            <div class="header__bottom--extention">
              <div class="header__bottom--extention-item header__bottom--extention-user">
                <i class="fa-solid fa-user"></i>
                <ul class="header__bottom--user__list">
                  <!-- <li class="adminManager__item" style="display: none">
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
              
              <a href="index.php?controller=cart&action=index" id="giohang">
                <div class="header__bottom--extention-item header__bottom--extention-cart">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <div id="sohangtronggio">
                    <p ><?php
                      if (!isset($_SESSION['order_count'])) {
                        echo 0;
                      }
                      else{
                        echo $_SESSION['order_count'];
                      }
                    
                    ?></p>
                  </div>
                </div>
              </a>
              

              <?php
                if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'staff'){
                  echo '<script>document.getElementById("giohang").style.display = "none";</script>';
                }else{
                  echo '';
                }
              ?>
              
            </div>
    
            <div class="header__bottom--hide-menu">
              <i class="fa-solid fa-bars"></i>
            </div>
          </div>
        </div>
        </div><div class="container">
        <div class="leftmenu">
            <!-- <form>
                <h2>Lọc đơn giản</h2>
                <div id="locdongian">
                    <h3>Nhập khoảng giá</h3>
                    <input type="text" id="giatu">
                    <h3>đến</h3>
                    <input type="text" id="giaden"> <br>
                    <input type="submit" id="chon" value="Chọn">
                </div>
            </form> -->
            <br>
            <form id="container-loc" style="margin-top:-25px;">
                <h2>Lọc nâng cao</h2>
                <div id="locnangcao">
                    <div id="container-search_name">
                      <h3>Tên sản phẩm</h3>
                      <input type="text" id="search_name" placeholder="Nhập tên sản phẩm">
                    </div >
                    <div style="margin-top:10px;">
                        <h3>Giá từ</h3>
                        <input type="text" id="giatu" style="padding-left:5px;" placeholder="VNĐ" >
                        <h3>Đến</h3>
                        <input type="text" id="giaden" style="padding-left:5px;" placeholder="VNĐ"> <br>
                    </div>
                    <h3  style="margin-top:10px;">Thể loại</h3>
                    <div id="all">
                      <input class="type" type="radio" name="loaixe" value="all" checked><h3>Tất cả</h3> <br>
                    </div>
                    <div id="mountain">
                      <input class="type" type="radio" name="loaixe" value="mt"><h3>Mountain</h3> <br>
                    </div>
                    <div id="road">
                      <input class="type" type="radio" name="loaixe" value="rd"><h3>Road</h3><br>
                    </div>
                    <div id="kids">
                      <input class="type" type="radio" name="loaixe" value="kid"><h3>Kids</h3><br>
                    </div>
                    <div id="touring">
                      <input class="type" type="radio" name="loaixe" value="tr"><h3>Touring</h3><br>
                    </div>
                </div>
            </form>
        </div>
        <div id="container_content">
        </div>


        
        <div id="product-detail_model">
        <!-- <div class="overlay-container">
          <div class="overlay-container-top">
              <div class="overlay-container-title">
                  <div class="overlay-prev" id="close-toggler">
                      <i class="fa-solid fa-arrow-left-long"></i>
                      Trở về
                  </div>
              </div>
              <div class="overlay-container-btn">
                  
                  <a href="../cart/cart.html">

                      <i class="fa-solid fa-cart-shopping"></i>
                  </a>
              </div>
          </div>
          <div class="overlay-body">
              <div class="overlay-body-left">
                  <img src="" alt="" class="#overlay-img" id="imgdetail">
              </div>

              <div class="overlay-body-right">
                  <h1 class="name" id="name"></h1>
                  <p>
                      This is the best selling series is impressive on rapid urban commutes or taking a detour on a
                      rural
                      lane:
                      the powerful Upstreets5's wide range of available configurations enable riders to create their
                      their
                      own Trek bike adventures
                  </p>
                  <span id="overlay-price">Price:</span>
                  <div class="quantityBtn">
                      <h3>Số lượng</h3>
                      <button id="decrement">-</button>
                      <label id="quantity">1</label>
                      <button id="increment">+</button>
                  </div>
                  <div class="overlay-right-btn">
                      <button id="overlay-add-cart">
                          <i class="fa-solid fa-cart-plus"></i>
                          <p>
                              Thêm vào giỏ hàng
                          </p>
                      </button>
                  </div>
              </div>
          </div> 
      </div>-->
</div>
        </div>
        <div id="check"></div>
<!-- login -->
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
          
          function number_format(number) {
              return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          }
          function show_search(content) {
            $.ajax({
              url : "index.php?controller=product&action=search",
              method: "POST",
              data: {
                content: content
              },
              success: function(data){
                $("#container_search").html(data);
                // document.getElementById("product-detail_model").style.display = "flex";
              },
              error: function(xhr,status,error){
                console.error("Error: " , error);
              }
            });
          }
          $(document).on("keyup","#content_search-basic",function(){
            var content = $(this).val();
            if(content === '') return $("#container_search").html('');
            show_search(content);
          })
          $(document).on("keypress","#content_search-basic",function(event){
            if (event.which === 13) {
              event.preventDefault();
                var content = $(this).val(); // Lấy nội dung của phần tử
                fetch_data(1, content); // Gọi hàm fetch_data với nội dung đã lấy
                
            }
          })
          $(document).on("click","#content_search-basic", function(){
            var content = $("#content_search-basic").val();
            fetch_data(1,content);
          })

          function show_detail(product) {
            $.ajax({
              url : "index.php?controller=product&action=detail",
              method: "POST",
              data: {
                product: product
              },
              success: function(data){
                $("#product-detail_model").html(data);
                document.getElementById("product-detail_model").style.display = "flex";
              },
              error: function(xhr,status,error){
                console.error("Error: " , error);
              }
            });
          }
          $(document).on("click",".div_search", function(){
            var product = $(this).attr("id");
            show_detail(product);
          })
          $(document).on("click",".divproduct", function(){
            var product = $(this).attr("id");
            show_detail(product);
          })
          var select_type='';
          var search ='';
          var price_to = 0;
          var price_form = Number.MAX_SAFE_INTEGER;
          $(document).on("keyup","#search_name",function(){
            search = $(this).val();
            fetch_data2(search,price_to,price_form,select_type);
          })
          $(document).on("input","#giatu",function(){
            price_to = $(this).val().replace(/,/g, '');
            // price_to = parseInt($(this).val());
            if(price_to =="") {
              price_to = 0;
            }else{
              $(this).val(number_format(parseInt(price_to)));
            }
            if(!isNaN(price_to)){
              fetch_data2(search,price_to,price_form,select_type);
            }else{
              price_to = 0;
              fetch_data2(search,price_to,price_form,select_type);
            }
          })
          
          $(document).on("keyup","#giaden",function(){
            price_form = $(this).val().replace(/,/g, '');
            if(price_form ==""){
            price_form = Number.MAX_SAFE_INTEGER;
            }else{
              $(this).val(number_format(parseInt(price_form)));
            }  
            if(!isNaN(price_form) && price_form >= price_to){
              fetch_data2(search,price_to,price_form,select_type);
            }else{
              price_form = Number.MAX_SAFE_INTEGER;
              fetch_data2(search,price_to,price_form,select_type);
            }
          })

          $(document).on("change",".type",function(){
            select_type = $(this).val();
            fetch_data2(search,price_to,price_form,select_type);
          })

          function fetch_data2(product,price_to,price_form,typecb,page) {
            $.ajax({
              url : "index.php?controller=product&action=page",
              method: "POST",
              data: {
                product: product,
                price_to : price_to,
                price_form: price_form,
                typecb: typecb,
                page: page,
              },
              success: function(data){
                $("#container_content").html(data);
              },
              error: function(xhr,status,error){
                console.error("Error: " , error);
              }
            });
          }

          function fetch_data(page,content,product,price,typecb) {
            var type = "<?php echo $_GET['type']; ?>";
            $.ajax({
              url : "index.php?controller=product&action=page",
              method: "POST",
              data: {
                page: page,
                type: type,
                content: content,
                product: product,
                price: price,
                typecb: typecb,
              },
              success: function(data){
                $("#container_content").html(data);
              },
              error: function(xhr,status,error){
                console.error("Error: " , error);
              }
            });
          }
          fetch_data();
          
          $(document).on("click",".page-item", function(){
            var page = $(this).attr("id");
            fetch_data2(search,price_to,price_form,select_type,page);
            // fetch_data(page);
            window.scrollTo({
              top: 0,
              behavior: "smooth"
            });
          })

          $(document).on("click","#close-toggler", function(){
            document.getElementById("product-detail_model").style.display = "none";
          })

          function quantitydown() {
            if(document.getElementById('quantity').value > 1)
            {
                document.getElementById('quantity').value--;
            }
          }

          function quantityup() {
                  document.getElementById('quantity').value++;
          }

          $(document).on('click', '#addtocart',function(){
            console.log(document.getElementById('quantity').value);
            // Gửi dữ liệu đến tệp PHP bằng Ajax
            $.ajax({
                url: 'index.php?controller=cart&action=store',
                type: 'post',
                data:{
                  soluong: document.getElementById('quantity').value,
                  id:document.getElementById('addtocart').value.split("#")
                }, // Gửi dữ liệu từ bảng HTML
                success: function(response){
                  
                  $('#sohangtronggio').html(response); // Hiển thị kết quả từ tệp PHP
                  document.getElementById("product-detail_model").style.display = "none";
                }
            });
          });
///////////////////////////////////////////////////////////////////
// ============================= Start: SHOW FORM REG/LOG
const userBtn = document.querySelector('.header__bottom--extention-user');
const overlay = document.querySelector('.overlay');
const userWrapper = document.querySelector('.user__wrapper');



const closeFormBtn = document.querySelector('.form__close--global');

closeFormBtn.addEventListener('click', () => {
    userWrapper.classList.remove('user__active');
    userWrapper.classList.remove('register__active');
    userWrapper.classList.remove('login__active');
});
const openFormRegister = () => {
  console.log("open");
    userWrapper.classList.add('user__active');
    userWrapper.classList.add('register__active');
    // overlay.classList.add('active__overlay');
  
};
userBtn.addEventListener('click', e => {
  // checkLoggedIn();
  openFormRegister();
});

//Change to login
const signinBtn = document.querySelector('.register__background button');

signinBtn.addEventListener('click', e => {
  userWrapper.classList.add('login__active');
  userWrapper.classList.remove('register__active');
});

//Change to login when on low device
const signinBtnOnLowDevice = document.querySelector('.signin button');
const registerAgainOnLowDevice = document.querySelector('.register__again button');

signinBtnOnLowDevice.addEventListener('click', e => {
  userWrapper.classList.add('login__active');
  userWrapper.classList.remove('register__active');
});

registerAgainOnLowDevice.addEventListener('click', e => {
  userWrapper.classList.remove('login__active');
  userWrapper.classList.add('register__active');
});

//Change to register when show login form
const registerAgain = document.querySelector('.login__background button');
registerAgain.addEventListener('click', e => {
  userWrapper.classList.add('register__active');
  userWrapper.classList.remove('login__active');
});


// ========================== Show / Hide: Password ============================
// Đối với form đăng nhập
var loginShowEyeBtn = document.querySelector('.showEyeLogin');
var loginHideEyeBtn = document.querySelector('.hideEyeLogin');
var loginPasswordInput = document.querySelector('#loginPassword'); // thay đổi #loginPassword thành id thật của trường mật khẩu cho form đăng nhập của bạn

loginShowEyeBtn.addEventListener('click', function(e) {
    e.preventDefault(); 
    loginPasswordInput.type = 'text';
    loginShowEyeBtn.style.display = 'none';
    loginHideEyeBtn.style.display = 'block';
});

loginHideEyeBtn.addEventListener('click', function(e) {
    e.preventDefault(); 
    loginPasswordInput.type = 'password';
    loginHideEyeBtn.style.display = 'none';
    loginShowEyeBtn.style.display = 'block';
});

// Đối với form đăng ký
var registerShowEyeBtn = document.querySelector('.showEyeRegister');
var registerHideEyeBtn = document.querySelector('.hideEyeRegister');
var registerPasswordInput = document.querySelector('#registerPassword'); // thay đổi #registerPassword thành id thật của trường mật khẩu cho form đăng ký của bạn

registerShowEyeBtn.addEventListener('click', function(e) {
    e.preventDefault(); 
    registerPasswordInput.type = 'text';
    registerShowEyeBtn.style.display = 'none';
    registerHideEyeBtn.style.display = 'block';
});

registerHideEyeBtn.addEventListener('click', function(e) {
    e.preventDefault(); 
    registerPasswordInput.type = 'password';
    registerHideEyeBtn.style.display = 'none';
    registerShowEyeBtn.style.display = 'block';
});

///////////////////////////////////////////////////////////////





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
      swal("Đăng nhập thành công!", "Bắt đầu cuộc hành trình thôi nào!", "success").then(function() {
        window.location.href = "index.php?controller=product&action=index&type=all";
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
                    swal("Good job!", "Tạo tài khoản thành công", "success").then(function() {
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
const userList = document.querySelector('.header__bottom--user__list');
// // Sử dụng AJAX để kiểm tra trạng thái đăng nhập
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
// // =========================== end: IF LOGGEDIN ===========================


// //// ============================click: Cart =============================

var isLoggedIn = <?php echo $loggedIn ? 'true' : 'false'; ?>;
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