<!-- <!DOCTYPE html>
<html lang="en">
  <head> -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product</title>
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css" />
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/fonts.css" />
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/style.css" />
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/menu/menu.css" />
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/login/login.css" />
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/popup/popUp.css" />
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/pageInfoProduct.css" />
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/search.css">
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/responsive/responsive.css" />
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/product/product.css" />
    <script type="module" defer src="/DoAnWeb/Web2/public/script.js"></script>
    <script type="module" defer src="/DoAnWeb/Web2/public/components/login/login.js"></script>
    <script type="module" defer src="/DoAnWeb/Web2/public/components/menu/menu.js"></script>
    <script type="module" defer src="/DoAnWeb/Web2/public/components/slider/slider.js"></script>
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
    
              <a href="index.php?controller=cart">
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
                        <input type="number" id="giatu" style="padding-left:5px;" placeholder="VNĐ" >
                        <h3>Đến</h3>
                        <input type="number" id="giaden" style="padding-left:5px;" placeholder="VNĐ"> <br>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
          

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
          $(document).on("click","#btnSubmit", function(){
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
          $(document).on("keyup","#giatu",function(){
            price_to = parseInt($(this).val())
            if(!isNaN(price_to)){
              fetch_data2(search,price_to,price_form,select_type);
            }else{
              price_to = 0;
              fetch_data2(search,price_to,price_form,select_type);
            }
          })
          
          $(document).on("keyup","#giaden",function(){
            price_form = parseInt($(this).val());
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
                  id:document.getElementById('addtocart').value
                }, // Gửi dữ liệu từ bảng HTML
                success: function(response){
                  alert("Thêm thành công");
                  $('#sohangtronggio').html(response); // Hiển thị kết quả từ tệp PHP
                  document.getElementById("product-detail_model").style.display = "none";
                }
            });
          });
        
        
        </script>
    
</body>
</html>