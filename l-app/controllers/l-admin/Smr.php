<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-10-31 | 09:44
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Smr extends Backend_Controller {
	
	public $mod = 'smr';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/smr_model");
		$this->meta_title("Smr");
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

					foreach ($this->smr_model->datatable('_data', 'data') as $val) 
					{
						$row = [];
						$row[] = $val['smr_id'];
						$row[] = $val['smr_nama'];
						$row[] = $val['smr_nomor'];
						$row[] = $val['created_at'];
						$row[] = '<div class="text-center"><div class="btn-group">
									<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['smr_id']) .'\'" class="btn btn-xs btn-white" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
									<button type="button" class="btn btn-xs btn-white delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['smr_id']) .'"><i class="cificon licon-trash-2"></i></button>
								</div></div>';
						$data[] = $row;
					} // endforeach.

					$this->json_output(['data' => $data, 'recordsFiltered' => $this->smr_model->datatable('_data', 'count')]);
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

				if ($this->form_validation->run())
				{
					$data_isert = array(
						'kategori_id' => xss_filter($this->input->post('kategori_id')),
						'smr_nama' => xss_filter($this->input->post('smr_nama')),
						'smr_nomor' => xss_filter($this->input->post('smr_nomor')),
						'smr_kapasitas' => xss_filter($this->input->post('smr_kapasitas')),
						'created_at' => date('Y-m-d H:i:s'),
					);

					if ($this->smr_model->insert($data_isert))
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
			$cek_id = $this->smr_model->cek_id($id_edit);

			if ($cek_id == 1) 
			{
				if ($this->input->method() == 'post')
				{

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

					if ( $this->form_validation->run() )
					{
						$data_update = array(

							'smr_nama' => xss_filter($this->input->post('smr_nama')),
							'smr_nomor' => xss_filter($this->input->post('smr_nomor')),
							'smr_kapasitas' => xss_filter($this->input->post('smr_kapasitas')),
							'updated_at' => date('Y-m-d H:i:s'),
						);

						if ($this->smr_model->update($id_edit, $data_update))
						{
							$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->smr_model->get_data_edit($id_edit);
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
					$this->smr_model->delete($pk);
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

	public function pilih($id = '')
	{

		if ( !empty($id) && $this->input->is_ajax_request() ) 
		{
			$id = xss_filter($id, 'sql');
			$result = $this->smr_model->get_smr($id);
			$_output = $result;
			$_output['smr_nama'] = $result['smr_nama'];
			$_output['smr_nomor'] = $result['smr_nomor'];
			$_output['smr_id'] = $result['smr_id'];
			$_output['unker_id'] = $result['unker_id'];
			$_output['formhidden'] = '<input type="hidden" name="smr_id" value="'.$result['smr_id'].'" /> <input type="hidden" name="unker_id" value="'.$result['unker_id'].'" />';
			$_output['tomboltambahpeserta'] = '<a href="#" onclick="onModalTambahPeserta('.$result['unker_id'].')" data-toggle="modal" data-dismiss="modal" class="btn btn-success"><i class="cificon licon-plus"></i></a>';
			$_output['data_kamar'] = '<div class="col-sm-12 mb-3">
			<div class="card card-body">
				<div class="media">
					<a href="#" ><div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-success tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded"><i class="fa fa-university"></i></div></a>
					<div class="media-body">
						<h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">'.$result['smr_nama'].'</h6>
						<h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">'.$result['smr_nomor'].'</h4>
					</div>
				</div>
			</div>
		</div>';
			
			$_output['link'] = '<hr>
				<div class="text-right">
					<button type="submit" class="btn btn-md btn-primary mr-2"><i class="cificon licon-send mr-2"></i>'.lang_line('button_submit').'</button>
					<button type="button" class="btn btn-md btn-secondary ml-2" data-dismiss="modal">'.lang_line('button_close').'</button>
				</div>';

			$this->json_output($_output);
		}
		else
		{
			$_output = false;
			$this->json_output($_output);
			// show_404();
		}

	}
} // End Class.