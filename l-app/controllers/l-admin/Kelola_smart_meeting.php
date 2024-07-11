<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-18 | 04:47
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_smart_meeting extends Backend_Controller {
	
	public $mod = 'kelola-smart-meeting';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/kelola_smart_meeting_model");
		$this->load->model("mod/smr_fasilitas_model");
		$this->load->model("mod/smr_gambar_model");
		$this->load->model("mod/smr_layanan_model");
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

					foreach ($this->kelola_smart_meeting_model->datatable('_data', 'data') as $val) 
					{
						$row = [];
						$row[] = $val['smr_id'];
						$row[] = $val['smr_nama'];
						$row[] = $val['smr_nomor'];
						$row[] = $val['smr_kapasitas'];
						$row[] = '<div class="text-center"><div class="btn-group">
									<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['smr_id']) .'\'" class="btn btn-xs btn-white" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
									<button type="button" class="btn btn-xs btn-white delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['smr_id']) .'"><i class="cificon licon-trash-2"></i></button>
								</div></div>';
						$data[] = $row;
					} // endforeach.

					$this->json_output(['data' => $data, 'recordsFiltered' => $this->kelola_smart_meeting_model->datatable('_data', 'count')]);
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

		$this->vars['content_fasilitas']   = $this->db->where('unker_id', $id_data)->order_by('smrf_nama', 'ASC')->get('t_smr_fasilitas')->result();
		$this->vars['content_gambar']   = $this->smr_gambar_model->get_gallerys($id_data);
		$this->vars['content_layanan']    =  $this->db->where('unker_id', $id_data)->order_by('smrl_nama', 'ASC')->get('t_smr_layanan')->result();
		$this->vars['content_kamar'] =  $this->db->where('unker_id', $id_data)->order_by('smr_nama, smr_nomor', 'ASC')->get('t_smr')->result();
		$this->vars['unker_id'] = $id_data;
		$this->vars['unker_nama'] = $unker;
		$aksi = $this->input->post('aksi');
		if($aksi == "kamar") {
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'smr_nama',
					'label' => 'SMR Nama',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'smr_nomor',
					'label' => 'SMR Nomor',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'smr_kapasitas',
					'label' => 'SMR Kapasitas',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'smr_nama' => xss_filter($this->input->post('smr_nama')),
						'smr_nomor' => xss_filter($this->input->post('smr_nomor')),
						'smr_kapasitas' => xss_filter($this->input->post('smr_kapasitas')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->kelola_smart_meeting_model->insert($data_isert))
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
					'field' => 'smr_nama',
					'label' => 'SMR Nama',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'smr_nomor',
					'label' => 'SMR Nomor',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'smr_kapasitas',
					'label' => 'SMR Kapasitas',
					'rules' => 'trim'
				)));

				if ( $this->form_validation->run() )
				{
					$id_edit = $this->input->post('smr_id');
					$data_update = array(
						'smr_nama' => xss_filter($this->input->post('smr_nama')),
						'smr_nomor' => xss_filter($this->input->post('smr_nomor')),
						'smr_kapasitas' => xss_filter($this->input->post('smr_kapasitas')),
						'updated_at' => date('Y-m-d H:i:s'),
					);

					if ($this->kelola_smart_meeting_model->update($id_edit, $data_update))
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
					'field' => 'smrf_nama',
					'label' => 'Fasilitas',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'smrf_icon',
					'label' => 'Icon',
					'rules' => 'required|trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'smrf_nama' => xss_filter($this->input->post('smrf_nama')),
						'smrf_icon' => xss_filter($this->input->post('smrf_icon')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->smr_fasilitas_model->insert($data_isert))
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
					'field' => 'smrg_image',
					'label' => 'Image',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'smrg_image' => xss_filter($this->input->post('smrg_image')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->smr_gambar_model->insert($data_isert))
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
					'field' => 'smrl_nama',
					'label' => 'Layanan',
					'rules' => 'required|trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'smrl_harga',
					'label' => 'Harga',
					'rules' => 'required|trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'unker_id' => xss_filter($this->input->post('unker_id')),
						'smrl_nama' => xss_filter($this->input->post('smrl_nama')),
						'smrl_harga' => xss_filter($this->input->post('smrl_harga')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->smr_layanan_model->insert($data_isert))
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
					'field' => 'smr_nama',
					'label' => 'Smr Nama',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'smr_nomor',
					'label' => 'Smr Nomor',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'smr_kapasitas',
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
						'smr_nama' => xss_filter($this->input->post('smr_nama')),
						'smr_nomor' => xss_filter($this->input->post('smr_nomor')),
						'smr_kapasitas' => xss_filter($this->input->post('smr_kapasitas')),
						'created_at' => xss_filter($this->input->post('created_at')),
						'updated_at' => xss_filter($this->input->post('updated_at')),
					);

					if ($this->kelola_smart_meeting_model->insert($data_isert))
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
			$cek_id = $this->kelola_smart_meeting_model->cek_id($id_edit);

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
						'field' => 'smr_nama',
						'label' => 'Smr Nama',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'smr_nomor',
						'label' => 'Smr Nomor',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'smr_kapasitas',
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
							'smr_nama' => xss_filter($this->input->post('smr_nama')),
							'smr_nomor' => xss_filter($this->input->post('smr_nomor'), 'xss'),
							'smr_kapasitas' => xss_filter($this->input->post('smr_kapasitas')),
							'created_at' => xss_filter($this->input->post('created_at')),
							'updated_at' => xss_filter($this->input->post('updated_at')),
						);

						if ($this->kelola_smart_meeting_model->update($id_edit, $data_update))
						{
							$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->kelola_smart_meeting_model->get_data_edit($id_edit);
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
					$this->kelola_smart_meeting_model->delete($pk);
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

	public function delete_gambar_meeting($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ($this->role->i('delete'))
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					
					if ( $param == 'meeting' ) 
					{
						$this->kelola_smart_meeting_model->delete_gambar_meeting($pk);
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

	public function delete_gallery_meeting($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ($this->role->i('delete'))
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					
					if ( $param == 'gallery' ) 
					{
						$this->kelola_smart_meeting_model->delete_gallery_meeting($pk);
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

	public function delete_fasilitas_meeting($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ($this->role->i('delete'))
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					
					if ( $param == 'fasilitas' ) 
					{
						$this->kelola_smart_meeting_model->delete_fasilitas_meeting($pk);
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

	public function delete_layanan_meeting($param = '')
	{
		if ( $this->input->is_ajax_request() )
		{
			if ($this->role->i('delete'))
			{
				$data_pk = $this->input->post('data');

				foreach ($data_pk as $key)
				{
					$pk = xss_filter(decrypt($key),'sql');
					
					if ( $param == 'layanan' ) 
					{
						$this->kelola_smart_meeting_model->delete_layanan_meeting($pk);
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