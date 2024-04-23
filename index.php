<?php
include 'assets/data/data.php'; //Include file data.php untuk mengambil data produk
session_start(); //insialisasi session_start agar bisa menggunakan session
$username = $_SESSION['username']; //Set session username ke dalam variabel $username
var_dump($username);
if (!isset($username)) { //Jika session username tidak ada maka redirect ke halaman login.php
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dist/css/style.css" rel="stylesheet">
    <title>Co Kreatif - Home</title>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top header-scrolled">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <!-- <span>Logo-brand</span> -->
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="">Transaction</a></li>

                    <li><a class="logout scrollto" href="logout.php">Logout</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1>Your One-Stop Shop for Creative Products</h1>
                    <h2>A marketplace for unique and handmade products.
                        Supporting local artisans and makers.</h2>
                    <div>
                        <div class="text-center text-lg-start">
                            <a href="#products" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Get Started</span>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <!-- ======= Produk Section ======= -->
    <section id="products" class="products">
        <div class="container aos-init aos-animate">
            <header class="section-header">
                <h2>Products Co Kreatif</h2>
                <p>The Future of Creativity</p>
            </header>

            <div class="row">
                <?php foreach ($data as $index => $produk) : ?>
                    <div class="col-lg-3 aos-init aos-animate gy-4">
                        <div class="box">
                            <img src="assets/img/products/<?= $produk['gambar'] ?>" class="img-fluid" alt="">
                            <h3><?= $produk['nama_produk'] ?></h3>
                            <p><?= $produk['deskripsi'] ?></p>
                            <p>
                                <strong>Price : Rp. <?= number_format($produk['harga'], 0) ?></strong>
                            </p>
                            <p>
                                <a href="transaction.php?id=<?= $index ?>" class="btn btn-primary">Check out</a>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </section>
    <!-- End Produk Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>F.A.Q</h2>
                <p>Frequently Asked Questions</p>
            </header>

            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion accordion-flush" id="faqlist1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                    What is Co Kreatif?
                                </button>
                            </h2>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                <div class="accordion-body">
                                    Co Kreatif is an e-commerce platform that connects creatives with buyers. We provide a platform for creatives to sell their creative products to buyers around the world.


                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                    How do I order a product on Co Kreatif?
                                </button>
                            </h2>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                <div class="accordion-body">
                                    To order a product on Co Kreatif, you need to create an account and add the products you want to buy to your cart. You can then checkout and complete your purchase.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End F.A.Q Section -->

    <!-- ======= CTA Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">
            <div class="text-left">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="cta-title">Learn more about Co Kreatif</h3>
                        <p>Our products are made by independent creators, so you can be sure to find something unique and special.</p>
                    </div>
                    <div class="col-md-4 my-auto ">
                        <div class="d-flex justify-content-center align-items-center">
                            <a class="cta-btn" href="#products">Get Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA Section -->

    <!-- ======= Footer ======= -->
    <?php include 'partials/footer.php'; ?>
    <!-- End Footer -->

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>