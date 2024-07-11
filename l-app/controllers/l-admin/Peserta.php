<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-11 | 06:41
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends Backend_Controller {
	
	public $mod = 'peserta';
	public $mod_penyelenggara1 = 'booking-kamar';
	public $mod_penyelenggara2 = 'booking-smr';
	public $mod_penyelenggara3 = 'booking-csr';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/peserta_model");
		$this->meta_title("Peserta");
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

					foreach ($this->peserta_model->datatable('_data', 'data') as $val) 
					{
						$row = [];
						$row[] = $val['peserta_id'];
						$row[] = $val['peserta_nip'];
						$row[] = $val['peserta_nama'];
						$row[] = '<div class="text-center"><div class="btn-group">
									<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['peserta_id']) .'\'" class="btn btn-xs btn-white" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
									<button type="button" class="btn btn-xs btn-white delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['peserta_id']) .'"><i class="cificon licon-trash-2"></i></button>
								</div></div>';
						$data[] = $row;
					} // endforeach.

					$this->json_output(['data' => $data, 'recordsFiltered' => $this->peserta_model->datatable('_data', 'count')]);
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
					'field' => 'peserta_nip',
					'label' => 'Peserta Nip',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'peserta_nama',
					'label' => 'Peserta Nama',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'peserta_nip' => xss_filter($this->input->post('peserta_nip')),
						'peserta_nama' => xss_filter($this->input->post('peserta_nama')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->peserta_model->insert($data_isert))
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

	public function addfrompenyelenggara()
	{
		if ($this->role->i('write') ) 
		{
			if ($this->input->method() == 'post')
			{
				$this->form_validation->set_rules(array(array(
					'field' => 'peserta_nip',
					'label' => 'Peserta Nip',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'peserta_nama',
					'label' => 'Peserta Nama',
					'rules' => 'trim'
				)));

				$this->form_validation->set_rules(array(array(
					'field' => 'kategori_id',
					'label' => 'Kategori',
					'rules' => 'trim'
				)));

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'peserta_nip' => xss_filter($this->input->post('peserta_nip')),
						'peserta_nama' => xss_filter($this->input->post('peserta_nama')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->peserta_model->insert($data_isert))
					{
						$aksi = $this->input->post('aksi');
						
						if($aksi=="room") {
							$this->cifire_alert->set($this->mod_penyelenggara1.'/pesan/'.$this->input->post('kategori_id'), 'info', 'Data has been successfully added');
							redirect(admin_url($this->mod_penyelenggara1.'/pesan/'.$this->input->post('kategori_id')),'refresh');
						} elseif($aksi=="smr") {
							$this->cifire_alert->set($this->mod_penyelenggara2, 'info', 'Data has been successfully added');
							redirect(admin_url($this->mod_penyelenggara2),'refresh');	
						} elseif($aksi=="csr") {
							$this->cifire_alert->set($this->mod_penyelenggara3, 'info', 'Data has been successfully added');
							redirect(admin_url($this->mod_penyelenggara3),'refresh');
						}
						
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
			$cek_id = $this->peserta_model->cek_id($id_edit);

			if ($cek_id == 1) 
			{
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules(array(array(
						'field' => 'peserta_nip',
						'label' => 'Peserta Nip',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'peserta_nama',
						'label' => 'Peserta Nama',
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

							'peserta_nip' => xss_filter($this->input->post('peserta_nip')),
							'peserta_nama' => xss_filter($this->input->post('peserta_nama')),
							'created_at' => xss_filter($this->input->post('created_at')),
							'updated_at' => xss_filter($this->input->post('updated_at')),
						);

						if ($this->peserta_model->update($id_edit, $data_update))
						{
							$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->peserta_model->get_data_edit($id_edit);
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
					$this->peserta_model->delete($pk);
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