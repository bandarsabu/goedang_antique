<?php
  session_start();
  include 'config.php';

  $users_id = $_SESSION['id'];
  $tran_id = $_GET['transaction_id'];


?>

  <?php include('layouts/header.php'); ?>
  <?php include('layouts/navbar.php'); ?>

  <main>

      <section class="detail-produk py-5" style="background-color: #FFC3A1">
        <div class="container" >
          <div class="row mb-3" >
            <div class="col-12" >
              <div class="card card-details card-address text-center"  style="background-color: #D3756B">
                <img src="asset/images/confirmed.png" height="150" width="150" class="rounded-circle" style="margin:auto" alt="">
                <p class="mt-2">
                  <b>Yeaaaay, Pesananmu berhasil dibuat.</b> <br>
                  Terima Kasih telah berbelanja di Goedang Antique
                </p>
                <a  class="btn btn-purple" href="frontend/dashboard.php">Dashboard</a>

              </div>
            </div>
          </div>

        </div>
      </section>
      

    </main>

  <?php include('layouts/footer.php'); ?>