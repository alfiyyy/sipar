<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-05 | 08:29
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_smr extends Backend_Controller {
	
	public $mod = 'booking-smr';
	public $mod_rowayat = 'riwayat-booking-smr';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/booking_smr_model");
		$this->load->model("mod/peserta_model");
		$this->meta_title("Booking Smart Meeting Room");
		
	}

	public function index()
	{
		if($this->role->i('read'))
		{
			$id_user = data_login('id');
			$query = $this->db->query('SELECT unker_id, unker_nama FROM t_unit_kerja
			WHERE id_user='.$id_user);
			$result = $query->row();

			

			if(isset($result)) {
				$id_data = $result->unker_id;
				$unker = $result->unker_nama;
			} 

			$this->vars['penyelenggara_id'] = data_login('id');
			$aksi = $this->input->post('aksi');
			if($aksi == "cari") {
				$this->vars['tgl_in'] = $this->input->post('tgl_dari');
				$this->vars['tgl_out'] = $this->input->post('tgl_sampai');
			} else {
				$this->vars['tgl_in'] = $tgl_in = date("Y-m-d");
				$this->vars['tgl_out'] = $tgl_in = date("Y-m-d");
			}

			$query1 = $this->db->query('SELECT * FROM t_smr
			WHERE unker_id='.$id_data);
			$result1 = $query1->result_array();
			$this->vars['all_peserta'] = $this->peserta_model->get_all_peserta();

			$this->vars['smr'] = $result1;
			$this->render_view('view_index_smr', $this->vars);
		}
	}


	public function add()
	{
		if ($this->role->i('write') ) 
		{
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'unker_id',
					'label' => 'Unker ID',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'smr_id',
					'label' => 'SMR Id',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'peserta_id',
					'label' => 'User Id',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'bs_tanggal_in',
					'label' => 'Tanggal In',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'bs_jml_hari',
					'label' => 'Lama Meginap',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'bs_dokumen',
					'label' => 'Dokumen',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{

					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'smr_id' => xss_filter($this->input->post('smr_id')),
						'peserta_id' => xss_filter($this->input->post('peserta_id')),
						'bs_tanggal_in' => xss_filter($this->input->post('bs_tanggal_in')),
						'bs_jml_hari' => xss_filter($this->input->post('bs_jml_hari')),
						'bs_dokumen' => xss_filter($this->input->post('bs_dokumen')),
						'bs_status' => 'Disetujui',
						'penyelenggara_id' => data_login('id'),
						'created_at' => date('Y-m-d H:i:s'),
					);
					for ($x = 0; $x < $this->input->post('bs_jml_hari'); $x++) {
						if ($x == $this->input->post('bs_jml_hari')) {
							
							break;
						}
						$data_isert = array(
							'unker_id' => xss_filter($this->input->post('unker_id')),
							'smr_id' => xss_filter($this->input->post('smr_id')),
							'peserta_id' => xss_filter($this->input->post('peserta_id')),
							'bs_tanggal_in' => manipulasiTanggal($this->input->post('bs_tanggal_in'), $x, 'days'),
							'bs_jml_hari' => '1',
							'bs_dokumen' => xss_filter($this->input->post('bs_dokumen')),
							'bs_status' => 'Disetujui',
							'penyelenggara_id' => data_login('id'),
							'created_at' => date('Y-m-d H:i:s'),
						);
						$this->booking_smr_model->insert($data_isert);
						//echo $data_isert;
						

					}
					$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
					redirect(admin_url($this->mod),'refresh');
					// die();
					// if ($this->booking_smr_model->insert($data_isert))
					// {
					// 	$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
					// 	redirect(admin_url($this->mod.'/pesan/'. $this->input->post('unker_id')),'refresh');
					// }
					// else
					// {
					// 	$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
					// }
				}
			}
			else
			{
				$this->render_view('view_add');
			}
		}
		else
		{
			$this->render_403();
		}
	}


	
} // End Class.