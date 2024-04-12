<?php 
    $con = mysqli_connect("localhost","root","","dbshop");
    mysqli_set_charset($con,'utf8');
    $limit = 8;
    $page = 0;
    $output = '';
    if(isset($_POST["page"])){
        $page =  $_POST["page"];
    }else{
        $page = 1;
    }
    $start = ($page - 1)*$limit;
    $result = mysqli_query($con, "SELECT * FROM mathang ORDER BY MaHang DESC LIMIT $start,$limit");
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    $count = mysqli_num_rows($result);
    $output = '';
    $lastproduct = '';
    if($count % 2 != 0) {
        $count = $count -1;
        $lastproduct = '
        <div id="content">
        <div class="divproduct">
            <div id="img-product">
                <i class="fa-solid fa-cart-plus"></i>
                <img src="data:image/jpeg;base64,'.base64_encode($data[$count]["Hinhanh"]).'">
                <div id="datmua">
                    <h3>Mua ngay</h3>
                </div>
            </div>
            <div id="mota-product"><p>'
                .$data[$count]['TenHang'] . '<br>' 
                .'Price: ' . $data[$count]['DonGia'] . '</p>
            </div>
            </div><div class="divproduct"></div>
        </div>';
    }
    for ($i = 0; $i <= $count-1; $i++){
        $output .= '
        <div id="content">
        <div onclick=showinfo_product("'.$data[$i]["MaHang"].'") class="divproduct">
            <div id="img-product">
                <i class="fa-solid fa-cart-plus"></i>
                <img src="data:image/jpeg;base64,'.base64_encode($data[$i]["Hinhanh"]).'">
                <div id="datmua">
                    <h3>Mua ngay</h3>
                </div>
            </div>
            <div id="mota-product"><p>'
                .$data[$i]['TenHang'] . '<br>' 
                .'Price: ' . $data[$i]['DonGia'] . '</p>
            </div>
        </div>
        <div onclick="showinfo_product("'.$data[++$i]["MaHang"].'") class="divproduct">
            <div id="img-product">
                <i class="fa-solid fa-cart-plus"></i>
                <img src="data:image/jpeg;base64,'.base64_encode($data[$i]['Hinhanh']).'">
                <div id="datmua">
                    <h3>Mua ngay</h3>
                </div>
            </div>
            <div id="mota-product"><p>'
                .$data[$i]['TenHang'] . '<br>' 
                .'Price: ' . $data[$i]['DonGia'] . '</p>
            </div>
        </div>
        </div>
        ';
    }
    $output .= $lastproduct;
    //pagination code
    $query = mysqli_query($con,"SELECT * from mathang");
    $total_record = mysqli_num_rows($query);
    $total_page = ceil($total_record/$limit);
    $output .= '<ul class="pagination">';
    if($page > 1){
        $previous = $page - 1;
        $output .= '<li class="page-item" id="'.$previous.'">&lt;&lt;</li>';
    }
    for($i=1; $i<=$total_page;$i++){
        $active_class = "";
        if($i == $page){
            $active_class = "-active";
        }
        $output .= '<li class="page-item'.$active_class.'" id="'.$i.'">'.$i.'</li>';
    }
    if($page < $total_page){
        $page++;
        $output .= '<li class="page-item" id="'.$page.'">&gt;&gt;</li>';
    }
    $output .='</ul>';
    echo $output;
?>