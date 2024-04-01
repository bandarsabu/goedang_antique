<?php
session_start();
include 'config.php';
if(isset($_SESSION["login"])) { 
    header("Location: index.php");
}

// if()

if (isset($_POST["submit"])) {
  # code...
  $email = $_POST["email"];
  $password = $_POST["password"];


  $result = mysqli_query($config,"SELECT * FROM users WHERE email = '$email'");

  if (mysqli_num_rows($result) === 1) {
    # code...
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password,$row["password"])) {

      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["users_id"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["username"] = $row["username"];
      $_SESSION["roles"] = $row["roles"];
      if($_SESSION["roles"] === "ADMIN") {
        header("Location: backend/dashboard/dashboard.php");
      } else {
        header("Location: index.php");
      }
      exit;
    }
    
  }
  $error = true;
  
}


?>
    <?php include('layouts/header.php'); ?>
    <?php include('layouts/navbar.php'); ?>


    <!--================login_part Area =================-->
        <section class="login_part section_padding mt-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>Belum punya akun?</h2>
                                <p>Silahkan buat akun dan dapatkan kemudahan dalam berbelanja</p>
                                <a href="register.php" class="btn btn-opurple">Buat Akun</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <?php 
                                    if(isset($_SESSION['message']))
                                    {
                                        ?>
                                            <blockquote class="generic-blockquote">
                                            <?= $_SESSION['message']; ?>
                                                            </blockquote>
                                        <?php 
                                        unset($_SESSION['message']);
                                    }
                                ?>

                                <h3>Selamat Datang Kembali ! <br>
                                    Silahkan Login</h3>
                                    <?php if(isset($error)) : ?>
                                        <p style="color:red;">email / password salah</p>
                                    <?php endif; ?>
                                <form class="row" action="" method="post" >
                                    <div class="col-md-12 form-group ">
                                        <input type="email" class="form-control" id="name" name="email" value=""
                                            placeholder="Alamat Email">
                                    </div>
                                    <div class="col-md-12 form-group mt-2">
                                        <input type="password" class="form-control" id="password" name="password" value=""
                                            placeholder="Password">
                                    </div>
                                
                                    <div class="col-md-12 form-group">
                                        <button type="submit" name="submit" class="btn btn-purple">
                                            log in
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--================login_part end =================-->

    <?php include('layouts/footer.php'); ?>
