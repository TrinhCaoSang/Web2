<?php
     class ModelHomeAdmin{
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

        public function num_rows(){
            if($this->result){
                $num=mysqli_num_rows($this->result);
            }
            else{
                $num=0;
            }
            return $num;
        }

        public function getDoanhThu(){
        
            $sql="SELECT sum(hd.TongTien) as total FROM hoadon hd WHERE hd.TinhTrang = 'dagiao'";
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

        public function getSoLuongSanPham(){
        
            $sql="SELECT COUNT(mh.MaHang) as total FROM mathang mh";
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

        public function getSoLuongLoai(){
        
            $sql="SELECT COUNT(lh.MaLoai) as total FROM loaihang lh";
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
        
        public function getSoLuongNhanVien(){
        
            $sql="SELECT COUNT(nv.MaNV) as total FROM nhanvien nv";
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

        public function getDonHangChuaXuLy(){
        
            $sql="SELECT COUNT(hd.MaHD) as total FROM hoadon hd WHERE hd.TinhTrang = 'dangchoxuly'";
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
        public function getDonHangDaXuLy(){
        
            $sql="SELECT COUNT(hd.MaHD) as total FROM hoadon hd WHERE hd.TinhTrang = 'dalienlac'";
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