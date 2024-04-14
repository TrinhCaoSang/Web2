<?php
    class ControllerHome{
        private $HomeModel;
        private $listProduct;
        public function __construct()
        {
            $this->loadModel('Product');
            $this->HomeModel=new ModelHome;
            $this->HomeModel->connect();
        }

        protected function view(array $data=[],$dataID){
            // foreach($data as $key=>$value){
            //     $$key=$value;
            // }
            return include("./app/views/homepage/ViewHome.php");
        }
    
        protected function loadModel($modelPath){
            return require ("./app/models/ModelHome.php");
    
        }
        public function index(){
            //Lấy data từ model
            // $this->listProduct=$this->productModel->getAllData();
            return include("./app/views/homepage/ViewHome.php");
        }

    }
?>