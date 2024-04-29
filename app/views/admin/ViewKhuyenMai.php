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
<head>
<div class="container">
<div class="admin__taskbar">
        <div class="admin__taskbar--header">
          <div class="admin__taskbar--header__content">
            <div>
              <img
                src="/Web2/public/database/images/logo/trek_logo_shield.png"
                alt=""
              />
            </div>

            <h1>AdminHub</h1>
          </div>
        </div>
        <div class="hr"></div>
        <ul class="admin__taskbar--body__list">

          <li class="admin__taskbar--body__item ">
            <a href="" id="linkHome">
              <i class="fa-solid fa-house-chimney"></i>
              <p>Trang chủ</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="" id="linkProduct">
              <i class="fa-solid fa-bicycle"></i>
              <p>Sản phẩm</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="" id="linkPromotions">
              <i class="fa-solid fa-percent"></i>
              <p>Khuyến mãi</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="">
              <i class="fa-solid fa-user"></i>
              <p>Nhân viên</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item ">
            <a href="">
              <i class="fa-solid fa-cart-shopping"></i>
              <p>Đơn hàng</p>
            </a>
          </li>


          <li class="admin__taskbar--body__item">
            <a href="">
              <i class="fa-solid fa-handshake"></i>
              <p>Khách hàng</p>
            </a>
          </li>

          <li class="admin__taskbar--body__item">
            <a href="">
              <i class="fa-solid fa-chart-column"></i>
              <p>Thống kê</p>
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
                        <th class="table--top">Điều kiện</th>
                        <th class="table--top">Ngày băt đầu</th>
                        <th class="table--top">Ngày kết thúc</th>
                        <th class="table--top">Tình trạng</th>
                        <th class="table--top">Chức năng</th>
                        </tr>
                        
                        <?php
                          //include('\app\controllers\ControllerKhuyenMai.php');
                          foreach($data as $value){
                        ?>
                          <tr>
                          <th><?php echo $value['MaKM'];?></th>
                          <th class="text__align--left"><?php echo $value['TenCT'];?></th>
                          <th><?php echo $value['PhanTramGG'];?></th>
                          <th><?php echo $value['dieukien'];?></th>
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
                              <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?controller=khuyenmai&action=delete&id=<?php echo $value['MaKM'];?>"><button class="discount__form--change">Xóa</button></a>
                            </div>
                          </th>
                          </tr>
                        <?php
                          };
                        ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <script>
        function changeURL() {
            var newUrl = "http://localhost/DoAnWeb2/Web2/index.php?controller=khuyenmai&action=insert"; // Đường dẫn URL mới
            window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }

        function changeURL2(){
          var newUrl = "http://localhost/DoAnWeb2/Web2/index.php?controller=khuyenmai&action=save"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }
      </script>
</div>

