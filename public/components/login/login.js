let isLoggedIn = false;
// ============================= Start: SHOW FORM REG/LOG
const userBtn = document.querySelector('.header__bottom--extention-user');
const overlay = document.querySelector('.overlay');
const userWrapper = document.querySelector('.user__wrapper');

const openFormRegister = () => {
  if (!isLoggedIn) {
    userWrapper.classList.add('user__active');
    userWrapper.classList.add('register__active');
    overlay.classList.add('active__overlay');
  }
};
userBtn.addEventListener('click', e => {
  checkLoggedIn();
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
  }, 450);
};
overlay.addEventListener('click', e => {
  hideFormRegLogin();
});

// Close form by button
const btnCloseGlobal = document.querySelector('.user__wrapper .form__close--global');
btnCloseGlobal.addEventListener('click', e => {
  hideFormRegLogin();
});
// =========================== start: IF LOGGEDIN ===========================
const welcomeUser = document.querySelector('.user-welcome');
const userName = welcomeUser.querySelector('p:last-child');
const userList = document.querySelector('.header__bottom--user__list');
const section4 = document.querySelector('.section--4-container');

const checkLoggedIn = () => {
  const userLogin = JSON.parse(localStorage.getItem('User'));
  const userListOnLowDevice = document.querySelector('.hide__menu--user__list');
  const userNameOnLowDevice = document.querySelector(
    '.hide__menu--list__extention .header__bottom--extention-user span'
  );

  if (userLogin) {
    isLoggedIn = true;
    userName.innerText = userLogin.name;
    userNameOnLowDevice.innerText = userLogin.name;
    welcomeUser.classList.add('active');

    userIconHideMenu.removeEventListener('click', openFormRegister);
    userBtn.removeEventListener('click', openFormRegister);

    userBtn.addEventListener('mouseover', e => {
      userList.style.display = 'block';
    });

    userBtn.addEventListener('mouseout', e => {
      userList.style.display = 'none';
    });

    section4.style.display = 'none';

    
    // Kiểm tra quyền truy cập User nếu là admin thì hiển thị btn Quản lý
    if (userLogin.isAdmin) {
      document.querySelectorAll('.adminManager__item').forEach(item => (item.style.display = 'block'));
    }
  } else {
    userList.style.display = 'none';
    userIconHideMenu.addEventListener('click', e => {
      hideMenu.classList.remove('active');
    });
  }
};
checkLoggedIn();
// =========================== end: IF LOGGEDIN ===========================
// =========================== start: LOGOUT LOGIC ===========================
const logoutBtn = document.querySelector('.logout');
const logoutLowDeviceBtn = document.querySelector('.hide__menu--list__type.logout__item');

const logoutHandler = () => {
  localStorage.removeItem('User');
  alert('Đăng xuất thành công!');
  location.reload();
};

logoutLowDeviceBtn.addEventListener('click', logoutHandler);

logoutBtn.addEventListener('click', logoutHandler);
// =========================== end: LOGOUT LOGIC ===========================

 