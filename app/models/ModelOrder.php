<?php
    class ModelOrder{
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

        public function getAllDataHD(){
            $sql="SELECT * FROM hoadon";
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

        public function getAllDataCTHD(){
            $sql="SELECT * FROM cthd";
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

        public function getDataIdCTHD($mahd){
            $sql="SELECT cthd.MaHd,cthd.MaHang,cthd.MaKM,mathang.TenHang,mathang.DonGia,cthd.SoLuong,cthd.ThanhTienCTHD
            FROM cthd
            INNER JOIN mathang ON mathang.MaHang=cthd.MaHang
            WHERE cthd.MaHd='$mahd'";
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

        public function getDataIdHD($mahd){
            $sql="SELECT * FROM hoadon WHERE MaHD='$mahd'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data=mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }

        public function getDataIdMatHang($mahang){
            $sql="SELECT * FROM mathang WHERE MaHang='$mahang'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data=mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }

        public function getDataIdKH($makh){
            $sql="SELECT * FROM khachhang WHERE MaKH='$makh'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data=mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }

        public function UpdateMatHang($mathang){
            $mahang=$mathang['MaHang'];
            $maloai=$mathang['MaLoai'];
            $hinhanh=$mathang['Hinhanh'];
            $tenhang=$mathang['TenHang'];
            $dongia=$mathang['DonGia'];
            $soluong=$mathang['SoLuong'];
            $sql="UPDATE mathang SET MaHang='$mahang',MaLoai='$maloai',Hinhanh='$hinhanh',
            TenHang='$tenhang',DonGia='$dongia',SoLuong='$soluong' 
            WHERE MaHang='$mahang'";
            return $this->execute($sql);
        }

        public function UpdateHoaDon($hoadon){
            $mahd=$hoadon['MaHD'];
            $makh=$hoadon['MaKH'];
            $ngayxuat=$hoadon['NgayXuat'];
            $tongtien=$hoadon['TongTien'];
            $tinhtrang=$hoadon['TinhTrang'];
            $sql="UPDATE hoadon SET MaHD='$mahd',MaKH='$makh',NgayXuat='$ngayxuat',
            TongTien='$tongtien',TinhTrang='$tinhtrang' 
            WHERE MaHD='$mahd'";
            return $this->execute($sql);
        }

        public function DeleteHD($mahd){
            $sql="DELETE FROM hoadon WHERE MaHD='$mahd'";
            return $this->execute($sql);
        }

        public function DeleteCTHD($mahd){
            $sql="DELETE FROM cthd WHERE MaHd='$mahd'";
            return $this->execute($sql);
        }

        public function Search($tinhtrang,$tungay,$denngay){
            $sql="";
            if($tinhtrang=='all'){
                if($tungay==""){
                    $sql="SELECT * 
                    FROM hoadon
                    WHERE hoadon.NgayXuat <= '$denngay'";
                }elseif($denngay==""){
                    $sql="SELECT * 
                    FROM hoadon
                    WHERE hoadon.NgayXuat >= '$tungay'";
                }elseif($tungay=="" && $denngay==""){
                    $sql="SELECT * 
                    FROM hoadon";
                }
                else{
                    $sql="SELECT * 
                    FROM hoadon
                    WHERE hoadon.NgayXuat BETWEEN '$tungay' AND '$denngay'";
                }
            }else{
                if($tungay==""){
                    $sql="SELECT * 
                    FROM hoadon
                    WHERE hoadon.TinhTrang='$tinhtrang' AND hoadon.NgayXuat <= '$denngay'";
                }elseif($denngay==""){
                    $sql="SELECT * 
                    FROM hoadon
                    WHERE hoadon.TinhTrang='$tinhtrang' AND hoadon.NgayXuat >= '$tungay'";
                }elseif($tungay=="" && $denngay==""){
                    $sql="SELECT * 
                    FROM hoadon
                    WHERE hoadon.TinhTrang='$tinhtrang'";
                }
                else{
                    $sql="SELECT * 
                    FROM hoadon
                    WHERE hoadon.TinhTrang='$tinhtrang' AND hoadon.NgayXuat BETWEEN '$tungay' AND '$denngay'";
                }
            }
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