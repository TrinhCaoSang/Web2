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

        public function createJson(){
            $mysqli = new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
            mysqli_set_charset($this->conn,'utf8');
            $sql="SELECT * FROM mathang";
            $result = $mysqli->query($sql);
            while($product = $result->fetch_assoc()){
                $product["Hinhanh"] = base64_encode($product["Hinhanh"]);
                $products[] = $product;
            }
            
            $json_data = json_encode($products, JSON_PRETTY_PRINT);
            file_put_contents('data.json', $json_data);
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
            $this->createJson();
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
            $this->createJson();
            return $data;
        }
    }
?>