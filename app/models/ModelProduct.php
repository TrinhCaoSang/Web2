<?php
    class ModelProduct{
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

        
        //Phương thức lấy toàn bộ dữ liệu
        public function getAllData(){
            $sql="SELECT * FROM mathang order by DonGia desc";
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

        public function getAllDataType($type){
            $sql="SELECT * FROM mathang WHERE MaLoai = '$type' order by DonGia desc";
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

        public function getProductType($type){
            $sql="SELECT tenhang FROM mathang WHERE MaLoai = '$type' order by DonGia desc";
            $this->execute($sql);
            if($this->num_rows()==0){
                $data=0;
            }
            else{
                while($datas=$this->getData()){
                    $data[]=$datas;
                }
            }
            print_r($data);
            return $data;
        }
        //Phương thức lấy data cần sửa
        public function getDataID($id){
            $sql="SELECT * FROM mathang WHERE MaHang='$id'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data=mysqli_fetch_array($this->result);
            }else{
                $data=0;
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
        //Pagination
        public function pagination($start,$limit){
            $sql="SELECT * FROM mathang ORDER BY DonGia DESC LIMIT $start,$limit";
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

        public function pagination2($type,$start,$limit){
            $sql="SELECT * FROM mathang WHERE MaLoai = '$type' ORDER BY DonGia DESC LIMIT $start,$limit";
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
        public function pagination3($product_name,$start,$limit){
            $sql="SELECT * FROM mathang WHERE TenHang LIKE '%$product_name%' ORDER BY DonGia DESC LIMIT $start,$limit";
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

        public function pagination4($product,$price_to,$price_form,$typecb,$start,$limit){
            $sql="SELECT *
            FROM mathang mh
            LEFT JOIN ctkm ON mh.MaLoai = ctkm.MaLoai 
            LEFT JOIN khuyenmai km ON ctkm.MaKM = km.MaKM 
            WHERE  mh.TenHang LIKE '%$product%'
            AND (km.NgayKTKM > CURRENT_DATE()) && km.PhanTramGG = (
                SELECT MAX(km2.PhanTramGG) 
                FROM khuyenmai km2
                INNER JOIN ctkm ctkm2 ON km2.MaKM = ctkm2.MaKM
                WHERE ctkm2.MaLoai = mh.MaLoai
			)AND
            ( mh.DonGia*(100-km.PhanTramGG)/100 BETWEEN $price_to AND $price_form ) ORDER BY DonGia desc";
            if($typecb != "MaLoai" && $typecb != "all"){
                $sql .= " AND mh.MaLoai = '$typecb'";
            }
            $sql .= " ORDER BY MaHang DESC LIMIT $start,$limit";
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

        public function advanced_search($product,$price_to,$price_form,$typecb){
            $sql="SELECT *
            FROM mathang mh
            LEFT JOIN ctkm ON mh.MaLoai = ctkm.MaLoai 
            LEFT JOIN khuyenmai km ON ctkm.MaKM = km.MaKM 
            WHERE  mh.TenHang LIKE '%$product%'
            AND (km.NgayKTKM > CURRENT_DATE()) && km.PhanTramGG = (
                SELECT MAX(km2.PhanTramGG) 
                FROM khuyenmai km2
                INNER JOIN ctkm ctkm2 ON km2.MaKM = ctkm2.MaKM
                WHERE ctkm2.MaLoai = mh.MaLoai
			)AND
            ( mh.DonGia*(100-km.PhanTramGG)/100 BETWEEN $price_to AND $price_form )";
            if($typecb != "MaLoai" && $typecb != "all"){
                $sql .= " AND mh.MaLoai = '$typecb'";
            }
            $sql .= " ORDER BY MaHang";
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
        public function basic_search($product_name){
            $sql ="SELECT * FROM mathang WHERE TenHang LIKE '%$product_name%' ORDER BY DonGia DESC";
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
        public function getAllDataCTKM(){
            $sql="SELECT * FROM ctkm";
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
        public function getAllDataKM(){
            $sql="SELECT * FROM khuyenmai";
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
    }
?>