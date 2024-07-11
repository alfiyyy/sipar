<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-05 | 08:29
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_csr_model extends CI_Model {

	public $vars;
	private $_table = 't_booking_csr';
	private $_column_order = array(null, 't_peserta.peserta_nip', 't_peserta.peserta_nama');
	private $_column_search = array('t_peserta.peserta_nip', 't_peserta.peserta_nama');

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
		$id_data = data_login('id');
		if ($mode == 'count')
		{

			$this->$method($id_data);
			$result =  $this->db->get()->num_rows();
			
		}

		elseif (empty($mode) || $mode == 'data')
		{

			$this->$method($id_data);
			
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


	private function _data($id_data='')
	{
		
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('t_peserta', 't_booking_csr.peserta_id = t_peserta.peserta_id');
		$this->db->join('t_csr', 't_booking_csr.csr_id = t_csr.csr_id');
		$this->db->join('t_unit_kerja', 't_booking_csr.unker_id = t_unit_kerja.unker_id');
		$this->db->where('t_booking_csr.penyelenggara_id', $id_data);
		$this->db->order_by('t_booking_csr.bc_status', 'ASC');
		
		

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
			$this->db->order_by('bc_id', 'DESC');
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
		$query = $this->db->where('bc_id', $key);
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
			$this->db->where('bc_id', $val)->delete($this->_table);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


	public function get_data_edit($val_id)
	{
		$query = $this->db->where('bc_id', $val_id);
		$query = $this->db->get($this->_table);
		$result = $query->row_array();
		return $result;
	}


	public function cek_id($val = 0)
	{
		$query = $this->db->select('bc_id');
		$query = $this->db->where('bc_id', $val);
		$query = $this->db->get($this->_table);
		$query = $query->num_rows();
		$int = (int)$query;
		return $int;
	}

	
	
} // End class.