<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-05 | 08:29
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_kamar extends Backend_Controller {
	
	public $mod = 'booking-kamar';
	public $mod_rowayat = 'riwayat-booking';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/booking_kamar_model");
		$this->load->model("mod/peserta_model");
		$this->meta_title("Booking Kamar");
		
	}

	public function index()
	{
		if($this->role->i('read'))
		{
			$id_user = data_login('id');
			$query = $this->db->query('SELECT uk.id_user, rk.* FROM t_room_kategori rk
			LEFT JOIN t_unit_kerja uk ON rk.unker_id=uk.unker_id
			LEFT JOIN t_user u ON uk.id_user=u.id
			WHERE u.id='.$id_user);
			$result = $query->result_array();

			$this->vars['kategori'] = $result;
			$this->render_view('view_index_kategori', $this->vars);
		}
	}


	public function pesan($id_data)
	{
		if($this->role->i('read'))
		{
			$this->vars['penyelenggara_id'] = data_login('id');
			$aksi = $this->input->post('aksi');
			if($aksi == "cari") {
				$this->vars['tgl_in'] = $this->input->post('tgl_dari');
				$this->vars['tgl_out'] = $this->input->post('tgl_sampai');
			} else {
				$this->vars['tgl_in'] = $tgl_in = date("Y-m-d");
				$this->vars['tgl_out'] = $tgl_in = date("Y-m-d");
			}

			$query = $this->db->query('SELECT * FROM t_room
			WHERE kategori_id='.$id_data);
			$result = $query->result_array();
			$this->vars['all_peserta'] = $this->peserta_model->get_all_peserta();

			$this->vars['room'] = $result;
			$this->render_view('view_index_room', $this->vars);
		}
	}

	public function add()
	{
		if ($this->role->i('write') ) 
		{
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'kategori_id',
					'label' => 'Kategori Id',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'room_id',
					'label' => 'Room Id',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'peserta_id',
					'label' => 'User Id',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'br_tanggal_in',
					'label' => 'Tanggal In',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'br_jml_hari',
					'label' => 'Lama Meginap',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'br_dokumen',
					'label' => 'Dokumen',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{

					$data_isert = array(
						'kategori_id' => xss_filter($this->input->post('kategori_id')),
						'room_id' => xss_filter($this->input->post('room_id')),
						'peserta_id' => xss_filter($this->input->post('peserta_id')),
						'br_tanggal_in' => xss_filter($this->input->post('br_tanggal_in')),
						'br_jml_hari' => xss_filter($this->input->post('br_jml_hari')),
						'br_dokumen' => xss_filter($this->input->post('br_dokumen')),
						'br_status' => 'Disetujui',
						'penyelenggara_id' => data_login('id'),
						'created_at' => date('Y-m-d H:i:s'),
					);
					for ($x = 0; $x < $this->input->post('br_jml_hari'); $x++) {
						if ($x == $this->input->post('br_jml_hari')) {
							
							break;
						}
						$data_isert = array(
							'kategori_id' => xss_filter($this->input->post('kategori_id')),
							'room_id' => xss_filter($this->input->post('room_id')),
							'peserta_id' => xss_filter($this->input->post('peserta_id')),
							'br_tanggal_in' => manipulasiTanggal($this->input->post('br_tanggal_in'), $x, 'days'),
							'br_jml_hari' => '1',
							'br_dokumen' => xss_filter($this->input->post('br_dokumen')),
							'br_status' => 'Disetujui',
							'penyelenggara_id' => data_login('id'),
							'created_at' => date('Y-m-d H:i:s'),
						);
						$this->booking_kamar_model->insert($data_isert);
						//echo $data_isert;
						

					}
					$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
					redirect(admin_url($this->mod.'/pesan/'. $this->input->post('kategori_id')),'refresh');
					// die();
					// if ($this->booking_kamar_model->insert($data_isert))
					// {
					// 	$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
					// 	redirect(admin_url($this->mod.'/pesan/'. $this->input->post('kategori_id')),'refresh');
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