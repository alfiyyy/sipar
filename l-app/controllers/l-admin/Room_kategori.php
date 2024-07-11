<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-10-28 | 11:32
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Room_kategori extends Backend_Controller {
	
	public $mod = 'room-kategori';
	public $mod_penyelenggara = 'unit-kerja';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/room_kategori_model");
		$this->load->model("mod/unit_kerja_model");
		$this->meta_title("Room Kategori");
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

					foreach ($this->room_kategori_model->datatable('_data', 'data', '') as $val) 
					{
						$row = [];
						$row[] = $no;
						$row[] = $val['unker_nama'];
						$row[] = $val['kategori_nama'];
						$row[] = $val['created_at'];
						$row[] = '<div class="text-center"><div class="btn-group">
									<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['kategori_id']) .'\'" class="btn btn-xs btn-white" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
									<button type="button" class="btn btn-xs btn-white delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['kategori_id']) .'"><i class="cificon licon-trash-2"></i></button>
								</div></div>';
						$data[] = $row;
						$no++;
					} // endforeach.

					$this->json_output(['data' => $data, 'recordsFiltered' => $this->room_kategori_model->datatable('_data', 'count', '')]);
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


	public function add()
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
					'field' => 'kategori_nama',
					'label' => 'Kategori Nama',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'kategori_deskripsi',
					'label' => 'Kategori Deskripsi'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'kategori_image',
					'label' => 'Kategori Image',
					'rules' => 'trim'
				)));


				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'kategori_nama' => xss_filter($this->input->post('kategori_nama')),
						'kategori_deskripsi' => xss_filter($this->input->post('kategori_deskripsi')),
						'kategori_image' => xss_filter($this->input->post('kategori_image')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->room_kategori_model->insert($data_isert))
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
				$this->vars['all_unker'] = $this->room_kategori_model->get_all_unker();
				$this->render_view('view_add');
			}
		}
		else
		{
			$this->render_403();
		}
	}

	public function addfrompenyelenggara()
	{

		if ($this->input->method() == 'post')
		{
			$this->form_validation->set_rules(array(array(
				'field' => 'unker_id',
				'label' => 'Unker Id',
				'rules' => 'trim'
			)));

			$this->form_validation->set_rules(array(array(
				'field' => 'kategori_nama',
				'label' => 'Kategori Nama',
				'rules' => 'trim'
			)));

			$this->form_validation->set_rules(array(array(
				'field' => 'kategori_deskripsi',
				'label' => 'Kategori Deskripsi'
			)));

			$this->form_validation->set_rules(array(array(
				'field' => 'kategori_warna',
				'label' => 'Kategori Warna',
				'rules' => 'trim'
			)));

			if ($this->form_validation->run())
			{
				$data_isert = array(
					'unker_id' => xss_filter($this->input->post('unker_id')),
					'kategori_nama' => xss_filter($this->input->post('kategori_nama')),
					'kategori_deskripsi' => xss_filter($this->input->post('kategori_deskripsi')),
					'kategori_warna' => xss_filter($this->input->post('kategori_warna')),
					'created_at' => date('Y-m-d H:i:s'),
				);

				if ($this->room_kategori_model->insert($data_isert))
				{
					$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
					redirect(admin_url($this->mod_penyelenggara.'/kamar/'.$this->input->post('kategori_id')),'refresh');
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


	public function edit($id_data = '')
	{
		if ($this->role->i('modify'))
		{
			$id_edit = xss_filter($id_data, 'sql');
			$cek_id = $this->room_kategori_model->cek_id($id_edit);

			if ($cek_id == 1) 
			{
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules(array(array(
						'field' => 'unker_id',
						'label' => 'Unker Id',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'kategori_nama',
						'label' => 'Kategori Nama',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'kategori_deskripsi',
						'label' => 'Kategori Deskripsi'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'kategori_image',
						'label' => 'Kategori Image',
						'rules' => 'trim'
					)));

					if ( $this->form_validation->run() )
					{
						$data_update = array(

							'unker_id' => xss_filter($this->input->post('unker_id'), 'xss'),
							'kategori_nama' => xss_filter($this->input->post('kategori_nama')),
							'kategori_deskripsi' => xss_filter($this->input->post('kategori_deskripsi')),
							'kategori_image' => xss_filter($this->input->post('kategori_image')),
							'updated_at' => date('Y-m-d H:i:s'),
						);

						if ($this->room_kategori_model->update($id_edit, $data_update))
						{
							$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->room_kategori_model->get_data_edit($id_edit);
				$this->vars['all_unker'] = $this->room_kategori_model->get_all_unker();
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
					$this->room_kategori_model->delete($pk);
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

	public function unker($id_data = '')
	{
		if ($this->role->i('read'))
		{
			$id_unker = xss_filter($id_data, 'sql');
			$cek_id = $this->unit_kerja_model->cek_id($id_unker);

			if ($cek_id == 1) 
			{
				if ($this->input->is_ajax_request()) 
				{
					if ($this->input->post('act')=='delete') {
						return $this->_delete();
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
							<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['kategori_id']) .'\'" class="btn btn-xs btn-white" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
										<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['kategori_id']) .'\'" class="btn btn-xs btn-white" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
										<button type="button" class="btn btn-xs btn-white delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['kategori_id']) .'"><i class="cificon licon-trash-2"></i></button>
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
					$this->vars['unker'] = $this->db->where('unker_id', $id_data)->get('t_unit_kerja')->row();
					//var_dump($unker); die();
					$this->render_view('view_index_unker', $this->vars);
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
} // End Class.