<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $this->meta_title; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="<?= $this->meta_description; ?>" />
	<meta name="keywords" content="<?= $this->meta_keywords; ?>" />
	<meta name="author" content="<?= get_setting('web_author'); ?>" />
	<meta http-equiv="Copyright" content="<?= get_setting('web_name'); ?>" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="language" content="english" />
	<meta name="revisit-after" content="7" />
	<meta name="webcrawlers" content="all" />
	<meta name="rating" content="general" />
	<meta name="spiders" content="all" />

	<!-- favicon -->
	<link rel="shortcut icon" href="<?= favicon(); ?>" />

	<!-- metasocial -->
	<?php $this->load->view('meta_social'); ?>

	<!-- stylesheet -->
	<link rel="stylesheet" href="<?= content_url('plugins/bootstrap/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" href="<?= content_url('plugins/prism/prism.css'); ?>" />
	<!-- font-awesome -->
	<link rel="stylesheet" href="<?= content_url('plugins/font-awesome/font-awesome.min.css'); ?>" type="text/css" />
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"> -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
	<link rel="stylesheet" href="<?= content_url('plugins/cifireicon-feather/cifireicon-feather.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?= content_url('plugins/photoswipe/photoswipe.css'); ?>">
	<link rel="stylesheet" href="<?= content_url('plugins/photoswipe/default-skin/default-skin.css'); ?>">
	<link rel="stylesheet" href="<?= $this->CI->theme_asset('css/style.css'); ?>" />

	<!-- google font Montserrat -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

	<!-- Google Font Open Sans -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


	<!-- script -->
	<script src="<?= content_url('plugins/jquery/jquery3.4.1.min.js'); ?>"></script>

	<!-- google analytics -->
	<?= google_analytics(); ?>

	<style>
		#gallery .g-item {
			margin-bottom: 20px;
			padding: 10px;
		}

		.g-item .g-link img {
			min-width: 250px;
			/* max-width: 250px; */
			display: block;
			border: 1px solid #ddd;
			padding: 5px;
			background-color: #f7f7f7;
			border-radius: 4px;
		}

		.img-thumbnail {
			padding: 4px;
			background-color: #f7f7f7;
			border: 1px solid #ddd;
			border-radius: 4px;
		}

		.section-container {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			margin-block-end: 3rem;
			padding: 2rem 0;

			transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
			opacity: 1;
		}

		.hidden {
			opacity: 0;
			transform: translateY(-20px);
		}

		.card-container {
			width: 90vw;
			/* height: 20rem; */
			border-radius: 10px;
			background: linear-gradient(90deg, #f5f5f5 0%, #ffffff 60%, #f5f5f5 100%);
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

		}

		.section-container:nth-child(2n+1) .card-container {
			/* Your styles for odd card-container elements */
			flex-direction: row-reverse;
		}

		.image-container {
			width: 100%;
			display: flex;
			align-items: center;
			padding-block: 1rem;
			gap: 2rem;
			overflow-x: scroll;

			background: rgb(2, 2, 2);
			background: linear-gradient(90deg, rgba(2, 2, 2, 0.5327380952380952) 0%, rgba(237, 237, 237, 1) 50%, rgba(0, 0, 0, 0.4290966386554622) 100%);
		}

		/* @media (max-width: 767px) {
			.image-container {
				gap: 2rem;
			}
		} */

		.image-container::-webkit-scrollbar {
			/* display: none; */
			height: 0.4rem;
		}

		.image-container::-webkit-scrollbar-thumb {
			/* display: none; */
			background-color: rgb(96, 95, 95);
			border-radius: 100vh;
		}

		.cat ul {
			list-style: none;
			padding: 0;
		}

		.cat li {
			margin-bottom: 10px;
		}

		.cat a {
			display: block;
			padding: 10px 15px;
			background-color: #fff;
			border: 1px solid #ddd;
			border-radius: 5px;
			text-decoration: none;
			color: #333;
			transition: all 0.3s ease;
		}

		.cat a:hover {
			background-color: #007bff;
			color: #fff;
			border-color: #007bff;
		}

		.section-container h3 {
			font-family: 'Montserrat';
		}

		/* Dropdown css */
		.dropdown-menu-scrollable {
			max-height: 200px;
			/* Adjust the height as needed */
			overflow-y: auto;
			max-width: 300px;
			/* Adjust the width as needed */
		}

		.navbar-shadow {
			box-shadow: 0 4px 20px -2px black;
		}

		.dropdown button {
			background-color: rgb(229, 229, 229);
		}

		/* untuk halaman daftar */
		::-webkit-input-placeholder {
			color: grey !important;
			opacity: 0.5 !important;
		}

		:-moz-placeholder {
			color: grey !important;
			opacity: 0.5 !important;
		}

		::-moz-placeholder {
			color: grey !important;
			opacity: 0.5 !important;
		}

		:-ms-input-placeholder {
			color: grey !important;
			opacity: 0.5 !important;
		}
	</style>

</head>

<body>
	<div class="container-fluid p-0">
		<div class="row no-gutters">
			<div class="col-12">
				<div class="top-bar d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center p-2">
					<div class="top-bar-left pr-5">
						<span id="current-time"></span>
					</div>
					<div class="top-bar-right">
						<a href="https://www.facebook.com/KemenPUPR" class="mx-2" data-toggle="tooltip" title="Facebook">
							<i class="fa fa-facebook-official"></i>
						</a>
						<a href="https://www.twitter.com/kemenPU" class="mx-2" data-toggle="tooltip" title="Twitter">
							<i class="fa fa-twitter"></i>
						</a>
						<a href="https://www.instagram.com/pupr_bpsdm/" class="mx-2" data-toggle="tooltip" title="Instagram">
							<i class="fa fa-instagram"></i>
						</a>
					</div>
				</div>
			</div>
		</div>

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
			<nav class="navbar navbar-expand-md navbar-light p-0" style="background-color: #fff; font-family: 'Montserrat', sans-serif;">
				<div class="container">
					<center>
						<a class="navbar-brand p-0 m-0" style="height: 80px;" href="<?= site_url(); ?>">
							<img src="<?= favicon('logo'); ?>" alt="Logo" style="height: inherit;" />
						</a>
					</center>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<?php
						// Load web menu.
						$this->CI->load_menu(
							$menu_group = 2,
							$ul = 'class="navbar-nav ml-auto d-flex align-items-center"',
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

		<!-- carrousel -->
		<div id="headlines" class="carousel slide headlines" data-ride="carousel">
			<div class="carousel-inner">
				<?php
				$i = 0;
				$headlines = $this->CI->index_model->get_banner();
				foreach ($headlines as $res_headline) :
					$i++;
					$active = ($i == 1 ? 'active' : '');
				?>
					<div class="carousel-item <?= $active; ?>">
						<a class="img-href"><img height="500px" src="<?= post_images($res_headline['banner'], 'small', TRUE) ?>" class="d-block w-100" alt="<?= $res_headline['unker'] ?>"></a>
						<div class="carousel-caption d-md-block">

							<!-- <div class="tagcloud">
								<a href="#" rel="tag" class="bg-red"><?= $res_headline['unker']; ?></a>  
							</div> -->
							<h5 class="clearfix mb-1"><?= $res_headline['unker']; ?></h5>
							<!-- calendar icon -->
							<!-- <ul class="entry-meta clearfix mb-2">
								<li><i class="cificon licon-calendar"></i> </li>
							</ul> -->
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<a class="carousel-control-prev" href="#headlines" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
			<a class="carousel-control-next" href="#headlines" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
		</div>

		<section class="col-md-12" style="background-color: white;">
			<?php $this->CI->_layout($this->CI->__content_view); ?>
		</section>

		<!-- footer -->
		<section>
			<footer class="footer text-white bg-dark">
				<div class="container pt-4">
					<div class="row">
						<div class="col-lg-4 mb-4 mb-lg-0">
							<h5 style="font-family: 'Montserrat',sans-serif; font-size: 16px;">Tautan</h5>
							<ul style="font-family: 'Open Sans',sans-serif;" class="styled-list">
								<li><a style="text-decoration: none; color:whitesmoke" href="https://setnas-asean.id/">Sekretariat Nasional ASEAN</a></li>
								<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/FAQ">FAQ</a></li>
								<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/Sitemap">Sitemap</a></li>
								<li><a style="text-decoration: none; color:whitesmoke" href="https://pu.go.id/page/Setingkat-Menteri">Setingkat Menteri</a></li>
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
						<div class="col-lg-4 mb-4 mb-lg-0">
							<h5 style="font-family: 'Montserrat',sans-serif; font-size: 16px;">#SigapMembangunNegeri</h5>
						</div>
						<div class="col-lg-4 mb-4 mb-lg-0">
							<h5 style="font-family: 'Montserrat',sans-serif; font-size: 16px; text-decoration: underline;">Kontak Kami</h5>
							<address style="font-family: 'Open Sans';">
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
				<div class="copyright text-center" style="height: fit-content;padding-block: 12px;">
					<small style="font-size: 14px; padding-inline: 12px;">Hak Cipta &copy; 2024 Kementerian Pekerjaan Umum dan Perumahan Rakyat Republik Indonesia. All Rights Reserved</small>
				</div>
			</footer>
		</section>
	</div>

	<!-- script -->
	<script src="<?= content_url('plugins/popper/popper.js'); ?>"></script>
	<script src="<?= content_url('plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?= content_url('plugins/sticky/jquery.sticky.js'); ?>"></script>
	<script src="<?= content_url('plugins/prism/prism.js'); ?>"></script>
	<script src="<?= content_url('plugins/photoswipe/photoswipe.min.js'); ?>"></script>
	<script src="<?= content_url('plugins/photoswipe/photoswipe-ui-default.min.js'); ?>"></script>
	<?php if (get_setting('recaptcha') == "Y") : ?>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	<?php endif ?>
	<script src="<?= $this->CI->theme_asset('js/javascript.js'); ?>"></script>

	<script>
		//show time
		function updateTime() {
			var now = new Date();
			var optionsDate = {
				year: 'numeric',
				month: 'long',
				day: 'numeric',
				timeZone: 'Asia/Jakarta'
			};
			var optionsTime = {
				hour: '2-digit',
				minute: '2-digit',
				second: '2-digit',
				timeZone: 'Asia/Jakarta'
			};
			var formattedDate = now.toLocaleDateString('id-ID', optionsDate);
			var formattedTime = now.toLocaleTimeString('id-ID', optionsTime);
			document.getElementById('current-time').innerText = `${formattedDate} | ${formattedTime} WIB`;
		}

		setInterval(updateTime, 1000);
		updateTime();

		//menghilangkan pr-5 ketika widht < 300px
		function adjustTopBarLeftClass() {
			var topBarLeft = document.querySelector('.top-bar-left');
			if (window.innerWidth <= 300) {
				// Remove 'pr-5' class if exists
				topBarLeft.classList.remove('pr-5');
			} else {
				// Add 'pr-5' class if not already added
				if (!topBarLeft.classList.contains('pr-5')) {
					topBarLeft.classList.add('pr-5');
				}
			}
		}

		// Call the function initially and add event listener for window resize
		adjustTopBarLeftClass();
		window.addEventListener('resize', adjustTopBarLeftClass);

		// Function to add 'active' class to the current nav-link
		function setActiveNavLink() {
			var navLinks = document.querySelectorAll('.nav-link');
			var currentPath = window.location.pathname;
			console.log(currentPath)

			navLinks.forEach(function(link) {
				var linkPath = new URL(link.href).pathname;
				console.log(linkPath)
				if (linkPath === currentPath) {
					link.classList.add('active');
				}
			});
		}

		// Call the function on page load
		document.addEventListener('DOMContentLoaded', setActiveNavLink);

		//untuk menengahkan satu gambar pada smart meeting room atau smart classroom
		document.addEventListener("DOMContentLoaded", function() {
			const imageContainers = document.querySelectorAll('.image-container');

			imageContainers.forEach(container => {
				const gLinks = container.querySelectorAll('.g-link');
				if (gLinks.length === 1) {
					container.classList.add('justify-content-center');
				}
			});
		});

		//jQuery untuk navigasi dalam menu Smart meeting room atau Smart classroom
		$(document).ready(function() {
			// Set the offset value
			var offset = 200; // Change this value to the desired offset

			// Select all links with hashes
			$('a[href*="#"]').on('click', function(event) {
				// Ensure this.hash has a value before overriding default behavior
				if (this.hash !== "") {
					// Prevent default anchor click behavior
					event.preventDefault();

					// Store hash
					var hash = this.hash;

					// Using jQuery's animate() method to add smooth page scroll
					// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
					$('html, body').animate({
						scrollTop: $(hash).offset().top - offset
					}, 800, function() {
						// Add hash (#) to URL when done scrolling (default click behavior)
						// window.location.hash = hash; // Comment this out to prevent resetting to top
						if (history.pushState) {
							history.pushState(null, null, hash);
						} else {
							window.location.hash = hash;
						}
					});
				}
			});

			// Check if there's a hash in the URL when the page loads
			if (window.location.hash) {
				$('html, body').animate({
					scrollTop: $(window.location.hash).offset().top - offset
				}, 800);
			}
		});

		// Popup Image untuk Smart meeting room dan Smart classroom
		document.addEventListener('DOMContentLoaded', function() {
			var pswpElement = document.querySelectorAll('.pswp')[0];

			// Gather all image container elements
			var sections = document.querySelectorAll('.section-container');

			sections.forEach(function(section) {
				var links = section.querySelectorAll('.g-link');
				var items = []; // Array to hold all images and captions in this section

				// Populate items array with image and caption details from links
				links.forEach(function(link) {
					var item = {
						src: link.getAttribute('href'),
						w: parseInt(link.getAttribute('data-width'), 10),
						h: parseInt(link.getAttribute('data-height'), 10),
						title: link.getAttribute('data-caption') // Add caption from data attribute
					};
					items.push(item);
				});

				// Assign click event to each link
				links.forEach(function(link, index) {
					link.onclick = function(event) {
						event.preventDefault();

						// Initialize PhotoSwipe with items from this section
						var options = {
							index: index, // Start at the clicked index
							bgOpacity: 0.9, // Adjust the background opacity here; closer to 1 makes it darker
							showHideOpacity: true,
							getThumbBoundsFn: function(index) {
								// Find the image element
								var thumbnail = links[index].getElementsByTagName('img')[0],
									pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
									rect = thumbnail.getBoundingClientRect();

								return {
									x: rect.left,
									y: rect.top + pageYScroll,
									w: rect.width
								};
							}
						};

						var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
						gallery.init();
					};
				});
			});
		});

		//Menampilkan section ke paling atas (pertama) sesuai pilihan dropdown pada halaman SMR dan SCR
		document.addEventListener('DOMContentLoaded', function() {
			const dropdownItems = document.querySelectorAll('.dropdown-item');
			const sections = document.querySelectorAll('.section-container');
			const container = document.querySelector('.cat');
			const dropdownButton = document.getElementById('dropdownMenuButton');
			let originalOrder = Array.from(sections); // Store the original order of sections
			let currentSection = null;

			dropdownItems.forEach(function(item) {
				item.addEventListener('click', function(event) {
					event.preventDefault();
					const targetId = this.getAttribute('href').substring(1);
					const targetSection = document.getElementById(targetId);

					// Update the dropdown button text to the selected item text
					dropdownButton.textContent = this.textContent;

					// Restore all sections to their original order
					originalOrder.forEach(section => {
						section.classList.remove('moved-section');
						section.classList.remove('hidden');
						section.parentElement.appendChild(section);
					});

					// Move the selected section below the dropdown button
					targetSection.classList.add('hidden');
					container.parentElement.insertBefore(targetSection, container.nextSibling);

					// Trigger reflow to restart the transition
					void targetSection.offsetWidth;

					// Remove the hidden class to start the transition
					targetSection.classList.remove('hidden');
					targetSection.classList.add('moved-section');
					currentSection = targetSection;
				});
			});
		});

		$(document).ready(function() {
			// Initialize sticky navbar
			$(".navbar").sticky({
				topSpacing: 0
			});

			// Function to add box shadow on scroll
			$(window).scroll(function() {
				if ($(this).scrollTop() > 0) {
					$('.navbar').addClass('navbar-shadow');
				} else {
					$('.navbar').removeClass('navbar-shadow');
				}
			});
		});

		//untuk navbar-item
		document.addEventListener("DOMContentLoaded", () => {
			const navbar = document.querySelector(".navbar-nav.ml-auto.d-flex.align-items-center");

			if (window.innerWidth < 768) {
				navbar.classList.remove('align-items-center')
			}

		})


		window.addEventListener('resize', () => {
			const navbar = document.querySelector(".navbar-nav.ml-auto.d-flex.align-items-center");

			if (window.innerWidth < 768) {
				navbar.classList.remove('align-items-center')
			}

		})
	</script>
</body>

</html>