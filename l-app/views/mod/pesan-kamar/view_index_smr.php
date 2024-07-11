<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item">Booking Smart Meeting Room</a>
					</div>
					<h4 class="pd-0 mg-0 tx-20">Booking Smart Meeting Room</h4>
				</div>
			</div>
		</div>
		<div class="mg-t-15">
        <button type="button" class="btn btn-lg pd-x-15 btn-dark btn-uppercase" onclick="window.location='<?=admin_url($this->mod);?>'"><i data-feather="arrow-left" class="mr-2"></i><?=lang_line('button_back');?></button>
		</div>
	</div>
	
	<div class="card">
        <div class="card">
            <div class="card-header">
                <h6 class="lh-5 mg-b-0">Pencarian Booking Smart Meeting Room</h6>
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
                        foreach ($smr as $row) { 
                        $query_trx = $this->db->query('SELECT * FROM t_booking_smr
                        WHERE smr_id="'.$row['smr_id'].'" AND (bs_tanggal_in BETWEEN "'.$tgl_in.'" AND "'.$tgl_out.'")');
                        $result_trx = $query_trx->row_array();
                        if($result_trx['bs_tanggal_in'] == NULL) {
                            $warna = 'success';
                        } else {
                            if($result_trx['bs_status'] == "Belum Disetujui") {
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
                                <a href="#" <?php if($warna=="danger")  {} elseif($warna=="success") { ?> onclick="onModalBookSmr(<?= $row['smr_id'] ?>)" <?php } else { } ?> data-toggle="modal"><div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-<?= $warna ?> tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded"><i class="fa fa-university"></i></div></a>
                                    <div class="media-body">
                                        <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8"><?= $row['smr_nama'] ?></h6>
                                        <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?= $row['smr_nomor'] ?></h4>
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
            <?=form_open_multipart('l-admin/pesan-kamar/addsmr');?>
			<div class="modal-header">
				<h5 class="modal-title">Booking Smart Meeting Room</h5>
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
                                <?php
                                if($peserta_id==NULL) {
                                    $this->cifire_alert->set($this->mod, 'info', 'Silahkan lengkapi Profil NIP anda di Profil');
                                    redirect(admin_url($this->mod_profile),'refresh');
                                } else {
                                    $qpeserta=$this->db->query('SELECT * FROM t_peserta
                                    WHERE peserta_nip='.$peserta_id);

                                    $cekpeserta = $qpeserta->num_rows();
                                    if($cekpeserta==0) {
                                        $nama_peserta = data_login('name');
                                        $data_isert = array(
                                            'peserta_nip' => $peserta_id,
                                            'peserta_nama' => $nama_peserta,
                                            'created_at' => date('Y-m-d H:i:s'),
                                        );
                    
                                        if ($this->peserta_model->insert($data_isert))
                                        {
                                            $qpesertainsert=$this->db->query('SELECT * FROM t_peserta
                                            WHERE peserta_nip='.$peserta_id);
                                            $rowpeserta = $qpesertainsert->row();
                                            if(isset($rowpeserta)) {
                                                echo '<input type="hidden" name="peserta_id" value="'.$rowpeserta->peserta_id.'" />';
                                                echo $rowpeserta->peserta_nip.'-'.$rowpeserta->peserta_nama;
                                            }
                                        } 
                                    } else {
                                        $rowpeserta = $qpeserta->row();
                                        if(isset($rowpeserta)) {
                                            echo '<input type="hidden" name="peserta_id" value="'.$rowpeserta->peserta_id.'" />';
                                            echo $rowpeserta->peserta_nip.'-'.$rowpeserta->peserta_nama;
                                        }
                                        
                                    }
                                }
                                
                                ?>
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
                                    <input id="date-picker" type="text" name="bs_tanggal_in" value="<?=date('Y-m-d');?>" class="form-control" placeholder="yyyy-mm-dd" required/>
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
                                <input type="text" name="bs_jml_hari" class="form-control" placeholder="Contoh : 2" require />
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Dokumen</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="upload-image" name="fupload"/>
                        <label class="custom-file-label" for="upload-image" browse-label="Buka File">Buka File</label>
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