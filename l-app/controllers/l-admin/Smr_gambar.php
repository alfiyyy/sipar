<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-18 | 04:56
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Smr_gambar extends Backend_Controller {
	
	public $mod = 'smr-gambar';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/smr_gambar_model");
		$this->meta_title("SMR Gambar");
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

					foreach ($this->smr_gambar_model->datatable('_data', 'data') as $val) 
					{
						$row = [];
						$row[] = $val['smrg_id'];
						$row[] = $val['smrg_image'];
						$row[] = '<div class="text-center"><div class="btn-group">
									<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['smrg_id']) .'\'" class="btn btn-xs btn-white" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
									<button type="button" class="btn btn-xs btn-white delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['smrg_id']) .'"><i class="cificon licon-trash-2"></i></button>
								</div></div>';
						$data[] = $row;
					} // endforeach.

					$this->json_output(['data' => $data, 'recordsFiltered' => $this->smr_gambar_model->datatable('_data', 'count')]);
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
					'field' => 'smrg_image',
					'label' => 'Smrg Image',
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
						'smrg_image' => xss_filter($this->input->post('smrg_image')),
						'created_at' => xss_filter($this->input->post('created_at')),
						'updated_at' => xss_filter($this->input->post('updated_at')),
					);

					if ($this->smr_gambar_model->insert($data_isert))
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
			$cek_id = $this->smr_gambar_model->cek_id($id_edit);

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
						'field' => 'smrg_image',
						'label' => 'Smrg Image',
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
							'smrg_image' => xss_filter($this->input->post('smrg_image')),
							'created_at' => xss_filter($this->input->post('created_at')),
							'updated_at' => xss_filter($this->input->post('updated_at')),
						);

						if ($this->smr_gambar_model->update($id_edit, $data_update))
						{
							$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->smr_gambar_model->get_data_edit($id_edit);
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
					$this->smr_gambar_model->delete($pk);
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
} // End Class.