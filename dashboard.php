<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background: #f1f8e9;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .container {
            background: #fff;
            max-width: 400px;
            margin: 60px auto;
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(67,160,71,0.18);
            padding: 36px 28px;
            text-align: center;
        }
        h2 {
            color: #43a047;
            margin-bottom: 18px;
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
        <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Anda berhasil login ke dashboard.</p>
        <a href="logout_dashboard.php">Logout</a>
    </div>
</body>
</html>