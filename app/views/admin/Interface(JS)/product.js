/////////////////////////////////
//Cập nhật sản phẩm
$(document).on("click", ".discount__form--change", function () {
    var id = $(this).attr("id");
    if (!id) {
        alert("Lỗi: Không tìm thấy ID sản phẩm!");
        return;
    }

    $.ajax({
        url: "index.php?controller=sanpham&action=detail",
        method: "POST",
        data: { id: id },
        success: function (data) {
            $("#container_tt").html(data);

            // Ẩn nút "Thêm" và bật nút "Lưu"
            $("#add-btn1").hide();
            $("#add-btn2").prop("disabled", false).show();

            $("#selected-image").on("click", function () {
                $("#file-upload").click();
            });

            $("#file-upload").on("change", function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $("#selected-image").attr("src", e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        },
        error: function (xhr, status, error) {
            console.error("Lỗi khi lấy chi tiết sản phẩm:", error);
        }
    });
});

$(document).on("click", "#add-btn2", function () {
    $(this).prop("disabled", true); 
    save();
});

// Hàm lưu dữ liệu sản phẩm
function save() {
    var id = $("#form__receipt--MaSP").val();
    var loai = $("#form__receipt--LoaiSP").val();
    var ten = $("#form__receipt--TenSP").val();
    var gia = $("#form__receipt--Price").val();

    var formData = new FormData();
    formData.append("id", id);
    formData.append("loai", loai);
    formData.append("ten", ten);
    formData.append("gia", gia);

    var file = $("#file-upload")[0].files[0];
    if (file) {
        formData.append("file-upload", file);
    }

    $.ajax({
        url: "index.php?controller=sanpham&action=save",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            Swal.fire({
                title: "Thành công!",
                text: "Sửa thông tin sản phẩm thành công!",
                icon: "success"
            }).then(() => {
                window.location.href = "index.php?controller=sanpham&action=index";
            });
        },
        error: function (xhr, status, error) {
            console.error("Lỗi khi cập nhật sản phẩm:", error);
        }
    });
}

//////////////////////////////////////////////////////////////////
//================Xóa sản phẩm======================
function Delete(maHang, deleteUrl) {
    Swal.fire({
        title: 'Bạn có chắc chắn?',
        text: "Bạn muốn xóa sản phẩm mã: " + maHang + " ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = deleteUrl;
        }
    });
    return false; 
}
////////////////////////////////////////////////////
//===============Phân trang========================
$(document).ready(function() {
    handlePaginationClick();
});
function handlePaginationClick() {
$(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var pageUrl = $(this).attr('href');
    $.ajax({
        url: pageUrl,
        type: 'GET',
        success: function(response) {
            var newTable = $(response).find('#table_product').html();
            $('#table_product').empty().html(newTable);

            var newPagination = $(response).find('.pagination').html();
            $('.pagination').empty().html(newPagination);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
}
///////////////////////////////////////////////////
//=================Thêm sản phẩm mới==============
$('.customer__form--add1').on('click', function (event) {
    event.preventDefault();

    let Loaisp = $('#form__receipt--LoaiSP').val().trim();
    let Masp = $('#form__receipt--MaSP').val().trim();
    let TenSp = $('#form__receipt--TenSP').val().trim();
    let GiaSP = $('#form__receipt--Price').val().trim();
    let ImageSP = $('#file-upload')[0].files[0];

    $('.error-message').hide();

    if (!Loaisp) {
        $('#LoaiSp-error').text('*Chưa nhập loại sản phẩm!').show();
        return;
    }
    if (!Masp) {
        $('#MaSP-error').text('*Chưa nhập mã sản phẩm!').show();
        return;
    }
    if (!TenSp) {
        $('#TenSp-error').text('*Chưa nhập tên sản phẩm!').show();
        return;
    }
    if (!GiaSP) {
        $('#GiaSp-error').text('*Chưa nhập giá sản phẩm!').show();
        return;
    }
    if (!/^\d+$/.test(GiaSP)) {
        $('#GiaSp-error').text('*Giá sản phẩm chỉ được nhập số!').show();
        return;
    }
    if (GiaSP.length < 6) {
        $('#GiaSp-error').text('*Giá sản phẩm phải có ít nhất 6 chữ số!').show();
        return;
    }
    if (!ImageSP) {
        $('#ImageSp-error').text('*Chưa chọn hình ảnh!').show();
        return;
    }

    let formData = new FormData();
    formData.append('receiptLoaiSp', Loaisp);
    formData.append('receipt--MaSP', Masp);
    formData.append('receipt--TenHang', TenSp);
    formData.append('receipt--price', GiaSP);
    formData.append('file-upload', ImageSP);

    $.ajax({
        url: 'index.php?controller=sanpham&action=addSanpham',
        method: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công!',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: response.message
                });
            }
        },
        error: function(xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi hệ thống!',
                text: 'Có lỗi xảy ra khi thêm sản phẩm.'
            });
            console.error('Lỗi Ajax:', xhr.responseText);
        }
    });
});

