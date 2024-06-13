<?php
require_once "database.php";
require_once "session.php";

// Khởi tạo biến $db
$db = new Database();

Session::init();

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($user_name && $password) {
        // Kiểm tra user_name trong cơ sở dữ liệu
        $query = "SELECT * FROM tbl_users WHERE user_name = ?";
        $stmt = $db->link->prepare($query);
        $stmt->bind_param('s', $user_name);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            // Đăng nhập thành công
            Session::set('login', true);
            Session::set('user_id', $user['user_id']);
            Session::set('user_name', $user['user_name']);
            Session::set('is_admin', $user['is_admin']);

            if ($user['is_admin'] == 1) {
                // Nếu là admin, chuyển hướng đến trang quản lý
                header('Location: ../admin');
                exit();
            } else {
                // Nếu là người dùng bình thường, chuyển hướng đến trang chủ
                header('Location: home.php');
                exit();
            }

        } else {
            $error_message = "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
    } else {
        $error_message = "Vui lòng nhập đầy đủ thông tin.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <form method="post" action="login.php">
        <label for="user_name">Tên đăng nhập:</label>
        <input type="text" id="user_name" name="user_name" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Đăng nhập</button>
    </form>
    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
        echo "<p>Nếu bạn chưa có tài khoản, vui lòng <a href='register.php'>đăng ký</a>.</p>";
    }
    ?>
</body>
</html>
