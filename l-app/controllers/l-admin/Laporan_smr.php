<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-05 | 08:29
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_smr extends Backend_Controller {
    public $mod = 'laporan-smr';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/smr_model");
		$this->load->model("mod/peserta_model");
		$this->meta_title("Laporan Kamar");
	}

    public function index()
	{
		if ($this->role->i('read'))
		{
            $id_user = data_login('id');
			// $query2 = $this->db->query('SELECT uk.id_user, rk.* FROM t_smr_kategori rk
			// INNER JOIN t_unit_kerja uk ON rk.unker_id=uk.unker_id
			// INNER JOIN t_user u ON uk.id_user=u.id
			// WHERE u.id='.$id_user);
			// $result2 = $query2->result_array();

			// $this->vars['kategori'] = $result2;
			// $this->vars['penyelenggara_id'] = data_login('id');
			$aksi = $this->input->post('aksi');
			if($aksi == "cari") {
				$this->vars['bulan'] = $this->input->post('bulan');
				$this->vars['tahun'] = $this->input->post('tahun');
			} else {
                $this->vars['bulan'] = date("m");
				$this->vars['tahun'] = date("Y");
			}

            
            
            $this->db->select('t_smr.*');
            $this->db->from('t_smr');
            $this->db->join('t_unit_kerja', 't_smr.unker_id = t_unit_kerja.unker_id');
            $this->db->join('t_user', 't_unit_kerja.id_user = t_user.id');
            
            $this->db->where('t_user.id', $id_user);
            $query = $this->db->order_by('t_smr.smr_nama, t_smr.smr_nomor', 'ASC');
			$query = $this->db->get();  
			$result = $query->result_array();
			$this->vars['smr'] = $result;
			$this->render_view('view_index', $this->vars);
		}
		else
		{
			$this->render_403();
		}
	}

}
