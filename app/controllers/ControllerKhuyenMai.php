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

        public function showchitiet(){
            $makm=$_POST['makm'];
            print_r($makm);
            $listCTKM=$this->khuyenmaiModel->getAllDataCTKM($makm);
            $result='<div class="bill_content--model--ctpn" style="height: 30vh;">
            <button class="close" onclick="close_bill()">×</button>
            <h1 class="bill__title">CHI TIẾT KHUYẾN MÃI</h1>
            <table>
              <tr>
                <th class="table--top">Mountain</th>
                <th class="table--top">Road</th>
                <th class="table--top">Kids</th>
                <th class="table--top">Touring</th>
              </tr>
              <tr>
                <th><input type="checkbox" id="checkbox_mt"></th>
                <th><input type="checkbox" id="checkbox_rd"></th>
                <th><input type="checkbox" id="checkbox_kid"></th>
                <th><input type="checkbox" id="checkbox_tr"></th>
              </tr>
            </table>
            <button id="luu" value="'.$makm.'">Lưu</button>
          </div>';
            echo $result;

            foreach($listCTKM as $ctkm){
                if($ctkm['MaKM']==$makm){
                    if($ctkm['MaLoai']=='kid'){
                        echo ' <script>document.getElementById("checkbox_kid").checked=true</script>';
                    }
                    if($ctkm['MaLoai']=='mt'){
                        echo ' <script>document.getElementById("checkbox_mt").checked=true</script>';
                    }
                    if($ctkm['MaLoai']=='rd'){
                        echo ' <script>document.getElementById("checkbox_rd").checked=true</script>';
                    }
                    if($ctkm['MaLoai']=='tr'){
                        echo ' <script>document.getElementById("checkbox_tr").checked=true</script>';
                    }
                }
            }
    
        }
        public function checkMaLoai($makm,$maloai){
            $listCTKM=$this->khuyenmaiModel->getAllDataCTKM($makm);
            foreach($listCTKM as $ctkm){
                if($ctkm['MaLoai']==$maloai){
                    return 0;
                }
            }
            return 1;
        }
        public function luu(){
            $makm=$_POST['makm'];
            $moutain=$_POST['mountain'];
            $kids=$_POST['kids'];
            $road=$_POST['road'];
            $touring=$_POST['touring'];
            $listCTKM=$this->khuyenmaiModel->getAllDataCTKM($makm);
            if($listCTKM==0){
                if($moutain!=null){
                    $this->khuyenmaiModel->InsertCTKM($makm,$moutain);
                }
                if($kids!=null){
                    $this->khuyenmaiModel->InsertCTKM($makm,$kids);
                }
                if($road!=null){
                    $this->khuyenmaiModel->InsertCTKM($makm,$road);
                }
                if($touring!=null){
                    $this->khuyenmaiModel->InsertCTKM($makm,$touring);
                }
            }else{
                if($moutain==null){
                    $this->khuyenmaiModel->DeleteCTKM($makm,'mt');
                }
                elseif($moutain=='mt'&&$this->checkMaLoai($makm,'mt')==1){
                    $this->khuyenmaiModel->InsertCTKM($makm,'mt');
                }
                if($road==null){
                    $this->khuyenmaiModel->DeleteCTKM($makm,'rd');
                }
                elseif($road=='rd'&&$this->checkMaLoai($makm,'rd')==1){
                    $this->khuyenmaiModel->InsertCTKM($makm,'rd');
                }
                if($kids==null){
                    $this->khuyenmaiModel->DeleteCTKM($makm,'kid');
                }
                elseif($kids=='kid'&&$this->checkMaLoai($makm,'kid')==1){
                    $this->khuyenmaiModel->InsertCTKM($makm,'kid');
                }
                if($touring==null){
                    $this->khuyenmaiModel->DeleteCTKM($makm,'tr');
                }
                elseif($touring=='tr'&&$this->checkMaLoai($makm,'tr')==1){
                    $this->khuyenmaiModel->InsertCTKM($makm,'tr');
                }
            }
        }
    }
?>
<script>
         function changeURL(){
          var newUrl = "http://localhost/DoAnWeb/Web2/index.php?controller=khuyenmai&action=index"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }
</script>