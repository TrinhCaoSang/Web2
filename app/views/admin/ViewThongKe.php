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
          <div class="admin-statistics" id="statistics">
            <div class="tools">
              <div class="filter">
                <h1 class="statistics__title">Thống kê</h1>
              </div>
            </div>
            <!-- doanh thu bán chạy -->
            <div id="container_product">
              <h3 class="title_content">Doanh thu sản phẩm bán chạy</h3>
              <div class="statistics_control">
                <div class="control_top" id="top">
                  <label>Top</label>
                  <select id="select_top">
                    <option value="3" selected>3</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                  </select>
                </div>
                <div class="control_date" id="dateFrom">
                  <label>Từ ngày</label>
                  <label id="tb1" class="tb"></label>
                  <input id="begin_top" type="date" />
                </div>
                <div class="control_date" id="dateTo">
                  <label>Đến ngày</label>
                  <label id="tb2" class="tb"></label>
                  <input id="end_top" type="date" />
                </div>
                  <button type="button" id="loc_top">Lọc</button>
              </div>
              
              <div class="table__wrapper">
              <table id="content-product">
                  <thead class="menu">
                    <tr>
                      <th class="table--top">Mã SP</th>
                      <th class="table--top" >Loại</th>
                      <th class="table--top">Tên Sản Phẩm</th>
                      <th class="table--top">Số lượng</th>
                      <th class="table--top">Doanh thu</th>
                    </tr>
                  </thead>
                  <tbody class="content" id="content_top">
                    <?php foreach ($this->listProduct as $key) { 
                    ?>
                    <tr>
                      <th><?php echo strtoupper($key["MaHang"]); ?></th>
                      <th><?php echo strtoupper($key["TenLoai"]); ?></th>
                      <th><?php echo $key["TenHang"]; ?></th>
                      <th><?php echo $key["soLuong"]; ?></th>
                      <th><?php echo number_format($key["total"]). " VND"; ?></th>
                    </tr>
                    <?php }?> 
                  </tbody>
                </table>
              </div>
            </div>
            <!-- doanh thu loại -->
            <div id="container_product">
              <h3 class="title_content" style="margin-top: 50px;">Doanh thu loại sản phẩm</h3>
              <div class="statistics_control">
                <div class="control_date" id="dateFrom">
                  <label>Từ ngày</label>
                  <label id="tb3" class="tb"></label>
                  <input type="date" id="begin_type">
                        
                </div>
                <div class="control_date" id="dateTo">
                  <label>Đến ngày</label>
                  <label id="tb4" class="tb"></label>
                  <input type="date" id="end_type"/>
                </div>
                <button id="loc_type">Lọc</button>
              </div>
              
            </div>
            <div id="container_type-product">
                <!--  
              <div class="container_type-product_content">
                <h2 style="margin-bottom: 5px;">MOUNTAIN</h2>
                <h3 class="price">30000000</h3>
                <h3>Số lượng: <span class="quantity">10</span></h3>
                <div class="show_content-statistics">Xem chi tiết</div>
              </div>

              <div class="container_type-product_content">
                <h2 style="margin-bottom: 5px;">TOURING</h2>
                <h3 class="price">30000000</h3>
                <h3>Số lượng: <span class="quantity">10</span></h3>
                <div class="show_content-statistics">Xem chi tiết</div>
              </div>

              <div class="container_type-product_content">
                <h2 style="margin-bottom: 5px;">ROAD</h2>
                <h3 class="price">30000000</h3>
                <h3>Số lượng: <span class="quantity">10</span></h3>
                <div class="show_content-statistics">Xem chi tiết</div>
              </div>

              <div class="container_type-product_content">
                <h2 style="margin-bottom: 5px;">KID</h2>
                <h3 class="price">30000000</h3>
                <h3>Số lượng: <span class="quantity">10</span></h3>
                <div class="show_content-statistics">Xem chi tiết</div>
              </div> -->
            </div>
          </div>
          <div class="statistics--model" id="model--statistics" style="display: none;">
            <div class="statistics_content--model">
              <button class="close" onclick="close_statistics()">×</button>
              <div class="table__wrapper">
                <table id="content-product">
                  <thead class="menu">
                    <tr>
                      <th class="table--top">Mã SP<i class="fas fa-sort" id="MaHang"></i></th>
                      <th class="table--top">Tên Sản Phẩm<i class="fas fa-sort" id="TenHang"></i></th>
                      <th class="table--top">Số lượng<i class="fas fa-sort" id="soLuong"></i></th>
                      <th class="table--top">Doanh thu<i class="fas fa-sort" id="total"></i></th>
                    </tr>
                  </thead>
                  <tbody class="content" id="content_type">
                    <tr>
                      <th>kid01</th>
                      <th>xe thể thao trẻ em</th>
                      <th>100</th>
                      <th>100000000000</th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
    </div>
  </div>
  <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
          function show_search_top(top,begin,end) {
            $.ajax({
              url : "index.php?controller=thongke&action=getProduct_Top",
              method: "POST",
              data: {
                top: top,
                begin: begin,
                end: end
              },
              success: function(data){
                $("#content_top").html(data);
                // document.getElementById("product-detail_model").style.display = "flex";
              },
              error: function(xhr,status,error){
                console.error("Error: " , error);
              }
            });
          }
          $(document).on("click","#loc_top",function(){
            var top = document.getElementById("select_top").value;
            var begin = document.getElementById("begin_top").value;
            var end = document.getElementById("end_top").value;
            if(begin === "" && end === ""){
                document.getElementById("tb1").innerHTML = "*Chưa chọn ngày";
                document.getElementById("tb2").innerHTML = "*Chưa chọn ngày";
                return
            }else if(begin === ""){
                document.getElementById("tb1").innerHTML = "*Chưa chọn ngày";
                return;
            }else if(end == ""){
                document.getElementById("tb2").innerHTML = "*Chưa chọn ngày";
                return;
            }else{
                document.getElementById("tb1").innerHTML = "";
                document.getElementById("tb2").innerHTML = "";
                show_search_top(top,begin,end);
            }
          })

          function show_search_type(begin,end) {
            $.ajax({
              url : "index.php?controller=thongke&action=getProduct_Type",
              method: "POST",
              data: {
                begin: begin,
                end: end
              },
              success: function(data){
                $("#container_type-product").html(data);
                // document.getElementById("product-detail_model").style.display = "flex";
              },
              error: function(xhr,status,error){
                console.error("Error: " , error);
              }
            });
          }
          $(document).on("click","#loc_type",function(){
            var begin = document.getElementById("begin_type").value;
            var end = document.getElementById("end_type").value;
            if(begin === "" && end === ""){
                document.getElementById("tb3").innerHTML = "*Chưa chọn ngày";
                document.getElementById("tb4").innerHTML = "*Chưa chọn ngày";
                return
            }else if(begin === ""){
                document.getElementById("tb3").innerHTML = "*Chưa chọn ngày";
                return;
            }else if(end == ""){
                document.getElementById("tb4").innerHTML = "*Chưa chọn ngày";
                return;
            }else{
                document.getElementById("tb3").innerHTML = "";
                document.getElementById("tb4").innerHTML = "";
                show_search_type(begin,end);
            }
          })
            function show_statistics(){
                document.getElementById("model--statistics").style.display = "flex";
            }
            function close_statistics() {
                document.getElementById("model--statistics").style.display = "none";
            }

        var begin_type;
        var end_type;
        var id_type;
        function show_search_type_content(begin,end,id) {
            $.ajax({
              url : "index.php?controller=thongke&action=getProduct_Type_Content",
              method: "POST",
              data: {
                begin: begin,
                end: end,
                id: id
              },
              success: function(data){
                $("#content_type").html(data);
                // document.getElementById("product-detail_model").style.display = "flex";
              },
              error: function(xhr,status,error){
                console.error("Error: " , error);
              }
            });
          }
          
          $(document).on("click",".show_content-statistics",function(){
            begin_type = document.getElementById("begin_type").value;
            end_type = document.getElementById("end_type").value;
            id_type = $(this).attr("id");
            show_search_type_content(begin_type,end_type,id_type);
          })


        function show_search_title(begin,end,id,title,order) {
            $.ajax({
              url : "index.php?controller=thongke&action=getProduct_Type_Title",
              method: "POST",
              data: {
                begin: begin,
                end: end,
                id: id,
                title: title,
                order: order
              },
              success: function(data){
                $("#content_type").html(data);
                // document.getElementById("product-detail_model").style.display = "flex";
              },
              error: function(xhr,status,error){
                console.error("Error: " , error);
              }
            });
          }
            var show_title = document.querySelectorAll('.fa-sort');
            var MaSP = document.getElementById("MaHang");
            var Ten = document.getElementById("TenHang");
            var SoLuong = document.getElementById("soLuong");
            var DoanhThu = document.getElementById("total");
            show_title.forEach(function(element) {
                element.addEventListener('click', function() {
                    // Đoạn mã bạn muốn thực thi khi phần tử được nhấp chuột vào ở đây
                    var id = $(this).attr("id");
                    if(id == "MaHang"){
                        if(MaSP.classList.contains('fa-caret-down')){
                            MaSP.classList.remove('fa-caret-down');
                            MaSP.classList.add('fa-caret-up');
                            Ten.classList.remove('fa-caret-down');
                            Ten.classList.remove('fa-caret-up');
                            Ten.classList.add('fa-sort');
                            SoLuong.classList.remove('fa-caret-down');
                            SoLuong.classList.remove('fa-caret-up');
                            SoLuong.classList.add('fa-sort');
                            DoanhThu.classList.remove('fa-caret-down');
                            DoanhThu.classList.remove('fa-caret-up');
                            DoanhThu.classList.add('fa-sort');
                            show_search_title(begin_type,end_type,id_type,id,"asc");
                        }else{
                            MaSP.classList.remove('fa-sort');
                            MaSP.classList.remove('fa-caret-up');
                            MaSP.classList.add('fa-caret-down');
                            Ten.classList.remove('fa-caret-down');
                            Ten.classList.remove('fa-caret-up');
                            Ten.classList.add('fa-sort');
                            SoLuong.classList.remove('fa-caret-down');
                            SoLuong.classList.remove('fa-caret-up');
                            SoLuong.classList.add('fa-sort');
                            DoanhThu.classList.remove('fa-caret-down');
                            DoanhThu.classList.remove('fa-caret-up');
                            DoanhThu.classList.add('fa-sort');
                            show_search_title(begin_type,end_type,id_type,id,"desc");
                        }
                    }
                    else if(id == "TenHang"){
                        if(Ten.classList.contains('fa-caret-down')){
                            MaSP.classList.remove('fa-caret-down');
                            MaSP.classList.remove('fa-caret-up');
                            MaSP.classList.add('fa-sort');
                            Ten.classList.remove('fa-caret-down');
                            Ten.classList.add('fa-caret-up');
                            SoLuong.classList.remove('fa-caret-down');
                            SoLuong.classList.remove('fa-caret-up');
                            SoLuong.classList.add('fa-sort');
                            DoanhThu.classList.remove('fa-caret-down');
                            DoanhThu.classList.remove('fa-caret-up');
                            DoanhThu.classList.add('fa-sort');
                            show_search_title(begin_type,end_type,id_type,id,"asc");
                        }else{
                            Ten.classList.remove('fa-sort');
                            Ten.classList.remove('fa-caret-up');
                            Ten.classList.add('fa-caret-down');
                            MaSP.classList.remove('fa-caret-down');
                            MaSP.classList.remove('fa-caret-up');
                            MaSP.classList.add('fa-sort');
                            SoLuong.classList.remove('fa-caret-down');
                            SoLuong.classList.remove('fa-caret-up');
                            SoLuong.classList.add('fa-sort');
                            DoanhThu.classList.remove('fa-caret-down');
                            DoanhThu.classList.remove('fa-caret-up');
                            DoanhThu.classList.add('fa-sort');
                            show_search_title(begin_type,end_type,id_type,id,"desc");
                        }
                    }else if(id == "soLuong"){
                        if(SoLuong.classList.contains('fa-caret-down')){
                            MaSP.classList.remove('fa-caret-down');
                            MaSP.classList.remove('fa-caret-up');
                            MaSP.classList.add('fa-sort');
                            Ten.classList.remove('fa-caret-up');
                            Ten.classList.remove('fa-caret-down');
                            Ten.classList.add('fa-sort');
                            SoLuong.classList.remove('fa-caret-down');
                            SoLuong.classList.add('fa-caret-up');
                            DoanhThu.classList.remove('fa-caret-down');
                            DoanhThu.classList.remove('fa-caret-up');
                            DoanhThu.classList.add('fa-sort');
                            show_search_title(begin_type,end_type,id_type,id,"asc");
                        }else{
                            Ten.classList.remove('fa-caret-down');
                            Ten.classList.remove('fa-caret-up');
                            Ten.classList.add('fa-sort');
                            MaSP.classList.remove('fa-caret-down');
                            MaSP.classList.remove('fa-caret-up');
                            MaSP.classList.add('fa-sort');
                            SoLuong.classList.remove('fa-sort');
                            SoLuong.classList.remove('fa-caret-up');
                            SoLuong.classList.add('fa-caret-down');
                            DoanhThu.classList.remove('fa-caret-down');
                            DoanhThu.classList.remove('fa-caret-up');
                            DoanhThu.classList.add('fa-sort');
                            show_search_title(begin_type,end_type,id_type,id,"desc");
                        }
                    }else if(id == "total"){
                        if(DoanhThu.classList.contains('fa-caret-down')){
                            MaSP.classList.remove('fa-caret-down');
                            MaSP.classList.remove('fa-caret-up');
                            MaSP.classList.add('fa-sort');
                            Ten.classList.remove('fa-caret-up');
                            Ten.classList.remove('fa-caret-down');
                            Ten.classList.add('fa-sort');
                            SoLuong.classList.remove('fa-caret-down');
                            SoLuong.classList.remove('fa-caret-up');
                            SoLuong.classList.add('fa-sort');
                            DoanhThu.classList.remove('fa-caret-down');
                            DoanhThu.classList.add('fa-caret-up');
                            show_search_title(begin_type,end_type,id_type,id,"asc");
                        }else{
                            Ten.classList.remove('fa-caret-down');
                            Ten.classList.remove('fa-caret-up');
                            Ten.classList.add('fa-sort');
                            MaSP.classList.remove('fa-caret-down');
                            MaSP.classList.remove('fa-caret-up');
                            MaSP.classList.add('fa-sort');
                            SoLuong.classList.remove('fa-caret-up');
                            SoLuong.classList.remove('fa-caret-down');
                            SoLuong.classList.add('fa-sort');
                            DoanhThu.classList.remove('fa-sort');
                            DoanhThu.classList.remove('fa-caret-up');
                            DoanhThu.classList.add('fa-caret-down');
                            show_search_title(begin_type,end_type,id_type,id,"desc");
                        }
                    }

                });
            });

        </script>
    </div>
    <!-- <script src="/Web2/public/components/HomeAdmin/HomeAdmin.js"></script> -->
</body>
</html>