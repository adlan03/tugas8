<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: objek-wisata.php');
    exit;
}

$error = '';
$defaultUser = 'admin';
$defaultPass = 'admin123';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === $defaultUser && $password === $defaultPass) {
        $_SESSION['username'] = $username;
        header('Location: objek-wisata.php');
        exit;
    }

    $error = 'Username atau password salah';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WebSulSel</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .login-wrapper {
            max-width: 400px;
            margin: 60px auto;
            padding: 24px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        }
        .login-wrapper h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .login-wrapper label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }
        .login-wrapper input[type="text"],
        .login-wrapper input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .login-wrapper button {
            width: 100%;
            padding: 12px;
            background: #0a74da;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-wrapper .error {
            color: #d32f2f;
            margin-bottom: 12px;
            text-align: center;
        }
    </style>
</head>
<body style="background:#f5f5f5;">
    <div class="login-wrapper">
        <h1>Login Admin</h1>
        <?php if($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>
