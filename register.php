    <?php include('layouts/header.php'); ?>
    <?php include('layouts/navbar.php'); ?>
    

    <main>

        <!--================login_part Area =================-->
    <section class="login_part section_padding mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Sudah Punya Akun!</h2>
                            <p>Silahkan login dengan akun yang telah daftar</p>
                            <a href="login.php" class="btn btn-opurple">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Buat Akun  terlebih dahulu untuk kenyamanan berbelanja</h3>
                            <form class="row contact_form" action="register-action.php" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star mb-3">
                                    <input type="text" class="form-control" id="name" name="name" autofocus
                                        placeholder="Nama Lengkap" required>
                                </div>
                                <div class="col-md-12 form-group p_star  mb-3">
                                    <input type="text" class="form-control" id="email" name="email" 
                                        placeholder="Alamat Email" required>
                                </div>
                                <div class="col-md-12 form-group p_star  mb-3">
                                    <input type="password" class="form-control"  name="password" 
                                        placeholder="Password" required>
                                </div>
                                <div class="col-md-12 form-group p_star  mb-3">
                                    <input type="password" class="form-control"  name="confPassword" 
                                        placeholder="Konfirmasi Password" required>
                                </div>
                                <div class="col-md-12 form-group">

                                    <button type="submit" value="submit" class="btn btn-purple">
                                        Daftar
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

    </main>

    <?php include('layouts/footer.php'); ?>
