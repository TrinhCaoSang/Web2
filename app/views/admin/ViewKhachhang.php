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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/Web2/app/views/admin/admin.js"></script>
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
            <a href="index.php?controller=homeadmin&action=index" id="link_Home">
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
            <a href="index.php?controller=khachhang&action=index" id="link_client" style="border-radius: 10px;">
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
<hr>
        <!-- <div class="hr"></div> -->

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
              <!--Khách hàng-->
            <div class="admin__content--customer__content" id="client">
              <div class="customer__content--top">
                <h1 class="customer__title">QUẢN LÝ KHÁCH HÀNG</h1>
                <?php
                  if(isset($_GET['action'])&&$_GET['action']=="index"||$_GET['action']=="insert"){
                    echo '
                   
    
                      <form action="index.php?controller=khachhang&action=insert" class="customer__form" id="khachhangForm" method="post">
                         
                          

                          <div class="form-group">
                              <label for="form__customerFname">Tên Khách Hàng:</label>
                              <input type="text" id="form__customerFname" name="customerFname">
                          </div>
                          <div id="TenKH-error" class="error-message"></div>

                          <div class="form-group">
                              <label for="form__customerGender">Giới tính:</label>
                              <select id="form__customerGender" name="customerGender">
                                  <option value="" disabled selected hidden></option>
                                  <option value="male">Nam</option>
                                  <option value="female">Nữ</option>
                                  
                              </select>
                          </div>
                          <div id="GioiTinh-error" class="error-message"></div>

                          <div class="form-group">
                              <label for="form__customerPhone">Số điện thoại:</label>
                              <input type="text" id="form__customerPhone" name="customerPhone">
                          </div>
                          <div id="SdtKH-error" class="error-message"></div>

                          <div class="form-group">
                              <label for="form__customerAddress">Địa chỉ:</label>
                              <input type="text" id="form__customerAddress" name="customerAddress">
                          </div>
                          <div id="DiachiKH-error" class="error-message"></div>


                          <div class="button__container">
                                  <input type="submit" name="add_khachhang" value="Thêm" class="customer__form--add"  onclick="return validateForm()">
                            </div>
                      </form>
                      ';

                    }
                    elseif(isset($_GET['action'])&&$_GET['action']=="edit"&&isset($_GET['id'])){
                    ?>
                     <form action="" class="customer__form" method="post">
                     <div class="form-group">
                          <!-- <label for="form__customerId">Mã khách hàng:</label> -->
                          <input type="hidden" id="form__customerId" name="customerId" value="<?php echo $dataID['MaKH']; ?>" >
                      </div>

                        <div id="maKH-error" class="error-message"></div>

                        <div class="form-group">
                            <label for="form__customerFname">Tên Khách Hàng:</label>
                            <input type="text" id="form__customerFname" name="customerFname" value="<?php echo $dataID['TenKh']; ?>">
                        </div>
                        <div id="TenKH-error" class="error-message"></div>

                        <div class="form-group">
                            <label for="form__customerGender">Giới tính:</label>
                            <select id="form__customerGender" name="customerGender">
                                <option value="male" <?php echo $dataID['gioitinh'] == 1 ? 'selected' : ''; ?>>Nam</option>
                                <option value="female" <?php echo $dataID['gioitinh'] == 0 ? 'selected' : ''; ?>>Nữ</option>
                                
                            </select>
                        </div>
                        <div id="GioiTinh-error" class="error-message"></div>

                        <div class="form-group">
                            <label for="form__customerPhone">Số điện thoại:</label>
                            <input type="text" id="form__customerPhone" name="customerPhone" value="<?php echo $dataID['Sdt']; ?>">
                        </div>
                        <div id="SdtKH-error" class="error-message"></div>

                        <div class="form-group">
                            <label for="form__customerAddress">Địa chỉ:</label>
                            <input type="text" id="form__customerAddress" name="customerAddress" value="<?php echo $dataID['DiaChiKh']; ?>">
                        </div>
                        <div id="DiachiKH-error" class="error-message"></div>


                        <div class="button__container">
                                <input type="submit" name="save" value="Lưu" class="customer__form--update" onclick="changeURL2()">
                        </div>
                    </form>
                    <?php
                            }
                            ?>
                    

                
              </div>
              <table>
                <thead>
                <tr>
                  <th class="table--top">STT</th>
                  <th class="table--top">Mã khách hàng</th>
                  <th class="table--top">Tên</th>
                  <th class="table--top">Giới tính</th>
                  <th class="table--top">Số điện thoại</th>
                  <th class="table--top">Địa chỉ</th>

                  <th class="table--top">Ngày đăng kí</th>
                  <th class="table--top">Sửa</th>
                  <th class="table--top">Xóa</th>
                </tr>
                </thead>

                <?php
                          $i=1;
                          foreach($this->list_client as $value){
                        ?>
            
                <tbody>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $value['MaKH'] ;?></td>
                  
                  <td class="text__align--left"><?php echo $value['TenKh'] ;?></td>
                  <td class="text__align--left"><?php echo $value['gioitinh'] == 1 ? "Nam" : "Nữ"; ?></td>

                  <td class="text__align--left"><?php echo $value['Sdt'] ;?></td>
                  <td class="text__align--left"><?php echo $value['DiaChiKh'] ;?></td>

                  <td class="text__align--left"><?php echo $value['NgayNhapFormatted']; ?></td>
                  <td><a  href="index.php?controller=khachhang&action=edit&id=<?php echo $value['MaKH'];?>"><button class="customer__form--change">Sửa</button></a></td>
                  <td>
                  <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?controller=khachhang&action=delete&id=<?php echo $value['MaKH'];?>"><button class="customer__form--remove">Xóa</button></a>
                  </td>
                </tr>
                <?php 
              $i++;
            
               }
              
            ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
  <?php
              if($_GET['controller']=='khachhang'){
                echo '<script>var a = document.getElementById("link_client");
                a.style.backgroundColor = "lightgray";</script>';
              }

          ?>
  <script>
    function changeURL() {
            var newUrl = "http://localhost/Web2/index.php?controller=khachhang&action=insert"; 
            window.history.pushState("", "", newUrl); 
        }

        function changeURL2(){
          var newUrl = "http://localhost/Web2/index.php?controller=khachhang&action=save"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }


    function validateForm() {
          var isValid = true;
          // var maKh = document.getElementById('form__customerId').value.trim();
          var tenKh = document.getElementById('form__customerFname').value.trim();
          var gioitinh = document.getElementById('form__customerGender').value.trim();
          var Sdt = document.getElementById('form__customerPhone').value.trim();
          var DiaChi = document.getElementById('form__customerAddress').value.trim();

          // if (maKh === '') {
          //     document.getElementById('maKH-error').textContent = '*Chưa nhập mã khách hàng!';
          //     document.getElementById('maKH-error').style.display = 'block';
          //     isValid = false;
          // }

          if (tenKh === '') {
              document.getElementById('TenKH-error').textContent = '*Chưa nhập tên khách hàng!';
              document.getElementById('TenKH-error').style.display = 'block';
              isValid = false;
          }

          if (gioitinh === '') {
              document.getElementById('GioiTinh-error').textContent = '*Chưa chọn giới tính!';
              document.getElementById('GioiTinh-error').style.display = 'block';
              isValid = false;
          }

          if (Sdt === '') {
              document.getElementById('SdtKH-error').textContent = '*Chưa nhập số điện thoại!';
              document.getElementById('SdtKH-error').style.display = 'block';
              isValid = false;
          }

          if (DiaChi === '') {
              document.getElementById('DiachiKH-error').textContent = '*Chưa nhập địa chỉ!';
              document.getElementById('DiachiKH-error').style.display = 'block';
              isValid = false;
          }

          return isValid;
      }

