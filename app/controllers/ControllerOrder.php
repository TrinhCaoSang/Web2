<?php
    class ControllerOrder{
        protected $modelOrder;

        public function __construct()
        {
            require('app\models\ModelOrder.php');
            $this->modelOrder=new ModelOrder;
            $this->modelOrder->connect();
        }

        protected function view(array $data=[],$dataID){
            foreach($data as $key=>$value){
                $$key=$value;
            }
            return include("./app/views/admin/ViewOrder.php");
        }

        public function index(){
            $listHD=$this->modelOrder->getAllDataHD();
            return $this->view([
                'listHD'=>$listHD,
            ],0);
        }

        public function showchitiet(){
            $cthd=$_POST['cthd'];
            $mahd=$cthd[0];
            $makh=$cthd[1];
            $hoadon=$this->modelOrder->getDataIdHD($mahd);
            $chitiethoadon=$this->modelOrder->getDataIdCTHD($mahd);
            $khachhang=$this->modelOrder->getDataIdKH($makh);
            $list="";

            $thongtintinhtrang="";
            $option="";
            if($hoadon['TinhTrang']=='dangchoxuly'){
                $thongtintinhtrang="Đang chờ xử lý";
                $option='<option value="dangchoxuly">Đang chờ xử lý</option>
                <option value="dalienlac">Đã liên lạc</option>
                <option value="dagiao">Đã giao</option>';
            }else if($hoadon['TinhTrang']=='dalienlac'){
                $thongtintinhtrang="Đã liên lạc";
                $option='<option value="dalienlac">Đã liên lạc</option>
                        <option value="dagiao">Đã giao</option>'; 
            }else if($hoadon['TinhTrang']=='dagiao'){
                $thongtintinhtrang="Đã giao";
                $option='<option value="dagiao">Đã giao</option>';
            }

            

            foreach($chitiethoadon as $chitiet){
                $masp='<th>'.$chitiet['MaHang'].'</th>';
                $tensp='<th>'.$chitiet['TenHang'].'</th>';
                $km='<th class="text__align--left">'.$chitiet['MaKM'].'</th>';
                $dongia='<th class="text__align--left">'.$chitiet['DonGia'].'</th>';
                $soluong='<th class="text__align--left">'.$chitiet['SoLuong'].'</th>';
                $thanhtien='<th class="text__align--left">'.$chitiet['ThanhTienCTHD'].'</th>';
                $list=$list.'<tr>'.$masp.$tensp.$km.$dongia.$soluong.$thanhtien.'</tr>';
            }

            $result='<div class="bill_content--model--ctpn">
            <h1 class="bill__title">Thông tin khách hàng</h1>
            <button class="close" onclick="close_bill()">×</button>
            <p>
              <strong>Tên khách hàng: </strong>'.$khachhang['TenKh'] .'
            </p>
            <p>
              <strong>Địa chỉ: </strong>'.$khachhang['DiaChiKh'].'
            </p>
            <p>
              <strong>Số điện thoại: </strong>'.$khachhang['Sdt'].'
            </p>
            <hr>
            <h1 class="bill__title">Thông tin đơn hàng</h1>
            <p>
              <strong>Ngày tạo đơn hàng: </strong>'.$hoadon['NgayXuat'].'
            </p>
            <p>
              <strong>Tổng tiền: </strong>'.number_format($hoadon['TongTien']) . " VNĐ".'
            </p>
            <p>
              <strong>Tình trạng: </strong>
              <span id="status" style="color: red; font-size: 14pt; margin-left: 25px;">'.$thongtintinhtrang.'</span>
              <select id="tinhtrang" onchange="changeStatus()">
                '.$option.'
              </select>
            </p>
            <button id="luu" value="'.$hoadon['MaHD'].'">Lưu</button>
            <button id="huy" value="'.$hoadon['MaHD'].'">Hủy đơn hàng</button>
            
            <hr>
            <h1 class="bill__title">CHI TIẾT ĐƠN HÀNG</h1>
            <button class="printbtn" onclick="window.print()">In đơn hàng</button>
            <table>
              <tr>
                <th class="table--top">Mã sản phẩm</th>
                <th class="table--top">Tên sản phẩm</th>
                <th class="table--top">Mã khuyến mãi</th>
                <th class="table--top">Đơn giá</th>
                <th class="table--top">Số lượng</th>
                <th class="table--top">Thành tiền</th>
              </tr>
              '.$list.'
            </table>

          </div>';
          echo $result;
          echo '<script>
          document.getElementById("tinhtrang").value = "'.$hoadon['TinhTrang'].'";
          </script>';
          if($hoadon['TinhTrang']=='dagiao'){
            echo '<script>
                    document.getElementById("huy").style.display = "none";
                  </script>';
          }
        }

        public function suatinhtrang(){
            $tinhtrang=$_POST['status'];
            $mahd=$_POST['mahd'];
            //Cập nhật tình trạng trên db
            $hoadon=$this->modelOrder->getDataIdHD($mahd);
            $chitietHD=$this->modelOrder->getDataIdCTHD($mahd);
            if($tinhtrang=='dalienlac'){
              foreach($chitietHD as $ct){
                $mathang=$this->modelOrder->getDataIdMatHang($ct['MaHang']);
                if($ct['SoLuong']>$mathang['SoLuong']){
                  echo '<script>alert("Không đủ hàng tồn.")</script>';
                }else{
                  $mathang['SoLuong']=$mathang['SoLuong']-$ct['SoLuong'];
                  $hoadon['TinhTrang']='dalienlac';
                  $this->modelOrder->UpdateHoaDon($hoadon);
                  $this->modelOrder->UpdateMatHang($mathang);
                  echo '<script>alert("Thay đổi thành công.")</script>';
                }
              }
            }else if($tinhtrang=='dagiao'){
              $hoadon['TinhTrang']='dagiao';
              $this->modelOrder->UpdateHoaDon($hoadon);
              echo '<script>alert("Thay đổi thành công.")</script>';
            }
        }

        public function huydonhang(){
          $mahd=$_POST['mahd'];
          $this->modelOrder->DeleteHD($mahd);
          $this->modelOrder->DeleteCTHD($mahd);
          echo '<script>alert("Hủy thành công.")</script>';
        }

        public function loc(){
          
          $tinhtrang=$_POST['tinhtrang'];
          if(isset($_POST['tungay'])){
            $tungay=$_POST['tungay'];
          }
          if(isset($_POST['denngay'])){
            $denngay=$_POST['denngay'];
          }
          // $listHD=$this->modelOrder->Search($tinhtrang,$tungay,$denngay);
          if($this->modelOrder->Search($tinhtrang,$tungay,$denngay)==0){
            echo '<h2>Không có sản phẩm phù hợp.</h2>';
            return;
          }else{
            $listHD=$this->modelOrder->Search($tinhtrang,$tungay,$denngay);
          }
          $list="";
          foreach($listHD as $hd){
            $mahd='<th> '.$hd['MaHD'].' </th>';
            $makh='<th> '.$hd['MaKH'].' </th>';
            $ngayxuat='<th> '.$hd['NgayXuat'].' </th>';
            $tongtien='<th class="text__align--left">'. number_format($hd['TongTien']) .' VNĐ'.'</th>';
            $xemchitiet='<th class="text__align--left" id="xemchitiet" value-data="'. $hd['MaHD'].'#'.$hd['MaKH'] .'" style="text-decoration: underline;color: rgb(115, 198, 0);" onclick="show_bill()">Xem chi tiết</th>';
            if($hd['TinhTrang']=='dangchoxuly'){
              $tt='Đang chờ xử lý';
            }else if($hd['TinhTrang']=='dalienlac'){
              $tt='Đã liên lạc';
            }else if($hd['TinhTrang']=='dagiao'){
              $tt='Đã giao';
            }
            $tinhtrang1='<th class="text__align--left">'.$tt.'</th>';
            $list=$list.'<tr>'.$mahd.$makh.$ngayxuat.$tongtien.$xemchitiet.$tinhtrang1.'</tr>';
          }

          // $result='<tr>'.$list.'</tr>';
          $result='<table>
          <tr>
            <th class="table--top">Mã đơn hàng</th>
            <th class="table--top">Mã khách hàng</th>
            <th class="table--top">Ngày tạo</th>
            <th class="table--top">Tổng tiền</th>
            <th class="table--top">Đơn hàng</th>
            <th class="table--top">Tình trạng</th>
          </tr>
          '.$list.'
          
        </table>';
          
          echo $result;
          
        }






    }
?>