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
        <div class="container" >
          <div class="row" data-aos="fade-right">
              <div class="col section-popular-heading">
              <h2>Checkout</h2>
              <hr>
              </div>
          </div>
          <div class="row mb-3" data-aos="fade-up"  data-aos-delay="100">
            <div class="col-12" >
              <div class="card card-details card-address"  style="background-color: #D3756B">
                <div class="row">
                  <div class="col-12">
                    <p>
                      <i class="bi bi-geo-alt"></i> <b>Alamat Pengiriman</b>
                    </p>
                  </div>
                </div>
                <div class="row">
                <?php
                    $users_id = $_SESSION['id'];
                    $alamatIsNull = '';
                    $query = mysqli_query($config, "SELECT * FROM users JOIN provinces ON users.provinces_id=provinces.provinces_id  WHERE users_id='$users_id'");
                    while ($x = mysqli_fetch_array($query)) {
                        $BeratSemuaProduk = $x['shipping_cost'];
                        $alamatIsNull = $x['provinces_name'];
                ?>
                    <div class="col-12 col-lg-3" style="border-right: 1px solid white;">
                        <p><?= $x['name'];?><br><?= $x['phone_number'];?></p>
                    </div>
                    <div class="col-12 col-lg-9">
                    <?php if($alamatIsNull=='Default') {
                        echo '<a class="btn btn-opurple" href="frontend/dashboard-account.php">Tambahkan Alamat</a>';

                        } else { ?>
                            <p><?= $x['address'];?>, <?= $x['provinces_name'];?>. <?= $x['zip_code'];?></p>
                    <?php } ?>
                    </div>
                <?php
                    }
                ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12" >
              <div class="card card-details"  style="background-color: #fff">
                <div class="checkout-produk table-responsive">
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

                        $unique_code = (rand(100,999));
                        $query = mysqli_query($config, "SELECT * FROM carts JOIN products ON carts.products_id=products.products_id  WHERE users_id='$users_id'");
                        while ($data = mysqli_fetch_array($query)) {
                            $BeratSemuaProduk *= $data['weight'];
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
          <div class="row mb-3" data-aos="fade-up" data-aos-delay="300">
              <div class="col-12" >
                <div class="card card-details card-right text-end ">
                  <div class="row">
                    <div class="col-12">
                        <h2>Total (<?= $banyakProduk; ?> Produk): Rp. <?= number_format($subTotalProduk); ?></h2>
                    </div>
                  </div>
                </div>
              </div>

          </div>
          <div class="row mb-3" data-aos="fade-up" data-aos-delay="400">
            <div class="col-12">
              <div class="card card-details"  style="background-color: #fff; ">
                <div class="row">
                    <div class="col-12 col-lg-2">
                        <p>Metode Pembayaran : </p>
                    </div>
                    <div class="col-12 col-lg-5">
                        <button class="btn btn-opurple" type="button">Transfer Bank</button>
                        <button class="btn btn-opurple" type="button">COD (Bayar di Tempat)</button>
                        <button class="btn btn-opurple" type="button">GOPAY</button>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="pembayaran table-responsive">
                        <form action="checkout-store.php" method="post">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td class="align-middle">Subtotal untuk Produk</td>
                                    <td class="align-middle">: Rp. <?= number_format($subTotalProduk); ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Total Ongkos Kirim</td>
                                    <td class="align-middle">: Rp. <?= number_format($BeratSemuaProduk); ?>
                                        <input type="hidden" name="shipping_price" value="<?= $BeratSemuaProduk; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Biaya Layanan</td>
                                    <td class="align-middle">: Rp. 1.000</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Kode Unik</td>
                                    <td class="align-middle">: <?= $unique_code; ?>
                                        <input type="hidden" name="unique_code" value="<?= $unique_code; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Total Pembayaran:</td>
                                    <td class="align-middle">: Rp.  <?= number_format($BeratSemuaProduk+$subTotalProduk+$unique_code+1000); ?>
                                        <input type="hidden" name="total_price" value="<?= ($BeratSemuaProduk+$subTotalProduk+$unique_code); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="align-middle text-end">
                                    
                                        <div class="d-grid gap-2">
                                        <?php if($alamatIsNull=='Default') {
                                            echo '<a class="btn btn-opurple" href="frontend/dashboard-account.php">Ubah Alamat</a>';
                                            } else { 
                                                echo '<button class="btn btn-purple" type="submit">Buat Pesanan</button>';
                                            } ?>
                                            
                                        </div>
                                    
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      

    </main>


    <?php include('layouts/footer.php'); ?>