<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login & Regis | SIP Gempolan</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('admin')?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('admin')?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('admin')?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('admin')?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('admin')?>/build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        background-color: #0A2640 !important;
        background-size: 100%;
      }
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <h4 class="card-header"><?=lang('Auth.loginTitle')?></h4>

					<?= view('Myth\Auth\Views\_message_block') ?>

          <form action="<?= url_to('login') ?>" method="post">
						<?= csrf_field() ?>
              <h1>Log In Form</h1>
            <!-- <div>
							<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div> -->
              <div>
                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.emailOrUsername')?>" required="" />
                <div class="invalid-feedback">
								  <?= session('errors.login') ?>
							  </div>
              </div>   
              <div>
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password"  placeholder="<?=lang('Auth.password')?>" required="" />
                <div class="invalid-feedback">
								  <?= session('errors.password') ?>
							  </div>
              </div>

              <div>
                <button type="submit" class="btn btn-light"><?=lang('Auth.loginAction')?></button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum punya akun?
                  <a href="#signup" class="to_register"><b>Registrasi</b></a>
                </p>
                  <a class="btn btn-secondary" href="<?php echo base_url('/') ?>">Beranda</a>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="<?= base_url('awal')?>/assets/img/favicons/icon.png" alt="" />SIP Gempolan</h1>
                  <p>©<?= date('Y'); ?></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
          <h4><?= lang('Auth.register') ?></h4>

          <?= view('Myth\Auth\Views\_message_block') ?>

          <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>
              <h1>Sign In Form</h1>
              <div>
                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>"  required="" />
              </div>
              <div>
                <input type="text" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>" required="" />
              </div>
              <div>
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?=lang('Auth.password')?>" required="" autocomplete="off"/>
              </div>
              <div>
                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" required="" autocomplete="off"/>
              </div>
              <!-- <div>
                <input type="text" class="form-control" placeholder="Nama (Sesui KTP)" required="" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="No WA/telepon" required="" />
              </div> -->
              <div>
                <button type="submit" class="btn btn-light"><?=lang('Auth.register')?></button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah punya akun?
                  <a href="#signin" class="to_register"><b>Log in</b></a>
                </p>
                
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="<?= base_url('awal')?>/assets/img/favicons/icon.png" alt="" />SIP Gempolan</h1>
                  <p>©<?= date('Y'); ?></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
