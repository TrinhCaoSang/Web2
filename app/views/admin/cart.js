function ActionCheckBox(){
    // Lấy ra checkbox mà bạn muốn làm trigger
    var checkAll = document.getElementById('checkall');
    // Lấy ra tất cả các checkbox cần được kích hoạt
    var checkBoxes = document.getElementsByClassName('checkbox');
    for (var i = 0; i < checkBoxes.length; i++) {
        checkBoxes[i].addEventListener('change',function(){
            tinhTong();
            changeCheckAll();
        });
    }
    // Gán sự kiện 'change' cho checkbox trigger
    checkAll.addEventListener('change', function() {
        activateCheckboxes();
        tinhTong();
    });

 }
ActionCheckBox();

function activateCheckbox() {
    var checkAll = document.getElementById('checkall');
    checkAll.checked=true;
    // Lấy danh sách tất cả các checkbox
    var checkboxes = document.querySelectorAll('.checkbox');
    // Lặp qua danh sách và thiết lập thuộc tính checked của mỗi checkbox thành true
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = true;
        tinhTong();
    });
}

function isChecked(){
    var checkBoxes = document.getElementsByClassName('checkbox');
    for (var i = 0; i < checkBoxes.length; i++) {
        if(checkBoxes[i].checked==false){
            return false;
        }
    }
   return true;
 }

function changeCheckAll(){
    var checkAll = document.getElementById('checkall');
   // Lặp qua danh sách và thiết lập thuộc tính checked của mỗi checkbox thành true
    console.log(isChecked());
    if(isChecked()==true){
        checkAll.checked=true;
    }
    else if(isChecked()==false){
        checkAll.checked=false;
    };
}

function activateCheckboxes() {
    var checkAll = document.getElementById('checkall');
   // Lấy danh sách tất cả các checkbox
   var checkboxes = document.querySelectorAll('.checkbox');
   // Lặp qua danh sách và thiết lập thuộc tính checked của mỗi checkbox thành true
   checkboxes.forEach(function(checkbox) {
        if(checkAll.checked==true){
            checkbox.checked = true;
        }else if(checkAll.checked==false){
            checkbox.checked = false;
        }
   });
 }

function tinhTong() {
    var table = document.getElementById("menu");
    var rows = table.getElementsByTagName("tr");
    var tong = 0;
    for (var i = 1; i < rows.length; i++) { // Bắt đầu từ i = 1 để bỏ qua hàng tiêu đề
        var cells = rows[i].getElementsByTagName("td");
        var checkbox = cells[0].querySelector('input[type="checkbox"]');
        if(checkbox &&checkbox.checked==true){
            var cellValue = cells[5].innerText; // Lấy giá trị của cột thứ hai
            tong += parseFloat(cellValue.replace(/,/g, '')); // Cộng giá trị vào tổng
        }
    }
    document.getElementById("totalPriceId").innerHTML = tong.toLocaleString()+" VNĐ";
}
// tinhTong();
function getProductList(){
    var checkboxes = document.querySelectorAll('.checkbox');
    var products=[];
    // Lặp qua từng ô checkbox và lấy giá trị của thuộc tính value
    checkboxes.forEach(function(checkbox) {
        if(checkbox.checked){
            products.push(checkbox.value);
        }
    });
    return products;
}


