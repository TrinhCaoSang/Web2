<?php
    class ControllerHomeAdmin{
        private $HomeAdminModel;
        private $listProduct;
        public function __construct()
        {
            $this->loadModel('Product');
            $this->HomeAdminModel=new ModelHomeAdmin;
            $this->HomeAdminModel->connect();
        }

        protected function view(array $data=[],$dataID){
            foreach($data as $key=>$value){
                $$key=$value;
            }
            return include("./app/views/admin/ViewTrangChu.php");
        }
    
        protected function loadModel($modelPath){
            return require ("./app/models/ModelHomeAdmin.php");
    
        }
        public function index(){
            //Lấy data từ model
            // $this->listProduct=$this->productModel->getAllData();
            $DoanhThu = $this->HomeAdminModel->getDoanhThu()??0;
            $SanPham = $this->HomeAdminModel->getSoLuongSanPham()??0;
            $Loai = $this->HomeAdminModel->getSoLuongLoai()??0;
            $NhanVien = $this->HomeAdminModel->getSoLuongNhanVien()??0;
            $DonHangCXL = $this->HomeAdminModel->getDonHangChuaXuLy()??0;
            $DonHangDXL = $this->HomeAdminModel->getDonHangDaXuLy()??0;
            return $this->view([
                'doanhThu'=>$DoanhThu,
                'sanPham'=>$SanPham,
                'loai' =>$Loai,
                'nhanVien' =>$NhanVien,
                'donHangCXL' =>$DonHangCXL,
                'donHangDXL' => $DonHangDXL,
            ],0);
            // print_r($DoanhThu);
            return include("./app/views/admin/ViewTrangChu.php");
        }


    }
?>