<?php
    class ControllerThongKe{
        private $ThongKeModel;
        private $listProduct;
        public function __construct()
        {
            $this->loadModel('ThongKe');
            $this->ThongKeModel=new ModelThongKe;
            $this->ThongKeModel->connect();
        }

        protected function view(array $data=[],$dataID){
            // foreach($data as $key=>$value){
            //     $$key=$value;
            // }
            // print_r($this->listProduct);
            return include("./app/views/admin/ViewThongKe.php");
        }
    
        protected function loadModel($modelPath){
            return require ("./app/models/ModelThongKe.php");
            
    
        }
        public function index(){
            //Lấy data từ model
            $this->listProduct=$this->ThongKeModel->getProduct_Top(3,'2024-01-01','9999-01-10');
            // print_r($this->listProduct);
            return $this->view($this->listProduct,0);
            // return $this->view([
            //     '$products'=>$products,
            // ],0);
        }

        public function getProduct_Top(){
            $top = $_POST["top"];
            $dateBegin = $_POST["begin"];
            $dateEnd = $_POST["end"];
            $this->listProduct=$this->ThongKeModel->getProduct_Top($top,$dateBegin,$dateEnd);
            if($this->listProduct == null){
                echo '<h1>Không có doanh thu</h1>';
                return;
            }
            $list = '';
            foreach ($this->listProduct as $key) {
                $list .= '<tr>'.
                  '<th>'.strtoupper($key["MaHang"]).'</th>'.
                  '<th>'.strtoupper($key["TenLoai"]) .'</th>'.
                  '<th>'. $key["TenHang"].'</th>'.
                  '<th>'.$key["soLuong"].'</th>'.
                  '<th>'.number_format($key["total"]). ' VND</th>'.
                '</tr>';
            }
            echo $list;
        }


        public function getProduct_Type(){
            $dateBegin = $_POST["begin"];
            $dateEnd = $_POST["end"];
            $this->listProduct=$this->ThongKeModel->getProduct_Type($dateBegin,$dateEnd);
            $listLoai=$this->ThongKeModel->getLoai();
            if($this->listProduct == null){
                echo '<h1>Không có doanh thu</h1>';
                return;
            }
            
            $list = '';
            foreach ($listLoai as $key1) {
                $fl = 0;
                $tenLoai = strtoupper($key1["TenLoai"]);
                $maLoai = $key1["MaLoai"];
                foreach ($this->listProduct as $key) {
                    if($key["MaLoai"] == $key1["MaLoai"]){
                        $list .= 
                        '<div class="container_type-product_content">'.
                        '<h2 style="margin-bottom: 5px;">'. strtoupper($key["TenLoai"]).'</h2>'.
                        '<h3 class="price">'.number_format($key["total"]).' VND</h3>'.
                        '<h3>Số lượng: <span class="quantity">'.number_format($key["soLuong"]).'</span></h3>'.
                        '<div class="show_content-statistics" id="'.$key["MaLoai"].'" onclick="show_statistics();">Xem chi tiết</div>'.
                      '</div>';
                      $fl = 1;
                      break;
                    }
                }
                if($fl == 0){
                    $list .= 
                            '<div class="container_type-product_content">'.
                            '<h2 style="margin-bottom: 5px;">'. $tenLoai.'</h2>'.
                            '<h3 class="price">0 VND</h3>'.
                            '<h3>Số lượng: <span class="quantity">0</span></h3>'.
                            '<div class="show_content-statistics" id="'.$maLoai.'" onclick="show_statistics();">Xem chi tiết</div>'.
                        '</div>';
                }
            }
            echo $list;
        }

        public function getProduct_Type_Content(){
            $dateBegin = $_POST["begin"];
            $dateEnd = $_POST["end"];
            $id = $_POST["id"];
            $this->listProduct=$this->ThongKeModel->getProduct_Type_Content($dateBegin,$dateEnd,$id);
            if( $this->listProduct == null) return;
            $list = '';
            foreach ($this->listProduct as $key) {
                
                $list .=
                '<tr>'
                      .'<th>'.strtoupper($key["MaHang"]).'</th>'
                      .'<th>'.$key["TenHang"].'</th>'
                      .'<th>'.number_format($key["soLuong"]).'</th>'
                      .'<th>'.number_format($key["total"]).' VND</th>'
                .'</tr>';
            }
            echo $list;
        }

        public function getProduct_Type_Title(){
            $dateBegin = $_POST["begin"];
            $dateEnd = $_POST["end"];
            $id = $_POST["id"];
            $title = $_POST["title"];
            $order = $_POST["order"];
            $list_Product=$this->ThongKeModel->getProduct_Type_Title($dateBegin,$dateEnd,$id,$title,$order);
            if( $this->listProduct == null) return;
            $list = '';
            foreach ($this->listProduct as $key) {
                $list .=
                '<tr>'
                      .'<th>'.strtoupper($key["MaHang"]).'</th>'
                      .'<th>'.$key["TenHang"].'</th>'
                      .'<th>'.number_format($key["soLuong"]).'</th>'
                      .'<th>'.number_format($key["total"]).' VND</th>'
                .'</tr>';
            }
            echo $list;
        }
    }
?>