<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item">Booking Smart Class Room</a>
					</div>
					<h4 class="pd-0 mg-0 tx-20">Booking Smart Class Room</h4>
				</div>
			</div>
		</div>
		<div class="mg-t-15">
			
		</div>
	</div>
	
	<div class="card">
        <div class="card">
            <div class="card-header">
                <h6 class="lh-5 mg-b-0">Pencarian Booking Smart Class Room</h6>
            </div>
            <?php 
                echo form_open('','autocomplete="off" class="form-bordered"');
                echo form_hidden('aksi', 'cari');
            ?>
            <div class="card-body">

                <!-- input datetime | Br Tanggal In -->
                <div class="row">
                    <label class="col-form-label col-md-1">Dari</label>
                    <div class="col-md-5">
                        <div class="input-group" style="max-width:250px;">
                            <input id="date-picker1" type="text" name="tgl_dari" value="<?= $tgl_in ?>" class="form-control" placeholder="yyyy-mm-dd" required/>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <label class="col-form-label col-md-1">Sampai</label>
                    <div class="col-md-5">
                        <div class="input-group" style="max-width:250px;">
                            <input id="date-picker2" type="text" name="tgl_sampai" value="<?= $tgl_out ?>" class="form-control" placeholder="yyyy-mm-dd" required/>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
            </div>
            <?=form_close();?>
        </div> <!-- card -->
		<div class="table-responsive">
			<div class="card-body">
            
                <div class="box-body">
                    <div class="row">
                        <?php 
                        foreach ($csr as $row) { 
                        $query_trx = $this->db->query('SELECT * FROM t_booking_csr
                        WHERE csr_id="'.$row['csr_id'].'" AND (bc_tanggal_in BETWEEN "'.$tgl_in.'" AND "'.$tgl_out.'")');
                        $result_trx = $query_trx->row_array();
                        if($result_trx['bc_tanggal_in'] == NULL) {
                            $warna = 'success';
                        } else {
                            if($result_trx['bc_status'] == "Belum Disetujui") {
                                $warna = 'primary';
                            } else {
                                $warna = 'danger';
                            }
                        }
                        //var_dump($result_trx);
                        ?>
                        <div class="col-sm-6 col-md-3 mb-3">
                            <div class="card card-body">
                                <div class="media">
                                    <a href="#" <?php if($warna=="danger")  {} elseif($warna=="success") { ?> onclick="onModalBook(<?= $row['csr_id'] ?>)" <?php } else { ?> onclick="window.location='<?=admin_url('riwayat-csr');?>'" <?php } ?> data-toggle="modal"><div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-<?= $warna ?> tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded"><i class="fa fa-graduation-cap"></i></div></a>
                                    <div class="media-body">
                                        <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8"><?= $row['csr_nama'] ?></h6>
                                        <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?= $row['csr_nomor'] ?></h4>
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

<div id="modal_booking" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
            <?=form_open('l-admin/booking-csr/add');?>
			<div class="modal-header">
				<h5 class="modal-title">Booking Smart Class Room</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
                <div id="cdet"></div>
                <div id="formhidden"></div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label>Peserta <span class="text-danger">*</span></label>
                            <div>
                                <select name="peserta_id" id="select2peserta" class="form-control" data-placeholder="Peserta">
                                    <?php
                                        foreach ($all_peserta as $row) {
                                            echo '<option value="'.$row['peserta_id'].'">'.$row['peserta_nip'].' - '.$row['peserta_nama'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label>&nbsp;</label>
                        <div class="form-group">
                            <div id="tomboltambahpeserta">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Book</label>
                            <div>
                                <div class="input-group" style="max-width:250px;">
                                    <input id="date-picker" type="text" name="bc_tanggal_in" value="<?=date('Y-m-d');?>" class="form-control" placeholder="yyyy-mm-dd" required/>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Lama Booking</label>
                            <div>
                                <input type="text" name="bc_jml_hari" class="form-control" placeholder="Contoh : 2" require />
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label>Dokumen</label>
                    <div>
                        <div class="input-group" style="max-width:100%;">
                            <div class="input-group-prepend">
                                <button type="button" id="browse-filemanager" href="<?=content_url('plugins/filemanager/dialog.php?type=0&relative_url=1&field_id=pictures&fldr=dokumen/'.data_login('username').'/&sort_by=date&descending=1&akey='.fmkey());?>" class="btn btn-default">Browse</button>
                            </div>
                            <input id="prv" type="text"  class="form-control" placeholder="Choose file..." readonly />
                        </div>
                        <input id="pictures" type="hidden" name="bc_dokumen"  class="form-control" />
                    </div>
                </div>
                <div id="footerbook"></div>
                
			</div>
			
			<?=form_close();?>
		</div>
	</div>
</div>

<div id="modal_peserta" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
            <?=form_open('l-admin/peserta/addfrompenyelenggara');?>
			<div class="modal-header">
				<h5 class="modal-title">Tambah Peserta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>NIP/NIK</label>
                            <div>
                                <input type="text" name="peserta_nip" class="form-control" placeholder="NIP" require />
                                <div id="kategori_show"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Peserta</label>
                            <div>
                                <input type="text" name="peserta_nama" class="form-control" placeholder="Nama Peserta" require />
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