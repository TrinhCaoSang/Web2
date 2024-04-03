const toggleMenuIcon = document.querySelector(".admin__content--header__cate");
const container = document.querySelector(".container");
const adminMenu = document.querySelector(".admin__taskbar");

toggleMenuIcon.addEventListener("click", (e) => {
  container.classList.toggle("hide");
});


//Hiện form phân quyền
const authorityBtn = document.querySelector('.employee__form--authority');
const mainAuthority = document.querySelector('.mainAuthority');
authorityBtn.addEventListener('click', function() {
    mainAuthority.style.display = 'block'; // Hiển thị bảng phân quyền khi nút được click
});

//Ẩn bảng phân quyền
const closeButton = document.querySelector('.closeButton');
closeButton.addEventListener('click', function() {
    mainAuthority.style.display = 'none'; // Ẩn bảng phân quyền khi nút được click
});



document.addEventListener("DOMContentLoaded", function(){
    var linkHome = document.getElementById('link_Home');
    var linkPromotions = document.getElementById('link_Promotions');
    var linkProduct = document.getElementById('link_Product');
    var linkStaff = document.getElementById('link_staff');
    var linkClient = document.getElementById('link_client');


    var statisticsContent = document.getElementById('statisticsContent');
    var promotionsContent = document.getElementById('promotionsContent');
    var manageProduct = document.getElementById('manageProduct');
    var staff = document.getElementById('staff');
    var client = document.getElementById('client');


    statisticsContent.style.display = 'block';
    promotionsContent.style.display = 'none';
    manageProduct.style.display = 'none';
    staff.style.display = 'none';
    client.style.display = 'none';
    linkHome.classList.add('selected'); // Thêm lớp cho liên kết "Trang chủ"



    linkHome.addEventListener('click', function(event){
         event.preventDefault();//Chặn hành động của thẻ a
         statisticsContent.style.display = 'block'; 
         promotionsContent.style.display = 'none'; 
         manageProduct.style.display = 'none';
         staff.style.display = 'none';
         client.style.display = 'none';

         linkHome.classList.add('selected'); // Thêm lớp cho liên kết "Trang chủ"
         linkPromotions.classList.remove('selected');
         linkProduct.classList.remove('selected');
         linkStaff.classList.remove('selected');
         linkClient.classList.remove('selected');
    });


    linkProduct.addEventListener('click', function (event) {
      event.preventDefault();
      manageProduct.style.display = 'block';
      statisticsContent.style.display = 'none'; 
      promotionsContent.style.display = 'none'; 
      staff.style.display = 'none';
      client.style.display = 'none';

      linkHome.classList.remove('selected');
      linkPromotions.classList.remove('selected');
      linkProduct.classList.add('selected');
      linkStaff.classList.remove('selected');
      linkClient.classList.remove('selected');
    });


    linkPromotions.addEventListener('click', function(event){
      event.preventDefault();//Chặn hành động của thẻ a
      statisticsContent.style.display = 'none'; 
      promotionsContent.style.display = 'block';
      manageProduct.style.display = 'none';
      staff.style.display = 'none';
      client.style.display = 'none';

      linkHome.classList.remove('selected');
      linkPromotions.classList.add('selected');
      linkProduct.classList.remove('selected');
      linkStaff.classList.remove('selected');
      linkClient.classList.remove('selected');
 });
    linkStaff.addEventListener('click', function(event){
      event.preventDefault();
      statisticsContent.style.display = 'none'; 
      promotionsContent.style.display = 'none';
      manageProduct.style.display = 'none';
      staff.style.display = 'block';
      client.style.display = 'none';


      linkHome.classList.remove('selected');
      linkPromotions.classList.remove('selected');
      linkProduct.classList.remove('selected');
      linkStaff.classList.add('selected');
      linkClient.classList.remove('selected');

     });
    
    linkClient.addEventListener('click', function(event){
      event.preventDefault();
      statisticsContent.style.display = 'none'; 
      promotionsContent.style.display = 'none';
      manageProduct.style.display = 'none';
      staff.style.display = 'none';
      client.style.display = 'block';


      linkHome.classList.remove('selected');
      linkPromotions.classList.remove('selected');
      linkProduct.classList.remove('selected');
      linkStaff.classList.remove('selected');
      linkClient.classList.add('selected');
    })
});



