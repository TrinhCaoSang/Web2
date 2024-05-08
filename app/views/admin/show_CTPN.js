

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
        url: 'index.php?controller=ctpn&action=updateLoaiSPByNCC',
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        data: 'MaNCC=' + selectedValue,
        dataType: 'json', 
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
            console.error('Error:', error);
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

