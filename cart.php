<?php
  session_start();
  include 'config.php';

  $users_id = $_SESSION['id'];

  if(isset($_POST['btnRemove'])) {
    $carts_id = $_POST['carts_id'];
    mysqli_query($config, "DELETE FROM carts WHERE carts_id='$carts_id'");
    // header('Location:index.php');
  }

?>

  <?php include('layouts/header.php'); ?>
  <?php include('layouts/navbar.php'); ?>

  <main>

<section class="detail-produk py-5" style="background-color: #FFC3A1">
  <div class="container" data-aos="fade-right">
    <div class="row">
      <div class="col section-popular-heading">
        <h2>Keranjang</h2>
        <hr>
      </div>
    </div>
    <div class="row mb-3" data-aos="fade-up" data-aos-delay="100">
      <div class="col-12" >
        <div class="card card-details"  style="background-color: #D3756B">
          <div class="attendee table-responsive">
            <table class="table ">
              <thead>
                <tr>
                  <th scope="col">Foto Produk</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Toko</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Kuantitas</th>
                  <th scope="col">Total</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $subProduk = 0;
                  $banyakProduk = 0;
                  $subTotalProduk = 0;
                  $BeratSemuaProduk = 0;
                  $unique_code = (rand(100,999));
                  $query = mysqli_query($config, "SELECT * FROM carts JOIN products ON carts.products_id=products.products_id  WHERE users_id='$users_id'");
                  while ($data = mysqli_fetch_array($query)) {
                    $BeratSemuaProduk += $data['weight'];
                    $subProduk = $data['quantity'] * $data['price'];
                    $banyakProduk += $data['quantity'] ;
                    $subTotalProduk += $subProduk;
                    $productId = $data['products_id'];

                ?>
                  <tr>
                    <td>
                      <?php
                          $queryGaleri = mysqli_query($config, "SELECT photos FROM product_galleries WHERE product_galleries.products_id='$productId' LIMIT 1");
                          if(mysqli_num_rows($queryGaleri)=== 1) {
                          while ($dataGaleri = mysqli_fetch_array($queryGaleri)) {
                        ?>
                        <img
                          src="images/products/<?= $dataGaleri['photos']; ?>"
                          alt=""
                          height="60"
                        />
                      <?php
                            }
                          }
                        ?>
                    </td>
                    <td class="align-middle"><?= $data['product_name']; ?></td>
                    <td class="align-middle">Goedang Antique</td>
                    <td class="align-middle">Rp. <?= number_format($data['price']); ?></td>
                    <td class="align-middle"><?= $data['quantity']; ?></td>
                    <td class="align-middle">Rp. <?= number_format($subProduk); ?></td>
                    <td class="align-middle">
                      <a href="#">
                        
                      </a>
                      <form action="" method="POST">
                        <input type="hidden" name="carts_id" value="<?= $data['carts_id']; ?>">
                        <button type="submit" name="btnRemove" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                      </form>
                    </td>
                  </tr>
                <?php  } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row" data-aos="fade-up"  data-aos-delay="200">
        <div class="col-12" >
          <div class="card card-details card-right text-end ">
            <div class="row">
              <div class="col-lg-10 col-12 mt-2">
                <h2>Total (<?= $banyakProduk; ?> Produk): Rp. <?= number_format($subTotalProduk); ?></h2>
              </div>
              <div class=" col-lg-2 col-12">
                <a class="btn btn-purple" href="checkout.php">Checkout</a>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</section>


</main>


  <?php include('layouts/footer.php'); ?>