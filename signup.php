<?php
include 'db.php'; 
$message = '';
$message_type = 'info'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

        $sql_check = "SELECT id FROM users WHERE username = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("s", $username);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            $message = "Username sudah digunakan, silakan pilih yang lain.";
            $message_type = 'danger';
        } else {
            $sql_insert = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
            $stmt_insert->bind_param("ss", $username, $password_hashed);
            
            if ($stmt_insert->execute()) {
                $message = 'Registrasi berhasil! Silakan <a href="login.php" class="alert-link">login</a>.';
                $message_type = 'success';
            } else {
                $message = 'Error: Terjadi kesalahan saat registrasi.';
                $message_type = 'danger';
            }
            $stmt_insert->close();
        }
        $stmt_check->close();
    }
    $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - TechnoSoft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> </head>
<body class="auth-body">

    <div class="auth-container">
        <div class="text-center mb-4">
            <i class="fas fa-user-plus fa-4x text-primary"></i>
            <h2 class="mt-3 fw-bold">Sign Up</h2>
            <p class="text-muted">Buat akun baru Anda</p>
        </div>
        
        <?php if(!empty($message)): ?>
            <div class="alert alert-<?= $message_type ?>"><?= $message ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Username" minlength="4" required>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary fw-semibold"><i class="fas fa-check-circle me-2"></i>Sign Up</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <p class="text-muted">Sudah punya akun? <a href="login.php">Sign In</a></p>
            <a href="index.php">Kembali ke Beranda</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>