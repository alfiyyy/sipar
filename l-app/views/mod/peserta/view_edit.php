<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_component');?></a>
						<a href="#" class="breadcrumb-item">Peserta</a>
						<a href="#" class="breadcrumb-item">Edit Data</a>
					</div>
					<h4 class="pd-0 mg-0 tx-20">Peserta</h4>
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
			<!-- input text | Peserta Nip -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Peserta Nip</label>
				<div class="col-md-10">
					<input type="text" name="peserta_nip" value="<?=$data_row['peserta_nip'];?>" class="form-control" />
				</div>
			</div>
			<!--/ input text | Peserta Nip -->
			<!-- input text | Peserta Nama -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Peserta Nama</label>
				<div class="col-md-10">
					<input type="text" name="peserta_nama" value="<?=$data_row['peserta_nama'];?>" class="form-control" />
				</div>
			</div>
			<!--/ input text | Peserta Nama -->
			<!-- input datetime | Created At -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Created At</label>
				<div class="col-md-10">
					<div class="input-group" style="max-width:250px;">
						<input id="datetime-picker" type="text" name="created_at" value="<?=$data_row['created_at'];?>" class="form-control" placeholder="yyyy-mm-dd HH:ii:ss" required/>
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<!--/ input datetime | Created At -->
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