<?php
    class ControllerProduct {

        private $productModel;
        private $listProduct;


        public function __construct()
        {
            $this->loadModel('Product');
            $this->productModel=new ModelProduct;
            $this->productModel->connect();
        }

        protected function view(array $data=[],$dataID){
            foreach($data as $key=>$value){
                $$key=$value;
            }
            return include("./app/views/homepage/ViewProduct.php");
        }
    
        protected function loadModel($modelPath){
            return require ("./app/models/ModelProduct.php");
    
        }
        public function index(){
            //Lấy data từ model
            $this->listProduct=$this->productModel->getAllData();
            return $this->view($this->listProduct,0);
        }

        public function detail(){
            $id = $_POST["product"];
            $output = '';
            $this->listProduct=$this->productModel->getAllData();
            foreach($this->listProduct as $item){
                if($id == $item["MaHang"]){
                    $output .= '
                    <div class="overlay-container">
                        <div class="overlay-container-top">
                            <div class="overlay-container-title">
                                <div class="overlay-prev" id="close-toggler">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                        Trở về
                                </div>
                            </div>
                            <div class="overlay-container-btn">
                                <a href="../cart/cart.html">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                        <div class="overlay-body">
                            <div class="overlay-body-left">
                                <img class="#overlay-img" id="imgdetail" src="data:image/jpeg;base64,'.base64_encode($item["Hinhanh"]).'">
                            </div>
                            <div class="overlay-body-right">
                                <h1 class="name" id="name">'.$item['TenHang'].'</h1>
                                <span id="overlay-price">Price: '.$item['DonGia'].'</span>
                                <div class="quantityBtn">
                                    <h3>Số lượng</h3>
                                    <button id="decrement" onclick=quantitydown()>-</button>
                                    <input id="quantity" value=1></input>
                                    <button id="increment" onclick=quantityup()>+</button>
                                </div>
                                <div class="overlay-right-btn">
                                    <a href="index.php?controller=cart&action=store&id='.$item['MaHang'].' "id="overlay-add-cart">
                                        <button >
                                        <i class="fa-solid fa-cart-plus"></i>
                                        <p>
                                        Thêm vào giỏ hàng
                                        </p>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>';
                    break;
                }
            }
            echo $output;
        }

        public function page(){
            $limit = 8;
            $page = 0;
            $output = '';
            if(isset($_POST["page"])){
                $page =  $_POST["page"];
            }else{
                $page = 1;
            }
            $start = ($page - 1)*$limit;
            $data = $this->productModel->pagination($start,$limit);
            $count = count($data);
            $output = '';
            $lastproduct = '';
            if($count % 2 != 0) {
                $count = $count -1;
                $lastproduct = '
                <div id="content">
                <div onclick=showinfo_product("'.$data[$count]["MaHang"].'") class="divproduct">
                    <div id="img-product">
                        <i class="fa-solid fa-cart-plus"></i>
                        <img src="data:image/jpeg;base64,'.base64_encode($data[$count]["Hinhanh"]).'">
                        <div id="datmua">
                            <h3>Mua ngay</h3>
                        </div>
                    </div>
                    <div id="mota-product"><p>'
                        .$data[$count]['TenHang'] . '<br>' 
                        .'Price: ' . $data[$count]['DonGia'] . '</p>
                    </div>
                    </div><div class="divproduct"></div>
                </div>';
            }
            for ($i = 0; $i <= $count-1; $i++){
                // <div onclick=showinfo_product("'.$data[$i]["MaHang"].'") class="divproduct">
                $output .= '
                <div id="content">
                <div id="'.$data[$i]["MaHang"].'" class="divproduct">
                    <div id="img-product">
                        <i class="fa-solid fa-cart-plus"></i>
                        <img src="data:image/jpeg;base64,'.base64_encode($data[$i]["Hinhanh"]).'">
                        <div id="datmua">
                            <h3>Mua ngay</h3>
                        </div>
                    </div>
                    <div id="mota-product"><p>'
                        .$data[$i]['TenHang'] . '<br>' 
                        .'Price: ' . $data[$i]['DonGia'] . '</p>
                    </div>
                </div>
                <div id="'.$data[++$i]["MaHang"].'" class="divproduct">
                    <div id="img-product">
                        <i class="fa-solid fa-cart-plus"></i>
                        <img src="data:image/jpeg;base64,'.base64_encode($data[$i]['Hinhanh']).'">
                        <div id="datmua">
                            <h3>Mua ngay</h3>
                        </div>
                    </div>
                    <div id="mota-product"><p>'
                        .$data[$i]['TenHang'] . '<br>' 
                        .'Price: ' . $data[$i]['DonGia'] . '</p>
                    </div>
                </div>
                </div>
                ';
            }
            $output .= $lastproduct;
            $this->listProduct=$this->productModel->getAllData();
            $total_record = count($this->listProduct);
            $total_page = ceil($total_record/$limit);
            $output .= '<ul class="pagination">';
            if($page > 1){
                $previous = $page - 1;
                $output .= '<li class="page-item" id="'.$previous.'">&lt;&lt;</li>';
            }
            for($i=1; $i<=$total_page;$i++){
                $active_class = "";
                if($i == $page){
                    $active_class = "-active";
                }
                $output .= '<li class="page-item'.$active_class.'" id="'.$i.'">'.$i.'</li>';
            }
            if($page < $total_page){
                $page++;
                $output .= '<li class="page-item" id="'.$page.'">&gt;&gt;</li>';
            }
            $output .='</ul>';
            echo $output;
        }
    }
?>