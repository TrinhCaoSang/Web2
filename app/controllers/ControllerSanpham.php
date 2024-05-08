<?php
    class ControllerSanPham {

        private $product;
        private $list_product;


        public function __construct()
        {
            $this->loadModel('SanPham');
            $this->product=new ModelSanPham;
            $this->product->connect();
        }

        protected function view(array $data=[],$dataID){
            foreach($data as $key=>$value){
                $$key=$value;
            }
            return include("./app/views/admin/ViewSanPham.php");
        }
    
        protected function loadModel(){
            return require ("./app/models/ModelSanpham.php");
    
        }
        public function index(){
          $list_loaisp = $this->product->getAllLoaisp();
          $list_maHang = $this->product->getAllMatHang();
         
          $list_product = $this->product->getAllData();
          $soSanPhamTrenTrang = 4; 
          $totalRows = count($list_product); 
          $totalPages = ceil($totalRows / $soSanPhamTrenTrang); 
      
          
          $page = isset($_GET['page']) ? $_GET['page'] : 1;
          $start = ($page - 1) * $soSanPhamTrenTrang;
          $currentProducts = array_slice($list_product, $start, $soSanPhamTrenTrang);

          if ($page > $totalPages) {
            $page = $totalPages;
          }
      
          return $this->view([
            'list_product' => $currentProducts,
            'list_loaisp' => $list_loaisp,
            'list_maHang' => $list_maHang,
            'totalPages' => $totalPages,
            'currentPage' => $page
          ], 0);
      }
      
        public function getAllMathang(){
            $list_mathang = $this->product->getAllMathang();
            return $list_mathang;
          }
          public function getMathangInfo() {
            if(isset($_POST['MaHang'])) {
                $MaHang = $_POST['MaHang'];
                $mathangInfo = $this->product->getMathangInfo($MaHang);
                ob_get_clean();  
                echo json_encode($mathangInfo);
                exit();
            }
          }
          
          public function getMaSPByLoaiSP() {
            if(isset($_POST['MaLoai'])) {
              $MaLoai = $_POST['MaLoai'];
              $list_maHang = $this->product->getMaSPByLoaiSP($MaLoai); // Lấy danh sách mã sản phẩm theo loại sản phẩm
              ob_get_clean();
              echo json_encode($list_maHang);
              exit();
            }
          }

          public function edit_pro(){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $dataID=$this->product->getDataID($id);   
            }
            $this->list_product=$this->product->getAllData();
            $this->view($this->list_product,$dataID);
            
          }
          public function getTenSP() {
  
            if(isset($_POST['MaHang'])) {
              
                $MaHang = $_POST['MaHang'];
                $TenHang = $this->product->getTenSP($MaHang);
                
                ob_clean();  
                
                echo $TenHang['TenHang'];
                
                exit();
                
            }
          }
          public function getGiaSP() {
  
            if(isset($_POST['MaHang'])) {
              
                $MaHang = $_POST['MaHang'];
          
                $DonGia = $this->product->getGiaSP($MaHang);
                
                ob_clean();    
                
                echo $DonGia['DonGia'];
                exit();
            }
          }
        public function deleteProduct(){
          
          $MaHang = $_GET['MaHang'];
          $this->product->deleteProduct($MaHang);
          header('Location: index.php?controller=sanpham');
      }
      public function addSanpham() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaHang = $_POST['receipt--MaSP'];
            $MaLoai = $_POST['receipt--LoaiSP'];
            $Hinhanh = $_POST['file-upload'] ;
            $TenHang = $_POST['receipt--TenHang'];
            $DonGia = $_POST['receipt--price'];
            $SoLuong = 0;
    
            $result = $this->product->addSanpham($MaHang, $MaLoai, $Hinhanh, $TenHang, $DonGia, $SoLuong);
            if ($result) {
                $response = ['success' => true, 'message' => 'Dữ liệu đã được thêm thành công'];
            } else {
                $response = ['success' => false, 'message' => 'Có lỗi xảy ra khi thêm dữ liệu'];
            }
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    
    
  

    }
?>
<script>
         function changeURL(){
          var newUrl = "http://localhost/Web2/index.php?controller=sanpham&action=index"; 
          window.history.pushState("", "", newUrl); 
        }
</script>