// document.getElementById('form__customerId').addEventListener('input', function() {
//     var maKHValue = this.value.trim();
//     if (maKHValue !== '') {
//         document.getElementById('maKH-error').style.display = 'none';
//     } else {
//         document.getElementById('maKH-error').textContent = '*Chưa nhập mã khách hàng!';
//         document.getElementById('maKH-error').style.display = 'block';
//     }
// });

document.getElementById('form__customerFname').addEventListener('input', function() {
    var tenKhValue = this.value.trim();
    if (tenKhValue !== '') {
        document.getElementById('TenKH-error').style.display = 'none';
    } else {
        document.getElementById('TenKH-error').textContent = '*Chưa nhập tên khách hàng!';
        document.getElementById('TenKH-error').style.display = 'block';
    }
});

document.getElementById('form__customerGender').addEventListener('input', function() {
    var gioitinhValue = this.value.trim();
    if (gioitinhValue !== '') {
        document.getElementById('GioiTinh-error').style.display = 'none';
    } else {
        document.getElementById('GioiTinh-error').textContent = '*Chưa chọn giới tính!';
        document.getElementById('GioiTinh-error').style.display = 'block';
    }
});

document.getElementById('form__customerPhone').addEventListener('input', function() {
    var sdtValue = this.value.trim();
    if (sdtValue !== '') {
        document.getElementById('SdtKH-error').style.display = 'none';
    } else {
        document.getElementById('SdtKH-error').textContent = '*Chưa nhập số điện thoại!';
        document.getElementById('SdtKH-error').style.display = 'block';
    }
});

document.getElementById('form__customerAddress').addEventListener('input', function() {
    var diachiValue = this.value.trim();
    if (diachiValue !== '') {
        document.getElementById('DiachiKH-error').style.display = 'none';
    } else {
        document.getElementById('DiachiKH-error').textContent = '*Chưa nhập địa chỉ!';
        document.getElementById('DiachiKH-error').style.display = 'block';
    }
});



function getCurrentDate() {
    var currentDate = new Date();
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var year = currentDate.getFullYear();
    var formattedDate = year + '-' + month + '-' + day;
    return formattedDate;
}

    </script>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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


