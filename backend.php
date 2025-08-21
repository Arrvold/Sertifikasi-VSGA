<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
$message = '';
$message_type = ''; 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $message = "File ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " berhasil di-upload.";
        $message_type = 'success';
    } else {
        $message = "Maaf, terjadi kesalahan saat meng-upload file.";
        $message_type = 'danger';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend - TechnoSoft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> </head>
<body class="auth-body">

    <div class="auth-container">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Selamat Datang, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
            <p>Halaman Upload File</p>
        </div>
        
        <?php if (!empty($message)): ?>
            <div class="alert alert-<?= $message_type ?>"><?= $message ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="fileToUpload" class="form-label">Pilih file untuk di-upload:</label>
                <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success fw-semibold"><i class="fas fa-upload me-2"></i>Upload File</button>
                <a href="logout.php" class="btn btn-danger fw-semibold"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>