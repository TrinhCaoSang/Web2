let isLoggedIn = false;
// ============================= Start: SHOW FORM REG/LOG
const userBtn = document.querySelector('.header__bottom--extention-user');
const overlay = document.querySelector('.overlay');
const userWrapper = document.querySelector('.user__wrapper');

const openFormRegister = () => {
  console.log("open");
  if (!isLoggedIn) {
    userWrapper.classList.add('user__active');
    userWrapper.classList.add('register__active');
    overlay.classList.add('active__overlay');
  }
};
userBtn.addEventListener('click', e => {
  // checkLoggedIn();
  openFormRegister();
});

//Click btn at section4
const section4Btn = document.querySelector('.section--4 button');
section4Btn.addEventListener('click', e => {
  openFormRegister();
});
// ============================= End: SHOW FORM REG/LOG

// ============================= Start: Switch mode reg/log
//Change to login
const signinBtn = document.querySelector('.register__background button');

signinBtn.addEventListener('click', e => {
  userWrapper.classList.add('login__active');
  userWrapper.classList.remove('register__active');
});

//Change to login when on low device
const signinBtnOnLowDevice = document.querySelector('.signin button');
const registerAgainOnLowDevice = document.querySelector('.register__again button');

signinBtnOnLowDevice.addEventListener('click', e => {
  userWrapper.classList.add('login__active');
  userWrapper.classList.remove('register__active');
});

registerAgainOnLowDevice.addEventListener('click', e => {
  userWrapper.classList.remove('login__active');
  userWrapper.classList.add('register__active');
});

//Change to register when show login form
const registerAgain = document.querySelector('.login__background button');
registerAgain.addEventListener('click', e => {
  userWrapper.classList.add('register__active');
  userWrapper.classList.remove('login__active');
});
// Open form reg/login on low device by hide menu
const userIconHideMenu = document.querySelector('.hide__menu--list__extention .header__bottom--extention-user');
const hideMenu = document.querySelector('.hide__menu');

userIconHideMenu.addEventListener('click', e => {
  openFormRegister();
});
// ============================= end: Switch mode reg/log
// ============================= Start: HIDE FORM
const hideFormRegLogin = () => {
  userWrapper.style.animation = `fade 0.5s ease-in`;
  setTimeout(() => {
    overlay.classList.remove('active__overlay');
    userWrapper.classList.remove('user__active');
    userWrapper.classList.remove('register__active');
    userWrapper.classList.remove('login__active');
    userWrapper.style.animation = `bottomUp 1s ease-in-out`;
  }, 0);
};
overlay.addEventListener('click', e => {
  hideFormRegLogin();
});

// Close form by button
const btnCloseGlobal = document.querySelector('.user__wrapper .form__close--global');
btnCloseGlobal.addEventListener('click', e => {
  hideFormRegLogin();
});
// =========================== start: LOGOUT LOGIC ===========================

// =========================== end: LOGOUT LOGIC ===========================



// ========================== Show / Hide: Password ============================
// Đối với form đăng nhập
var loginShowEyeBtn = document.querySelector('.showEyeLogin');
var loginHideEyeBtn = document.querySelector('.hideEyeLogin');
var loginPasswordInput = document.querySelector('#loginPassword'); // thay đổi #loginPassword thành id thật của trường mật khẩu cho form đăng nhập của bạn

loginShowEyeBtn.addEventListener('click', function(e) {
    e.preventDefault(); 
    loginPasswordInput.type = 'text';
    loginShowEyeBtn.style.display = 'none';
    loginHideEyeBtn.style.display = 'block';
});

loginHideEyeBtn.addEventListener('click', function(e) {
    e.preventDefault(); 
    loginPasswordInput.type = 'password';
    loginHideEyeBtn.style.display = 'none';
    loginShowEyeBtn.style.display = 'block';
});

// Đối với form đăng ký
var registerShowEyeBtn = document.querySelector('.showEyeRegister');
var registerHideEyeBtn = document.querySelector('.hideEyeRegister');
var registerPasswordInput = document.querySelector('#registerPassword'); // thay đổi #registerPassword thành id thật của trường mật khẩu cho form đăng ký của bạn

registerShowEyeBtn.addEventListener('click', function(e) {
    e.preventDefault(); 
    registerPasswordInput.type = 'text';
    registerShowEyeBtn.style.display = 'none';
    registerHideEyeBtn.style.display = 'block';
});

registerHideEyeBtn.addEventListener('click', function(e) {
    e.preventDefault(); 
    registerPasswordInput.type = 'password';
    registerHideEyeBtn.style.display = 'none';
    registerShowEyeBtn.style.display = 'block';
});