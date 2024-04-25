<?php
// Kiểm tra phương thức POST và tồn tại của formData
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['formData'])) {
    $formData = json_decode($_POST['formData'], true);

    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "GLstarsky", "baohuy", "checkbox") or die ('{ "error": "database_error" }');

    // Truy vấn cơ sở dữ liệu để lấy ID cuối cùng
    $query = mysqli_query($conn, "SELECT MAX(id) AS max_id FROM permissions");
    $row = mysqli_fetch_assoc($query);
    $max_id = $row['max_id'];

    // Tính toán ID mới
    $new_id = $max_id + 1;

    // Lặp qua formData để lấy thông tin về quyền của từng chức vụ
    foreach ($formData as $data) {
        $authorityName = $data['authority_name'];
        $permissionName = $data['permission_name'];
        $permissionView = $data['permission_view'];
        $permissionAdd = $data['permission_add'];
        $permissionEdit = $data['permission_edit'];
        $permissionDelete = $data['permission_delete'];

        // Sử dụng ID mới này khi chèn bản ghi vào cơ sở dữ liệu
        $query_insert = mysqli_query($conn, "INSERT INTO permissions (id, authority_name, permission_name, permission_view, permission_add, permission_edit, permission_delete) 
                                VALUES ('$new_id', '$authorityName', '$permissionName', '$permissionView', '$permissionAdd', '$permissionEdit', '$permissionDelete')");
        if (!$query_insert) {
            die (json_encode(['error' => mysqli_error($conn)]));
        }
    }    
    
    // Kiểm tra lỗi và trả về kết quả tương ứng
    if (mysqli_error($conn)) {
        die (json_encode(['error' => 'Có lỗi xảy ra khi thêm dữ liệu.']));
    } else {
        die (json_encode(['success' => 'Đã lưu dữ liệu vào cơ sở dữ liệu.']));
    }
}
?>
