<?php
  include '../components/header.php';
?>

<body>
  <div class="page-dashboard">
    <!-- <div class="d-flex" id="wrapper" data-aos="fade-right"> kalo pake class d-flex-->
    <div class="d-flex"  id="wrapper" data-aos="fade-right">
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
                <div div class="dashboard-heading">
                    <h2 class="dashboard-title">Daftar Daerah</h2>
                    <p class="dashboard-subtitle">
                        Ongkos Kirim
                    </p>
                </div>
                <div class="dashboard-content">
                    <div class="row mb-3">
                        <div class="col-12">
                            <a href="create.php" class="btn btn-success">Tambah Ongkir</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="store.php" method="POST" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>NO</th>
                                                                <th>Daerah Tujuan</th>
                                                                <th>Ongkos Kirim</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $no = 1;
                                                                $query = mysqli_query($config, "SELECT * FROM provinces");
                                                                while ($data = mysqli_fetch_array($query)) {
                                                            ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $data['provinces_name']; ?></td>
                                                                <td>Rp. <?= number_format($data['shipping_cost']); ?></td>
                                                                <td>
                                                                    <a href="edit.php?provinces_id=<?= $data['provinces_id']; ?>" class="btn btn-primary">Ubah</a>
                                                                    <a href="destroy.php?provinces_id=<?= $data['provinces_id']; ?>" class="btn btn-danger">Hapus</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
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