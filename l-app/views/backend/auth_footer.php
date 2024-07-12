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
			if (currentPath === linkPath+"/login") {
				link.classList.add('active');
			}
		});
	}

	// Call the function on page load
	document.addEventListener('DOMContentLoaded', setActiveNavLink);
</script>
</body>

</html>