<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container-fluid p-0">
	<div class="row no-gutters">
		<div class="col-12">
			<div class="top-bar d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center p-2">
				<div class="top-bar-left pr-5">
					<span id="current-time"></span>
				</div>
				<div class="top-bar-right">
						<a href="https://www.facebook.com/KemenPUPR" class="mx-2" data-toggle="tooltip" title="Facebook">
							<i class="fab fa-facebook"></i>
						</a>
						<a href="https://www.twitter.com/kemenPU" class="mx-2" data-toggle="tooltip" title="Twitter">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="https://www.instagram.com/pupr_bpsdm/" class="mx-2" data-toggle="tooltip" title="Instagram">
							<i class="fab fa-instagram"></i>
						</a>
					</div>
			</div>
		</div>
	</div>

	<!-- navbar -->
	<div id="navsticky" class="sticky-top" style="height: fit-content;">
		<!-- form search -->
		<div class="top-search-warper">
			<div class="container">
				<?= form_open(site_url('search'), 'class="search-form"'); ?>
				<input type="text" name="kata" class="input-search form-control" placeholder="Search..." />
				<?= form_close(); ?>
			</div>
		</div>
		<!--/ form search -->

		<!-- top nav -->
		<nav class="navbar navbar-expand-sm navbar-light" style=" padding-block:20px;background-color: #fff; font-family: 'Montserrat', sans-serif;">
			<div class="container">
				<div></div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-center" id="navbarNav">
					<?php
					// Load web menu.
					$this->CI->load_menu(
						$menu_group = 2,
						$ul = 'class="navbar-nav"',
						$ul_li = 'class="nav-item dropdown"',
						$ul_li_a = 'class="nav-link"', // Change nav-link to text-dark for dark text color
						$ul_li_a_ul = 'class="dropdown-menu"'
					);
					?>
				</div>
			</div>
		</nav>


		<!--/ top nav -->
	</div>
	<!-- navbar -->

	<!-- content -->
	<div class="auth-container mg-t-50" style="padding-top: 20px;">
        <div class="text-center mg-b-30">
            <img class="img-fluid" src="<?= content_url('images/sipar.png'); ?>" alt="logo">
            <hr>
            <h4 class="mg-b-10 tx-semiboldX"><?= lang_line('signin_title'); ?></h4>
            <p><?php //lang_line('signin_welcome'); 
                ?></p>
        </div>
        <div class="err"><?= $this->cifire_alert->show('login'); ?></div>
        <div class="card auth-box">
            <?= form_open('', 'id="form-login" class="login-form" autocomplete="off" onsubmit="return validateForm();"'); ?>
            <div class="form-group">
                <label><?= lang_line('username') ?></label>
                <input id="username" type="text" name="<?= $input_uname; ?>" class="form-control input-username" maxlength="20" />
            </div>
            <div class="form-group">
                <label><?= lang_line('password') ?></label>
                <input id="password" type="password" name="<?= $input_pwd; ?>" class="form-control" />
            </div>
            <button type="submit" class="btn btn-brand btn-block mg-t-20"><?= lang_line('button_login') ?></button>
            <div class="text-center mg-t-10" style="font-size: 0.875em;">
                <a href="<?= site_url('daftar'); ?>">Don't have an account? Sign Up</a>
            </div>
            <div class="text-center mg-t-2" style="font-size: 0.875em;">
                <a href="<?= admin_url('forgot'); ?>"><?= lang_line('forgot_password') ?>?</a>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
	<!-- content -->
	<br>
	<br>
	<!-- footer -->
	<footer class="footer text-white">
		<div class="first-bg">
			<div style="font-size:14px;" class="container pt-4">

				<div class="d-flex justify-content-space-between flex-wrap">
					<div class="col-lg-4 mb-4  col-md-12">
						<h5 style="font-family: 'Montserrat',sans-serif; font-size: 16px; color:whitesmoke">Tautan</h5>
						<ul style="font-family: 'Open Sans',sans-serif;" class="styled-list">
							<li><a style="text-decoration: none; color:whitesmoke" href="https://setnas-asean.id/">Sekretariat Nasional ASEAN</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/FAQ">FAQ</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/Sitemap">Sitemap</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/Setingkat-Menteri">Setingk Menteri</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/LPNK">LPNK</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/Pemerintah-Daerah">Pemerintah Daerah</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/Badan-Usaha-Milik-Negara">Badan Usaha Milik Negara</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/Instansi-Terkait">Instansi Terkait</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/Asosiasi">Asosiasi</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/PU-Internasional">PU Internasional</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/Info-Terkait">Info Terkait</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/Kementerian">Kementerian</a></li>
							<li><a style="text-decoration: none; color:whitesmoke" href="https://ukpbj.pu.go.id/">UKPBJ Kementerian PUPR</a></li>
						</ul>
					</div>
					<div class="col-lg-4 mb-4  col-md-12">
						<h5 style="font-family: 'Montserrat',sans-serif; font-size: 16px; color:whitesmoke">#SigapMembangunNegeri</h5>
					</div>
					<div class="col-lg-4 mb-4  col-md-12">
						<h5 style="font-family: 'Montserrat',sans-serif; font-size: 16px; text-decoration: underline; color:whitesmoke">Kontak Kami</h5>
						<address>
							<b style="color: whitesmoke;">Kementerian PUPR</b>
							<br>
							Jl. Pattimura No. 20 Kebayoran Baru Jakarta Selatan<br>
							12110<br>
							<a style="text-decoration: none; color:whitesmoke" href="tel:+6221158">(021) 158</a><br>
							<a style="text-decoration: none; color:whitesmoke" href="mailto:informasi@pu.go.id">informasi@pu.go.id</a><br>
							Anda juga dapat menghubungi kami dengan <a href="#" style="color:whitesmoke; text-decoration: underline;">klik link ini</a>
						</address>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright text-center" style="height: fit-content; padding-block: 12px;">
			<small style="font-size: 14px; padding-inline: 12px;">Hak Cipta &copy; 2024 Kementerian Pekerjaan Umum dan Perumahan Rakyat Republik Indonesia. All Rights Reserved</small>
		</div>
	</footer>
	<!-- footer -->
    
	
</div>