<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trek - Quản lý cửa hàng</title>
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/HomeAdmin/HomeAdmin.css">
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/AdminProduct/AdminProduct.css">
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/ManageUserList/ManageUserList.css" />
    <link rel="stylesheet" href="/DoAnWeb/Web2/public/components/AdminProduct/adminProduct.css" />
    <script defer src="/public/components\HomeAdmin\HomeAdmin.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<div class="admin__content--bill__content" id="bill">
            <div class="bill__content--top">
              <h1 class="bill__title">QUẢN LÝ ĐƠN HÀNG</h1>
              <form class="admin__content--body__filter">
                <h1>Lọc đơn hàng</h1>
                <p>* Lưu ý: Định dạng dữ liệu ngày tạo đơn được hiển thị là dạng dd/mm/yyyy</p>
                <div class="admin__content--body__filter--gr1">
                  <div class="body__filter--field body__filter--idClient" id="orderIdClient">
                    <p>Mã khách hàng</p>
                    <input type="text" placeholder="Nhập mã khách hàng" />
                  </div>
                  <div class="body__filter--field body__filter--idClient" id="orderIdClient">
                    <p>Mã đơn hàng</p>
                    <input type="text" placeholder="Nhập mã sản phẩm" />
                  </div>
                  <div class="body__filter--field body__filter--status" id="orderStatus">
                    <p>Trạng thái</p>
                    <select name="" id="">
                      <option value="all">Tất cả</option>
                      <option value="valid">Đã xử lý</option>
                      <option value="invalid">Chưa xử lý</option>
                    </select>
                  </div>
                  <div class="body__filter--field body__filter--orderDate" id="orderDateBegin">
                    <label>Từ ngày:</label>
                    <input type="date" />
                  </div>

                  <div class="body__filter--field body__filter--orderDate" id="orderDateEnd">
                    <label>Đến ngày:</label>
                    <input type="date" />
                  </div>
                </div>
                <div class="body__filter--actions--bill">
                  <button type="reset" class="order--reset__btn">Reset</button>
                  <button type="button" class="order--filter__btn">Lọc</button>
                </div>
              </form>
              <table>

                <tr>
                  <th class="table--top">Ngày tạo</th>
                  <th class="table--top">Mã khách hàng</th>
                  <th class="table--top">Giá đơn hàng</th>
                  <th class="table--top">Đơn hàng</th>
                  <th class="table--top">Trạng thái</th>
                </tr>
                <tr>
                  <th>30/03/2024</th>
                  <th>KH01</th>
                  <th class="text__align--left">100000</th>
                  <th class="text__align--left" style="text-decoration: underline;color: rgb(115, 198, 0);"
                    onclick="show_bill()">Xem chi tiết</th>
                  <th class="text__align--left">Chưa xử lý</th>
                </tr>
              </table>
              <div class="bill--model--ctpn" id="model--bill" style="display: none;">
                <div class="bill_content--model--ctpn">
                  <h1 class="bill__title">Thông tin khách hàng</h1>
                  <button class="close" onclick="close_bill()">×</button>
                  <p>
                    <strong>Tên khách hàng: </strong>
                  </p>
                  <p>
                    <strong>Địa chỉ: </strong>
                  </p>
                  <p>
                    <strong>Số điện thoại: </strong>
                  </p>
                  <hr>
                  <h1 class="bill__title">Thông tin đơn hàng</h1>
                  <p>
                    <strong>Ngày tạo đơn hàng: </strong>
                  </p>
                  <p>
                    <strong>Tổng tiền: </strong>
                  </p>
                  <p>
                    <strong>Tình trạng: </strong>
                    <span id="status" style="color: red; font-size: 14pt; margin-left: 25px;">Chưa xử lý</span>
                    <label>
                      <input type="checkbox" onchange="">
                      <span class="slider"></span>
                    </label>
                  </p>
                  <hr>
                  <h1 class="bill__title">CHI TIẾT ĐƠN HÀNG</h1>
                  <button class="printbtn" onclick="window.print()">In đơn hàng</button>
                  <table>
                    <tr>
                      <th class="table--top">Hình ảnh</th>
                      <th class="table--top">Tên sản phẩm</th>
                      <th class="table--top">Loại</th>
                      <th class="table--top">Số lượng</th>
                      <th class="table--top">Giá</th>
                    </tr>
                    <tr>
                      <th>PNG1</th>
                      <th>Xe đạp</th>
                      <th class="text__align--left">Mountain</th>
                      <th class="text__align--left">1</th>
                      <th class="text__align--left">1200000</th>
                    </tr>
                    <tr>
                      <th>PNG1</th>
                      <th>Xe đạp</th>
                      <th class="text__align--left">Mountain</th>
                      <th class="text__align--left">1</th>
                      <th class="text__align--left">1200000</th>
                    </tr>

                  </table>

                </div>
              </div>
            </div>
          </div>
</body>
</html>