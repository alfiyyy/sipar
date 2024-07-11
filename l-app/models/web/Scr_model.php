<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Scr_model extends CI_Model {

	public $vars;
	
	public function __construct()
	{
		parent::__construct();
	}
	

	public function all_smart_meeting_room()
	{
		$query = $this->db
			->select('
                t_csr_gambar.csrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_csr_gambar')
			->join('t_unit_kerja', 't_csr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->order_by('t_csr_gambar.csrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}

	// tambahan
	public function pusatPengembangTalenta()
	{
		$query = $this->db
			->select('
                t_csr_gambar.csrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_csr_gambar')
			->join('t_unit_kerja', 't_csr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '3')
			->order_by('t_csr_gambar.csrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function balaiPegembanganKompetensiPUPR_Medan()
	{
		$query = $this->db
			->select('
                t_csr_gambar.csrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_csr_gambar')
			->join('t_unit_kerja', 't_csr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '8')
			->order_by('t_csr_gambar.csrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function balaiPegembanganKompetensiPUPR_Palembang()
	{
		$query = $this->db
			->select('
                t_csr_gambar.csrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_csr_gambar')
			->join('t_unit_kerja', 't_csr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '9')
			->order_by('t_csr_gambar.csrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function balaiPegembanganKompetensiPUPR_Jakarta()
	{
		$query = $this->db
			->select('
                t_csr_gambar.csrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_csr_gambar')
			->join('t_unit_kerja', 't_csr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '10')
			->order_by('t_csr_gambar.csrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function balaiPegembanganKompetensiPUPR_Bandung()
	{
		$query = $this->db
			->select('
                t_csr_gambar.csrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_csr_gambar')
			->join('t_unit_kerja', 't_csr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '11')
			->order_by('t_csr_gambar.csrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function balaiPegembanganKompetensiPUPR_Surabaya()
	{
		$query = $this->db
			->select('
                t_csr_gambar.csrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_csr_gambar')
			->join('t_unit_kerja', 't_csr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '13')
			->order_by('t_csr_gambar.csrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function balaiPegembanganKompetensiPUPR_Banjarmasin()
	{
		$query = $this->db
			->select('
                t_csr_gambar.csrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_csr_gambar')
			->join('t_unit_kerja', 't_csr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '14')
			->order_by('t_csr_gambar.csrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function balaiPegembanganKompetensiPUPR_Makassar()
	{
		$query = $this->db
			->select('
                t_csr_gambar.csrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_csr_gambar')
			->join('t_unit_kerja', 't_csr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '15')
			->order_by('t_csr_gambar.csrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	


} // End class.