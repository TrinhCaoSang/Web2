<?php 
   class ModelPhieunhap{
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
    public function getDataID($id){
        $sql="SELECT * FROM phieunhap WHERE MaPN='$id'";
        $this->execute($sql);
        if($this->num_rows()!=0){
            $data=mysqli_fetch_array($this->result);
        }else{
            $data=0;
        }
        return $data;
    }

    public function getAllData(){
        $sql="SELECT * FROM phieunhap";
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

    public function UpdateData($MaPN, $MaNCC, $NgayNhap, $ThanhTien){
        $sql="UPDATE phieunhap SET MaPN='$MaPN',MaNCC='$MaNCC',NgayNhap='$NgayNhap',ThanhTien=$ThanhTien
        WHERE MaPN='$MaPN";
        return $this->execute($sql);
    }

     public function getAllNCC(){
        $sql = "SELECT * FROM nhacungcap";
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

     public function getNCCName($MaNCC){
        $sql = "SELECT TenNCC FROM nhacungcap WHERE MaNCC='$MaNCC'";
        $this->execute($sql);
        if($this->num_rows() != 0){
            $data = mysqli_fetch_array($this->result);
        } 
        else {
            $data = 0;
        }
        return $data;
    }
    public function getTenSP($MaHang){
         $sql = "SELECT TenHang FROM mathang WHERE MaHang ='$MaHang'";
         $this->execute($sql);
         if($this->num_rows() != 0){
            $data = mysqli_fetch_array($this->result);
        } 
        else {
            $data = 0;
        }
        return $data;
    }
    public function getGiaSP($MaHang){
        $sql = "SELECT DonGia FROM mathang WHERE MaHang ='$MaHang'";
        $this->execute($sql);
        if($this->num_rows() != 0){
           $data = mysqli_fetch_array($this->result);
       } 
       else {
           $data = 0;
       }
       return $data;
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
    
    
    public function getMathangInfo($MaHang){
        $sql = "SELECT TenHang, DonGia FROM mathang WHERE MaHang='$MaHang'";
        $this->execute($sql);
        if($this->num_rows() != 0){
            $data = mysqli_fetch_array($this->result);
        } 
        else {
            $data = 0;
        }
        return $data;
    }
    public function getLoaiSPByNCC($MaNCC){
        $sql = "SELECT lh.* FROM loaihang lh JOIN nhacungcap_sanpham nccsp ON lh.MaLoai = nccsp.MaLoai WHERE nccsp.MaNCC = '$MaNCC'";
        $this->execute($sql);
        $data = [];
        while ($row = $this->getData()){
          $data[]=$row;
        }
        return $data;
      }
      public function getMaSPByLoaiSP($MaLoai){
        $sql = "SELECT mh.* FROM mathang mh JOIN loaihang lh ON mh.MaLoai = lh.MaLoai Where lh.MaLoai = '$MaLoai'  ";
        $this->execute($sql);
        $data = [];
        while ($row = $this->getData()){
            $data[]=$row['MaHang']; // Chỉ lấy giá trị của cột MaHang
        }
        return $data;
    }    
    public function addPhieuNhap($maPN, $NgayNhap, $thanhTien) {
        $sql = "INSERT INTO phieunhap(MaPN,NgayNhap,ThanhTienPN) 
                VALUES ('$maPN', '$NgayNhap', '$thanhTien')";
        $result_phieunhap = $this->execute($sql);
        return $result_phieunhap;
    }
    
    public function addPhieuNhapToCTPN($maPN, $MaNCC, $TenNCC, $maHang, $TenHang, $donGiaPN, $soLuong, $thanhTien) {
        $sql = "INSERT INTO ctpn(MaPN, MaNCC, TenNCC, MaHang, TenHang, DonGiaPN, SoLuong, ThanhTienCTPN) 
                VALUES ('$maPN', '$MaNCC','$TenNCC', '$maHang','$TenHang', '$donGiaPN', '$soLuong', '$thanhTien')";
        $result_ctpn = $this->execute($sql);
        return $result_ctpn;
    }
    
    

    public function getDataForTable(){
        $sql = "SELECT MaPN, MaNCC, ThanhTienPN, NgayNhap FROM phieunhap";
        $this->execute($sql);

        $data = [];
        while ($row = $this->getData()){
            $data[]=[
                'maPhieunhap' => $row['MaPN'],
                'maNhacungcap'=> $row['MaNCC'],
                'tongGiatri' => $row['ThanhTienPN'],
                'ngayNhap' => $row['NgayNhap'],
            ];
        }
        return $data;
    }

    public function getLastInsertedMaPN() {
        return mysqli_insert_id($this->conn);
    }

    
    public function checkPNtontai($maPN) {
           $sql = "SELECT COUNT(*) AS COUNT FROM phieunhap WHERE MaPN = '$maPN'";
           $this->execute($sql);
           $data = $this->getData();
           return $data['COUNT'] > 0;

    }

    public function getctpn($MaPN) {
        $sql = "SELECT * FROM ctpn WHERE MaPN = '$MaPN'";
        
        $this->execute($sql);
        $data = [];
        while ($row = $this->getData()){
            $data[]=$row['MaPN']; 
        }
        return $data;
    }

    
    public function deletePN($id){
        // Xóa tất cả các bản ghi liên quan từ bảng ctpn
        $sqlDeleteChitiet = "DELETE FROM ctpn WHERE MaPN = '$id'";
        $resultDeleteChitiet = $this->execute($sqlDeleteChitiet);
    
       
        if ($resultDeleteChitiet) {
            $sqlDeletePhieunhap = "DELETE FROM phieunhap WHERE MaPN = '$id'";
            $resultDeletePhieunhap = $this->execute($sqlDeletePhieunhap);
            
            if ($resultDeletePhieunhap) {
                return true; 
            } else {
                return false; 
            }
        } else {
            return false; 
        }
    }
    public function getDataByMaPN($id) {
        $sql = "SELECT MaPN, MaNCC, ThanhTienPN FROM phieunhap WHERE MaPN = '$id'";
        $this->execute($sql);
        $data = $this->getData();
        return $data;
    }
    
    public function UpdateDataPN($MaPN,$MaNCC,$NgayNhap,$ThanhTienPN){
        $sql="UPDATE phieunhap SET MaPN='$MaPN',MaNCC='$MaNCC',NgayNhap='$NgayNhap',ThanhTienPN='$ThanhTienPN'
        WHERE MaPN='$MaPN'";
        return $this->execute($sql);
    }

   }
?>