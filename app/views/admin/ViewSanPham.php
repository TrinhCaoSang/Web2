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
          <!-- <div class="admin__content--body__top">
            <div class="admin__content--body__filter"></div>
          </div> -->
          <div class="admin__content--body__content">
            <!--  NEW CODE ! -->
               <!-- Sản phẩm -->
              
               <div class="admin-product" id="manageProduct">
                      <div class = "product_content--top">
                        <?php
                        if(isset($_GET['action'])&&$_GET['action']=="index"||$_GET['action']=="insert"){
                          echo '
                      <form class="admin__content--body__filter" id="product-filter-form" action="index.php?controller=sanpham&action=add_product" method="post" enctype="multipart/form-data">
                        <h1>Lọc sản phẩm</h1>
                        <p>* Lưu ý: Định dạng dữ liệu ngày được hiển thị là dạng dd/mm/yyyy</p>
                        <div class="admin__content--body__filter--gr1">
                          <div class="body__filter--nameClient" id="">
                            <p>Tên Sản phẩm</p>
                            <input name="TenHang" id="productName" type="text" placeholder="Nhập tên sản phẩm" />
                          </div>
                          
                          <div class="body__filter--idClient" id="">
                            <p>Mã Sản Phẩm</p>
                            <input id="productCode" type="text" name="MaHang" placeholder="Nhập mã sản phẩm" />
                          </div>
                          <div class="body__filter--status" id="">
                            <p>Loại sản phẩm</p>
                            <select name="category" id="categorySelect" >
                              <option value="all">Tất cả</option>
                              <option value="mountain">Mountain</option>
                              <option value="road">Road</option>
                              <option value="touring">Touring</option>
                              <option value="kids">Kid</option>
                            </select>
                          </div>
                          <div class="body__filter--idNumber" id="">
                            <p>Số lượng</p>
                            <input id="productCode" type="text" name="SoLuong" placeholder="Nhập số lượng sản phẩm" />
                          </div>

                          <div class="body__filter--idPrice" id="">
                            <p>Đơn giá</p>
                            <input id="productCode" type="text" name="DonGia" placeholder="Nhập đơn giá sản phẩm" />
                          </div>
                        </div>
        
        
                        
                        <div class="cancel-block">
                          <button id="cancel">Hủy</button>
                        </div>
                        <div class="body__filter--actions">
                          <button type="reset" class="product--reset__btn">Reset</button>
                          <button type="submit" class="product--filter__btn">Lọc</button>
                        </div>
                      </form>
                  ';
                        }
                        elseif(isset($_GET['action'])&&$_GET['action']=="edit"&&isset($_GET['id'])){
                          ?>

                <form class="admin__content--body__filter" id="product-filter-form" action="index.php?controller=sanpham&action=addProduct" method="post" enctype="multipart/form-data">
                        <h1>Lọc sản phẩm</h1>
                        <p>* Lưu ý: Định dạng dữ liệu ngày được hiển thị là dạng dd/mm/yyyy</p>
                        <div class="admin__content--body__filter--gr1">
                          <div class="body__filter--nameClient" id="">
                            <p>Tên Sản phẩm</p>
                            <input id="productName" type="text" name="TenHang" placeholder="Nhập tên sản phẩm" />
                          </div>
                          
                          <div class="body__filter--idClient" id="">
                            <p>Mã Sản Phẩm</p>
                            <input id="productCode" type="text" name="MaHang" placeholder="Nhập mã sản phẩm" />
                          </div>
                          <div class="body__filter--status" id="">
                            <p>Loại sản phẩm</p>
                            <select name="MaLoai" id="categorySelect">
                              <option value="1">Tất cả</option>
                              <option value="Mountain">Mountain</option>
                              <option value="Road">Road</option>
                              <option value="Touring">Touring</option>
                              <option value="Kid">Kid</option>
                            </select>
                          </div>
                          <div class="body__filter--idNumber" id="">
                            <p>Số lượng</p>
                            <input id="productCode" type="text" name="SoLuong" placeholder="Nhập số lượng sản phẩm" />
                          </div>

                          <div class="body__filter--idPrice" id="">
                            <p>Đơn giá</p>
                            <input id="productCode" type="text" name="DonGia" placeholder="Nhập đơn giá sản phẩm" />
                          </div>
                        </div>
        
                        <div class="admin__content--body__filter--gr1">
                          <div class="body__filter--status" id="">
                            <p>Loại ngày</p>
                            <select name="cateDate" id="cateDateSelect">
                              <option value="">Chọn loại ngày</option>
                              <option value="dateCreate">Ngày tạo</option>
                              <option value="dateUpdate">Ngày cập nhật</option>
                            </select>
                          </div>
                          <div class="body__filter--datefrom" id="dateFrom">
                            <label>Từ ngày</label>
                            <input type="date" />
                          </div>
                          <div class="body__filter--dateto" id="dateTo">
                            <label>Đến ngày</label>
                            <input type="date" />
                          </div>
                        </div>
        
                        
                        <div class="cancel-block">
                          <button id="cancel">Hủy</button>
                        </div>
                        <div class="body__filter--actions">
                          <button type="reset" class="product--reset__btn">Reset</button>
                          <button type="submit" class="product--filter__btn">Lọc</button>
                        </div>
                      </form>
                      <?php 
                        }
                        ?>
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

<?php foreach($data as $value): ?>
    <tr>
        <th><?php echo $value['MaHang'];?></th>
        <th><?php echo $value['MaLoai'];?></th>
        <th ><img src="<?php echo $value['Hinhanh'];?>" alt="<?php echo $value['TenHang'];?>" style="width: 110px; height: 60px; object-fit:cover; background-color:transparent;"></th>
        <th><?php echo $value['TenHang'];?></th>
        <th><?php echo $value['DonGia'];?></th>
        <th><?php echo $value['SoLuong'];?></th>
        <th>
          <a href="index.php?controller=sanpham&action=edit&id=<?php echo $value['MaHang'];?>"><button type="submit" class="discount__form--change">Cập nhật</button></a>
        
       </th>
        <th >
         <a href="index.php?controller=sanpham&action=delete&id=<?php echo $value['MaHang'];?>"><button class="discount__form--add">Xóa</button></a>
       </th>
    </tr>
<?php endforeach; ?>
<div  class="namespace">_________________________________________________________________________________________________________________________________________________________________</div>
                      </table>                  
                  </div>
                </div>
          </div>
    <?php include 'include/AdminHome/footer_admin.php' ?>