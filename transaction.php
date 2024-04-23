<?php
include 'assets/data/data.php'; //Include file data.php untuk mengambil data produk
session_start(); //insialisasi session_start agar bisa menggunakan session
$id = $_GET['id']; //Mengambil id dari url
$data = $data[$id]; //Mengambil data produk berdasarkan id

$username = $_SESSION['username']; //Set session username ke dalam variabel $username

if (!isset($username)) {
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
    <title>Transaction</title>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top header-scrolled">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <!-- <span>Logo-brand</span> -->
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#">Home</a></li>
                    <li><a class="nav-link scrollto active">Transaction</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

                    <li><a class="logout scrollto" href="logout.php">Logout</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Transaction</li>
                </ol>
                <h2>Transaction</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <section id="product-details" class="product-details">
            <div class="container">
                <div class="portfolio-info">
                    <h3>Product information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="no_transaction" class="form-label">No. Transaction</label>
                                    <input type="text" class="form-control" id="no_transaction" name="no_transaction">
                                </div>
                                <div class=" col-md-6 mb-3">
                                    <label for="tanggal" class="form-label">Transaction Date</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $date ?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="nama" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $username ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="product" class="form-label">Product</label>
                                    <input type="text" class="form-control" id="nama_product" name="product" value="<?= $data['nama_produk'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" min="1" id="jumlah" name="jumlah">
                                </div>
                                <div class=" col-md-6 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" value="Rp. <?= number_format($data['harga'], 0) ?>">
                                </div>
                                <div class="col-md-6 mb-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-primary" onclick="checkOut()">Check out</button>
                                </div>
                            </div>
                        </div>

                        <!-- Gambar Produk -->
                        <div class="col-md-6">
                            <img src="assets/img/products/values-1.png" class="w-50 pt-5" style="margin-left: 10em;" alt="">
                        </div>

                        <!-- Jumlah pembayaran -->
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <hr>
                                <div class="info-price mt-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Price</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h5 id="total-price">Rp. 0</h5>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="info-price">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Payment</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <input type="number" min="1" class="form-control mb-3" id="pembayaran" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" id="btn-change" onclick="btnChange()" class="btn btn-primary mb-3">Change!</button>
                                            <button type="button" id="btn-method" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#methodModal">Payment Method</button>
                                        </div>
                                        <hr>
                                        <div class="col-md-6">
                                            <h5>Total Price</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h5 id="totalPrice">Rp. 0</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Tax</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h5 id="tax">0%</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Change</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h5 id="change">Rp. 0</h5>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="button" disabled id="btn-save" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#transactionModal">Save Transaction</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- Modal -->
    <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Transaction Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">No. Transaction</label>
                            <input type="text" class="form-control" id="noTransactionModal" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Transaction Date</label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="" class="form-label">Treatment</label>
                            <input type="text" class="form-control" value="<?= $data['nama_produk'] ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Treatment Price</label>
                            <input type="text" class="form-control" value="Rp.<?= number_format($data['harga'], 0)  ?>" readonly>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" id="jumlahModal" value="" readonly>
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="" class="form-label">Total Price</label>
                            <input type="text" class="form-control" id="totalPriceModal" value="" readonly>
                        </div>
                        <hr>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Payment</label>
                            <input type="text" class="form-control" id="pembayaranModal" value="" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Change</label>
                            <input type="text" class="form-control" id="changeModal" value="" readonly>
                        </div>
                    </div> -->
                    <span class="text-success text-center fw-bold">Your transaction confirmed Success</span>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <a href="index.php" class="btn btn-success">Save Transaction</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->

    <!-- Modal Payment Method-->
    <div class="modal fade" id="methodModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Choose Your Payment Method</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <button type="button" class="btn" id="cash" onclick="cash()">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Cash</h5>
                                    <p class="card-text">Pay with Cash</p>
                                </div>
                            </div>
                        </button>
                        <hr class="mt-2">
                        <button type="button" class="btn" id="gopay" onclick="gopay()">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Gopay</h5>
                                    <p class="card-text">Pay with Gopay</p>
                                </div>
                            </div>
                        </button>
                        <button type="button" class="btn" id="ovo" onclick="ovo()">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">OVO</h5>
                                    <p class="card-text">Pay with OVO</p>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- ======= Footer ======= -->
    <?php include 'partials/footer.php'; ?>
    <!-- End Footer -->

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let price = <?= $data['harga'] ?>;
        let jumlah = document.getElementById('jumlah');
        let total = document.getElementById('total-price');
        let tax = document.getElementById('tax');
        let totalPrice = document.getElementById('totalPrice');

        function checkOut() {
            let total_price = price * jumlah.value;
            total.innerText = 'Rp. ' + total_price.toLocaleString('id', 'ID');
        }

        //payment method
        let pembayaran = document.getElementById('pembayaran');
        let change = document.getElementById('change');
        let btnChange = document.getElementById('btn-change');

        function cash() {
            tax.innerText = '0%';
            btnChange.disabled = false;

            let total_price = price * jumlah.value;
            let change_price = pembayaran.value - total_price;
            change.innerText = 'Rp. ' + change_price.toLocaleString('id', 'ID');
            totalPrice.innerText = 'Rp. ' + total_price.toLocaleString('id', 'ID');
        }

        function gopay() {
            tax.innerText = '10%';
            btnChange.disabled = false;

            let total_price = price * jumlah.value * 1.1; //10% tax
            let total_priceAngka = parseInt(total_price)
            console.log(total_priceAngka);

            let change_price = pembayaran.value - total_price;
            change.innerText = 'Rp. ' + change_price.toLocaleString('id', 'ID');
            tax.innerText = '10%';
            totalPrice.innerHTML = 'Rp. ' + total_priceAngka.toLocaleString('id', 'ID');
        }

        function ovo() {
            tax.innerText = '10%';
            btnChange.disabled = false;

            let total_price = price * jumlah.value * 1.1; //10% tax
            let change_price = pembayaran.value - total_price;
            let total_priceAngka = parseInt(total_price)
            console.log(total_priceAngka);
            change.innerText = 'Rp. ' + change_price.toLocaleString('id', 'ID');
            tax.innerText = '10%';
            totalPrice.innerText = 'Rp. ' + total_priceAngka.toLocaleString('id', 'ID');
        }
    </script>
</body>

</html>