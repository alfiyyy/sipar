<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_component');?></a>
						<a href="#" class="breadcrumb-item">Room Kategori</a>
						<a href="#" class="breadcrumb-item">Add Data</a>
					</div>
					<h4 class="pd-0 mg-0 tx-20">Room Kategori</h4>
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
			<!-- unker -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Unker ID <span class="text-danger">*</span></label>
				<div class="col-md-10">
					<select name="unker_id" class="select2 form-control" data-placeholder="Unit Kerja">
						<?php
							foreach ($all_unker as $unker) {
									$selected = ($unker['unker_id']=='1'?'selected':'');
								echo '<option value="'.$unker['unker_id'].'" '.$selected.'>'.$unker['unker_nama'].'</option>';
							}
						?>
					</select>
				</div>
			</div>
			<!--/ input number | Unker Id -->
			<!-- input text | Kategori Nama -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Kategori Room</label>
				<div class="col-md-10">
					<input type="text" name="kategori_nama"  class="form-control" />
				</div>
			</div>
			<!--/ input text | Kategori Nama -->
			<!-- textarea TinyMCE | Kategori Deskripsi -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Deskripsi</label>
				<div class="col-md-10">
					<textarea id="textarea-tinymce" name="kategori_deskripsi" class="form-control"></textarea>
				</div>
			</div>
			<!--/ textarea TinyMCE | Kategori Deskripsi -->
			<!-- input browse filemanager | Kategori Image -->
			<div class="form-group row">
				<label class="col-form-label col-md-2">Kategori Image</label>
				<div class="col-md-10">
					<div class="input-group" style="max-width:400px;">
						<div class="input-group-prepend">
							<button type="button" id="browse-filemanager" href="<?=content_url('plugins/filemanager/dialog.php?type=1&relative_url=1&field_id=pictures&sort_by=date&descending=1&akey='.fmkey());?>" class="btn btn-default">Browse</button>
						</div>
						<input id="prv" type="text"  class="form-control" placeholder="Choose file..." readonly />
					</div>
					<input id="pictures" type="hidden" name="kategori_image"  class="form-control" />
				</div>
			</div>
			<!-- input browse filemanager | Kategori Image -->
			</div> <!-- card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
			</div>
		<?=form_close();?>
	</div> <!-- card -->
</div> <!-- page-inner -->