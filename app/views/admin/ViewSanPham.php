
<head>
    <title>Trek - Quản lý cửa hàng</title>
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/Web2/public/style.css">
    <link rel="stylesheet" href="/Web2/public/components/HomeAdmin/HomeAdmin.css">
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/AdminProduct.css">
    <link rel="stylesheet" href="/Web2/public/components/ManageUserList/ManageUserList.css" />
    <script src="/Web2/app/views/admin/Interface(JS)/product.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            <a href="index.php?controller=homeadmin&action=index" id="link_Home">
                <i class="fa-solid fa-house-chimney"></i>
                <p>Trang chủ</p>
            </a>
            </li>

            <li class="admin__taskbar--body__item">
            <a href="index.php?controller=sanpham&action=index" id="link_Product" style="border-radius: 10px;">
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
          <button class="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>Đăng xuất</p>
          </button>
        </div>
    </div>
      <div class="admin__content--header">
        <form action="">
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
               <!-- Sản phẩm -->  
               <div class="admin-product" id="manageProduct">
                <div class = "product_content--top">
                <h1 class="receipt__title">QUẢN LÝ SẢN PHẨM</h1>
                <div id="container_tt">
                  <form action="" class="receipt__form" method="post">
                  <div  class="receipt__form">
                    <div class="form-group">
                      <label for="form__receipt--LoaiSP" >Loại sản phẩm:</label>
                      <select id="form__receipt--LoaiSP" name="receiptLoaiSp" >
                      <?php foreach($list_loaisp as $loaisp): ?>
                        <option value="<?= $loaisp['MaLoai']?>" > <?= $loaisp['TenLoai'] ?></option>
                        <?php endforeach; ?>
                      </select> 
                    </div>
                    <div id="LoaiSp-error" class="error-message"></div>

                    <div class="form-group">
                      <label for="form__receipt--MaSP">Mã sản phẩm:</label>
                    
                      <input type="text" id="form__receipt--MaSP" name="receipt--MaSP" >

                    </div>
                    <div id="MaSP-error" class="error-message"></div>

                    <div class="form-group">
                      <label for="form__receipt--TenSP">Tên sản phẩm:</label>
                      <input type="text" id="form__receipt--TenSP" name="receipt--TenHang" >
                    </div>
                    <div id="TenSp-error" class="error-message"></div>

                    <div class="form-group">
                      <label for="form__receipt--Price">Giá:</label>
                      <input type="text" id="form__receipt--Price" name="receipt--price" >
                    </div>
                    <div id="GiaSp-error" class="error-message"></div>

                    <div class="form-group">
                        <label for="file-upload" class="form__receipt--img">Chọn hình ảnh:</label>
                        <div class="image-container">
                            <input type="file" id="file-upload" name="file-upload" accept="image/*" style="display: none;">
                            <img id="selected-image" src="uploads/default.jpg" alt="Chọn ảnh" style="max-width: 200px; height: auto; cursor: pointer; display: block;">
                        </div>
                    </div>

                
                    <div id="ImageSp-error" class="error-message"></div>
                  </form>
                      </div>
                </div>
              <div class="button__container--receipt">
                <button type="button" class="customer__form--add1" id="add-btn1">Thêm</button>
              </div>
              <table id="table_product">
    <thead>
        <tr>
            <th class="table--top">Loại</th>
            <th class="table--top">Mã SP</th>
            <th class="table--top">Hình ảnh</th>
            <th class="table--top">Tên Sản Phẩm</th>
            <th class="table--top">Đơn giá</th>
            <th class="table--top">Số lượng</th> 
            <th class="table--top">Sửa</th>
            <th class="table--top">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (!empty($list_product)) {
            foreach ($list_product as $row) { 
              ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['MaLoai']); ?></td>
                    <td><?php echo htmlspecialchars($row['MaHang']); ?></td>
                    <td class="product-image-container">
                        <img class="product-image" src="<?= !empty($row['Hinhanh']) ? htmlspecialchars($row['Hinhanh']) : 'uploads/default.jpg' ?>" 
                            style="max-width: 100px; height: auto;">
                    </td>
                    <td class="product-name-column"><?php echo htmlspecialchars($row['TenHang']); ?></td>
                    <td><?php echo number_format($row['DonGia'], 0, '', '.') . " VND"; ?></td>
                    <td><?php echo htmlspecialchars($row['SoLuong']); ?></td>
                    <td>
                        <button class="discount__form--change edit-btn" id="<?php echo htmlspecialchars($row['MaHang']); ?>">Sửa</button>
                    </td>

                    <td>
                      <button class="discount__form--add" onclick="Delete('<?php echo htmlspecialchars($row['TenHang']); ?>', 'index.php?controller=sanpham&action=deleteProduct&MaHang=<?php echo htmlspecialchars($row['MaHang']); ?>')">
                          Xóa
                      </button>
                  </td>

                </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='8'>Không có sản phẩm nào.</td></tr>";
        }
        ?>
    </tbody>
</table>
            <div class="pagination">
                <?php 
                $range = 1; 
                $start = $currentPage - $range;
                $end = $currentPage + $range;

                $start = max($start, 1);
                $end = min($end, $totalPages);  

                if ($currentPage > 1): ?>
                    <li class="page-item">
                        <a href="index.php?controller=sanpham&action=index&page=<?= $currentPage - 1 ?>" class="page-link1">
                            <i class="fa-solid fa-circle-left"></i>
                        </a>
                    </li>
                <?php endif;

                if ($start > 1) echo "<li class='page-item'>...</li>";

                for ($i = $start; $i <= $end; $i++): ?>
                    <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                        <a href="index.php?controller=sanpham&action=index&page=<?= $i ?>" class="page-link"><?= $i ?></a>
                    </li>
                <?php endfor;

                if ($end < $totalPages) echo "<li class='page-item'>...</li>";

                if ($currentPage < $totalPages): ?>
                    <li class="page-item1">
                        <a href="index.php?controller=sanpham&action=index&page=<?= $currentPage + 1 ?>" class="page-link1">
                            <i class="fa-solid fa-circle-right"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </div>
                        </div>
                </div>
            </div>
          </div>
          <?php
              if($_GET['controller']=='sanpham'){
                echo '<script>var a = document.getElementById("link_Product");
                a.style.backgroundColor = "lightgray";</script>';
              }
          ?>
        
        </div>
</body>
