<?php
require_once "database.php";
require_once "session.php";

Session::init();

// Khởi tạo biến $db
$db = new Database();

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($user_name && $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Mã hóa mật khẩu

        // Kiểm tra xem user_name đã tồn tại chưa
        $query = "SELECT * FROM tbl_users WHERE user_name = ?";
        $stmt = $db->link->prepare($query);
        $stmt->bind_param('s', $user_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            // Thêm người dùng mới vào cơ sở dữ liệu
            $query = "INSERT INTO tbl_users (user_name, password) VALUES (?, ?)";
            $stmt = $db->link->prepare($query);
            $stmt->bind_param('ss', $user_name, $hashed_password);
            $stmt->execute();

            // Chuyển hướng đến trang đăng nhập sau khi đăng ký thành công
            // header("Location: login.php");
            echo "username: $user_name; pass: $password; hash: $hashed_password";
            exit();
        } else {
            $error_message = "Tên đăng nhập đã tồn tại.";
        }
    } else {
        $error_message = "Vui lòng nhập đầy đủ thông tin.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký</title>
</head>
<body>
    <form method="post" action="register.php">
        <label for="user_name">Tên đăng nhập:</label>
        <input type="text" id="user_name" name="user_name" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Đăng ký</button>
    </form>
    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
</body>
</html>
