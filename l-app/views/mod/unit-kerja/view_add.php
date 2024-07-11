<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_component');?></a>
						<a href="#" class="breadcrumb-item">Unit Kerja</a>
						<a href="#" class="breadcrumb-item">Add Data</a>
					</div>
					<h4 class="pd-0 mg-0 tx-20">Unit Kerja</h4>
				</div>
			</div>
		</div>
		<div class="mg-t-15">
			<button type="button" class="btn btn-lg pd-x-15 btn-info btn-uppercase" onclick="window.location='<?=admin_url($this->mod);?>'"><i data-feather="arrow-left" class="mr-2"></i><?=lang_line('button_back');?></button>
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
			<!-- input text | Unker Nama -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker Nama</label>
				<div class="col-md-10">
					<input type="text" name="unker_nama"  class="form-control" />
				</div>
			</div>
			<!--/ input text | Unker Nama -->
			<!-- input text | Unker Kepala -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker Kepala</label>
				<div class="col-md-10">
					<input type="text" name="unker_kepala"  class="form-control" />
				</div>
			</div>
			<!--/ input text | Unker Kepala -->
			<!-- textarea | Unker Alamat -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker Alamat</label>
				<div class="col-md-10">
					<textarea id="textarea-tinymce-alamat" name="unker_alamat" class="form-control"></textarea>
				</div>
			</div>
			<!--/ textarea | Unker Alamat -->
			<!-- input text | Unker Telp -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker Telp</label>
				<div class="col-md-10">
					<input type="text" name="unker_telp"  class="form-control" />
				</div>
			</div>
			<!--/ input text | Unker Telp -->
			<!-- input text | Unker Fax -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker Fax</label>
				<div class="col-md-10">
					<input type="text" name="unker_fax"  class="form-control" />
				</div>
			</div>
			<!--/ input text | Unker Fax -->
			<!-- input text | Unker Email -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker Email</label>
				<div class="col-md-10">
					<input type="text" name="unker_email"  class="form-control" />
				</div>
			</div>
			<!--/ input text | Unker Email -->
			<!-- textarea | Unker Deskripsi -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker Deskripsi</label>
				<div class="col-md-10">
					<textarea id="textarea-tinymce-deskripsi" name="unker_deskripsi" class="form-control"></textarea>
				</div>
			</div>
			<!--/ textarea | Unker Deskripsi -->

			<div class="form-group row">
				<label class="col-form-label col-md-2">Banner Depan</label>
				<div class="col-md-10">
					<div class="input-group" style="max-width:100%;">
                            <div class="input-group-prepend">
                                <button type="button" id="browse-filemanager" href="<?=content_url('plugins/filemanager/dialog.php?type=0&relative_url=1&field_id=pictures&fldr=dokumen/'.data_login('username').'/&sort_by=date&descending=1&akey='.fmkey());?>" class="btn btn-default">Browse</button>
                            </div>
                            <input id="prv" type="text"  class="form-control" placeholder="Choose file..." readonly />
                    </div>
                    <input id="pictures" type="hidden" name="unker_image"  class="form-control" />
				</div>
			</div>
			<!-- input text | Unker Lat -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker Lat</label>
				<div class="col-md-10">
					<input type="text" name="unker_lat"  class="form-control" />
				</div>
			</div>
			<!--/ input text | Unker Lat -->
			<!-- input text | Unker Long -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker Long</label>
				<div class="col-md-10">
					<input type="text" name="unker_long"  class="form-control" />
				</div>
			</div>
			<!--/ input text | Unker Long -->
			<!-- input select | Unker Status -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker Status</label>
				<div class="col-md-10">
					<select name="unker_status" class="form-control" style="max-width:400px;" required>
						<option value="" style="display:none;">- Select -</option><option value="Aktif">Aktif</option><option value="Tidak Aktif">Tidak Aktif</option>
					</select>
				</div>
			</div>
			</div> <!-- card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
			</div>
		<?=form_close();?>
	</div> <!-- card -->
</div> <!-- page-inner -->