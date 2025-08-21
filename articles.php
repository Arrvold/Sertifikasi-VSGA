<?php
session_start();
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM articles");
$articles = [];
while ($row = mysqli_fetch_assoc($result)) {
    $articles[] = $row;
}

$selected_article = null;
if (isset($_SESSION['selected_article'])) {
    $article_id = $_SESSION['selected_article'];
    $stmt = $conn->prepare("SELECT * FROM articles WHERE id_article = ?");
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $selected_article = $result->fetch_assoc();
    $stmt->close();
}

if (!$selected_article && count($articles) > 0) {
    $selected_article = $articles[0];
}

unset($_SESSION['selected_article']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="artikelDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-newspaper me-1"></i> Artikel
                        </a>

                        <ul class="dropdown-menu">
                            <?php foreach ($articles as $article): ?>
                                <li><a class="dropdown-item" href="index.php?article_id=<?php echo $article['id_article']; ?>"><?php echo $article['title']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="index.php#gallery"><i class="fas fa-images me-1"></i> Galery Foto</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#clients"><i class="fas fa-handshake me-1"></i> Klien</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php"><i class="fas fa-user-plus me-1"></i> Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-1"></i> Sign In</a></li>
                </ul>
            </div>

            <a class="navbar-brand mx-auto" href="index.php">
                <img src="img/logo.png" alt="Company Logo"> </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarRight">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarRight">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#services">Produk Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container text-center pt-5">
        <section id="services" class="border mt-5 rounded rounded-5">
            <?php if ($selected_article): ?>
                <h1 class="section-title mt-5"><?php echo htmlspecialchars($selected_article['title']); ?></h1>
                <div class="article-content p-4 text-start">
                    <?php echo nl2br(htmlspecialchars($selected_article['text'])); ?>
                </div>
            <?php else: ?>
                <h1 class="section-title mt-5">Artikel Tidak Ditemukan</h1>
                <p>Artikel yang Anda cari tidak tersedia.</p>
            <?php endif; ?>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>