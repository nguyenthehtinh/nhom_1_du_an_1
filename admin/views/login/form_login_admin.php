<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>King Manga - Đăng Nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f6f9;
        }
        .login-box {
            max-width: 400px;
            padding: 30px;
            background-color: white;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        .login-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        .input-group .form-control {
            border-radius: 5px;
            box-shadow: none;
        }
        .btn-login {
            width: 100%;
            border-radius: 5px;
        }
        .forgot-password {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 class="login-title">Đăng Nhập</h2>
        <?php if (isset($_SESSION['error'])) { ?>
            <p class="text-danger"><?= $_SESSION['error'] ?></p>
        <?php } else { ?>
            <p class="text-muted">Vui lòng đăng nhập</p>
        <?php } ?>
        <form action="<?= '?act=check-login-admin' ?>" method="POST">
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Mật khẩu" name="mat_khau" required>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-login">Đăng nhập</button>
        </form>
        <p class="forgot-password">
            <a href="forgot-password.html">Quên mật khẩu?</a>
        </p>
    </div>
    <!-- JAVASCRIPT -->
    <?php require_once "views/layouts/libs_js.php"; ?>
</body>
</html>
