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
                <h2 class="dashboard-title">Produk Baru</h2>
                <p class="dashboard-subtitle">
                  Tambah Produk Baru
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="store.php" method="POST" enctype="multipart/form-data">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" name="product_name" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="editor1" 
                                  rows="10" cols="80"></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" name="price" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="category" name="category" class="form-select">
                                  <option value="" disabled>Pilih Kategori</option>
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
                                <input type="number" step="any" class="form-control" name="berat">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" class="form-control" name="stok">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control" name="listGambar[]" multiple required>
                                <p class="text-muted">Kamu dapat memilih lebih dari satu file [.png | .jpg | .jpeg]</p>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 text-end">
                              <button type="submit" class="btn btn-success px-5">Simpan</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
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