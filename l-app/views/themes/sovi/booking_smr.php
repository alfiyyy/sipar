<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- navigasi untuk kategori gambar -->
<div class="container cat pt-3">
    <div class="dropdown">
        <button style="max-width: 100%; white-space: normal;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Option
        </button>
        <div class="dropdown-menu dropdown-menu-scrollable" aria-labelledby="dropdownMenuButton">
            <a style="white-space: normal;" class="dropdown-item" href="#setba">Sekretariat Badan Pengembangan Sumber Daya Manusia</a>
            <a style="white-space: normal;" class="dropdown-item" href="#talenta">Pusat Pengembangan Talenta</a>
            <a style="white-space: normal;" class="dropdown-item" href="#sumberDayaAir">Pusat Pengembangan Kompetensi Sumber Daya Air dan Pemukiman</a>
            <a style="white-space: normal;" class="dropdown-item" href="#kompetensiJalan">Pusat Pengembangan Kompetensi Jalan, Perumahan, dan Pengembangan Infrastruktur Wilayah</a>
            <a style="white-space: normal;" class="dropdown-item" href="#kompetensiManajemen">Pusat Pengembangan Kompetensi Manajemen</a>
            <a style="white-space: normal;" class="dropdown-item" href="#PUPRMedan">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah I Medan</a>
            <a style="white-space: normal;" class="dropdown-item" href="#PUPRPalembang">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah II Palembang</a>
            <a style="white-space: normal;" class="dropdown-item" href="#PUPRJakarta">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah III Jakarta</a>
            <a style="white-space: normal;" class="dropdown-item" href="#PUPRBandung">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah IV Bandung</a>
            <a style="white-space: normal;" class="dropdown-item" href="#PUPRSurabaya">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah VI Surabaya</a>
            <a style="white-space: normal;" class="dropdown-item" href="#PUPRBanjarmasin">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah VII Banjarmasin</a>
            <a style="white-space: normal;" class="dropdown-item" href="#PUPRMakassar">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah VIII Makassar</a>
            <a style="white-space: normal;" class="dropdown-item" href="#penilaianKompetensi">Balai Penilaian Kompetensi</a>
        </div>
    </div>
</div>

<!-- menampilkan gambar -->
<section id="setba" style="padding-top: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Sekretariat Badan Pengembangan Sumber Daya Manusia</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($setba_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="talenta" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Talenta</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($pengembanganKompentensiPUPR_Jakarta_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="sumberDayaAir" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Kompetensi Sumber Daya Air dan Pemukiman</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($sumberDayaAir_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="kompetensiJalan" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Kompetensi Jalan, Perumahan, dan Pengembangan Infrastruktur Wilayah</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($pengembanganKompentensiJalan_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="kompetensiManajemen" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Kompetensi Manajemen</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($pengembanganKompentensiManajemen_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="PUPRMedan" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah I Medan</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($pengembanganKompentensiPUPR_Medan_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="PUPRPalembang" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah II Palembang</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($pengembanganKompentensiPUPR_Palembang_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="PUPRJakarta" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah III Jakarta</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($pengembanganKompentensiPUPR_Jakarta_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="PUPRBandung" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah IV Bandung</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($pengembanganKompentensiPUPR_Bandung_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="PUPRSurabaya" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah V Surabaya</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($pengembanganKompentensiPUPR_Surabaya_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="PUPRBanjarmasin" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah VI Banjarmasin</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($pengembanganKompentensiPUPR_Banjarmasin_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="PUPRMakassar" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Pusat Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah VII Makassar</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($pengembanganKompentensiPUPR_Makassar_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="penilaianKompetensi" style="padding-bottom: 2rem;" class="section-container">
	<div class="card-container row d-flex align-items-center">
		<div class="col-md-6 p-3 text-center">
			<h3 style="padding: 0;">Balai Penilaian Kompetensi</h3>
		</div>
		<div class="image-container col-md-6">
			<?php
			foreach ($balaiPenilaianKompetensi_gallery as $res) :
			?>
				<div class="g-item">
					<a class="g-link" href="<?= post_images($res['image']) ?>" data-caption="<?= '<small><em>Smart Meeting Room : ' . $res['nama'] . '</em></small>' ?>" data-width="1200" data-height="900">
						<img class="p-2" height="200" src="<?= post_images($res['image'], 'medium', true) ?>" itemprop="thumbnail" alt="<?= $res['nama'] ?>" />
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>


<!-- untuk popup gambar ketika dipencet -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="pswp__bg"></div>
	<div class="pswp__scroll-wrap">
		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>
		<div class="pswp__ui pswp__ui--hidden">
			<div class="pswp__top-bar">
				<div class="pswp__counter"></div>
				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
				<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
						<div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div>
			</div>
			<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
			</button>
			<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
			</button>
			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>
		</div>
	</div>
</div>