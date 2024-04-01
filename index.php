<?php
session_start();
include 'config.php';

?>


    <?php include('layouts/header.php'); ?>
    <?php include('layouts/navbar.php'); ?>

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Selamat Datang di Goedang Antique</h1>
                            <p>Menyediakan Barang Antik Berkualitas Tinggi untuk Penggemar Seni</p>
                            <a href="produk.php" class="btn btn-get-started">Belanja Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img">
            <img src="asset/images/64ab77645effa-compass-1.jpg" alt="#" class="img-fluid">
            <img src="asset/images/banner_pattern.png " alt="#" class="pattern_img img-fluid">
        </div>
    </section>
    <!-- banner part start-->

    <main>
      <section class="detail-produk py-5" style="background-color: #FFC3A1">
        <div class="container" >
          <div class="row" >
            <div class="col-12 section-popular-heading" >
              <h2>Sale</h2>
              <hr>
            </div>
          </div>
          <div class="row mb-3" >
            <?php 
              $delayAos = 100;
              $query = mysqli_query($config, "SELECT products.products_id, products.product_name, products.price FROM products LIMIT 4");
              while ($data = mysqli_fetch_array($query)) {
              $productId = $data['products_id'];
              $delayAos += 100;
            ?>  
              <div class="col-lg-3 col-12 mb-2" data-aos="fade-up" data-aos-delay="<?= ($delayAos); ?>" >
                <a href="details.php?products_id=<?= $data['products_id']; ?>" class="card-produk">
                  <div class="card">
                  <?php 
                    $queryGaleri = mysqli_query($config, "SELECT photos FROM product_galleries WHERE product_galleries.products_id='$productId' LIMIT 1");
                    if(mysqli_num_rows($queryGaleri)=== 1) {
                    while ($dataGaleri = mysqli_fetch_array($queryGaleri)) { ?>
                      <img src="images/products/<?= $dataGaleri['photos']; ?>" class="card-img-top img-fluid" alt="">
                  <?php 
                      }
                    } else { ?>
                      <img src="images/products/default.png" class="card-img-top img-fluid" alt="">
                  <?php } ?>
                    <div class="card-body">
                      <p class="card-text"><b>Goedang Antique :  </b><?= $data['product_name']; ?></p>
                      <p class="card-text">Harga : <br> <b>Rp. <?= number_format($data['price']); ?></b></p>
                    </div>
                  </div>
                </a>
              </div>
              <?php
                }
            ?>
          </div>
          <div class="row mb-3 jus text-end">
            <div class="col-12">
              <a href="produk.php" class="btn btn-dark-purple" >Lihat Produk Lainnya</a>
            </div>
          </div>


        </div>
      </section>
    </main>

    <?php include('layouts/footer.php'); ?>

