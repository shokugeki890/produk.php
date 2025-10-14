<?php
session_start();

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi sederhana (username dan password tidak kosong)
    if ($username && $password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username dan password harus diisi!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Sederhana</title>
    <style>
        body {
            background: #e3f2fd;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .container {
            background: #fff;
            max-width: 350px;
            margin: 60px auto;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            padding: 32px 24px;
        }
        h2 {
            color: #1976d2;
            text-align: center;
            margin-bottom: 24px;
        }
        label {
            color: #0d47a1;
            font-weight: 500;
            display: block;
            margin-bottom: 6px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 18px;
            border-radius: 6px;
            border: 1px solid #bdbdbd;
            font-size: 1em;
        }
        input[type="submit"] {
            background: #1976d2;
            color: #fff;
            border: none;
            padding: 10px 24px;
            border-radius: 6px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.2s;
        }
        input[type="submit"]:hover {
            background: #0d47a1;
        }
        .error {
            color: #d90429;
            text-align: center;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>