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
                <h2 class="dashboard-title">Akun Saya</h2>
                <p class="dashboard-subtitle">
                  Perbarui Profilmu
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="update.php" method="POST">
                      <div class="card">
                        <div class="card-body">
                        <?php
                          $users_id = $_SESSION["id"];
                          $query = mysqli_query($config, "SELECT * FROM users  JOIN provinces ON users.provinces_id=provinces.provinces_id WHERE users_id='$users_id'");
                          while ($data = mysqli_fetch_array($query)) {
                        ?>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="hidden" class="form-control" id="users_id" name="users_id" value="<?= $data['users_id']; ?>">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $data['name']; ?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                value="<?= $data['username']; ?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="phone_number" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $data['phone_number']; ?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="email" class="form-label">Alamt Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $data['email']; ?>">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea name="address" id="address" cols="30" rows="4" class="form-control"><?= $data['address']; ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="provinces" class="form-label">Provinsi</label>
                                
                                <select id="provinces_id" name="provinces_id" class="form-select" required>
                                  <option value="<?= $data['provinces_id']; ?>" selected><?= $data['provinces_name']; ?></option>
                                  <option value="" readonly>------------------------------</option>
                                  <?php
                                    $query = mysqli_query($config, "SELECT * FROM provinces");
                                    while ($prov = mysqli_fetch_array($query)) {
                                  ?>
                                  <option value="<?= $prov['provinces_id']; ?>"><?= $prov['provinces_name']; ?></option>
                                  <?php
                                    }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="zip_code" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code"
                                value="<?= $data['zip_code']; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-end">
                              <button type="submit" name="submit" class="btn btn-success px-5">Save Now</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <?php
                      }
                    ?>
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