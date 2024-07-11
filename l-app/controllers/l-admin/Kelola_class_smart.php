<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-18 | 04:47
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct csript access allowed');

class Kelola_class_smart extends Backend_Controller {
	
	public $mod = 'kelola-class-smart';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/kelola_class_smart_model");
		$this->load->model("mod/csr_fasilitas_model");
		$this->load->model("mod/csr_gambar_model");
		$this->load->model("mod/csr_layanan_model");
		$this->meta_title("Kelola Smart Meeting");
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

					foreach ($this->kelola_class_smart_model->datatable('_data', 'data') as $val) 
					{
						$row = [];
						$row[] = $val['csr_id'];
						$row[] = $val['csr_nama'];
						$row[] = $val['csr_nomor'];
						$row[] = $val['csr_kapasitas'];
						$row[] = '<div class="text-center"><div class="btn-group">
									<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['csr_id']) .'\'" class="btn btn-xs btn-white" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
									<button type="button" class="btn btn-xs btn-white delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['csr_id']) .'"><i class="cificon licon-trash-2"></i></button>
								</div></div>';
						$data[] = $row;
					} // endforeach.

					$this->json_output(['data' => $data, 'recordsFiltered' => $this->kelola_class_smart_model->datatable('_data', 'count')]);
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

	public function kelola() 
	{
		$id_user = data_login('id');
		$query = $this->db->query('SELECT unker_id, unker_nama FROM t_unit_kerja
		WHERE id_user='.$id_user);
		$result = $query->row();

		

		if(isset($result)) {
			$id_data = $result->unker_id;
			$unker = $result->unker_nama;
		} 

		$this->vars['content_fasilitas']   = $this->db->where('unker_id', $id_data)->order_by('csrf_nama', 'ASC')->get('t_csr_fasilitas')->result();
		$this->vars['content_gambar']   = $this->csr_gambar_model->get_gallerys($id_data);
		$this->vars['content_layanan']    =  $this->db->where('unker_id', $id_data)->order_by('csrl_nama', 'ASC')->get('t_csr_layanan')->result();
		$this->vars['content_kamar'] =  $this->db->where('unker_id', $id_data)->order_by('csr_nama, csr_nomor', 'ASC')->get('t_csr')->result();
		$this->vars['unker_id'] = $id_data;
		$this->vars['unker_nama'] = $unker;
		$aksi = $this->input->post('aksi');
		if($aksi == "kamar") {
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'csr_nama',
					'label' => 'CSR Nama',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'csr_nomor',
					'label' => 'CSR Nomor',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'csr_kapasitas',
					'label' => 'CSR Kapasitas',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'csr_nama' => xss_filter($this->input->post('csr_nama')),
						'csr_nomor' => xss_filter($this->input->post('csr_nomor')),
						'csr_kapasitas' => xss_filter($this->input->post('csr_kapasitas')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->kelola_class_smart_model->insert($data_isert))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/kelola/#Tab-Kamar'),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod.'/kelola/#Tab-Kamar', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
					}
				}
			}
		} elseif($aksi == "kamar-update") {
			if ($this->input->method() == 'post')
			{

				$this->form_validation->set_rules(array(array(
					'field' => 'csr_nama',
					'label' => 'CSR Nama',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'csr_nomor',
					'label' => 'CSR Nomor',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'csr_kapasitas',
					'label' => 'CSR Kapasitas',
					'rules' => 'trim'
				)));

				if ( $this->form_validation->run() )
				{
					$id_edit = $this->input->post('csr_id');
					$data_update = array(
						'csr_nama' => xss_filter($this->input->post('csr_nama')),
						'csr_nomor' => xss_filter($this->input->post('csr_nomor')),
						'csr_kapasitas' => xss_filter($this->input->post('csr_kapasitas')),
						'updated_at' => date('Y-m-d H:i:s'),
					);

					if ($this->kelola_class_smart_model->update($id_edit, $data_update))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						redirect(admin_url($this->mod.'/kelola/#Tab-Kamar'),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod.'/kelola/#Tab-Kamar', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
					}
				}
			}
		} elseif($aksi == "fasilitas") {
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'csrf_nama',
					'label' => 'Fasilitas',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'csrf_icon',
					'label' => 'Icon',
					'rules' => 'required|trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'csrf_nama' => xss_filter($this->input->post('csrf_nama')),
						'csrf_icon' => xss_filter($this->input->post('csrf_icon')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->csr_fasilitas_model->insert($data_isert))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/kelola/#Tab-Fasilitas'),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod.'/kelola/#Tab-Fasilitas', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
					}
				}
			}
		} elseif($aksi == "gambar") {
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'csrg_image',
					'label' => 'Image',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'csrg_image' => xss_filter($this->input->post('csrg_image')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->csr_gambar_model->insert($data_isert))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/kelola/#Tab-Gambar'),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod.'/kelola/#Tab-Gambar', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
					}
				}
			}
		} elseif($aksi == "layanan") {
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'csrl_nama',
					'label' => 'Layanan',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'csrl_harga',
					'label' => 'Harga',
					'rules' => 'required|trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'csrl_nama' => xss_filter($this->input->post('csrl_nama')),
						'csrl_harga' => xss_filter($this->input->post('csrl_harga')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->csr_layanan_model->insert($data_isert))
					{
						$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully added');
						redirect(admin_url($this->mod.'/kelola/#Tab-Layanan'),'refresh');
					}
					else
					{
						$this->cifire_alert->set($this->mod.'/kelola/#Tab-Layanan', 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
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
					'field' => 'unker_id',
					'label' => 'Unker Id',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'csr_nama',
					'label' => 'Smr Nama',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'csr_nomor',
					'label' => 'Smr Nomor',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'csr_kapasitas',
					'label' => 'Smr Kapasitas',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'created_at',
					'label' => 'Created At',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'updated_at',
					'label' => 'Updated At',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'csr_nama' => xss_filter($this->input->post('csr_nama')),
						'csr_nomor' => xss_filter($this->input->post('csr_nomor')),
						'csr_kapasitas' => xss_filter($this->input->post('csr_kapasitas')),
						'created_at' => xss_filter($this->input->post('created_at')),
						'updated_at' => xss_filter($this->input->post('updated_at')),
					);

					if ($this->kelola_class_smart_model->insert($data_isert))
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
			$cek_id = $this->kelola_class_smart_model->cek_id($id_edit);

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
						'field' => 'csr_nama',
						'label' => 'Smr Nama',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'csr_nomor',
						'label' => 'Smr Nomor',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'csr_kapasitas',
						'label' => 'Smr Kapasitas',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'created_at',
						'label' => 'Created At',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'updated_at',
						'label' => 'Updated At',
						'rules' => 'trim'
					)));

					if ( $this->form_validation->run() )
					{
						$data_update = array(

							'unker_id' => xss_filter($this->input->post('unker_id'), 'xss'),
							'csr_nama' => xss_filter($this->input->post('csr_nama')),
							'csr_nomor' => xss_filter($this->input->post('csr_nomor'), 'xss'),
							'csr_kapasitas' => xss_filter($this->input->post('csr_kapasitas')),
							'created_at' => xss_filter($this->input->post('created_at')),
							'updated_at' => xss_filter($this->input->post('updated_at')),
						);

						if ($this->kelola_class_smart_model->update($id_edit, $data_update))
						{
							$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->kelola_class_smart_model->get_data_edit($id_edit);
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
					$this->kelola_class_smart_model->delete($pk);
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

	public function delete_gambar_class($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ( $this->role->i('delete') )
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					if ( $param == 'class' ) 
					{
						$this->kelola_class_smart_model->delete_gambar_class($pk);
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

	public function delete_gallery_class($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ( $this->role->i('delete') )
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					if ( $param == 'gallery' ) 
					{
						$this->kelola_class_smart_model->delete_gallery_class($pk);
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

	public function delete_fasilitas_class($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ( $this->role->i('delete') )
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					if ( $param == 'fasilitas' ) 
					{
						$this->kelola_class_smart_model->delete_fasilitas_class($pk);
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

	public function delete_layanan_class($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ( $this->role->i('delete') )
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					if ( $param == 'layanan' ) 
					{
						$this->kelola_class_smart_model->delete_layanan_class($pk);
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