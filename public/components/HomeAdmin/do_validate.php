<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $registerName = $_POST['registerName'];
        $registerEmail = $_POST['registerEmail'];
        $registerPassword = $_POST['registerPassword']; 

        // Kết nối cơ sở dữ liệu
        $conn = mysqli_connect("localhost", "GLstarsky", "baohuy", "user") or die ('{error:"bad_request"}');
        $strSQL = "SELECT * FROM user.user_account WHERE 1";

        // Kiểm tra sự tồn tại của username
        $query = mysqli_query($conn, "SELECT COUNT(*) AS count FROM user.user_account WHERE registerEmail = '" . mysqli_real_escape_string($conn, $registerEmail) . "'");
        if ($query) {
            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
            if ((int)$row['count'] > 0) {
                die (json_encode(['error' => 'Email đã tồn tại, vui lòng nhập email khác.']));
            }
        } else {
            die ('{error:"bad_request"}');
        }
        
        // Tiến hành thêm dữ liệu vào cơ sở dữ liệu
        $query = mysqli_query($conn, "INSERT INTO user.user_account(registerName, registerEmail, registerPassword) VALUES ('$registerName', '$registerEmail', '$registerPassword')");

        if (!$query) {
            die (json_encode(['error' => 'Có lỗi xảy ra khi thêm dữ liệu.']));
        } else {
            die (json_encode(['success' => 'Đăng ký thành công.']));
        }
    }
?>