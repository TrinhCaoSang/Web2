<script>
         function changeURL(){
          var newUrl = "http://localhost/Web2/index.php?controller=phieunhap&action=index"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }
</script>
<?php 
  class ControllerPhieunhap{
          private $coupon;
          private $list_coupon;

          public function __construct()
        {
            $this->loadModel('Phieunhap');
            $this->coupon=new ModelPhieunhap;
            $this->coupon->connect();
        }


        protected function view(array $data=[],$dataID){
          foreach($data as $key=>$value){
              $$key=$value;
          }
          return include("./app/views/admin/ViewPhieunhap.php");
      }


      protected function loadModel($modelPath){
        return require ("./app/models/ModelPhieunhap.php");

    }


    public function index(){
      $this->list_coupon = $this->coupon->getAllData();
      $list_ncc = $this->coupon->getAllNcc();
      $list_loaisp = $this->coupon->getAllLoaisp();

      return $this->view([
          'list_coupon' => $this->list_coupon,
          'list_ncc'=> $list_ncc,
          'list_loaisp'=> $list_loaisp
      ],0);
  }
public function getNCCName() {
  
  if(isset($_POST['MaNCC'])) {
    
      $MaNCC = $_POST['MaNCC'];
      $TenNCC = $this->coupon->getNCCName($MaNCC);
      
      ob_get_clean();  
      
      echo $TenNCC['TenNCC'];
      
      exit();
      
  }
}
public function getTenSP() {
  
  if(isset($_POST['MaHang'])) {
    
      $MaHang = $_POST['MaHang'];
      $TenHang = $this->coupon->getTenSP($MaHang);
      
      ob_get_clean();  
      
      echo $TenHang['TenHang'];
      
      exit();
      
  }
}

public function getGiaSP() {
  
  if(isset($_POST['MaHang'])) {
    
      $MaHang = $_POST['MaHang'];
      $DonGia = $this->coupon->getGiaSP($MaHang);
      
      ob_get_clean();  
      
      echo $DonGia['DonGia'];
      exit();
  }
}
public function getAllMathang(){
  $list_mathang = $this->coupon->getAllMathang();
  return $list_mathang;
}
public function getMathangInfo() {
  if(isset($_POST['MaHang'])) {
      $MaHang = $_POST['MaHang'];
      $mathangInfo = $this->coupon->getMathangInfo($MaHang);
      $output = ob_get_clean();  
      echo json_encode($mathangInfo);
      exit();
  }
}
public function updateLoaiSPByNCC() {
  if(isset($_POST['MaNCC'])) {
    $MaNCC = $_POST['MaNCC'];
    $list_loaisp = $this->coupon->getLoaiSPByNCC($MaNCC);
    ob_get_clean();
    echo json_encode($list_loaisp);
    exit();
  }
}
public function getMaSPByLoaiSP() {
  if(isset($_POST['MaLoai'])) {
    $MaLoai = $_POST['MaLoai'];
    $list_maHang = $this->coupon->getMaSPByLoaiSP($MaLoai); // Lấy danh sách mã sản phẩm theo loại sản phẩm
    $output = ob_get_clean();
    echo json_encode($list_maHang);
    exit();
  }
}


public function addPhieuNhap(){
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $maPN = $_POST['receipt'];
      
      $NgayNhap = $_POST['ngayNhap'];
      $thanhTien = 0; 
          $result = $this->coupon->addPhieuNhap($maPN, $NgayNhap, $thanhTien);
          if($result) {
              $response = ['success' => true, 'message' => 'Dữ liệu đã được thêm thành công'];
          } else {
              $response = ['success' => false, 'message' => 'Có lỗi xảy ra khi thêm dữ liệu'];
          }
      }
      header('Content-Type: application/json');
      echo json_encode($response);
  }


public function editPN(){
  if(isset($_GET['id'])){
      $id=$_GET['id'];
      $dataID=$this->coupon->getDataID($id);   
  }
  $this->list_coupon=$this->coupon->getAllData();
  $this->view($this->list_coupon,$dataID);
  
}
public function save(){
  if(isset($_POST['save'])){
      //Lấy dữ liệu từ View
      $MaPN=$_POST['receipt'];
      $MaNCC=$_POST['receipt--NCC'];
      $NgayNhap=$_POST['dayStart'];
      
      $ThanhTienPN=$_POST['receipt--tong'];
      if($this->coupon->UpdateDataPN($MaPN,$MaNCC,$NgayNhap,$ThanhTienPN)){
          echo '<script>changeURL()</script>';
          $this->index();
      }
  }
}
public function deletePN(){
  $id = $_GET['id'];
  $this->coupon->deletePN($id);
  header('Location: index.php?controller=phieunhap');
}


public function getDataForTable(){
  $data = $this->coupon->getDataForTable();

  // Định dạng lại ngày theo định dạng 'd/m/Y'
  foreach ($data as &$row) {
    $row['NgayNhap'] = date('dd/mm/YYYY', strtotime($row['NgayNhap']));
}
  header('Content-Type: application/json');
  echo json_encode($data);
}


public function getDataByMaPN($id) {
  $data = $this->coupon->getDataByMaPN($id);
  header('Content-Type: application/json');
  echo json_encode($data);
}


public function getChiTietPhieuNhap() {
  if(isset($_GET['MaPN'])) {
      $maPN = $_GET['MaPN'];
      $data = $this->coupon->getChiTietPhieuNhap($maPN);
      // foreach($data as &$row){
      //      $row['MaPN'] = 
      // }
  }
}

  }
?>