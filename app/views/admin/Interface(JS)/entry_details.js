$(document).ready(function() {
    let maNCC = $('#form__receipt--MANCC');
    let maHang = $('#form__receipt--MaSP');

    var selectedLoaiSP = $('#form__receipt--LoaiSP');

    updateNCCName(maNCC.val());
    updateTenSP(maHang.val());
    updateGiaSP(maHang.val());
    updateLoaiSPByNCC(maNCC.val());
    updateMaSPByLoaiSP(selectedLoaiSP.val());

    
    $('#form__receipt--MANCC').on('change', function() {
        updateNCCName($(this).val());
        updateLoaiSPByNCC($(this).val());
    });
    $('#form__receipt--MaSP').on('change', function() {
        updateTenSP($(this).val());
        updateGiaSP($(this).val());
    });
    $('#form__receipt--LoaiSP').on('change', function() {
        var loaiSPSelect = $(this).val();
        updateMaSPByLoaiSP(loaiSPSelect);
    });
});
///////////////////////////////////////////////////////////////////
function updateNCCName(selectedValue) {
    $.ajax({
        url: 'index.php?controller=ctpn&action=getNCCName',
        method: 'POST',
        data: { MaNCC: selectedValue },
        success: function(data) {
            $('#form__receipt--NAMENCC').val(data);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}
/////////////////////////////////////////////////////////////////
function updateTenSP(selectedValue) {
    $.ajax({
        url: 'index.php?controller=ctpn&action=getTenSP',
        method: 'POST',
        data: { MaHang: selectedValue },
        success: function(selectedValue) {
            $('#form__receipt--TenSP').val(selectedValue);

        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}
/////////////////////////////////////////////////////////////////
function updateGiaSP(selectedValue) {
    $.ajax({
      url: 'index.php?controller=ctpn&action=getGiaSP',
      method: 'POST',
      data: { MaHang: selectedValue },
      success: function(data) {
        $('#form__receipt--Price').val(data);
      },
      error: function(xhr, status, error) {
        console.error('Error:', error);
      }
    });
  }
////////////////////////////////////////////////////////////////
//cập nhật loại sản phẩm theo mã ncc
function updateLoaiSPByNCC(selectedValue) {
    $.ajax({
        url: "index.php?controller=ctpn&action=updateLoaiSPByNCC",
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        data: {MaNCC : selectedValue},
        dataType: "json",
        success: function(data) {
            var loaiSPSelect = $('#form__receipt--LoaiSP');
            loaiSPSelect.empty();
            $.each(data, function(index, loaiSP) {
                loaiSPSelect.append($('<option>', {
                    value: loaiSP.MaLoai,
                    text: loaiSP.TenLoai
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
}
/////////////////////////////////////////////
//Cập nhật mã sản phẩm theo loại
function updateMaSPByLoaiSP(selectedValue) {
    $.ajax({
        url: 'index.php?controller=ctpn&action=getMaSPByLoaiSP',
        method: 'POST',
        data: { MaLoai: selectedValue },
        dataType: 'json', 
        success: function(selectedValue) {
            var maSPSelect = $('#form__receipt--MaSP');
            maSPSelect.empty();
            $.each(selectedValue, function(index, maSP) {
                maSPSelect.append($('<option>', {
                    value: maSP,
                    text: maSP
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

//Tính tổng tiền phiếu nhập
function calculateTotal() {
    var quantity = parseFloat($('#form__receipt--soluong').val());
    var price = parseFloat($('#form__receipt--Price').val());
    var total = quantity * price;
    $('#form__receipt--tong').val(total);
}

///////////////////////////
//Xóa chi tiết phiểu nhập
function Delete(name){
    return confirm("Bạn có chắc muốn xóa chi tiết phiếu nhập: "+ name + " ?");
}
///////////////////////////
document.getElementById('add-btn4').addEventListener('click', function() {
     window.location.href = 'index.php?controller=phieunhap&action=index';
});


/////////////////////////
//THÊM CHI TIẾT PHIẾU NHẬP
$('.customer__form--add').on('click', function(event) {

    event.preventDefault(); 
    
    var maPN = $('#form__receipt').val();
    var maNCC = $('#form__receipt--MANCC').val();
    var maHang = $('#form__receipt--MaSP').val();
    var TenHang = $('#form__receipt--TenSP').val();
    var donGiaPN = $('#form__receipt--Price').val();
    var tenNCC = $('#form__receipt--NAMENCC').val();
    var soLuong = $('#form__receipt--soluong').val();
    var thanhTien = $('#form__receipt--tong').val();

    if (soLuong.trim() === '') {
        $('#soLuong-error').text('*Bạn chưa nhập số lượng');
        $('#soLuong-error').css('display', 'block');
        return;
    }
    if (parseInt(soLuong) === 0) {
        $('#soLuong-error').text('*Số lượng phải lớn hơn 0 !');
        $('#soLuong-error').css('display', 'block');
        return;
    }
    if (parseInt(soLuong) < 0) {
        $('#soLuong-error').text('*Số lượng không được âm !');
        $('#soLuong-error').css('display', 'block');
        return;
    }
    
    alert('Đã thêm phiếu nhập mới thành công!');
    setTimeout(function(){
        window.location.reload();
    }, 500);

    $.ajax({
        url: 'index.php?controller=ctpn&action=addCTPN',
        method: 'POST',
        data: {
            receipt: maPN,
            'receipt--NCC': maNCC,
            'receipt--NAMENCC': tenNCC,
            'receipt--MASP': maHang,
            'receipt--TenHang': TenHang,
            'receipt--price': donGiaPN,
            'receipt--soluong': soLuong,
            'receipt--tong': thanhTien
        },
        success: function(data) {
            if (data.success) {
                alert(data.message);
                updateSTT();
            } else {
                alert(data.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});
////////////////////////////////////////////////////
//Validate cho Chi tiết phiếu nhập
$('#form__receipt--soluong').on('input', function() {
    var soLuongValue = $(this).val();
    if (soLuongValue.trim() !== '') {
        if (parseInt(soLuongValue) === 0) {
            $('#soLuong-error').text('*Số lượng phải lớn hơn 0!');
            $('#soLuong-error').css('display', 'block');
        } else if(parseInt(soLuongValue) < 0){
            $('#soLuong-error').text('*Số lượng không được là số âm!');
            $('#soLuong-error').css('display', 'block');
        } else {
            $('#soLuong-error').css('display', 'none');
        }
    } else {
        $('#soLuong-error').text('*Bạn chưa nhập số lượng');
        $('#soLuong-error').css('display', 'block');
    }
});
////////////////////////////////////////////////////
$(document).on("click" ,".btn-edit", function(){
    var data_ctpn = $(this).attr("id");
    edit_CTPN(data_ctpn);
  });
  function edit_CTPN(ctpn){
    $.ajax({
        url: "index.php?controller=ctpn&action=editCTPN",
        method: 'POST',
        data: {
            ctpn: ctpn
        },
        success:function(data){
            $("#form_ctpn").html(data);
            $('#add-btn').removeClass('customer__form--add').addClass('customer__form--update').attr('id', 'update-btn');
            $('#update-btn').text('Cập nhật');
            $('#update-btn').off('click').on('click', btnUPDATE);
        },
        error: function(xhr,status,error){
            console.error("Error: ", error);
        }
    });
}
/////////////////////////////////////////////////////////////////
function btnUPDATE(event) {
    event.preventDefault();

     
     var MaPN = $('#form__receipt').val();
     var MaNCC = $('#form__receipt--MANCC').val();
     var MaHang = $('#form__receipt--MaSP').val();
     var TenHang = $('#form__receipt--TenSP').val();
     var DonGiaPN = $('#form__receipt--Price').val();
     var TenNCC = $('#form__receipt--NAMENCC').val();
     var SoLuong = $('#form__receipt--soluong').val();
     var ThanhTienCTPN = $('#form__receipt--tong').val();


     if (SoLuong.trim() === '') {
         $('#soLuong-error').text('*Bạn chưa nhập số lượng');
         $('#soLuong-error').css('display', 'block');
         return;
     }
     if (parseInt(SoLuong) === 0) {
         $('#soLuong-error').text('*Số lượng phải lớn hơn 0 !');
         $('#soLuong-error').css('display', 'block');
         return;
     }
     if (parseInt(SoLuong) < 0) {
         $('#soLuong-error').text('*Số lượng không được âm !');
         $('#soLuong-error').css('display', 'block');
         return;
     }

     alert('Đã cập nhật phiếu nhập thành công!');
     setTimeout(function(){
         window.location.reload();
     }, 500);


$.ajax({
   url: 'index.php?controller=ctpn&action=updateCTPN',
   method: 'POST',
   data: {
       receipt: MaPN,
       'receipt--NCC': MaNCC,
       'receipt--NAMENCC': TenNCC,
       'receipt--MASP': MaHang,
       'receipt--TenHang': TenHang,
       'receipt--price': DonGiaPN,
       'receipt--soluong': SoLuong,
       'receipt--tong': ThanhTienCTPN
   },
   success: function(data){
         console.log(data); 
         if(data && data.success){
             alert(data.message);
         } else {
             alert("Có lỗi xảy ra khi cập nhật dữ liệu: " + data.message); 
         }
     },
   error: function(xhr, status, error){
       console.error(error);
   }
});
}