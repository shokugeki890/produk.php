<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'superadmin') {
    header("Location: login_form.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Superadmin Area</title>
    <style>
        body {
            background: linear-gradient(135deg, #ff6f00 0%, #ffd600 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 60px auto;
            background: #fffbe7;
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(255,111,0,0.18);
            padding: 36px 28px;
            text-align: center;
        }
        h2 {
            color: #ff6f00;
            margin-bottom: 18px;
        }
        .icon {
            font-size: 48px;
            margin-bottom: 16px;
        }
        a {
            display: inline-block;
            margin-top: 24px;
            padding: 10px 28px;
            background: #ff6f00;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.2s;
        }
        a:hover {
            background: #ffd600;
            color: #ff6f00;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">👑</div>
        <h2>Selamat datang, Superadmin!</h2>
        <p>Anda memiliki akses penuh ke sistem.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>