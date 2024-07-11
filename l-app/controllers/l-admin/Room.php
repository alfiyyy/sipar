<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-10-31 | 09:44
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends Backend_Controller {
	
	public $mod = 'room';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/room_model");
		$this->meta_title("Room");
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

					foreach ($this->room_model->datatable('_data', 'data') as $val) 
					{
						$row = [];
						$row[] = $val['room_id'];
						$row[] = $val['room_nama'];
						$row[] = $val['room_nomor'];
						$row[] = $val['created_at'];
						$row[] = '<div class="text-center"><div class="btn-group">
									<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['room_id']) .'\'" class="btn btn-xs btn-white" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
									<button type="button" class="btn btn-xs btn-white delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['room_id']) .'"><i class="cificon licon-trash-2"></i></button>
								</div></div>';
						$data[] = $row;
					} // endforeach.

					$this->json_output(['data' => $data, 'recordsFiltered' => $this->room_model->datatable('_data', 'count')]);
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
					'field' => 'kategori_id',
					'label' => 'Kategori Id',
					'rules' => 'trim'
				)));

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
			$cek_id = $this->room_model->cek_id($id_edit);

			if ($cek_id == 1) 
			{
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
						$data_update = array(

							'room_nama' => xss_filter($this->input->post('room_nama')),
							'room_nomor' => xss_filter($this->input->post('room_nomor')),
							'room_kapasitas' => xss_filter($this->input->post('room_kapasitas')),
							'updated_at' => date('Y-m-d H:i:s'),
						);

						if ($this->room_model->update($id_edit, $data_update))
						{
							$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->room_model->get_data_edit($id_edit);
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
					$this->room_model->delete($pk);
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
			$result = $this->room_model->get_room($id);
			$_output = $result;
			$_output['room_nama'] = $result['room_nama'];
			$_output['room_nomor'] = $result['room_nomor'];
			$_output['room_id'] = $result['room_id'];
			$_output['kategori_id'] = $result['kategori_id'];
			$_output['formhidden'] = '<input type="hidden" name="room_id" value="'.$result['room_id'].'" /> <input type="hidden" name="kategori_id" value="'.$result['kategori_id'].'" />';
			$_output['tomboltambahpeserta'] = '<a href="#" onclick="onModalTambahPeserta('.$result['kategori_id'].')" data-toggle="modal" data-dismiss="modal" class="btn btn-success"><i class="cificon licon-plus"></i></a>';
			$_output['data_kamar'] = '<div class="col-sm-12 mb-3">
			<div class="card card-body">
				<div class="media">
					<a href="#" ><div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-success tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded"><i class="fa fa-bed"></i></div></a>
					<div class="media-body">
						<h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">'.$result['room_nama'].'</h6>
						<h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">'.$result['room_nomor'].'</h4>
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