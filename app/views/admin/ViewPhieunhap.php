<?php include 'include/AdminHome/header_admin.php' ?>
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
            <!--Phiếu nhập-->
          <div class="admin__content--receipt__content" id="receipt">
            <div class="receipt__content--top">
              <h1 class="receipt__title">QUẢN LÝ PHIẾU NHẬP</h1>
            
              <form action="" class="receipt__form">
                <div class="form-group">
                  <label for="form__receiptId">Mã phiếu nhập:</label>
                  <input type="text"id="form__receipt" name="receipt">
                    
                </div>
                <div class="form-group">
                  <label for="form__receipt--NCC">Mã nhà cung cấp:</label>
                  <select id="form__receipt--MANCC" name="receipt--LoaiSP">
                    <option value="" disabled selected hidden></option>
                    <option value="male">sp1</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="form__receipt--TenNCC">Tên nhà cung cấp:</label>
                  <input type="text" id="form__receipt--TENNCC" name="receipt--TENCC"  disabled>
                </div>
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
                <div class="form-group">
                  <label for="form__receipt--Gia">Giá:</label>
                  <input type="text" id="form__receipt--Gia" name="receipt--gia" disabled>
                </div>
                <div class="form-group">
                  <label for="form__receipt--soluong">Số lượng:</label>
                  <input type="text" id="form__receipt--soluong" name="receipt--soluong">
                </div>
                <div class="form-group">
                  <label for="form__receipt--tong">Tổng:</label>
                  <input type="text" id="form__receipt--tong" name="receipt--tong" disabled value="">
                </div>
              </form>
            
              <div class="button__container--receipt">
                <button class="customer__form--add">Thêm</button>
              </div>
            </div>
          
            <table>
              <tr>
                <th class="table--top">STT</th>
                <th class="table--top">Mã phiếu nhập</th>
                <th class="table--top">Mã nhà cung cấp</th>
                <th class="table--top">Tổng giá trị</th>
                <th class="table--top">Ngày nhập</th>
                <th class="table--top">Xem chi tiết</th>
              </tr>
              <tr>
                <th>1</th>
                <th>PN01</th>
                <th class="text__align--left">Admin</th>
                <th class="text__align--left"></th>
                <th class="text__align--left">03/04/2024</th>
                <th class="text__align--left" style="text-decoration: underline; color: rgb(115, 198, 0);" onclick="show_receipt()">Xem chi tiết</th>

              </tr>
            </table>

            <div class="receipt--model--ctpn" id="model--ctpn" style="display: none;">
              <div class="receipt_content--model--ctpn">
                <h1 class="receipt__title">CHI TIẾT PHIẾU NHẬP</h1>
                <button class="close" onclick="close_receipt()">×</button>
                <table>
                  <tr>
                    <th class="table--col" style="width: 10px;">STT</th>
                    <th class="table--col" style="width: 70px;">Mã PN</th>
                    <th class="table--col">Tên nhà cung cấp</th>
                    <th class="table--col">Loại sản phẩm</th>
                    <th class="table--col">Mã sản phẩm</th>
                    <th class="table--col">Tên sản phẩm</th>
                    <th class="table--col">Giá</th>
                    <th class="table--col">Số lượng</th>
                    <th class="table--col">Tổng</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <th>PN01</th>
                    <th class="text__align--left">Xe đạp Bình Minh</th>
                    <th class="text__align--left">Mountain</th>
                    <th class="text__align--left">mt04</th>
                    <th class="text__align--left">Fuel EXe 9.9 XX AXS T-TYPE</th>
                    <th class="text__align--left">1200000</th>
                    <th class="text__align--left">10</th>
                    <th class="text__align--left">12000000</th>
                  </tr>
                </table>
              </div>
            </div>
          </div>

<?php include 'include/AdminHome/footer_admin.php' ?>