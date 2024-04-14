// window.onload = function() {
    
//     let maNCC = document.getElementById('form__receipt--MANCC');
//     let maHang = document.getElementById('form__receipt--MaSP');
//     // let loaiSPSelect = document.getElementById('form__receipt--LoaiSP');
//     // var selectedLoaiSP = document.getElementById('form__receipt--LoaiSP').value;
    

//     // updateNCCName(maNCC.value);
//     // updateTenSP(maHang.value);
//     // updateGiaSP(maHang.value);
//     // updateLoaiSPByNCC(maNCC.value);
//     // updateMaSPByLoaiSP(selectedLoaiSP);

    
// //     maNCC.addEventListener('change', function() {
// //         updateNCCName(this.value);
// //         updateLoaiSPByNCC(this.value);

// //     });
// //     maHang.addEventListener('change', function(){
// //         updateTenSP(this.value);
// //         updateGiaSP(this.value);
// //     });

// //     loaiSPSelect.addEventListener('change', function(){
// //       updateMaSPByLoaiSP(this.value);
     
// //     })


// // };


// // index.php?controller=phieunhap&action=getNCCName
// ///////////////////////////////////////////////////////////////////
// function updateNCCName(selectedValue) {
//     fetch('index.php?controller=phieunhap&action=getNCCName', {
//         method: 'POST', 
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: 'MaNCC=' + selectedValue 
//     })
//     .then(response => response.text())
//     .then(TenNCC => {
//         document.getElementById('form__receipt--TENNCC').value = TenNCC;
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// }

// /////////////////////////////////////////////////////////////////
// function updateTenSP(selectedValue) {
//     fetch('index.php?controller=phieunhap&action=getTenSP', {
//         method: 'POST', 
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: 'MaHang=' + selectedValue 
//     })
//     .then(response => response.text())
//     .then(TenHang => {
//         document.getElementById('form__receipt--TenSP').value = TenHang;
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// }
// /////////////////////////////////////////////////////////////////
// function updateGiaSP(selectedValue) {
//     fetch('index.php?controller=phieunhap&action=getGiaSP', {
//         method: 'POST', 
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: 'MaHang=' + selectedValue 
//     })
//     .then(response => response.text())
//     .then(DonGia => {
//         document.getElementById('form__receipt--Gia').value = DonGia;
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// }
// ////////////////////////////////////////////////////////////////
// //cập nhật loại sản phẩm theo mã ncc
// function updateLoaiSPByNCC(selectedValue) {
//   fetch('index.php?controller=phieunhap&action=updateLoaiSPByNCC', {
//     method: 'POST', 
//     headers: {
//       'Content-Type': 'application/x-www-form-urlencoded'
//     },
//     body: 'MaNCC=' + selectedValue 
//   })
//   .then(response => response.json())
//   .then(data => {
//     let loaiSPSelect = document.getElementById('form__receipt--LoaiSP');
    
//     loaiSPSelect.innerHTML = '';
    
//     data.forEach(loaiSP => {
//       let option = document.createElement('option');
//       option.value = loaiSP.MaLoai;
//       option.text = loaiSP.TenLoai;
//       loaiSPSelect.appendChild(option);
//     });
//   })
//   .catch(error => {
//     console.error('Error:', error);
//   });

// }
// /////////////////////////////////////////////
// //Cập nhật mã sp theo loại sp
// function updateMaSPByLoaiSP(selectedValue) {
//     fetch('index.php?controller=phieunhap&action=getMaSPByLoaiSP', {
//         method: 'POST', 
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: 'MaLoai=' + selectedValue 
//     })
//     .then(response => response.json())
//     .then(data => {
        
//         var maSPSelect = document.getElementById('form__receipt--MaSP');
        
        
//         maSPSelect.innerHTML = '';
//         data.forEach(maSP => {
//             var option = document.createElement('option');
//             option.value = maSP;
//             option.text = maSP;
//             maSPSelect.appendChild(option);
//         });
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// }

// //Tính tổng tiền phiếu nhập

// function calculateTotal() {

//     var quantity = parseFloat(document.getElementById('form__receipt--soluong').value);
    
//     var price = parseFloat(document.getElementById('form__receipt--Gia').value);
    
//     var total = quantity * price;
//     document.getElementById('form__receipt--tong').value = total;
// }
// // Hàm để lấy ngày hiện tại
// function getCurrentDate() {
//     var currentDate = new Date();
//     var day = currentDate.getDate();
//     var month = currentDate.getMonth() + 1;
//     var year = currentDate.getFullYear();
//     var formattedDate = year + '-' + month + '-' + day;
//     return formattedDate;
// }

  
// function close_receipt(){
//     document.getElementById("model--ctpn").style.display = "none";
//   }
//    function show_receipt(){
//     document.getElementById("model--ctpn").style.display = "block";
//    }

   

