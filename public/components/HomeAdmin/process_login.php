<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword']; 

    $conn = mysqli_connect("localhost", "GLstarsky", "baohuy", "user") or die (json_encode(['error' => 'Không thể kết nối đến cơ sở dữ liệu.']));

    $query = mysqli_query($conn, "SELECT id, registerPassword FROM user.user_account WHERE registerEmail = '" . mysqli_real_escape_string($conn, $loginEmail) . "'");
    if (!$query) {
        die (json_encode(['error' => 'Có lỗi xảy ra khi thực hiện truy vấn.']));
    }

    if (mysqli_num_rows($query) == 0) {
        die (json_encode(['error' => 'Địa chỉ email không tồn tại trong hệ thống.']));
    }

    $row = mysqli_fetch_assoc($query);
    $userId = $row['id'];
    $registerPassword = $row['registerPassword'];

    if ($loginPassword === $registerPassword) {
        session_start();
        $_SESSION['user_id'] = $userId; 
        die (json_encode(['success' => 'Đăng nhập thành công.']));
    } else {
        die (json_encode(['error' => 'Mật khẩu không chính xác.']));
    }
}
?>
