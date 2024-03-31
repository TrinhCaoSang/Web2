<footer id="footer">
        <div class="totalPrice" id="totalPriceContainer">
          <h3>Thanh toán</h3>
          <span id="totalPriceId">0 VND</span>
        </div>
        <div class="footerButton">
          <button id="selectAllButton">Chọn tất cả</button>
  
          <button id="buy">Mua</button>
          <button id="delete">Xóa</button>
        </div>
      </footer>

      <div class="toast" id="toast">
        <h2>Chưa có sản phẩm nào trong giỏ hàng</h2>
      </div>

      <div class="overlay"></div>

      <div class="modal">
        <header class="modal__header">
          <h1>Xóa dữ liệu</h1>
        </header>
        <div class="modal__content">
          <p>Bạn có muốn xóa dữ liệu này không?</p>
        </div>
        <div class="modal__footer">
          <button class="modal__footer--delete">Chắc chắn</button>
          <button class="modal__footer--exit">Không</button>
        </div>
      </div>


      <div class="hide__menu">
        <button class="hide__menu--close">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <h1>TREK</h1>
        <div class="hide__menu--list__extention">
          <div class="header__bottom--extention-item header__bottom--extention-user active-down" id="userLowDeviceBtn">
            <i class="fa-solid fa-user"></i>
            <span>Tài khoản</span>
            <i class="header__bottom--extention__icon header__bottom--extention__icon--down fa-solid fa-caret-down"></i>
            <i class="header__bottom--extention__icon header__bottom--extention__icon--up fa-solid fa-caret-up"></i>
          </div>
          <div class="hide__menu--user__list">
            <div class="hide__menu--list__type adminManager__item" style="display: none"><button>Quản lý</button></div>
            <div class="hide__menu--list__type logout__item"><button>Đăng xuất</button></div>
          </div>
  
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

      <div class="overlay"></div>

      <script type="module" src="public/database/products.js"></script>
      <script type="module" src="public/components/menu/menu.js"></script>
      <script type="module" src="cart.js"></script>
</body>
</html>