<?php
  // session_start();
  ob_start();

  // kiểm tra trạng thái đăng nhập
  if (isset($_SESSION['username'])) {
    
    $loggedIn = true;

    // kiểm tra loại tài khoản
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'staff') {
      $userType = 'staff';
    } else {
      $userType = 'customer';
    }
  } else {
    // người dùng chưa đăng nhập
    $loggedIn = false;
    $userType = null;
  }
?>
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
    <!-- <link rel="stylesheet" href="//Web2/public/html/page/cart/reponsive.css"> -->
    <title>Giỏ Hàng</title>
</head>
<body>
<header>
        <div class="header__container">
          <div class="header__top">
            <div class="header__top-item--left">
              <div class="header__top-item user-welcome active">
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
                  <a href="index.php?controller=product&action=index&type=all">ALL</a>
                </li>
                <li>
                  <a href="index.php?controller=product&action=index&type=mt">MOUNTAIN</a>
                </li>
                <li>
                  <a href="index.php?controller=product&action=index&type=rd">ROAD</a>
                </li>
                <li>
                  <a href="index.php?controller=product&action=index&type=tr">TOURING</a>
                </li>
                <li>
                  <a href="index.php?controller=product&action=index&type=kid">KIDS</a>
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
                <th id="cart"><a href="index.php?controller=cart&action=index">Giỏ hàng</a></th>
                <th id="dangchoxuly" >Đang chờ xử lý</th> 
                <th id="dalienlac" >Đã liên lạc</th>
                <th id="dagiao" >Đã giao</th>
              </tr>
            </thead>
          </table>
        </div>
  
        <div class="cart-info_container">
        <form action="index.php?controller=cart&action=update" method="post">
          <table class="menu" id="menu">
            <thead>
              <tr>
                <th><input type="checkbox" id="checkall"></th>
                <th>Hình ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Đơn giá</th>
                <th>Số Lượng</th>
                <th>Thành tiền</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
  
            <tbody class="cart-info" id="cart-info">
                <?php
                    foreach($products as $product){
                ?>
               <tr>
                <td><input type="checkbox" class="checkbox"  value="<?php echo $product['MaHang'] ?>"></td>
                <td><img src="data:image/jpeg;base64,<?php echo base64_encode($product['Hinhanh'])?>"></td>            
                <td><?php echo $product['TenHang'] ?></td>
                <td><?php echo number_format($product['DonGia']) ?></td>
                <td>
                    <input type="text" name="qty[<?php echo $product['MaHang'] ?>]" value="<?php echo $product['qty'] ?>">
                </td>
                <td id="thanhtien"><?php echo number_format($product['DonGia']*$product['qty']) ?></td>
                <td><a href="index.php?controller=cart&action=delete&id=<?php echo $product['MaHang'] ?>">Xóa</a></td>
                
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
            <p align="left">  
                <button><a href="index.php?controller=cart&action=destroy">Xóa tất cả</a></button>
                <button>Cập nhật</button>
            </p>
          </form>

        </div>
      </div>
      <footer id="footer">

        <!-- <div class="voucher">
          <h3>Voucher</h3>
          <select id='selectvoucher'>
            <option value='none'>Chọn Voucher</option>
          </select>
          
        </div> -->

        <div class="totalPrice" id="totalPriceContainer">
          <h3>Thanh toán</h3>
          <span id="totalPriceId">0 VND</span>
        </div>
        <div class="footerButton">
          <button id="selectAllButton" onclick="activateCheckbox()">Chọn tất cả</button>
          
          <button id="buy">Mua</button>
          <!-- <button id="delete">Xóa</button> -->
        </div>
      </footer>

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
            <!-- <div class="hide__menu--list__type"><a href="/public/html/page/product/product.php">ALL</a></div>
            <div class="hide__menu--list__type"><a href="/public/html/page/product/product.php">MOUNTAIN</a></div>
            <div class="hide__menu--list__type"><a href="/public/html/page/product/product.php">ROAD</a></div>
            <div class="hide__menu--list__type"><a href="/public/html/page/product/product.php">TOURING</a></div>
            <div class="hide__menu--list__type"><a href="/public/html/page/product/product.php">KIDS</a></div> -->
          </div>
        </div>
      </div>
      <!-- <script type="module" src="/public/database/products.js"></script>
      <script type="module" src="/public/components/menu/menu.js"></script> -->
      <script src="\DoAnWeb\Web2\app\views\admin\cart.js"></script>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
      // Khi trạng thái của checkbox thay đổi
      $('#buy').click(function(){
        console.log("OK")
          // Gửi dữ liệu đến tệp PHP bằng Ajax
          if(getProductList().length===0){
            alert('Bạn chưa chọn sản phẩm muốn mua!');
            return;
          }
          $.ajax({
              url: 'index.php?controller=cart&action=insert',
              type: 'post',
              data:{
                products: getProductList(),
                tongtien:parseFloat(document.getElementById('totalPriceId').textContent.replace(/[^\d.-]/g, ''))
              }, // Gửi dữ liệu từ bảng HTML
              success: function(response){
                alert('Đặt hàng thành công');
                window.location.reload();
              }
          });
      });
    
      $('#dangchoxuly').click(function(){
          // Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=cart&action=showTinhTrang',
              type: 'post',
              data:{
                condition:'dangchoxuly'
              }, // Gửi dữ liệu từ bảng HTML
              success: function(response){
                $('.cart-info_container').html(response);
                document.getElementById("footer").style.display = "none";
              }
          });
      });

      $('#dalienlac').click(function(){
          // Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=cart&action=showTinhTrang',
              type: 'post',
              data:{
                condition:'dalienlac'
              }, // Gửi dữ liệu từ bảng HTML
              success: function(response){
                $('.cart-info_container').html(response);
                document.getElementById("footer").style.display = "none";
              }
          });
      });

      $('#dagiao').click(function(){
          // Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=cart&action=showTinhTrang',
              type: 'post',
              data:{
                condition:'dagiao'
              }, // Gửi dữ liệu từ bảng HTML
              success: function(response){
                $('.cart-info_container').html(response);
                document.getElementById("footer").style.display = "none";
              }
          });
      });

      $(document).on('click', '.xoadonhang',function(){  
        var value = $(this).data('value');
        //Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=cart&action=xoa',
              type: 'post',
              data:{
                donhangcanxoa:value.split("#")
              },
              success: function(response){
                alert("Xóa thành công");
                $('.cart-info_container').html(response);
              }
          });
      });

      $(document).on('click', '.suadonhang',function(){  
        var value1 = $(this).data('value');
        //Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=cart&action=sua',
              type: 'post',
              data:{
                donhangcansua:value1.split("#"),
                soluong:parseInt(document.getElementById(value1).value)
              },
              success: function(response){
                alert("Sửa thành công");
                $('.cart-info_container').html(response);
              }
          });
      });

      $(document).on('click', '#deleteall',function(){  
        //Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=cart&action=xoahoadon',
              type: 'post',
              data:{},
              success: function(response){
                $('.cart-info_container').html(response);
              }
          });
      });

      
  });

</script>

</html>