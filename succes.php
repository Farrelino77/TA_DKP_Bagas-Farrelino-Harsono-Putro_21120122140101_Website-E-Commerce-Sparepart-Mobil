<?php
include("user.php");
session_start();


$user = new datax($_SESSION['email'], $_SESSION['password']);
$getUser = $user->login();
if ($getUser) { ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Transaksi Berhasil!</title>
    </head>

    <body style="overflow-x: hidden;">
        <!-- navbar -->
        <?php
        $username = $getUser->username;
        $emailuser = $getUser->email;

        navbartop($username, $emailuser);
        ?>
        <!-- end Navbar -->
        <section>
            <div class="container ">
                <div class="card card-tengah2 card border-success mb-3 mt-4" style="max-width: 30rem;">
                    <div class="card-header">Transaksi Berhasil</div>
                    <div class="card-body">
                        <h5 class="card-title">Rincian Transaksi</h5>
                        <div class="row g-2">
                            <!-- bagian1 -->
                            <div class="col-md-3">
                                <p class="card-text">Barang </p>
                            </div>
                            <div class="col-md-1 text-end">
                                <p>: </p>
                            </div>
                            <div class="col-md-8">
                                <p><?= $_POST['nama'] ?> </p>
                            </div>
                        </div>
                        <!-- bagian 2 -->
                        <div class="row g-2">
                            <div class="col-md-3">
                                <p class="card-text">Merk Kendaraan </p>
                                <p class="card-text">Harga </p>
                                <p class="card-text">Nama </p>
                                <p class="card-text">No Hp </p>
                                <p class="card-text">Alamat </p>
                            </div>
                            <div class="col-md-1 text-end">
                                <p>: </p>
                                <p>: </p>
                                <p>: </p>
                                <p>: </p>
                                <p>: </p>
                            </div>
                            <div class="col-md-8">
                                <p><?= $_POST['merk'] ?> </p>
                                <p>Rp. <?= $_POST['price'] ?> </p>
                                <p><?= $_POST['penerima'] ?> </p>
                                <p><?= $_POST['nohp'] ?> </p>
                                <p><?= $_POST['alamat'] ?>, <?= $_POST['kodepos'] ?> </p>
                            </div>
                        </div>
                        <!-- bagian 3 -->
                        <div class="row g-2">
                            <div class="col-md-3">
                                <p class="card-text">Jasa Pengirim </p>
                                <p class="card-text">Metode Pembayaran </p>
                            </div>
                            <div class="col-md-1 text-end">
                                <p>: </p>
                                <p>: </p>
                            </div>
                            <div class="col-md-8">
                                <p><?= $_POST['ekspedisi'] ?> </p>
                                <p><?= $_POST['payment'] ?> </p>
                            </div>
                        </div>
                        <!-- bagian 4 -->
                        <div class="row g-2 mt-2 mb-0">
                            <div class="col-md-3">
                                <p class="card-text fw-bolder fs-5">Total</p>
                            </div>
                            <div class="col-md-1 text-end">
                                <p class="fs-5">: </p>
                            </div>
                            <div class="col-md-8">
                                <?php if ($_POST['ekspedisi'] == "JNE (35000)") {
                                    echo "<p class=\"fs-5\">Rp. " . $total = $_POST['price'] + 35000 . "</p>";
                                } elseif ($_POST['ekspedisi'] == "J&T (25000)") {
                                    echo "<p class=\"fs-5\">Rp. " . $total = $_POST['price'] + 25000 . "</p>";
                                } else {
                                    echo "<p class=\"fs-5\">Rp. " . $total = $_POST['price'] + 30000 . "</p>";
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>

    </html>
<?php
} else {
    header("Location: http://localhost/TA2/index.php");
}

?>