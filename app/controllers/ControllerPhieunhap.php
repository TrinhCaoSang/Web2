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
      //Lấy data từ model
      $this->list_coupon=$this->coupon->getAllData();
      return $this->view($this->list_coupon,0);
  }

//////////////////////////////////////////////
  public function edit(){
    if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
      //Lấy dữ liệu từ View
   
      $Mahang = $_POST['MaHang'];
      $Maloai = $_POST['MaLoai'];
      $Hinhanh = $_POST['Hinhanh'];
      $Tenhang = $_POST['TenHang'];
      $Dongia = $_POST['DonGia'];
      $Soluong = $_POST['SoLuong'];
   
      if($this->coupon->UpdateData($Mahang,$Maloai,$Hinhanh,$Tenhang,$Dongia,$Soluong)){
         echo "<script> alert('Cập nhật thành công')</script>";
         $this->index();
      } else {
         echo "<script> alert('Cập nhật thất bại.') </script>";
      }
    } else if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $dataID = $this->coupon->getDataID($id);
      
      $this->list_coupon = $this->coupon->getAllData();
      $this->view($this->list_coupon, $dataID);
    }
   }

   //////////////////////////////////////////////////////////
   public function save(){
    if(isset($_POST['save'])){
        //Lấy dữ liệu từ View
        $Mahang=$_POST['productId'];
        $Maloai=$_POST['type_Id'];
        $Hinhanh=$_POST['product_imgs'];
        $Tenhang=$_POST['productName'];
        $Dongia=$_POST['product_price'];
        $Soluong=$_POST['quantity'];
        if($this->coupon->UpdateData($Mahang,$Maloai,$Hinhanh,$Tenhang,$Dongia,$Soluong)){
            echo '<script>changeURL()</script>';
            $this->index();
        }
    }
}
//////////////////////////////////////////////////////////////
public function delete(){
  $id = $_GET['id'];
  $this->coupon->deleteProduct( $id );
  header('Location: index.php?controller=phieunhap');
}

////////////////////////////////////////////////////////////
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

       $this->coupon->addProduct($MaHang, $MaLoai, $target_file, $TenHang, $DonGia, $SoLuong);
  }
  header('Location: index.php?controller=phieunhap');
}

  }
?>
<script>
         function changeURL(){
          var newUrl = "http://localhost/Web2/index.php?controller=phieunhap&action=index"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }
</script>
