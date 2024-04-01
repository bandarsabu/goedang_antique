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
            </li>
            <li class="nav-item">
                <a href="../cart.php" class="nav-link d-inline-block mt-2">
                <?php
                    $users_id = $_SESSION['id'];
                    $query = mysqli_query($config, "SELECT count(users_id) as cartCount FROM carts WHERE users_id='$users_id'");
                    
                    if(mysqli_num_rows($query)==1) { 
                    while($data = mysqli_fetch_array($query)) {
                        echo '
                        <img src="../images/icon-cart-filled.svg" alt="" srcset="">
                        <div class="card-badge">'.$data['cartCount'].'</div>
                        ';
                    }
                ?>
                <?php   
                    } else {                      
                    echo '<img src=../images/icon-cart-empty.svg" alt="" srcset="">';
                    }
                ?>
                </a>
            </li>
        </ul>

        <!-- End Desktop Menu -->
        <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
            <a href="dashboard-account.php" class="nav-link">
                Hi, <?= $_SESSION['name']; ?>
            </a>
            </li>
            <li class="nav-item">
            <a href="../../cart.php" class="nav-link d-inline-block">
                Cart
            </a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- End Navigation -->