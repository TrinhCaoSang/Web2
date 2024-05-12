<?php 
    // session_start();
    ob_start();
?>
<head>
    <title>Trek - Quản lý cửa hàng</title>
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/Web2/public/style.css">
    <link rel="stylesheet" href="/Web2/public/components/HomeAdmin/HomeAdmin.css">
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/AdminProduct.css">
    <link rel="stylesheet" href="/Web2/public/components/ManageUserList/ManageUserList.css" />
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/adminProduct.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/Web2/app/views/admin/showView_Sanpham.js"></script>
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
          <button>
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>Đăng xuất</p>
          </button>
        </div>
      </div>
      <div class="admin__content--header">
        <form action="">
        <!-- <div class="admin__content--header__search">
          <button type="button" id="btnSubmit">
                    <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          <div>
          </form>
            
          </div>
        </div> -->
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
            <!--  NEW CODE ! -->
               <!-- Sản phẩm -->
              
               <div class="admin-product" id="manageProduct">
                <div class = "product_content--top">
                <h1 class="receipt__title">QUẢN LÝ SẢN PHẨM</h1>
                <form action="" class="receipt__form" method="post">
                <div  class="receipt__form">
                  <div class="form-group">
                    <label for="form__receipt--LoaiSP" >Loại sản phẩm:</label>
                    <select id="form__receipt--LoaiSP" name="receipt--LoaiSP" >
                    <?php foreach($list_loaisp as $loaisp): ?>
                      <option value="<?= $loaisp['MaLoai']?>" > <?= $loaisp['TenLoai'] ?></option>
                      <?php endforeach; ?>
                    </select> 
                  </div>
                  <div id="LoaiSp-error" class="error-message"></div>

                  <div class="form-group">
                    <label for="form__receipt-MaSP">Mã sản phẩm:</label>
                  
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
                  <label for="form__receipt--img" class="form__receipt--img">Chọn hình ảnh:</label>
                    <div class="image-container">
                      <label for="file-upload" class="custom-file-upload">
                        <!-- <span>Chọn hình ảnh</span> -->
                      </label>
                      <img id="selected-image" src="#" alt="Preview Image" style="display: none;">
                    </div>
                    <div id="ImageSp-error" class="error-message"></div>
                  </div>
                  <input id="file-upload" type="file"  onchange="previewImage(event)">
                </form>
              <div class="button__container--receipt">
                <button type="button" class="customer__form--add1" id="add-btn1">Thêm</button>
                <button type="button" class="customer__form--add2" id="add-btn2">Reset</button>            
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
                        <tr>
                          <tbody>
                            <?php 
                                
                                  $model = new ModelSanpham();
                                  $conn = $model->connect();

                                  
                                  $page = isset($_GET['page']) ? $_GET['page'] : 1; 
                                  $itemsPerPage = 5; 
                                  $totalProducts = $this->product->getTotalProducts(); 
                                  $maxPage = ceil($totalProducts / $itemsPerPage);
                                  
                                  $offset = ($page - 1) * $itemsPerPage;
                                  
                                  $sql = "SELECT mathang.*, loaihang.TenLoai 
                                          FROM mathang 
                                          LEFT JOIN loaihang ON mathang.MaLoai = loaihang.MaLoai 
                                          LIMIT $itemsPerPage OFFSET $offset"; 
                                  $result = $model->execute($sql);
                                
                                if ($model->num_rows() > 0) {
                                  while($row = $model->getData() ){
                            ?>
                           <td><?php echo $row['TenLoai'] ;?></td>
                           <td><?php echo $row['MaHang'] ;?></td>
                           
                           
                           <td class="product-image-container">
                           <?php
                                $imageData = base64_encode($row['Hinhanh']);
                                echo '<img class="product-image" src="data:image/jpeg;base64,'.$imageData.'" alt="Product Image">';
                            ?>
                           </td>
                           



                           <td class="product-name-column"><?php echo $row['TenHang'] ;?></td>
                           <td><?php echo number_format($row['DonGia'], 0, '', '.')." VND";?></td>
                           <td><?php echo $row['SoLuong'] ;?></td>
                           <td>
                               <a href=""><button type="submit" class="discount__form--change" id="change">Sửa</button></a>
        
                           </td>
                           <td >
                               <a href="index.php?controller=sanpham&action=deleteProduct&MaHang=<?php echo $row['MaHang'];?>" onclick="return Delete('<?php echo $row['MaHang']; ?>')"><button class="discount__form--add">Xóa</button></a>
                           </td>
                        </tr>
                        <?php 
                          }
                          }
                        ?>
                        </tbody>
                      </table>
                         


                      <div class="pagination">
                          <?php 
                          $range = 1; 
                          $start = $page - $range;
                          $end = $page + $range;

                          $start = max($start, 1);
                          $end = min($end, $maxPage);

                          if ($page > 1): ?>
                              <li class="page-item"><a href="index.php?controller=sanpham&action=index&page=<?= $page - 1 ?>" class="page-link1"><i class="fa-solid fa-circle-left"></i></a></li>
                          <?php endif;

                          if ($start > 1) echo "<li class='page-item'>...</li>";

                          for ($i = $start; $i <= $end; $i++): ?>
                              <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a href="index.php?controller=sanpham&action=index&page=<?= $i ?>" class="page-link"><?= $i ?></a></li>
                          <?php endfor;

                          if ($end < $maxPage) echo "<li class='page-item'>...</li>";

                          if ($page < $maxPage): ?>
                              <li class="page-item1"><a href="index.php?controller=sanpham&action=index&page=<?= $page + 1 ?>" class="page-link1"><i class="fa-solid fa-circle-right"></i></a></li>
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
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
          <script>
          function Delete(name){
             return confirm("Bạn có chắc muốn xóa sản phẩm này : "+ name + " ?");
         }

         function previewImage(event) {
            var selectedImage = document.getElementById('selected-image');
            selectedImage.style.display = 'inline-block'; 

            var reader = new FileReader();
            reader.onload = function(){
                selectedImage.src = reader.result; 
            };
            reader.readAsDataURL(event.target.files[0]);
        }     
        document.getElementById('selected-image').onclick = function() {
            document.getElementById('file-upload').click();
        };
        $(document).ready(function() {
            handlePaginationClick();

            function handlePaginationClick() {
                $('.pagination a').off('click').on('click', function(e) {
                    e.preventDefault();
                    var pageUrl = $(this).attr('href');

                    $.ajax({
                        url: pageUrl,
                        type: 'GET',
                        success: function(response) {
                            var newTable = $(response).find('#table_product').html();
                            $('#table_product').empty().html(newTable);
                            var newPagination = $(response).find('.pagination').html();
                            $('.pagination').empty().html(newPagination);
                            handlePaginationClick();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            }
        });
    document.querySelector('.customer__form--add1').addEventListener('click', function(event) {
          event.preventDefault(); 
          var Loaisp = document.getElementById('form__receipt--LoaiSP').value;
          var Masp = document.getElementById('form__receipt--MaSP').value;
          var TenSp = document.getElementById('form__receipt--TenSP').value;
          var GiaSP = document.getElementById('form__receipt--Price').value;
          var ImageSP = document.getElementById('file-upload').value;


          if (Loaisp.trim() === '') {
              document.getElementById('LoaiSp-error').textContent = '*Chưa nhập loại sản phẩm!';
              document.getElementById('LoaiSp-error').style.display = 'block';
              return;
          }
          if(Masp.trim() == ''){
            document.getElementById('MaSP-error').textContent = '*Chưa nhập mã sản phẩm!';
            document.getElementById('MaSP-error').style.display = 'block';
            return;
          }
          if(TenSp.trim() == ''){
            document.getElementById('TenSp-error').textContent = '*Chưa nhập tên sản phẩm!';
            document.getElementById('TenSp-error').style.display = 'block';
            return;
          }
          if(GiaSP.trim() == ''){
            document.getElementById('GiaSp-error').textContent = '*Chưa nhập giá sản phẩm!';
            document.getElementById('GiaSp-error').style.display = 'block';
            return;
          }
          if(ImageSP.trim() == ''){
            document.getElementById('ImageSp-error').textContent = '*Chưa chọn hình ảnh!';
            document.getElementById('ImageSp-error').style.display = 'block';
            return;
          }


          
          alert('Đã thêm sản phẩm mới thành công!');
          setTimeout(function(){
              window.location.reload();
          }, 500);
          fetch('index.php?controller=sanpham&action=addSanpham', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
              },
              body: 'receipt--MaSP=' + Masp + '&receipt--LoaiSP=' + Loaisp  + '&file-upload=' + ImageSP + '&receipt--TenHang=' + TenSp + '&receipt--price=' + GiaSP 
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
document.getElementById('form__receipt--LoaiSP').addEventListener('input', function() {
    var LoaispVal = this.value;
    

    if (LoaispVal.trim() !== '') {
        document.getElementById('LoaiSp-error').style.display = 'none';
    } else {
        document.getElementById('LoaiSp-error').textContent = '*Chưa nhập loại sản phẩm!';
        document.getElementById('LoaiSp-error').style.display = 'block';
    }

});
document.getElementById('form__receipt--MaSP').addEventListener('input', function() {
  var MaSpValue = this.value;
  if (MaSpValue.trim() !== '') {
            document.getElementById('MaSP-error').style.display = 'none';
  } else {
            document.getElementById('MaSP-error').textContent = '*Chưa nhập mã sản phẩm!';
            document.getElementById('MaSP-error').style.display = 'block';
        }
});
document.getElementById('form__receipt--TenSP').addEventListener('input', function() {
  var tenSpValue = this.value;
  if (tenSpValue.trim() !== '') {
            document.getElementById('TenSp-error').style.display = 'none';
  } else {
            document.getElementById('TenSp-error').textContent = '*Chưa nhập tên sản phẩm!';
            document.getElementById('TenSp-error').style.display = 'block';
        }
});
document.getElementById('form__receipt--Price').addEventListener('input', function() {
  var GiaSPVal = this.value;
  if (GiaSPVal.trim() !== '') {
            document.getElementById('GiaSp-error').style.display = 'none';
  } else {
            document.getElementById('GiaSp-error').textContent = '*Chưa nhập giá sản phẩm!';
            document.getElementById('GiaSp-error').style.display = 'block';
        }
});
document.getElementById('file-upload').addEventListener('input', function() {
  var ImageSp = this.value;
  if (ImageSp.trim() !== '') {
            document.getElementById('ImageSp-error').style.display = 'none';
  } else {
            document.getElementById('ImageSp-error').textContent = '*Chưa chọn hình ảnh sản phẩm!';
            document.getElementById('ImageSp-error').style.display = 'block';
        }
});
          </script>
        </div>

        </div>
</body>
