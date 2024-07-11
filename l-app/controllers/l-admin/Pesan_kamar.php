<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-05 | 08:29
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_kamar extends Backend_Controller {
	
	public $mod = 'pesan-kamar';
    public $mod_profile = 'profile';
	protected $path_dokumen = CONTENTPATH.'uploads/dokumen/';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/booking_kamar_model");
		$this->load->model("mod/booking_smr_model");
		$this->load->model("mod/booking_csr_model");
		$this->load->model("mod/peserta_model");
		$this->meta_title("Pesan Prasarana");
		
	}

	public function index()
	{
		if($this->role->i('read'))
		{
			$id_user = data_login('id');
			$query = $this->db->query('SELECT * FROM t_unit_kerja');
			$result = $query->result_array();

			$this->vars['unker'] = $result;
			$this->render_view('view_index', $this->vars);
		}
	}

	public function pesan($id_data)
	{
		if($this->role->i('read'))
		{
			$this->vars['penyelenggara_id'] = data_login('id');
            $this->vars['peserta_id'] = data_login('nip');

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
					$dokumen = 'file_kamar-'.data_login('nip').'-'.random_string('numeric', 20) .".pdf";

                    $qunker=$this->db->query('SELECT uk.id_user FROM t_room_kategori rk
                    INNER JOIN t_unit_kerja uk ON rk.unker_id=uk.unker_id
                    WHERE rk.kategori_id='.$this->input->post('kategori_id'));
                    $runker = $qunker->row();
                    if(isset($runker)) {
                        $penyelenggara_id = $runker->id_user;
                    }   

					$this->load->library('upload', array(
						'upload_path'   => $this->path_dokumen,
						'allowed_types' => "pdf",
						'file_name'     => $dokumen,
						'max_size'      => 1024 * 10,
						'overwrite'     => TRUE
					));

					if ($this->upload->do_upload('fupload')) 
					{
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
								'br_dokumen' => 'dokumen/'.$dokumen,
								'penyelenggara_id' => $penyelenggara_id,
								'created_at' => date('Y-m-d H:i:s'),
							);
							$this->booking_kamar_model->insert($data_isert);
							//echo $data_isert;
							

						}
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/pesan/'. $this->input->post('kategori_id')),'refresh');
					}
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

	public function pesan_smr($id_data)
	{
		if($this->role->i('read'))
		{
			$this->vars['penyelenggara_id'] = data_login('id');
            $this->vars['peserta_id'] = data_login('nip');

			$aksi = $this->input->post('aksi');
			if($aksi == "cari") {
				$this->vars['tgl_in'] = $this->input->post('tgl_dari');
				$this->vars['tgl_out'] = $this->input->post('tgl_sampai');
			} else {
				$this->vars['tgl_in'] = $tgl_in = date("Y-m-d");
				$this->vars['tgl_out'] = $tgl_in = date("Y-m-d");
			}

			$query = $this->db->query('SELECT * FROM t_smr
			WHERE unker_id='.$id_data);
			$result = $query->result_array();
			$this->vars['all_peserta'] = $this->peserta_model->get_all_peserta();

			$this->vars['smr'] = $result;
			$this->render_view('view_index_smr', $this->vars);
		}
	}

	public function addsmr()
	{
		if ($this->role->i('write') ) 
		{
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'unker_id',
					'label' => 'Unker Id',
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
					$dokumen = 'file_smr-'.data_login('nip').'-'.random_string('numeric', 20) .".pdf";
                    $qunker=$this->db->query('SELECT id_user FROM t_unit_kerja
                    WHERE unker_id='.$this->input->post('unker_id'));
                    $runker = $qunker->row();
                    if(isset($runker)) {
                        $penyelenggara_id = $runker->id_user;
                    }   

					$this->load->library('upload', array(
						'upload_path'   => $this->path_dokumen,
						'allowed_types' => "pdf",
						'file_name'     => $dokumen,
						'max_size'      => 1024 * 10,
						'overwrite'     => TRUE
					));

					if ($this->upload->do_upload('fupload')) 
					{
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
								'bs_dokumen' => 'dokumen/'.$dokumen,
								'penyelenggara_id' => $penyelenggara_id,
								'created_at' => date('Y-m-d H:i:s'),
							);
							$this->booking_smr_model->insert($data_isert);
						}
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/pesan-smr/'. $this->input->post('unker_id')),'refresh');
					}
					
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

	public function pesan_csr($id_data)
	{
		if($this->role->i('read'))
		{
			$this->vars['penyelenggara_id'] = data_login('id');
            $this->vars['peserta_id'] = data_login('nip');

			$aksi = $this->input->post('aksi');
			if($aksi == "cari") {
				$this->vars['tgl_in'] = $this->input->post('tgl_dari');
				$this->vars['tgl_out'] = $this->input->post('tgl_sampai');
			} else {
				$this->vars['tgl_in'] = $tgl_in = date("Y-m-d");
				$this->vars['tgl_out'] = $tgl_in = date("Y-m-d");
			}

			$query = $this->db->query('SELECT * FROM t_csr
			WHERE unker_id='.$id_data);
			$result = $query->result_array();
			$this->vars['all_peserta'] = $this->peserta_model->get_all_peserta();

			$this->vars['csr'] = $result;
			$this->render_view('view_index_csr', $this->vars);
		}
	}

	public function addcsr()
	{
		if ($this->role->i('write') ) 
		{
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'unker_id',
					'label' => 'Unker Id',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'csr_id',
					'label' => 'CSR Id',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'peserta_id',
					'label' => 'User Id',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'bc_tanggal_in',
					'label' => 'Tanggal In',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'bc_jml_hari',
					'label' => 'Lama Meginap',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'bc_dokumen',
					'label' => 'Dokumen',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$dokumen = 'file_csr-'.data_login('nip').'-'.random_string('numeric', 20) .".pdf";
                    $qunker=$this->db->query('SELECT id_user FROM t_unit_kerja
                    WHERE unker_id='.$this->input->post('unker_id'));
                    $runker = $qunker->row();
                    if(isset($runker)) {
                        $penyelenggara_id = $runker->id_user;
                    }   

					$this->load->library('upload', array(
						'upload_path'   => $this->path_dokumen,
						'allowed_types' => "pdf",
						'file_name'     => $dokumen,
						'max_size'      => 1024 * 10,
						'overwrite'     => TRUE
					));

					if ($this->upload->do_upload('fupload')) 
					{
						for ($x = 0; $x < $this->input->post('bc_jml_hari'); $x++) {
							if ($x == $this->input->post('bc_jml_hari')) {
								
								break;
							}
							$data_isert = array(
								'unker_id' => xss_filter($this->input->post('unker_id')),
								'csr_id' => xss_filter($this->input->post('csr_id')),
								'peserta_id' => xss_filter($this->input->post('peserta_id')),
								'bc_tanggal_in' => manipulasiTanggal($this->input->post('bc_tanggal_in'), $x, 'days'),
								'bc_jml_hari' => '1',
								'bc_dokumen' => 'dokumen/'.$dokumen,
								'penyelenggara_id' => $penyelenggara_id,
								'created_at' => date('Y-m-d H:i:s'),
							);
							$this->booking_csr_model->insert($data_isert);
							//echo $data_isert;
							
	
						}
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/pesan-csr/'. $this->input->post('unker_id')),'refresh');
					}
					
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