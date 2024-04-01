<?php
  include '../components/header.php';

?>

<body>
  <div class="page-dashboard">
    <!-- <div class="d-flex" id="wrapper" data-aos="fade-right"> kalo pake class d-flex-->
    <div class="d-flex"  id="wrapper" data-aos="fade-right">
    <?php include '../components/sidebar.php' ?>


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
                      Hi, Angga
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
                <h2 class="dashboard-title">Produk</h2>
                <p class="dashboard-subtitle">
                  Kelola dengan baik hasilkan lebih banyak
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <a href="create.php" class="btn btn-success">Tambah Produk</a>
                  </div>
                </div>
                <div class="row mt-4">
                  <?php
                    $query = mysqli_query($config, "SELECT products.products_id, products.product_name, products.price, categories.name_category 
                                                  FROM products JOIN categories ON products.categories_id=categories.categories_id");
                    while ($data = mysqli_fetch_array($query)) {
                    $productId = $data['products_id'];

                  ?>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="detail-produk.php?products_id=<?= $data['products_id']; ?>" class="card card-dashboard-product d-block">
                      <div class="card-body">
                        <?php
                          $queryGaleri = mysqli_query($config, "SELECT photos FROM product_galleries WHERE product_galleries.products_id='$productId' LIMIT 1");
                          if(mysqli_num_rows($queryGaleri)=== 1) {
                            while ($dataGaleri = mysqli_fetch_array($queryGaleri)) { ?>
                        <img src="../../images/products/<?= $dataGaleri['photos']; ?>" alt="" class="w-100 mb-2" srcset="">
                        <?php 
                            }
                          } else { ?>
                          <img src="../../images/products/default.png" alt="" class="w-100 mb-2" srcset="">
                        
                      <?php } ?>
                        <div class="product-title"><?= $data['product_name']; ?></div>
                        <div class="product-category"><?= $data['name_category']; ?></div>
                      </div>
                    </a>
                  </div>
                  <?php
                    }
                  ?>
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