<?php
  session_start();
  include 'config.php';
  $products_id = $_GET['products_id'];

  if(isset($_POST['addChart'])) {
    $users_id = $_SESSION['id'];
    $quantity = $_POST['quantity'];

    mysqli_query($config, "INSERT INTO carts VALUES (NULL, '$users_id', '$products_id', '$quantity')");
    header('Location:cart.php');
  }


?>

  <?php include('layouts/header.php'); ?>
  <?php include('layouts/navbar.php'); ?>

  <main>

    <section class="detail-produk py-5" style="background-color: #FFC3A1">
      <div class="container" >
        <div class="row" data-aos="fade-right">
          <div class="col section-popular-heading">
            <h2>Detail Produk</h2>
            <hr>
          </div>
        </div>
        <div class="row" >
          <div class="col-lg-8 pl-lg-0 mb-3" data-aos="fade-up" data-aos-delay="100" >
            <div class="card card-details"  style="background-color: #D3756B">
              <div class="gallery">
                <div class="xzoom-container">
                <?php
                    $query = mysqli_query($config, "SELECT * FROM product_galleries WHERE products_id='$products_id' LIMIT 1");
                    while ($data = mysqli_fetch_array($query)) {
                  ?>
                  <img
                    class="xzoom img-fluid"
                    id="xzoom-default"
                    src="images/products/<?= $data['photos']; ?>"
                    xoriginal="images/products/<?= $data['photos']; ?>"
                  />
                  <?php
                    }
                  ?>
                  <div class="xzoom-thumbs justify-content-center mt-4">
                  <?php
                    $query = mysqli_query($config, "SELECT * FROM product_galleries WHERE products_id='$products_id'");
                    while ($data = mysqli_fetch_array($query)) {
                  ?>

                    <a href="images/products/<?= $data['photos']; ?>">
                      <img
                        class="xzoom-gallery"
                        width="128"
                        src="images/products/<?= $data['photos']; ?>"
                        xpreview="images/products/<?= $data['photos']; ?>"
                      />
                    </a>
                    <?php
                    }
                  ?>
                    

                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card card-details card-right">
              <?php
                $query = mysqli_query($config, "SELECT * FROM products WHERE products_id='$products_id'");
                while ($data = mysqli_fetch_array($query)) {
              ?>
                <h2><?= $data['product_name']; ?></h2>
                <p><?= $data['description']; ?></p>
                <span>Harga :</span>
                <h1>Rp. <?= number_format($data['price']); ?></h1>
                <span>Berat : <b><?= $data['weight']; ?> Kg</b></span>
                <span>Stock : <b><?= $data['stock']; ?></b></span>
                <span>Kuantitas : </span>
                <form action="" method="POST">
                  <div class="d-flex flex-row py-2" style="margin: auto;">
                    <button class="btn btn-link px-2"  type="button"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="bi bi-dash-lg"></i>
                    </button>

                    <input id="form1" min="1" max="<?= $data['stock']; ?>" name="quantity" value="1" type="number"
                      class="form-control form-control-sm" style="width: 100%;" />

                    <button class="btn btn-link px-2" type="button"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="bi bi-plus-lg"></i>
                    </button>
                  </div>
                    <?php
                      if(isset($_SESSION["login"])) {
                        if($data['stock'] <= 0){
                    ?>
                            <div class="d-grid gap-2">
                              <button class="btn btn-opurple"  type="button">Habis</button>
                            </div>
                            
                    <?php 
                        } else { ?>
                          <div class="d-grid gap-2">
                              <button class="btn btn-spurple" name="addChart" type="submit"><i class="bi bi-cart-plus"></i> Masukkan Keranjang</button>
                            </div>
                       <?php }
                      } else { ?>
                      <div class="d-grid gap-2">
                        <a href="login.php" class="btn btn-opurple" ></i> Masuk</a>
                      </div>
                    <?php } ?>
                </form> 
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>


  </main>
  <footer class="section-footer " style="background-color: #D3756B">
    <div class="container pt-5 pb-5" >
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-12 col-lg-4">
                  <ul class="list-unstyled">
                    <li>PH7V+58P, Jl. Adhyaksa, Sungai Miai,</li>
                    <li>Kec. Banjarmasin Utara, </li>
                    <li>Kota Banjarmasin, </li>
                    <li>Kalimantan Selatan 70123</li>
                  </ul>
                </div>
                <div class="col-12 col-lg-4">
                  <h5>Hubungi Kami</h5>
                  <ul class="list-unstyled">
                    <li>Ms.Fulana +62 824 8454 2484</li>
                    <li>goedangantique@gmail.com</li>
                  </ul>
                </div>
                <div class="col-12 col-lg-4">
                  <h5>Ikuti Kami</h5>
                  <ul class="list-unstyled">
                    <li><a href="#"><i class="bi bi-instagram"></i> @goedan_gantique</a></li>
                    <li><a href="#"><i class="bi bi-twitter"></i> @goedang_antique</a></li>
                  </ul>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid" style="background-color: #A75D5D;">
      <div
        class="row justify-content-center align-items-center py-3 "
      >
        <div class="col-auto text-gray-500 font-weight-light">
          <i class="bi bi-c-circle"></i> 2023 | Goedang Antique
        </div>
      </div>
    </div>
  </footer>
  <script src="asset/libraries/retina/retina.js"></script>
  <script src="asset/libraries/jquery/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="asset/libraries/xzoom/dist/xzoom.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  <script>
  $(document).ready(function() {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth: 500,
      title: false,
      tint: '#333',
      Xoffset: 15
    });
  });
  </script>
</body>
</html>
