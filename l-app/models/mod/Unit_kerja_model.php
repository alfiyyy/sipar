<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-10-28 | 06:53
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_kerja_model extends CI_Model {

	public $vars;
	private $_table = 't_unit_kerja';
	private $_column_order = array(null, 'unker_id', 'unker_nama', 'unker_kepala', 'unker_status', 'created_at', 'unker_id');
	private $_column_search = array('unker_id', 'unker_nama', 'unker_kepala', 'unker_status', 'created_at', 'unker_id');

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
		if (data_login('key_group')=="root" || data_login('key_group')=="admin") {
			$this->db->select('*');
			$this->db->from($this->_table);
			$this->db->join('t_user', 't_unit_kerja.id_user = t_user.id', 'left');

		} elseif (data_login('key_group')=="penyelenggara") {
			$id_user = data_login('id');
			$this->db->select('*');
			$this->db->from($this->_table);
			$this->db->join('t_user', 't_unit_kerja.id_user = t_user.id', 'left');
			$this->db->where('t_user.id', $id_user);
		}
		

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
			$this->db->order_by('unker_id', 'DESC');
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
		$query = $this->db->where('unker_id', $key);
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
			$this->db->where('unker_id', $val)->delete($this->_table);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function delete_kategori($val = 0)
	{
		if ($this->cek_id_kategori($val) == 1) 
		{
			$this->db->where('kategori_id', $val)->delete('t_room_kategori');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function delete_gambar_kamar($val = 0)
	{
		if ($this->cek_id_gambar($val) == 1) 
		{
			$this->db->where('rg_id', $val)->delete('t_room_gambar');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function delete_gallery_kamar($val = 0)
	{
		if ($this->cek_id_kamar($val) == 1) 
		{
			$this->db->where('room_id', $val)->delete('t_room');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function delete_fasilitas_kamar($val = 0)
	{
		if ($this->cek_id_fasilitas($val) == 1) 
		{
			$this->db->where('rf_id', $val)->delete('t_room_fasilitas');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function delete_layanan_kamar($val = 0)
	{
		if ($this->cek_id_layanan($val) == 1) 
		{
			$this->db->where('rl_id', $val)->delete('t_room_layanan');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function get_data_edit($val_id)
	{
		$query = $this->db->where('unker_id', $val_id);
		$query = $this->db->get($this->_table);
		$result = $query->row_array();
		return $result;
	}


	public function cek_id($val = 0)
	{
		$query = $this->db->select('unker_id');
		$query = $this->db->where('unker_id', $val);
		$query = $this->db->get($this->_table);
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function cek_id_kategori($val = 0)
	{
		$query = $this->db->select('kategori_id');
		$query = $this->db->where('kategori_id', $val);
		$query = $this->db->get('t_room_kategori');
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function cek_id_gambar($val = 0)
	{
		$query = $this->db->select('rg_id');
		$query = $this->db->where('rg_id', $val);
		$query = $this->db->get('t_room_gambar');
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function cek_id_fasilitas($val = 0)
	{
		$query = $this->db->select('rf_id');
		$query = $this->db->where('rf_id', $val);
		$query = $this->db->get('t_room_fasilitas');
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function cek_id_layanan($val = 0)
	{
		$query = $this->db->select('rl_id');
		$query = $this->db->where('rl_id', $val);
		$query = $this->db->get('t_room_layanan');
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function cek_id_kamar($val = 0)
	{
		$query = $this->db->select('room_id');
		$query = $this->db->where('room_id', $val);
		$query = $this->db->get('t_room');
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function cek_id_by_user($val = 0)
	{
		$id_user = data_login('id');
		$query = $this->db->select('unker_id');
		$query = $this->db->where('unker_id', $val);
		$query = $this->db->where('id_user', $id_user);
		$query = $this->db->get($this->_table);
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function get_all_user()
	{
		$query = $this->db->select('id,name');
		$query = $this->db->where('key_group', 'penyelenggara');
		$query = $this->db->order_by('name', 'ASC');
		$query = $this->db->get('t_user');
		$result = $query->result_array();
		return $result;
	}

	public function get_all_user_pimpinan()
	{
		$query = $this->db->select('id,name');
		$query = $this->db->where('key_group', 'pimpinan');
		$query = $this->db->order_by('name', 'ASC');
		$query = $this->db->get('t_user');
		$result = $query->result_array();
		return $result;
	}

} // End class.