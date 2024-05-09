const toggleMenuIcon = document.querySelector(".admin__content--header__cate");
const container = document.querySelector(".container");
const adminMenu = document.querySelector(".admin__taskbar");

toggleMenuIcon.addEventListener("click", (e) => {
  container.classList.toggle("hide");
});

function close_receipt() {
  document.getElementById("model--ctpn").style.display = "none";
}
function show_receipt() {
  document.getElementById("model--ctpn").style.display = "flex";
}
function close_bill() {
  document.getElementById("model--bill").style.display = "none";
}
function show_bill() {
  document.getElementById("model--bill").style.display = "flex";
}


//Trang danh sách nhóm quyền
document.addEventListener("DOMContentLoaded", function () {
  var linkAuthorization = document.getElementById('link_authorization');
  var exitAuthorization = document.getElementById('authority_exit');

  var authorization = document.getElementById('authorization');
  var linkHome = document.getElementById('link_Home');
  var linkPromotions = document.getElementById('link_Promotions');
  var linkProduct = document.getElementById('link_Product');
  var linkStaff = document.getElementById('link_staff');
  var linkClient = document.getElementById('link_client');
  var linkReceipt = document.getElementById('link_receipt');
  var linkbill = document.getElementById('link_bill');

  var staff = document.getElementById('staff');

  linkAuthorization.addEventListener('click', function (event) {
    event.preventDefault();//Chặn hành động của thẻ 
    authorization.style.display = 'block';
    staff.style.display = 'none';
    //Chặn hành động click các trang khác khi mở Quyền
    linkHome.classList.add('block-click');
    linkPromotions.classList.add('block-click');
    linkProduct.classList.add('block-click');
    linkStaff.classList.add('block-click');
    linkClient.classList.add('block-click');
    linkReceipt.classList.add('block-click');
    linkbill.classList.add('block-click');
  })
  exitAuthorization.addEventListener('click', function (event) {
    event.preventDefault();//Chặn hành động của thẻ 
    authorization.style.display = 'none';
    staff.style.display = 'block';
    linkHome.classList.remove('block-click');
    linkPromotions.classList.remove('block-click');
    linkProduct.classList.remove('block-click');
    linkStaff.classList.remove('block-click');
    linkClient.classList.remove('block-click');
    linkReceipt.classList.remove('block-click');
    linkbill.classList.remove('block-click');
  })

})
//Thao tác trên trang phân quyền
document.addEventListener('DOMContentLoaded', function () {
  const authorityAddBtn = document.getElementById('authority_add');
  const authorityNameInput = document.getElementById('name_authority');
  const authorityList = document.getElementById('authority_list');
  const employeePositionSelect = document.getElementById('form__employeePosition');

  // Kiểm tra xem đã có dữ liệu lưu trong localStorage chưa
  const storedPositions = localStorage.getItem('employeePositions');
  if (storedPositions) {
    // Nếu có, cập nhật ô select "Chức vụ" từ dữ liệu đã lưu
    employeePositionSelect.innerHTML = storedPositions;
  }

  // Khôi phục dữ liệu từ Local Storage khi trang được tải lại
  function restoreAuthorityData() {
    authorityList.innerHTML = '';//Xóa hết data có sẵn
    const authorityData = JSON.parse(localStorage.getItem('authorityData'));
    if (authorityData) {
      authorityData.forEach(authority => {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
          <td class="authority-sttData">${authorityList.childElementCount}</td>
          <td class="authority-nameData">${authority}</td>
          <td>
            <i class="fa-regular fa-pen-to-square authority-editBtnData"></i>
          </td>
          <td>
            <i class="fa-solid fa-xmark authority-deleteBtnData" style="color: #f31616;"></i>
          </td>
        `;
        authorityList.appendChild(newRow);
      });
    }
  }
  //Sự kiện nút "Thêm" phân quyền
  authorityAddBtn.addEventListener('click', function () {
    const newName = authorityNameInput.value.trim();

    if (newName === '') {
      alert('Vui lòng nhập tên chức vụ.');
      return;
    }

    // Kiểm tra xem tên mới đã tồn tại trong bảng chưa
    const existingNames = Array.from(authorityList.querySelectorAll('.authority-nameData')).map(td => td.textContent.trim());
    if (existingNames.includes(newName)) {
      alert('Tên chức vụ đã tồn tại.');
      return;
    }

    // Tạo mới một hàng và thêm vào bảng
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <td class="authority-sttData">${authorityList.childElementCount}</td>
      <td class="authority-nameData">${newName}</td>
      <td>
        <i class="fa-regular fa-pen-to-square authority-editBtnData"></i>
      </td>
      <td>
        <i class="fa-solid fa-xmark authority-deleteBtnData" style="color: #f31616;"></i>
      </td>
    `;
    authorityList.appendChild(newRow);

    // Lưu trữ dữ liệu vào Local Storage
    const authorityData = Array.from(authorityList.querySelectorAll('.authority-nameData')).map(td => td.textContent.trim());
    localStorage.setItem('authorityData', JSON.stringify(authorityData));

    updateEmployeePositions();

    // Xóa nội dung trong input sau khi thêm vào bảng
    authorityNameInput.value = '';
  });

  //Sự kiện nút "Xóa" phân quyền
  authorityList.addEventListener('click', function (event) {
    if (event.target.classList.contains('authority-deleteBtnData')) {
      const row = event.target.closest('tr');
      row.remove();

      // Lưu trữ dữ liệu sau khi xóa
      const authorityData = Array.from(authorityList.querySelectorAll('.authority-nameData')).map(td => td.textContent.trim());
      localStorage.setItem('authorityData', JSON.stringify(authorityData));

      updateEmployeePositions();
    }
  });
  //Sự kiện nút "Sửa" phân quyền
  authorityList.addEventListener('click', function (event) {
    if (event.target.classList.contains('authority-editBtnData')) {
      const row = event.target.closest('tr');
      const name = row.querySelector('.authority-nameData').textContent.trim();
      openEditModal(name);
    }
  })
  function openEditModal(name) {
    // Lấy thẻ <p> trong bảng modal
    const ncheckBoxNameLabel = document.getElementById('checkBox-nameLabel');
    // Cập nhật nội dung của thẻ <p> với tên của đối tượng
    ncheckBoxNameLabel.textContent = name;
    openModal();
  }
  //Hàm cập nhật option theo bảng chức vụ
  function updateEmployeePositions() {
    // Xóa tất cả các tùy chọn hiện có trong ô select "Chức vụ"
    employeePositionSelect.innerHTML = '';
    // Thêm option mặc định "Chọn chức vụ"
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Chọn chức vụ';
    defaultOption.disabled = true;
    defaultOption.selected = true;
    employeePositionSelect.appendChild(defaultOption);

    // Lặp qua từng hàng trong bảng phân quyền
    Array.from(authorityList.querySelectorAll('.authority-nameData')).forEach(function (row) {
      // Lấy tên chức vụ từ cột "Tên" của hàng
      const positionName = row.textContent.trim();

      // Tạo một tùy chọn mới và thêm vào ô select "Chức vụ"
      const option = document.createElement('option');
      option.text = positionName;
      option.value = positionName;
      employeePositionSelect.add(option);
    });

    // Lưu danh sách các tùy chọn vào localStorage
    localStorage.setItem('employeePositions', employeePositionSelect.innerHTML);
  }

  restoreAuthorityData();
});

//Hiện modal checkBox phân quyền
const checkBoxModal = document.getElementById('authority__modal--content');
const checkBoxBtnOpen = document.getElementById('authority_change');
const checkBoxBtnClose = document.querySelector('.checkBox__Btn--exit');
const body = document.body;

function openModal() {
  body.classList.add('modal-open');
  checkBoxModal.style.display = 'block';
}
function closeModal() {
  body.classList.remove('modal-open');
  checkBoxModal.style.display = 'none';
}

checkBoxBtnOpen.addEventListener('click', openModal);
checkBoxBtnClose.addEventListener('click', closeModal);
//End


//Menu tương tác
document.addEventListener("DOMContentLoaded", function () {
  var linkHome = document.getElementById('link_Home');
  var linkPromotions = document.getElementById('link_Promotions');
  var linkProduct = document.getElementById('link_Product');
  var linkStaff = document.getElementById('link_staff');
  var linkClient = document.getElementById('link_client');
  var linkReceipt = document.getElementById('link_receipt');
  var linkbill = document.getElementById('link_bill');

  var statisticsContent = document.getElementById('statisticsContent');
  var promotionsContent = document.getElementById('promotionsContent');
  var manageProduct = document.getElementById('manageProduct');
  var staff = document.getElementById('staff');
  var client = document.getElementById('client');
  var receipt = document.getElementById('receipt');
  var bill = document.getElementById('bill');

  statisticsContent.style.display = 'block';
  promotionsContent.style.display = 'none';
  manageProduct.style.display = 'none';
  staff.style.display = 'none';
  client.style.display = 'none';
  receipt.style.display = 'none';
  bill.style.display = 'none';
  linkHome.classList.add('selected'); // Thêm lớp cho liên kết "Trang chủ"



  linkHome.addEventListener('click', function (event) {
    event.preventDefault();//Chặn hành động của thẻ a
    statisticsContent.style.display = 'block';
    promotionsContent.style.display = 'none';
    manageProduct.style.display = 'none';
    staff.style.display = 'none';
    client.style.display = 'none';
    receipt.style.display = 'none';
    bill.style.display = 'none';
    linkHome.classList.add('selected'); // Thêm lớp cho liên kết "Trang chủ"
    linkPromotions.classList.remove('selected');
    linkProduct.classList.remove('selected');
    linkStaff.classList.remove('selected');
    linkClient.classList.remove('selected');
    linkReceipt.classList.remove('selected');
    linkbill.classList.remove('selected');
  });


  linkProduct.addEventListener('click', function (event) {
    event.preventDefault();
    manageProduct.style.display = 'block';
    statisticsContent.style.display = 'none';
    promotionsContent.style.display = 'none';
    staff.style.display = 'none';
    client.style.display = 'none';
    receipt.style.display = 'none';
    bill.style.display = 'none';

    linkHome.classList.remove('selected');
    linkPromotions.classList.remove('selected');
    linkProduct.classList.add('selected');
    linkStaff.classList.remove('selected');
    linkClient.classList.remove('selected');
    linkReceipt.classList.remove('selected');
    linkbill.classList.remove('selected');
  });


  linkPromotions.addEventListener('click', function (event) {
    event.preventDefault();//Chặn hành động của thẻ a
    statisticsContent.style.display = 'none';
    promotionsContent.style.display = 'block';
    manageProduct.style.display = 'none';
    staff.style.display = 'none';
    client.style.display = 'none';
    receipt.style.display = 'none';
    bill.style.display = 'none';

    linkHome.classList.remove('selected');
    linkPromotions.classList.add('selected');
    linkProduct.classList.remove('selected');
    linkStaff.classList.remove('selected');
    linkClient.classList.remove('selected');
    linkReceipt.classList.remove('selected');
    linkbill.classList.remove('selected');
  });
  linkStaff.addEventListener('click', function (event) {
    event.preventDefault();
    statisticsContent.style.display = 'none';
    promotionsContent.style.display = 'none';
    manageProduct.style.display = 'none';
    staff.style.display = 'block';
    client.style.display = 'none';
    receipt.style.display = 'none';
    bill.style.display = 'none';

    linkHome.classList.remove('selected');
    linkPromotions.classList.remove('selected');
    linkProduct.classList.remove('selected');
    linkStaff.classList.add('selected');
    linkClient.classList.remove('selected');
    linkReceipt.classList.remove('selected');
    linkbill.classList.remove('selected');
  });

  linkClient.addEventListener('click', function (event) {
    event.preventDefault();
    statisticsContent.style.display = 'none';
    promotionsContent.style.display = 'none';
    manageProduct.style.display = 'none';
    staff.style.display = 'none';
    client.style.display = 'block';
    receipt.style.display = 'none';
    bill.style.display = 'none';

    linkHome.classList.remove('selected');
    linkPromotions.classList.remove('selected');
    linkProduct.classList.remove('selected');
    linkStaff.classList.remove('selected');
    linkClient.classList.add('selected');
    linkReceipt.classList.remove('selected');
    linkbill.classList.remove('selected');
  })

  linkReceipt.addEventListener('click', function (event) {
    event.preventDefault();
    statisticsContent.style.display = 'none';
    promotionsContent.style.display = 'none';
    manageProduct.style.display = 'none';
    staff.style.display = 'none';
    client.style.display = 'none';
    receipt.style.display = 'block';
    bill.style.display = 'none';

    linkHome.classList.remove('selected');
    linkPromotions.classList.remove('selected');
    linkProduct.classList.remove('selected');
    linkStaff.classList.remove('selected');
    linkClient.classList.remove('selected');
    linkReceipt.classList.add('selected');
    linkbill.classList.remove('selected');
  })

  linkbill.addEventListener('click', function (event) {
    event.preventDefault();
    statisticsContent.style.display = 'none';
    promotionsContent.style.display = 'none';
    manageProduct.style.display = 'none';
    staff.style.display = 'none';
    client.style.display = 'none';
    receipt.style.display = 'none';
    bill.style.display = 'block';

    linkHome.classList.remove('selected');
    linkPromotions.classList.remove('selected');
    linkProduct.classList.remove('selected');
    linkStaff.classList.remove('selected');
    linkClient.classList.remove('selected');
    linkReceipt.classList.remove('selected');
    linkbill.classList.add('selected');
  })
});



