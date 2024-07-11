<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-05 | 08:29
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_booking extends Backend_Controller {
    public $mod = 'laporan-booking';

	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model("mod/room_model");
		$this->load->model("mod/peserta_model");
		$this->meta_title("Laporan Kamar");
	}

    public function index()
	{
		if(data_login('key_group')=="root" || data_login('key_group')=="admin")
		{
			if ($this->role->i('read'))
			{
				$id_user = data_login('id');
				$query2 = $this->db->query('SELECT uk.id_user, rk.* FROM t_room_kategori rk
				INNER JOIN t_unit_kerja uk ON rk.unker_id=uk.unker_id
				INNER JOIN t_user u ON uk.id_user=u.id
				WHERE u.id='.$id_user);
				$result2 = $query2->result_array();

				$this->vars['kategori'] = $result2;
				// $this->vars['penyelenggara_id'] = data_login('id');
				$aksi = $this->input->get('aksi');
				if($aksi == "cari") {
					$this->vars['bulan'] = $this->input->get('bulan');
					$this->vars['tahun'] = $this->input->get('tahun');
				} else {
					$this->vars['bulan'] = date("m");
					$this->vars['tahun'] = date("Y");
				}
				
				$this->db->select('t_room.*, t_room_kategori.kategori_nama');
				$this->db->from('t_room');
				
				$this->db->join('t_room_kategori', 't_room.kategori_id = t_room_kategori.kategori_id');
				$this->db->join('t_unit_kerja', 't_room_kategori.unker_id = t_unit_kerja.unker_id');
				$this->db->join('t_user', 't_unit_kerja.id_user = t_user.id');
				
				$this->db->where('t_user.id', $id_user);
				$query = $this->db->order_by('t_room.kategori_id, t_room.room_nama, t_room.room_nomor', 'ASC');
				$query = $this->db->get();  
				$result = $query->result_array();
				$this->vars['room'] = $result;
				$this->render_view('view_index', $this->vars);
			}
			else
			{
				$this->render_403();
			}
		} 
		elseif(data_login('key_group')=="penyelenggara") 
		{
			if ($this->role->i('read'))
			{
				$id_user = data_login('id');
				$query2 = $this->db->query('SELECT uk.id_user, rk.* FROM t_room_kategori rk
				INNER JOIN t_unit_kerja uk ON rk.unker_id=uk.unker_id
				INNER JOIN t_user u ON uk.id_user=u.id
				WHERE u.id='.$id_user);
				$result2 = $query2->result_array();

				$this->vars['kategori'] = $result2;
				// $this->vars['penyelenggara_id'] = data_login('id');
				$aksi = $this->input->get('aksi');
				if($aksi == "cari") {
					$this->vars['bulan'] = $this->input->get('bulan');
					$this->vars['tahun'] = $this->input->get('tahun');
				} else {
					$this->vars['bulan'] = date("m");
					$this->vars['tahun'] = date("Y");
				}
				
				$this->db->select('t_room.*, t_room_kategori.kategori_nama');
				$this->db->from('t_room');
				
				$this->db->join('t_room_kategori', 't_room.kategori_id = t_room_kategori.kategori_id');
				$this->db->join('t_unit_kerja', 't_room_kategori.unker_id = t_unit_kerja.unker_id');
				$this->db->join('t_user', 't_unit_kerja.id_user = t_user.id');
				
				$this->db->where('t_user.id', $id_user);
				$query = $this->db->order_by('t_room.kategori_id, t_room.room_nama, t_room.room_nomor', 'ASC');
				$query = $this->db->get();  
				$result = $query->result_array();
				$this->vars['room'] = $result;
				$this->render_view('view_index', $this->vars);
			}
			else
			{
				$this->render_403();
			}
		}
		elseif(data_login('key_group')=="pimpinan") 
		{
			if ($this->role->i('read'))
			{
				$id_user = data_login('id');
				$query2 = $this->db->query('SELECT uk.id_user, rk.* FROM t_room_kategori rk
				INNER JOIN t_unit_kerja uk ON rk.unker_id=uk.unker_id
				INNER JOIN t_user u ON uk.id_pimpinan=u.id
				WHERE u.id='.$id_user);
				$result2 = $query2->result_array();

				$this->vars['kategori'] = $result2;
				// $this->vars['penyelenggara_id'] = data_login('id');
				$aksi = $this->input->get('aksi');
				if($aksi == "cari") {
					$this->vars['bulan'] = $this->input->get('bulan');
					$this->vars['tahun'] = $this->input->get('tahun');
				} else {
					$this->vars['bulan'] = date("m");
					$this->vars['tahun'] = date("Y");
				}
				
				$this->db->select('t_room.*, t_room_kategori.kategori_nama');
				$this->db->from('t_room');
				
				$this->db->join('t_room_kategori', 't_room.kategori_id = t_room_kategori.kategori_id');
				$this->db->join('t_unit_kerja', 't_room_kategori.unker_id = t_unit_kerja.unker_id');
				$this->db->join('t_user', 't_unit_kerja.id_pimpinan = t_user.id');
				
				$this->db->where('t_user.id', $id_user);
				$query = $this->db->order_by('t_room.kategori_id, t_room.room_nama, t_room.room_nomor', 'ASC');
				$query = $this->db->get();  
				$result = $query->result_array();
				$this->vars['room'] = $result;
				$this->render_view('view_index', $this->vars);
			}
			else
			{
				$this->render_403();
			}
		}
		
	}

	public function laporan_pdf(){

		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			)
		);
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('view_index', $data);
	
	
	}

}
