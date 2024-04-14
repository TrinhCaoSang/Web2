<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trek - Quản lý cửa hàng</title>
    <link rel="stylesheet" href="/Web2/public/components/HomeAdmin/HomeAdmin.css">
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/AdminProduct.css">
    <link rel="stylesheet" href="/Web2/public/components/ManageUserList/ManageUserList.css" />
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/adminProduct.css" />
    <script src="/Web2/app/views/admin/show_ViewPN.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
  <body>
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
            



              <form action="" class="receipt__form" method="post">
                <div class="form-group">
                  <label for="form__receiptId">Mã phiếu nhập:</label>
                  <input type="text" id="form__receipt" name="receipt" >
                </div>
                <div id="maPN-error" class="error-message"></div>
                <div class="form-group">
                  <label for="form__receipt--NCC">Mã nhà cung cấp:</label>
                  <select id="form__receipt--MANCC" name="receipt--NCC">
                         <?php foreach($list_ncc as $ncc): ?>
                         <option value="<?= $ncc['MaNCC'] ?>"><?= $ncc['MaNCC'] ?></option>
                         <?php endforeach; ?>
                 </select>
                </div>

                <div class="form-group">
                  <label for="form__receipt--TENNCC">Tên nhà cung cấp:</label>
                  <input type="text" id="form__receipt--TENNCC" name="receipt--TENCC"  disabled>
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
                        $list_maHang = $this->coupon->getAllMathang(); 
                        foreach($list_maHang as $maHang) {
                        echo "<option value='{$maHang['MaHang']}'>{$maHang['MaHang']}</option>";
                  }
                  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="form__receipt--TenSP">Tên sản phẩm:</label>
                  <input type="text" id="form__receipt--TenSP" name="receipt--LoaiSP" disabled>
                </div>
                <div class="form-group">
                  <label for="form__receipt--Gia">Giá:</label>
                  <input type="text" id="form__receipt--Gia" name="receipt--gia" disabled>
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
                <button type="button" class="customer__form--add1" id="add-btn1">Thêm</button>
                <button type="button" class="customer__form--add2" id="add-btn2">Xem chi tiết</button>
              </div>
              
            </div>
            <table id="phieunhap-table" >
              <thead>
              <tr>
                <th class="table--top">STT</th>
                <th class="table--top">Mã phiếu nhập</th>
                <!-- <th class="table--top">Mã nhà cung cấp</th> -->
                <th class="table--top">Tổng giá trị</th>
                <th class="table--top">Ngày nhập</th>
                <th class="table--top">Sửa</th>
                <th class="table--top">Xóa</th>
              </tr>
              </thead>
              <tbody>
                <?php 
                    $model = new ModelPhieunhap();
                    $conn = $model->connect();
                    $sql = "SELECT * FROM phieunhap";
                    $sql = "SELECT *, DATE_FORMAT(NgayNhap, '%d/%m/%Y') AS NgayNhapFormatted FROM phieunhap";
                    $result = $model->execute($sql);
                    
                    if ($model->num_rows() > 0) {
                      $i = 1;
                      while($row = $model->getData()){
                ?>
              <tr>
                <td ><?php echo $i; ?></td>
                <td ><?php echo $row['MaPN'] ;?></td>
                <!-- <td class="text__align--left"><?php echo $row['MaNCC']; ?></td> -->

                <td class="text__align--left"><?php echo $row['ThanhTienPN'] . '.VND';?></td>
                <td class="text__align--left"><?php echo $row['NgayNhapFormatted']; ?></td>
                
                <td>
                      <a href="index.php?controller=phieunhap&action=editPN&id=<?php echo $row['MaPN'];?>"><button class="btn btn-edit">Sửa</button></a>
                </td>

                <td>
                  <a onclick="return Del('<?php echo $row['MaPN']; ?>')" href="index.php?controller=phieunhap&action=deletePN&id=<?php echo $row['MaPN'];?>"><button class="btn btn-delete">Xóa</button></a>
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




<script >
  document.getElementById('add-btn2').addEventListener('click', function() {
    window.location.href = 'index.php?controller=ctpn&action=index';
});

  document.querySelector('.customer__form--add1').addEventListener('click', function(event) {
    event.preventDefault(); 
    var maPN = document.getElementById('form__receipt').value;
    var maNCC = document.getElementById('form__receipt--MANCC').value;
    var maHang = document.getElementById('form__receipt--MaSP').value;
    var TenHang =document.getElementById('form__receipt--TenSP').value;
    var donGiaPN = document.getElementById('form__receipt--Gia').value;
    var tenNCC =document.getElementById('form__receipt--TENNCC').value;
    var ngayNhap = getCurrentDate(); 
    var soLuong = document.getElementById('form__receipt--soluong').value;
    var thanhTien = document.getElementById('form__receipt--tong').value;

    var maPNPattern = /^[PN]{2}\d{2}$/; // Mẫu yêu cầu: 2 chữ cái và sau đó là 2 số

    if (maPN.trim() === '') {
        document.getElementById('maPN-error').textContent = '*Mã Phiếu nhập không được để trống!';
        document.getElementById('maPN-error').style.display = 'block';
        return;
    }

    if (!maPNPattern.test(maPN)) {
        document.getElementById('maPN-error').textContent = '*Mã Phiếu nhập không hợp lệ';
        document.getElementById('maPN-error').style.display = 'block';
        
        return;
    }
    if (soLuong.trim() === '') {
        document.getElementById('soLuong-error').textContent = '*Bạn chưa nhập số lượng';
        document.getElementById('soLuong-error').style.display = 'block';
        return;
    }
    if (parseInt(soLuong) === 0) {
        document.getElementById('soLuong-error').textContent = '*Số lượng phải lớn hơn 0 !';
        document.getElementById('soLuong-error').style.display = 'block';
        return;
    }
    if (parseInt(soLuong) < 0) {
        document.getElementById('soLuong-error').textContent = '*Số lượng không được âm !';
        document.getElementById('soLuong-error').style.display = 'block';
        return;
    
    }
    alert('Đã thêm phiếu nhập mới thành công!');
    setTimeout(function(){
        window.location.reload();
    }, 500);
    fetch('index.php?controller=phieunhap&action=addPhieuNhap', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'receipt=' + maPN + '&receipt--NCC=' + maNCC +'&receipt--TENCC='+ tenNCC +'&receipt--MASP=' + maHang +'&receipt--LoaiSP='+ TenHang +'&ngayNhap=' + ngayNhap + '&receipt--gia=' + donGiaPN + '&receipt--soluong=' + soLuong + '&receipt--tong=' + thanhTien
    })
    .then(response => response.json())
    .then(data => {        
        if (data.success) {
            alert(data.message);
            
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });

});

document.getElementById('form__receipt--soluong').addEventListener('input', function() {
    var soLuongValue = this.value;
    if (soLuongValue.trim() !== '') {
        if (parseInt(soLuongValue) === 0) { // Kiểm tra nếu số lượng là 0 hoặc âm
            document.getElementById('soLuong-error').textContent = '*Số lượng phải lớn hơn 0!';
            document.getElementById('soLuong-error').style.display = 'block';
        } 
        else if(parseInt(soLuongValue) < 0){
            document.getElementById('soLuong-error').textContent = '*Số lượng không được là số âm!';
            document.getElementById('soLuong-error').style.display = 'block';
        }
        else {
            document.getElementById('soLuong-error').style.display = 'none';
        }
    } else {
        document.getElementById('soLuong-error').textContent = '*Bạn chưa nhập số lượng';
        document.getElementById('soLuong-error').style.display = 'block';
    }
});

document.getElementById('form__receipt').addEventListener('input', function() {
    var maPNValue = this.value;
    if (maPNValue.trim() !== '') {
        document.getElementById('maPN-error').style.display = 'none';
    } else {
        document.getElementById('maPN-error').textContent = '*Mã Phiếu nhập không được để trống!';
        document.getElementById('maPN-error').style.display = 'block';
    }
});
 function Del(name){
   return confirm("Bạn có chắc muốn xóa mã phiếu nhập: "+ name + " ?");
 }



 function changeURL() {
            var newUrl = "http://localhost/Web2/index.php?controller=phieunhap&action=insert"; // Đường dẫn URL mới
            window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }

        function changeURL2(){
          var newUrl = "http://localhost/Web2/index.php?controller=phieunhap&action=save"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }


</script>
</body>
</html>