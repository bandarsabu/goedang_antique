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
                                $transaction_id = $_GET['transaction_id']; 

                                $query = mysqli_query($config, "SELECT * FROM transactions JOIN users ON transactions.users_id=users.users_id
                                JOIN provinces ON users.provinces_id=provinces.provinces_id WHERE  transactions_id='$transaction_id'");
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
                                    <div class="col-12 col-md-4">
                                        <form action="update.php" method="POST">
                                        <div class="product-title">Status</div>
                                        <select name="status" id="status" class="form-select"  onChange="tampil(this.value)" required>
                                            <option value="<?= $data['transaction_status']; ?>" selected><?= $data['transaction_status']; ?></option>
                                            <option value="">---------</option>
                                            <option value="UNPAID">UNPAID</option>
                                            <option value="PROCESS">PROCESS</option>
                                            <option value="SHIPPING">SHIPPING</option>
                                            <option value="RECEIVED">RECEIVED</option>
                                            <option value="CANCELED">CANCEL</option>
                                            <option value="RETURN">RETURN</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-title">Masukkan Resi</div>
                                        <input type="hidden" class="form-control" name="transaction_id" value="<?= $transaction_id; ?>">
                                        <input type="text" id="resi" class="form-control" name="resi" value="<?= $data['resi']; ?>" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success btn-block mt-4">
                                            Update
                                        </button>
                                    </form>
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
                              
                              $oke = mysqli_query($config, "SELECT  transaction_items.products_id, product_name, quantity, transaction_items.price FROM transaction_items 
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
                                          <img src="../../images/products/<?= $dataGaleri['photos']; ?>" class="img-fluid" alt="" srcset="">
                                        <?php 
                                          }
                                        } else { ?>
                                          <img src="../../images/products/default.png" class="img-fluid" alt="" srcset="">
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

<script>
  function  tampil(status){
    if(status == "SHIPPING") {
      document.getElementById("resi").removeAttribute("disabled");
    } else if (status != "SHIPPING") {
      document.getElementById("resi").setAttribute("disabled","");
    }
  }
</script>
<?php
    include '../components/footer.php';
?>