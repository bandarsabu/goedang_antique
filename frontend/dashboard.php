<?php
  session_start();

  include '../config.php';
?>

<?php include 'components/header.php'; ?>


<body>
  <div class="page-dashboard">
    <!-- <div class="d-flex" id="wrapper" data-aos="fade-right"> kalo pake class d-flex-->
    <div class="d-flex"  id="wrapper" data-aos="fade-right">
    <?php include 'components/sidebar.php'; ?>
      
      <!-- Page Content -->
        <div id="page-content-wrapper">
          <?php include 'components/navbar.php'; ?>

          <!-- Section Content -->
          <div class="section-content section-dashboard-home mt-0" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">
                  Look what you have made today!
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Total Pesanan
                        </div>
                        <div class="dashboard-card-subtitle">
                        <?php
                            $query = mysqli_query($config, "SELECT count(transactions_id) AS totalTrans FROM transactions WHERE users_id='$users_id'");
                            while ($data = mysqli_fetch_array($query)) {
                              echo $data['totalTrans'];
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Transaksi
                        </div>
                        <div class="dashboard-card-subtitle">
                        <?php
                            $query = mysqli_query($config, "SELECT sum(total_price) AS totalRevenue FROM transactions WHERE users_id='$users_id'");
                            while ($data = mysqli_fetch_array($query)) {
                              if($data['totalRevenue'] > 0) {
                                echo 'Rp. '.number_format($data['totalRevenue']);
                              } else {
                                echo 'Rp. 0';
                              }
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Kriteria Akun
                        </div>
                        <div class="dashboard-card-subtitle">
                          Classic
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 mt-2">
                    <h5 class="mb-3">Pesanan Terbaru</h5>
                    <?php
                    $users_id = $_SESSION['id'];
                    $query = mysqli_query($config, "SELECT * FROM transactions  WHERE users_id='$users_id'");
                    while($data = mysqli_fetch_array($query)) {
                      $date=date_create($data['date_transaction']);
                      $transaction_id = $data['transactions_id'];
                    ?>
                    <a href="dashboard-transactions-details.php?transaction_id=<?= $transaction_id; ?>" class="card card-list d-block">
                      <div class="card-body">
                        <div class="row">
                        <?php
                          $oke = mysqli_query($config, "SELECT photos, product_name FROM transaction_items 
                                                          JOIN products ON products.products_id=transaction_items.products_id 
                                                          JOIN product_galleries ON products.products_id=product_galleries.products_id 
                                                          WHERE transaction_id='$transaction_id' LIMIT 1");
                          $row = mysqli_fetch_row($oke);
                          
                        ?>
                          <div class="col-md-1">
                            <img src="../images/products/<?= $row['0']; ?>" class="img-fluid" alt="" srcset="">
                          </div>
                          <div class="col-md-4">
                            <?= $row['1']; ?> 
                          </div>
                          <div class="col-md-3">
                            <?= 'Rp. '.number_format($data['total_price']); ?>
                          </div>
                          <div class="col-md-3">
                            <?=  date_format($date, "d M, Y H:s"); ?>
                          </div>
                          <div class="col-md-1 d-none d-md-block">
                            <img src="../images/dashboard-arrow-right.svg" alt="">
                          </div>
                        </div>
                      </div>
                    </a>
                  <?php } ?>
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
</body>

</html>