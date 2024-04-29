<?php
    class ControllerKhuyenMai {

        private $khuyenmaiModel;
        private $listKM;
        private $id;


        public function __construct()
        {
            $this->loadModel('KhuyenMai');
            $this->khuyenmaiModel=new ModelKhuyenMai;
            $this->khuyenmaiModel->connect();
            $this->listKM=$this->khuyenmaiModel->getAllData();
        }

        protected function view(array $data=[],$dataID){
            // foreach($data as $key=>$value){
            //     $$key=$value;
            // }
            return include("./app/views/admin/ViewKhuyenMai.php");
        }
    
        protected function loadModel($modelPath){
            return require ("./app/models/ModelKhuyenMai.php");
    
        }
        public function index(){
            return $this->view($this->listKM,0);
        }

        public function insert(){
            if(isset($_POST['add_khuyenmai'])){
                $makm=$_POST['discountId'];
                $tenct=$_POST['programName'];
                $ngaybatdau=$_POST['dayStart'];
                $ngayketthuc=$_POST['dayEnd'];
                $phantramGG=$_POST['percentageReduction'];
                $dieukien=$_POST['costCondition'];
                
                if($this->khuyenmaiModel->InsertData($makm,$tenct,$ngaybatdau,$ngayketthuc,$phantramGG,$dieukien)){
                    //header('location:index.php?controller=khuyenmai&action=index');
                    echo "<script>alert('Thêm mới thành công');</script>";
                    echo '<meta http-equiv="refresh" content="0;URL=\'index.php?controller=khuyenmai&action=index\'">'; // Chuyển hướng sau 0 giây
                }
            }   
        }
        public function edit(){
            if(isset($_GET['id'])){
                $this->id=$_GET['id'];
                $dataID=$this->khuyenmaiModel->getDataID($this->id);   
            }
            $this->view($this->listKM,$dataID);
        }
        public function save(){
            if(isset($_POST['save'])){
                //Lấy dữ liệu từ View
                $makm=$_POST['discountId'];
                $tenct=$_POST['programName'];
                $ngaybatdau=$_POST['dayStart'];
                $ngayketthuc=$_POST['dayEnd'];
                $phantramGG=$_POST['percentageReduction'];
                $dieukien=$_POST['costCondition'];
                $i=0;
                foreach($this->listKM as $value){
                    if($value['MaKM']==$this->id){
                        $this->listKM[$i]['MaKM']=$makm;
                        $this->listKM[$i]['TenCT']=$tenct;
                        $this->listKM[$i]['NgayBDKM']=$ngaybatdau;
                        $this->listKM[$i]['NgayKTKM']=$ngayketthuc;
                        $this->listKM[$i]['PhanTramGG']=$phantramGG;
                        $this->listKM[$i]['dieukien']=$dieukien;
                    }
                    $i++;
                }
                if($this->khuyenmaiModel->UpdateData($makm,$tenct,$ngaybatdau,$ngayketthuc,$phantramGG,$dieukien)){
                    echo "<script>alert('Sửa thành công');</script>";
                    echo '<meta http-equiv="refresh" content="0;URL=\'index.php?controller=khuyenmai&action=index\'">'; // Chuyển hướng sau 0 giây
                }
            }
        }

        public static function checkTinhTrang($khuyenmai){
            $currentDate = date("Y-m-d");
            if($khuyenmai['NgayBDKM']<$khuyenmai['NgayKTKM']&$currentDate<$khuyenmai['NgayKTKM']){
                return 1;
            }
            elseif($khuyenmai['NgayBDKM']<$khuyenmai['NgayKTKM']&$currentDate>$khuyenmai['NgayKTKM']){
                return 0;
            }
            else{
                echo "<script>alert('Lỗi định dạng ngày');</script>";
            }
        }

        public function delete(){
            if(isset($_GET['id'])){
                $this->id=$_GET['id'];
                $i=0;
                if($this->khuyenmaiModel->Delete($this->id)){
                    echo '<script>changeURL()</script>';
                    foreach($this->listKM as $value){
                        if($value['MaKM']==$this->id){
                            unset($this->listKM[$i]);
                            break;
                        }
                        $i++;
                    }
                    echo "<script>alert('Xóa thành công');</script>";
                    echo '<meta http-equiv="refresh" content="0;URL=\'index.php?controller=khuyenmai&action=index\'">'; // Chuyển hướng sau 0 giây
                }
            }
        }
    }
?>
<script>
         function changeURL(){
          var newUrl = "http://localhost/DoAnWeb2/Web2/index.php?controller=khuyenmai&action=index"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }
</script>