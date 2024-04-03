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


    //Phương thức lấy dữ liệu cần sửa
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

    public function getAllData(){
        $sql="SELECT * FROM mathang";
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

    public function UpdateData($mahang,$maloai,$hinhanh,$tenhang,$dongia,$soluong){
        $sql="UPDATE mathang SET MaHang='$mahang',MaLoai='$maloai',Hinhanh='$hinhanh',TenHang='$tenhang',
        DonGia=$dongia,SoLuong=$soluong
        WHERE MaHang='$mahang'";
        return $this->execute($sql);
    }

     //Phương thức xóa
     public function deleteProduct($id){
          $sql="DELETE FROM mathang WHERE MaHang='$id'";
          $query = mysqli_query($this->conn,$sql);
          return $query;
    }

    public function addProduct($mahang, $maloai, $hinhanh, $tenhang, $dongia, $soluong){
        $query = "SELECT * FROM loaihang WHERE MaLoai = '$maloai'";
        $result = $this->execute($query);
        if(mysqli_num_rows($result)== 0){
            die("Loại sản phẩm không tồn tại!");
        }
    
        $sql= "INSERT INTO mathang(MaHang,MaLoai,Hinhanh,TenHang,DonGia,SoLuong) VALUES ('$mahang','$maloai','$hinhanh','$tenhang','$dongia','$soluong')";
        return $this->execute($sql);
    }



   }
?>