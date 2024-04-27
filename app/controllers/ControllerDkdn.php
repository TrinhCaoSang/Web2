<?php

require_once 'Modeldkdn.php';

class ControllerDkdn {
    private $model;

    public function __construct() {
        $this->model = new Modeldkdn();
        $this->model->connect();
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $registerName = $_POST['registerName'];
            $registerEmail = $_POST['registerEmail'];
            $registerPassword = $_POST['registerPassword']; 

            // Kiểm tra sự tồn tại của email
            if ($this->model->checkExistingEmail($registerEmail)) {
                echo json_encode(['error' => 'Email đã tồn tại, vui lòng nhập email khác.']);
                return;
            }

            // Thêm người dùng mới vào cơ sở dữ liệu
            $result = $this->model->addUser($registerName, $registerEmail, $registerPassword);
            if ($result) {
                echo json_encode(['success' => 'Đăng ký thành công.']);
            } else {
                echo json_encode(['error' => 'Có lỗi xảy ra khi thêm dữ liệu.']);
            }
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $loginEmail = $_POST['loginEmail'];
            $loginPassword = $_POST['loginPassword']; 

            $this->model->checkLogin($loginEmail, $loginPassword);
        }
    }
}

?>
