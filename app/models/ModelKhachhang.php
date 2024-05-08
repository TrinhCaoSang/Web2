<?php  
class ModelKhachhang{
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

    public function getDataID($id) {
        $sql = "SELECT * FROM khachhang WHERE MaKH = ?";
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
    


    public function getAllData(){
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


    
    public function addKhachhang($TenKh, $gioitinh, $Sdt, $DiaChiKh, $ngaydangky) {
        $sql = "INSERT INTO khachhang(TenKh, gioitinh, Sdt, DiaChiKh, ngaydangky) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        // Sửa chuỗi định nghĩa kiểu dữ liệu để phản ánh số lượng và kiểu dữ liệu của các tham số
        $stmt->bind_param("sisss", $TenKh, $gioitinh, $Sdt, $DiaChiKh, $ngaydangky);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    
    
    
    

public function deleteFromLoginCustomer($id) {
    $sql = "DELETE FROM login_customer WHERE MaKH = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

    
public function deleteKhachhang($id) {
    $sql = "DELETE FROM khachhang WHERE MaKH = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

// public function UpdateKhachhang($MaKH,$TenKh, $gioitinh, $Sdt, $DiaChiKh) {
//     $sql = "UPDATE khachhang SET MaKH = '$MaKH',TenKh = '$TenKh', gioitinh = ' $gioitinh', Sdt = '$Sdt', DiaChiKh = '$DiaChiKh' WHERE MaKH = ' $MaKH'";
//     // $stmt = $this->conn->prepare($sql);
//     // $stmt->bind_param("sisss", $TenKh, $gioitinh, $Sdt, $DiaChiKh, $MaKH);
//     // $result = $stmt->execute();
//     // $stmt->close();
//     return $this->execute( $sql);
// }
public function UpdateKhachhang($customerId, $customerFname, $customerGender, $customerPhone, $customerAddress) {
    $sql = "UPDATE khachhang 
            SET TenKh = ?,
                gioitinh = ?, 
                Sdt = ?,
                DiaChiKh = ?
            WHERE MaKH = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sisss", $customerFname, $customerGender, $customerPhone, $customerAddress, $customerId);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}






}

?>