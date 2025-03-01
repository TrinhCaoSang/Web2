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
        public function index() {
          $list_loaisp = $this->product->getAllLoaisp();
          $list_maHang = $this->product->getAllMatHang();
         
          $list_product = $this->product->getAllData();
          $soSanPhamTrenTrang = 4; 
          $totalRows = count($list_product); 
          $totalPages = ceil($totalRows / $soSanPhamTrenTrang); 
      
          $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
          $page = max(1, min($page, $totalPages)); // Đảm bảo $page không nhỏ hơn 1 và không lớn hơn tổng số trang
      
          $start = ($page - 1) * $soSanPhamTrenTrang;
          $currentProducts = array_slice($list_product, $start, $soSanPhamTrenTrang);
      
          return $this->view([
              'list_product' => $currentProducts,
              'list_loaisp' => $list_loaisp,
              'list_maHang' => $list_maHang,
              'totalPages' => $totalPages,
              'currentPage' => $page, 
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
          public function detail() {
            if (!isset($_POST['id'])) {
                echo json_encode(["success" => false, "message" => "Thiếu ID sản phẩm!"]);
                return;
            }
        
            $id = $_POST['id'];
            $product = $this->product->getDataID($id);
            $list_loaisp = $this->product->getAllLoaisp();
        
            if (!$product) {
                echo json_encode(["success" => false, "message" => "Không tìm thấy sản phẩm!"]);
                return;
            }
        
            $output = '<form id="update-form" class="receipt__form" method="post" enctype="multipart/form-data">
                <input type="hidden" id="form__receipt--MaSP" name="receipt--MaSP" value="' . htmlspecialchars($product["MaHang"]) . '">
        
                <div class="form-group">
                    <label for="form__receipt--LoaiSP">Loại sản phẩm:</label>
                    <select id="form__receipt--LoaiSP" name="receipt--LoaiSP">';
            foreach ($list_loaisp as $loaisp) {
                $selected = ($product["MaLoai"] == $loaisp['MaLoai']) ? 'selected' : '';
                $output .= '<option ' . $selected . ' value="' . $loaisp['MaLoai'] . '">' . $loaisp['TenLoai'] . '</option>';
            }
            $output .= '</select> 
                </div>
        
                <div class="form-group">
                    <label for="form__receipt--TenSP">Tên sản phẩm:</label>
                    <input type="text" id="form__receipt--TenSP" name="receipt--TenHang" value="' . htmlspecialchars($product["TenHang"]) . '">
                </div>
        
                <div class="form-group">
                    <label for="form__receipt--Price">Giá:</label>
                    <input type="text" id="form__receipt--Price" name="receipt--price" value="' . htmlspecialchars($product["DonGia"]) . '">
                </div>
        
                <div class="form-group">
                    <label for="file-upload" class="form__receipt--img">Chọn hình ảnh:</label>
                    <div class="image-container">
                        <input type="file" id="file-upload" name="file-upload" accept="image/*" style="display: none;">
                        <img id="selected-image" src="' . (!empty($product["Hinhanh"]) ? htmlspecialchars($product["Hinhanh"]) : 'uploads/default.jpg') . '" alt="Product Image" style="max-width: 200px; height: auto; cursor: pointer;">
                    </div>
                </div>

        
            </form>
            <div class="button__container--receipt">
                <button type="button" class="customer__form--add2" id="add-btn2" disabled>Lưu</button>            
            </div>   
';
        
            echo $output;
        }
        public function save() {
            header("Content-Type: application/javascript");
            if (!isset($_POST['id'], $_POST['loai'], $_POST['ten'], $_POST['gia'])) {
                echo json_encode(["success" => false, "message" => "Thiếu thông tin sản phẩm!"]);
                return;
            }
        
            $MaHang = $_POST['id'];
            $MaLoai = $_POST['loai'];
            $TenHang = $_POST['ten'];
            $DonGia = $_POST['gia'];
            $Hinhanh = null;
        
            if (!empty($_FILES['file-upload']['name'])) {
                $targetDir = "uploads/";  
                $fileName = basename($_FILES['file-upload']['name']);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
                $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
        
                if (in_array(strtolower($fileType), $allowTypes)) {
                    if (move_uploaded_file($_FILES['file-upload']['tmp_name'], $targetFilePath)) {
                        $Hinhanh = $targetFilePath; 
                    } else {
                        echo json_encode(["success" => false, "message" => "Không thể upload hình ảnh!"]);
                        return;
                    }
                } else {
                    echo json_encode(["success" => false, "message" => "Chỉ chấp nhận các định dạng JPG, JPEG, PNG, GIF, WEBP!"]);
                    return;
                }
            } else {
                $currentProduct = $this->product->getMathangInfo($MaHang);
                if ($currentProduct) {
                    $Hinhanh = $currentProduct['file-upload'];
                }
            }
        
            $result = $this->product->save($MaHang, $MaLoai, $TenHang, $DonGia, $Hinhanh);
        
            if ($result) {
                echo json_encode(["success" => true, "message" => "Sản phẩm đã được cập nhật thành công!"]);
            } else {
                echo json_encode(["success" => false, "message" => "Cập nhật sản phẩm thất bại!"]);
            }
        }
        
        public function deleteProduct(){     
          $MaHang = $_GET['MaHang'];
          $this->product->deleteProduct($MaHang);
          header('Location: index.php?controller=Sanpham');
      }
      public function addSanpham() {
        header("Content-Type: application/javascript");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ob_clean();
            $maLoai = $_POST['receiptLoaiSp'] ?? null;
            $maHang = $_POST['receipt--MaSP'];
            $tenHang = $_POST['receipt--TenHang'];
            $donGia = $_POST['receipt--price'];
            $soLuong = 0;
    
            // Xử lý ảnh
            $targetDir = "uploads/";
            $imagePath = "";
            if (!empty($_FILES['file-upload']['name'])) {
                $targetFile = $targetDir . basename($_FILES['file-upload']['name']);
                if (move_uploaded_file($_FILES['file-upload']['tmp_name'], $targetFile)) {
                    $imagePath = $targetFile;
                }
            }
    
            if ($this->product->addSanpham($maHang, $maLoai, $tenHang, $donGia, $soLuong, $imagePath)) {
                echo json_encode(['success' => true, 'message' => 'Thêm sản phẩm thành công!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Thêm sản phẩm thất bại.']);
            }
        }
        exit();
    }
    
    }
    
    
?>
<script>
         function changeURL(){
          var newUrl = "http://localhost/Web2/index.php?controller=sanpham&action=index"; 
          window.history.pushState("", "", newUrl); 
        }
</script>