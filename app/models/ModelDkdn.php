<?php

class Modeldkdn{
    private $hostname='localhost';
    private $username='root';
    private $pass='';
    private $dbname='dbshop';

    private $conn=NULL;
    private $result=NULL;

    public function connect(){
        $this->conn=new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
        if(!$this->conn){
            echo 'Kết nối thất bại!';
            exit();
        }
        else{
            //Khắc phục lỗi phông tiếng Việt
            mysqli_set_charset($this->conn,'utf8');
        }
        return $this->conn;
    }

    //Thực thi câu lệnh truy vấn
    public function execute($sql){
        $this->result=$this->conn->query($sql);
        return $this->result;
    }

    //Phương thức lấy dữ liệu
    public function getData(){
        if($this->result){
            $data=mysqli_fetch_array($this->result);
        }else{
            $data=0;
        }
        return $data;
    }

    public function checkExistingEmail($email) {
        $sql = "SELECT COUNT(*) AS count FROM user_account WHERE registerEmail = '" . mysqli_real_escape_string($this->conn, $email) . "'";
        $query = $this->execute($sql);
        $row = $this->getData();
        return (int)$row['count'] > 0;
    }

    public function addUser($name, $email, $password) {
        $sql = "INSERT INTO user_account(registerName, registerEmail, registerPassword) VALUES ('$name', '$email', '$password')";
        $query = $this->execute($sql);
        return $query;
    }

    public function checkLogin($loginEmail, $loginPassword) {
        $query = mysqli_query($this->conn, "SELECT id, registerPassword FROM user_account WHERE registerEmail = '" . mysqli_real_escape_string($this->conn, $loginEmail) . "'");
        if (!$query) {
            die (json_encode(['error' => 'Có lỗi xảy ra khi thực hiện truy vấn.']));
        }

        if (mysqli_num_rows($query) == 0) {
            die (json_encode(['error' => 'Địa chỉ email không tồn tại trong hệ thống.']));
        }

        $row = mysqli_fetch_assoc($query);
        $userId = $row['id'];
        $registerPassword = $row['registerPassword'];

        if ($loginPassword === $registerPassword) {
            session_start();
            $_SESSION['user_id'] = $userId; 
            die (json_encode(['success' => 'Đăng nhập thành công.']));
        } else {
            die (json_encode(['error' => 'Mật khẩu không chính xác.']));
        }
    }
}
?>