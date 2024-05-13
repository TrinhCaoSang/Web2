<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
    class ControllerSanPham {

        private $product;
        private $list_product;

        private $id;

        public function __construct()
        {
            $this->loadModel('SanPham');
            $this->product=new ModelSanPham;
            $this->product->connect();
            $this->list_product=$this->product->getAllData();
        }

        protected function view(array $data=[],$dataID){
            // foreach($data as $key=>$value){
            //     $$key=$value;
            // }
            return include("./app/views/admin/ViewSanPham.php");
        }
    
        protected function loadModel(){
            return require ("./app/models/ModelSanpham.php");
    
        }
        public function index(){
          // $list_loaisp = $this->product->getAllLoaisp();
          // $list_maHang = $this->product->getAllMatHang();
         
          // $list_product = $this->product->getAllData();
          // $soSanPhamTrenTrang = 4; 
          // $totalRows = count($list_product); 
          // $totalPages = ceil($totalRows / $soSanPhamTrenTrang); 
      
          
          // $page = isset($_GET['page']) ? $_GET['page'] : 1;
          // $start = ($page - 1) * $soSanPhamTrenTrang;
          // $currentProducts = array_slice($list_product, $start, $soSanPhamTrenTrang);

          // if ($page > $totalPages) {
          //   $page = $totalPages;
          // }
      
          // return $this->view([
          //   'list_product' => $currentProducts,
          //   'list_loaisp' => $list_loaisp,
          //   'list_maHang' => $list_maHang,
          //   'totalPages' => $totalPages,
          //   'currentPage' => $page
          // ], 0);
          $this->list_product = $this->product->getAllData();
        return $this->view($this->list_product, 0);
      }
      
        public function getAllMathang(){
            $list_mathang = $this->product->getAllMathang();
            return $list_mathang;
          }
          // public function getMathangInfo() {
          //   if(isset($_POST['MaHang'])) {
          //       $MaHang = $_POST['MaHang'];
          //       $mathangInfo = $this->product->getMathangInfo($MaHang);
          //       ob_get_clean();  
          //       echo json_encode($mathangInfo);
          //       exit();
          //   }
          // }
          
          

          public function edit_pro(){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $dataID=$this->product->getDataID($id);   
            }
            $this->list_product=$this->product->getAllData();
            $this->view($this->list_product,$dataID);
            
          }
          
          
        
    //   public function addSanpham() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $MaHang = $_POST['receipt--MaSP'];
    //         $MaLoai = $_POST['receipt--LoaiSP'];
    //         $Hinhanh = $_POST['file-upload'] ;
    //         $TenHang = $_POST['receipt--TenHang'];
    //         $DonGia = $_POST['receipt--price'];
    //         $SoLuong = 0;
    
    //         $result = $this->product->addSanpham($MaHang, $MaLoai, $Hinhanh, $TenHang, $DonGia, $SoLuong);
    //         if ($result) {
    //             $response = ['success' => true, 'message' => 'Dữ liệu đã được thêm thành công'];
    //         } else {
    //             $response = ['success' => false, 'message' => 'Có lỗi xảy ra khi thêm dữ liệu'];
    //         }
    //     }
    //     ob_clean();
    //     header('Content-Type: application/json');
    //     echo json_encode($response);
    // }

    public function insert() {
        if (isset($_POST['add_Product'])) {
            $MaHang = $_POST['receipt--MaSP'];
            $MaLoai = $_POST['receipt--LoaiSP'];
            $TenHang = $_POST['receipt--TenHang'];
            $DonGia = floatval($_POST['receipt--price']);
            $SoLuong = 0;
    
            // Xử lý hình ảnh
            if (isset($_FILES['imageUrl']) && $_FILES['imageUrl']['error'] == UPLOAD_ERR_OK) {
                $tmpName = $_FILES['imageUrl']['tmp_name'];
                $Hinhanh = addslashes(file_get_contents($tmpName));
            } else {
                $Hinhanh = null;
            }
    
            if ($this->product->addSanpham($MaHang, $MaLoai, $Hinhanh, $TenHang, $DonGia, $SoLuong)) {
                echo "<script>
                      window.onload = function() {
                          swal('Thành công!', 'Thêm mới sản phẩm thành công!', 'success')
                          .then(function() {
                              window.location.href = 'index.php?controller=sanpham&action=index';
                          });
                      };
                      </script>";
            } else {
                echo "<script>
                      window.onload = function() {
                          swal('Thất bại!', 'Thêm mới sản phẩm thất bại!', 'error')
                      };
                      </script>";
            }
        }
    }
    
  
    public function getMathangInfo() {
      if(isset($_POST['MaHang'])) {
          $MaHang = $_POST['MaHang'];
          $mathangInfo = $this->product->getMathangInfo($MaHang);
          if ($mathangInfo) {
            ob_clean();
              header('Content-Type: application/json');
              echo json_encode($mathangInfo);
          } else {
              http_response_code(404);
              echo json_encode(array('error' => 'Không tìm thấy thông tin sản phẩm'));
          }
          exit();
      }
  }
  public function delete() {
    if (isset($_GET['id'])) {
        $this->id = $_GET['id'];

        // Xóa dữ liệu trong bảng login_customer trước khi xóa dữ liệu trong bảng khachhang
       
            if ($this->product->deleteProduct($this->id)) {
                echo "<script>alert('Xóa thành công');</script>";
                $i = 0;
                foreach ($this->list_product as $value) {
                    if ($value['MaHang'] == $this->id) {
                        unset($this->list_product[$i]);
                        break;
                    }
                    $i++;
                }
                echo '<meta http-equiv="refresh" content="0;URL=\'index.php?controller=sanpham&action=index\'">'; // Chuyển hướng sau 0 giây
            } else {
                echo "<script>alert('Xóa thất bại');</script>";
            }
    }
}    
  
