<?php
    class ModelCart{
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
        public function getDataID_CTHD($id){
            $sql="SELECT * FROM cthd WHERE MaHd='$id'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data=mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }
        //Phương thức lấy toàn bộ dữ liệu
        public function getAllData($condition,$makh){
            // $sql="SELECT * FROM hoadon WHERE TinhTrang='$condition'";
            $sql="SELECT hoadon.MaHD,hoadon.MaKH,hoadon.NgayXuat,hoadon.TinhTrang,
            cthd.MaHang,cthd.DonGiaCTHD,cthd.SoLuong,cthd.ThanhTienCTHD,
            mathang.TenHang,mathang.Hinhanh
            FROM hoadon
            INNER JOIN cthd ON hoadon.MaHD=cthd.MaHd
            INNER JOIN mathang ON mathang.MaHang=cthd.MaHang
            WHERE hoadon.TinhTrang='$condition' AND hoadon.MaKH='$makh'";
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
        public function InsertDataHD($mahd,$makh,$ngayxuat,$tongtien,$tinhtrang){
            $sql="INSERT INTO hoadon(MaHD,MaKH,NgayXuat,TongTien,TinhTrang) 
            VALUES('$mahd','$makh','$ngayxuat','$tongtien','$tinhtrang')";
            return $this->execute($sql);
        }
        public function InsertDataCTHD($mahd,$mahang,$dongiacthd,$soluong,$thanhtiencthd,$makm){
            $sql="INSERT INTO cthd(MaHD,MaHang,MaKM,DonGiaCTHD,SoLuong,ThanhTienCTHD) 
            VALUES('$mahd','$mahang','$makm','$dongiacthd','$soluong','$thanhtiencthd')";
            return $this->execute($sql);
        }

        public function DeleteCTHD($mahd,$mahang){
            $sql="DELETE FROM cthd WHERE MaHd='$mahd' AND MaHang='$mahang'";
            return $this->execute($sql);
        }

        public function XoaCTHD($mahd){
            $sql="DELETE FROM cthd WHERE MaHd='$mahd'";
            return $this->execute($sql);
        }
        public function XoaHD($mahd){
            $sql="DELETE FROM hoadon WHERE MaHD='$mahd'";
            return $this->execute($sql);
        }
        
        public function SuaCTHD($donhang){
            $mahd=$donhang['MaHd'];
            $mahang=$donhang['MaHang'];
            $makm=$donhang['MaKM'];
            $dongiacthd=$donhang['DonGiaCTHD'];
            $soluong=$donhang['SoLuong'];
            $thanhtien=$donhang['ThanhTienCTHD'];

            $sql="UPDATE cthd SET MaHd='$mahd',MaHang='$mahang',MaKM='$makm',
            DonGiaCTHD='$dongiacthd',SoLuong='$soluong',ThanhTienCTHD='$thanhtien' 
            WHERE MaHd='$mahd' AND MaHang='$mahang'";
            return $this->execute($sql);
        }

        public function getDHCanSua($mahd,$mahang){
            $sql="SELECT * FROM cthd WHERE MaHd='$mahd' AND MaHang='$mahang'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data=mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }

        public function SearchDHCanXoa($makh){
            $sql="SELECT hoadon.MaHD
            FROM hoadon
            INNER JOIN cthd ON hoadon.MaHD=cthd.MaHd
            WHERE hoadon.MaKH='$makh' AND hoadon.TinhTrang='dangchoxuly'";
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