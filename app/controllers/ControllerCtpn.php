<script>
         function changeURL(){
          var newUrl = "http://localhost/Web2/index.php?controller=ctpn&action=index"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }
</script>
<?php 
  class ControllerCtpn{
          private $CTPN;
          private $list_ctpn;

          public function __construct()
        {
            $this->loadModel('Ctpn');
            $this->CTPN=new ModelCtpn;
            $this->CTPN->connect();
        }


        protected function view(array $data=[],$dataID){
          foreach($data as $key=>$value){
              $$key=$value;
          }
          return include("./app/views/admin/ViewCtpn.php");
      }


      protected function loadModel($modelPath){
        return require ("./app/models/ModelCtpn.php");

    }


    public function index(){
      $this->list_ctpn = $this->CTPN->getAllData();
      $list_ncc = $this->CTPN->getAllNCC();
      $list_loaisp = $this->CTPN->getAllLoaisp();
      $list_mapn = $this->CTPN->getMaPN();

      return $this->view([
          'list_ctpn' => $this->list_ctpn,
          'list_ncc'=> $list_ncc,
          'list_loaisp'=> $list_loaisp,
          'list_mapn'=> $list_mapn
      ],0);
  }
public function getNCCName() {
  
  if(isset($_POST['MaNCC'])) {
    
      $MaNCC = $_POST['MaNCC'];
      $TenNCC = $this->CTPN->getNCCName($MaNCC);
      ob_clean();    
      
      echo $TenNCC['TenNCC'];
      
      exit();
      
  }
}
public function getTenSP() {
  
  if(isset($_POST['MaHang'])) {
    
      $MaHang = $_POST['MaHang'];
      $TenHang = $this->CTPN->getTenSP($MaHang);
      
      ob_clean();  
      
      echo $TenHang['TenHang'];
      
      exit();
      
  }
}

public function getGiaSP() {
  
  if(isset($_POST['MaHang'])) {
    
      $MaHang = $_POST['MaHang'];

      $DonGia = $this->CTPN->getGiaSP($MaHang);
      
      ob_clean();    
      
      echo $DonGia['DonGia'];
      exit();
  }
}
public function getAllMathang(){
  $list_mathang = $this->CTPN->getAllMathang();
  return $list_mathang;
}
public function getMathangInfo() {
  if(isset($_POST['MaHang'])) {
      $MaHang = $_POST['MaHang'];
      $mathangInfo = $this->CTPN->getMathangInfo($MaHang);
      ob_clean();    
      echo json_encode($mathangInfo);
      exit();
  }
}
public function updateLoaiSPByNCC() {
  if(isset($_POST['MaNCC'])) {
    $MaNCC = $_POST['MaNCC'];
    $list_loaisp = $this->CTPN->getLoaiSPByNCC($MaNCC);
    ob_clean();  
    echo json_encode($list_loaisp);
    exit();
  }
}
public function getMaSPByLoaiSP() {
  if(isset($_POST['MaLoai'])) {
    $MaLoai = $_POST['MaLoai'];
    $list_maHang = $this->CTPN->getMaSPByLoaiSP($MaLoai); // Lấy danh sách mã sản phẩm theo loại sản phẩm
    ob_clean();  
    echo json_encode($list_maHang);
    exit();
  }
}


public function addCTPN(){
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $maPN = $_POST['receipt'];
      $MaNCC = $_POST['receipt--NCC'];
      $TenNCC = $_POST['receipt--NAMENCC'];
      $maHang = $_POST['receipt--MASP'];
      $TenHang = $_POST['receipt--TenHang'];
      $donGiaPN = $_POST['receipt--price'];
      $soLuong = $_POST['receipt--soluong'];
      $thanhTien = $_POST['receipt--tong'];
    
      $result_ctpn = $this->CTPN->addPhieuNhapToCTPN($maPN, $MaNCC, $TenNCC, $maHang, $TenHang, $donGiaPN, $soLuong, $thanhTien);
      if($result_ctpn){
        $response = ['success' => true, 'message' => 'Chi tiết phiếu nhập đã được thêm thành công'];
    } else {
        $response = ['success' => false, 'message' => 'Có lỗi xảy ra khi thêm chi tiết phiếu nhập'];
    }
      header('Content-Type: application/json');
      echo json_encode($response);
  }
}

