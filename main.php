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

    <title>Zero Motorsport</title>
  </head>

  <body style="overflow-x: hidden;">
    <?php
    $username = $getUser->username;
    $email = $getUser->email;

    navbartop($username, $email);
    ?>
    <!-- Navbar -->
    <!-- end navbar -->
    <div class="container">
      <?php

      $produk = array(
        array(
          "kategori" => "mesin",
          "nama" => "Turbo IHI RHF4",
          "img" => "images/turbo.jpg",
          "price" => 7300000
        ),
        array(
          "kategori" => "mesin",
          "nama" => "Garret Turbo",
          "img" => "images/garret.jpg",
          "price" => 28100000
        ),
        array(
          "kategori" => "mesin",
          "nama" => "ECU Haltech",
          "img" => "images/ecu.jpg",
          "price" => 13500000
        ),
        array(
          "kategori" => "mesin",
          "nama" => "K&N Open Air Filter Kit",
          "img" => "images/intake.jpg ",
          "price" => 1980000
        ),
        array(
          "kategori" => "mesin",
          "nama" => "Intercooler",
          "img" => "images/ic.jpg",
          "price" => 15000000
        ),
        array(
          "kategori" => "kaki-kaki",
          "nama" => "Brembo Big Brake Kit",
          "img" => "images/bbk.jpg",
          "price" => 34000000
        ),
        array(
          "kategori" => "kaki-kaki",
          "nama" => "KW Coilovers Kit",
          "img" => "images/cv.jpg",
          "price" => 60000000
        ),
        array(
          "kategori" => "kaki-kaki",
          "nama" => "Yokohama Advan Neova AD08-R",
          "img" => "images/neova.png",
          "price" => 6669000
        ),
      );

      ?>
      <section class="samping mt-3">
        <div class="container">
          <div class="row md-3">
            <?php
            foreach ($produk as $key) { ?>
              <div class="card mt-4 ms-4 " style="width: 250px;">
                <img src="<?= $key['img'] ?>" class="p-2" style="width: 224px; height: 168.03px;object-fit: contain">
                <div class="card-body">
                  <p class="card-title"><?= $key['nama'] ?></p>
                  <h4 class="card-text mb-3">Rp. <?= $key['price'] ?></h4>
                  <form action="checkout.php" method="POST">
                    <div class="mb-2">
                      <input type="hidden" class="form-control" name="kategori" value="<?= $key['kategori'] ?>">
                      <input type="hidden" class="form-control" name="nama" value="<?= $key['nama'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="hidden" class="form-control" name="price" value="<?= $key['price'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="hidden" class="form-control" name="img" value="<?= $key['img'] ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Beli</button>
                  </form>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>

  </html>
<?php
} else {
  header("Location: http://localhost/TA2/failed login.php");
}

?>