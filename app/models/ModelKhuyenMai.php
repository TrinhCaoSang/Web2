<?php
    class ModelKhuyenMai{
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
            $sql="SELECT * FROM khuyenmai WHERE MaKM='$id'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data=mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }
        //Phương thức lấy toàn bộ dữ liệu
        public function getAllData(){
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


        //Phương thức thêm dữ liệu
        public function InsertData($makm,$tenct,$ngaybatdau,$ngayketthuc,$phantramGG,$dieukien){
            $sql="INSERT INTO khuyenmai(MaKM,TenCT,NgayBDKM,NgayKTKM,PhanTramGG,dieukien) 
            VALUES('$makm','$tenct','$ngaybatdau','$ngayketthuc','$phantramGG','$dieukien')";
            return $this->execute($sql);
        }
        //Phương thức sửa dữ liệu
        public function UpdateData($makm,$tenct,$ngaybatdau,$ngayketthuc,$phantramGG,$dieukien){
            $sql="UPDATE khuyenmai SET MaKM='$makm',TenCT='$tenct',NgayBDKM='$ngaybatdau',NgayKTKM='$ngayketthuc',
            PhanTramGG=$phantramGG,dieukien=$dieukien
            WHERE MaKM='$makm'";
            return $this->execute($sql);
        }
        //Phương thức xóa
        public function Delete($id){
            $sql="DELETE FROM khuyenmai WHERE MaKM='$id'";
            return $this->execute($sql);
        }
        //Phương thức tìm kiếm dữ liệu theo từ khóa
        public function SearchData($table,$key){
            $sql="SELECT * FROM $table WHERE hoten REGEXP '$key' ORDER BY id DESC";
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