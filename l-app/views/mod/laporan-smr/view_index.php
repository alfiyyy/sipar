<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-inner">
	<div class="d-sm-flex align-items-center justify-content-between pd-b-20">
		<div class="pageheader pd-t-20 pd-b-0">
			<div class="d-flex justify-content-between">
				<div class="clearfix">
					<div class="breadcrumb pd-0 pd-b-10 mg-0">
						<a href="#" class="breadcrumb-item"><?=lang_line('ui_dashboard');?></a>
						<a href="#" class="breadcrumb-item">Laporan</a>
					</div>
					<h4 class="pd-0 mg-0 tx-20">Laporan Smart Meeting Room</h4>
				</div>
			</div>
		</div>
	</div>

	<div>
		<?=$this->cifire_alert->show($this->mod);?>
		<div class="ajax_alert" style="display:none;"></div>
	</div>
	
	<div class="card">
        <div class="card">
            <div class="card-header">
                <h6 class="lh-5 mg-b-0">Filter Berdasarkan Bulan</h6>
            </div>
            <?php 
                echo form_open('','autocomplete="off" class="form-bordered"');
                echo form_hidden('aksi', 'cari');
            ?>
            <div class="card-body">

                <!-- input datetime | Br Tanggal In -->
                <div class="row">
                    
                    <div class="col-md-3">
                    <label>Bulan</label>
                        <div class="input-group" style="max-width:200px;">
                            <select name="bulan" class="select2 form-control" data-placeholder="Bulan">
                                <?php
                                    echo '<option value="'.date('m').'">Bulan saat ini</option>';
                                    for($bln=1; $bln<=12; $bln++) {
                                        $bl = strlen($bln);
                                        if($bl=='1') {
                                            $blnval = "0".$bln;
                                        } else {
                                            $blnval = $bln;
                                        }
                                        if($bln==1) { $blncal="Januari"; }
                                        elseif($bln==2) { $blncal="Fabruari"; }
                                        elseif($bln==3) { $blncal="Maret"; }
                                        elseif($bln==4) { $blncal="April"; }
                                        elseif($bln==5) { $blncal="Mei"; }
                                        elseif($bln==6) { $blncal="Juni"; }
                                        elseif($bln==7) { $blncal="Juli"; }
                                        elseif($bln==8) { $blncal="Agustus"; }
                                        elseif($bln==9) { $blncal="September"; }
                                        elseif($bln==10) { $blncal="Oktober"; }
                                        elseif($bln==11) { $blncal="November"; }
                                        elseif($bln==12) { $blncal="Desember"; }

                                        echo '<option value="'.$blnval.'">'.$blncal.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <label>Tahun</label>
                        <div class="input-group" style="max-width:200px;">
                            <select name="tahun" class="select2 form-control" data-placeholder="Tahun">
                                <?php
                                    for($thn=2021; $thn<=2025; $thn++) {
                                        echo '<option value="'.$thn.'">'.$thn.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                   
                    <!-- <div class="col-md-4">
                        <label>Kategori</label>
                        <div class="input-group" style="max-width:250px;">
                            <select name="kategori" class="select2 form-control" data-placeholder="Tahun">
                                <?php
                                // foreach($kategori as $row) {
                                //         echo '<option value="'.$row['kategori_id'].'">'.$row['kategori_nama'].'</option>';
                                // }
                                ?>
                            </select>
                        </div>
                    </div> -->
                </div>

            </div> <!-- card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-lg btn-primary mr-2"><i class="cificon licon-send mr-2"></i><?=lang_line('button_submit');?></button>
            </div>
            <?=form_close();?>
        </div> <!-- card -->
		<div class="table-responsive">
			<div class="card-body">
				<table class="table table-hover table-striped table-bordered table-datatable">
					<thead>
                        <tr>
							<th>#</th>
							<th>SMR Nama</th>
							<th>No</th>
                            <?php for ($x=1; $x<=31; $x++) {
                                echo"<th style='width: 90px;'>".$x."</th>";
                            }
                            ?>
						</tr>
					</thead>
					<tbody>
                        <?php $no=1; foreach($smr as $row) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['smr_nama'] ?></td>
                            <td><?= $row['smr_nomor'] ?></td>
                            <?php for ($x=1; $x<=31; $x++) {
                                $y = $tahun;
                                $b = $bulan;
                                $tgl = strlen($x);
                                if($tgl=='1') {
                                    $tglval = "0".$x;
                                } else {
                                    $tglval = $x;
                                }

                                $tanggal_array = $y.'-'.$b.'-'.$tglval;
                                //echo $tanggal_array; die();

                                $query1 = $this->db->select('*')->from('t_booking_smr');
                                $query1 = $this->db->where('smr_id', $row['smr_id']);
                                $query1 = $this->db->where('bs_tanggal_in', $tanggal_array);
                                $query1 = $this->db->get();  
                                $result1 = $query1->num_rows();
                                if($result1==0) {
                                    echo"<th></th>";
                                } else {
                                    echo"<th><span style='color: green;'><i class='fa fa-check'></i></span></th>";
                                }
                                
                            }
                            ?>
                        </tr>
                        <?php
                        $no++; }
                        ?>
                        
                    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>