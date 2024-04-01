<?php
  include '../components/header.php';
?>

<body>
  <div class="page-dashboard">
    <!-- <div class="d-flex" id="wrapper" data-aos="fade-right"> kalo pake class d-flex-->
    <div class="d-flex"  id="wrapper" data-aos="fade-right">
      <!-- Sidebar -->
        <?php include '../components/sidebar.php' ?>
      <!-- End Sidebar -->

      <!-- Page Content -->
        <div id="page-content-wrapper">
          <!-- Navigation -->
          <nav class="navbar navbar-store navbar-expand-lg navbar-light" data-aos="fade-down">
            <div class="container-fluid">
              <button class="btn btn-secondary d-md-none me-auto me-2" id="menu-toggle"> &laquo; Menu</button>
              <!-- Memuculkan Menu Humburger Ketika di HP -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- ms-auto = margin left -->
                <!-- Desktop Menu -->
                <!-- d-none = agar tidak muncul d mobile -->
                <!-- d-lg-flex = agar muncul di tampilan desktop dengan mode flexbox -->

                <ul class="navbar-nav ms-auto d-none d-lg-flex">
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['name']; ?>" alt="" class="rounded-circle me-2 profile-picture">
                        Hi, <?= $_SESSION['name']; ?>
                      </a>
                      <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Dashboard</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <div class="dropdwon-divider"></div>
                        <a href="/" class="dropdown-item">Logout</a>
                      </div>
                    </li>
                </ul>

                <!-- End Desktop Menu -->
                <ul class="navbar-nav d-block d-lg-none">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Hi,<?= $_SESSION['name']; ?>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navigation -->

          <!-- Section Content -->
          <div class="section-content section-dashboard-home" data-aos="fade-up">
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
                          Pelanggan
                        </div>
                        <div class="dashboard-card-subtitle">
                          <?php
                            $query = mysqli_query($config, "SELECT count(name) AS totalUsers FROM users WHERE roles='USER'");
                            while ($data = mysqli_fetch_array($query)) {
                              echo $data['totalUsers'];
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
                          Keuntungan
                        </div>
                        <div class="dashboard-card-subtitle">
                          <?php
                            $query = mysqli_query($config, "SELECT sum(total_price) AS totalRevenue FROM transactions");
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
                          Total Transaksi
                        </div>
                        <div class="dashboard-card-subtitle">
                        <?php
                            $query = mysqli_query($config, "SELECT count(transactions_id) AS totalTrans FROM transactions");
                            while ($data = mysqli_fetch_array($query)) {
                              echo $data['totalTrans'];
                            }
                          ?>
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
                    $query = mysqli_query($config, "SELECT * FROM transactions JOIN users ON transactions.users_id=users.users_id ORDER BY transactions_id DESC");
                    while($data = mysqli_fetch_array($query)) {
                      $date=date_create($data['date_transaction']);
                      $transaction_id = $data['transactions_id'];
                    ?>
                    <a href="../transactions/dashboard-transactions-details.php?transaction_id=<?= $transaction_id; ?>" class="card card-list d-block">
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
                            <img src="../../images/products/<?= $row['0']; ?>" class="img-fluid" alt="" srcset="">
                          </div>
                          <div class="col-md-4">
                            <?= $row['1']; ?>
                          </div>
                          <div class="col-md-3">
                            <?= $data['name']; ?>
                          </div>
                          <div class="col-md-3">
                            <?=  date_format($date, "d M, Y H:s"); ?>
                          </div>
                          <div class="col-md-1 d-none d-md-block">
                            <img src="../../images/dashboard-arrow-right.svg" alt="">
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

<?php
  include '../components/footer.php';
?>
