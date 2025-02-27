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
    <script src="/Web2/app/views/admin/Interface(JS)/cart.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
              <a href="index.php?controller=home&action=index">TREK</a>
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
                <th id="cart">Giỏ hàng</th>
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
            <p>  
                <button id="btn_erase"><a href="index.php?controller=cart&action=destroy">Xóa tất cả</a></button>
                <button id="btn_update">Cập nhật</button>
            </p>
          </form>

        </div>
      </div>
      <footer id="footer">
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
            
          </div>
        </div>
      </div>
  
</body>


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
          var a = document.getElementById("dangchoxuly");
          a.style.backgroundColor = "#45a049";
          var b = document.getElementById("dalienlac");
          b.style.backgroundColor = "#504c8b";
          var c = document.getElementById("dagiao");
          c.style.backgroundColor = "#504c8b";
          var d = document.getElementById("cart");
          d.style.backgroundColor = "#504c8b";

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
        var a = document.getElementById("dangchoxuly");
        a.style.backgroundColor = "#504c8b";
        var b = document.getElementById("dalienlac");
        b.style.backgroundColor = "#45a049";
        var c = document.getElementById("dagiao");
        c.style.backgroundColor = "#504c8b";
        var d = document.getElementById("cart");
        d.style.backgroundColor = "#504c8b";

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
        var a = document.getElementById("dangchoxuly");
        a.style.backgroundColor = "#504c8b";
        var b = document.getElementById("dalienlac");
        b.style.backgroundColor = "#504c8b";
        var c = document.getElementById("dagiao");
        c.style.backgroundColor = "#45a049";
        var d = document.getElementById("cart");
        d.style.backgroundColor = "#504c8b";
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

      $(document).on('click', '#cart',function(){
        var a = document.getElementById("dangchoxuly");
        a.style.backgroundColor = "#504c8b";
        var b = document.getElementById("dalienlac");
        b.style.backgroundColor = "#504c8b";
        var c = document.getElementById("dagiao");
        c.style.backgroundColor = "#504c8b";
        var d = document.getElementById("cart");
        d.style.backgroundColor = "#45a049";  
        window.location.href = "index.php?controller=cart&action=index";
      });

      
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
          // document.querySelector('.user__wrapper').style.display = 'none';
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
    },
    error: function(xhr, status, error) {
        console.error('Error:', error);
        swal("Oops!", "Đã có lỗi xảy ra, vui lòng thử lại sau.", "error");
    }
});
// =========================== end: IF LOGGEDIN ===========================


</script>

</html>