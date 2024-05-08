<?php
    class ModelProduct{
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

        
        //Phương thức lấy toàn bộ dữ liệu
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

        public function getAllDataType($type){
            $sql="SELECT * FROM mathang WHERE MaLoai = '$type'";
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

        public function getProductType($type){
            $sql="SELECT tenhang FROM mathang WHERE MaLoai = '$type'";
            $this->execute($sql);
            if($this->num_rows()==0){
                $data=0;
            }
            else{
                while($datas=$this->getData()){
                    $data[]=$datas;
                }
            }
            print_r($data);
            return $data;
        }
        //Phương thức lấy data cần sửa
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
        //Pagination
        public function pagination($start,$limit){
            $sql="SELECT * FROM mathang ORDER BY MaHang DESC LIMIT $start,$limit";
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

        public function pagination2($type,$start,$limit){
            $sql="SELECT * FROM mathang WHERE MaLoai = '$type' ORDER BY MaHang DESC LIMIT $start,$limit";
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
        public function pagination3($product_name,$start,$limit){
            $sql="SELECT * FROM mathang WHERE TenHang LIKE '%$product_name%' ORDER BY MaHang DESC LIMIT $start,$limit";
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

        public function pagination4($product,$price_to,$price_form,$typecb,$start,$limit){
            $product = "%" . $product . "%";
            $sql="SELECT * FROM mathang 
            WHERE  TenHang LIKE '$product' AND ( DonGia BETWEEN $price_to AND $price_form )";
            if($typecb != "MaLoai" && $typecb != "all"){
                $sql .= " AND MaLoai = '$typecb'";
            }
            $sql .= " ORDER BY MaHang DESC LIMIT $start,$limit";
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
        public function advanced_search($product,$price_to,$price_form,$typecb){
            $product = "%" . $product . "%";
            $sql="SELECT * FROM mathang 
            WHERE  TenHang LIKE '$product' AND ( DonGia BETWEEN $price_to AND $price_form )";
            if($typecb != "MaLoai" && $typecb != "all"){
                $sql .= " AND MaLoai = '$typecb'";
            }
            $sql .= " ORDER BY MaHang";
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
        public function basic_search($product_name){
            $sql ="SELECT * FROM mathang WHERE TenHang LIKE '%$product_name%' ORDER BY MaHang DESC";
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
        public function getAllDataCTKM(){
            $sql="SELECT * FROM ctkm";
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
        public function getAllDataKM(){
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
    }
?>