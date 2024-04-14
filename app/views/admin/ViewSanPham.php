<head>
    <title>Trek - Quản lý cửa hàng</title>
    <link rel="stylesheet" href="/Web2/public/components/HomeAdmin/HomeAdmin.css">
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/AdminProduct.css">
    <link rel="stylesheet" href="/Web2/public/components/ManageUserList/ManageUserList.css" />
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/adminProduct.css" />
<head>
<div class="container">
      
      <div class="admin__taskbar">
        <div class="admin__taskbar--header">
          <div class="admin__taskbar--header__content">
            <div>
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
            <a href="" id="link_Home">
              <i class="fa-solid fa-house-chimney"></i>
              <p>Trang chủ</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="" id="link_Product">
              <i class="fa-solid fa-bicycle"></i>
              <p>Sản phẩm</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="" id="link_Promotions">
              <i class="fa-solid fa-percent"></i>
              <p>Khuyến mãi</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="" id="link_staff">
              <i class="fa-solid fa-user"></i>
              <p>Nhân viên</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item ">
            <a href="" id="link_bill">
              <i class="fa-solid fa-cart-shopping"></i>
              <p>Đơn hàng</p>
            </a>
          </li>


          <li class="admin__taskbar--body__item">
            <a href="" id="link_client">
              <i class="fa-solid fa-handshake"></i>
              <p>Khách hàng</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="" id="link_receipt">
              <i class="fa-solid fa-chart-column"></i>
              <p>Phiếu nhập</p>
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
            <!--  NEW CODE ! -->
               <!-- Sản phẩm -->
              
               <div class="admin-product" id="manageProduct">
                <div class = "product_content--top">
                <h1 class="receipt__title">QUẢN LÝ SẢN PHẨM</h1>
                <form action="" class="receipt__form">
                <div class="form-group">
                  <label for="form__receipt--LoaiSP" >Loại sản phẩm:</label>
                  <select id="form__receipt--LoaiSP" name="receipt--LoaiSP">
                    <option value="" disabled selected hidden></option>
                    <option value="male">sp1</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="form__receipt-MaSP">Mã sản phẩm:</label>
                  <select id="form__receipt--MaSP" name="receipt--MASP">
                    <option value="" disabled selected hidden></option>
                    <option value="male">sp1</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="form__receipt--TenSP">Tên sản phẩm:</label>
                  <select id="form__receipt--TenSP" name="receipt--LoaiSP">
                    <option value="" disabled selected hidden></option>
                    <option value="male">sp1</option>
                  </select>
                </div>
                <div class="image-container">
                     <label for="file-upload" class="custom-file-upload"> 
                    <img id="preview-image" src="#" alt="Preview Image" style="display: none;">
                    <span>Chọn hình ảnh</span>
                    </label>
                    <input id="file-upload" type="file"/>
                </div>
                <div class="form-group">
                  <label for="form__receipt--Price">Giá:</label>
                  <input type="text" id="form__receipt--Price" name="receipt--price" disabled>
                </div>
                <div class="form-group">
                  <label for="form__receipt--soluong">Số lượng:</label>
                  <input type="text" id="form__receipt--soluong" name="receipt--soluong">
                </div>
      
              </form>
              <div class="button__container--receipt">
                <button type="button" class="customer__form--add1" id="add-btn1">Thêm</button>
                <button type="button" class="customer__form--add2" id="add-btn2">Reset</button>
                <button type="button" class="customer__form--add3" id="add-btn3">Lọc</button>
              </div>
                  <table>
                        <tr>
                        <th class="table--top">Mã SP</th>
                        <th class="table--top">Loại</th>
                        <th class="table--top">Hình ảnh</th>
                        <th class="table--top">Tên Sản Phẩm</th>
                        <th class="table--top">Đơn giá</th>
                        <th class="table--top">Số lượng</th> 
                        <th class="table--top">Sửa</th>
                        <th class="table--top">Xóa</th>
                        </tr>
                        <tr>
                           <th>k01</th>
                           <th>Kid</th>
                           <th></th>
                           <th>Fuel EXe 9.9 XX AXS T-TYPE</th>
                           <th>1000000</th>
                           <th>12</th>
                           <th>
                               <a href="index.php?controller=sanpham&action=edit&id=<?php echo $value['MaHang'];?>"><button type="submit" class="discount__form--change">Cập nhật</button></a>
        
                           </th>
                           <th >
                               <a href="index.php?controller=sanpham&action=delete&id=<?php echo $value['MaHang'];?>"><button class="discount__form--add">Xóa</button></a>
                           </th>
                        </tr>
                      </table>                  
                  </div>
                </div>
            </div>
          </div>
          <script>
          document.getElementById('file-upload').addEventListener('change', function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('preview-image').style.display = 'inline-block';
        document.getElementById('preview-image').src = e.target.result;
    }
    reader.readAsDataURL(this.files[0]);
});


          </script>
        </div>
   