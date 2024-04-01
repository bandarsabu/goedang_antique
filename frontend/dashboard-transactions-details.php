<?php
  session_start();
  include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'components/header.php'; ?>


<body>
  <div class="page-dashboard">
    <!-- <div class="d-flex" id="wrapper" data-aos="fade-right"> kalo pake class d-flex-->
    <div class="d-flex"  id="wrapper" data-aos="fade-right">
      <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <a href="../index.php">
              <img src="../images/dashboard-logo.png" alt="" srcset="" class="my-4" width="120px">
            </a>
          </div>
          <div class="list-group list-group-flush">
              <a href="dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
              <a href="dashboard-transactions.php" class="list-group-item list-group-item-action active">Pesanan</a>
              <a href="dashboard-account.php" class="list-group-item list-group-item-action ">Akun</a>
              <a href="../logout.php" class="list-group-item list-group-item-action">Keluar</a>
            </div>
        </div>
      <!-- End Sidebar -->

      <!-- Page Content -->
        <div id="page-content-wrapper">
          <!-- Navigation -->
          <?php include 'components/navbar.php'; ?>

          <!-- End Navigation -->

          <!-- Section Content -->
          <div class="section-content section-dashboard-home mt-0" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">#BA.<?= $_GET['transaction_id']; ?></h2>
                <p class="dashboard-subtitle">
                  Detail Pesanan
                </p>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 mt-4">
                                <h5>Detail Pengiriman</h5>
                          </div>
                          <div class="col-12 col-md-6">
                            <div class="row">
                              <div class="col-12">
                              <?php 
                                $users_id = $_SESSION['id'];
                                $query = mysqli_query($config, "SELECT * FROM users JOIN provinces ON users.provinces_id=provinces.provinces_id WHERE  users_id='$users_id'");
                                while ($data = mysqli_fetch_array($query)) {
                              ?>
                                <div class="row">
                                  <div class="col-12 col-md-6">
                                    <div class="product-title">Nama Penerima</div>
                                    <div class="product-subtitle"><?= $data['name']; ?></div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <div class="product-title">Nomor Handphone</div>
                                    <div class="product-subtitle"><?= $data['phone_number']; ?></div>
                                  </div>
                                  <div class="col-12">
                                    <div class="product-title">Alamat</div>
                                    <div class="product-subtitle"><?= $data['address'].', '. $data['provinces_name'].', '.$data['zip_code']; ?></div>
                                  </div>
                                </div>
                                <?php } ?>
                              </div>
                            </div>
                          </div>

                          <div class="col-12 col-md-6">
                            <?php 
                                $transaction_id = $_GET['transaction_id']; 
                                $query = mysqli_query($config, "SELECT * FROM transactions  WHERE  transactions_id='$transaction_id'");
                                while ($data = mysqli_fetch_array($query)) {
                                $date=date_create($data['date_transaction']);

                            ?>
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Tanggal Transaksi</div>
                                <div class="product-subtitle"> <?=  date_format($date, "d M, Y H:s"); ?></div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Total </div>
                                <div class="product-subtitle text-warning">Rp. <?= number_format($data['total_price'])?></div>
                              </div>
                              <div class="col-12">
                                <div class="product-title">Status</div>
                                <div class="d-grid gap-2">
                                  <button class="btn btn-success" type="button"><?= $data['transaction_status']; ?></button>
                                </div>
                              </div>
                              <div class="col-12 mt-2">
                                <div class="product-title">Selesaikan Pembayaran dengan transfer ke :<br>
                                  <b>BANK BRI > A.n Goedang Antique > No. Rekening 0047-8862-8373</b>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 mt-4">
                                <h5>Detail Produk</h5>
                          </div>
                          <div class="col-12">
                            <div class="row">
                            <?php
                              
                                $oke = mysqli_query($config, "SELECT  transaction_items.products_id, product_name, transaction_items.price, quantity FROM transaction_items 
                                                                JOIN products ON products.products_id=transaction_items.products_id 
                                                                WHERE transaction_id='$transaction_id'");
                                while($data = mysqli_fetch_array($oke)) {
                                  $productId = $data['products_id'];
                                
                              ?>
                              <div class="col-12 mt-2">
                                <a href="#" class="card card-list d-block" style="background-color: beige;">
                                  <div class="card-body">
                                    <div class="row">
                                    
                                      <div class="col-md-1">
                                      <?php 
                                        $queryGaleri = mysqli_query($config, "SELECT photos FROM product_galleries WHERE product_galleries.products_id='$productId' LIMIT 1");
                                        if(mysqli_num_rows($queryGaleri)=== 1) {
                                          while ($dataGaleri = mysqli_fetch_array($queryGaleri)) { ?>
                                            <img src="../images/products/<?= $dataGaleri['photos']; ?>" class="img-fluid" alt="" srcset="">
                                          <?php 
                                            }
                                          } else { ?>
                                            <img src="../images/products/default.png" class="img-fluid" alt="" srcset="">
                                          <?php } ?>
                                    
                                      </div>
                                      <div class="col-md-6">
                                        <?= $data['product_name']; ?>
                                      </div>
                                      <div class="col-md-3">
                                        <?= 'Rp. '.number_format($data['price']); ?>
                                      </div>
                                      <div class="col-md-1 d-none d-md-block">
                                          x <?= $data['quantity']; ?>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                              </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      <!-- End Page Content -->
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.slim.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $('#menu-toggle').click(function (e) {
      e.preventDefault();
      $('#wrapper').toggleClass('toggled');
    });
  </script>
  <script src="../vendor/vue/vue.min.js"></script>
  <script>
    var transactionDetails = new Vue({
      el: "#transactionDetails",
      data: {
        status: "SHIPPING",
        resi: "BD012308012132",
      },
    });
  </script>
</body>

</html>