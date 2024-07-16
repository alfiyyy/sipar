<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script src="<?= content_url('plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?= content_url('plugins/pace/pace.min.js'); ?>"></script>
<script src="<?= content_url('plugins/feather/feather.min.js'); ?>"></script>
<script src="<?= content_url('plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<script src="<?= content_url('plugins/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
<script src="<?= content_url('plugins/bootstrap-select/bootstrap-select.min.js'); ?>"></script>
<script src="<?= content_url('plugins/select2/select2.min.js'); ?>"></script>
<script src="<?= content_url('plugins/fancybox-2.1.7/jquery.fancybox.pack.js'); ?>"></script>
<script src="<?= content_url('plugins/fancybox-2.1.7/jquery.fancybox-media.js'); ?>"></script>
<script src="<?= content_url('themes/backend/js/app.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- custom script -->
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
			if (currentPath === linkPath+"/") {
				link.classList.add('active');
			}
			if (currentPath === linkPath+"/login") {
				link.classList.add('active');
			}
			if (currentPath === linkPath+"/auth") {
				link.classList.add('active');
			}
		});
	}

	// Call the function on page load
	document.addEventListener('DOMContentLoaded', setActiveNavLink);

	function validateForm() {
		var username = document.getElementById('username').value;
		var password = document.getElementById('password').value;

		if (username.trim() == '' && password.trim() == '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Username dan password harus diisi!'
			});
			return false; // Prevent form submission
		}

		if (username.trim() == '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Username harus diisi!'
			});
			return false; // Prevent form submission
		}

		if (password.trim() == '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Password harus diisi!'
			});
			return false; // Prevent form submission
		}

		if (password.length < 6) {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Password minimal 6 karakter!'
			});
			return false; // Prevent form submission
		}

		return true; // Allow form submission
	}

	// Show alert if login fails
	<?php if ($this->session->flashdata('login_error')) : ?>
		Swal.fire({
			icon: 'error',
			title: 'Login Gagal',
			text: 'Username atau password salah. Silakan coba lagi.'
		});
	<?php endif; ?>
</script>
</body>

</html>