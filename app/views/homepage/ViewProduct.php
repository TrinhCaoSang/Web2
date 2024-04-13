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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
  
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
          $(document).on("click",".divproduct", function(){
            var product = $(this).attr("id");
            show_detail(product);
          })
          function fetch_data(page) {
            $.ajax({
              url : "index.php?controller=product&action=page",
              method: "POST",
              data: {
                page: page
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
            fetch_data(page);
            window.scrollTo({
              top: 0,
              behavior: "smooth"
            });
          })
          // $(document).on("click","#img-product", function(){
          //   document.getElementById("product-detail_model").style.display = "flex";
          // })
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
        
        
        </script>
    
</body>
</html>