public function editPN(){
  if(isset($_GET['id'])){
      $id=$_GET['id'];
      $dataID=$this->CTPN->getDataID($id);   
  }
  // require_once('./app/views/admin/ViewKhuyenMai.php');
  $this->list_ctpn=$this->CTPN->getAllData();
  $this->view($this->list_ctpn,$dataID);
  
}
public function updateCTPN(){
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MaCTPN = $_POST['MaCTPN'];
    $MaPN = $_POST['receipt'];
    $MaNCC = $_POST['receipt--MANCC'];
    $TenNCC = $_POST['receipt--NAMENCC'];
    $MaHang = $_POST['receipt--MASP'];
    $TenHang = $_POST['receipt--TenHang'];
    $DonGiaPN = $_POST['receipt--price'];
    $SoLuong = $_POST['receipt--soluong'];
    $ThanhTienCTPN = $_POST['receipt--tong'];

    $result_ctpn = $this->CTPN->updateCTPNByMaCTPN($MaCTPN, $MaPN, $MaNCC, $TenNCC, $MaHang, $TenHang, $DonGiaPN, $SoLuong, $ThanhTienCTPN);
    
    if($result_ctpn){
      $response = ['success' => true, 'message' => 'Chi tiết phiếu nhập đã được cập nhật thành công'];
    } else {
      $response = ['success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật chi tiết phiếu nhập'];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
}


// public function deleteCTPN(){
//   $id = $_GET['id'];
//   $MaHang = $_GET['MaHang'];
//   $this->CTPN->deleteCTPN($id, $MaHang);
//   header('Location: index.php?controller=ctpn');
// }
public function deleteCTPN(){
      $MaPN = $_GET['MaPN'];
      $MaHang = $_GET['MaHang'];
      $this->CTPN->deleteCTPN($MaPN, $MaHang);
      header('Location: index.php?controller=ctpn');
  }



public function getDataForTable(){
  $data = $this->CTPN->getDataForTable();

  // Định dạng lại ngày theo định dạng 'd/m/Y'
  foreach ($data as &$row) {
    $row['NgayNhap'] = date('dd/mm/YYYY', strtotime($row['NgayNhap']));
}
  header('Content-Type: application/json');
  echo json_encode($data);
}


public function getDataByMaPN($id) {
  $data = $this->CTPN->getDataByMaPN($id);
  header('Content-Type: application/json');
  echo json_encode($data);
}
public function getLoaiSPByNCC($MaNCC) {
  $list_loaiSP = $this->CTPN->getLoaiSPByNCC($MaNCC);
  echo json_encode($list_loaiSP);
}

public function editCTPN(){
  if(isset($_POST['ctpn'])){
    $ctpn = $_POST["ctpn"];
    $ctpnData = explode("-", $ctpn);
    $maPN = $ctpnData[0];
    $maHang = $ctpnData[1];
    $output = '';

    $list_ncc = $this->CTPN->getAllNcc();
    $list_loaisp = $this->CTPN->getAllLoaisp();
    $this->list_ctpn=$this->CTPN->getAllData();
    $list_maHang = $this->CTPN->getAllMathang();
     
    foreach($this->list_ctpn as $item) {
       if($maPN == $item["MaPN"] && $maHang == $item["MaHang"]){
        $output .= '
        <form action="" class="receipt__form" id="form_ctpn">
        <div class="form-group">
          <label for="form__receiptId">Mã phiếu nhập:</label>
          <input type="text" id="form__receipt" name="receipt" value="'.$item['MaPN'].'" disabled>
          
        </div>
        <div class="form-group">
          <label for="form__receipt--NCC">Mã nhà cung cấp:</label>
          <select id="form__receipt--MANCC" name="receipt--LoaiSP">';

          foreach($list_ncc as $ncc):
            $selectedNCC = ($ncc['MaNCC'] == $item['MaNCC']) ? 'selected' : '';
            $output .= '<option value="'.$ncc['MaNCC'].'" '.$selectedNCC.'>'. $ncc['MaNCC'] .'</option>';
           endforeach;
          $output .='</select>
        </div>
        <div class="form-group">
          <label for="form__receipt--NameNCC">Tên nhà cung cấp:</label>
          <input type="text" id="form__receipt--NAMENCC" name="receipt--NAMENCC"  disabled value="'.$item['TenNCC'].'">
        </div>
        <div class="form-group">
          <label for="form__receipt--LoaiSP" >Loại sản phẩm:</label>
          <select id="form__receipt--LoaiSP" name="receipt--LoaiSP" onchange="updateMaSPByLoaiSP(this.value)">';
          foreach($list_loaisp as $loaisp):
           $output .=' <option value="'. $loaisp['MaLoai'].'" > '. $loaisp['TenLoai'] .'</option>';
           endforeach; 
          $output .='</select>
        </div>
        <div class="form-group">
          <label for="form__receipt-MaSP">Mã sản phẩm:</label>
          <select id="form__receipt--MaSP" name="receipt--MASP">';
                
          foreach($list_maHang as $maHang) {
            $selectedMaSP = ($maHang['MaHang'] == $item['MaHang']) ? 'selected' : '';
            $output .= '<option value="'. $maHang['MaHang'].'" '.$selectedMaSP.'>'. $maHang['MaHang'] .'</option>';
          }
       
         $output.= ' </select>
        </div>
        <div class="form-group">
          <label for="form__receipt--TenSP">Tên sản phẩm:</label>
          <input type="text" id="form__receipt--TenSP" name="receipt--LoaiSP" value="'.$item['TenHang'].'" disabled>
        </div>

        
        <div class="form-group">
          <label for="form__receipt--Price">Giá:</label>
          <input type="text" id="form__receipt--Price" name="receipt--price" value="'.$item['DonGiaPN'].'" disabled>
        </div>
        <div class="form-group">
          <label for="form__receipt--soluong">Số lượng:</label>
          <input type="number" id="form__receipt--soluong" name="receipt--soluong" value="'.$item['SoLuong'].'" oninput="calculateTotal()">
        </div>
        <div id="soLuong-error" class="error-message-soLuong"></div>

        <div class="form-group">
          <label for="form__receipt--tong">Tổng:</label>
          <input type="text" id="form__receipt--tong" name="receipt--tong" disabled value="'.$item['ThanhTienCTPN'].'">
        </div>
      </form> ';
      break;
       }
    }
    echo $output;
  }
}

  }
?>