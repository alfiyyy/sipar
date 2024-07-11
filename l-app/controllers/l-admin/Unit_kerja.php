<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-10-28 | 06:53
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_kerja extends Backend_Controller {
	
	public $mod = 'unit-kerja';
	public $mod_kat = 'room-kategori';
	public $mod_room = 'room';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/unit_kerja_model");
		$this->load->model("mod/room_kategori_model");
		$this->load->model("mod/room_model");
		$this->load->model("mod/room_fasilitas_model");
		$this->load->model("mod/room_gambar_model");
		$this->load->model("mod/room_layanan_model");
		$this->load->model("mod/user_model");
		$this->meta_title("Unit Kerja");
	}


	public function index()
	{
		if ($this->role->i('read'))
		{
			if ($this->input->is_ajax_request()) 
			{
				if ($this->input->post('act')=='delete') {
					return $this->_delete();
				}
				else
				{
					$data = array();
					$no=1;

					foreach ($this->unit_kerja_model->datatable('_data', 'data') as $val) 
					{
						$row = [];
						$row[] = $no;
						$row[] = $val['unker_nama'];
						$row[] = $val['unker_kepala'];
						$row[] = $val['name'];
						$row[] = $val['unker_status'];
						$row[] = $val['created_at']; 
						if (data_login('key_group')=="root") {
							$row[] = '<div class="text-center"><div class="btn-group">
										<button type="button" onclick="location.href=\''. admin_url($this->mod."/pimpinan/".$val['unker_id']) .'\'" class="btn btn-lg btn-dark" data-toggle="tooltip" data-placement="top" data-title="Pilih Pimpinan"><i class="cificon licon-user"></i></button>
										<button type="button" onclick="location.href=\''. admin_url($this->mod."/assesmen/".$val['unker_id']) .'\'" class="btn btn-lg btn-info" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_assesmen') .'"><i class="cificon licon-user"></i></button>
										<button type="button" onclick="location.href=\''. admin_url($this->mod_kat."/unker/".$val['unker_id']) .'\'" class="btn btn-lg btn-success" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_kategori') .'"><i class="cificon licon-tag"></i></button>
										<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['unker_id']) .'\'" class="btn btn-lg btn-warning" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
										<button type="button" class="btn btn-lg btn-danger delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['unker_id']) .'"><i class="cificon licon-trash-2"></i></button>
									</div></div>';
						} elseif (data_login('key_group')=="penyelenggara") {
							$row[] = '<div class="text-center"><div class="btn-group">
										<button type="button" onclick="location.href=\''. admin_url($this->mod."/kamar/".$val['unker_id']) .'\'" class="btn btn-lg btn-success" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_kategori') .'"><i class="cificon licon-tag"></i></button>
										<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['unker_id']) .'\'" class="btn btn-lg btn-warning" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
									</div></div>';
						}
						$data[] = $row;
						$no++;
					} // endforeach.

					$this->json_output(['data' => $data, 'recordsFiltered' => $this->unit_kerja_model->datatable('_data', 'count')]);
				}

			}
			else
			{
				$this->render_view('view_index');
			}
		}
		else
		{
			$this->render_403();
		}
	}

	public function kamar($id_data = '')
	{
		if ($this->role->i('read'))
		{
			$id_unker = xss_filter($id_data, 'sql');
			$cek_id = $this->unit_kerja_model->cek_id_by_user($id_unker);

			if ($cek_id == 1) 
			{
				if ($this->input->is_ajax_request()) 
				{
					if ($this->input->post('act')=='delete_kategori') {
						return $this->_delete_kategori();
					}
					else
					{
						$data = array();
						$no = 1;

						foreach ($this->room_kategori_model->datatable('_data', 'data', $id_data) as $val) 
						{
							$row = [];
							$row[] = $no;
							$row[] = $val['kategori_nama'];
							$row[] = $val['created_at'];
							$row[] = '<div class="text-center"><div class="btn-group">
										<button type="button" onclick="location.href=\''. admin_url($this->mod."/kelola/".$val['kategori_id']) .'\'" class="btn btn-lg btn-success" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_kelola') .'"><i class="cificon licon-airplay"></i></button>
										<button type="button" class="btn btn-lg btn-danger delete_single_kategori" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['kategori_id']) .'"><i class="cificon licon-trash-2"></i></button>
										<button type="button" class="btn btn-lg btn-warning" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_edit').'" data-pk="'. encrypt($val['kategori_id']) .'"><i class="cificon licon-edit"></i></button>
									</div></div>';
							$data[] = $row;
							$no++;
						} // endforeach.

						//var_dump($data); die();

						$this->json_output(['data' => $data, 'recordsFiltered' => $this->room_kategori_model->datatable('_data', 'count', $id_data)]);
					}

				}
				else
				{
					$this->vars['kategori_id'] = $id_data;
					$this->vars['unker'] = $this->db->where('unker_id', $id_data)->get('t_unit_kerja')->row();
					//var_dump($unker); die();
					$this->render_view('view_kamar', $this->vars);
				}
			}
			else
			{
				$this->render_404();
			}
		}
		else
		{
			$this->render_403();
		}
	}

	public function kelola($id_data = '') 
	{
		$this->vars['content_fasilitas']   = $this->db->where('kategori_id', $id_data)->order_by('rf_nama', 'ASC')->get('t_room_fasilitas')->result();
		$this->vars['content_gambar']   = $this->room_gambar_model->get_gallerys($id_data);
		$this->vars['content_layanan']    =  $this->db->where('kategori_id', $id_data)->order_by('rl_nama', 'ASC')->get('t_room_layanan')->result();
		$this->vars['content_kamar'] =  $this->db->where('kategori_id', $id_data)->order_by('room_nama, room_nomor', 'ASC')->get('t_room')->result();
		//var_dump($this->vars['content_kamar']); die();
		$this->vars['kategori'] = $this->db->where('kategori_id', $id_data)->get('t_room_kategori')->row();

		$aksi = $this->input->post('aksi');
		if($aksi == "kamar") {
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'room_nama',
					'label' => 'Room Nama',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'room_nomor',
					'label' => 'Room Nomor',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'room_kapasitas',
					'label' => 'Room Kapasitas',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'kategori_id' => xss_filter($this->input->post('kategori_id')),
						'room_nama' => xss_filter($this->input->post('room_nama')),
						'room_nomor' => xss_filter($this->input->post('room_nomor')),
						'room_kapasitas' => xss_filter($this->input->post('room_kapasitas')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->room_model->insert($data_isert))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/kelola/'.$id_data.'#Tab-Kamar'),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod.'/kelola/'.$id_data.'#Tab-Kamar', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
					}
				}
			}
		} elseif($aksi == "kamar-update") {
			if ($this->input->method() == 'post')
			{

				$this->form_validation->set_rules(array(array(
					'field' => 'room_nama',
					'label' => 'Room Nama',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'room_nomor',
					'label' => 'Room Nomor',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'room_kapasitas',
					'label' => 'Room Kapasitas',
					'rules' => 'trim'
				)));

				if ( $this->form_validation->run() )
				{
					$id_edit = $this->input->post('room_id');
					$data_update = array(
						'room_nama' => xss_filter($this->input->post('room_nama')),
						'room_nomor' => xss_filter($this->input->post('room_nomor')),
						'room_kapasitas' => xss_filter($this->input->post('room_kapasitas')),
						'updated_at' => date('Y-m-d H:i:s'),
					);

					if ($this->room_model->update($id_edit, $data_update))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						redirect(admin_url($this->mod.'/kelola/'.$id_data.'#Tab-Kamar'),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod.'/kelola/'.$id_data.'#Tab-Kamar', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
					}
				}
			}
		} elseif($aksi == "fasilitas") {
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'rf_nama',
					'label' => 'Rf Nama',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'rf_icon',
					'label' => 'Rf Icon',
					'rules' => 'required|trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'kategori_id' => xss_filter($this->input->post('kategori_id')),
						'rf_nama' => xss_filter($this->input->post('rf_nama')),
						'rf_icon' => xss_filter($this->input->post('rf_icon')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->room_fasilitas_model->insert($data_isert))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/kelola/'.$id_data.'#Tab-Fasilitas'),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod.'/kelola/'.$id_data.'#Tab-Fasilitas', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
					}
				}
			}
		} elseif($aksi == "gambar") {
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'rg_image',
					'label' => 'Rg Image',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'kategori_id' => xss_filter($this->input->post('kategori_id')),
						'rg_image' => xss_filter($this->input->post('rg_image')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->room_gambar_model->insert($data_isert))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/kelola/'.$id_data.'#Tab-Gambar'),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod.'/kelola/'.$id_data.'#Tab-Gambar', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
					}
				}
			}
		} elseif($aksi == "layanan") {
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'rl_nama',
					'label' => 'Layanan',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'rl_harga',
					'label' => 'Harga',
					'rules' => 'required|trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'kategori_id' => xss_filter($this->input->post('kategori_id')),
						'rl_nama' => xss_filter($this->input->post('rl_nama')),
						'rl_harga' => xss_filter($this->input->post('rl_harga')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->room_layanan_model->insert($data_isert))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/kelola/'.$id_data.'#Tab-Layanan'),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod.'/kelola/'.$id_data.'#Tab-Layanan', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
					}
				}
			}
		}
		else
		{
			$this->render_view('view_kelola',  $this->vars);
		}
		
	} 

	public function add()
	{
		if ($this->role->i('write') ) 
		{
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'unker_nama',
					'label' => 'Unker Nama',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'unker_kepala',
					'label' => 'Unker Kepala',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'unker_alamat',
					'label' => 'Unker Alamat'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'unker_telp',
					'label' => 'Unker Telp',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'unker_fax',
					'label' => 'Unker Fax',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'unker_email',
					'label' => 'Unker Email',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'unker_deskripsi',
					'label' => 'Unker Deskripsi'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'unker_image',
					'label' => 'Banner'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'unker_lat',
					'label' => 'Unker Lat',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'unker_long',
					'label' => 'Unker Long',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'unker_status',
					'label' => 'Unker Status',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_nama' => xss_filter($this->input->post('unker_nama')),
						'unker_kepala' => xss_filter($this->input->post('unker_kepala')),
						'unker_alamat' => xss_filter($this->input->post('unker_alamat')),
						'unker_telp' => xss_filter($this->input->post('unker_telp')),
						'unker_fax' => xss_filter($this->input->post('unker_fax')),
						'unker_email' => xss_filter($this->input->post('unker_email')),
						'unker_deskripsi' => xss_filter($this->input->post('unker_deskripsi')),
						'unker_image' => xss_filter($this->input->post('unker_image')),
						'unker_lat' => xss_filter($this->input->post('unker_lat')),
						'unker_long' => xss_filter($this->input->post('unker_long')),
						'unker_status' => xss_filter($this->input->post('unker_status')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->unit_kerja_model->insert($data_isert))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
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

	public function edit($id_data = '')
	{
		if ($this->role->i('modify'))
		{
			$id_edit = xss_filter($id_data, 'sql');
			$cek_id = $this->unit_kerja_model->cek_id($id_edit);

			if ($cek_id == 1) 
			{
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules(array(array(
						'field' => 'unker_nama',
						'label' => 'Unker Nama',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'unker_kepala',
						'label' => 'Unker Kepala',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'unker_alamat',
						'label' => 'Unker Alamat'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'unker_telp',
						'label' => 'Unker Telp',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'unker_fax',
						'label' => 'Unker Fax',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'unker_email',
						'label' => 'Unker Email',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'unker_deskripsi',
						'label' => 'Unker Deskripsi'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'unker_image',
						'label' => 'Banner'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'unker_lat',
						'label' => 'Unker Lat',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'unker_long',
						'label' => 'Unker Long',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'unker_status',
						'label' => 'Unker Status',
						'rules' => 'trim'
					)));

					if ( $this->form_validation->run() )
					{
						$data_update = array(

							'unker_nama' => xss_filter($this->input->post('unker_nama')),
							'unker_kepala' => xss_filter($this->input->post('unker_kepala')),
							'unker_alamat' => xss_filter($this->input->post('unker_alamat')),
							'unker_telp' => xss_filter($this->input->post('unker_telp')),
							'unker_fax' => xss_filter($this->input->post('unker_fax')),
							'unker_email' => xss_filter($this->input->post('unker_email')),
							'unker_deskripsi' => xss_filter($this->input->post('unker_deskripsi')),
							'unker_image' => xss_filter($this->input->post('unker_image')),
							'unker_lat' => xss_filter($this->input->post('unker_lat')),
							'unker_long' => xss_filter($this->input->post('unker_long')),
							'unker_status' => xss_filter($this->input->post('unker_status')),
							'updated_at' => date('Y-m-d H:i:s'),
						);

						if ($this->unit_kerja_model->update($id_edit, $data_update))
						{
							$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->unit_kerja_model->get_data_edit($id_edit);
				$this->vars['data_row'] = $data_edit;
				$this->render_view('view_edit');
			}
			else
			{
				$this->render_404();
			}
		}
		else
		{
			$this->render_403();
		}
	}

	public function assesmen($id_data = '')
	{
		if ($this->role->i('modify'))
		{
			$id_edit = xss_filter($id_data, 'sql');
			$cek_id = $this->unit_kerja_model->cek_id($id_edit);

			$query1 = $this->db->query('SELECT unker_nama FROM t_unit_kerja
			WHERE unker_id='.$id_data);
			$result1 = $query1->row();

			if(isset($result1)) {
				$unkernama = $result1->unker_nama;
			} 

			if ($cek_id == 1) 
			{
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules(array(array(
						'field' => 'unker_nama',
						'label' => 'Unker Nama',
						'rules' => 'trim'
					))); 

					if ( $this->form_validation->run() )
					{
						$data_update = array(
							'id_user' => xss_filter($this->input->post('id_user')),
						);

						$data_update_user = array(
							'instansi' => $unkernama,
						);

						if ($this->unit_kerja_model->update($id_edit, $data_update))
						{
							$this->user_model->update($this->input->post('id_user'), $data_update_user);
							$this->cifire_alert->set($this->mod, 'info', 'Data has been asessmen to user updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->unit_kerja_model->get_data_edit($id_edit);
				$this->vars['all_user'] = $this->unit_kerja_model->get_all_user();
				$this->vars['data_row'] = $data_edit;
				$this->render_view('view_assesmen');
			}
			else
			{
				$this->render_404();
			}
		}
		else
		{
			$this->render_403();
		}
	}

	public function pimpinan($id_data = '')
	{
		if ($this->role->i('modify'))
		{
			$id_edit = xss_filter($id_data, 'sql');
			$cek_id = $this->unit_kerja_model->cek_id($id_edit);

			$query1 = $this->db->query('SELECT unker_nama FROM t_unit_kerja
			WHERE unker_id='.$id_data);
			$result1 = $query1->row();

			if(isset($result1)) {
				$unkernama = $result1->unker_nama;
			} 

			if ($cek_id == 1) 
			{
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules(array(array(
						'field' => 'unker_nama',
						'label' => 'Unker Nama',
						'rules' => 'trim'
					))); 

					if ( $this->form_validation->run() )
					{
						$data_update = array(
							'id_pimpinan' => xss_filter($this->input->post('id_user')),
						);

						$data_update_user = array(
							'instansi' => $unkernama,
						);

						if ($this->unit_kerja_model->update($id_edit, $data_update))
						{
							$this->user_model->update($this->input->post('id_user'), $data_update_user);
							$this->cifire_alert->set($this->mod, 'info', 'Data has been asessmen to user updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->unit_kerja_model->get_data_edit($id_edit);
				$this->vars['all_user'] = $this->unit_kerja_model->get_all_user_pimpinan();
				$this->vars['data_row'] = $data_edit;
				$this->render_view('view_pimpinan');
			}
			else
			{
				$this->render_404();
			}
		}
		else
		{
			$this->render_403();
		}
	}


	private function _delete()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->role->i('delete'))
			{
				$data = $this->input->post('data');

				foreach ($data as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					$this->unit_kerja_model->delete($pk);
				}

				$response['success'] = true;
				$this->json_output($response);
			}
			else
			{
				$response['success'] = false;
				$this->json_output($response);
			}
		}
		else
		{
			show_403();
		}
	}

	private function _delete_kategori()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->role->i('delete'))
			{
				$data = $this->input->post('data');

				foreach ($data as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					$this->unit_kerja_model->delete_kategori($pk);
				}

				$response['success'] = true;
				$this->json_output($response);
			}
			else
			{
				$response['success'] = false;
				$this->json_output($response);
			}
		}
		else
		{
			show_403();
		}
	}

	public function delete_gambar_kamar($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ( $this->role->i('delete') )
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					if ( $param == 'album' ) 
					{
						$this->unit_kerja_model->delete_album($pk);
					}
					if ( $param == 'image' ) 
					{
						$this->unit_kerja_model->delete_gambar_kamar($pk);
					}
				}

				$response['success'] = true;
				$response['dataDelete'] = decrypt($data_pk[0]);
				$response['alert']['type'] = 'success';
				$response['alert']['content'] = lang_line('form_message_delete_success');

				$this->json_output($response);
			}
			else
			{
				$response = false;
				$this->json_output($response);
			}
		}
		else
		{
			$this->render_404();
		}
	}

	public function delete_gallery_kamar($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ( $this->role->i('delete') )
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					if ( $param == 'kamar' ) 
					{
						$this->unit_kerja_model->delete_gallery_kamar($pk);
					}
				}

				$response['success'] = true;
				$response['dataDelete'] = decrypt($data_pk[0]);
				$response['alert']['type'] = 'success';
				$response['alert']['content'] = lang_line('form_message_delete_success');

				$this->json_output($response);
			}
			else
			{
				$response = false;
				$this->json_output($response);
			}
		}
		else
		{
			$this->render_404();
		}
	}

	public function delete_fasilitas_kamar($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ( $this->role->i('delete') )
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					if ( $param == 'fasilitas_kamar' ) 
					{
						$this->unit_kerja_model->delete_fasilitas_kamar($pk);
					}
				}

				$response['success'] = true;
				$response['dataDelete'] = decrypt($data_pk[0]);
				$response['alert']['type'] = 'success';
				$response['alert']['content'] = lang_line('form_message_delete_success');

				$this->json_output($response);
			}
			else
			{
				$response = false;
				$this->json_output($response);
			}
		}
		else
		{
			$this->render_404();
		}
	}

	public function delete_layanan_kamar($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ( $this->role->i('delete') )
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					if ( $param == 'layanan_kamar' ) 
					{
						$this->unit_kerja_model->delete_layanan_kamar($pk);
					}
				}

				$response['success'] = true;
				$response['dataDelete'] = decrypt($data_pk[0]);
				$response['alert']['type'] = 'success';
				$response['alert']['content'] = lang_line('form_message_delete_success');

				$this->json_output($response);
			}
			else
			{
				$response = false;
				$this->json_output($response);
			}
		}
		else
		{
			$this->render_404();
		}
	}
	
} // End Class.