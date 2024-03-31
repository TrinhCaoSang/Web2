<div class="footer-container">
      <div class="footer--section grid wide">
        <div class="row">
          <div class="footer-item footer-item--logo col c-12 m-12 l-2">TREK</div>

          <div class="footer-item footer-item--produce col c-6 m-6 l-2">
            <h1>Sản phẩm</h1>
            <ul>
              <li>
                <a href="">Mountain</a>
              </li>
              <li>
                <a href="">Road</a>
              </li>
              <li>
                <a href="">Touring</a>
              </li>
              <li>
                <a href="">Electric</a>
              </li>
              <li>
                <a href="">Kids</a>
              </li>
            </ul>
          </div>

          <div class="footer-item footer-item--company col c-6 m-6 l-2">
            <h1>Về chúng tôi</h1>
            <ul>
              <li>
                <a href="">Lịch sử hình thành</a>
              </li>
              <li>
                <a href="">Về TREK</a>
              </li>
            </ul>
          </div>

          <div class="footer-item footer-item--help col c-6 m-6 l-2">
            <h1>Hỗ trợ</h1>
            <ul>
              <li>
                <a href="">FAQs</a>
              </li>
              <li>
                <a href="">Thông tin bảo mật</a>
              </li>
              <li>
                <a href="">Chính sách chung</a>
              </li>
              <li>
                <a href="">Tra cứu đơn hàng</a>
              </li>
            </ul>
          </div>

          <div class="footer-item footer-contact col c-6 m-6 l-2">
            <h1>Liên hệ chúng tôi</h1>
            <ul>
              <li>Địa chỉ: 801 West Madison Street, Waterloo WI 53594</li>
              <li>Hotline: 1-800-585-8735</li>
            </ul>
          </div>
        </div>

        <div class="footer-socials">
          <a href="">
            <i class="fa-brands fa-square-facebook"></i>
          </a>
          <a href="">
            <i class="fa-brands fa-square-instagram"></i>
          </a>
          <a href="">
            <i class="fa-brands fa-square-youtube"></i>
          </a>
          <a href="">
            <i class="fa-brands fa-square-x-twitter"></i>
          </a>
        </div>

        <div class="footer-copyright">
          <p>Copyright © 2023 TREK. All rights reserved.</p>
        </div>
      </div>
    </div>
     

    <div class="overlay"></div>
    <!-- login/create account -->
    <div class="user__wrapper">
      <button class="form__close--global">
          <i class="fa-solid fa-xmark"></i>
      </button>

      <div class="register">
        <div class="register__info">

          <h1>Tạo tài khoản</h1>

          <form>
            <div class="register__info--input register__info--input__full-name">
              <label for="registerName">Tên đầy đủ</label>
              <input type="text" name="" id="registerName" class="register__info--input-name" placeholder="Nhập tên của bạn" />
              <p></p>
            </div>
            
            <div class="register__info--input register__info--input__full-email">
              <label for="registerEmail">Địa chỉ email</label>
              <input type="email"
              class="register__info--input-email"
              id="registerEmail"
              placeholder="Nhập email của bạn"
              />
              <p></p>
            </div>

            <div class="register__info--input register__info--input__full-password">
               <label for="registerPassword">Mật khẩu</label>
               <div class="password__container">
                <input type="password"
                class="register__info--input-password"
                id="registerPassword"
                placeholder="Nhập mật khẩu của bạn"/>
                <button class="showEyeRegister">
                   <i class="fa-solid fa-eye"></i>
                </button>

                <button class="hideEyeRegister hide">
                  <i class="fa-solid fa-eye-slash"></i>
                </button>
               </div>
               <p></p>
            </div>

            <p class="policy">
              Bằng việc đã đăng ký, bạn đã đồng ý với <b>Trek</b> về 
              <a href="">Điều khoản dịch vụ</a> và 
              <a href="">Chính sách bảo mật</a>
            </p>

            <input type="submit" class="register__info--submit" value="Đăng ký" />
          </form>

          <div class="signin" style="display: none">
              <p>Bạn đã có tài khoản?</p>
              <button>Đăng nhập</button>
          </div>
        </div>

        <div class="register__background">
          <h1>Chào mừng bạn đã trở lại</h1>
          <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
          <button>Đăng nhập</button>
        </div>
      </div>

      <div class="login">
        <div class="login__info">
          <h1>Đăng nhập</h1>

          <form >
            <div class="login__info--input login__info--input__full-email">
              <label for="loginEmail">Địa chỉ email</label>
              <input type="email" class="login__info--input-email" id="loginEmail" placeholder="Nhập email của bạn" />
              <p></p>
            </div>

            <div class="login__info--input login__info--input__full-password">
              <label for="loginPassword">Mật khẩu</label>

              <div class="password__container">
                <input type="password"
                class="login__info--input-password"
                id="loginPassword"
                placeholder="Nhập mật khẩu của bạn"/>

                <button class="showEyeLogin">
                  <i class="fa-solid fa-eye"></i>
                </button>
                <button class="hideEyeLogin hide">
                  <i class="fa-solid fa-eye-slash"></i>
                </button>
              </div>
              <p></p>
            </div>

            <div class="forgot__password">
              <a href="#">Bạn quên mật khẩu?</a>
            </div>

            <input type="submit" class="login__info--submit" value="Đăng nhập" />

            <button class="login__info--create__other mb10px">
              <svg
                stroke="currentColor"
                fill="currentColor"
                stroke-width="0"
                version="1.1"
                x="0px"
                y="0px"
                viewBox="0 0 48 48"
                enable-background="new 0 0 48 48"
                class="h-5 w-5"
                height="1em"
                width="1em"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill="#FFC107"
                  d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                  c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                  c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"
                ></path>
                <path
                  fill="#FF3D00"
                  d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
                  C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"
                ></path>
                <path
                  fill="#4CAF50"
                  d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                  c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"
                ></path>
                <path
                  fill="#1976D2"
                  d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                  c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"
                ></path>
              </svg>
              Đăng nhập với Google
            </button>
            
            <button class="login__info--create__other">
              <svg xmlns="http://www.w3.org/2000/svg" fill="#0866ff" width="800px" height="800px" viewBox="0 0 24 24">
                <path
                  d="M12 2.03998C6.5 2.03998 2 6.52998 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.84998C10.44 7.33998 11.93 5.95998 14.22 5.95998C15.31 5.95998 16.45 6.14998 16.45 6.14998V8.61998H15.19C13.95 8.61998 13.56 9.38998 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96C15.9164 21.5878 18.0622 20.3855 19.6099 18.57C21.1576 16.7546 22.0054 14.4456 22 12.06C22 6.52998 17.5 2.03998 12 2.03998Z"
                />
              </svg>
              Đăng nhập với Facebook
            </button>
          </form>
          <div class="register__again" style="display: none">
            <p>Bạn chưa có tài khoản?</p>
            <button>Đăng ký</button>
          </div>
        </div>

        <div class="login__background">
          <h1>Chào, bạn!</h1>
          <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
          <button>Đăng ký</button>
        </div>
      </div>
    </div>
    
    <div class="hide__menu">
      <button class="hide__menu--close">
        <i class="fa-solid fa-xmark"></i>
      </button>
      <h1>TREK</h1>
      <div class="hide__menu--list__extention">
        <div class="header__bottom--extention-item header__bottom--extention-user">
          <i class="fa-solid fa-user"></i>
          <span>Tài khoản</span>
          <i class="header__bottom--extention__icon header__bottom--extention__icon--right fa-solid fa-arrow-right"></i>
          <i class="header__bottom--extention__icon header__bottom--extention__icon--down fa-solid fa-caret-down"></i>
          <i class="header__bottom--extention__icon header__bottom--extention__icon--up fa-solid fa-caret-up"></i>
        </div>
        <div class="hide__menu--user__list">
          <div class="hide__menu--list__type adminManager__item" style="display: none"><button>Quản lý</button></div>
          <div class="hide__menu--list__type logout__item"><button>Đăng xuất</button></div>
        </div>
        <a href="public/html/page/cart/cart.html" class="header__bottom--extention-item header__bottom--extention-cart">
          <i class="fa-solid fa-cart-shopping"></i>
          <span>Giỏ hàng</span>
          <i class="header__bottom--extention__icon fa-solid fa-arrow-right"></i>
        </a>

        <div class="header__bottom--extention-item header__bottom--extention-cate">
          <i class="fa-solid fa-table-columns"></i>
          <span>Danh mục</span>
          <i class="header__bottom--extention__icon header__bottom--extention__icon--down fa-solid fa-caret-down"></i>
          <i class="header__bottom--extention__icon header__bottom--extention__icon--up fa-solid fa-caret-up"></i>
        </div>
        <div class="hide__menu--list__types">
          <div class="hide__menu--list__type"><a href="public/html/page/product/product.php">ALL</a></div>
          <div class="hide__menu--list__type"><a href="public/html/page/product/product.php">MOUNTAIN</a></div>
          <div class="hide__menu--list__type"><a href="public/html/page/product/product.php">ROAD</a></div>
          <div class="hide__menu--list__type"><a href="public/html/page/product/product.php">TOURING</a></div>
          <div class="hide__menu--list__type"><a href="public/html/page/product/product.php">KIDS</a></div>
        </div>
      </div>
    </div>
  </body>
</html>