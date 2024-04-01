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
          <?php
            $categories_id = $_GET['categories_id'];
            $query = mysqli_query($config, "SELECT * FROM categories WHERE categories_id='$categories_id'");
            while ($data = mysqli_fetch_array($query)) {
          ?>    
          <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title"><?= $data['name_category']; ?></h2>
                <p class="dashboard-subtitle">
                  Detail kategori
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="update.php" method="POST" enctype="multipart/form-data">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="mb-3">
                                <img src="../../images/categories/<?= $data['photo']; ?>"  id="image-preview" class="img-fluid" alt="" srcset="">
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                <input type="file" class="form-control"  name="foto" id="image-source"  onchange="previewImage();">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="hidden" class="form-control" value="<?= $data['categories_id']; ?>" name="categories_id" required>
                                <input type="text" class="form-control" value="<?= $data['name_category']; ?>" name="name_category" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 text-end d-grid gap-2">
                              <button type="submit" class="btn btn-success px-5 btn-block">Simpan</button>
                              <a href="destroy.php?categories_id=<?= $categories_id; ?>"  class="btn btn-danger px-5 btn-block">Hapus</a>
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
          <?php
            }
          ?>
          </div>
          
        </div>
      <!-- End Page Content -->
    </div>
  </div>

  <?php
    include '../components/footer.php';
  ?>