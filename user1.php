<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login_form.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Area</title>
    <style>
        body {
            background: linear-gradient(135deg, #43a047 0%, #b2ff59 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 60px auto;
            background: #e8f5e9;
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(67,160,71,0.18);
            padding: 36px 28px;
            text-align: center;
        }
        h2 {
            color: #43a047;
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
            background: #43a047;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.2s;
        }
        a:hover {
            background: #b2ff59;
            color: #43a047;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">🙋‍♂️</div>
        <h2>Selamat datang, User!</h2>
        <p>Anda dapat melihat data dan informasi.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>