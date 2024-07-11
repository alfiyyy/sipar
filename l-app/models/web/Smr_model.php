<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Smr_model extends CI_Model {

	public $vars;
	
	public function __construct()
	{
		parent::__construct();
	}
	

	public function all_smart_meeting_room()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	// tambahan
	public function setba()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '2')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function pusatPengembanganTalenta()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '3')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function sumberDayaAir()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '4')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function pengembanganKompentensiJalan()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '5')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function pengembanganKompentensiManajemen()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '6')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function pengembanganKompentensiPUPR_Medan()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '8')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
		public function pengembanganKompentensiPUPR_Palembang()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '9')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function pengembanganKompentensiPUPR_Jakarta()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '10')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function pengembanganKompentensiPUPR_Bandung()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '11')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function pengembanganKompentensiPUPR_Surabaya()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '13')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function pengembanganKompentensiPUPR_Banjarmasin()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '14')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function pengembanganKompentensiPUPR_Makassar()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '15')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function balaiPenilaianKompetensi()
	{
		$query = $this->db
			->select('
                t_smr_gambar.smrg_image AS  image,
                t_unit_kerja.unker_nama AS  nama,
            ')
			->from('t_smr_gambar')
			->join('t_unit_kerja', 't_smr_gambar.unker_id=t_unit_kerja.unker_id')
			->where('t_unit_kerja.unker_status', 'Aktif')
			->where('t_unit_kerja.unker_id', '17')
			->order_by('t_smr_gambar.smrg_id','DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}

} // End class.