<?php
// Proses apabila form dikirim
$message = '';
$uploadedUrl = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    if ($username === '') {
        $message = 'Nama pengguna harus diisi.';
    } elseif (!isset($_FILES['photo']) || $_FILES['photo']['error'] === UPLOAD_ERR_NO_FILE) {
        $message = 'Silakan pilih gambar profil.';
    } else {
        $file = $_FILES['photo'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $message = 'Terjadi kesalahan saat mengunggah.';
        } else {
            // Validasi tipe dan ukuran
            $maxSize = 2 * 1024 * 1024; // 2 MB
            $allowed = ['image/jpeg', 'image/png', 'image/gif'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);

            if (!in_array($mime, $allowed, true)) {
                $message = 'Tipe file tidak diperbolehkan. Hanya JPG, PNG, GIF.';
            } elseif ($file['size'] > $maxSize) {
                $message = 'Ukuran file terlalu besar (maks 2 MB).';
            } elseif (getimagesize($file['tmp_name']) === false) {
                $message = 'File bukan gambar yang valid.';
            } else {
                // Siapkan folder upload
                $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                // Buat nama file aman dan unik
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $safeName = preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($file['name'], PATHINFO_FILENAME));
                $newName = $safeName . '_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . strtolower($ext);
                $target = $uploadDir . DIRECTORY_SEPARATOR . $newName;

                if (move_uploaded_file($file['tmp_name'], $target)) {
                    $message = 'Unggah berhasil.';
                    $uploadedUrl = 'uploads/' . $newName;
                } else {
                    $message = 'Gagal menyimpan file.';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Upload Profil</title>
    <style>
        body { background:#f7fbff; font-family:Segoe UI, Arial, sans-serif; padding:24px; }
        .card { max-width:520px; margin:28px auto; background:#fff; border-radius:10px; box-shadow:0 6px 20px rgba(0,0,0,0.06); padding:24px; }
        h2 { color:#0d47a1; text-align:center; margin-bottom:16px; }
        label { display:block; margin:8px 0 4px; color:#1a237e; font-weight:600; }
        input[type="text"], input[type="file"] { width:100%; padding:10px; border-radius:6px; border:1px solid #cfd8dc; }
        .hint { font-size:0.9em; color:#607d8b; margin-top:6px; }
        .btn { background:#1976d2; color:#fff; padding:10px 16px; border:none; border-radius:6px; cursor:pointer; margin-top:12px; }
        .msg { margin-top:14px; padding:10px; border-radius:6px; background:#e3f2fd; color:#0d47a1; }
        .error { background:#ffebee; color:#c62828; }
        .preview { margin-top:14px; text-align:center; }
        .preview img { max-width:180px; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.08); }
        a.link { display:inline-block; margin-top:8px; color:#1565c0; text-decoration:none; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Form Upload Profil</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <label for="username">Nama Pengguna</label>
            <input type="text" name="username" id="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required>

            <label for="photo">Foto Profil (JPG/PNG/GIF, maks 2MB)</label>
            <input type="file" name="photo" id="photo" accept="image/*" required>
            <div class="hint">Pilih file gambar untuk foto profil Anda.</div>

            <button type="submit" class="btn">Unggah</button>
        </form>

        <?php if ($message): ?>
            <div class="msg <?php echo $uploadedUrl ? '' : 'error'; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <?php if ($uploadedUrl): ?>
            <div class="preview">
                <p>Preview:</p>
                <img src="<?php echo htmlspecialchars($uploadedUrl); ?>" alt="Foto profil">
                <div><a class="link" href="<?php echo htmlspecialchars($uploadedUrl); ?>" target="_blank">Buka gambar</a></div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