//////////////////////////////////////////////////////////
//====================Validate input=====================
document.getElementById('form__receipt--LoaiSP').addEventListener('input', function() {
    var LoaispVal = this.value;
    if (LoaispVal.trim() !== '') {
        document.getElementById('LoaiSp-error').style.display = 'none';
    } else {
        document.getElementById('LoaiSp-error').textContent = '*Chưa nhập loại sản phẩm!';
        document.getElementById('LoaiSp-error').style.display = 'block';
    }

});
document.getElementById('form__receipt--MaSP').addEventListener('input', function() {
  var MaSpValue = this.value;
  if (MaSpValue.trim() !== '') {
            document.getElementById('MaSP-error').style.display = 'none';
  } else {
            document.getElementById('MaSP-error').textContent = '*Chưa nhập mã sản phẩm!';
            document.getElementById('MaSP-error').style.display = 'block';
        }
});
document.getElementById('form__receipt--TenSP').addEventListener('input', function() {
  var tenSpValue = this.value;
  if (tenSpValue.trim() !== '') {
            document.getElementById('TenSp-error').style.display = 'none';
  } else {
            document.getElementById('TenSp-error').textContent = '*Chưa nhập tên sản phẩm!';
            document.getElementById('TenSp-error').style.display = 'block';
        }
});
document.getElementById('form__receipt--Price').addEventListener('input', function() {
    var GiaSPVal = this.value.trim();

    // Kiểm tra xem giá có phải là số và có ít nhất 6 chữ số hay không
    if (/^\d{6,}$/.test(GiaSPVal)) {
        document.getElementById('GiaSp-error').style.display = 'none';
    } else {
        document.getElementById('GiaSp-error').textContent = '*Giá sản phẩm phải là số và có ít nhất 6 chữ số!';
        document.getElementById('GiaSp-error').style.display = 'block';
    }
});

document.getElementById('file-upload').addEventListener('input', function() {
  var ImageSp = this.value;
  if (ImageSp.trim() !== '') {
            document.getElementById('ImageSp-error').style.display = 'none';
  } else {
            document.getElementById('ImageSp-error').textContent = '*Chưa chọn hình ảnh sản phẩm!';
            document.getElementById('ImageSp-error').style.display = 'block';
        }
});
////////////////////////////////////////////////
//==================Đăng xuất===================
$(document).ready(function(){
    $(document).on('click', '.logout',function(){
      console.log("Trang chủ.");
      $.ajax({
          type: "POST",
          url: "index.php?controller=home&action=logoutAdmin",
          data:{},
          success: function(data) {
              alert("Đăng xuất thành công.");
              window.location.href = "index.php?controller=home&action=index";
          },
          error: function(xhr, status, error) {
              alert("Lỗi");
          }
      });
      });
  })
////////////////////////////////////////////////////////////////////////////
//===============Hiển thị hình ảnh người dùng chọn khi thêm sản phẩm==========
$(document).ready(function () {
    $("#selected-image").click(function () {
        $("#file-upload").click();
    });

    $("#file-upload").change(function (event) {
        const file = event.target.files[0];
        const preview = $("#selected-image");

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.attr("src", e.target.result).show();
            };
            reader.readAsDataURL(file);
        }
    });
});


