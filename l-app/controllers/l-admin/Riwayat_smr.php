<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-05 | 08:29
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_smr extends Backend_Controller {
    public $mod = 'riwayat-smr';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/booking_smr_model");
		$this->load->model("mod/peserta_model");
		$this->meta_title("Riwayat Booking Smart Meeting Room");
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

					foreach ($this->booking_smr_model->datatable('_data', 'data') as $val) 
					{
						$row = [];
						$row[] = $no;
						$row[] = $val['peserta_nip'];
						$row[] = $val['peserta_nama'].'<br /><b>'.$val['peserta_instansi'].'</b>';
						// $row[] = $val['unker_nama'];
						$row[] = $val['smr_nama'].' / '.$val['smr_nomor'];
						$row[] = ci_date($val['bs_tanggal_in'], 'd M Y');
						$row[] = '<div class="text-center"><div class="btn-group">
									<button type="button" onclick="location.href=\''. content_url("uploads/".$val['bs_dokumen']) .'\'" class="btn btn-md btn-dark" data-toggle="tooltip" data-placement="top" data-title="Download"><i class="cificon licon-file-text"></i></button>
								  </div></div>';
						if($val['bs_status']=='Belum Disetujui') {
							$row[] = '<span id="cstatus_'.$val['bs_id'].'" class="badge badge-outline-danger">'.$val['bs_status'].'</span>';
						} else {
							$row[] = '<span id="cstatus_'.$val['bs_id'].'" class="badge badge-outline-success">'.$val['bs_status'].'</span>';
						}
						if($val['bs_status']=='Belum Disetujui') {
						$row[] = '<div class="text-right"><div class="btn-group">
									<button type="button" onclick="location.href=\''. admin_url($this->mod."/setujui/".$val['bs_id']) .'\'" class="btn btn-md btn-success" data-toggle="tooltip" data-placement="top" data-title="Klik Untuk Menyetujui"><i class="cificon licon-check"></i></button>
									<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['bs_id']) .'\'" class="btn btn-md btn-primary" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
									<button type="button" class="btn btn-md btn-danger delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['bs_id']) .'"><i class="cificon licon-trash-2"></i></button>
								</div></div>';
						} else {
						$row[] = '<div class="text-right"><div class="btn-group">
							<button type="button" onclick="location.href=\''. admin_url($this->mod."/edit/".$val['bs_id']) .'\'" class="btn btn-md btn-primary" data-toggle="tooltip" data-placement="top" data-title="'. lang_line('button_edit') .'"><i class="cificon licon-edit"></i></button>
							<button type="button" class="btn btn-md btn-danger delete_single" data-toggle="tooltip" data-placement="top" data-title="'.lang_line('button_delete').'" data-pk="'. encrypt($val['bs_id']) .'"><i class="cificon licon-trash-2"></i></button>
						</div></div>';	
						}		
						$data[] = $row;
						$no++;
					} // endforeach.

					$this->json_output(['data' => $data, 'recordsFiltered' => $this->booking_smr_model->datatable('_data', 'count')]);
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

    public function edit($id_data = '')
	{
		if ($this->role->i('modify'))
		{
			$id_edit = xss_filter($id_data, 'sql');
			$cek_id = $this->booking_smr_model->cek_id($id_edit);

			if ($cek_id == 1) 
			{
				if ($this->input->method() == 'post')
				{

					$this->form_validation->set_rules(array(array(
						'field' => 'bs_tanggal_in',
						'label' => 'Tanggal In',
						'rules' => 'trim'
					)));

					$this->form_validation->set_rules(array(array(
						'field' => 'bs_dokumen',
						'label' => 'Dokumen',
						'rules' => 'trim'
					)));

					if ( $this->form_validation->run() )
					{
						$data_update = array(

							'bs_tanggal_in' => xss_filter($this->input->post('bs_tanggal_in')),
							'bs_dokumen' => xss_filter($this->input->post('bs_dokumen')),
							'updated_at' => date('Y-m-d H:i:s'),
						);

						if ($this->booking_smr_model->update($id_edit, $data_update))
						{
							$this->cifire_alert->set($this->mod, 'info', 'Data has been successfully updated');
						}
						else
						{
							$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
						}
					}
				}
				$data_edit = $this->booking_smr_model->get_data_edit($id_edit);
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

	public function setujui($id_data = '')
	{
		if ($this->role->i('modify'))
		{
			$id_edit = xss_filter($id_data, 'sql');
			$cek_id = $this->booking_smr_model->cek_id($id_edit);

			if ($cek_id == 1) 
			{

				$data_update = array(
					'bs_status' => 'Disetujui',
					'updated_at' => date('Y-m-d H:i:s'),
				);

				if ($this->booking_smr_model->update($id_edit, $data_update))
				{
					$this->cifire_alert->set($this->mod, 'info', 'Data telah disetujui');
					redirect(admin_url($this->mod),'refresh');
				}
				else
				{
					$this->cifire_alert->set($this->mod, 'danger', "Oups..! Some error occurred.<br>Please complete the data correctly");
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
					$this->booking_smr_model->delete($pk);
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
}
