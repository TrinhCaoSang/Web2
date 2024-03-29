<?php
    class ControllerKhuyenMai {

        private $khuyenmaiModel;
        private $listKM;


        public function __construct()
        {
            $this->loadModel('KhuyenMai');
            $this->khuyenmaiModel=new ModelKhuyenMai;
            $this->khuyenmaiModel->connect();
        }

        protected function view(array $data=[],$dataID){
            foreach($data as $key=>$value){
                $$key=$value;
            }
            return include("./app/views/admin/ViewKhuyenMai.php");
        }
    
        protected function loadModel($modelPath){
            return require ("./app/models/ModelKhuyenMai.php");
    
        }
        public function index(){
            //Lấy data từ model
            $this->listKM=$this->khuyenmaiModel->getAllData();
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
                    echo "<script> alert('Thêm mới thành công.')</script>";
                    // header('location:index.php?controller=khuyenmai&action=index');
                    $this->index();
                }
                else{
                    echo "<script> alert('Thêm thất bại.')</script>";
                }
            }   
        }
        public function edit(){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $dataID=$this->khuyenmaiModel->getDataID($id);   
            }
            // require_once('./app/views/admin/ViewKhuyenMai.php');
            $this->listKM=$this->khuyenmaiModel->getAllData();
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
                if($this->khuyenmaiModel->UpdateData($makm,$tenct,$ngaybatdau,$ngayketthuc,$phantramGG,$dieukien)){
                    echo '<script>changeURL()</script>';
                    $this->index();
                }
            }
        }
        public function delete(){
            // if(isset($_GET['id'])){
            //     $id=$_GET['id'];
            //     $tblTable="thanhvien";

            //     if($db->Delete($id,$tblTable)){
            //         header('location:index.php?controller=thanh-vien&action=list');
            //     }
            // }
            // else{
            //     header('location:index.php?controller=thanh-vien&action=list');
            // }
            // //require_once('Views/thanhvien/delete_user.php');
            // break;
        }
        public function search(){
            $key="";
            // $listKM=$this->khuyenmaiModel->SearchData("khuyenmai",$key);
            // return $this->view('frontend.products.show',[
            //     'promotion'=>$listKM,
            // ]);
        }
    }
?>
<script>
         function changeURL(){
          var newUrl = "http://localhost/Web2/index.php?controller=khuyenmai&action=index"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }
</script>