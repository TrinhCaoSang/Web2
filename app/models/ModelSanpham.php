<?php 
class ModelSanpham {
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
    public function getDataID($id) {
        $sql = "SELECT * FROM mathang WHERE MaHang = ?";
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
        $sql = "SELECT * FROM mathang";        
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
    public function num_rows(){
        if($this->result){
            $num=mysqli_num_rows($this->result);
        }
        else{
            $num=0;
        }
        return $num;
    } 
public function getAllMathang(){
    $sql = "SELECT MaHang, TenHang, DonGia FROM mathang";
    $this->execute($sql);
    $data = [];
    while ($row = $this->getData()){
        $data[]=$row;
    }
    return $data;
}
public function getAllLoaiSP(){
    $sql = "SELECT * FROM loaihang";
    $this->execute($sql);
    $data = [];
    while ($row = $this->getData()){
        $data[]=$row;
    }
    return $data;
 }
 public function save($MaHang, $MaLoai, $TenHang, $DonGia, $Hinhanh = null) {
    if ($Hinhanh) {
        $sql = "UPDATE mathang 
                SET MaLoai = ?, 
                    TenHang = ?, 
                    DonGia = ?, 
                    Hinhanh = ?
                WHERE MaHang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdss", $MaLoai, $TenHang, $DonGia, $Hinhanh, $MaHang);
    } else {
        $sql = "UPDATE mathang 
                SET MaLoai = ?, 
                    TenHang = ?, 
                    DonGia = ?
                WHERE MaHang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdi", $MaLoai, $TenHang, $DonGia, $MaHang);
    }

    $result = $stmt->execute();
    $stmt->close();
    return $result;
}



public function getTotalProducts() {
    $sql = "SELECT COUNT(*) as total FROM mathang";
    $this->execute($sql);
    $row = $this->getData();
    return $row['total'];
}
public function deleteProduct($MaHang){
    $sqlDeleteProduct = "DELETE FROM mathang WHERE MaHang = ?";
    $stmt = $this->conn->prepare($sqlDeleteProduct);
    $stmt->bind_param("s", $MaHang);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

public function addSanpham($maHang, $maLoai, $tenHang, $donGia, $soLuong, $imagePath) {
    $stmt = $this->conn->prepare("INSERT INTO mathang (MaHang, MaLoai, TenHang, DonGia, SoLuong, HinhAnh) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdss", $maHang, $maLoai, $tenHang, $donGia, $soLuong, $imagePath);
    return $stmt->execute();
}

public function getMathangInfo($MaHang) {
    $sql = "SELECT * FROM mathang WHERE MaHang = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $MaHang);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}


public function getSanPhamPhanTrang($itemsPerPage, $offset) {
    $sql = "SELECT mathang.*, loaihang.TenLoai 
            FROM mathang 
            LEFT JOIN loaihang ON mathang.MaLoai = loaihang.MaLoai 
            LIMIT ? OFFSET ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $itemsPerPage, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}
}
?>