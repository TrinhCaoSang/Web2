const toggleMenuIcon = document.querySelector(".admin__content--header__cate");
const container = document.querySelector(".container");
const adminMenu = document.querySelector(".admin__taskbar");

toggleMenuIcon.addEventListener("click", (e) => {
  container.classList.toggle("hide");
});


document.addEventListener("DOMContentLoaded", function(){
    var linkHome = document.getElementById('linkHome');
    var linkPromotions = document.getElementById('linkPromotions');
    var linkProduct = document.getElementById('linkProduct');

    var statisticsContent = document.getElementById('statisticsContent');
    var promotionsContent = document.getElementById('promotionsContent');
    var manageProduct = document.getElementById('manageProduct');


    statisticsContent.style.display = 'block';
    promotionsContent.style.display = 'none';
    manageProduct.style.display = 'none';

    linkHome.classList.add('selected'); // Thêm lớp cho liên kết "Trang chủ"



    linkHome.addEventListener('click', function(event){
         event.preventDefault();//Chặn hành động của thẻ a
         statisticsContent.style.display = 'block'; 
         promotionsContent.style.display = 'none'; 
         manageProduct.style.display = 'none';

         linkHome.classList.add('selected'); // Thêm lớp cho liên kết "Trang chủ"
         linkPromotions.classList.remove('selected');
         linkProduct.classList.remove('selected');
    });


    linkProduct.addEventListener('click', function (event) {
      event.preventDefault();
      manageProduct.style.display = 'block';
      statisticsContent.style.display = 'none'; 
      promotionsContent.style.display = 'none'; 

      linkHome.classList.remove('selected');
      linkPromotions.classList.remove('selected');
      linkProduct.classList.add('selected');
    });


    linkPromotions.addEventListener('click', function(event){
      event.preventDefault();//Chặn hành động của thẻ a
      statisticsContent.style.display = 'none'; 
      promotionsContent.style.display = 'block';
      manageProduct.style.display = 'none';

      linkHome.classList.remove('selected');
      linkPromotions.classList.add('selected');
      linkProduct.classList.remove('selected');
 });

    

});



