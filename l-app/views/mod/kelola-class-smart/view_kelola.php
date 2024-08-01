<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-inner p-settings mg-b-70">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
                    <div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item">Kelola Class Smart Room</a>
					</div>
					<h4 class="pd-0 mg-0 tx-15"><?= $unker_nama ?></h4>
				</div>
			</div>
		</div>
		<div class="mg-t-15">
            
		</div>
	</div>

	<?=$this->cifire_alert->show($this->mod);?>

	<ul class="nav nav-tabs nav-justified" role="tablist">
		<li class="nav-item">
			<a href="#Tab-Kamar" class="nav-link tx-medium active" data-toggle="tab" style="color:#1b2e4b;">Class Smart Room</a>
		</li>
		<li class="nav-item">
			<a href="#Tab-Fasilitas" class="nav-link tx-medium" data-toggle="tab" style="color:#1b2e4b;">Fasilitas</a>
		</li>
		<li class="nav-item">
			<a href="#Tab-Gambar" class="nav-link tx-medium" data-toggle="tab" style="color:#1b2e4b;">Gambar</a>
		</li>
		<li class="nav-item">
			<a href="#Tab-Layanan" class="nav-link tx-medium" data-toggle="tab" style="color:#1b2e4b;">Layanan</a>
		</li>
	</ul>

	<div class="tab-content bd bd-gray-400 bd-t-0 pd-20 bg-white">

		<div id="Tab-Kamar" class="tab-pane active">
            <div class="col-md-12">
				<div class="row">
                    <div class="col-md-8">
                        <div class="box-body">
							<div class="row">
								<?php foreach ($content_kamar as $row) { ?>
									<div id="class-item<?=$row->csr_id;?>" class="col-sm-6 col-md-6 mb-4">
										<div style="padding-inline-end: 35px;" class="card card-body">
											<div class="btn-group mt-1 gbhs2" style="position: absolute; top: 0; right: 9px;">
												<button class="btn btn-xs btn-danger delete_gambar_class" data-id="<?=encrypt($row->csr_id);?>"><i class="fa fa-times"></i></button>
											</div>
											<div class="media">
												<a href="?edit=yes&csr_id=<?= $row->csr_id ?>"><div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-success tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded"><i class="fa fa-bed"></i></div></a>
												<div class="media-body">
													<h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8"><?= $row->csr_nama ?></h6>
													<h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?= $row->csr_nomor ?></h4>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
                        </div>
                    </div>
					<?php if (isset($_GET['edit']) =="yes") { 
						$rid = $_GET['csr_id'];
					?>
					<div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-success">
                                <h6 class="lh-5 mg-b-0 text-white">Edit CSR</h6>
                            </div>
                            <?php 
								$queryRID = $this->db->where('csr_id', $rid)->get('t_csr');
								$resultRID = $queryRID->row();
								//var_dump($resultRID);
						
                                echo form_open('','autocomplete="off" class="form-bordered"');
                                //echo form_hidden('act', '1');
								echo form_hidden('aksi', 'kamar-update');
                            ?>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Nama CSR</label>
                                        <input type="hidden" name="unker_id"  class="form-control" value="<?= $unker_id ?>" />
										<input type="hidden" name="csr_id"  class="form-control" value="<?= $resultRID->csr_id ?>" />
                                        <input type="text" name="csr_nama" value="<?= $resultRID->csr_nama ?>"  class="form-control" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nomor CSR</label>
										<input type="text" name="csr_nomor" value="<?= $resultRID->csr_nomor ?>" class="form-control" />
                                    </div>
									<div class="form-group mb-3">
                                        <label>Kapasitas Orang</label>
										<input type="text" name="csr_kapasitas" value="<?= $resultRID->csr_kapasitas ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="card-footer">
									<div class="row">
										<div class="col-md-4">
											<button type="submit" class="btn btn-lg btn-success mr-2"><i class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
										</div>
										<div class="col-md-8">
											<a href="../kelola/" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-plus mr-2"></i>Tambah Baru</a>
										</div>
									</div>
                                    
									
                                </div>
                            <?=form_close();?>
                        </div>
                    </div>
					<?php } else { ?>
					<div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h6 class="lh-5 mg-b-0 text-white">Tambah CSR</h6>
                            </div>
                            <?php 
                                echo form_open('','autocomplete="off" class="form-bordered"');
                                echo form_hidden('act', 'add');
								echo form_hidden('aksi', 'kamar');
                            ?>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Nama CSR</label>
                                        <input type="hidden" name="unker_id"  class="form-control" value="<?= $unker_id ?>" />
                                        <input type="text" name="csr_nama"  class="form-control" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nomor CSR</label>
										<input type="text" name="csr_nomor"  class="form-control" />
                                    </div>
									<div class="form-group mb-3">
                                        <label>Kapasitas Orang</label>
										<input type="text" name="csr_kapasitas"  class="form-control" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
                                </div>
                            <?=form_close();?>
                        </div>
                    </div>
					<?php } ?>
                    
                </div>
            </div>
		</div>

		<div id="Tab-Fasilitas" class="tab-pane">
			<div class="col-md-12">
				<div class="row">
                    <div class="col-md-8">
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover mb-0">
									<tr>
										<th width="30px">No</th>
										<th width="80px">Icon</th>
										<th>Fasilitas</th>
										<th width="80px">Aksi</th>
									</tr>
									<?php $no=1; foreach ($content_fasilitas as $row) { ?>
									<tr id="fasilitas-item<?=$row->csrf_id;?>">
										<td><?= $no ?></td>
										<td><i class="fa fa-<?= $row->csrf_icon ?>"></i></td>
										<td><?= $row->csrf_nama ?></td>
										<td><button class="btn btn-xs btn-danger delete_fasilitas_class" data-id="<?=encrypt($row->csrf_id);?>"><i class="cificon licon-trash-2"></i></button></td>
									</tr>
									<?php $no++; } ?>
								</table>
							</div>
						</div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="lh-5 mg-b-0">Tambah Fasilitas</h6>
                            </div>
                            <?php 
                                echo form_open('','autocomplete="off" class="form-bordered"');
                                echo form_hidden('act', 'add');
								echo form_hidden('aksi', 'fasilitas');
                            ?>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Nama Fasilitas</label>
                                        <input type="hidden" name="unker_id"  class="form-control" value="<?= $unker_id ?>" />
                                        <input type="text" name="csrf_nama"  class="form-control" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Icon</label>
										<select name="csrf_icon" class="select2 form-control" style="max-width:400px;" required>
											<option value="" style="display:none;">- Select -</option>
											<option value="tv">Televisi</option>
											<option value="snowflake-o">AC</option>
											<option value="bus">Transportasi</option>
											<option value="microphone">Karoke</option>
											<option value="bed">Kasur</option>
											<option value="heat">Air Panas</option>
										</select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
                                </div>
                            <?=form_close();?>
                        </div>
                    </div>
                </div>
            </div>
		</div>

		<div id="Tab-Gambar" class="tab-pane fadeX showX ">
			<div class="col-md-12">
				<div class="row">
                    <div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<h6 class="lh-5 mg-b-0 text-uppercaseX"><i class="icon-images2 mr-2 tx-gray-600"></i> Dukungan Gambar </h6>
							</div>
							<div class="card-body">
								<?php if (!$content_gambar) echo "<p class='text-center'>No data</p>"; ?>
								<div class="row" style="margin-top:-15px;">
									<?php 
										foreach ($content_gambar as $res):
											$src_imgs = post_images($res['csrg_image'], '', TRUE);
											$thumb = post_images($res['csrg_image'], 'thumb', TRUE);
									?>
									<div id="gallery-item<?=$res['csrg_id'];?>" class="col-sm-6 col-md-4 col-lg-3 mt-3 gbhs">
										<div class="card item-gal">
											<div class="pd-6 text-center">
												<style type="text/css">.gbhs2{position: absolute; right:6px; top: 0; } </style>
												<div class="btn-group mt-1 gbhs2" style="">
													<button class="btn btn-xs btn-danger delete_gallery_class" data-id="<?=encrypt($res['csrg_id']);?>"><i class="fa fa-times"></i></button>
												</div>
												<div class="theme-img-card mb-2">
													<a class="fancybox" data-fancybox-group="gallery" title="<?=$res['csrg_image'];?>" href="<?=$src_imgs;?>">
														<img src="<?=$thumb;?>" data-src="<?=$thumb;?>" class="lazy" style="width:100%;">
													</a>
												</div>
												<div><?=$res['csrg_image'];?></div>
											</div>
										</div>
									</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="lh-5 mg-b-0">Tambah Gambar</h6>
                            </div>
                            <?php 
                                echo form_open('','autocomplete="off" class="form-bordered"');
                                echo form_hidden('act', 'add');
								echo form_hidden('aksi', 'gambar');
                            ?>
                                <div class="card-body">
									<div class="form-group mb-3">
										<label>Images</label>
										<div class="col-md-10">
											<div class="input-group" style="max-width:400px;">
												<div class="input-group-prepend">
													<button type="button" id="browse-filemanager" href="<?=content_url('plugins/filemanager/dialog.php?type=1&relative_url=1&field_id=pictures&sort_by=date&descending=1&akey='.fmkey());?>" class="btn btn-default">Browse</button>
												</div>
												<input id="prv" type="text"  class="form-control" placeholder="Choose file..." readonly />
											</div>
											<input id="pictures" type="hidden" name="csrg_image"  class="form-control" />
											<input type="hidden" name="unker_id"  class="form-control" value="<?= $unker_id ?>" />
										</div>
									</div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
                                </div>
                            <?=form_close();?>
                        </div>
                    </div>
                </div>
            </div>
		</div>

		<div id="Tab-Layanan" class="tab-pane fadeX showX ">
			<div class="col-md-12">
				<div class="row">
                    <div class="col-md-8">
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover mb-0">
									<tr>
										<th width="30px">No</th>
										<th>Layanan</th>
										<th width="80px">Harga</th>
										<th width="80px">Aksi</th>
									</tr>
									<?php $no=1; foreach ($content_layanan as $row) { ?>
									<tr id="layanan-item<?=$row->csrl_id;?>">
										<td><?= $no ?></td>
										<td><?= $row->csrl_nama ?></td>
										<td><?= $row->csrl_harga ?></td>
										<td style="text-align: center; vertical-align: middle;"><button class="btn btn-lg btn-danger delete_layanan_class" data-id="<?=encrypt($row->csrl_id);?>"><i class="cificon licon-trash-2"></i></button></td>
									</tr>
									<?php $no++; } ?>
								</table>
							</div>
						</div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="lh-5 mg-b-0">Tambah Layanan</h6>
                            </div>
                            <?php 
                                echo form_open('','autocomplete="off" class="form-bordered"');
                                echo form_hidden('act', 'add');
								echo form_hidden('aksi', 'layanan');
                            ?>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Nama Layanan</label>
                                        <input type="hidden" name="unker_id"  class="form-control" value="<?= $unker_id ?>" />
                                        <input type="text" name="csrl_nama"  class="form-control" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Harga</label>
										<input type="text" name="csrl_harga"  class="form-control" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
                                </div>
                            <?=form_close();?>
                        </div>
                    </div>
                </div>
            </div>
		</div>

	</div>
</div>