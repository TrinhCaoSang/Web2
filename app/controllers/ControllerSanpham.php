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
          
          


          public function detail(){
            $id=$_POST['id'];
            $output = '';
            $product = $this->product->getDataID($id);
            $list_loaisp = $this->product->getAllLoaisp();
            // print_r($product);
            $output .= '<form action="" class="receipt__form" method="post" enctype="multipart/form-data">
                  <div  class="receipt__form">
                    <div class="form-group">
                      <label for="form__receipt--LoaiSP" >Loại sản phẩm:</label>
                      <select id="form__receipt--LoaiSP" name="receipt--LoaiSP" >';
                      foreach($list_loaisp as $loaisp){
                        if($product["MaLoai"] == $loaisp['MaLoai']){
                            $output .= '<option selected value="'. $loaisp['MaLoai'] .'" > '.$loaisp['TenLoai'] .'</option>';
                        }else{
                            $output .= '<option value="'. $loaisp['MaLoai'] .'" > '.$loaisp['TenLoai'] .'</option>';
                        }
                      };
                      $output .='
                      </select> 
                    </div>
                    <div id="LoaiSp-error" class="error-message"></div>

                    <div class="form-group">
                      <label for="form__receipt-MaSP">Mã sản phẩm:</label>
                    
                      <input type="text" id="form__receipt--MaSP" name="receipt--MaSP" value="'.$product["MaHang"].'" disabled>

                    </div>
                    <div id="MaSP-error" class="error-message"></div>

                    <div class="form-group">
                      <label for="form__receipt--TenSP">Tên sản phẩm:</label>
                      <input type="text" id="form__receipt--TenSP" name="receipt--TenHang" value="'.$product["TenHang"].'">
                    </div>
                    <div id="TenSp-error" class="error-message"></div>

                    <div class="form-group">
                      <label for="form__receipt--Price">Giá:</label>
                      <input type="text" id="form__receipt--Price" name="receipt--price" value="'.$product["DonGia"].'">
                    </div>
                    <div id="GiaSp-error" class="error-message"></div>

                    <div class="form-group">
                    <label for="form__receipt--img" class="form__receipt--img">Chọn hình ảnh:</label>
                      <div class="image-container">
                        <label for="file-upload" class="custom-file-upload">
                          <!-- <span>Chọn hình ảnh</span> -->
                        </label>
                        <img id="selected-image" src="data:image/jpeg;base64,'.base64_encode($product["Hinhanh"]).'" alt="Preview Image">
                      </div>
                    </div>
                    <div id="ImageSp-error" class="error-message"></div>
                    <input id="file-upload" type="file"  onchange="previewImage(event)">
                  </form>';
            echo $output;
          }

          public function edit_pro(){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $dataID=$this->product->getDataID($id);   
            }
            $this->list_product=$this->product->getAllData();
            $this->view($this->list_product,$dataID);
            
          }
         
         
        public function deleteProduct(){
          
          $MaHang = $_GET['MaHang'];
          $this->product->deleteProduct($MaHang);
          header('Location: index.php?controller=sanpham');
      }

      public function save(){
        $MaHang = $_POST['id'];
        $MaLoai = $_POST['loai'];
        $TenHang = $_POST['ten'];
        $DonGia = $_POST['gia'];
        $result = $this->product->save($MaHang, $MaLoai, $TenHang, $DonGia);
      }

      public function addSanpham() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaHang = $_POST['receipt--MaSP'];
            $MaLoai = $_POST['receipt--LoaiSP'];
            $Hinhanh = addslashes(file_get_contents($_POST['file-upload'])) ;
            $TenHang = $_POST['receipt--TenHang'];
            $DonGia = $_POST['receipt--price'];
            $SoLuong = 0;
            // echo '<script>console.log('.$Hinhanh.')</script>';
            // echo '<script>console.log("OK")</script>';
    
            $result = $this->product->addSanpham($MaHang, $MaLoai, $Hinhanh, $TenHang, $DonGia, $SoLuong);
            if ($result) {
                $response = ['success' => true, 'message' => 'Dữ liệu đã được thêm thành công'];
            } else {
                $response = ['success' => false, 'message' => 'Có lỗi xảy ra khi thêm dữ liệu'];
            }
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        header('Location: index.php?controller=sanpham&action=index');
    }
    }
?>
<script>
         function changeURL(){
          var newUrl = "http://localhost/Web2/index.php?controller=sanpham&action=index"; 
          window.history.pushState("", "", newUrl); 
        }
</script>