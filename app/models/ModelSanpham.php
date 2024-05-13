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
     //Phương thức lấy dữ liệu cần sửa
    //  public function getDataID($id){
    //     $sql="SELECT * FROM mathang WHERE MaHang='$id'";
    //     $this->execute($sql);
    //     if($this->num_rows()!=0){
    //         $data=mysqli_fetch_array($this->result);
    //     }else{
    //         $data=0;
    //     }
    //     return $data;
    // }
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


// public function getImageByMaHang($MaHang){
//     $sql = "SELECT Hinhanh FROM mathang WHERE MaHang ='$MaHang'"; 
//     $this->execute($sql);
//     if($this->num_rows() != 0){
//         $data = mysqli_fetch_array($this->result);
//     } 
//     else {
//         $data = 0;
//     }
//     return base64_encode($data['Hinhanh']);
// }
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


public function addSanpham($MaHang, $MaLoai, $Hinhanh, $TenHang, $DonGia, $SoLuong) {
    
    // $sql = "INSERT INTO mathang(MaHang, MaLoai, Hinhanh, TenHang, DonGia, SoLuong) VALUES (?, ?, ?, ?, ?, ?)";
    $sql = "INSERT INTO mathang(MaHang, MaLoai,Hinhanh, TenHang, DonGia, SoLuong)
    VALUES('$MaHang','$MaLoai','$Hinhanh' ,'$TenHang', $DonGia, $SoLuong)";
    // $stmt = $this->conn->prepare($sql);
    // $stmt->bind_param("ssbsdi", $MaHang, $MaLoai, $Hinhanh, $TenHang, $DonGia, $SoLuong);
    $result_sanpham = $this->execute($sql);
    // $stmt->close();
    return $result_sanpham;
}



public function getMathangInfo($MaHang) {
    $sql = "SELECT * FROM mathang WHERE MaHang = '$MaHang'";
    $this->execute($sql);
    if($this->num_rows() != 0) {
        return $this->getData();
    } else {
        return false;
    }
}

public function UpdateSanpham($MaLoai, $Hinhanh, $TenHang, $DonGia) {
    $sql = "UPDATE mathang 
            SET 
            MaLoai = ?, 
            Hinhanh = ?,
            TenHang = ?,
            DonGia = ?,
            WHERE MaHang = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sbsd", $MaLoai, $Hinhanh, $TenHang, $DonGia);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
// public function addSanpham($MaHang, $MaLoai, $Hinhanh, $TenHang, $DonGia, $SoLuong) {
//     $imgData = base64_encode($Hinhanh);
//     $stmt = $this->conn->prepare("INSERT INTO mathang(MaHang, MaLoai, Hinhanh, TenHang, DonGia, SoLuong) VALUES (?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param("sssbid", $MaHang, $MaLoai, $imgData, $TenHang, $DonGia, $SoLuong);
//     $result_sanpham = $stmt->execute();
//     return $result_sanpham;
// }
}
?>