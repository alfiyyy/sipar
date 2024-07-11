<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item">Kelola Room Kategori</a>
					</div>
					<h4 class="pd-0 mg-0 tx-15">Unit Kerja <?= $unker->unker_nama ?></h4>
				</div>
			</div>
		</div>
		<div class="mg-t-15"> 
			<a href="#" onclick="onModalTambahKategori(<?= $kategori_id ?>)" data-toggle="modal" data-dismiss="modal" class="btn btn-lg pd-x-15 btn-info btn-uppercase"><i class="cificon licon-plus"></i></a>
            <button type="button" class="btn btn-lg pd-x-15 btn-dark btn-uppercase" onclick="window.location='<?=admin_url($this->mod);?>'"><i data-feather="arrow-left" class="mr-2"></i><?=lang_line('button_back');?></button>
		</div>
	</div>

	<div>
		<?=$this->cifire_alert->show($this->mod);?>
		<div class="ajax_alert" style="display:none;"></div>
	</div>
	
	<div class="card">
		<div class="table-responsive">
			<div class="card-body">
				<table id="DataTableJoin" class="table table-striped table-bordered table-datatable">
					<thead>
						<tr>
							<th>No</th>
							<th>Kategori</th>
							<th>Tgl Buat</th>
							<th class="th-action text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>No</td>
							<td>Kategori</td>
							<td>Tgl Buat</td>
							<td>Action</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="modal_kategori" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
            <?=form_open('l-admin/room-kategori/addfrompenyelenggara');?>
			<div class="modal-header">
				<h5 class="modal-title">Tambah Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <div>
                                <input type="text" name="kategori_nama" class="form-control" placeholder="Nama Kategori" require />
                                <div id="kategori_show"></div>
								<input type="hidden" name="unker_id" value="<?= $unker->unker_id ?>" class="form-control" require />
                            </div>
                        </div>
                    </div>
					<div class="col-sm-6">
                        <div class="form-group">
                            <label>Warna Kategori</label>
                            <div>
								<select name="kategori_warna" class="form-control" data-placeholder="Kategori Warna">
									<option value="success">Hijau</option>
									<option value="primary">Biru</option>
									<option value="danger">Merah</option>
									<option value="warning">Kuning</option>
									<option value="info">Biru Muda</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <div>
								<textarea id="textarea-tinymce-katdes" name="kategori_deskripsi" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
					
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-md btn-primary mr-2"><i class="cificon licon-send mr-2"></i>Simpan</button>
                    <button type="button" class="btn btn-md btn-secondary ml-2" data-dismiss="modal">Keluar</button>
                </div>
                
			</div>
			
			<?=form_close();?>
		</div>
	</div>
</div>