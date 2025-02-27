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
    <script src="/Web2/app/views/admin/Interface(JS)/entry_details.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
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
<hr>

        <div class="admin__taskbar--footer">
          <button>
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
          <div class="admin__content--body__content">
            <!--Phiếu nhập-->
          <div class="admin__content--receipt__content" id="receipt">
            <div class="receipt__content--top">
              <h1 class="receipt__title">CHI TIẾT PHIẾU NHẬP</h1>
            
              <form action="" class="receipt__form" id="form_ctpn">
                <div class="form-group">
                  <label for="form__receiptId">Mã phiếu nhập:</label>
                  
                  <select id="form__receipt" name="receipt">
                        <?php foreach($list_mapn as $mapn): ?>
                         <option value="<?= $mapn['MaPN'] ?>"><?= $mapn['MaPN'] ?></option>
                         <?php endforeach; 
                         ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="form__receipt--NCC">Mã nhà cung cấp:</label>
                  <select id="form__receipt--MANCC" name="receipt--MANCC">
                  <?php foreach($list_ncc as $ncc): ?>
                         <option value="<?= $ncc['MaNCC'] ?>"><?= $ncc['MaNCC'] ?></option>
                         <?php endforeach; 
                         ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="form__receipt--NameNCC">Tên nhà cung cấp:</label>
                  <input type="text" id="form__receipt--NAMENCC" name="receipt--NAMENCC"  disabled>
                </div>
                <div class="form-group">
                  <label for="form__receipt--LoaiSP" >Loại sản phẩm:</label>
                  <select id="form__receipt--LoaiSP" name="receipt--LoaiSP" onchange="updateMaSPByLoaiSP(this.value)">
                  <?php foreach($list_loaisp as $loaisp): ?>
                    <option value="<?= $loaisp['MaLoai']?>" > <?= $loaisp['TenLoai'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="form__receipt-MaSP">Mã sản phẩm:</label>
                  <select id="form__receipt--MaSP" name="receipt--MASP">
                  <?php
                        $list_maHang = $this->CTPN->getAllMathang(); 
                        foreach($list_maHang as $maHang) {
                        echo "<option value='{$maHang['MaHang']}'>{$maHang['MaHang']}</option>";
                  }
                  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="form__receipt--TenSP">Tên sản phẩm:</label>
                  <input type="text" id="form__receipt--TenSP" name="receipt--TenHang" disabled>
                </div>

                
                <div class="form-group">
                  <label for="form__receipt--Price">Giá:</label>
                  <input type="text" id="form__receipt--Price" name="receipt--price" disabled>
                </div>
                <div class="form-group">
                  <label for="form__receipt--soluong">Số lượng:</label>
                  <input type="number" id="form__receipt--soluong" name="receipt--soluong" oninput="calculateTotal()">
                </div>
                <div id="soLuong-error" class="error-message-soLuong"></div>

                <div class="form-group">
                  <label for="form__receipt--tong">Tổng:</label>
                  <input type="text" id="form__receipt--tong" name="receipt--tong" disabled value="">
                </div>
              </form>
            
              <div class="button__container--receipt">
                <button class="customer__form--add" id="add-btn">Thêm</button>
                <button class="customer__form--add3" id="add-btn4">Quay lại</button>
              </div>
            </div>
             
            <table>
                  <thead>
                  <tr>
                    <th class="table--top">STT</th>
                    <th class="table--top" style="width: 70px;">Mã PN</th>
                    <th class="table--top">Mã nhà cung cấp</th>
                    <th class="table--top">Tên nhà cung cấp</th>
                    <th class="table--top">Mã sản phẩm</th>
                    <th class="table--top">Tên sản phẩm</th>
                    <th class="table--top" style="width: 150px;">Đơn Giá</th>
                    <th class="table--top">Số lượng</th>
                    <th class="table--top" style="width: 150px;">Tổng</th>
                    <!-- <th class="table--top">Sửa</th> -->
                    <th class="table--top">Xóa</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(!empty($list_ctpn)){
                      $i = 1;
                      foreach ($list_ctpn as $row) {    
                ?>
                  <tr>
                     <td ><?php echo $i; ?></td>
                    <td><?php echo $row['MaPN'] ?></td>
                    <td class="text__align--left"><?php echo $row['MaNCC'] ?></td>
                    <td class="text__align--left"><?php echo $row['TenNCC'] ?></td>
                    <td class="text__align--left"><?php echo $row['MaHang'] ?></td>
                    <td class="text__align--left"><?php echo $row['TenHang'] ?></td>
                    <td class="text__align--left"><?php echo number_format($row['DonGiaPN'], 0, '', '.') . ' VND';?></td>
                    <td class="text__align--left"><?php echo number_format($row['SoLuong']) ?></td>
                    <td class="text__align--left"><?php echo number_format($row['ThanhTienCTPN'], 0, '', '.')." VND";?></td>
                   
                    <td >
                      <a onclick="return Delete('<?php echo $row['MaPN']; ?>')" href="index.php?controller=ctpn&action=deleteCTPN&MaPN=<?php echo $row['MaPN'];?>&MaHang=<?php echo $row['MaHang'];?>"><button class="btn btn-delete">Xóa</button></a>
                   </td>
                  </tr>
                  <?php 
                $i++;
                 }
                }
                
              ?>
                  </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
</div>
</body>
</html>