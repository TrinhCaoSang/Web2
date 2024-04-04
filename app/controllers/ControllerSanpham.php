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
    
        protected function loadModel($modelPath){
            return require ("./app/models/ModelSanpham.php");
    
        }
        public function index(){
            //Lấy data từ model
            $this->list_product=$this->product->getAllData();
            return $this->view($this->list_product,0);
        }

        
        public function edit(){
            if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
              //Lấy dữ liệu từ View
           
              $Mahang = $_POST['MaHang'];
              $Maloai = $_POST['MaLoai'];
              $Hinhanh = $_POST['Hinhanh'];
              $Tenhang = $_POST['TenHang'];
              $Dongia = $_POST['DonGia'];
              $Soluong = $_POST['SoLuong'];
           
              if($this->product->UpdateData($Mahang,$Maloai,$Hinhanh,$Tenhang,$Dongia,$Soluong)){
                 echo "<script> alert('Cập nhật thành công')</script>";
                 $this->index();
              } else {
                 echo "<script> alert('Cập nhật thất bại.') </script>";
              }
            } else if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $dataID = $this->product->getDataID($id);
              
              $this->list_product = $this->product->getAllData();
              $this->view($this->list_product, $dataID);
            }
           }
        
        public function delete(){
            $id = $_GET['id'];
            $this->product->deleteProduct( $id );
            header('Location: index.php?controller=sanpham');
        }
        
        public function add_product(){
             if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProduct'])){
                  $MaHang = $_POST['MaHang'];
                  $MaLoai = $_POST['MaLoai'];
                  
//Xử lý tải lên hình ảnh
                  $target_dir = "public/database/images/productImgs/";
                  $target_file = $target_dir . basename($_FILES["Hinhanh"]["name"]);
                  move_uploaded_file($_FILES["Hinhanh"]["tmp_name"], $target_file);

                  
                  $TenHang = $_POST['TenHang'];
                  $DonGia = $_POST['DonGia'];
                  $SoLuong = $_POST['SoLuong'];

                  $this->product->addProduct($MaHang, $MaLoai, $target_file, $TenHang, $DonGia, $SoLuong);
             }
             header('Location: index.php?controller=sanpham');
        }
    }
?>
<script>
         function changeURL(){
          var newUrl = "http://localhost/Web2/index.php?controller=sanpham&action=index"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }
</script>