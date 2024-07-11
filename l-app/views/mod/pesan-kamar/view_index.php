<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item">Pesan Prasarana</a>
					</div>
					<h4 class="pd-0 mg-0 tx-20">Pesan Prasarana</h4>
				</div>
			</div>
		</div>
		<div class="mg-t-15">
			
		</div>
	</div>
	
	<div class="card">
		<div class="table-responsive">
			<div class="card-body">
                <div class="box-body">
                    <div class="row">
                        <?php foreach ($unker as $row) { 
                        $query = $this->db->query('SELECT * FROM t_room_kategori
                        WHERE unker_id='.$row['unker_id'].' ORDER BY kategori_nama ASC');
                        $result = $query->result_array();    
                        ?>
                        <div class="col-sm-12">
                            <div class="card card-body ht-lg-200 mb-4 mt-4">
                                <div class="media">
                                    <span class="tx-color-04"><img src="http://localhost/pupr/l-content/themes/backend/images/logo-kecil.png" alt=""></span>
                                    <div class="media-body mg-l-20">
                                        <h6 class="mg-b-10 text-uppercase">Prasarana</h6>
                                        <p class="text-black mg-b-10"><?= $row['unker_nama'] ?></p>
                                        <?=html_entity_decode($row['unker_alamat']);?>
  
                                        <?php foreach ($result as $kat) { ?>
                                            <button type="button" class="btn btn-lg pd-x-15 btn-<?=$kat['kategori_warna']?> btn-uppercase" onclick="window.location='<?=admin_url($this->mod.'/pesan/'.$kat['kategori_id']);?>'"><i class="fa fa-bed mr-2"></i><?= $kat['kategori_nama'] ?></button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-lg pd-x-15 btn-warning btn-uppercase" onclick="window.location='<?=admin_url($this->mod.'/pesan-smr/'.$row['unker_id']);?>'"><i class="fa fa-university mr-2"></i>Smart Meeting Room</button>
                                        <button type="button" class="btn btn-lg pd-x-15 btn-dark btn-uppercase" onclick="window.location='<?=admin_url($this->mod.'/pesan-csr/'.$row['unker_id']);?>'"><i class="fa fa-graduation-cap mr-2"></i>Class Smart Room</button>
                            
                                        
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