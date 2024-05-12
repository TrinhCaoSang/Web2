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


  <script defer src="/Web2/public/components\HomeAdmin\HomeAdmin.js"></script>
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
      <!-- <div class="admin__content--header__search">
        <input type="text" placeholder="Nhập nội dung cần tìm kiếm" />
        <div>
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div> -->
      <div class="admin__content--header__user">
        <p><i class="fa-solid fa-user-shield"></i>Nguyễn Văn A</p>
      </div>
    </div>
    <div class="admin__content">
      <div class="admin__content--body">
        <!-- <div class="admin__content--body__top">
              <div class="admin__content--body__filter"></div>
            </div> -->
        <div class="admin__content--body__content">
        <div class="admin__content--employee__content" id="staff">
            <div class="employee__content--top">
              <h1 class="employee__title">QUẢN LÝ NHÂN VIÊN</h1>
              <?php
                  if(isset($_GET['action']) && $_GET['action']=="index" || $_GET['action']=="insert"){
                    echo '
              <form action="index.php?controller=nhanvien&action=insert" class="employee__form" method="post">
                
                
                <div class="form-group">
                  <label for="form__employeeFname">Tên nhân viên:</label>
                  <input type="text" id="form__employeeFname" name="employeeFname">
                </div>
                <div id="TenNV-error" class="error-message"></div>

                <div class="form-group">
                  <label for="form__employeeGender">Giới tính:</label>
                  <select id="form__employeeGender" name="employeeGender">
                    <option value="" disabled selected hidden>Chọn giới tính</option>
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                    <option value="other">Khác</option>
                  </select>
                </div>
                <div id="gioitinh-error" class="error-message"></div>

                <div class="form-group">
                  <label for="form__employeePosition">Chức vụ:</label>
                  <select id="form__employeePosition" name="employeePosition">
                    <option value="" disabled selected hidden>Chọn chức vụ</option>
                    <option value="admin">Quản trị viên</option>
                    <option value="staff">Nhân viên</option>
                  </select>
                </div>
                <div id="ChucVu-error" class="error-message"></div>
                <div class="form-group">
                  <label for="form__employeeSalary">Lương cơ bản:</label>
                  <input type="text" id="form__employeeSalary" name="employeeSalary">
                </div>
                <div id="Luong-error" class="error-message"></div>
                <div class="form-group">
                  <label for="form__employeeAddress">Địa chỉ:</label>
                  <input type="text" id="form__employeeAddress" name="employeeAddress">
                </div>
                <div id="DiachiNV-error" class="error-message"></div>
                <div class="form-group">
                  <label for="form__employeeKeysearch">Từ Khóa tìm kiếm:</label>
                  <input type="text" id="form__employeeKeysearch" name="employeeKeysearch">
                </div>

                <div class="button__container employee__btn">
                <input type="submit" name="add_nhanvien" class="employee__form--add" onclick="return validateForm()" value="Thêm">
                <input type ="submit" value = "Tìm kiếm" class="employee__form--search">
                <input type="submit" class="employee__form--authority" id="link_authorization" value="Quản lý phân quyền">
                <input type="submit" value="Khóa tài khoản" class="employee__form--lockAcc">
              </div>
              </form>
              ';
                    }
                    elseif(isset($_GET['action'])&&$_GET['action']=="edit"&&isset($_GET['id'])){
                    ?>

               <form action="" class="employee__form" method="post"> 
                <div class="form-group">
                  <input type="hidden" id="form__employeeId" name="employeeId" value="<?php echo $dataID['MaNV']; ?>">
                </div>
                <div id="gioitinh-error" class="error-message"></div>

                <div class="form-group">
                  <label for="form__employeeFname">Tên nhân viên:</label>
                  <input type="text" id="form__employeeFname" name="employeeFname" value="<?php echo $dataID['TenNV']; ?>">
                </div>
                <div id="TenNV-error" class="error-message"></div>

                <div class="form-group">
                  <label for="form__employeeGender">Giới tính:</label>
                  <select id="form__employeeGender" name="employeeGender">
                    <option value="" disabled selected hidden>Chọn giới tính</option>
                    <option value="male" <?php echo $dataID['gioitinh'] == 1 ? 'selected' : ''; ?>>Nam</option>
                    <option value="female" <?php echo $dataID['gioitinh'] == 0 ? 'selected' : ''; ?>>Nữ</option>
                    <option value="other" <?php echo $dataID['gioitinh'] == 2 ? 'selected' : ''; ?>>Khác</option>
                  </select>
                </div>
                <div id="gioitinh-error" class="error-message"></div>
                <div class="form-group">
                  <label for="form__employeePosition">Chức vụ:</label>
                  <select id="form__employeePosition" name="employeePosition">
                    <option value="" disabled selected hidden>Chọn chức vụ</option>
                    <option value="admin"<?php echo $dataID['ChucVu'] == 1 ? 'selected' : ''; ?>>Quản trị viên</option>
                    <option value="staff"<?php echo $dataID['ChucVu'] == 0 ? 'selected' : ''; ?>>Nhân viên</option>
                  </select>
                </div>
                <div id="ChucVu-error" class="error-message"></div>
                <div class="form-group">
                  <label for="form__employeeSalary">Lương cơ bản:</label>
                  <input type="text" id="form__employeeSalary" name="employeeSalary" value="<?php echo $dataID['Luong']; ?>">
                </div>
                <div id="Luong-error" class="error-message"></div>
                <div class="form-group">
                  <label for="form__employeeAddress">Địa chỉ:</label>
                  <input type="text" id="form__employeeAddress" name="employeeAddress" value="<?php echo $dataID['DiaChiNV']; ?>">
                </div>
                <div id="DiachiNV-error" class="error-message"></div>
                <div class="form-group">
                  <label for="form__employeeKeysearch">Từ Khóa tìm kiếm:</label>
                  <input type="text" id="form__employeeKeysearch" name="employeeKeysearch">
                </div>


                <div class="button__container employee__btn">
                <input type="submit"  class="employee__form--add" name="save" value="Lưu"  onclick="changeURL2()">
                <!-- <input type ="submit" value = "Tìm kiếm" class="employee__form--search">
                <input type="submit" class="employee__form--authority" id="link_authorization" value="Quản lý phân quyền">
                <input type="submit" value="Khóa tài khoản" class="employee__form--lockAcc"> -->
              </div>
              </form>
              
              <?php
                     }
                ?>
              
            </div>
            <table>
                <thead>
              <tr>
                <!-- <th class="table--top">STT</th> -->
                <th class="table--top">Mã nhân viên</th>
                <!-- <th class="table--top">Họ đệm</th> -->
                <th class="table--top">Tên Nhân Viên</th>
                <th class="table--top">Giới tính</th>
                <th class="table--top">Chức vụ</th>
                <th class="table--top">Lương</th>
                <th class="table--top">Địa chỉ</th>
                <!-- <th class="table--top">Trạng thái</th> -->
                <th class="table--top">Ngày đăng ký</th>

                <th class="table--top">Sửa</th>
                <th class="table--top">Xóa</th>
              </tr>
              </thead>
              <?php
                          $i=1;
                          foreach($this->list_staff as $value){
                ?>
              <tbody>
              <tr>
                <td class="text__align--left" ><?php echo $value['MaNV'] ;?></td>
                <td class="text__align--left"><?php echo $value['TenNV'] ;?></td>
                <td class="text__align--left"><?php echo $value['gioitinh'] == 1 ? "Nam" : "Nữ"; ?></td>
                <td class="text__align--left"><?php echo $value['ChucVu'] == 1 ? "Quản trị viên" : "Nhân viên";?></td>
                <td class="text__align--left"><?php echo number_format($value['Luong'], 0, '', '.')." VND";?></td>
                <td class="text__align--left"><?php echo $value['DiaChiNV'] ;?></td>
                <td class="text__align--left"><?php echo $value['NgayNhapFormatted']; ?></td>                
                <td><a  href="index.php?controller=nhanvien&action=edit&id=<?php echo $value['MaNV'];?>"><button class="staff__form--change">Sửa</button></a></td>
                  <td>
                  <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?controller=nhanvien&action=delete&id=<?php echo $value['MaNV'];?>"><button class="staff__form--remove">Xóa</button></a>
                </td>
              </tr>
              <?php 
              $i++;
               }
            ?>
              </tbody>
            </table>
          </div>
           <!--Phân quyền-->
           <div class="admin__content--authority__content" id="authorization">
            <div class="authority__content--top">
              <div class="authority__title">
                <h2>Quản lý phân quyền</h2>
                <div class="authority__textName">
                  <label style="margin-right: 15px;" for="name_authority">Tên chức vụ:</label>
                  <input type="text" id="name_authority" name="authority"
                    style="width: 50%; height: 30px; padding: 5px;"></input>
                </div>
              </div>
              <table>
                <thead>
                  <tr class="authority-headTable">
                    <th class="authority-stt">STT</th>
                    <th class="authority-name">Tên</th>
                    <th class="authority-editBtn">Sửa</th>
                    <th class="authority-deleteBtn">Xóa</th>
                  </tr>
                </thead>
                <tbody id="authority_list">
                  <tr>
                    <td class="authority-sttData">0</td>
                    <td class="authority-nameData">admin</td>
                    <td>
                      <i id="authority_change" class="fa-regular fa-pen-to-square authority-editBtnData"></i>
                    </td>
                    <td>
                      <i id="authority_remove" class="fa-solid fa-xmark authority-deleteBtnData" style="color: #f31616;"></i>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="authority__list--Btn">
                <button class="authority__Btn--add" id="authority_add">Thêm</button>
                <button class="authority__Btn--exit" id="authority_exit">Thoát</button>
              </div>

              <!--CheckBox-->
              <div id="authority__modal--content" class="authority__modal--content">
                <div class="authority__modal--checkBox">
                  <div class="checkBox__top">
                    <h2>Tùy Chỉnh</h2>
                  </div>
                  <div class="checkBox__content">
                    <form action="" class="checkBox__content--form">
                      <div class="checkBox__content--name">
                        <p id="checkBox-nameLabel">Tên</p>
                      </div>
                      <div class="checkBox__content--list">
                        <table>
                          <thead>
                            <tr>
                              <th></th>
                              <th>Xem</th>
                              <th>Thêm</th>
                              <th>Sửa</th>
                              <th>Xóa</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th>Quản lý phân quyền</th>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                            </tr>
                            <tr>
                              <th>Quản lý phiếu nhập</th>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                            </tr>
                            <tr>
                              <th>Quản lý sản phẩm</th>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                            </tr>
                            <tr>
                              <th>Quản lý khuyến mãi</th>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                            </tr>
                            <tr>
                              <th>Quản lý nhân viên</th>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                            </tr>
                            <tr>
                              <th>Quản lý đơn hàng</th>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                            </tr>
                            <tr>
                              <th>Quản lý khách hàng</th>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                            </tr>
                            <tr>
                              <th>Quản lý tài khoản</th>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                              <td><label><input type="checkbox"></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </form>
                  </div>
                  <div class="checkBox__Btn">
                    <button class="checkBox__Btn--save">Lưu</button>
                    <button class="checkBox__Btn--exit">Thoát</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--End-->
        </div>
        <script>
          function changeURL() {
            var newUrl = "http://localhost/Web2/index.php?controller=nhanvien&action=insert"; 
            window.history.pushState("", "", newUrl); 
        }

        function changeURL2(){
          var newUrl = "http://localhost/Web2/index.php?controller=nhanvien&action=save"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }
        function validateForm() {
          var isValid = true;
          // var maKh = document.getElementById('form__customerId').value.trim();
          var tenKh = document.getElementById('form__employeeFname').value.trim();
          var gioitinh = document.getElementById('form__employeeGender').value.trim();
          var chucvu =document.getElementById('form__employeePosition').value.trim();
          var DiaChi = document.getElementById('form__employeeAddress').value.trim();
          var Luong = document.getElementById('form__employeeSalary').value.trim();

          if (tenKh === '') {
              document.getElementById('TenNV-error').textContent = '*Chưa nhập tên nhân viên!';
              document.getElementById('TenNV-error').style.display = 'block';
              isValid = false;
          }
          if (Luong === '') {
              document.getElementById('Luong-error').textContent = '*Chưa nhập lương!';
              document.getElementById('Luong-error').style.display = 'block';
              isValid = false;
          }

          if (gioitinh === '') {
              document.getElementById('gioitinh-error').textContent = '*Chưa chọn giới tính!';
              document.getElementById('gioitinh-error').style.display = 'block';
              isValid = false;
          }

          if (chucvu === '') {
              document.getElementById('ChucVu-error').textContent = '*Chưa chọn chức vụ!';
              document.getElementById('ChucVu-error').style.display = 'block';
              isValid = false;
          }

          if (DiaChi === '') {
              document.getElementById('DiachiNV-error').textContent = '*Chưa nhập địa chỉ!';
              document.getElementById('DiachiNV-error').style.display = 'block';
              isValid = false;
          }

          return isValid;
      }


    document.getElementById('form__employeeFname').addEventListener('input', function() {
    var tenKhValue = this.value.trim();
    if (tenKhValue !== '') {
        document.getElementById('TenNV-error').style.display = 'none';
    } else {
        document.getElementById('TenNV-error').textContent = '*Chưa nhập tên nhân viên!';
        document.getElementById('TenNV-error').style.display = 'block';
    }
});
document.getElementById('form__employeeSalary').addEventListener('input', function() {
    var tenKhValue = this.value.trim();
    if (tenKhValue !== '') {
        document.getElementById('Luong-error').style.display = 'none';
    } else {
        document.getElementById('Luong-error').textContent = '*Chưa nhập lương nhân viên!';
        document.getElementById('Luong-error').style.display = 'block';
    }
});
document.getElementById('form__employeeGender').addEventListener('input', function() {
    var gioitinhValue = this.value.trim();
    if (gioitinhValue !== '') {
        document.getElementById('gioitinh-error').style.display = 'none';
    } else {
        document.getElementById('gioitinh-error').textContent = '*Chưa chọn giới tính!';
        document.getElementById('gioitinh-error').style.display = 'block';
    }
});
document.getElementById('form__employeePosition').addEventListener('input', function() {
    var sdtValue = this.value.trim();
    if (sdtValue !== '') {
        document.getElementById('ChucVu-error').style.display = 'none';
    } else {
        document.getElementById('ChucVu-error').textContent = '*Chưa chọn chức vụ!';
        document.getElementById('ChucVu-error').style.display = 'block';
    }
});
document.getElementById('form__employeeAddress').addEventListener('input', function() {
    var diachiValue = this.value.trim();
    if (diachiValue !== '') {
        document.getElementById('DiachiNV-error').style.display = 'none';
    } else {
        document.getElementById('DiachiNV-error').textContent = '*Chưa nhập địa chỉ!';
        document.getElementById('DiachiNV-error').style.display = 'block';
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