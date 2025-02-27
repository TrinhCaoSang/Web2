<?php
class ControllerKhachhang{
    private $client;
    private $list_client;
    private $id;

    protected function loadModel($modelPath){
        return require ("./app/models/ModelKhachhang.php");

    }
    public function __construct()
        {
            $this->loadModel('Khachhang');
            $this->client=new ModelKhachhang;
            $this->client->connect();
            $this->list_client=$this->client->getAllData();
        }
    protected function view(array $data=[],$dataID){
        return include("./app/views/admin/ViewKhachhang.php");
    }

    public function index() {
        $this->list_client = $this->client->getAllData();
        return $this->view($this->list_client, 0);
    }
    
    public function insert() {
        if (isset($_POST['add_khachhang'])) {
            // Không cần truyền MaKH vào hàm addKhachhang vì nó tự động tăng
            $TenKh = $_POST['customerFname'];
            $gioitinh = $_POST['customerGender'] === 'male' ? 1 : 0;
            $Sdt = $_POST['customerPhone'];
            $DiaChiKh = $_POST['customerAddress'];
            $ngaydangky = date('Y-m-d');
    
            if ($this->client->addKhachhang($TenKh, $gioitinh, $Sdt, $DiaChiKh, $ngaydangky)) {
                echo "<script>alert('Thêm mới khách hàng thành công!');</script>";
                header('Location: index.php?controller=khachhang&action=index');
                exit();
            } else {
                echo "<script>alert('Thêm mới khách hàng thất bại!');</script>";
                return $this->index();
            }
        }
    }    
    public function save() {
        header("Content-Type: application/javascript");

        if (isset($_POST['save'])) {
            $customerFname = $_POST['customerFname'];
            $customerGender = $_POST['customerGender'] === 'male' ? 1 : 0;
            $customerPhone = $_POST['customerPhone'];
            $customerAddress = $_POST['customerAddress'];
    
            if (isset($_POST['customerId'])) {
                $customerId = $_POST['customerId'];
                echo "customerId: " . $customerId . "<br>";
            } else {
                echo "customerId not set in POST<br>";
            }
            $dataID = $this->getDataID($customerId); 
            if ($dataID) { 
                if ($this->client->UpdateKhachhang($customerId, $customerFname, $customerGender, $customerPhone, $customerAddress)) {
                    header('Location: index.php?controller=khachhang&action=index');
                    exit(); 
                } else {
                    echo "<script>alert('Sửa thất bại');</script>";
                    return $this->view($this->list_client, $dataID);
                }
            } else {
                echo "<script>alert('Mã khách hàng không tồn tại');</script>";
                $this->list_client = $this->client->getAllData();
                return $this->view($this->list_client, 0);
            }
        }
    }
    
    
    
    
 
    public function edit(){
        if(isset($_GET['id'])){
            $this->id=$_GET['id'];
            $dataID=$this->client->getDataID($this->id);   
        }
        $this->view($this->list_client,$dataID);
    }
    
    public function getDataID($id) {
        return $this->client->getDataID($id);
    }
    
    public function delete() {
        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
    
            // Xóa dữ liệu trong bảng login_customer trước khi xóa dữ liệu trong bảng khachhang
            if ($this->client->deleteFromLoginCustomer($this->id)) {
                if ($this->client->deleteKhachhang($this->id)) {
                    echo "<script>alert('Xóa thành công');</script>";
                    $i = 0;
                    foreach ($this->list_client as $value) {
                        if ($value['MaKH'] == $this->id) {
                            unset($this->list_client[$i]);
                            break;
                        }
                        $i++;
                    }
                    echo '<meta http-equiv="refresh" content="0;URL=\'index.php?controller=khachhang&action=index\'">'; // Chuyển hướng sau 0 giây
                } else {
                    echo "<script>alert('Xóa thất bại');</script>";
                }
            } else {
                echo "<script>alert('Xóa thất bại');</script>";
            }
        }
    }    
}
?>
