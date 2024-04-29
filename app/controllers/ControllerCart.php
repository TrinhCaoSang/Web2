<?php
    class ControllerCart{

        protected $modelProduct;
        public function __construct()
        {
            require('app\models\ModelProduct.php');
            $this->modelProduct=new ModelProduct;
            $this->modelProduct->connect();
            
        }

        protected function view(array $data=[],$dataID){
            foreach($data as $key=>$value){
                $$key=$value;
            }
            return include("./app/views/admin/ViewCart.php");
        }

        public function index(){
            $products=$_SESSION['cart']??[];
            return $this->view([
                'products'=>$products,
            ],0);
        }

        public function store(){
            $productId=$_GET['id'] ?? null;
            $product=$this->modelProduct->getDataID($productId);
            // session_destroy();
            // $_SESSION['cart'][$productId]=$product;
            if(empty($_SESSION['cart'])||!array_key_exists($productId,$_SESSION['cart'])){
                // echo 'Sản phẩm chưa có trong giỏ hàng';
                $product['qty']=1;
                $_SESSION['cart'][$productId]=$product;
            }else{
                // echo 'Sản phẩm đã có trong giỏ hàng';
                $product['qty']=$_SESSION['cart'][$productId]['qty']+1;
                $_SESSION['cart'][$productId]=$product;
            }

            // echo '<pre>';
            // print_r($_SESSION['cart']); 
            header('location:index.php?controller=cart');
        }
        public function delete(){
            $productId=$_GET['id']??null;
            unset($_SESSION['cart'][$productId]);
            header('location:index.php?controller=cart');
        }

        public function update(){
            foreach($_POST['qty'] as $productId=>$qty){
                if($qty<0||!is_numeric($qty)){
                    continue;
                }
                if($qty==0){
                    unset($_SESSION['cart'][$productId]);
                }else{
                    $_SESSION['cart'][$productId]['qty']=$qty;
                }
            }
            header('location:index.php?controller=cart&action=index');
        }

        public function destroy(){
            unset($_SESSION['cart']);
            header('location:index.php?controller=cart&action=index');
        }

    }






?>