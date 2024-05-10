// Hàm cập nhật hình ảnh sản phẩm
function updateImage(selectedValue) {
    $.ajax({
        url: 'ControllerSanpham.php', 
        method: 'POST',
        data: { MaHang : selectedValue }, 
        xhrFields: {
            responseType: 'blob'
        },
        success: function(data) {
            var blob = new Blob([data], { type: 'image/jpeg' }); 
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result); 
            }
            reader.readAsDataURL(blob); 
        }
    });
}


