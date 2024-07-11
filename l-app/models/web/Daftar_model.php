<?php
/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-10-25 | 03:43
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_model extends CI_Model {

	private $_table = 't_user';
    private $_table_peserta = 't_peserta';

	public function __construct()
	{
		parent::__construct();
	}


	public function insert(array $data)
	{
		$query = $this->db->insert($this->_table, $data);
		
		if ($query == FALSE)
			return FALSE;
		else
			return TRUE;
	}

    public function insert_peserta(array $data)
	{
		$query = $this->db->insert($this->_table_peserta, $data);
		
		if ($query == FALSE)
			return FALSE;
		else
			return TRUE;
	}

} 