<?php
    class ControllerProduct {

        private $productModel;
        private $listProduct;
        private $listCTKM;
        private $listKM;

        public function __construct()
        {
            $this->loadModel('Product');
            $this->productModel=new ModelProduct;
            $this->productModel->connect();
            $this->listCTKM=$this->productModel->getAllDataCTKM();
            $this->listKM=$this->productModel->getAllDataKM();

        }
        
        protected function view(){
            return include("./app/views/homepage/ViewProduct.php");
        }
        
        protected function loadModel($modelPath){
            return require ("./app/models/ModelProduct.php");
            
        }
        public function index(){
            //Lấy data từ model
            return $this->view();
        }

        function stylenum($num) {
            return number_format($num)." VNĐ";
        }

        public function getMaKM($mathang){
            foreach($this->listCTKM as $km){
                if($mathang['MaLoai']==$km['MaLoai']){
                    return $km;
                }
            }
            return null;
        }

        public function giaKhuyenMai($mathang){
            $dieukien=0;
            $phantramgg=0;
            $giasaukhiKM=$mathang['DonGia'];
            $km=$this->getMaKM($mathang);
            if($km!=null){
                if($mathang['MaLoai']==$km['MaLoai']){
                    foreach($this->listKM as $dskm){
                        if($dskm['MaKM']==$km['MaKM']){
                            if($dskm['PhanTramGG']>$phantramgg){
                                $dieukien=$dskm['dieukien'];
                                $phantramgg=$dskm['PhanTramGG'];
                            }    
                        }
                    }
                }
            }
            if($mathang['DonGia']>=$dieukien){
                $giasaukhiKM=(100-$phantramgg)*$mathang['DonGia']/100;
            }
            
            return $giasaukhiKM;
        }

        public function search(){
            if(isset($_POST["content"])){
                $content =  $_POST["content"];
                $listProduct = $this->productModel->basic_search($content);
                if($listProduct == 0) return;
                $output = '';
                foreach ($listProduct as $data) {
                    $output .= 
                    '<div id="'.$data["MaHang"].'" class="div_search">
                    <div class="search_img">
                        <img src="data:image/jpeg;base64,'.base64_encode($data["Hinhanh"]).'">
                    </div>
                    <div class="container_content-search">
                        <h3>'.$data["TenHang"].'</h3>
                        <h4>'.$this->stylenum($data["DonGia"]).'</h4>
                    </div></div>';
                }
                echo $output;
            }
        }
        public function page(){
            $limit = 6;
            $page = 0;
            $data='';
            $product='';
            $price_to=0;
            $price_form=0;
            $typecb='';
            $output = '';
            if(isset($_POST["product"]) && $_POST["product"] != ''){
                $product = $_POST["product"];
            }else{
                $product = "";
            }

            if(isset($_POST["price_to"]) && $_POST["price_to"] != ''){
                $price_to = $_POST["price_to"];
            }else{
                $price_to = "DonGia";
            }

            if(isset($_POST["price_form"]) && $_POST["price_form"] != ''){
                $price_form = $_POST["price_form"];
            }else{
                $price_form = "DonGia";
            }

            if(isset($_POST["typecb"]) && $_POST["typecb"] != ''){
                $typecb = $_POST["typecb"];
            }else{
                $typecb = "MaLoai";
            }

            if(isset($_POST["page"])){
                $page =  $_POST["page"];
            }else{
                $page = 1;
            }

            if(isset($_POST["type"])){
                $type = $_POST["type"];
            }
            $start = ($page - 1)*$limit;
            if(isset($_POST["content"])){
                $content =  $_POST["content"];
                $data = $this->productModel->pagination3($content,$start,$limit);
                $listProduct = $this->productModel->basic_search($content);
                if($data == 0){
                    echo '<h1>Không tồn tại sản phẩm</h1>';
                    return;
                }
            }
            else if(!isset($_POST["type"])){
                $data = $this->productModel->pagination4($product,$price_to,$price_form,$typecb,$start,$limit);
                $listProduct = $this->productModel->advanced_search($product,$price_to,$price_form,$typecb);
                if($data == 0){
                    echo '<h1>Không tồn tại sản phẩm</h1>';
                    return null;
                }
            }
            else{
                if($type == 'all'){
                    $data = $this->productModel->pagination($start,$limit);
                    $listProduct = $this->productModel->getAllData();
                }else{
                    $data = $this->productModel->pagination2($type,$start,$limit);
                    $listProduct = $this->productModel->getAllDataType($type);
                }
            }
            $count = count($data);
            $output = '';
            $lastproduct = '';
            
            if($count % 2 != 0) {
                $count = $count -1;
                $lastproduct = '
                <div id="content">
                <div id="'.$data[$count]["MaHang"].'" class="divproduct">
                    <div id="img-product">
                        <i class="fa-solid fa-cart-plus"></i>
                        <img src="data:image/jpeg;base64,'.base64_encode($data[$count]["Hinhanh"]).'">
                        <div id="datmua">
                            <h3>Mua ngay</h3>
                        </div>
                    </div>
                    <div id="mota-product"><p>'
                        .$data[$count]['TenHang'] . '</p>' 
                        .'<p>Original Price: <span class="price_padding"><s>'.$this->stylenum($data[$count]['DonGia']) . '</s></span></p>'
                        .'<p>Price: <span class="price_padding_2">' . $this->stylenum($this->giaKhuyenMai($data[$count])) . '</span></p>'.
                    '</div>
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
                        .$data[$i]['TenHang'] . '</p>' 
                        .'<p>Original Price: <span class="price_padding"><s>'.$this->stylenum($data[$i]['DonGia']) . '</s></span></p>'
                        .'<p>Price: <span class="price_padding_2">' . $this->stylenum($this->giaKhuyenMai($data[$i])) . '</span></p>'.
                    '</div>
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
                        .$data[$i]['TenHang'] . '</p>' 
                        .'<p>Original Price: <span class="price_padding"><s>'.$this->stylenum($data[$i]['DonGia']) . '</s></span></p>'
                        .'<p>Price: <span class="price_padding_2">' . $this->stylenum($this->giaKhuyenMai($data[$i])) . '</span></p>'.
                    '</div>
                </div>  
                </div>
                ';
            }
            $output .= $lastproduct;
            $total_record = count($listProduct);
            $total_page = ceil($total_record/$limit);
            $range = 1; 
            $startbtn = $page - $range;
            $endbtn = $page + $range;
            $startbtn = max($startbtn, 1);
            $endbtn = min($endbtn, $total_page);

            $output .= '<ul class="pagination">';
            if($page > 1){
                $previous = $page - 1;
                $output .= '<li class="page-item" id="'.$previous.'">&lt;&lt;</li>';
            }
            for($i=$startbtn; $i<=$endbtn;$i++){
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
                                <span id="overlay-price2" style="color: grey;text-decoration: line-through;">'.$this->stylenum($item["DonGia"]).'</span>
                                <span id="overlay-price" style="color: red;">Price: '.$this->stylenum($this->giaKhuyenMai($item)).'</span>'.
                                '<div class="quantityBtn">
                                    <h3>Số lượng</h3>
                                    <button id="decrement" onclick=quantitydown()>-</button>
                                    <input id="quantity" value=1></input>
                                    <button id="increment" onclick=quantityup()>+</button>
                                </div>
                                <div class="overlay-right-btn">
                                    <button id="addtocart" value="'.$item['MaHang'].'#'.$this->getMaKM($item)['MaKM'].'">
                                    <i class="fa-solid fa-cart-plus"></i>
                                    <p>
                                    Thêm vào giỏ hàng
                                    </p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>';
                    break;
                }
            }
            echo $output;
        }
    }
?>