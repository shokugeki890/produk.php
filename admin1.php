<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_form.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Area</title>
    <style>
        body {
            background: linear-gradient(135deg, #1976d2 0%, #64b5f6 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 60px auto;
            background: #e3f2fd;
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(25,118,210,0.18);
            padding: 36px 28px;
            text-align: center;
        }
        h2 {
            color: #1976d2;
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
            background: #1976d2;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.2s;
        }
        a:hover {
            background: #64b5f6;
            color: #1976d2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">🛠️</div>
        <h2>Selamat datang, Admin!</h2>
        <p>Anda dapat mengelola data dan pengguna.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>