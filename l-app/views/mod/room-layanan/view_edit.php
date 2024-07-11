<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_component');?></a>
						<a href="#" class="breadcrumb-item">Room Layanan</a>
						<a href="#" class="breadcrumb-item">Edit Data</a>
					</div>
					<h4 class="pd-0 mg-0 tx-20">Room Layanan</h4>
				</div>
			</div>
		</div>
		<div class="mg-t-15">
			<button type="button" class="btn btn-md pd-x-15 btn-white btn-uppercase" onclick="window.location='<?=admin_url($this->mod);?>'"><i data-feather="arrow-left" class="mr-2"></i><?=lang_line('button_back');?></button>
		</div>
	</div>

	<div>
		<?=$this->cifire_alert->show($this->mod);?>
		<div class="ajax_alert" style="display:none;"></div>
	</div>

	<div class="card">
		<div class="card-header">
			<h6 class="lh-5 mg-b-0">Edit Data</h6>
		</div>
		<?php 
			echo form_open('','autocomplete="off"');
			echo form_hidden('act', '1');
		?>
		<div class="card-body">
			<!-- input number | Kategori Id -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Kategori Id</label>
				<div class="col-md-10">
					<input type="number" name="kategori_id" value="<?=$data_row['kategori_id'];?>" class="form-control" required />
				</div>
			</div>
			<!--/ input number | Kategori Id -->
			<!-- input text | Rl Nama -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Rl Nama</label>
				<div class="col-md-10">
					<input type="text" name="rl_nama" value="<?=$data_row['rl_nama'];?>" class="form-control" />
				</div>
			</div>
			<!--/ input text | Rl Nama -->
			<!-- input number | Rl Harga -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Rl Harga</label>
				<div class="col-md-10">
					<input type="number" name="rl_harga" value="<?=$data_row['rl_harga'];?>" class="form-control" required />
				</div>
			</div>
			<!--/ input number | Rl Harga -->
			<!-- input datetime | Updated At -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Updated At</label>
				<div class="col-md-10">
					<div class="input-group" style="max-width:250px;">
						<input id="datetime-picker" type="text" name="updated_at" value="<?=$data_row['updated_at'];?>" class="form-control" placeholder="yyyy-mm-dd HH:ii:ss" required/>
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<!--/ input datetime | Updated At -->
			</div> <!-- card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-save mr-2"></i><?=lang_line('button_save');?></button>
			</div>
		<?=form_close();?>
	</div> <!-- card -->
</div> <!-- page-inner -->