public function save() {
    if (isset($_POST['save'])) {
        $MaHang = $_POST['MaSP'];
        $MaLoai = $_POST['MaLoai'];
        if ($_POST['img'] == 'delete') {
            $Hinhanh = null; // Nếu tùy chọn "Xóa hình" được chọn, đặt Hinhanh là null
        } elseif ($_POST['img'] == 'change') {
            if (isset($_FILES['imageUrl']) && $_FILES['imageUrl']['error'] == UPLOAD_ERR_OK) {
                $Hinhanh = file_get_contents($_FILES['imageUrl']['tmp_name']);
            } else {
                $Hinhanh = null; // Nếu không có hình ảnh được tải lên, hãy đặt giá trị Hinhanh là null
            }
        } else { // Tùy chọn "Giữ hình" được chọn
            $dataID = $this->getDataID($MaHang);
            $Hinhanh = $dataID['Hinhanh'];
        }
        $TenHang = $_POST['name'];
        $DonGia = floatval($_POST['priceEditForm']);

        $dataID = $this->getDataID($MaHang); // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        if ($dataID) { // Kiểm tra xem có tìm thấy sản phẩm không
            if ($this->product->UpdateSanpham($MaLoai, $Hinhanh, $TenHang, $DonGia, $MaHang)) {
                // Thực hiện chuyển hướng sau khi cập nhật thành công
                header('Location: index.php?controller=sanpham&action=index');
                exit(); // Kết thúc việc thực thi script
            } else {
                echo "<script>alert('Sửa thất bại');</script>";
                return $this->view($this->list_product, $dataID);
            }
        } else {
            echo "<script>alert('Mã hàng hóa không tồn tại');</script>";
            $this->list_product = $this->product->getAllData();
            return $this->view($this->list_product, 0);
        }
    }
}

public function edit(){
  if(isset($_GET['id'])){
      $this->id=$_GET['id'];
      $dataID=$this->product->getDataID($this->id);   
  }
  $this->view($this->list_product,$dataID);
}

public function getDataID($id) {
  return $this->product->getDataID($id);
}
  
    }
?>
<script>
         function changeURL(){
          var newUrl = "http://localhost/Web2/index.php?controller=sanpham&action=index"; 
          window.history.pushState("", "", newUrl); 
        }
</script>