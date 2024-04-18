// Lấy thông tin username và email
<?php
$registerName = isset($_POST['registerName']) ? $_POST['registerName'] : false;
$registerEmail = isset($_POST['registerEmail']) ? $_POST['registerEmail'] : false;
$registerPassword = isset($_POST['registerPassword']) ? $_POST['registerPassword'] : false; 

if (!$registerName && !$registerEmail &&!$registerPassword){
    die ('{error:"bad_request"}');
}
 

$conn = mysqli_connect('localhost', 'localhost', 'username', 'test') or die ('{error:"bad_request"}');
 
$error = array(
    'error' => 'success',
    'registerName' => '',
    'registerEmail' => '',
    'registerPassword' => '',
);
 
if ($registerEmail)
{
    $query = mysqli_query($conn, "SELECT COUNT(*) AS count FROM member WHERE username = '" . mysqli_real_escape_string($conn, $registerEmail) . "'"); 
    if ($query){
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ((int)$row['count'] > 0){
            $error['username'] = 'Tên đăng nhập đã tồn tại';
        }
    }
    else{
        die ('{error:"bad_request"}');
    }
}
 
$query = mysqli_query($conn, "insert into member(registerName, registerEmail, registerPassword) value ('$registerName','$registerEmail','$registerPassword')");

die (json_encode($error));
?>