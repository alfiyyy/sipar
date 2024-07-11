<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- left content -->
<div class="col-lg-12 col-md-12 clearfix mb-5 left-content">
	<div class="post-head">
		<h4 class="pd-0 mg-0 tx-20 tx-dark tx-spacing--1">Formulir Permohonan</h4>
	</div>
	<div class="card mg-b-50">
		
			<?=form_open_multipart('','id="form_add_user" autocomplete="off"');?>
			<div class="card-body">
				<div class="row">

					<!-- Name -->
					<div class="col-md-6 col-lg-6">
						<div class="form-group">
							<label>Nama Lengkap <span class="text-danger">*</span></label>
							<input type="text" name="name" class="form-control"/>
						</div>
					</div>
					<!--/ Name -->

					<!-- Email -->
					<div class="col-md-6 col-lg-6">
						<div class="form-group">
							<label>Email <span class="text-danger">*</span></label>
							<input type="text" name="email" class="form-control" />
						</div>
					</div>
					<!--/ Email -->

					<!-- Name -->
					<div class="col-md-6 col-lg-6">
						<div class="form-group">
							<label>NIP / NIK <span class="text-danger">*</span></label>
							<input type="text" name="nip" class="form-control"/>
						</div>
					</div>
					<!--/ Name -->

					<!-- Name -->
					<div class="col-md-6 col-lg-6">
						<div class="form-group">
							<label>Asal Instansi <span class="text-danger">*</span></label>
							<input type="text" name="asal_instansi" class="form-control"/>
						</div>
					</div>
					<!--/ Name -->

					<!-- Address -->
					<div class="col-md-6">
						<div class="form-group">
							<label>Alamat</label>
							<textarea name="address" class="form-control" rows="5"></textarea>
						</div>
					</div>
					<!--/ Address -->

					<!-- Telephone -->
					<div class="col-md-6 col-lg-6">
						<div class="form-group">
							<label>Telepon</label>
							<input type="text" name="tlpn" class="form-control"/>
						</div>
					</div>
					<!--/ Telephone -->

					
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-lg btn-primary submit_add"><i id="submit_icon" class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
			</div>
			<?=form_close();?>
		</div>

	</div>
</div>
<!--/ left content -->

<!-- sidebar -->
<!-- <div class="col-lg-4 col-md-12 clearfix mb-5 sidebar">
	<?php // $this->CI->_layout('sidebar'); ?>
</div> -->
<!--/ sidebar -->
