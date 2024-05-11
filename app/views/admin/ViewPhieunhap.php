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
    <!-- <script src="/Web2/app/views/admin/show_ViewPN.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/Web2/app/views/admin/admin.js"></script>

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
            <a href="" id="link_staff">
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
        <!-- <div class="hr"></div> -->

        <div class="admin__taskbar--footer">
          <button>
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>Đăng xuất</p>
          </button>
        </div>
      </div>
      <div class="admin__content--header">
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
                <!-- <label id="maPN-error" style="color:red;font-size:10pt;"></label> -->
                <div id="maPN-error" class="error-message"></div>
              </form>
              <div class="button__container--receipt">
                <button type="button" class="customer__form--add1" id="add-btn1">Thêm</button>
                <button type="button" class="customer__form--add2" id="add-btn2">Thêm chi tiết</button>
              </div>
              
            </div>
            <table id="phieunhap-table" >
              <thead>
              <tr>
                <th class="table--top">STT</th>
                <th class="table--top">Mã phiếu nhập</th>
                
                <th class="table--top">Tổng giá trị</th>
                <th class="table--top">Ngày nhập</th>
                
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
                <td class="text__align--left"><?php echo number_format($row['ThanhTienPN'], 0, '', '.')." VND";?></td>                

                <td class="text__align--left"><?php echo $row['NgayNhapFormatted']; ?></td>
                
                

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
    
    var ngayNhap = getCurrentDate(); 

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
    swal("Good job!", "Thêm phiếu nhập thành công!", "success");
    setTimeout(function(){
        window.location.reload();
        swal.close();
    }, 5000);
    fetch('index.php?controller=phieunhap&action=addPhieuNhap', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'receipt=' + maPN + '&ngayNhap=' + ngayNhap  
    })
    .then(response => response.json())
    .then(data => {        
        if (data.success) {
            alert(data.message + '1');
            
        } else {
            alert(data.message,"error");
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });

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
</html>