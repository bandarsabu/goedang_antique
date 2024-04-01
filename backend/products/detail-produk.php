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
                <h2 class="dashboard-title">Ubah Produk</h2>
                <p class="dashboard-subtitle">
                  Ubah Produk Baru
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="update.php" method="POST" enctype="multipart/form-data">
                      <div class="card">
                        <div class="card-body">
                        <?php
                          $products_id = $_GET['products_id'];
                          $queryProduct = mysqli_query($config, "SELECT * FROM products JOIN categories ON products.categories_id=categories.categories_id WHERE products_id='$products_id'");
                          while($dataProduct = mysqli_fetch_array($queryProduct)) {
                        ?>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="hidden" name="products_id" value="<?= $dataProduct['products_id']; ?>" class="form-control">
                                <input type="text" name="product_name" value="<?= $dataProduct['product_name']; ?>" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="editor1" 
                                  rows="10" cols="80"><?= $dataProduct['description']; ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" name="price" class="form-control" value="<?= $dataProduct['price']; ?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="category" name="category" class="form-select">
                                <option value="<?= $dataProduct['categories_id']; ?>"><?= $dataProduct['name_category'] ?> (selected)</option>
                                  <?php
                                    $query = mysqli_query($config, 'SELECT * FROM categories');
                                    while($data = mysqli_fetch_array($query)) {
                                  ?>
                                    <option value="<?= $data['categories_id']; ?>"><?= $data['name_category'] ?></option>
                                  <?php
                                    }
                                  ?>
                                </select>
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Berat</label>
                                <input type="number" step="any" class="form-control" name="berat" value="<?= $dataProduct['weight']; ?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" class="form-control" name="stok" value="<?= $dataProduct['stock']; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 text-end d-grid gap-2">
                              <button type="submit" class="btn btn-success px-5">Update</button>
                              <!-- <a href="hapusProduk.php?products_id=<?= $dataProduct['products_id']; ?>" class="btn btn-danger px-5">Hapus</a> -->
                            </div>
                          </div>
                          <?php
                            }
                          ?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                        <?php
                          $queryPhotos = mysqli_query($config, "SELECT * FROM product_galleries WHERE products_id='$products_id'");
                          while($dataPhotos = mysqli_fetch_array($queryPhotos)) {
                        ?>
                          <div class="col-md-4 mb-4">
                            <div class="gallery-container position-relative">
                              <img src="../../images/products/<?= $dataPhotos['photos'];?>" alt="" srcset="" class="w-100" >
                              <a href="delphoto.php?galleries_id=<?= $dataPhotos['galleries_id']; ?>" class="delete-gallery">
                                <img src="../../images/icon-delete.svg"
                                  class="position-absolute top-0 start-100 translate-middle" alt=""
                                  srcset="">
                              </a>
                            </div>
                          </div>
                        <?php
                          }
                        ?>
                          <div class="col-12">
                            <form action="upphoto.php" method="post" enctype="multipart/form-data">
                            <div class="d-grid gap-2 mt-3">
                                <input type="hidden" name="products_id" value="<?= $products_id; ?>">
                                <input type="file" name="photos" id="file" style="display:none;" onchange="form.submit()">
                                <button class="btn btn-secondary" type="button" onclick="thisFileUpload()">UPLOAD PHOTO</button>
                              </div>
                            </form>
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
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
  <?php
    include '../components/footer.php';
  ?>