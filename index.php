<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM articles ORDER BY id_article DESC LIMIT 2");
$articles = [];
while ($row = mysqli_fetch_assoc($result)) {
    $articles[] = $row;
}

if (isset($_GET['article_id'])) {
    session_start();
    $_SESSION['selected_article'] = $_GET['article_id'];
    header("Location: articles.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechnoSoft Solutions</title>
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
                    <li><a class="navbar-brand mx-auto" href="index.php"><img src="img/logo.png" alt="Company Logo"></a></li>
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
                    <li><a class="nav-link" href="#gallery"><i class="fas fa-images me-1"></i> Galery Foto</a></li>
                    <li><a class="nav-link" href="#clients"><i class="fas fa-handshake me-1"></i> Klien</a></li>
                    <li><a class="nav-link" href="signup.php"><i class="fas fa-user-plus me-1"></i> Sign Up</a></li>
                    <li><a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-1"></i> Sign In</a></li>
                </ul>
            </div>

            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li><a class="nav-link" href="#home">Home</a></li>
                <li><a class="nav-link" href="#about">About Us</a></li>
                <li><a class="nav-link" href="#services">Produk Kami</a></li>
                <li><a class="nav-link" href="#contact">Kontak</a></li>
            </div>
        </div>
    </nav>

    <header id="home" class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">TechnoSoft Solutions</h1>
            <p>Membawa bisnis Anda ke level berikutnya dengan teknologi terdepan.</p>
        </div>
    </header>

    <main class="container">
        <section id="about">
            <div class="text-center mb-5">
                <h2 class="section-title">About Us</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="fw-bold mb-3">Sejarah Perusahaan</h3>
                    <p class="text-muted">TechnoSoft Solutions didirikan pada tahun 2018 dengan visi menjadi perusahaan teknologi terdepan di Indonesia. Kami memulai perjalanan dengan tim kecil yang berdedikasi untuk memberikan solusi teknologi inovatif.</p>
                    <p class="text-muted">Seiring berjalannya waktu, kami telah berkembang menjadi perusahaan yang dipercaya oleh berbagai klien dari berbagai industri untuk mengembangkan solusi digital mereka.</p>
                    <p class="text-muted">Dengan pengalaman lebih dari 6 tahun, kami telah menangani puluhan proyek dan melayani ratusan klien di seluruh Indonesia.</p>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="stat-item text-center">
                                <i class="fas fa-users fa-3x icon-blue mb-2"></i>
                                <h4 class="fw-bold">50+</h4>
                                <p>Tim Ahli</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="stat-item text-center">
                                <i class="fas fa-tasks fa-3x icon-green mb-2"></i>
                                <h4 class="fw-bold">200+</h4>
                                <p>Proyek Selesai</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="stat-item text-center">
                                <i class="fas fa-handshake fa-3x icon-yellow mb-2"></i>
                                <h4 class="fw-bold">150+</h4>
                                <p>Klien Puas</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="stat-item text-center">
                                <i class="fas fa-medal fa-3x icon-red mb-2"></i>
                                <h4 class="fw-bold">6+</h4>
                                <p>Tahun Pengalaman</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="vision-mission">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 style="font-weight: 600;">Visi & Misi</h2>
                </div>
                <div class="row g-4">
                    <div class="col-6">
                        <div class="card h-100 shadow-sm border-0 p-4">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-bullseye fa-3x text-primary"></i>
                                </div>
                                <h3 class="card-title h4 fw-bold mb-3">Visi</h3>
                                <p class="card-text text-muted">
                                    Menjadi perusahaan teknologi terdepan di Indonesia yang menyediakan solusi digital inovatif dan berkelanjutan untuk memajukan bisnis klien di era transformasi digital.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card h-100 shadow-sm border-0 p-4">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="fas fa-rocket fa-3x text-success"></i>
                                </div>
                                <h3 class="card-title text-center h4 fw-bold mb-3">Misi</h3>
                                <ul class="list-group">
                                    <li class="d-flex mb-2">
                                        <i class="fas fa-check-circle text-success mt-1 me-2"></i>
                                        <span class="text-muted">Memberikan solusi teknologi berkualitas tinggi.</span>
                                    </li>
                                    <li class="d-flex mb-2">
                                        <i class="fas fa-check-circle text-success mt-1 me-2"></i>
                                        <span class="text-muted">Mengembangkan inovasi berkelanjutan.</span>
                                    </li>
                                    <li class="d-flex mb-2">
                                        <i class="fas fa-check-circle text-success mt-1 me-2"></i>
                                        <span class="text-muted">Membangun kemitraan jangka panjang.</span>
                                    </li>
                                    <li class="d-flex mb-2">
                                        <i class="fas fa-check-circle text-success mt-1 me-2"></i>
                                        <span class="text-muted">Memberikan layanan pelanggan terbaik.</span>
                                    </li>
                                    <li class="d-flex">
                                        <i class="fas fa-check-circle text-success mt-1 me-2"></i>
                                        <span class="text-muted">Berkontribusi pada kemajuan teknologi Indonesia.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="services">
            <h2 class="section-title">Produk & Jasa Kami</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-code fa-3x text-primary mb-5"></i>
                            <h5 class="card-title mb-3">Website Development</h5>
                            <p class="card-text text-muted">Membangun website modern dan responsif sesuai kebutuhan bisnis Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-palette fa-3x text-primary mb-5"></i>
                            <h5 class="card-title mb-3">UI/UX Design</h5>
                            <p class="card-text text-muted">Desain antarmuka yang intuitif dan menarik untuk pengalaman pengguna terbaik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-cogs fa-3x text-primary mb-5"></i>
                            <h5 class="card-title mb-3">Konsultasi IT</h5>
                            <p class="card-text text-muted">Memberikan arahan strategis untuk optimasi infrastruktur teknologi Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="clients">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Klien Kami</h2>
                    <p class="text-muted">Kami Telah Dipercaya oleh Berbagai Perusahaan</p>
                </div>

                <div class="row text-center gy-4">
                    <div class="col-md-3">
                        <i class="fas fa-building fa-3x text-secondary mb-2"></i>
                        <h6 class="fw-semibold">PT. Teknologi Maju</h6>
                    </div>

                    <div class="col-md-3">
                        <i class="fas fa-building fa-3x text-secondary mb-2"></i>
                        <h6 class="fw-semibold">CV. Digital Solusi</h6>
                    </div>

                    <div class="col-md-3">
                        <i class="fas fa-building fa-3x text-secondary mb-2"></i>
                        <h6 class="fw-semibold">PT. Inovasi Global</h6>
                    </div>

                    <div class="col-md-3">
                        <i class="fas fa-building fa-3x text-secondary mb-2"></i>
                        <h6 class="fw-semibold">PT. Inovasi Digital</h6>
                    </div>

                </div>
            </div>
        </section>

        <section id="gallery">
            <h2 class="section-title">Galeri Kegiatan</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card"><img src="img/kegiatan1.jpg" class="card-img-top" alt="Gallery Image 1"></div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card"><img src="img/kegiatan2.jpg" class="card-img-top" alt="Gallery Image 2"></div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card"><img src="img/kegiatan3.jpg" class="card-img-top" alt="Gallery Image 3"></div>
                </div>
            </div>
        </section>

        <section id="contact">
            <h2 class="section-title">Hubungi Kami</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="contact-info">
                        <h5 class="mb-3">Informasi Kontak</h5>
                        <p>Punya pertanyaan atau ingin memulai proyek bersama kami? Jangan ragu untuk menghubungi.</p>
                        <p><i class="fas fa-map-marker-alt me-2"></i>Jl. Babarsari Jl. Tambak Bayan No.2, Janti, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
                        <p><i class="fas fa-envelope me-2"></i>info@technosoft.com</p>

                        <div class="social-media mt-4">
                            <h6 class="mb-3">Ikuti Kami di Social Media</h6>
                            <div class="d-flex gap-3">
                                <a href="https://www.instagram.com/" class="text-decoration-none" target="_blank">
                                    <i class="fab fa-instagram fa-2x text-danger"></i>
                                </a>
                                <a href="https://www.facebook.com/" class="text-decoration-none" target="_blank">
                                    <i class="fab fa-facebook fa-2x text-primary"></i>
                                </a>
                                <a href="https://wa.me/6281234567890" class="text-decoration-none" target="_blank">
                                    <i class="fab fa-whatsapp fa-2x text-success"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="maps-section">
                        <h5 class="mb-3">Lokasi Kami</h5>
                        <div class="mb-3">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1234567890123!2d110.41464675304098!3d-7.781920531645423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDYnNTQuOSJTIDExMMKwMjQnNTIuNyJF!5e0!3m2!1sen!2sid!4v1234567890123"
                                width="100%" 
                                height="250" 
                                style="border:0; border-radius: 8px;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="text-center">
                <p>© 2025 TechnoSoft Solutions. All rights reserved.</p>
                <p>Design by: Arjikusna Maharjanta</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>