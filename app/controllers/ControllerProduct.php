<?php
    class ControllerProduct {

        private $productModel;
        private $listProduct;


        public function __construct()
        {
            $this->loadModel('Product');
            $this->productModel=new ModelProduct;
            $this->productModel->connect();
        }

        protected function view(array $data=[],$dataID){
            foreach($data as $key=>$value){
                $$key=$value;
            }
            return include("./app/views/homepage/ViewProduct.php");
        }
    
        protected function loadModel($modelPath){
            return require ("./app/models/ModelProduct.php");
    
        }
        public function index(){
            //Lấy data từ model
            $this->listProduct=$this->productModel->getAllData();
            return $this->view($this->listProduct,0);
        }
    }
?>