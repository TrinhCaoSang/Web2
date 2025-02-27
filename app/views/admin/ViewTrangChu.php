<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trek - Quản lý cửa hàng</title>
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/Web2/public/style.css">

    <link rel="stylesheet" href="/Web2/public/components/HomeAdmin/HomeAdmin.css">
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/AdminProduct.css">
    <link rel="stylesheet" href="/Web2/public/components/ManageUserList/ManageUserList.css" />
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/adminProduct.css" />
    <script src="/Web2/app/views/admin/Interface(JS)/admin.js"></script>
</head>

<body>
  <div class="container">
  <div class="admin__taskbar">
        <div class="admin__taskbar--header">
          <div class="admin__taskbar--header__content">
            <div id="toHomeUser" onclick="toUser();">
              <img
                src="public/database/images/logo/trek_logo_shield.png"
                alt=""
              />
            </div>
            <h1>AdminHub</h1>
          </div>
        </div>
        <div class="hr"></div>
        <ul class="admin__taskbar--body__list">

            <li class="admin__taskbar--body__item ">
            <a href="index.php?controller=homeadmin&action=index" id="link_Home" style="border-radius: 10px;">
                <i class="fa-solid fa-house-chimney"></i>
                <p>Trang chủ</p>
            </a>
            </li>

            <li class="admin__taskbar--body__item">
            <a href="index.php?controller=sanpham&action=index" id="link_Product">
                <i class="fa-solid fa-bicycle"></i>
                <p>Sản phẩm</p>
            </a>
            </li>

            <li class="admin__taskbar--body__item">
            <a href="index.php?controller=khuyenmai&action=index" id="link_Promotions">
                <i class="fa-solid fa-percent"></i>
                <p>Khuyến mãi</p>
            </a>
            </li>

            <li class="admin__taskbar--body__item">
            <a href="index.php?controller=nhanvien&action=index" id="link_staff">
                <i class="fa-solid fa-user"></i>
                <p>Nhân viên</p>
            </a>
            </li>

            <li class="admin__taskbar--body__item ">
            <a href="index.php?controller=order&action=index" id="link_bill">
                <i class="fa-solid fa-cart-shopping"></i>
                <p>Đơn hàng</p>
            </a>
            </li>


            <li class="admin__taskbar--body__item">
            <a href="index.php?controller=khachhang&action=index" id="link_client">
                <i class="fa-solid fa-handshake"></i>
                <p>Khách hàng</p>
            </a>
            </li>

            <li class="admin__taskbar--body__item">
            <a href="index.php?controller=phieunhap&action=index" id="link_receipt">
                <i class="fas fa-receipt"></i>
                <p>Phiếu nhập</p>
            </a>
            </li>
            <li class="admin__taskbar--body__item">
            <a href="index.php?controller=thongke&action=index" id="link_statistics">
                <i class="fa fa-line-chart"></i>
                <p>Thống kê</p>
            </a>
            </li>
        </ul>

        <!-- <div class="hr"></div> -->
<hr>

      <div class="admin__taskbar--footer">
        <button class="logout">
          <i class="fa-solid fa-right-from-bracket"></i>
          <p>Đăng xuất</p>
        </button>
      </div>
    </div>
    <div class="admin__content--header">
      <div class="admin__content--header__user">
          <p><i class="fa-solid fa-user-shield"></i>
          <?php
                    
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    }
                    
                    ?>
        </p>
        </div>
    </div>
    <div class="admin__content">
      <div class="admin__content--body">
        <!-- <div class="admin__content--body__top">
              <div class="admin__content--body__filter"></div>
            </div> -->
        <div class="admin__content--body__content">
          <!--  NEW CODE ! -->

          <!-- Phần thống kê -->
          <div class="admin__content--statistics__content" id="statisticsContent">
            <div class="statistics__content--body__top" style="margin-top:5%;margin-bottom:20px;">
              <h1 class="statistics__title">Thống kê tổng quát</h1>
            </div>
            <div class="statistics__content--body__content">
              <div class="statistics__content--body__box">
                <h2 class="statistics__box--title">Tổng thu nhập</h2>
                <p class="statistics__box--content"><?php 
                        echo number_format($doanhThu[0]["total"])." VNĐ";
                  ?>             
                </p>
              </div>
              <div class="statistics__content--body__box">
                <h2 class="statistics__box--title">Sản phẩm</h2>
                <p class="statistics__box--content"><?php 
                        echo number_format($sanPham[0]["total"]);
                  ?></p>
              </div>
              <div class="statistics__content--body__box">
                <h2 class="statistics__box--title">Danh mục sản phẩm</h2>
                <p class="statistics__box--content"><?php 
                        echo number_format($loai[0]["total"]);
                  ?></p>
              </div>
              <div class="statistics__content--body__box">
                <h2 class="statistics__box--title">Thành viên</h2>
                <p class="statistics__box--content"><?php 
                        echo number_format($nhanVien[0]["total"]);
                  ?></p>
              </div>
              <div class="statistics__content--body__box">
                <h2 class="statistics__box--title">Đơn hàng chưa xử lý</h2>
                <p class="statistics__box--content"><?php 
                        echo number_format($donHangCXL[0]["total"]);
                  ?></p>
              </div>
              <div class="statistics__content--body__box">
                <h2 class="statistics__box--title">Đơn hàng đã xử lý</h2>
                <p class="statistics__box--content"><?php 
                        echo number_format($donHangDXL[0]["total"]);
                  ?></p>
              </div>
            </div>
        </div>
    </div>
  </div>
  <?php
              if($_GET['controller']=='homeadmin'){
                echo '<script>var a = document.getElementById("link_Home");
                a.style.backgroundColor = "lightgray";</script>';
              }

          ?>
</body>

<script>
  $(document).ready(function(){
    $(document).on('click', '.logout',function(){
      console.log("Trang chủ.");
      $.ajax({
          type: "POST",
          url: "index.php?controller=home&action=logoutAdmin",
          data:{},
          success: function(data) {
              alert("Đăng xuất thành công.");
              window.location.href = "index.php?controller=home&action=index";
          },
          error: function(xhr, status, error) {
              alert("Lỗi");
          }
      });
      });
  })
</script>

</html>