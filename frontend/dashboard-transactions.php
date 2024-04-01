<?php
  session_start();
  include '../config.php';
?>


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
              <a href="../logout.php" class="list-group-item list-group-item-action">Logout</a>
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
                <h2 class="dashboard-title">Pesanan</h2>
                <p class="dashboard-subtitle">
                  Berbelanja kini jauh lebih mudah
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  
                  <div class="col-12 mt-2">
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
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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