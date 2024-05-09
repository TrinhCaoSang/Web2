<?php
     class ModelHome{
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

        //Phương thức lấy dữ liệu
        public function getData(){
            if($this->result){
                $data=mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }

        public function execute($sql){
            $this->result=$this->conn->query($sql);
            return $this->result;
        }

        
        //Phương thức lấy toàn bộ dữ liệu
        public function getAllData($type){
            $sql="SELECT * FROM mathang WHERE MaLoai =$type";
            echo $sql;
            $this->execute($sql);
            if($this->num_rows()==0){
                $data=0;
            }
            else{
                while($datas=$this->getData()){
                    $data[]=$datas;
                }
            }

            return $data;
        }
        public function getDataID($id){
            $sql="SELECT * FROM khachhang WHERE MaKH='$id'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data=mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }
        public function getAllDataKH(){
            $sql = "SELECT *, DATE_FORMAT(ngaydangky, '%d/%m/%Y') AS NgayNhapFormatted FROM khachhang";        
            $this->execute($sql);
            if($this->num_rows()==0){
                $data=0;
            }
            else{
                while($datas=$this->getData()){
                    $data[]=$datas;
                }
            }

            return $data;
        }
        //Phương thức đếm số bản ghi
        public function num_rows(){
            if($this->result){
                $num=mysqli_num_rows($this->result);
            }
            else{
                $num=0;
            }
            return $num;
        }

        public function addKhachhang($TenKh, $gioitinh, $Sdt, $DiaChiKh, $ngaydangky) {
            $sql = "INSERT INTO khachhang(TenKh, gioitinh, Sdt, DiaChiKh, ngaydangky) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sisss", $TenKh, $gioitinh, $Sdt, $DiaChiKh, $ngaydangky);
            $result = $stmt->execute();
            $lastInsertId = $stmt->insert_id;
            $stmt->close();
            
            // Trả về ID của hàng vừa được thêm vào
            return $lastInsertId;
        }
        
        public function addLoginCustomer($makh, $Password, $MaQuyen, $status, $ngaydangky) {
            $sql = "INSERT INTO login_customer(MaKH,Password,MaQuyen,status,ngaydangky) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("isiii", $makh, $Password, $MaQuyen, $status, $ngaydangky);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        
        
        
        public function login($username, $password) {
            // Kiểm tra trong bảng khách hàng
            $customer_sql = "SELECT khachhang.TenKh, khachhang.MaKH, login_customer.Password 
                             FROM khachhang 
                             INNER JOIN login_customer ON khachhang.MaKH = login_customer.MaKH 
                             WHERE khachhang.TenKh = ? AND login_customer.Password = ?";
            $customer_stmt = $this->conn->prepare($customer_sql);
            $customer_stmt->bind_param("ss", $username, $password);
            $customer_stmt->execute();
            $customer_result = $customer_stmt->get_result();
        
            // Kiểm tra trong bảng nhân viên
            $staff_sql = "SELECT nhanvien.TenNV, nhanvien.MaNV, login_staff.Password 
                          FROM nhanvien 
                          INNER JOIN login_staff ON nhanvien.MaNV = login_staff.MaNV 
                          WHERE nhanvien.TenNV = ? AND login_staff.Password = ?";
            $staff_stmt = $this->conn->prepare($staff_sql);
            $staff_stmt->bind_param("ss", $username, $password);
            $staff_stmt->execute();
            $staff_result = $staff_stmt->get_result();
        
            // Kiểm tra xem người dùng có tồn tại và mật khẩu khớp không
            if ($customer_result->num_rows > 0) {
                return $customer_result->fetch_assoc(); 
            } elseif ($staff_result->num_rows > 0) {
                return $staff_result->fetch_assoc(); 
            } else {
                return null; 
            }
        }
        
        

    }
?>