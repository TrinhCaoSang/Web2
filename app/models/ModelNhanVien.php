<?php
class ModelNhanvien{
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

    public function execute($sql){
        $this->result=$this->conn->query($sql);
        return $this->result;
    }

    public function getData(){
        if($this->result){
            $data=mysqli_fetch_array($this->result);
        }else{
            $data=0;
        }
        return $data;
    }

    public function num_rows(){
        if($this->result){
            $num=mysqli_num_rows($this->result);
        }
        else{
            $num=0;
        }
        return $num;
    }

    public function getAllData(){
        $sql = "SELECT *, DATE_FORMAT(ngaydangky, '%d/%m/%Y') AS NgayNhapFormatted FROM nhanvien";        
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
    public function getDataID($id) {
        $sql = "SELECT * FROM nhanvien WHERE MaNV = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        } else {
            $data = 0;
        }
        $stmt->close();
        return $data;
    }
    public function addNhanvien($TenNV, $gioitinh, $DiaChiNV, $ChucVu,$Luong, $ngaydangky) {
        $sql = "INSERT INTO nhanvien(TenNV, gioitinh, DiaChiNV, ChucVu, Luong, ngaydangky) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        // Sửa chuỗi định nghĩa kiểu dữ liệu để phản ánh số lượng và kiểu dữ liệu của các tham số
        $stmt->bind_param("sisiss", $TenNV, $gioitinh, $DiaChiNV, $ChucVu,$Luong, $ngaydangky);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function getLastInsertedMaNV() {
        return mysqli_insert_id($this->conn);
    }
    
    public function addPasswordToLoginStaff($MaNV, $Password) {
        $sql = "INSERT INTO login_staff (MaNV, PassWord) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $MaNV, $Password);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function deleteNhanvien($id) {
        $sql = "DELETE FROM nhanvien WHERE MaNV = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function UpdateNhanvien($employeeId, $TenNV, $gioitinh, $DiaChiNV, $ChucVu,$Luong) {
        $sql = "UPDATE nhanvien 
        SET TenNV = ?,
            gioitinh = ?, 
            DiaChiNV = ?,
            ChucVu = ?,
            Luong = ?
        WHERE MaNV = ?";
$stmt = $this->conn->prepare($sql);
$stmt->bind_param("sisiss", $TenNV, $gioitinh, $DiaChiNV, $ChucVu,$Luong,$employeeId);
$result = $stmt->execute();
$stmt->close();
return $result;
    }

    
    
}

?>