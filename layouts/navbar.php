<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #A75D5D;">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="asset/images/logo.png" alt="" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
          if(isset($_SESSION["login"])) { ?>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                  </li>
                </li>
                <li class="nav-item">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="produk.php">Produk</a>
                  </li>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hi, <?= $_SESSION['name']; ?>
                  </a>
                  <?php if($_SESSION['roles'] == 'ADMIN') { ?>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="backend/dashboard/dashboard.php">Dashboard</a></li>
                    <li><a class="dropdown-item" href="backend/account/dashboard-account.php">Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                  <?php } else { ?>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="frontend/dashboard.php">Dashboard</a></li>
                    <li><a class="dropdown-item" href="frontend/dashboard-account.php">Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                  <?php } ?>
                  
                </li>
              </ul>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <div class="hearer_icon d-flex align-items-center">
                  <a href="cart.php">
                  <?php
                      $users_id = $_SESSION['id'];
                      $query = mysqli_query($config, "SELECT count(users_id) as cartCount FROM carts WHERE users_id='$users_id'");
                      
                      if(mysqli_num_rows($query)==1) { 
                          while($data = mysqli_fetch_array($query)) { ?>
                              <button type="button" class="btn btn-light position-relative">
                              <i class="bi bi-cart-plus"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                            <?= $data['cartCount'] ?>
                              
                            </span>
                          </button>
                          <?php }
                      }
              ?>
                  </a>

              </div>
              </form>
            </div>
          <?php } else { ?>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                  </li>
                </li>
                <li class="nav-item">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="produk.php">Produk</a>
                  </li>
                </li>
                <li class="nav-item">
                  <a class="btn btn-get-started px-4 me-2 " href="login.php">
                    Masuk
                  </a>
                </li>
              </ul>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              </form>
            </div>
        <?php }?>
      </div>
    </nav>