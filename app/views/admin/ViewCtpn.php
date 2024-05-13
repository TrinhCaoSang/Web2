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
                    $model = new ModelCtpn();
                    $conn = $model->connect();
                    $sql = "SELECT * FROM ctpn";
                     $sql = "SELECT * FROM ctpn ORDER BY MaPN ASC";
                    $result = $model->execute($sql);
                    
                    if ($model->num_rows() > 0) {
                        $i = 1;
                      while($row = $model->getData()){
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="/Web2/app/views/admin/show_CTPN.js"></script>
      <script>
          function Delete(name){
              return confirm("Bạn có chắc muốn xóa chi tiết phiếu nhập: "+ name + " ?");
          }
          document.getElementById('add-btn4').addEventListener('click', function() {
               window.location.href = 'index.php?controller=phieunhap&action=index';
          });


  $('.customer__form--add').on('click', function(event) {

    event.preventDefault(); 
    
    var maPN = $('#form__receipt').val();
    var maNCC = $('#form__receipt--MANCC').val();
    var maHang = $('#form__receipt--MaSP').val();
    var TenHang = $('#form__receipt--TenSP').val();
    var donGiaPN = $('#form__receipt--Price').val();
    var tenNCC = $('#form__receipt--NAMENCC').val();
    var soLuong = $('#form__receipt--soluong').val();
    var thanhTien = $('#form__receipt--tong').val();

    if (soLuong.trim() === '') {
        $('#soLuong-error').text('*Bạn chưa nhập số lượng');
        $('#soLuong-error').css('display', 'block');
        return;
    }
    if (parseInt(soLuong) === 0) {
        $('#soLuong-error').text('*Số lượng phải lớn hơn 0 !');
        $('#soLuong-error').css('display', 'block');
        return;
    }
    if (parseInt(soLuong) < 0) {
        $('#soLuong-error').text('*Số lượng không được âm !');
        $('#soLuong-error').css('display', 'block');
        return;
    }
    
    alert('Đã thêm phiếu nhập mới thành công!');
    setTimeout(function(){
        window.location.reload();
    }, 500);

    $.ajax({
        url: 'index.php?controller=ctpn&action=addCTPN',
        method: 'POST',
        data: {
            receipt: maPN,
            'receipt--NCC': maNCC,
            'receipt--NAMENCC': tenNCC,
            'receipt--MASP': maHang,
            'receipt--TenHang': TenHang,
            'receipt--price': donGiaPN,
            'receipt--soluong': soLuong,
            'receipt--tong': thanhTien
        },
        success: function(data) {
            if (data.success) {
                alert(data.message);
                updateSTT();
            } else {
                alert(data.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});

$('#form__receipt--soluong').on('input', function() {
    var soLuongValue = $(this).val();
    if (soLuongValue.trim() !== '') {
        if (parseInt(soLuongValue) === 0) {
            $('#soLuong-error').text('*Số lượng phải lớn hơn 0!');
            $('#soLuong-error').css('display', 'block');
        } else if(parseInt(soLuongValue) < 0){
            $('#soLuong-error').text('*Số lượng không được là số âm!');
            $('#soLuong-error').css('display', 'block');
        } else {
            $('#soLuong-error').css('display', 'none');
        }
    } else {
        $('#soLuong-error').text('*Bạn chưa nhập số lượng');
        $('#soLuong-error').css('display', 'block');
    }
});

$(document).on("click" ,".btn-edit", function(){
    var data_ctpn = $(this).attr("id");
    edit_CTPN(data_ctpn);
  });
  function edit_CTPN(ctpn){
    $.ajax({
        url: "index.php?controller=ctpn&action=editCTPN",
        method: 'POST',
        data: {
            ctpn: ctpn
        },
        success:function(data){
            $("#form_ctpn").html(data);
            $('#add-btn').removeClass('customer__form--add').addClass('customer__form--update').attr('id', 'update-btn');
            $('#update-btn').text('Cập nhật');
            $('#update-btn').off('click').on('click', btnUPDATE);
        },
        error: function(xhr,status,error){
            console.error("Error: ", error);
        }
    });
}


function btnUPDATE(event) {
         event.preventDefault();

          
          var MaPN = $('#form__receipt').val();
          var MaNCC = $('#form__receipt--MANCC').val();
          var MaHang = $('#form__receipt--MaSP').val();
          var TenHang = $('#form__receipt--TenSP').val();
          var DonGiaPN = $('#form__receipt--Price').val();
          var TenNCC = $('#form__receipt--NAMENCC').val();
          var SoLuong = $('#form__receipt--soluong').val();
          var ThanhTienCTPN = $('#form__receipt--tong').val();


          if (SoLuong.trim() === '') {
              $('#soLuong-error').text('*Bạn chưa nhập số lượng');
              $('#soLuong-error').css('display', 'block');
              return;
          }
          if (parseInt(SoLuong) === 0) {
              $('#soLuong-error').text('*Số lượng phải lớn hơn 0 !');
              $('#soLuong-error').css('display', 'block');
              return;
          }
          if (parseInt(SoLuong) < 0) {
              $('#soLuong-error').text('*Số lượng không được âm !');
              $('#soLuong-error').css('display', 'block');
              return;
          }
    
          alert('Đã cập nhật phiếu nhập thành công!');
          setTimeout(function(){
              window.location.reload();
          }, 500);


    $.ajax({
        url: 'index.php?controller=ctpn&action=updateCTPN',
        method: 'POST',
        data: {
            receipt: MaPN,
            'receipt--NCC': MaNCC,
            'receipt--NAMENCC': TenNCC,
            'receipt--MASP': MaHang,
            'receipt--TenHang': TenHang,
            'receipt--price': DonGiaPN,
            'receipt--soluong': SoLuong,
            'receipt--tong': ThanhTienCTPN
        },
        success: function(data){
              console.log(data); 
              if(data && data.success){
                  alert(data.message);
              } else {
                  alert("Có lỗi xảy ra khi cập nhật dữ liệu: " + data.message); 
              }
          },
        error: function(xhr, status, error){
            console.error(error);
        }
    });
  }


      </script>
</div>
</body>
</html>