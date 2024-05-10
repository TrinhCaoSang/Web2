<?php 
class ModelThongKe{
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
 

    public function getAllData(){
        $sql="SELECT * FROM hoadon";
        $this->execute($sql);
        $data = [];
        while ($datas = $this->getData()){
            $data[]=$datas;
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
 
    public function getProduct_Top($top,$dateBegin,$dateEnd){
        
        $sql="SELECT cthd.MaHang  , mh.TenHang, mh.MaLoai,lh.TenLoai, sum(cthd.SoLuong) as soLuong , sum(cthd.ThanhTienCTHD) as total
        FROM hoadon hd
        Join cthd on hd.MaHD = cthd.MaHd
        LEFT join mathang mh on cthd.MaHang = mh.MaHang 
        LEFT join loaihang lh on mh.MaLoai = lh.MaLoai
        WHERE TinhTrang = 'dagiao' and ( hd.NgayXuat BETWEEN '$dateBegin' AND '$dateEnd')
        GROUP by cthd.MaHang , mh.TenHang, mh.MaLoai, lh.TenLoai
        ORDER by soLuong desc
        LIMIT $top";

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

    public function getProduct_Type($dateBegin,$dateEnd){
        
        $sql="SELECT  lh.TenLoai,mh.MaLoai, sum(cthd.SoLuong) as soLuong , sum(cthd.ThanhTienCTHD) as total
        FROM hoadon hd
        Join cthd on hd.MaHD = cthd.MaHd
        LEFT join mathang mh on cthd.MaHang = mh.MaHang 
        LEFT join loaihang lh on mh.MaLoai = lh.MaLoai
        WHERE TinhTrang = 'dagiao' and ( hd.NgayXuat BETWEEN '$dateBegin' AND '$dateEnd')
        GROUP by  mh.MaLoai,lh.TenLoai
        ORDER BY mh.MaLoai";

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


    public function getProduct_Type_Content($dateBegin,$dateEnd,$id){
        
        $sql="SELECT  mh.MaHang,mh.TenHang, sum(cthd.SoLuong) as soLuong , sum(cthd.ThanhTienCTHD) as total
        FROM hoadon hd
        Join cthd on hd.MaHD = cthd.MaHd
        LEFT join mathang mh on cthd.MaHang = mh.MaHang 
        LEFT join loaihang lh on mh.MaLoai = lh.MaLoai
        WHERE TinhTrang = 'dagiao' and ( hd.NgayXuat BETWEEN '$dateBegin' AND '$dateEnd') and mh.MaLoai = '$id'
        GROUP by  mh.MaHang,mh.TenHang";

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
    public function getProduct_Type_Title($dateBegin,$dateEnd,$id,$title,$order){
        $sql="SELECT  mh.MaHang,mh.TenHang, sum(cthd.SoLuong) as soLuong , sum(cthd.ThanhTienCTHD) as total
        FROM hoadon hd
        Join cthd on hd.MaHD = cthd.MaHd
        LEFT join mathang mh on cthd.MaHang = mh.MaHang 
        LEFT join loaihang lh on mh.MaLoai = lh.MaLoai
        WHERE TinhTrang = 'dagiao' and ( hd.NgayXuat BETWEEN '$dateBegin' AND '$dateEnd') and mh.MaLoai = '$id'
        GROUP by  mh.MaHang,mh.TenHang
        ORDER BY $title $order";

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