<?php
    class ControllerCart{

        protected $modelProduct;
        protected $modelKhuyenMai;
        protected $modelCart;
        protected $listKM;
        public function __construct()
        {
            require('app\models\ModelProduct.php');
            require('app\models\ModelKhuyenMai.php');
            require('app\models\ModelCart.php'); 
            require('app\controllers\ControllerKhuyenMai.php');

            $this->modelProduct=new ModelProduct;
            $this->modelProduct->connect();
            
            $this->modelKhuyenMai=new ModelKhuyenMai;
            $this->modelKhuyenMai->connect();
            $this->listKM=$this->modelKhuyenMai->getAllData();

            $this->modelCart=new ModelCart;
            $this->modelCart->connect();
            
            
        }

        protected function view(array $data=[],$dataID){
            foreach($data as $key=>$value){
                $$key=$value;
            }
            return include("./app/views/admin/ViewCart.php");
        }

        public function index(){
            $products=$_SESSION['cart']??[];

            return $this->view([
                'products'=>$products,
            ],0);
        }

        public function store(){
            if(!isset($_SESSION['username'])){
                echo '<script>alert("Bạn chưa đăng nhập.");</script>';
            }elseif($_SESSION['user_type'] == 'staff'){
                echo '<script>alert("Nhân viên không được phép đặt hàng.");</script>';
            }
            else{
            $phantramgg=0;
            $productId=$_POST['id'][0] ?? null;
            $makm=$_POST['id'][1];
            $productQty=intval($_POST['soluong']);
            $product=$this->modelProduct->getDataID($productId);
            if (!isset($_SESSION['order_count'])) {
                $_SESSION['order_count'] = 0;
            }
            $_SESSION['order_count'] = 0;
            // print_r($product);
            // session_destroy();
            // $_SESSION['cart'][$productId]=$product;
            foreach($this->listKM as $km){
                if($km['MaKM']==$makm && ControllerKhuyenMai::checkTinhTrang($km)==1 && $product['DonGia']>=$km['dieukien']){
                    $product['DonGia']=(100-$km['PhanTramGG'])*$product['DonGia']/100;
                }
            }
            if(empty($_SESSION['cart'])||!array_key_exists($productId,$_SESSION['cart'])){
                // echo 'Sản phẩm chưa có trong giỏ hàng';
                $product['qty']=$productQty;
                $product['MaKM']=$makm;
                $_SESSION['cart'][$productId]=$product;
            }else{
                // echo 'Sản phẩm đã có trong giỏ hàng';
                $product['qty']=$_SESSION['cart'][$productId]['qty']+$productQty;
                $product['MaKM']=$makm;
                $_SESSION['cart'][$productId]=$product;
            }

            $products=$_SESSION['cart'];
            foreach($products as $pd){
                $_SESSION['order_count']+=$pd['qty'];
            }
            echo '<p >'.$_SESSION['order_count'].'</p>';
            echo '<script>alert("Thêm thành công");</script>';
        }
        }
        public function delete(){
            $productId=$_GET['id']??null;
            $_SESSION['order_count']-=$_SESSION['cart'][$productId]['qty'];
            unset($_SESSION['cart'][$productId]);
            header('location:index.php?controller=cart');
        }

        public function update(){
            foreach($_POST['qty'] as $productId=>$qty){
                if($qty<0||!is_numeric($qty)){
                    continue;
                }
                if($qty==0){
                    $_SESSION['order_count']-=$_SESSION['cart'][$productId]['qty'];
                    unset($_SESSION['cart'][$productId]);
                }else{
                    $_SESSION['order_count']=$_SESSION['order_count']-$_SESSION['cart'][$productId]['qty']+$qty;
                    $_SESSION['cart'][$productId]['qty']=$qty;
                }
            }
            header('location:index.php?controller=cart&action=index');
        }

        public function destroy(){
            unset($_SESSION['cart']);
            $_SESSION['order_count']=0;
            header('location:index.php?controller=cart&action=index');
        }
        public function taoMaHD(){
            $ket_qua = '';
            for ($i = 0; $i < 3; $i++) {
                $ky_tu_ngau_nhien = chr(rand(97, 122)); // ASCII của 'a' là 97 và 'z' là 122
                $ket_qua .= $ky_tu_ngau_nhien;
            }
            return "HD".$ket_qua.rand(0, 10000);
        }

        public function insert(){
            $selectedProducts = $_POST['products'];
            $listProducts=array();
            $products=$_SESSION['cart'];
            //Lấy danh sách Xe đạp được chọn để thanh toán
            foreach($selectedProducts as $productID){
                foreach($products as $pd){
                    if($pd['MaHang']==$productID){
                        $listProducts[]=$pd;
                    }
                }
            }
            //Thông tin hóa đơn
            $mahd=$this->taoMaHD();
            $makh=$_SESSION['user_id'];
            $ngayxuat=date("Y-m-d");
            $tongtien=$_POST['tongtien'];
            $tinhtrang="dangchoxuly";
            //Thêm thông tin hóa đơn vào database
            $this->modelCart->InsertDataHD($mahd,$makh,$ngayxuat,$tongtien,$tinhtrang);
            //Thêm chi tiết hóa đơn vào database
            foreach($listProducts as $pd){
                $this->modelCart->InsertDataCTHD($mahd,$pd['MaHang'],$pd['DonGia'],$pd['qty'],$pd['DonGia']*$pd['qty'],$pd['MaKM']);
                unset($_SESSION['cart'][$pd['MaHang']]);
            }
            // $this->destroy();
            
        }

        public function xoa(){
            $donhangcanxoa=$_POST['donhangcanxoa'];
            $soluong=$_POST['soluong'];
            $mahd=$donhangcanxoa[0];
            $mahang=$donhangcanxoa[1];
            $this->modelCart->DeleteCTHD($mahd,$mahang);
            if($this->modelCart->getDataID_CTHD($mahd)==0){
                $this->modelCart->XoaHD($mahd);
            }
            $this->showTinhTrang();
        }

        public function sua(){
            $donhangcansua=$_POST['donhangcansua'];
            $soluong=$_POST['soluong'];
            $mahd=$donhangcansua[0];
            $mahang=$donhangcansua[1];
            $donhang=$this->modelCart->getDHCanSua($mahd,$mahang);
            $donhang['SoLuong']=$soluong;
            $donhang['ThanhTienCTHD']=$soluong*$donhang['DonGiaCTHD'];
            $this->modelCart->SuaCTHD($donhang);
            $this->showTinhTrang();
        }

        public function xoahoadon(){
            $makh=$_SESSION['user_id'];
            $listhd=$this->modelCart->SearchDHCanXoa($makh);
            
            foreach($listhd as $hd){
                $this->modelCart->XoaCTHD($hd['MaHD']);
                $this->modelCart->XoaHD($hd['MaHD']);
            }
            $this->showTinhTrang();
            // print_r($listhd);
        }

        public function showTinhTrang(){ 
            if(isset($_POST['condition'])){
                $condition=$_POST['condition'];
            }else{
                $condition="dangchoxuly";
            }
            //Dùng SESSION để lấy mã khách hàng
            $makh=$_SESSION['user_id'];
            $hoadonList=$this->modelCart->getAllData($condition,$makh);
            if($hoadonList==null){
                echo '<h3>Không có mặt hàng.</h3>';
                return;
            }

            $list="";

            if($condition=='dangchoxuly'){
                foreach($hoadonList as $tthd){
                    $thoigian='<td>'. $tthd['NgayXuat'] .'</td>';
                    $anh='<td><img src="data:image/jpeg;base64,'.base64_encode($tthd['Hinhanh']).'"></td>';
                    $tenhang='<td>'. $tthd['TenHang'].'</td>';
                    $dongia='<td>'. number_format($tthd['DonGiaCTHD']).'</td>';
                    $soluong='<td><input type="text" id="'.$tthd['MaHD'].'#'.$tthd['MaHang'].'" value="'.$tthd['SoLuong'].'"></td>';
                    $thanhtien='<td id="thanhtien">'.number_format($tthd['DonGiaCTHD']*$tthd['SoLuong']).'</td>';
                    // $xoa='<td><a href="index.php?controller=cart&action=xoa&id='.$tthd['MaHD'].'#'.$tthd['MaHang'].'">Xóa</a></td>';
                    $sua='<a href="#" class="suadonhang" data-value="'.$tthd['MaHD'].'#'.$tthd['MaHang'].'">Sửa</a>';
                    $xoasua='<td><a href="#" class="xoadonhang" data-value="'.$tthd['MaHD'].'#'.$tthd['MaHang'].'">Xóa</a>'.'<br>'.$sua.'</td>';
                    $list=$list.'<tr>'.$thoigian.$anh.$tenhang.$dongia.$soluong.$thanhtien.$xoasua.'</tr>';  
                }
    
                $result='
                <div class="cart-info_container">
                <form action="" method="post">
                  <table class="menu" id="menu">
                    <thead>
                      <tr>                
                        <th>Thời gian</th>                  
                        <th>Hình ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số Lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao Tác</th>
                      </tr>
                    </thead>
          
                    <tbody class="cart-info" id="cart-info">'.
                        $list
                    .'</tbody>
                  </table>
                    <p align="left">
                        <a href="#" id="deleteall">Xóa tất cả</a>
                        <a href="index.php?controller=product&action=index&type=all">Tiếp tục mua</a>
                    </p>
                  </form>
        
                </div>';
            }else{
                foreach($hoadonList as $tthd){
                    $thoigian='<td>'. $tthd['NgayXuat'] .'</td>';
                    $anh='<td><img src="data:image/jpeg;base64,'.base64_encode($tthd['Hinhanh']).'"></td>';
                    $tenhang='<td>'. $tthd['TenHang'].'</td>';
                    $dongia='<td>'. number_format($tthd['DonGiaCTHD']).'</td>';
                    $soluong='<td>'. $tthd['SoLuong'].'</td>';
                    $thanhtien='<td id="thanhtien">'.number_format($tthd['DonGiaCTHD']*$tthd['SoLuong']).'</td>';
                    // $xoa='<td><a href="index.php?controller=cart&action=xoa&id='.$tthd['MaHD'].'#'.$tthd['MaHang'].'">Xóa</a></td>';
                    $list=$list.'<tr>'.$thoigian.$anh.$tenhang.$dongia.$soluong.$thanhtien.'</tr>';  
                }
    
                $result='
                <div class="cart-info_container">
                <form action="" method="post">
                  <table class="menu" id="menu">
                    <thead>
                      <tr>                
                        <th>Thời gian</th>                  
                        <th>Hình ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số Lượng</th>
                        <th>Thành tiền</th>
                      </tr>
                    </thead>
          
                    <tbody class="cart-info" id="cart-info">'.
                        $list
                    .'</tbody>
                  </table>
                    <p align="left">
                        <a href="index.php?controller=product&action=index&type=all">Tiếp tục mua</a>
                    </p>
                  </form>
        
                </div>';
            }
          echo $result;
        }


    }






?>