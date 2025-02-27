<head>
    <title>Trek - Quản lý cửa hàng</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Web2/public/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="/Web2/public/components/fonts.css">
    <link rel="stylesheet" href="/Web2/public/style.css">
    <link rel="stylesheet" href="/Web2/public/components/HomeAdmin/HomeAdmin.css">
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/AdminProduct.css">
    <link rel="stylesheet" href="/Web2/public/components/ManageUserList/ManageUserList.css" />
    <link rel="stylesheet" href="/Web2/public/components/AdminProduct/adminProduct.css" />
    <script src="/Web2/app/views/admin/Interface(JS)/admin.js"></script>
<head>
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
            <a href="index.php?controller=khuyenmai&action=index" id="link_Promotions" style="border-radius: 10px;">
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

        <!-- <div class="hr"></div> -->
<hr>
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
            <div class="admin__content--body__content">
                <div class="admin__content--statistics__content" id="statisticsContent">
                    <!-- Phần khuyến mãi-->
                    <div class="admin__content--discount__content" id="promotionsContent">
                    <div class="discount__content--top">
                        <h1 class="discount__title">QUẢN LÝ MÃ KHUYẾN MÃI</h1>
                          <?php
                            if(isset($_GET['action'])&&$_GET['action']=="index"||$_GET['action']=="insert"){
                                echo '
                                <form class="discount__form" method="POST">
                                <div class="form-group">
                                    <label for="form__discountId">Mã khuyến mãi:</label>
                                    <input type="text" id="form__discountId" name="discountId">
                                </div>
                                <div class="form-group">
                                    <label for="form__programName">Tên chương trình:</label>
                                    <input type="text" id="form__programName" name="programName">
                                </div>
                                <div class="form-group">
                                    <label for="form__percentageReduction">Phần trăm giảm:</label>
                                    <input type="text" id="form__percentageReduction" name="percentageReduction">
                                </div>
                                <div class="form-group">
                                    <label for="form__costCondition">Điều kiện (>x):</label>
                                    <input type="text" id="form__costCondition" name="costCondition">
                                </div>
                                <div class="form-group">
                                    <label for="form__dayStart">Ngày bắt đầu:</label>
                                    <input type="date" id="form__dayStart" name="dayStart">
                                </div>
                                <div class="form-group">
                                    <label for="form__dayEnd">Ngày kết thúc:</label>
                                    <input type="date" id="form__dayEnd" name="dayEnd">
                                </div>
                                <div class="button__container">
                                  <input type="submit" name="add_khuyenmai" value="Thêm" class="discount__form--add" onclick="changeURL()">
                                </div>
                                </form>
                                ';

                              }
                              elseif(isset($_GET['action'])&&$_GET['action']=="edit"&&isset($_GET['id'])){
                              ?>
                              <form class="discount__form" method="POST">
                              <div class="form-group">
                                  <label for="form__discountId">Mã khuyến mãi:</label>
                                  <input type="text" id="form__discountId" name="discountId" value="<?php echo $dataID['MaKM'];?>">
                              </div>
                              <div class="form-group">
                                  <label for="form__programName">Tên chương trình:</label>
                                  <input type="text" id="form__programName" name="programName" value="<?php echo $dataID['TenCT'];?>">
                              </div>
                              <div class="form-group">
                                  <label for="form__percentageReduction">Phần trăm giảm:</label>
                                  <input type="text" id="form__percentageReduction" name="percentageReduction" value="<?php echo $dataID['PhanTramGG'];?>">
                              </div>
                              <div class="form-group">
                                  <label for="form__costCondition">Điều kiện (>x):</label>
                                  <input type="text" id="form__costCondition" name="costCondition" value="<?php echo $dataID['dieukien'];?>">
                              </div>
                              <div class="form-group">
                                  <label for="form__dayStart">Ngày bắt đầu:</label>
                                  <input type="date" id="form__dayStart" name="dayStart" value="<?php echo $dataID['NgayBDKM'];?>">
                              </div>
                              <div class="form-group">
                                  <label for="form__dayEnd">Ngày kết thúc:</label>
                                  <input type="date" id="form__dayEnd" name="dayEnd" value="<?php echo $dataID['NgayKTKM'];?>">
                              </div>
                              <div class="button__container">
                                <input type="submit" name="save" value="Lưu" class="discount__form--add" onclick="changeURL2()">
                              </div>
                              </form>
                            <?php
                            }
                            ?>
                    </div>
                    <table>
                        <tr>
                        <th class="table--top">Mã khuyến mãi</th>
                        <th class="table--top">Chương trình</th>
                        <th class="table--top">Phần trăm KM</th>
                        <th class="table--top">Điều kiện (&ge;x)</th>
                        <th class="table--top">Ngày băt đầu</th>
                        <th class="table--top">Ngày kết thúc</th>
                        <th class="table--top">Tình trạng</th>
                        <th class="table--top">Chức năng</th>
                        <th class="table--top">Chi tiết</th>
                        </tr>
                        
                        <?php
                          //include('\app\controllers\ControllerKhuyenMai.php');
                          foreach($data as $value){
                        ?>
                          <tr>
                          <th><?php echo $value['MaKM'];?></th>
                          <th class="text__align--left"><?php echo $value['TenCT'];?></th>
                          <th><?php echo $value['PhanTramGG'];?></th>
                          <th><?php echo number_format($value['dieukien']) . " VNĐ";?></th>
                          <th><?php echo $value['NgayBDKM'];?></th>
                          <th><?php echo $value['NgayKTKM'];?></th>
                          <th class="text__align--left"><?php if(ControllerKhuyenMai::checkTinhTrang($value)==1){
                            echo 'Còn hiệu lực';
                          }
                          elseif(ControllerKhuyenMai::checkTinhTrang($value)==0){
                            echo 'Hết hiệu lực';
                          };
                          ?></th>
                          <th>
                            <div class="button__container">
                              <a onclick="return confirm('Bạn có chắc chắn muốn sửa không?')" href="index.php?controller=khuyenmai&action=edit&id=<?php echo $value['MaKM'];?>"><button class="discount__form--change">Sửa</button></a>
                              <!-- <button class="discount__form--add">Sửa</button> -->
                              <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?controller=khuyenmai&action=delete&id=<?php echo $value['MaKM'];?>"><button class="discount__form--change" style="background-color: orange;">Xóa</button></a>
                            </div>
                          </th>
                          <th class="text__align--left" id="xemchitiet" value-data="<?php echo $value['MaKM']   ?>" style="text-decoration: underline;color: rgb(115, 198, 0);" onclick="show_bill()">Xem chi tiết</th>
                          </tr>
                        <?php
                          };
                        ?>
                    </table>
                    </div>
                    </div>
                    <?php
                      if($_GET['controller']=='khuyenmai'){
                        echo '<script>var a = document.getElementById("link_Promotions");
                        a.style.backgroundColor = "lightgray";</script>';
                      }

                    ?>
                    
                <div class="bill--model--ctpn" id="model--bill" style="display: none;">
                  <div class="bill_content--model--ctpn" style="height: 30vh;">
                    <button class="close" onclick="close_bill()">×</button>
                    <h1 class="bill__title">CHI TIẾT KHUYẾN MÃI</h1>
                    <table>
                      <tr>
                        <th class="table--top">Mountain</th>
                        <th class="table--top">Road</th>
                        <th class="table--top">Kids</th>
                        <th class="table--top">Touring</th>
                      </tr>
                      <tr>
                        <th><input type="checkbox" id="checkbox_mt"></th>
                        <th><input type="checkbox" id="checkbox_rd"></th>
                        <th><input type="checkbox" id="checkbox_kid"></th>
                        <th><input type="checkbox" id="checkbox_tr"></th>
                      </tr>
                    </table>
                    <button id="luu" value="makm">Lưu</button>
                  </div>
                </div> 
              </div>
            </div>
        </div>
      </div>
     

