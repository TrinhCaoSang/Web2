<?php 
     class ControllerNhanvien{
        private $staff;
        private $list_staff;
        private $id;

          public function __construct()
        {
            $this->loadModel('Nhanvien');
            $this->staff=new ModelNhanvien;
            $this->staff->connect();
            $this->list_staff=$this->staff->getAllData();

        }
        protected function view(array $data=[],$dataID){
            foreach($data as $key=>$value){
                $$key=$value;
            }
            return include("./app/views/admin/ViewNhanvien.php");
        }
        protected function loadModel($modelPath){
            return require ("./app/models/ModelNhanvien.php");
    
        }
        public function index() {
            $this->list_staff = $this->staff->getAllData();
            return $this->view($this->list_staff, 0);
        }

        public function insert() {
            if (isset($_POST['add_nhanvien'])) {
                $TenNV = $_POST['employeeFname'];
                $gioitinh = $_POST['employeeGender'] === 'male' ? 1 : 0;
                $DiaChiNV = $_POST['employeeAddress'];
                $ChucVu = $_POST['employeePosition'] === 'admin' ? 1 : 0;
                $Luong = $_POST['employeeSalary'];
                $ngaydangky = date('Y-m-d');
        
                if ($this->staff->addNhanvien($TenNV, $gioitinh, $DiaChiNV, $ChucVu, $Luong, $ngaydangky)) {
                    echo "<script>alert('Thêm mới nhân viên thành công!');</script>";
                    header('Location: index.php?controller=nhanvien&action=index');
                    exit();
                } else {
                    echo "<script>alert('Thêm mới nhân viên thất bại!');</script>";
                    return $this->index();
                }
            }
        }    


        public function delete() {
            if (isset($_GET['id'])) {
                $this->id = $_GET['id'];               
                    if ($this->staff->deleteNhanvien($this->id)) {
                        echo "<script>alert('Xóa thành công');</script>";
                        $i = 0;
                        foreach ($this->list_staff as $value) {
                            if ($value['MaNV'] == $this->id) {
                                unset($this->list_staff[$i]);
                                break;
                            }
                            $i++;
                        }
                        echo '<meta http-equiv="refresh" content="0;URL=\'index.php?controller=nhanvien&action=index\'">'; // Chuyển hướng sau 0 giây
                    } else {
                        echo "<script>alert('Xóa thất bại');</script>";
                    }
                
            }
        }    

        public function save() {
            if (isset($_POST['save'])) {
                $TenNV = $_POST['employeeFname'];
                $gioitinh = $_POST['employeeGender'] === 'male' ? 1 : 0;
                $DiaChiNV = $_POST['employeeAddress'];
                $ChucVu = $_POST['employeePosition'] === 'admin' ? 1 : 0;
                $Luong = $_POST['employeeSalary'];
                
        
                if (isset($_POST['employeeId'])) {
                    $employeeId = $_POST['employeeId'];
                    echo "employeeId: " . $employeeId . "<br>";
                } else {
                    echo "employeeId not set in POST<br>";
                }
        
                $dataID = $this->getDataID($employeeId); 
                if ($dataID) { 
                    if ($this->staff->UpdateNhanvien($employeeId, $TenNV, $gioitinh, $DiaChiNV, $ChucVu,$Luong)) {
                        
                        header('Location: index.php?controller=nhanvien&action=index');
                        exit(); 
                    } else {
                        echo "<script>alert('Sửa thất bại');</script>";
                        return $this->view($this->list_staff, $dataID);
                    }
                } else {
                    echo "<script>alert('Mã nhân viên không tồn tại');</script>";
                    $this->list_staff = $this->staff->getAllData();
                    return $this->view($this->list_staff, 0);
                }
            }
        }
        
        
        
        
     
        public function edit(){
            if(isset($_GET['id'])){
                $this->id=$_GET['id'];
                $dataID=$this->staff->getDataID($this->id);   
            }
            $this->view($this->list_staff,$dataID);
        }
        
        public function getDataID($id) {
            return $this->staff->getDataID($id);
        }
  
     }
?>
<script>
         function changeURL(){
          var newUrl = "http://localhost/Web2/index.php?controller=nhanvien&action=index"; // Đường dẫn URL mới
          window.history.pushState("", "", newUrl); // Thay đổi đường dẫn URL
        }
</script>