<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_component');?></a>
						<a href="#" class="breadcrumb-item">Booking Kamar</a>
						<a href="#" class="breadcrumb-item">Add Data</a>
					</div>
					<h4 class="pd-0 mg-0 tx-20">Booking Kamar</h4>
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
			<h6 class="lh-5 mg-b-0">Add Data</h6>
		</div>
		<?php 
			echo form_open('','autocomplete="off" class="form-bordered"');
			echo form_hidden('act', 'add');
		?>
		<div class="card-body">
			<!-- input number | Kategori Id -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Kategori Id</label>
				<div class="col-md-10">
					<input type="number" name="kategori_id"  class="form-control" required />
				</div>
			</div>
			<!--/ input number | Kategori Id -->
			<!-- input number | Room Id -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Room Id</label>
				<div class="col-md-10">
					<input type="number" name="room_id"  class="form-control" required />
				</div>
			</div>
			<!--/ input number | Room Id -->
			<!-- input number | User Id -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">User Id</label>
				<div class="col-md-10">
					<input type="number" name="peserta_id"  class="form-control" required />
				</div>
			</div>
			<!--/ input number | User Id -->
			<!-- input datetime | Br Tanggal In -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Br Tanggal In</label>
				<div class="col-md-10">
					<div class="input-group" style="max-width:250px;">
						<input id="datetime-picker" type="text" name="br_tanggal_in" value="<?=date('Y-m-d HH:ii:ss');?>" class="form-control" placeholder="yyyy-mm-dd HH:ii:ss" required/>
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<!--/ input datetime | Br Tanggal In -->
			<!-- input datetime | Br Tanggal Out -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Br Tanggal Out</label>
				<div class="col-md-10">
					<div class="input-group" style="max-width:250px;">
						<input id="datetime-picker" type="text" name="br_tanggal_out" value="<?=date('Y-m-d HH:ii:ss');?>" class="form-control" placeholder="yyyy-mm-dd HH:ii:ss" required/>
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<!--/ input datetime | Br Tanggal Out -->
			<!-- input browse filemanager | Br Dokumen -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Br Dokumen</label>
				<div class="col-md-10">
					<div class="input-group" style="max-width:400px;">
						<div class="input-group-prepend">
							<button type="button" id="browse-filemanager" href="<?=content_url('plugins/filemanager/dialog.php?type=1&relative_url=1&field_id=pictures&sort_by=date&descending=1&akey='.fmkey());?>" class="btn btn-default">Browse</button>
						</div>
						<input id="prv" type="text"  class="form-control" placeholder="Choose file..." readonly />
					</div>
					<input id="pictures" type="hidden" name="br_dokumen"  class="form-control" />
				</div>
			</div>
			<!-- input browse filemanager | Br Dokumen -->
			<!-- input number | Penyelenggara Id -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Penyelenggara Id</label>
				<div class="col-md-10">
					<input type="number" name="penyelenggara_id"  class="form-control" required />
				</div>
			</div>
			<!--/ input number | Penyelenggara Id -->
			<!-- input datetime | Created At -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Created At</label>
				<div class="col-md-10">
					<div class="input-group" style="max-width:250px;">
						<input id="datetime-picker" type="text" name="created_at" value="<?=date('Y-m-d HH:ii:ss');?>" class="form-control" placeholder="yyyy-mm-dd HH:ii:ss" required/>
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
						<input id="datetime-picker" type="text" name="updated_at" value="<?=date('Y-m-d HH:ii:ss');?>" class="form-control" placeholder="yyyy-mm-dd HH:ii:ss" required/>
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
			</div>
			<!--/ input datetime | Updated At -->
			</div> <!-- card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
			</div>
		<?=form_close();?>
	</div> <!-- card -->
</div> <!-- page-inner -->