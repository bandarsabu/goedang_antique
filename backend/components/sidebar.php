<?php  
     if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
          $url = "https://";   
     else  
          $url = "http://";   
     // Append the host(domain name, ip) to the URL.   
     $url.= $_SERVER['HTTP_HOST'];   
     
     // Append the requested resource location to the URL   
     $url.= $_SERVER['REQUEST_URI'];    
          
     $pieces = explode("/",$url);
     $active = $pieces[5];
    
    
?>

<div class="border-right" id="sidebar-wrapper">
     <div class="sidebar-heading text-center">
     <img src="../../images/dashboard-logo.png" alt="" srcset="" class="my-4" width="120px">
     </div>
          <div class="list-group list-group-flush">
          <a href="../dashboard/dashboard.php" class="list-group-item list-group-item-action <?= $active == 'dashboard' ? 'active' : ''; ?>">Dashboard</a>
          <a href="../products/index.php" class="list-group-item list-group-item-action <?= $active == 'products' ? 'active' : ''; ?>">Produk</a>
          <a href="../transactions/index.php" class="list-group-item list-group-item-action <?= $active == 'transactions' ? 'active' : ''; ?>">Transaksi</a>
          <a href="../categories/index.php" class="list-group-item list-group-item-action <?= $active == 'categories' ? 'active' : ''; ?>">Kategori</a>
          <a href="../pelanggan/index.php" class="list-group-item list-group-item-action <?= $active == 'pelanggan' ? 'active' : ''; ?>">Pelanggan</a>
          <a href="../provinces/index.php" class="list-group-item list-group-item-action <?= $active == 'provinces' ? 'active' : ''; ?>">Ongkos Kirim</a>
          <a href="../account/dashboard-account.php" class="list-group-item list-group-item-action <?= $active == 'account' ? 'active' : ''; ?>">Akun</a>
          <a href="../../logout.php" class="list-group-item list-group-item-action">Logout</a>
     </div>
</div>