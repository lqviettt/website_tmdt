<?php
require_once "database.php";
require_once "session.php";

Session::init();

$db = new Database();

$error_message = "";
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($user_name && $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Mã hóa mật khẩu

        // Kiểm tra xem email đã tồn tại chưa
        $query = "SELECT * FROM tbl_users WHERE email = ?";
        $stmt = $db->link->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            // Thêm người dùng mới vào cơ sở dữ liệu
            $query = "INSERT INTO tbl_users (user_name, email,  password) VALUES (?, ?, ?)";
            $stmt = $db->link->prepare($query);
            $stmt->bind_param('sss', $user_name, $email, $hashed_password);
            $stmt->execute();

            $success = true;
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
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        .popup {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .popup-content {
            background-color: #eee;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
            text-align: center;
        }

        .close-btn {
            background-color: #3b3b3b;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .close-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body background="./uploads_img/nen1.jpg">
    <div class="form-container sign-in-container">
        <form method="post" action="#" onsubmit="return validateForm();">
            <h1>Đăng Ký</h1>
            <input type="text" id="user_name" name="user_name" placeholder="Username" required>

            <input type="text" id="email" name="email" placeholder="Email" class="form-control" onblur="checkEmail()" required>
            <div id="emailError" style="display:none; color:red; font-size:12px;">Email sai định dạng, xin vui lòng nhập lại!</div>

            <input type="password" id="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit">Đăng ký</button>
            <br>
            <p>Quay lại trang <a href='login.php'>đăng nhập</a>.</p>

            <?php
                if (isset($error_message)) {
                    echo "<p style='color: red;'>$error_message</p>";
                }
            ?>
        </form>
    </div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <p>Đăng ký thành công!</p>
            <button class="close-btn" onclick="redirectToLogin()">Đi đến đăng nhập</button>
        </div>
    </div>

    <script>
        function redirectToLogin() {
            window.location.href = 'login.php';
        }

        <?php
        if ($success) {
            echo "document.getElementById('popup').style.display = 'block';";
        }
        ?>

        function checkEmail() {
            var email = document.getElementById('email').value;
            var emailError = document.getElementById('emailError');
            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!regex.test(email)) {
                emailError.style.display = 'block';
                return false;
            } else {
                emailError.style.display = 'none';
                return true;
            }
        }

        function validateForm() {
            return checkEmail();
        }
    </script>
</body>
</html>
