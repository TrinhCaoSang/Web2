const toggleMenuIcon = document.querySelector(".admin__content--header__cate");
const container = document.querySelector(".container");
const adminMenu = document.querySelector(".admin__taskbar");

toggleMenuIcon.addEventListener("click", (e) => {
  container.classList.toggle("hide");
});
