<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php
    class ControllerHome{
        private $HomeModel;
        private $listProduct;
        
        public function __construct()
        {
            $this->loadModel('Home');
            $this->HomeModel = new ModelHome;
            $this->HomeModel->connect();
        }
        
    
        protected function loadModel($modelPath){
            return require ("./app/models/ModelHome.php");
    
        }
        public function index(){
            
            return include("./app/views/homepage/ViewHome.php");
        }
        
        
        public function register() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $TenKh = $_POST['registerName1'];
                $gioitinh = $_POST['registerGender1'] === 'male' ? 1 : 0;
                $Sdt = $_POST['registerPhone1'];
                $DiaChiKh = $_POST['registeraddress1'];
                $Password = $_POST['registerPassword1'];
                $ngaydangky = date('Y-m-d');
        
                $existingCustomer = $this->HomeModel->getDataID($TenKh);
                if ($existingCustomer) {
                    $makh = $existingCustomer['MaKH'];
                } else {
                    $makh = $this->HomeModel->addKhachhang($TenKh, $gioitinh, $Sdt, $DiaChiKh, $ngaydangky);
                }
        
                if ($makh) {
                    if ($this->HomeModel->addLoginCustomer($makh, $Password, 1, 1, $ngaydangky)) {
                        ob_clean();

                        header('Content-Type: application/json');
                        echo json_encode(array('success' => true, 'message' => 'Đăng ký thành công!'));
                        exit(); 
                    } else {
                        ob_clean();

                        header('Content-Type: application/json');
                        echo json_encode(array('success' => false, 'message' => 'Đăng ký thất bại! Vui lòng kiểm tra lại thông tin.'));
                        exit(); 
                    }
                } else {
                    ob_clean();
                    header('Content-Type: application/json');
                    echo json_encode(array('success' => false, 'message' => 'Đăng ký thất bại! Vui lòng kiểm tra lại thông tin.'));
                    exit(); 
                }
            } 
        }
        
        
        public function login() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['Namelogin'];
                $password = $_POST['PasswordLogin'];
        
                $user = $this->HomeModel->login($username, $password);
                if ($user) {
                    // Đăng nhập thành công, tạo phiên đăng nhập
                    session_start();
                    if (isset($user['MaKH'])) {
                        $_SESSION['user_id'] = $user['MaKH'];
                        $_SESSION['user_type'] = 'customer';
                        $_SESSION['username'] = $user['TenKh'];
                    } else {
                        $_SESSION['user_id'] = $user['MaNV'];
                        $_SESSION['user_type'] = 'staff';
                        $_SESSION['username'] = $user['TenNV'];
                    }
                    ob_clean();
                    header('Content-Type: application/json');
                    echo json_encode(array('success' => true, 'redirect' => 'index.php?controller=home&action=index'));
                    exit;
                } else {
                    // Thông tin đăng nhập không hợp lệ
                    ob_clean();
                    header('Content-Type: application/json');
                    echo json_encode(array('success' => false, 'message' => 'Tên đăng nhập hoặc mật khẩu không chính xác.'));
                    exit;
                }
            } else {
                $this->view();
            }
        }
        
        
        
        
        
                 protected function view(array $data = []) {
            return include("./app/views/homepage/ViewHome.php");
        }
        
    }
?>