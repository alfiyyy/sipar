<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-18 | 04:47
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_smart_meeting_model extends CI_Model {

	public $vars;
	private $_table = 't_smr';
	private $_column_order = array(null, 'smr_id', 'smr_nama', 'smr_nomor', 'smr_kapasitas', 'smr_id');
	private $_column_search = array('smr_id', 'smr_nama', 'smr_nomor', 'smr_kapasitas', 'smr_id');

	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * Function datatable
	 *
	 * @param     string    $method (query method)
	 * @param     string    $mode ('data' or 'count')
	 * @return    void
	*/
	public function datatable($method, $mode = '')
	{
		if ($mode == 'count')
		{
			$this->$method();
			
			$result =  $this->db->get()->num_rows();
		}

		elseif (empty($mode) || $mode == 'data')
		{
			$this->$method();
			if ($this->input->post('length') != -1) 
			{
				$this->db->limit($this->input->post('length'), $this->input->post('start'));
				$query = $this->db->get();
			}
			else
			{
				$query = $this->db->get();
			}
			
			$result =  $query->result_array();
		}

		return $result;
	}


	private function _data()
	{
		$this->db->select('*');
		$this->db->from($this->_table);

		$i = 0;	
		foreach ($this->_column_search as $item) 
		{
			if ($this->input->post('search')['value'])
			{
				if ($i === 0)
				{
					$this->db->group_start();
					$this->db->like($item, $this->input->post('search')['value']);
				}
				else
				{
					$this->db->or_like($item, $this->input->post('search')['value']);
				}

				if (count($this->_column_search) - 1 == $i) 
				{
					$this->db->group_end(); 
				}
			}
			$i++;
		}
		
		if (!empty($this->input->post('order'))) 
		{
			$this->db->order_by(
				$this->_column_order[$this->input->post('order')['0']['column']], 
				$this->input->post('order')['0']['dir']
			);
		}
		else
		{
			$this->db->order_by('smr_id', 'DESC');
		}
	}


	public function insert(array $data)
	{
		$query = $this->db->insert($this->_table, $data);
		
		if ($query == FALSE)
			return FALSE;
		else
			return TRUE;
	}


	public function update($key, $data)
	{
		$query = $this->db->where('smr_id', $key);
		$query = $this->db->update($this->_table, $data);
		
		if ($query == FALSE)
			return FALSE;
		else
			return TRUE;
	}


	public function delete($val = 0)
	{
		if ($this->cek_id($val) == 1) 
		{
			$this->db->where('smr_id', $val)->delete($this->_table);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function delete_gambar_meeting($val = 0)
	{
		if ($this->cek_id_gambar($val) == 1) 
		{
			$this->db->where('smr_id', $val)->delete('t_smr');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function delete_gallery_meeting($val = 0)
	{
		if ($this->cek_id_gallery($val) == 1) 
		{
			$this->db->where('smrg_id', $val)->delete('t_smr_gambar');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function delete_fasilitas_meeting($val = 0)
	{
		if ($this->cek_id_fasilitas($val) == 1) 
		{
			$this->db->where('smrf_id', $val)->delete('t_smr_fasilitas');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function delete_layanan_meeting($val = 0)
	{
		if ($this->cek_id_layanan($val) == 1) 
		{
			$this->db->where('smrl_id', $val)->delete('t_smr_layanan');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


	public function get_data_edit($val_id)
	{
		$query = $this->db->where('smr_id', $val_id);
		$query = $this->db->get($this->_table);
		$result = $query->row_array();
		return $result;
	}


	public function cek_id($val = 0)
	{
		$query = $this->db->select('smr_id');
		$query = $this->db->where('smr_id', $val);
		$query = $this->db->get($this->_table);
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function cek_id_gambar($val = 0)
	{
		$query = $this->db->select('smr_id');
		$query = $this->db->where('smr_id', $val);
		$query = $this->db->get('t_smr');
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function cek_id_gallery($val = 0)
	{
		$query = $this->db->select('smrg_id');
		$query = $this->db->where('smrg_id', $val);
		$query = $this->db->get('t_smr_gambar');
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function cek_id_fasilitas($val = 0)
	{
		$query = $this->db->select('smrf_id');
		$query = $this->db->where('smrf_id', $val);
		$query = $this->db->get('t_smr_fasilitas');
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function cek_id_layanan($val = 0)
	{
		$query = $this->db->select('smrl_id');
		$query = $this->db->where('smrl_id', $val);
		$query = $this->db->get('t_smr_layanan');
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}



} // End class.