<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-10-31 | 09:44
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model {

	public $vars;
	private $_table = 't_room';
	private $_column_order = array(null, 'room_id', 'room_nama', 'room_nomor', 'created_at', 'room_id');
	private $_column_search = array('room_id', 'room_nama', 'room_nomor', 'created_at', 'room_id');

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
			$this->db->order_by('room_id', 'DESC');
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
		$query = $this->db->where('room_id', $key);
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
			$this->db->where('room_id', $val)->delete($this->_table);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


	public function get_data_edit($val_id)
	{
		$query = $this->db->where('room_id', $val_id);
		$query = $this->db->get($this->_table);
		$result = $query->row_array();
		return $result;
	}

	public function get_data_all_by($val_id)
	{
		$query = $this->db->where('kategori_id', $val_id);
		$query = $this->db->get($this->_table);
		$query = $this->db->order_by('kategori_id', 'DESC');
		$result = $query->result();
		return $result;
	}


	public function cek_id($val = 0)
	{
		$query = $this->db->select('room_id');
		$query = $this->db->where('room_id', $val);
		$query = $this->db->get($this->_table);
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	public function get_room($id) 
	{
		if ( $this->cek_id($id) == 1 )
		{
			$result = $this->db->where('room_id',$id)->get($this->_table)->row_array();
			return $result;
		}
		else
		{
			return NULL;
		}
	}

	// show laporan booking
	public function datatable_laporan($method, $mode = '')
	{
		if ($mode == 'count_laporan')
		{
			$this->$method();
			
			$result =  $this->db->get()->num_rows();
		}

		elseif (empty($mode) || $mode == 'data_laporan')
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


	private function _data_laporan()
	{
		$query = $this->db->get_where('t_unit_kerja', array('id_user' => data_login('id')));
		$row = $query->row();

		$this->db->select('t_room.*, t_room_kategori.kategori_nama, t_unit_kerja.unker_id');
		$this->db->from($this->_table);
		
		$this->db->join('t_room_kategori', 't_room.kategori_id = t_room_kategori.kategori_id');
		$this->db->join('t_unit_kerja', 't_room_kategori.unker_id = t_unit_kerja.unker_id');
		
		$this->db->where('t_unit_kerja.unker_id', $row->unker_id);
		$this->db->group_by('t_room.room_id'); 
		$this->db->order_by('t_room.kategori_id, t_room.room_nama, t_room.room_nomor', 'ASC');

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
			$this->db->order_by('room_id', 'DESC');
		}
	}
} // End class.