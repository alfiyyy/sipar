<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item">Booking Kamar</a>
					</div>
					<h4 class="pd-0 mg-0 tx-20">Booking Kamar</h4>
				</div>
			</div>
		</div>
		<div class="mg-t-15">
			
		</div>
	</div>
	
	<div class="card">
		<div class="table-responsive">
			<div class="card-body">
                <div class="box-body">
                    <div class="row">
                        <?php foreach ($kategori as $row) { ?>
                        <div class="col-sm-6 col-md-6 mb-6">
                            <div class="card card-body">
                                <div class="media">
                                    <a href="booking-kamar/pesan/<?= $row['kategori_id'] ?>"><div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-<?= $row['kategori_warna'] ?> tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded"><i class="fa fa-bed"></i></div></a>
                                    <div class="media-body">
                                        <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8"><?= $row['kategori_nama'] ?></h6>
                                        <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?= $row['kategori_nama'] ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>