</div>
<script>
  function close_bill() {
    document.getElementById("model--bill").style.display = "none";
  }
  function show_bill() {
    document.getElementById("model--bill").style.display = "flex";
  }
  function changeURL() {
      var newUrl = "http://localhost/Web2/index.php?controller=khuyenmai&action=insert"; // Đường dẫn URL mới
      window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
  }

  function changeURL2(){
    var newUrl = "http://localhost/Web2/index.php?controller=khuyenmai&action=save"; // Đường dẫn URL mới
    window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
  }

  $(document).ready(function(){
    $(document).on('click', '#xemchitiet',function(){ 
        var value = $(this).attr('value-data');
        //Gửi dữ liệu đến tệp PHP bằng Ajax
          $.ajax({
              url: 'index.php?controller=khuyenmai&action=showchitiet',
              type: 'post',
              data:{
                makm:value
              },
              success: function(response){
                $('#model--bill').html(response);
              }
          });
    });

    $(document).on('click', '#luu',function(){ 
        // var value = $(this).attr('value-data');
        //Gửi dữ liệu đến tệp PHP bằng Ajax
        var mt=null;
        var rd=null;
        var kid=null;
        var tr=null;
        if(document.getElementById('checkbox_mt').checked==true){
          mt="mt";
        }
        if(document.getElementById('checkbox_rd').checked==true){
          rd="rd";
        }
        if(document.getElementById('checkbox_kid').checked==true){
          kid="kid";
        }
        if(document.getElementById('checkbox_tr').checked==true){
          tr="tr";
        }
          $.ajax({
              url: 'index.php?controller=khuyenmai&action=luu',
              type: 'post',
              data:{
                makm:document.getElementById("luu").value,
                mountain:mt,
                kids:kid,
                touring:tr,
                road:rd
              },
              success: function(response){
                alert("Cập nhật thành công.");
                location.reload();
              }
          });

    });

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

