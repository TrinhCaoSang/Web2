<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trek - Quản lý cửa hàng</title>
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/style.css">
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/HomeAdmin/HomeAdmin.css">
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/AdminProduct/AdminProduct.css">
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/ManageUserList/ManageUserList.css" />
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/AdminProduct/adminProduct.css" />
    <!-- <script defer src="/DoAnWeb/Web2/public/components/HomeAdmin/HomeAdmin.js"></script> -->
</head>
<body>
<div class="container">
<div class="admin__taskbar">
        <div class="admin__taskbar--header">
          <div class="admin__taskbar--header__content">
            <div>
              <img
                src="/DoAnWeb/Web2/public/database/images/logo/trek_logo_shield.png"
                alt=""
              />
            </div>

            <h1>AdminHub</h1>
          </div>
        </div>
        <div class="hr"></div>
        <ul class="admin__taskbar--body__list">

          <li class="admin__taskbar--body__item ">
            <a href="" id="linkHome">
              <i class="fa-solid fa-house-chimney"></i>
              <p>Trang chủ</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="" id="linkProduct">
              <i class="fa-solid fa-bicycle"></i>
              <p>Sản phẩm</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="" id="linkPromotions">
              <i class="fa-solid fa-percent"></i>
              <p>Khuyến mãi</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="">
              <i class="fa-solid fa-user"></i>
              <p>Nhân viên</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item ">
            <a href="">
              <i class="fa-solid fa-cart-shopping"></i>
              <p>Đơn hàng</p>
            </a>
          </li>


          <li class="admin__taskbar--body__item">
            <a href="">
              <i class="fa-solid fa-handshake"></i>
              <p>Khách hàng</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="">
              <i class="fa-solid fa-chart-column"></i>
              <p>Thống kê</p>
            </a>
          </li>

        </ul>

        <div class="hr"></div>

        <div class="admin__taskbar--footer">
          <button>
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>Đăng xuất</p>
          </button>
        </div>
      </div>
      <div class="admin__content--header">
        <div class="admin__content--header__cate">
          <i class="fa-solid fa-bars"></i>
          <p>Danh mục</p>
        </div>
        <div class="admin__content--header__search">
          <input type="text" placeholder="Nhập nội dung cần tìm kiếm" />
          <div>
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>
        <div class="admin__content--header__user">
          <p><i class="fa-solid fa-user-shield"></i>Nguyễn Văn A</p>
        </div>
      </div>
      <div class="admin__content">
        <div class="admin__content--body">
            <div class="admin__content--body__content">
                <div class="admin__content--statistics__content" id="statisticsContent">
                    <!--Đơn hàng-->
          <div class="admin__content--bill__content" id="bill">
            <div class="bill__content--top">
              <h1 class="bill__title">QUẢN LÝ ĐƠN HÀNG</h1>
              <form class="admin__content--body__filter">
                <h1>Lọc đơn hàng</h1>
                <p>* Lưu ý: Định dạng dữ liệu ngày tạo đơn được hiển thị là dạng dd/mm/yyyy</p>
                <div class="admin__content--body__filter--gr1">
                  <div class="body__filter--field body__filter--status" id="orderStatus">
                    <p>Trạng thái</p>
                    <select name="" id="tinhtrang_loc">
                      <option value="all">Tất cả</option>
                      <option value="dangchoxuly">Đang chờ xử lý</option>
                      <option value="dalienlac">Đã liên lạc</option>
                      <option value="dagiao">Đã giao</option>  
                    </select>
                  </div>
                  <div class="body__filter--field body__filter--orderDate" id="orderDateBegin">
                    <label>Từ ngày:</label>
                    <input id="tungay" type="date" />
                  </div>

                  <div class="body__filter--field body__filter--orderDate" id="orderDateEnd">
                    <label>Đến ngày:</label>
                    <input id="denngay" type="date" />
                  </div>
                </div>
                <div class="body__filter--actions--bill">
                  <button type="reset" id="reset" class="order--reset__btn">Reset</button>
                  <button type="button" id="loc" class="order--filter__btn">Lọc</button>
                </div>
              </form>
              <div id="dshd">
              <table>
                <tr>
                  <th class="table--top">Mã đơn hàng</th>
                  <th class="table--top">Mã khách hàng</th>
                  <th class="table--top">Ngày tạo</th>
                  <th class="table--top">Tổng tiền</th>
                  <th class="table--top">Đơn hàng</th>
                  <th class="table--top">Tình trạng</th>
                </tr>
                
                <?php
                  foreach($listHD as $hd){
                ?>
                <tr>
                  <th><?php echo $hd['MaHD'] ?></th>
                  <th><?php echo $hd['MaKH'] ?></th>
                  <th><?php echo $hd['NgayXuat'] ?></th>
                  <th class="text__align--left"><?php echo number_format($hd['TongTien']) . " VNĐ";?></th>
                  <th class="text__align--left" id="xemchitiet" value-data="<?php echo $hd['MaHD'].'#'.$hd['MaKH'] ?>" style="text-decoration: underline;color: rgb(115, 198, 0);" onclick="show_bill()">Xem chi tiết</th>
                  <th class="text__align--left"><?php 
                    if($hd['TinhTrang']=='dangchoxuly'){
                      echo 'Đang chờ xử lý';
                    }else if($hd['TinhTrang']=='dalienlac'){
                      echo 'Đã liên lạc';
                    }else if($hd['TinhTrang']=='dagiao'){
                      echo 'Đã giao';
                    }
                  ?></th>
                </tr>
                <?php
                  }
                ?>
              </table>
              </div>
              <div class="bill--model--ctpn" id="model--bill" style="display: none;">
                <div class="bill_content--model--ctpn">
                  <h1 class="bill__title">Thông tin khách hàng</h1>
                  <button class="close" onclick="close_bill()">×</button>
                  <p>
                    <strong>Tên khách hàng: </strong>
                  </p>
                  <p>
                    <strong>Địa chỉ: </strong>
                  </p>
                  <p>
                    <strong>Số điện thoại: </strong>
                  </p>
                  <hr>
                  <h1 class="bill__title">Thông tin đơn hàng</h1>
                  <p>
                    <strong>Ngày tạo đơn hàng: </strong>
                  </p>
                  <p>
                    <strong>Tổng tiền: </strong>
                  </p>
                  <p>
                    <strong>Tình trạng: </strong>
                    <span id="status" style="color: red; font-size: 14pt; margin-left: 25px;">Chưa xử lý</span>
                    <label>
                      <input type="checkbox" onchange="">
                      <span class="slider"></span>
                    </label>
                  </p>
                  <hr>
                  <h1 class="bill__title">CHI TIẾT ĐƠN HÀNG</h1>
                  <button class="printbtn" onclick="window.print()">In đơn hàng</button>
                  <table>
                    <tr>
                      <th class="table--top">Hình ảnh</th>
                      <th class="table--top">Tên sản phẩm</th>
                      <th class="table--top">Loại</th>
                      <th class="table--top">Số lượng</th>
                      <th class="table--top">Giá</th>
                    </tr>
                    <tr>
                      <th>PNG1</th>
                      <th>Xe đạp</th>
                      <th class="text__align--left">Mountain</th>
                      <th class="text__align--left">1</th>
                      <th class="text__align--left">1200000</th>
                    </tr>
                    <tr>
                      <th>PNG1</th>
                      <th>Xe đạp</th>
                      <th class="text__align--left">Mountain</th>
                      <th class="text__align--left">1</th>
                      <th class="text__align--left">1200000</th>
                    </tr>

                  </table>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  function close_bill() {
    document.getElementById("model--bill").style.display = "none";
  }
  function show_bill() {
    document.getElementById("model--bill").style.display = "flex";
  }
  function changeStatus() {
    var selectElement = document.getElementById("tinhtrang");
    if(selectElement){
      var selectedOption = selectElement.options[selectElement.selectedIndex].text;
      document.getElementById("status").innerText = selectedOption;
    }
    else{
      console.log("Error");
    }
  }
  $(document).ready(function(){
    $(document).on('click', '#xemchitiet',function(){  
        var value = $(this).attr('value-data');
        //Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=order&action=showchitiet',
              type: 'post',
              data:{
                cthd:value.split("#")
              },
              success: function(response){
                $('#model--bill').html(response);
              }
          });
    });

    $(document).on('click', '#luu',function(){
        //Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=order&action=suatinhtrang',
              type: 'post',
              data:{
                status:document.getElementById("tinhtrang").value,
                mahd:document.getElementById("luu").value
              },
              success: function(response){
                $('#model--bill').html(response);
                location.reload();
              }
          });
    });

    $(document).on('click', '#huy',function(){
        //Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=order&action=huydonhang',
              type: 'post',
              data:{
                mahd:document.getElementById("huy").value
              },
              success: function(response){
                $('#model--bill').html(response);
                location.reload();
              }
          });
    });

    $(document).on('click', '#loc',function(){
        //Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=order&action=loc',
              type: 'post',
              data:{
                tinhtrang:document.getElementById("tinhtrang_loc").value,
                tungay:document.getElementById("tungay").value,
                denngay:document.getElementById("denngay").value
              },
              success: function(response){
                $('#dshd').html(response);
              }
          });
    });

    $(document).on('click', '#reset',function(){
      location.reload();
    });

  })
</script>
</html>