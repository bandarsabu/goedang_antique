<?php
  session_start();
  include '../config.php'
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
              <a href="dashboard-transactions.php" class="list-group-item list-group-item-action">Pesanan</a>
              <a href="dashboard-account.php" class="list-group-item list-group-item-action active">Akun</a>
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
                <h2 class="dashboard-title">Akun Saya</h2>
                <p class="dashboard-subtitle">
                  Perbaharui Profilmu
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                      <form action="dashboard-account-update.php" method="POST">
                        <div class="card">
                          <div class="card-body">
                          <?php
                            $users_id = $_SESSION["id"];
                            $query = mysqli_query($config, "SELECT * FROM users JOIN provinces ON users.provinces_id=provinces.provinces_id  WHERE users_id='$users_id'");
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
                                <button type="submit" name="submit" class="btn btn-success px-5">Simpan</button>
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